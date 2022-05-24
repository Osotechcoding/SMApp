<?php  
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

	//uploadning result method
	public function result_uploading($data){}

	//View uploaded result method
	public function view_uploaded_result($data){}

	//uploading cognitive domain
	public function upload_cognitive($data){}

	//view uploaded cognitive domain
	public function view_uploaded_cognitive($data){}

	//published result method
	public function publish_result($data){}

	//View published result method
	public function view_published_result($data){}

	//check single student result method
	public function check_view_student_result($data){}

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
			},1500);</script>";
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

	/*public function get_exam_subjectsByClassName($grade_desc,$subject){
		$this->stmt= $this->dbh->prepare("SELECT * FROM `register_exam_subject_tbl` WHERE stdGrade=? AND subject=? ORDER BY subject ASC");
		$this->stmt->execute(array($grade_desc,$subject));
		if ($this->stmt->rowCount()>0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
			unset($this->dbh);
		}
	}*/

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
		$this->stmt= $this->dbh->prepare("SELECT st.*,sr.* FROM `visap_registered_subject_tbl` as sr, `visap_student_tbl` as st WHERE sr.subject_class=? AND sr.subject_name=? AND st.studentClass=sr.subject_class ORDER BY sr.subject_name DESC");
		$this->stmt->execute(array($grade_desc,$subject));
		if ($this->stmt->rowCount()>0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
			unset($this->dbh);
		}
	}


	public function upload_student_result($data){
		$total_count 	= 	$data['total_count'];
		$subject 		=    $data['subject'];
		$result_term 	=  	$data['result_term'];
		$result_session = 	$data['result_session'];
		$result_class 	= 	$data['result_class'];
		$student_regNo 	= 	$data['student_regNo'];
		$cass 			= 	$data['cass'];
		$test1 			= 	$data['test1'];
		$test2 			= 	$data['test2'];
		$exam 			= 	$data['exam'];
		//check for empty values 
		if ($this->config->isEmptyStr($result_class) || $this->config->isEmptyStr($student_regNo) || $this->config->isEmptyStr($cass) || $this->config->isEmptyStr($test1) || $this->config->isEmptyStr($test2) || $this->config->isEmptyStr($exam)) {
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
				$arr_test1 = $test1[$i];
				$arr_test2 = $test2[$i];
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
		$rStatus ='1';
		$this->stmt = $this->dbh->prepare("INSERT INTO `visap_termly_result_tbl` (stdRegCode,studentGrade,term,aca_session,subjectName,ca,test1,test2,exam,overallMark,mark_average,uploadedTime,uploadedDate,rStatus) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
		$total_sum =doubleval($arr_cass + $arr_test1 + $arr_test2 + $arr_exam);
		$average_score = doubleval($total_sum/3); 
		$time = date("h:i:s");
		$date = date("Y-m-d");
		if ($this->stmt->execute(array($arr_student_regNo,$arr_result_class,$result_term,$result_session,$arr_subject,$arr_cass,$arr_test1,$arr_test2,$arr_exam,$total_sum,$average_score,$time,$date,$rStatus))) {
		//update subjectRank will be here later
			 $this->dbh->commit();
			$this->response = $this->alert->alert_msg(" $arr_subject uploaded Successfully","success")."<script>setTimeout(()=>{
			window.location.reload();
			},2500);</script>";
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


}
