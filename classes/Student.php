<?php
@session_start();
/**
 *
 */
require_once "Database.php";
require_once "Session.php";
require_once "Configuration.php";
//@$Configuration->osotech_session_kick();
class Student{

	private $dbh;//database connection
	protected $query;//querying database
	protected $stmt;//database statement
	protected $table_name ="visap_student_tbl";
	protected $response;//database result
	protected $config;//default config

	public function __construct(){
		$conn = new Database;
		$this->dbh = $conn->osotech_connect();
		$this->alert = new Alert;
		$this->config = new Configuration;
	}

	public function absolute_student_login($data){
		global $lang;
		$email = $this->config->Clean($data['student_email']);
		$password = $this->config->Clean($data['student_password']);
		$xss_token = $data['txss_token'];
		if (!$this->config->check_user_activity_allowed("student_login")) {
		$this->response =$this->alert->alert_toastr("error","Login is currently not allowed!","WARNING");
		}elseif ($this->config->isEmptyStr($email) || $this->config->isEmptyStr($password)) {
			//$this->response =$this->alert->alert_msg("Please enter your email and or password to continue","warning");
			$this->response =$this->alert->alert_toastr("error","Please enter your email and or password to continue!","ERROR");
		}elseif (! $this->config->is_Valid_Email($email)) {
		
			//$this->response =$this->alert->alert_msg("Invalid email address detected!","warning");
			$this->response =$this->alert->alert_toastr("error","Invalid email address detected!","ERROR");
		}else{
    $this->stmt = $this->dbh->prepare("SELECT * FROM {$this->table_name} WHERE stdEmail=? LIMIT 1");
    $this->stmt->execute(array($email));
    if ($this->stmt->rowCount()==1) {
      $result = $this->stmt->fetch();
      $db_password = $result->stdPassword;
      //check if password entered match with db pwd
      if ($this->config->check_two_passwords_hash($password,$db_password)) {
      	if (isset($data['rememberme']) && $data['rememberme']==='on') {
      		// save details to cookie
      		setcookie("login_student_email",$email,time()+(24*60*60*7),'/');
      		setcookie("login_student_pass",$password,time()+(24*60*60*7),'/');
      		setcookie("login_student_username",$result->stdUserName,time()+(24*60*60*7),'/');
      	}else{
      		setcookie("login_student_email","",time()-100,'/');
      		setcookie("login_student_username","",time()-100,'/');
      		setcookie("login_student_pass","",time()-100,'/');
      	}

      	$this->stmt = $this->dbh->prepare("UPDATE {$this->table_name} SET is_online=1 WHERE stdId=? LIMIT 1");
      	if ($this->stmt->execute(array($result->stdId))) {
      //$session_token = Session::set_xss_token();
      	$_COOKIE['login_student_email'] =$email;
      	$_COOKIE['login_student_pass'] =$password;
      	$_COOKIE['login_student_username'] =$result->stdUserName;
      	$_SESSION['STD_SES_ID'] = $result->stdId;
      	$_SESSION['STD_USERNAME'] = $result->stdUserName;
      	$_SESSION['STD_GRADE_CLASS'] = $result->studentClass;
      	$_SESSION['STD_REG_NUMBER'] = $result->stdRegNo;
      	$_SESSION['STD_EMAIL'] = $result->stdEmail;
      	$urlLink = APP_ROOT."students/";
       $this->response = $this->alert->alert_toastr("success","Login Successful ","SUCCESS")."<script>setTimeout(()=>{
         window.location.href='".$urlLink."';
        },2000);</script>";
      	}
      	
      }else{
      
   $this->response = $this->alert->alert_toastr("error","Login Failed: Invalid account Password!","ERROR");//Invalid Account Password
      }
    }else{
    $this->response = $this->alert->alert_toastr("error","Login Failed: Invalid account Details!","ERROR");// Email Address Not Found or User Details not found
    }
		}
   return $this->response;
   unset($this->dbh);
  }

	public function count_students_by_gender(string $gender){
	$this->stmt = $this->dbh->prepare("SELECT count(`stdId`) as cgender FROM {$this->table_name} WHERE stdGender=?");
		$this->stmt->execute(array($gender));
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response =$rows->cgender;
		}else{
		$this->response ="0";
		}
		return $this->response;
}

public function count_recent_applicants(){
	$this->stmt = $this->dbh->prepare("SELECT count(`stdId`) as applicant FROM {$this->table_name} WHERE DATE(`stdApplyDate`) >= DATE(CURRENT_DATE() - INTERVAL
 1 MONTH)");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response =$rows->applicant;
		}else{
		$this->response ="0";
		}
		return $this->response;
}

