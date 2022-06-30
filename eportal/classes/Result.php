<?php  
@session_start();
/*Result Class
*@author -- Osotech Software
*Desc -- this class will contain all tasks in school result
* uploading,viewing,checking of student Results

*/
require_once "Database.php";
require_once "Configuration.php";
//@Session::init_ses();
class Result {

	//Result properties
	private $dbh;//database connection
	//protected $query;//querying database
	protected $stmt;//database statement
	protected $response;//database result
	protected $config;//default config

	public function __construct(){
		$conn = new Database;
		$this->dbh = $conn->osotech_connect();
		$this->alert = new Alert;
		$this->config = new Configuration;
	}

	//uploadning result comment method
	public function upload_result_comments($data){
		$total_count 	= $data['total_count'];
		$auth_pass 		= $data['auth_pass'];
		$term 			= $data['term'];
		$comment_class 	= $data['result_comment_class'];
		$school_session = $data['school_session'];
		//check for empty values 
		if ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("warning","You need to Authenticate this Upload!",__OSO_APP_NAME__." Says");
			// code...
		}elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
	$this->response = $this->alert->alert_toastr("error","Invalid Authentication Code!",__OSO_APP_NAME__." Says");
		}
		elseif (!$this->config->check_user_activity_allowed("result_comment")) {
	$this->response = $this->alert->alert_toastr("error","Result Comment Uploading is not allowed at the moment!",__OSO_APP_NAME__." Says");
		}else{
			//loop through all the student involved
			for ($i=0; $i < (int)$total_count; $i++) { 
				$student_regNo = $data['student_regNo'][$i];
				$staff_comment 	= 	$data['comment'][$i];
				//check for empty comment
				if ($this->config->isEmptyStr($staff_comment)) {
				$this->response = $this->alert->alert_toastr("warning","Please write a comment to continue!",__OSO_APP_NAME__." Says");
				}else{
				//check for duplicate comment upload
				$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_result_comment_tbl` WHERE stdRegNo=? AND stdGrade=? AND term=? AND schl_Sess=? LIMIT 1");
				$this->stmt->execute(array($student_regNo,$comment_class,$term,$school_session));
				//check the row that was returned 
				if ($this->stmt->rowCount() ==1) {
				$this->response = $this->alert->alert_toastr("warning","Comment already uploaded for student with Reg No: $student_regNo",__OSO_APP_NAME__." Says");
				}else{
				//let upload the comment now
					try {
						$this->dbh->beginTransaction();
		$this->stmt = $this->dbh->prepare("INSERT INTO `visap_result_comment_tbl` (stdRegNo,stdGrade,teacher_comment,term,schl_Sess) VALUES (?,?,?,?,?);");
		if ($this->stmt->execute(array($student_regNo,$comment_class,$staff_comment,$term,$school_session))) {
		//update subjectRank will be here later
			 $this->dbh->commit();
			$this->response = $this->alert->alert_toastr("success","Comment uploaded Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
			window.location.assign('./');
			},500);</script>";
		}
						
					} catch (PDOException $e) {
	$this->dbh->rollback();
    $this->response  =$this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),"danger");	
					}
				}
				}
			}
		}

		return $this->response;
		unset($this->dbh);
	}

	//View uploaded result method
	public function view_uploaded_result_comment($stdGrade,$term,$session){
		$this->stmt= $this->dbh->prepare("SELECT * FROM `visap_result_comment_tbl` WHERE stdGrade=? AND term=? AND schl_Sess=? ORDER BY stdRegNo ASC");
		$this->stmt->execute(array($stdGrade,$term,$session));
		if ($this->stmt->rowCount()>0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
			unset($this->dbh);
		}
	}

	//uploading cognitive domain
	public function upload_cognitive($data){}

	//view uploaded cognitive domain
	public function view_uploaded_cognitive($data){}

	//published result method
	public function publish_result($data){}

	//View published result method
	public function view_published_result($data){}

	//check single student result method
	public function check_view_student_result($data){
		$stdRegNo = $this->config->Clean(strtoupper($data['reg_number']));
		$stdGrade = $this->config->Clean($data['result_class']);
		$stdSession = $this->config->Clean($data['result_session']);
		$stdTerm = $this->config->Clean($data['result_term']);
		$auth_pass =$this->config->Clean($data['auth_pass']);
		//check for values
		if (!$this->config->check_user_activity_allowed("result_checking")) {
		$this->response = $this->alert->alert_toastr("error","Result Checking is currently not allowed!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($stdRegNo) || $this->config->isEmptyStr($stdGrade) || $this->config->isEmptyStr($stdTerm) || $this->config->isEmptyStr($stdSession) || $this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error","Invalid submission, Please check all your inputs!",__OSO_APP_NAME__." Says");
		}/*elseif (result is not commented by class teacher) {
			// code...
		}elseif (result is not commented by principal) {
			// code...
		}*/elseif (!$this->config->check_single_data("visap_student_tbl","stdRegNo",$stdRegNo)) {
		$this->response = $this->alert->alert_toastr("error","Invalid student admission number!",__OSO_APP_NAME__." Says");
		}else{
$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE stdRegCode=? AND studentGrade=? AND term=? AND aca_session=?");
	$this->stmt->execute(array($stdRegNo,$stdGrade,$stdTerm,$stdSession));
	if ($this->stmt->rowCount()> 0) {
		while($result_data = $this->stmt->fetch()){
			$result_id = $result_data->reportId;
			$result_opened = $result_data->rStatus;
			if ($result_opened =='2') {
		// create a session result Id...
		$_SESSION['resultmi'] = $result_id;
		// $_SESSION['pin'] = $cardPin;
		// $_SESSION['serial'] = $cardSerial;
		$_SESSION['result_regNo'] = $stdRegNo;
		$_SESSION['result_class'] = $stdGrade;
		$_SESSION['result_term'] = $stdTerm;
		$_SESSION['result_session'] = $stdSession;
		switch ($_SESSION['result_term']) {
			case '1st Term':
				$student_result_page ="./reportcard?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
				break;
				case '2nd Term':
			$student_result_page ="./secondtermresult?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
				break;
					case '3rd Term':
			$student_result_page ="./thirdtermresult?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
				break;
		}
		$this->response = $this->alert->alert_toastr("success","Gathering Result... Pls wait...",__OSO_APP_NAME__." Says").'<script>setTimeout(()=>{
			window.open("'.$student_result_page.'","_blank", "top=100, left=100, width=800, height=700");$("#SingleStudentResult_form")[0].reset();
		},1000)</script>';
			}elseif ($result_opened =='3') {
	$this->response = $this->alert->alert_toastr("error","This Result is Held, Please contact your Admin!",__OSO_APP_NAME__." Says");
			}
			else{
	$this->response = $this->alert->alert_toastr("error","Result not yet released, Try again later!",__OSO_APP_NAME__." Says");
			}
		}
	}else{
$this->response = $this->alert->alert_toastr("error","Sorry No result found!",__OSO_APP_NAME__." Says");
	}

		}
	return $this->response;
		unset($this->dbh);
	}

	public function update_school_result_grading($data){
		$bypass = $this->config->Clean($data['bypass']);
		$grading_id = ($data['grading_id']);
		$result_class = $this->config->Clean($data['result_class']);
		$score_from = isset($data['score_from']) ? $data['score_from'] :'0';
		$score_to = $this->config->Clean($data['score_to']);
		$mark_grade = $this->config->Clean($data['mark_grade']);
		$score_remark = $this->config->Clean($data['score_remark']);
		if ($this->config->isEmptyStr($bypass) || $bypass != md5("oiza1")) {
	$this->response = $this->alert->alert_msg("Authentication Failed, Please Check your Connection and Try again!","danger");
		}elseif ($this->config->isEmptyStr($score_to) || $this->config->isEmptyStr($score_remark) || $this->config->isEmptyStr($grading_id) || $this->config->isEmptyStr($mark_grade)) {
		$this->response = $this->alert->alert_msg("Invalid Submission, Please check your inputs and Try again!","danger");
		}
		else{
			//let get the grading updated
			try {
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("UPDATE `visap_result_grading_tbl` SET mark_grade=?,score_from=?,score_to=?,score_remark=? WHERE grading_id=? AND grade_class=?");
				if ($this->stmt->execute(array($mark_grade,$score_from,$score_to,$score_remark,$grading_id,$result_class))) {
			 $this->dbh->commit();
			$this->response = $this->alert->alert_msg("Grading System Updated Successfully","success")."<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
				}else{
			$this->response = $this->alert->alert_msg("Unknown Error Occured, Please Try again!","danger");
				}
			} catch (PDOException $e) {
	$this->dbh->rollback();
    $this->response  =$this->alert->alert_msg("Grading Update Failed: Error Occurred: ".$e->getMessage(),"danger");
			}
		}
		return $this->response;
		//unset($this->dbh);
	}
	public function get_school_result_grading($grade_desc){
		$this->stmt= $this->dbh->prepare("SELECT * FROM `visap_result_grading_tbl` WHERE grade_class=? ORDER BY mark_grade ASC");
		$this->stmt->execute(array($grade_desc));
		if ($this->stmt->rowCount()>0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
			unset($this->dbh);
		}
	}

	public function get_student_result_gradeByRegNo($stdRegNo,$stdgrade,$term,$session){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE stdRegCode=? AND studentGrade=? AND term=? AND aca_session=? LIMIT 1");
		$this->stmt->execute(array($stdRegNo,$stdgrade,$term,$session));
		if ($this->stmt->rowCount()==1) {
			$this->response = $this->stmt->fetch();
			return $this->response;
			unset($this->dbh);
		}
	}

public function get_exam_subjectsByClassName($grade_desc,$subject){
		$this->stmt= $this->dbh->prepare("SELECT st.*,sr.* FROM `visap_registered_subject_tbl` as sr, `visap_student_tbl` as st WHERE sr.subject_class=? AND sr.subject_name=? AND st.studentClass=sr.subject_class AND st.stdAdmStatus='Active' ORDER BY st.stdSurName ASC");
		$this->stmt->execute(array($grade_desc,$subject));
		if ($this->stmt->rowCount()>0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
			unset($this->dbh);
		}
	}


	public function upload_student_result($data){
		$total_count 	= 	$data['total_count'];
		$subject 		=   $data['subject'];
		$result_term 	=  	$data['result_term'];
		$result_session = 	$data['result_session'];
		$result_class 	= 	$data['result_class'];
		$student_regNo 	= 	$data['student_regNo'];
		$cass 			= 	$data['cass'];
		$exam 			= 	$data['exam'];
		//check for empty values 
		if ($this->config->isEmptyStr($result_class) || $this->config->isEmptyStr($student_regNo) || $this->config->isEmptyStr($cass) || $this->config->isEmptyStr($exam)) {
			$this->response = $this->alert->alert_msg("Please check all your Inputs and try again!","danger");
			// code...
		}elseif (!$this->config->allowed_result_uploading()) {
	$this->response = $this->alert->alert_msg("Result Uploading is not allowed at the moment!","danger");
		}else{
			//count the number of student result subjects to be uploaded
			for ($i=0; $i < (int)$total_count; $i++) { 
				//$arr_stdId = $stdId[$i];
				$arr_student_regNo = $student_regNo[$i];
				$arr_result_class = $result_class[$i];
				$arr_result_term = $result_term[$i];
				$arr_result_session = $result_session[$i];
				$arr_cass = $cass[$i];
				$arr_exam = $exam[$i];
				$arr_subject = $subject[$i];
				//check if the subject already uploaded
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE stdRegCode=? AND studentGrade=? AND term=? AND aca_session=? AND subjectName=?");
		$this->stmt->execute(array($arr_student_regNo,$arr_result_class,$result_term,$result_session,$arr_subject));
		if ($this->stmt->rowCount()>0) {
		$this->response = $this->alert->alert_msg("$arr_subject is already Uploaded!","danger");
		}else{
			try {
		$this->dbh->beginTransaction();
		$rStatus ='2';
		$this->stmt = $this->dbh->prepare("INSERT INTO `visap_termly_result_tbl` (stdRegCode,studentGrade,term,aca_session,subjectName,ca,exam,overallMark,mark_average,uploadedTime,uploadedDate,rStatus) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
		$total_sum =doubleval($arr_cass+$arr_exam);
		$average_score = round(($total_sum/2)); 
		$time = date("h:i:s");
		$date = date("Y-m-d");
		if ($this->stmt->execute(array($arr_student_regNo,$arr_result_class,$result_term,$result_session,$arr_subject,$arr_cass,$arr_exam,$total_sum,$average_score,$time,$date,$rStatus))) {
		//update subjectRank will be here later
			 $this->dbh->commit();
			$this->response = $this->alert->alert_msg(" $arr_subject uploaded Successfully","success")."<script>setTimeout(()=>{
			window.location.reload();
			}, 500);</script>";
		}
				
			} catch (PDOException $e) {
		$this->dbh->rollback();
    $this->response  =$this->alert->alert_msg("Upload Failed: Error Occurred: ".$e->getMessage(),"danger");
				
			}
		//$this->response = $this->alert->alert_msg("Result Uploaded Successfully!","success");
		}

			}
		}
		
		return $this->response;
		unset($this->dbh);
	}

	public function get_all_uploaded_school_result($stdGrade,$subject,$term,$session){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE studentGrade=? AND subjectName=? AND term=? AND aca_session=? ORDER BY stdRegCode ASC");
		$this->stmt->execute(array($stdGrade,$subject,$term,$session));
		if ($this->stmt->rowCount()>0) {
			$this->response = $this->stmt->fetchAll();
		return $this->response;
		unset($this->dbh);
		}
	}

	public function uploaded_Exam_subjects_InDropDown_list(){
	$this->response ="";
	$this->stmt = $this->dbh->prepare("SELECT DISTINCT(`subjectName`) FROM `visap_termly_result_tbl` ORDER BY subjectName ASC");
			$this->stmt->execute();
			if ($this->stmt->rowCount()>0) {
			while ($row = $this->stmt->fetch()) {
		$this->response.='<option value="'.$row->subjectName.'">'.$row->subjectName.'</option>';
			}
			}else{
				$this->response = false;
			}
			return $this->response;
	}

	public function filter_students_result_by_admission_no_subject($studentClass,$admission_no,$subject,$term,$session){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE stdRegCode=? AND studentGrade=? AND subjectName=? AND term=? AND aca_session=? LIMIT 1");
			$this->stmt->execute(array($admission_no,$studentClass,$subject,$term,$session));
			if ($this->stmt->rowCount() == 1) {
				$this->response = $this->stmt->fetch();
				return $this->response;
				unset($this->dbh);
			}
	}

	//update single student result by admin
	public function update_student_result_by_admin($data){
		$resultId = $this->config->Clean($data['resultId']);
		$stdRegNo = $this->config->Clean($data['std_admno']);
		$result_term = $this->config->Clean($data['result_term']);
		$result_session = $this->config->Clean($data['result_session']);
		$cass = $this->config->Clean($data['cass1']);
		$exam = $this->config->Clean($data['exam1']);
		$result_class = $this->config->Clean($data['result_class']);
		$auth_pass = $this->config->Clean($data['Auth']);
		//lets check for values
		if ($this->config->isEmptyStr($cass) || $this->config->isEmptyStr($exam)) {
		 $this->response = $this->alert->alert_toastr("error","Invalid submission, Please Check your Inputs!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error","Authentication Code is Required!",__OSO_APP_NAME__." Says");
		}elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("error","Invalid Authentication Code!",__OSO_APP_NAME__." Says");
		}else{
			//let update the result score now
			try {
				$sumOfMark = intval($cass + $exam);
				$average_score = intval(($cass + $exam)/2);
				$this->dbh->beginTransaction();
    	$this->stmt = $this->dbh->prepare("UPDATE `visap_termly_result_tbl` SET ca=?,exam=?,overallMark=?,mark_average=? WHERE reportId=? AND stdRegCode=? AND studentGrade=? AND term=? AND aca_session=? LIMIT 1");
    	if ($this->stmt->execute(array($cass,$exam,$sumOfMark,$average_score,$resultId,$stdRegNo,$result_class,$result_term,$result_session))) {
    		$this->dbh->commit();
    $this->response = $this->alert->alert_toastr("success","Result Updated  Successfully...",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location='./';
						},500);</script>";
    	}else{
    		$this->response = $this->alert->alert_toastr("error","Unknown Error Occured, Please try again!",__OSO_APP_NAME__." Says");
    	}
			} catch (PDOException $e) {
			$this->dbh->rollback();
			$this->response = $this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");
			}
		}
		return $this->response;
		unset($this->dbh);
	}

}