public function count_total_visap_students(){
	$this->stmt = $this->dbh->prepare("SELECT count(`stdId`) as students FROM {$this->table_name}");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response =$rows->students;
		}else{
		$this->response ="0";
		}
		return $this->response;
}

public function get_student_payments_history($stdId,$stdRegNo,$stdGrade){
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_payment_history_tbl` WHERE std_id=? AND stdAdmNo=? AND stdGrade=? ORDER BY component_fee ASC");
		$this->stmt->execute(array($stdId,$stdRegNo,$stdGrade));
		if ($this->stmt->rowCount() >0) {
			$this->response = $this->stmt->fetchAll();
		}else{
		$this->response =false;
		}
		return $this->response;
}

	public function get_student_payment_info_by_regNo_and_Id($regNo,$stdId){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_payment_tbl` WHERE std_id=? AND stdAdmNo=? ORDER BY component_fee ASC");
		$this->stmt->execute(array($regNo,$stdId));
		if ($this->stmt->rowCount() >0) {
			$this->response = $this->stmt->fetchAll();
		}else{
		$this->response =false;
		}

		return $this->response;
	}

	//get_student_data_ByRegNo
	public function get_student_data_ByRegNo($regNo){
		$this->stmt = $this->dbh->prepare("SELECT *,concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM {$this->table_name} WHERE stdRegNo=? LIMIT 1");
		$this->stmt->execute(array($regNo));
		if ($this->stmt->rowCount()==1) {
			$this->response = $this->stmt->fetch();
			return $this->response;
			unset($this->dbh);
		}
	}


	public function get_student_data_byId($stdId){
		$this->stmt = $this->dbh->prepare("SELECT *,concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM {$this->table_name} WHERE stdId=? LIMIT 1");
		$this->stmt->execute(array($stdId));
		if ($this->stmt->rowCount()==1) {
			$this->response = $this->stmt->fetch();
			return $this->response;
			unset($this->dbh);
		}
	}

public function get_single_student_details_by_regId($stdId,$regNo) {
$this->stmt = $this->dbh->prepare("SELECT *,concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM {$this->table_name} WHERE stdId=? AND stdRegNo=? LIMIT 1");
		$this->stmt->execute(array($stdId,$regNo));
		if ($this->stmt->rowCount()==1) {
			$this->response = $this->stmt->fetch();
		}else{
		$this->response =false;
		}
		return $this->response;
}

	//get all admitted students

public function get_all_students_by_status(string $status){
	$this->stmt = $this->dbh->prepare("SELECT * FROM {$this->table_name} WHERE stdAdmStatus=? ORDER BY stdSurName ASC");
		$this->stmt->execute(array($status));
		if ($this->stmt->rowCount() >0) {
			$this->response = $this->stmt->fetchAll();
		}else{
		$this->response =false;
		}
		return $this->response;
}
//fliter student payment by regno and class
	public function filter_students_by_payments($stdClass,$stdRegNo){
		$this->stmt = $this->dbh->prepare("SELECT *,concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM {$this->table_name} WHERE stdRegNo=? AND studentClass=? LIMIT 1");
		$this->stmt->execute(array($stdRegNo,$stdClass));
		if ($this->stmt->rowCount()>0) {
		$this->response = $this->stmt->fetch();
		return $this->response;
		}
	}

	//get all admitted students in dropdown list

	/*ADMISSION REGISTRATION STEP ONE*/
	public function start_student_admission_step_one($admission_data){
		$captcha_correct = $this->config->Clean($admission_data['captcha_correct_answer']);
		$user_captcha_anwser = $this->config->Clean($admission_data['user_captcha_anwser']);
		$bypass = $this->config->Clean($admission_data['bypass']);
		$card_pin = $this->config->Clean($admission_data['card_pin']);
		$card_serial = $this->config->Clean($admission_data['card_serial']);
		$stu_class = $this->config->Clean($admission_data['stu_class']);
		$stu_phone = $this->config->Clean($admission_data['stu_phone']);
		$username = $this->config->Clean($admission_data['username']);
		$stu_email = $this->config->Clean($admission_data['stu_email']);
		//check for Auth access
		if ($this->config->isEmptyStr($bypass) || $bypass!=md5("oiza12345")) {
			// code...
		$this->response = $this->alert->alert_msg("Authentication Failed, Please Check your Connection and Try again!","danger");
		}elseif ($this->config->isEmptyStr($card_pin) || $this->config->isEmptyStr($card_serial) || $this->config->isEmptyStr($stu_class) || $this->config->isEmptyStr($stu_phone) || $this->config->isEmptyStr($username) || $this->config->isEmptyStr($stu_email)) {
			// code...
			$this->response = $this->alert->alert_msg("Please fill in all the required form and Try again!","warning");
		}elseif (!$this->config->is_Valid_Email($stu_email)) {
			// code...
			$this->response = $this->alert->alert_msg("This e-email $stu_email is Valid, Please check your Email address and Try again!","danger");
		}elseif (!$this->config->validate_Mobile_Number($stu_phone)) {
			// code...
			$this->response = $this->alert->alert_msg("This Phone Number $stu_phone format is not allowed, Use this format: +234**********!","danger");
			//lets check if the PIN character is valid without connecting to db
		}elseif ($this->config->check_string_lenght_greater(15,$card_pin) || $this->config->check_string_lenght_lesser(15,$card_pin)) {
			// code...
			$this->response = $this->alert->alert_msg("You have entered an incorrect Card Pin! Re-check Your card Pin & try again...","danger");
		}else{
			//lets connect to db and check the status of the Pin
			//SELECT * FROM `tbl_reg_pins, pin_code,pin_serial,pin_status=0;
			$this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_reg_pins` WHERE pin_code=? AND pin_serial=? LIMIT 1");
			$this->stmt->execute(array($card_pin,$card_serial));
			//check the row returns
			if ($this->stmt->rowCount() ==1) {
				//let check if the CARD PIN has been Used
				//fetch the card details
				$card_details = $this->stmt->fetch();
				$pinStatus =$card_details->pin_status;
				$pinCode =$card_details->pin_code;
				$pinSerial =$card_details->pin_serial;
				$pinDate =$card_details->created_at;
				$pinPrice =$card_details->price;
				$pinId =$card_details->pin_id;
				if ($pinStatus =='1') {
					// code...
			$this->response = $this->alert->alert_msg("DO NOT PLAY SMART! This Card has been Used!","danger");
				}/*elseif (checkif_emailexists()) {
					// code...
				}*/
				 else{
					//let begin with the registration
					//student Login Credentials
					 $portal_username = $username."@gssota.portal";//login email
					 $portal_password ="gssota@portal";//loginpassword
					 $hashed_password = $this->config->encrypt_user_password($portal_password);
				try {
		$this->dbh->beginTransaction();
		$date =date("Y-m-d");
		$time = date("h:i:s");
		$admission_no = self::generate_admission_number();
		$confirmation_code = substr(md5(uniqid(mt_rand(),true)),0,10);
		$this->stmt =$this->dbh->prepare("INSERT INTO $this->table_name(stdRegNo,stdEmail,stdUserName,stdPassword,studentClass,stdPhone,stdApplyDate,stdConfToken) VALUES(?,?,?,?,?,?,?,?);");
	if ($this->stmt->execute(array($admission_no,$stu_email,$username,$hashed_password,$stu_class,$stu_phone,$date,$confirmation_code))) {
				// grab the LastInsertId...
			$_SESSION['AUTH_GSSOTA_APPLICANT_ID'] =$this->dbh->lastInsertId();
			$_SESSION['AUTH_GSSOTA_ADMISSION_NO'] = $admission_no;
			//let change the Pin Used status
			$change_status =1;
	$this->stmt =$this->dbh->prepare("UPDATE `tbl_reg_pins` SET pin_status=? WHERE pin_id=? LIMIT 1");
	if ($this->stmt->execute(array($change_status,$pinId))) {
				//let create a Pin Used History
		$this->stmt = $this->dbh->prepare("INSERT INTO `reg_pin_history_tbl` (used_by, pin_code,pin_serial,dated,timed) VALUES (?,?,?,?,?);");
		if ($this->stmt->execute(array($admission_no,$pinCode,$pinSerial,$date,$time))) {
			// code...
			$this->dbh->commit();
			$this->response = $this->alert->alert_msg("You have successfully completed step one of your online registration!","success")."<script>setTimeout(()=>{
			window.location.".Session::redirect_root('admission_step2').";
			},2500);</script>";
		}
			}
		}
			} catch (PDOException $e) {
		$this->dbh->rollback();
    $this->response  = $this->alert->alert_msg("Error Occurred!: Error Info: ".$e->getMessage(),"danger");
					 }
				}
			}else{
				//show the user that The PIN he/she enters is not found
				$this->response = $this->alert->alert_msg("The Card PIN you entered does not exists! check the Pin and try again...","danger");
			}
		}
	}

	/*ADMISSION REGISTRATION STEP ONE ENDS*/

public function generate_admission_number(){
	 $this->response ="";
	 $prefix="GSS";
	$this->stmt = $this->dbh->prepare("SELECT stdRegNo FROM $this->table_name ORDER BY stdRegNo DESC LIMIT 1");
	$this->stmt->execute();
	if ($this->stmt->rowCount() > 0) {
    if ($row = $this->stmt->fetch()) {
      $value2 = $row->stdRegNo;
      $value2 = substr($value2, 8,12);//separating numeric part
      $value2 =$value2 + 1;//incrementing numeric value
      $value2 = $prefix.date('Y')."-".sprintf('%04s',$value2);//concatenating incremented value
      $this->response = $value2;
    }
	}else{
	// "GSSOTA/00001"
    $value2 =$prefix.date('Y')."-"."0001";
    $this->response =$value2;
	}
	return $this->response;
	unset($this->dbh);
}

public function register_exam_subject($data){
		//collect form data
		$bypass = $this->config->Clean($data['bypass']);
		$subject = $this->config->Clean($data['subject']);
		$student_class = $this->config->Clean($data['student_class']);
		//$term = $this->config->Clean($data['term']);
		$school_sess = $this->config->Clean($data['school_sess']);
		$stdAdmNo = $this->config->Clean($data['reg_number']);
		$stdId = $this->config->Clean($data['stdId']);
		//check if bypass is not set
		if ($this->config->isEmptyStr($bypass) || $bypass!==md5("oiza1")) {
			$this->response = $this->alert->alert_msg("Unathorized access Detected!","warning");
		}elseif($this->config->isEmptyStr($subject)|| $this->config->isEmptyStr($student_class) || $this->config->isEmptyStr($school_sess) || $this->config->isEmptyStr($stdId) || $this->config->isEmptyStr($stdAdmNo)){
			// code...
		$this->response = $this->alert->alert_msg("Please Select your examination subject to Register!","warning");
		}else{
			//check for duplicate suject registration in db
			#subId,std_id,stdRegNo,std_class,subject,schl_Sess,created_at
			$this->stmt =$this->dbh->prepare("SELECT * FROM `register_exam_subject_tbl` WHERE std_id=? AND stdRegNo=? AND stdGrade=? AND subject=? AND schl_Sess=? LIMIT 1");
			//execute
			$this->stmt->execute(array($stdId,$stdAdmNo,$student_class,$subject,$school_sess));
			//check row return
			if ($this->stmt->rowCount() == 1) {
				// code...
				$this->response = $this->alert->alert_msg($subject." is already Registered!","danger");
			}else{
				try {
				 $this->dbh->beginTransaction();
					$created_at = date("Y-m-d");
				$this->stmt = $this->dbh->prepare("INSERT INTO `register_exam_subject_tbl` (std_id,stdRegNo,stdGrade,subject,schl_Sess,created_at) VALUES (?,?,?,?,?,?);");
				//lets execute
				if ($this->stmt->execute([$stdId,$stdAdmNo,$student_class,$subject,$school_sess,$created_at])) {
					// code...
					 $this->dbh->commit();
						$this->response = $this->alert->alert_msg($subject." Registered Successfully","success")."<script>setTimeout(()=>{
							window.location.reload();
						},2500);</script>";
				}else{
						$this->response = $this->alert->alert_msg("Something went wrong, Please try again ...","danger");
				}
				} catch (PDOException $e) {
					 $this->dbh->rollback();
   $this->response  =$this->alert->alert_msg("This error Occurred: ".$e->getMessage(),"danger");
				}
			}
		}
		return $this->response;
	}
	//show all my registered exam subject
	public function all_my_registered_exam_subejcts($stdId,$stdRegNo,$stdGrade,$school_sess){
		$this->stmt =$this->dbh->prepare("SELECT * FROM `register_exam_subject_tbl` WHERE std_id=? AND stdRegNo=? AND stdGrade=? AND schl_Sess=?");
		$this->stmt->execute(array($stdId,$stdRegNo,$stdGrade,$school_sess));
		if ($this->stmt->rowCount()>0) {
			// code...
			$this->response = $this->stmt->fetchAll();
			//$this->dbh->close();
		}else{
			$this->response = false;
		}
		return $this->response;
		unset($this->dbh);
	}

	//unregister my exam subject
	public function unregistered_exam_subject($examRegId,$stdId){
		if (!$this->config->isEmptyStr($examRegId) && !$this->config->isEmptyStr($stdId)) {
			// proceed to delete exam sbuject
			try {
				$this->dbh->beginTransaction();
				$this->stmt =$this->dbh->prepare("DELETE FROM `register_exam_subject_tbl` WHERE subId=? AND std_id=? LIMIT 1");
				if ($this->stmt->execute(array($examRegId,$stdId))) {
					$this->dbh->commit();
					$this->response = $this->alert->alert_msg("Selected subject removed successfully","success")."<script>setTimeout(()=>{
							window.location.reload();
						},1500);</script>";
				}
			} catch (PDOException $e) {
				 $this->dbh->rollback();
    $this->response  =$this->alert->alert_msg("Failed to Unregister Subject: This error Occurred: ".$e->getMessage(),"danger");
			}

		}
		return $this->response;
	}

	public function submit_written_classnote($data){
		//collect form data
		$stdId = $this->config->Clean($data['stdId']);
		$stdRegNo = $this->config->Clean($data['stdRegCode']);
		$teacher =$this->config->Clean($data['subject_teacher']);
		$topic = $this->config->Clean($data['topic']);
		$sub_topic = $this->config->Clean($data['subtopic']);
		$subject = $this->config->Clean($data['subject_id']);
		$term = $this->config->Clean($data['academic_term']);
		$school_sess = $this->config->Clean($data['school_sess']);
		$note_content = $data['note_content'];
		$student_class = $this->config->Clean($data['student_class']);
		$bypass = $this->config->Clean($data['bypass']);
		if ($this->config->isEmptyStr($bypass) || $bypass!==md5("oiza1")) {
			// code...
			$this->response = $this->alert->alert_msg("Unathorized access Detected!","warning");
		}else
		//check for any empty fields
		if ($this->config->isEmptyStr($stdId) || $this->config->isEmptyStr($stdRegNo) ||
		 $this->config->isEmptyStr($teacher) || $this->config->isEmptyStr($topic) ||
		 $this->config->isEmptyStr($sub_topic) || $this->config->isEmptyStr($subject) ||
		 $this->config->isEmptyStr($note_content) ||$this->config->isEmptyStr($student_class)) {
			// code...
			$this->response = $this->alert->alert_msg("Please check all your inputs and try again ...","danger");
		}else{
			//lets check if this  actual topic has been submitted via this student
			$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_classnote_tbl` WHERE std_id=? AND class=? AND subjectId=? AND topic=? AND teacher_id=? AND term=? AND session=? LIMIT 1");
			$this->stmt->execute([$stdId,$student_class,$subject,$topic,$teacher,$term,$school_sess]);
			/*tablename: noteId, std_id,reg_number,class,subjectId,topic,subtopic,note_content teacher_id,term,session,created_on*/
			if ($this->stmt->rowCount()==1) {
				// code...
				$this->response = $this->alert->alert_msg(" This Note already submitted!","danger");
			}else{
				try {
					$this->dbh->beginTransaction();
					$created_at = date("Y-m-d");
				//let's create the new note for the selected subject
				$this->stmt =$this->dbh->prepare("INSERT INTO `visap_classnote_tbl` (std_id,reg_number,class,subjectId,topic,subtopic,note_content,teacher_id,term,session,created_on) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
				//execute
				if ($this->stmt->execute(array(
					$stdId,$stdRegNo,$student_class,
					$subject,$topic,$sub_topic,
					$note_content,$teacher,$term,
					$school_sess,$created_at
				))) {
					$this->dbh->commit();
					$this->response = $this->alert->alert_msg($subject." Note Submiited Successfully","success")."<script>setTimeout(()=>{
							window.location.reload();
						},1500);</script>";
				}else{
					$this->response = $this->alert->alert_msg("Something went wrong, Please try again ...","danger");
				}
				} catch (Exception $e) {
					 $this->dbh->rollback();
    $this->response  =$this->alert->alert_msg("Failed to Submit Classnote: Error Occurred: ".$e->getMessage(),"danger");
				}
			}
		}
		return 	$this->response;
	}

	//fetch all classnote by student id
	public function get_ClassnoteByStudentId($ses_id,$stdAdmNo,$std_class){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_classnote_tbl` WHERE std_id=? AND reg_number=? AND class=? ORDER BY noteId DESC");
		$this->stmt->execute([$ses_id,$stdAdmNo,$std_class]);
		if ($this->stmt->rowCount() >0) {
			// code...
			$this->response =$this->stmt->fetchAll();
		}else{
$this->response = false;
		}

		return $this->response;
	}

	public function get_all_my_assessments_by_filter($stdId,$stdRegNo,$stdGrade,$term,$aca_session){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE studentId=? AND stdRegCode=? AND studentGrade=? AND term=? AND aca_session=? ORDER BY uploadedDate DESC");
		$this->stmt->execute(array($stdId,$stdRegNo,$stdGrade,$term,$aca_session));
		if ($this->stmt->rowCount()>0) {
			// code...
			$this->response = $this->stmt->fetchAll();
		}else{
			$this->response = false;
		}
		return $this->response;
	}

	//
	public function get_all_my_assessments_by_student_id($stdId,$stdRegNo,$stdGrade){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE studentId=? AND stdRegCode=? AND studentGrade=? ORDER BY uploadedDate DESC");
		$this->stmt->execute(array($stdId,$stdRegNo,$stdGrade));
		if ($this->stmt->rowCount()>0) {
			// code...
			$this->response = $this->stmt->fetchAll();
		}else{
			$this->response = false;
		}
		return $this->response;
	}

	public function logout($id){
		$this->stmt = $this->dbh->prepare("UPDATE {$this->table_name} SET is_online=0 WHERE stdId=? LIMIT 1");
		if ($this->stmt->execute([$id])) {
			$this->response = true;
			return $this->response;
			unset($this->dbh);
		}
	}

	public function get_students_byClassDesc($grade_desc){
		$status ="Active";
		$this->stmt = $this->dbh->prepare("SELECT *,concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM $this->table_name WHERE studentClass=? AND stdAdmStatus=?");
		$this->stmt->execute([$grade_desc,$status]);
		if ($this->stmt->rowCount()>0) {
			$this->response =$this->stmt->fetchAll();
			return $this->response;
			unset($this->dbh);
		}
	}

	public function getStudentsByClassName($grade_desc){
		$status ="Active";
		$this->stmt = $this->dbh->prepare("SELECT *,concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM $this->table_name WHERE studentClass=? AND stdAdmStatus=?");
		$this->stmt->execute([$grade_desc,$status]);
		if ($this->stmt->rowCount()>0) {
			$this->response =$this->stmt->fetchAll();
			return $this->response;
			unset($this->dbh);
		}
	}

	/*REGISTER STUDENT MANUALLY*/
	public function register_student_manually($d){
		$surName = $this->config->Clean($d['student_surname']);
		$firstName = $this->config->Clean($d['student_first_name']);
		$middleName = $this->config->Clean($d['student_middle_name']);
		$address = $this->config->Clean($d['student_home_address']);
		$Dob = $this->config->Clean(date("Y-m-d",strtotime($d['student_dob'])));
		$Gender = $this->config->Clean($d['student_gender']);
		$student_email = $this->config->Clean($d['student_email']);
		$student_phone = $this->config->Clean($d['student_phone']);
		$student_username = $this->config->Clean($d['student_username']);
		//$student_password = $this->config->Clean($d['student_password']);
		$student_class = $this->config->Clean($d['student_class']);
		$adm_date = $this->config->Clean(date("Y-m-d",strtotime($d['admission_date'])));
		$auth_pass2 = $this->config->Clean($d['auth_pass2']);
	
		if ($this->config->isEmptyStr($surName) || $this->config->isEmptyStr($firstName) || $this->config->isEmptyStr($middleName) || $this->config->isEmptyStr($address) || $this->config->isEmptyStr($Dob) || $this->config->isEmptyStr($Gender) || $this->config->isEmptyStr($student_email) || $this->config->isEmptyStr($student_username) || $this->config->isEmptyStr($student_class) || $this->config->isEmptyStr($adm_date) || $this->config->isEmptyStr($auth_pass2)) {
			$this->response =$this->alert->alert_toastr("warning","Some Important fields are missing","GSSOTA SAYS");
		}elseif (!$this->config->is_Valid_Email($student_email)) {
			$this->response =$this->alert->alert_toastr("warning","<$student_email> is not a valid e-mail address!","GSSOTA SAYS");
		}elseif ($auth_pass2 !== __OSO__CONTROL__KEY__) {
			$this->response =$this->alert->alert_toastr("error","Invalid Authentication Code entered!","GSSOTA SAYS");
		}elseif ($this->config->check_single_data('visap_staff_tbl','staffEmail',$student_email)) {
				$this->response = $this->alert->alert_toastr("warning","$student_email is already taken, Please try another email address!","GSSOTA SAYS");
				}elseif ($this->config->check_single_data('visap_student_tbl','stdEmail',$student_email)) {
	$this->response = $this->alert->alert_toastr("warning","$student_email is already taken on this Portal, Please try another!","GSSOTA SAYS");
				}else{
					$default_pass = "student";
					$hashed_password = $this->config->encrypt_user_password("student");
				$stdRegNo = self::generate_admission_number();
			 $confirmation_code = substr(md5(uniqid(mt_rand(),true)),0,14);
			 $reg_date = date("Y-m-d");
			 $student_type ="Day";
			 $admitted ="Active";
			 //$portal_email = $student_username."@portal.gssota";
			 try {
			 	 $this->dbh->beginTransaction();
			 	$this->stmt = $this->dbh->prepare("INSERT INTO $this->table_name (stdRegNo,stdEmail,stdUserName,stdPassword,studentClass,stdSurName,stdFirstName,stdMiddleName,stdDob,stdGender,stdAddress,stdPhone,stdAdmStatus,stdApplyDate,stdApplyType,stdConfToken) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
			 	if ($this->stmt->execute(array($stdRegNo,$student_email,$student_username,$hashed_password,$student_class,$surName,$firstName,$middleName,$Dob,$Gender,$address,$student_phone,$admitted,$adm_date,$student_type,$confirmation_code))) {
		 $this->dbh->commit();
						$this->response = $this->alert->alert_toastr("success","$surName $firstName $middleName Registered Successfully","GSSOTA SAYS")."<script>setTimeout(()=>{
							window.location.reload();
						},2500);</script>";
			 	}else{
				$this->response = $this->alert->alert_toastr("error","Something went wrong, Please try again ...","GSSOTA SAYS");
			 	}
			 	
			 } catch (PDOException $e) {
			$this->dbh->rollback();
   $this->response  =$this->alert->alert_msg("Error Occurred: ".$e->getMessage(),"danger"); 	
			 }
				}
				return $this->response;
				unset($this->dbh);
	}
	/*REGISTER STUDENT MANUALLY*/

	public function count_student_today_birthday(){
		$today= date("m-d");
		$this->stmt = $this->dbh->prepare("SELECT count(`stdId`) as cnt FROM {$this->table_name} WHERE stdDob LIKE ?");
		$this->stmt->execute(['%'.$today]);
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response =$rows->cnt;
			return $this->response;
			unset($this->dbh);
		}
		
	}


	//get student list in dropDown
	public function get_students_InDropDown(){
		$this->response ="";
	$this->stmt = $this->dbh->prepare("SELECT stdId,studentClass,concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM {$this->table_name} ORDER BY stdRegNo ASC");
			$this->stmt->execute();
			if ($this->stmt->rowCount()>0) {
			while ($row = $this->stmt->fetch()) {
		$this->response.='<option value="'.$row->stdId.'">'.$row->full_name.' &raquo; '.$row->studentClass.'</option>';
		return $this->response;
			}
			}
			
	}
//NEW UPDATES
public function assign_new_school_prefect($data){
	$office_name = $this->config->Clean($data['student_office_name']);
	$studentId = $this->config->Clean($data['student_uniq_id']);
	$session = $this->config->Clean($data['school_session']);
	$auth_pass = $this->config->Clean($data['auth_pass']);
	$date = date("Y-m-d");
	if ($this->config->isEmptyStr($studentId)) {
		$this->response = $this->alert->alert_toastr("warning","Select the student you want to assign!","GSSOTA SAYS");
	}elseif ($this->config->isEmptyStr($office_name)) {
	$this->response = $this->alert->alert_toastr("warning","Please enter the Assign Office to continue!","GSSOTA SAYS");
	}elseif ($this->config->isEmptyStr($auth_pass)) {
	$this->response = $this->alert->alert_toastr("warning","You need to Authenticate this action to proceed!","GSSOTA SAYS");
	}elseif ($auth_pass!== __OSO__CONTROL__KEY__) {
	$this->response = $this->alert->alert_toastr("error","Invalid Authentication Code Detected!","GSSOTA SAYS");
	}else{
		$student_data = self::get_student_data_byId($studentId);
		$student_class = $student_data->studentClass;
		//check for duplicate office
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_prefect_tbl` WHERE student_id=? AND studentGrade=? AND school_session=? LIMIT 1");
		$this->stmt->execute(array($studentId,$student_class,$session));
		if ($this->stmt->rowCount() ==1) {
	$this->response = $this->alert->alert_toastr("warning","This Student is already an active Prefect!","GSSOTA SAYS");
		}else{
try {
					$this->dbh->beginTransaction();
					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_school_prefect_tbl`(student_id,studentGrade,officeName,school_session,created_on) VALUES(?,?,?,?,?);");
					if ($this->stmt->execute(array($studentId,$student_class,$office_name,$session,$date))) {
					$this->dbh->commit();
				$this->response = $this->alert->alert_toastr("success","$student_data->full_name is Now assigned as the $office_name Successfully, Please wait... ","GSSOTA SAYS")."<script>setTimeout(()=>{
				window.location.reload();
			},1500);</script>";
					}
						
					} catch (PDOException $e) {
				$this->dbh->rollback();
					$this->response  = $this->alert->alert_toastr("error","Assigning Failed! Please try again...: Error: ".$e->getMessage(),"GSSOTA SAYS");
					}
		}
	}

	return $this->response;
	unset($this->dbh);
}

//get all prefects
public function get_all_prefect_list(){
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_prefect_tbl` WHERE activeness='1' ORDER BY school_session DESC");
	$this->stmt->execute();
	if ($this->stmt->rowCount()>0) {
		$this->response = $this->stmt->fetchAll();
		return $this->response;
		unset($this->dbh);
	}
}

public function remove_student_from_office_now($prefectId){
	if (!$this->config->isEmptyStr($prefectId)) {
			try {
		$this->dbh->beginTransaction();
	//Delete the selected Prefect
		$this->stmt = $this->dbh->prepare("DELETE FROM `visap_school_prefect_tbl` WHERE prefectId=? LIMIT 1");
		if ($this->stmt->execute([$prefectId])) {
			 $this->dbh->commit();
			$this->response = $this->alert->alert_toastr("success","Deleted Successfully","GSSOTA SAYS")."<script>setTimeout(()=>{
			window.location.reload();
			},1500);</script>";
		}
			} catch (PDOException $e) {
		$this->dbh->rollback();
    $this->response  = $this->alert->alert_toastr("error","Failed: Error Occurred: ".$e->getMessage(),"GSSOTA SAYS");
			}
		}
		return $this->response;
		unset($this->dbh);
}

public function get_prefect_ById($prefectId){
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_prefect_tbl` WHERE prefectId=? LIMIT 1");
	$this->stmt->execute([$prefectId]);
	if ($this->stmt->rowCount()==1) {
		$this->response = $this->stmt->fetch();
		return $this->response;
		unset($this->dbh);
	}
}

public function update_student_office_now($data){
	$prefect_id = $this->config->Clean($data['prefect_id']);
	$tenure = $this->config->Clean($data['tenure']);
	$updated_office = $this->config->Clean($data['updated_office']);
	$auth_pass = $this->config->Clean($data['passcode']);
	if ($this->config->isEmptyStr($updated_office)) {
	$this->response = $this->alert->alert_toastr("error","Select the Office you want to update to","GSSOTA SAYS");
	}elseif ($this->config->isEmptyStr($auth_pass)) {
	$this->response = $this->alert->alert_toastr("error","Enter an Authentication Password to Continue","GSSOTA SAYS");
	}elseif ($auth_pass!== __OSO__CONTROL__KEY__) {
	$this->response = $this->alert->alert_toastr("error","Invalid Authentication Password Entered","GSSOTA SAYS");
	}else{
		 try {
			 	 $this->dbh->beginTransaction();
			 	$this->stmt = $this->dbh->prepare("UPDATE `visap_school_prefect_tbl` SET officeName=? WHERE prefectId=? AND school_session=? LIMIT 1");
			 	if ($this->stmt->execute(array($updated_office,$prefect_id,$tenure))) {
		 $this->dbh->commit();
				$this->response = $this->alert->alert_toastr("success","Office Updated Successfully","GSSOTA SAYS")."<script>setTimeout(()=>{
							window.location.reload();
						},2500);</script>";
			 	}else{
				$this->response = $this->alert->alert_toastr("error","Something went wrong, Please try again ...","GSSOTA SAYS");
			 	}
			 } catch (PDOException $e) {
			$this->dbh->rollback();
   $this->response = $this->alert->alert_msg("Error Occurred: ".$e->getMessage(),"danger"); 	
			 }
	}
	return $this->response;
		unset($this->dbh);
}

}
