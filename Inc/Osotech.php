<?php
@session_start();
@ob_start(); 
require_once 'Database.php';
//include_once 'ResizeImage.php';
//include_once 'Osotech_mailing.php';
class Osotech{
	protected $response;
	private $dbh;
	protected $alert;
	protected $stmt;
	protected $passport;

	public function __construct(){
		if (substr($_SERVER['REQUEST_URI'], -4) == ".php" or (stripos($_SERVER['REQUEST_URI'], ".php")== true)) {
      self::redirect_root("404");
    
    }
    //$ResizeImage = new ResizeImage($this->passport);
    $Database = new Database();
    $this->dbh = $Database->Osotech_connect();
	}

	public function osotech_session_kick(){
		 @session_start();
	}
	public function check_resultmi_session(){
		if (!isset($_SESSION['resultmi']) || $_SESSION['resultmi'] =="") {
			header("Location: ".RESULT_ROOT);
			exit();
		}
	}

	public function redirect_root($flink){
		header("Location: ".APP_ROOT.$flink);
		exit();
	}

	 public function clean_($data){
 	if (!empty($data)) {
 	$string = trim($data);
 	$string = stripslashes($string);
	$string = filter_var($string,FILTER_SANITIZE_STRING);
	$string= htmlspecialchars($string);
	return $string;
 	}
 }

 function saltifyID($string){
		return urlencode(base64_encode($string));
	}

 function unsaltifyID($string){
		return base64_decode(urldecode($string));
	}

public function alert_msg($msg="",$type="warning"){
		$this->alert ='<div class="alert alert-'.$type.' alert-dismissible" role="alert"><strong>'.$msg.'</strong></div>';
 		return $this->alert;
	}

public function get_classroom_InDropDown_list(){
		$this->response ="";
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_class_grade_tbl` ORDER BY gradeDesc ASC LIMIT 30");
			$this->stmt->execute();
			if ($this->stmt->rowCount()>0) {
			while ($row = $this->stmt->fetch()) {
		$this->response.='<option value="'.$row->gradeDesc.' '.$row->grade_division.'">'.$row->gradeDesc.' '.$row->grade_division.'</option>';
			}
			}else{
				$this->response = false;
			}
			return $this->response;
	}

	//fetch all session list
	public function get_all_session_lists(){
		$this->response ="";
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_session_list` ORDER BY session_desc ASC LIMIT 30");
			$this->stmt->execute();
			if ($this->stmt->rowCount()>0) {
			while ($row = $this->stmt->fetch()) {
		$this->response.='<option value="'.$row->session_desc.'">'.$row->session_desc.'</option>';
		return $this->response;
		unset($this->dbh);
			}
			}
			
	}

public function check_single_data($table,$field,$field_val){
	$this->stmt=$this->dbh->prepare("SELECT * FROM {$table} WHERE {$field}=? LIMIT 1");
		$this->stmt->execute(array($field_val));
		if ($this->stmt->rowCount()==1) {
			$this->response = true;
			return $this->response;
			unset($this->dbh);
		}
  }
  public function isEmptyStr($str){
	return ($str === "" || empty($str))? true : false;
	}
	 public function is_Valid_Email($email){
    if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $this->response = true;
    }else{
      $this->response = false;
    }
    return $this->response;
  }

  public function check_string_lenght_greater(int $len,$string){
  if (!self::isEmptyStr($string) && is_string($string)) {
    $result = (strlen($string) > $len) ? true : false;
  }
}
public function check_string_lenght_lesser(int $len,$string){
  if (!self::isEmptyStr($string) && is_string($string)) {
    $result = (strlen($string) < $len) ? true : false;
  }
}

public function allowed_result_checking(){
    return true;
  }

//code to check the student results
  public function check_student_result_now($data){
  	$stdRegNo = self::clean_(strtoupper($data['student_reg_number']));
		$stdGrade = self::clean_($data['result_class']);
		$stdSession = self::clean_($data['result_session']);
		$stdTerm = self::clean_($data['result_term']);
		$cardPin = self::clean_($data['cardPin_']);
		$cardSerial = self::clean_($data['cardSerial_']);
		$counter =1;
		//let's check if any of the submitted inputs is null
		if (!self::check_user_activity_allowed("result_checking")) {
		$this->response =self::alert_msg("Checking of Result is currently not allowed on this Portal!","danger");
		}else
		if (self::isEmptyStr($stdRegNo)) {
		$this->response = self::alert_msg("Student Admission No is Required!","danger");
		}elseif (self::isEmptyStr($stdGrade)) {

	$this->response = self::alert_msg("Student Class is Required!","danger");

		}elseif (self::isEmptyStr($stdSession)) {

	$this->response = self::alert_msg("Result Session is Required!","danger");

		}elseif (self::isEmptyStr($stdTerm)) {

	$this->response = self::alert_msg("Result Term is Required!","danger");

		}elseif (self::isEmptyStr($cardPin)) {

	$this->response = self::alert_msg("Scratch Card Pin is Required!","danger");

		}elseif (self::isEmptyStr($cardSerial)) {

	$this->response = self::alert_msg("Please enter Card Serial Number to continue!","danger");

		}else{
		//let's check any invalid inputs
	if (!self::check_single_data("visap_student_tbl","stdRegNo",$stdRegNo)) {
	$this->response = self::alert_msg("Invalid Admission Number!","danger");
			}elseif ((strlen($cardPin)>14) || (strlen($cardPin)<14)) {
				// code...
$this->response = self::alert_msg("Invalid Scratch Card Pin Number!","danger");
			}else{
//lets check the pin if exists in our system
	$this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_result_pins` WHERE pin_code=? AND pin_serial=? LIMIT 1");
	$this->stmt->execute(array($cardPin,$cardSerial));
	//lets check the pin if exists in our system
	if ($this->stmt->rowCount()==1) {
		// the Pin Exists...
		//now let's check the status of the entered pin
		$pin_data = $this->stmt->fetch();
		$status = $pin_data->pin_status;
		$PinId = $pin_data->pin_id;
		//unset($this->dbh);
		if ($status =='1') {
			// pin has ben used let'a get the useer details from pin history
	$this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_result_pins_history`WHERE pin_code=? AND pin_serial=? AND used_term=? AND used_session=? LIMIT 1");
	$this->stmt->execute(array($cardPin,$cardSerial,$stdTerm,$stdSession));
		if ($this->stmt->rowCount()==1) {
			//grab the regNo of the Checker and Compare
			$pin_hitory_data = $this->stmt->fetch();
			$usedCounter = $pin_hitory_data->pin_counter;
			$userRegNo = $pin_hitory_data->studentRegNo;
			$phId = $pin_hitory_data->pinId;
			if ($stdRegNo !== $userRegNo) {
		$this->response = self::alert_msg("This Pin has been used by another Student!","danger");
			}elseif ($usedCounter >= '5') {
		$this->response = self::alert_msg("You Have Exhausted Your Time Usage Validity of this Pin!","danger");
			}else{
		//let's increase the counter 
	//$pin_counter = $counter++;
	$this->stmt = $this->dbh->prepare("UPDATE `tbl_result_pins_history` SET pin_counter=pin_counter+1 WHERE pinId=? LIMIT 1");
	if ($this->stmt->execute(array($phId))) {
		//get the result details
		//reportId
$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE stdRegCode=? AND studentGrade=? AND term=? AND aca_session=?");
	$this->stmt->execute(array($stdRegNo,$stdGrade,$stdTerm,$stdSession));
		if ($this->stmt->rowCount()> 0) {
	while($result_data = $this->stmt->fetch()){
			$result_id = $result_data->reportId;
			$result_opened = $result_data->rStatus;
			if ($result_opened =='2') {
		// create a session result Id...
		$_SESSION['resultmi'] = $result_id;
		$_SESSION['pin'] = $cardPin;
		$_SESSION['serial'] = $cardSerial;
		$_SESSION['result_regNo'] = $stdRegNo;
		$_SESSION['result_class'] = $stdGrade;
		$_SESSION['result_term'] = $stdTerm;
		$_SESSION['result_session'] = $stdSession;
		switch ($_SESSION['result_term']) {
			case '1st Term':
				$student_result_page =APP_ROOT."e-result/reportcard?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
				break;
				case '2nd Term':
			$student_result_page =APP_ROOT."e-result/secondtermresult?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
				break;
					case '3rd Term':
			$student_result_page =APP_ROOT."e-result/thirdtermresult?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
				break;
		}
		$this->response = '<script>setTimeout(()=>{
			window.open("'.$student_result_page.'","_blank", "top=100, left=100, width=800, height=700");$("#checkResultForm")[0].reset();
		},1000)</script>';
			}elseif ($result_opened =='3') {
	$this->response = self::alert_msg("This Result is Held, Please contact your Admin!","danger");
			}
			else{
	$this->response = self::alert_msg("Result not yet released, Try again later!","danger");
			}
		}
		}else{
$this->response = self::alert_msg("Sorry :) No Result Found!!!","danger");
		}
	}
			}
		}else{
			$this->response = self::alert_msg("This Pin has been used by YOU!","danger");
		}
		}else{
	//lets start afresh for this pin
	$this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_result_pins_history` WHERE studentRegNo=? AND student_class=? AND pin_code=? AND pin_serial=? AND used_term=? AND used_session=? LIMIT 1");
	$this->stmt->execute(array($stdRegNo,$stdGrade,$cardPin,$cardSerial,$stdTerm,$stdSession));
	if ($this->stmt->rowCount()=='0') {
		//create pin used history
		$updated_pin_status =1;
	try {
		$this->dbh->beginTransaction();
	$this->stmt = $this->dbh->prepare("INSERT INTO `tbl_result_pins_history` (studentRegNo,student_class,pin_code,pin_serial,pin_counter,used_term,used_session) VALUES (?,?,?,?,?,?,?);");
	if ($this->stmt->execute(array($stdRegNo,$stdGrade,$cardPin,$cardSerial,$counter,$stdTerm,$stdSession))) {
// update the pin status so that it cannot be used again by another
	$this->stmt = $this->dbh->prepare("UPDATE `tbl_result_pins` SET pin_status=? WHERE pin_id=? LIMIT 1");
	if ($this->stmt->execute(array($updated_pin_status,$PinId))) {
	//get the result details
		//reportId
$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE stdRegCode=? AND studentGrade=? AND term=? AND aca_session=?");
	$this->stmt->execute(array($stdRegNo,$stdGrade,$stdTerm,$stdSession));
		if ($this->stmt->rowCount()> 0) {
		$this->dbh->commit();
	while($result_data = $this->stmt->fetch()){
			$result_id = $result_data->reportId;
			$result_opened = $result_data->rStatus;
			if ($result_opened =='2') {
		// create a session result Id...
		$_SESSION['pin'] = $cardPin;
		$_SESSION['serial'] = $cardSerial;
		$_SESSION['resultmi'] = $result_id;
		$_SESSION['result_regNo'] = $stdRegNo;
		$_SESSION['result_class'] = $stdGrade;
		$_SESSION['result_term'] = $stdTerm;
		$_SESSION['result_session'] = $stdSession;
		switch ($_SESSION['result_term']) {
			case '1st Term':
				$student_result_page =APP_ROOT."e-result/reportcard?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
				break;
				case '2nd Term':
			$student_result_page =APP_ROOT."e-result/secondtermresult?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
				break;
					case '3rd Term':
			$student_result_page =APP_ROOT."e-result/thirdtermresult?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
				break;
		}
		$this->response = '<script>setTimeout(()=>{
			window.open("'.$student_result_page.'","_blank", "top=100, left=100, width=800, height=700");$("#checkResultForm")[0].reset();
		},1000)</script>';
			}elseif ($result_opened =='3') {
	$this->response = self::alert_msg("This Result is Held, Please contact your Admin!","danger");
			}
			else{
	$this->response = self::alert_msg("Result not yet released, Try again later!","danger");
			}
		}
		}else{
$this->response = self::alert_msg("Sorry :) No Result Found!!!","danger");
		}
	}

	}
		
	} catch (PDOException $e) {
		$this->dbh->rollback();
	$this->response = self::alert_msg("Sorry :) No Result Found!!!","danger");
	}
	}

		}
	}else{
		//pin does not exists
	$this->response = self::alert_msg("The Pin you entered does not Exists!","danger");
	}
			}
		}
		return $this->response;
		unset($this->dbh);
  }
  //GET RESULT DATA
  public function get_session_result_details($resultmi){
  	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE reportId=?");
  	$this->stmt->execute(array($resultmi));
  	if ($this->stmt->rowCount()>0) {
  		$this->response = $this->stmt->fetchAll();
  		return $this->response;
  		unset($this->dbh);
  	}
  }

  //STUDENT DATA BY REGNO
  public function get_student_details_byRegNo($stdRegNo){
  	$this->stmt = $this->dbh->prepare("SELECT *, concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM `visap_student_tbl` WHERE stdRegNo=? LIMIT 1");
  	$this->stmt->execute(array($stdRegNo));
  	if ($this->stmt->rowCount()==1) {
  		$this->response = $this->stmt->fetch();
  		return $this->response;
  		unset($this->dbh);
  	}
  }

  //GET SCHOOL Ssession info
  //
  public function get_school_session_info(){
  	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_session_tbl` LIMIT 1");
  	$this->stmt->execute();
  	if ($this->stmt->rowCount()==1) {
  		$this->response = $this->stmt->fetch();
  		return $this->response;
  		unset($this->dbh);
  	}
  }

  //GET STUDENT ATTENDANCE INFO
  public function get_student_attendance_details($stdRegNo,$stdGrade,$rollType,$term,$session){
$this->stmt = $this->dbh->prepare("SELECT count(`attend_id`) as cnt FROM `visap_class_attendance_tbl` WHERE stdReg=? AND studentGrade=? AND roll_call=? AND term=? AND schl_session=?");
$this->stmt->execute(array($stdRegNo,$stdGrade,$rollType,$term,$session));
if ($this->stmt->rowCount()>0) {
	$rollCall = $this->stmt->fetch();
	$this->response = $rollCall->cnt;
	return $this->response;
		unset($this->dbh);
}
  }

  public function get_student_grade_marks($gClass,$markObtained){
  	//grade_class,mark_grade,score_from,score_to,score_remark,school_ses
  	$this->response ="";
  	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_result_grading_tbl` WHERE `grade_class`=? AND ? >= `score_from` AND ? <= `score_to`");
  	$this->stmt->execute(array($gClass,$markObtained,$markObtained));
  	if ($this->stmt->rowCount()>0) {
  		$response = $this->stmt->fetchAll();
  		foreach ($response as  $value) {
  		$this->response = $value;
  		}
  		return $this->response;
  		unset($this->dbh);
  	}

  }

  //get student age in number
	public function get_student_age($dateOfBirth){
		$today = date("Y-m-d");
	$diff = date_diff(date_create($dateOfBirth), date_create($today));
return $diff->format('%y');
	}

	//Validate a date input
	public function isValid_Date($date, $format = 'Y-m-d'){
    $dt = DateTime::createFromFormat($format, $date);
    return $dt && $dt->format($format) === $date;
  }

  //get scratch card usage details
  public function get_scratch_card_usage($pin,$serial,$stdRegNo){
$this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_result_pins_history` WHERE pin_code=? AND pin_serial=? AND studentRegNo=? LIMIT 1");
$this->stmt->execute(array($pin,$serial,$stdRegNo));
if ($this->stmt->rowCount()==1) {
	$res = $this->stmt->fetch();
	$this->response = $res->pin_counter;
	return $this->response;
	unset($this->dbh);
}

  }

    public function get_admission_scratch_card_usage($stdRegNo){
$this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_reg_pins` WHERE usedBy=? AND pin_status=1 LIMIT 1");
$this->stmt->execute(array($stdRegNo));
if ($this->stmt->rowCount()==1) {
	$this->response = $this->stmt->fetch();
	return $this->response;
	unset($this->dbh);
}

  }

  public function check_user_activity_allowed($module){
    $status ='1';
    $this->stmt = $this->dbh->prepare("SELECT * FROM `api_module_config` WHERE module=? AND status=? LIMIT 1");
    $this->stmt->execute(array($module,$status));
    if ($this->stmt->rowCount()==1) {
      $this->response = true;
      return $this->response;
       unset($this->dbh);
    }
  }

  public function check_portal_status(){
  	$status ='1';
    $this->stmt = $this->dbh->prepare("SELECT * FROM `api_module_config` WHERE module='maintenance_mode' AND status='2' LIMIT 1");
    $this->stmt->execute();
    if ($this->stmt->rowCount()==1) {
      $this->response = true;
      return $this->response;
       unset($this->dbh);
    }
  }
  
   public function get_class_teacher_class_name($stdGrade){
  	$staffRole = "Class Teacher";
$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_tbl` WHERE staffGrade=? AND staffRole=? LIMIT 1");
$this->stmt->execute(array($stdGrade,$staffRole));
if ($this->stmt->rowCount()==1) {
	$this->response = $this->stmt->fetch();
	return $this->response;
	unset($this->dbh); 
}
  }


  public function get_principal_info(){
  	$staffRole = "Principal";
  	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_tbl` WHERE  staffRole=? LIMIT 1");
$this->stmt->execute(array($staffRole));
if ($this->stmt->rowCount()==1) {
	$this->response = $this->stmt->fetch();
	return $this->response;
	unset($this->dbh); 
}
  }

  public function get_student_result_comment_details($admision_no,$stdGrade,$term,$session){
$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_result_comment_tbl` WHERE stdRegNo=? AND stdGrade=? AND term=? AND schl_Sess=? LIMIT 1");
$this->stmt->execute(array($admision_no,$stdGrade,$term,$session));
if ($this->stmt->rowCount()==1) {
	$this->response = $this->stmt->fetch();
	return $this->response;
	unset($this->dbh); 
}
  }
  /*ADMISSION REGISTRATION STEP ONE*/
	public function start_student_admission_first_step($admission_data){
		$captcha_correct=self::Clean($admission_data['captcha_correct_answer']);
		$user_captcha_anwser=self::Clean($admission_data['user_captcha_anwser']);
		$bypass = self::Clean($admission_data['bypass']);
		$card_pin = self::Clean($admission_data['card_pin']);
		$card_serial = self::Clean($admission_data['card_serial']);
		$stu_class = self::Clean($admission_data['student_class']);
		$stu_phone = self::Clean($admission_data['student_phone']);
		$username = self::Clean($admission_data['username']);
		$stu_email = self::Clean($admission_data['student_email']);
		//check for Auth access
		if (self::isEmptyStr($bypass) || $bypass!=md5("oiza12345")) {
		$this->response = self::alert_msg("Authentication Failed, Please Check your Connection and Try again!","danger");
		}elseif (self::isEmptyStr($card_pin) || self::isEmptyStr($card_serial) || self::isEmptyStr($stu_class) || self::isEmptyStr($stu_phone) || self::isEmptyStr($username) || self::isEmptyStr($stu_email)) {
			$this->response = self::alert_msg("Please fill in all the required fields and Try again!","danger");
		}elseif (!self::is_Valid_Email($stu_email)) {
			$this->response = self::alert_msg("$stu_email is not a valid e-mail address, Please check and Try again!","danger");
		}elseif (self::check_single_data("visap_student_tbl","stdEmail",$stu_email)) {
		$this->response = self::alert_msg("$stu_email is already taken on this portal!","danger");
		}elseif (self::check_single_data("visap_staff_tbl","staffEmail",$stu_email)) {
			$this->response = self::alert_msg("You cannot register with this $stu_email on this portal, its already taken!","danger");
		}
		elseif (!self::validate_Mobile_Number($stu_phone)) {
			$this->response = self::alert_msg("This Phone Number $stu_phone format is not allowed, Use this format: +234**********!","danger");
			//lets check if the PIN character is valid without connecting to db
		}elseif (self::check_string_lenght_greater(15,$card_pin) || self::check_string_lenght_lesser(15,$card_pin)) {
			// code...
			$this->response = self::alert_msg("You have entered an incorrect Card Pin! Re-check Your card Pin & try again...","danger");
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
			$this->response = self::alert_msg("DO NOT PLAY SMART! This Card has been Used!","danger");
				}else{
					//let begin with the registration
					//student Login Credentials
					 $portal_username = $username."@".__OSO_APP_NAME__.".portal";//login email
					 $portal_password =__OSO_APP_NAME__."@portal";//loginpassword
					 $hashed_password = self::encrypt_user_password($portal_password);
				try {
		$this->dbh->beginTransaction();
		$date =date("Y-m-d");
		$time = date("h:i:s");
		$admission_no = self::generate_admission_number();
		$confirmation_code = substr(md5(uniqid(mt_rand(),true)),0,10);
		$this->stmt =$this->dbh->prepare("INSERT INTO `visap_student_tbl`(stdRegNo,stdEmail,stdUserName,stdPassword,studentClass,stdPhone,stdApplyDate,stdConfToken) VALUES(?,?,?,?,?,?,?,?);");
	if ($this->stmt->execute(array($admission_no,$stu_email,$username,$hashed_password,$stu_class,$stu_phone,$date,$confirmation_code))) {
				// grab the LastInsertId...
			$_SESSION['AUTH_SMAPP_APPLICANT_ID'] = $this->dbh->lastInsertId();
			$_SESSION['AUTH_CODE_ADMISSION_NO'] = $admission_no;
			//let change the Pin Used status
			$change_status =1;
	$this->stmt =$this->dbh->prepare("UPDATE `tbl_reg_pins` SET pin_status=?,usedBy=? WHERE pin_id=? LIMIT 1");
	if ($this->stmt->execute(array($change_status,$admission_no,$pinId))) {
				//let create a Pin Used History
		$this->stmt = $this->dbh->prepare("INSERT INTO `reg_pin_history_tbl` (used_by, pin_code,pin_serial,dated,timed) VALUES (?,?,?,?,?);");
		if ($this->stmt->execute(array($admission_no,$pinCode,$pinSerial,$date,$time))) {
			// code...
			$this->dbh->commit();
			$this->response = self::alert_msg("You have successfully completed step one of your online registration!","success")."<script>setTimeout(()=>{
			window.location.href='".ADMISSION_ROOT."step2?applicant=".$admission_no."&page=2';
			},500);</script>";
		}
			}
		}
			} catch (PDOException $e) {
		$this->dbh->rollback();
    $this->response  = self::alert_msg("Error Occurred!: Error Info: ".$e->getMessage(),"danger");
					 }
				}
			}else{
				//show the user that The PIN he/she enters is not found
				$this->response = self::alert_msg("The Card PIN you entered does not exists! check the Pin and try again...","danger");
			}
		}
		return $this->response;
		unset($this->dbh);
	}

	/*ADMISSION REGISTRATION STEP ONE ENDS*/
	/*ADMISSION REGISTRATION STEP TWO*/
	public function start_student_admission_second_step($admission_data){
		$bypass = 			self::Clean($admission_data['bypass']);
		$admission_no = self::Clean($admission_data['admission_no']);
		$applicant_id = self::Clean($admission_data['auth_code_applicant_id']);
		$surname = 			self::Clean($admission_data['surname']);
		$first_name = 	self::Clean($admission_data['first_name']);
		$middle_name = 	self::Clean($admission_data['middle_name']);
		$dateofbirth = 	self::Clean(date("Y-m-d",strtotime($admission_data['dateofbirth'])));
		$gender = 			self::Clean($admission_data['gender']);
		$birth_cert = 	self::Clean($admission_data['birth_cert']);
		$nationality = 	self::Clean($admission_data['nationality']);
		$state_origin = self::Clean($admission_data['state_origin']);
		$localgvt = 		self::Clean($admission_data['localgovt']);
		$hometown = 		self::Clean($admission_data['hometown']);
		$religion = 		self::Clean($admission_data['religion']);
		$home_address = self::Clean($admission_data['home_address']);
		$challenges = 	self::Clean($admission_data['challenges']);
		//check for auth
		if (self::isEmptyStr($bypass) || $bypass!= md5("oiza123456")) {
		$this->response = self::alert_msg("Authentication Failed, Please Check your Connection and Try again!","danger");
		}elseif (self::isEmptyStr($applicant_id) || self::isEmptyStr($admission_no) || self::isEmptyStr($surname) || self::isEmptyStr($first_name) || self::isEmptyStr($middle_name) || self::isEmptyStr($dateofbirth) || self::isEmptyStr($gender) || self::isEmptyStr($birth_cert) || self::isEmptyStr($nationality) || self::isEmptyStr($state_origin) || self::isEmptyStr($localgvt) || self::isEmptyStr($hometown) || self::isEmptyStr($religion) || self::isEmptyStr($home_address) || self::isEmptyStr($challenges)) {
			$this->response = self::alert_msg("Please fill in all the required fields and Try again!","danger");
		}else{
			//continue with the registration steps
			try {
				$this->dbh->beginTransaction();
				//update the student info on student tbl
				$this->stmt = $this->dbh->prepare("UPDATE `visap_student_tbl` SET stdSurName=?,stdFirstName=?, stdMiddleName=?,stdDob=?,stdGender=?,stdAddress=? WHERE stdId=? AND stdRegNo=? LIMIT 1");
				if ($this->stmt->execute(array($surname,$first_name,$middle_name,$dateofbirth,$gender,$home_address,$applicant_id,$admission_no))) {
					// create the student info table
					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_student_info_tbl` (studentId,stdBirthCert,stdCountry,stdSOR,stdLGA,stdHomeTown,stdReligion,stdDisability,stdPermaAdd) VALUES (?,?,?,?,?,?,?,?,?);");
					if ($this->stmt->execute(array($applicant_id,$birth_cert,$nationality,$state_origin,$localgvt,$hometown,$religion,$challenges,$home_address))) {
						$_SESSION['AUTH_SMAPP_APPLICANT_ID'] = $applicant_id;
					$this->dbh->commit();
			$this->response = self::alert_msg("Step Two completed successfully, Pls wait...","success")."<script>setTimeout(()=>{
			window.location.href='".ADMISSION_ROOT."step3?applicant=".$admission_no."&page=3';
			},500);</script>";
					}
				}
				
			} catch (PDOException $e) {
			$this->dbh->rollback();
    $this->response  = self::alert_msg("Error Occurred!: Error Info: ".$e->getMessage(),"danger");
			}
		}
		return $this->response;
		unset($this->dbh);
	}
	/*ADMISSION REGISTRATION STEP TWO*/

	/*ADMISSION REGISTRATION STEP THREE*/
	public function start_student_admission_third_step($admission_data){
		$bypass = 			self::Clean($admission_data['bypass']);
		$admission_no = self::Clean($admission_data['admission_no']);
		$applicant_id = self::Clean($admission_data['auth_code_applicant_id']);
		$mg_title = 			self::Clean($admission_data['mg_title']);
		$mg_name = 	self::Clean($admission_data['mg_name']);
		$mg_relation = 	self::Clean($admission_data['mg_relation']);
		$mg_phone = 			self::Clean($admission_data['mg_phone']);
		$mg_email = 	self::Clean($admission_data['mg_email']);
		$mg_address = 	self::Clean($admission_data['mg_address']);
		$mg_occu = 	self::Clean($admission_data['mg_occu']);
		//Female guardian details
		$fg_title = 			self::Clean($admission_data['fg_title']);
		$fg_name = 	self::Clean($admission_data['fg_name']);
		$fg_relation = 	self::Clean($admission_data['fg_relation']);
		$fg_phone = 			self::Clean($admission_data['fg_phone']);
		$fg_email = 	self::Clean($admission_data['fg_email']);
		$fg_address = 	self::Clean($admission_data['fg_address']);
		$fg_occu = 	self::Clean($admission_data['fg_occu']);
		
		//check for auth
		if (self::isEmptyStr($bypass) || $bypass!= md5("oiza1234567")) {
		$this->response = self::alert_msg("Authentication Failed, Please Check your Connection and Try again!","danger");
		}elseif (self::isEmptyStr($applicant_id) || self::isEmptyStr($admission_no) || self::isEmptyStr($mg_title) || self::isEmptyStr($mg_name) || self::isEmptyStr($mg_relation) || self::isEmptyStr($mg_phone) || self::isEmptyStr($mg_email) || self::isEmptyStr($fg_occu) || self::isEmptyStr($fg_address) || self::isEmptyStr($admission_no) || self::isEmptyStr($fg_title) || self::isEmptyStr($fg_name) || self::isEmptyStr($fg_relation) || self::isEmptyStr($fg_phone) || self::isEmptyStr($fg_email) || self::isEmptyStr($fg_occu) || self::isEmptyStr($fg_address)) {
			$this->response = self::alert_msg("Please fill in all the required fields and Try again!","danger");
		}elseif (!self::is_Valid_Email($mg_email) || !self::is_Valid_Email($fg_email)) {
		$this->response = self::alert_msg("Invalid email address format!","danger");
		}
		else{
			//continue with the registration steps
			try {
				$this->dbh->beginTransaction();
				//update the student info on student tbl
				$this->stmt = $this->dbh->prepare("UPDATE `visap_student_info_tbl` SET stdMGTitle=?,stdMGName=?,stdMGRelationship=?,stdMGPhone=?,stdMGEmail=?,stdMGOccupation=?,stdMGAddress=?, stdFGTitle=?, stdFGName=?,stdFGRelationship=?,stdFGPhone=?,stdFGEmail=?,stdFGOccupation=?,stdFGAddress=? WHERE studentId=? LIMIT 1");
				if ($this->stmt->execute(array($mg_title,$mg_name,$mg_relation,$mg_phone,$mg_email,$mg_occu,$mg_address,$fg_title,$fg_name,$fg_relation,$fg_phone,$fg_email,$fg_occu,$fg_address,$applicant_id))) {
				$_SESSION['AUTH_SMAPP_APPLICANT_ID'] = $applicant_id;
					$this->dbh->commit();
			$this->response = self::alert_msg("Step Three completed successfully, Pls wait...","success")."<script>setTimeout(()=>{
			window.location.href='".ADMISSION_ROOT."step4?applicant=".$admission_no."&page=4';
			},500);</script>";
				}
				
			} catch (PDOException $e) {
			$this->dbh->rollback();
    $this->response  = self::alert_msg("Error Occurred!: Error Info: ".$e->getMessage(),"danger");
			}
		}
		return $this->response;
		unset($this->dbh);
	}
	/*ADMISSION REGISTRATION STEP THREE*/

	/*ADMISSION REGISTRATION STEP FOUR*/
	public function start_student_admission_fourth_step($admission_data,$file){
		$bypass = 			self::Clean($admission_data['bypass']);
		$admission_no = self::Clean($admission_data['admission_no']);
		$applicant_id = self::Clean($admission_data['auth_code_applicant_id']);
		$schoolname = 	self::Clean($admission_data['prev_schoolname']);
		$proprietress = self::Clean($admission_data['proprietress']);
		$schl_phone = 	self::Clean($admission_data['prev_schl_phone']);
		$prev_schl_loca = 	self::Clean($admission_data['prev_schl_loca']);
		$edu_offered = 	self::Clean($admission_data['edu_offered']);
		$category = 	self::Clean($admission_data['category']);
		$present_class = 	self::Clean($admission_data['present_class']);
		$reason_to = 	self::Clean($admission_data['reason_to']);
		$reportsheet_name = $file['report_sheet']['name'];
   	$reportsheet_size = $file['report_sheet']['size']/1024;
   	$reportsheet_temp = $file['report_sheet']['tmp_name'];
   	$reportsheet_error = $file['report_sheet']['error'];
   	$allowed = array("jpg","jpeg","png","pdf");
   	$name_div = explode(".", $reportsheet_name);
   	$image_ext = strtolower(end($name_div));
		
		//check for auth
		if (self::isEmptyStr($bypass) || $bypass!= md5("oiza12345678")) {
		$this->response = self::alert_msg("Authentication Failed, Please Check your Connection and Try again!","danger");
		}elseif (self::isEmptyStr($applicant_id) || self::isEmptyStr($admission_no) || self::isEmptyStr($schoolname) || self::isEmptyStr($proprietress) || self::isEmptyStr($schl_phone) || self::isEmptyStr($prev_schl_loca) || self::isEmptyStr($edu_offered) || self::isEmptyStr($category) || self::isEmptyStr($present_class) || self::isEmptyStr($reason_to) || self::isEmptyStr($reportsheet_name)) {
			$this->response = self::alert_msg("Please fill in all the required fields and Try again!","danger");
		}elseif (!in_array($image_ext, $allowed)) {
			$this->response = self::alert_msg("Your File format is not supported, Only PNG,JPG,JPEG!","danger");
			// 
		}elseif ($reportsheet_size > 50) {
			$this->response = self::alert_msg("Your File Size should not exceed 50KB, Selected file Size is :".number_format($reportsheet_size,2)."KB","danger");
		}elseif ($reportsheet_error !=0) {
			$this->response = self::alert_msg("There was an error Uploading your Report Sheet","danger");
		}
		else{
			//continue with the registration steps
			$student_data = self::get_student_details_byRegNo($admission_no);
    $reportsheet_realName = "report_sheet_".$student_data->stdRegNo.mt_rand(10,9999999).".".$image_ext;
    //lets update the student passport in the db
    $destination = "../eportal/schoolImages/".$reportsheet_realName;
			try {
				$this->dbh->beginTransaction();
				//update the student info on student tbl
				$this->stmt = $this->dbh->prepare("INSERT INTO `visap_stdpreschlinfo` (student_id,stdSchoolName,stdDirectorName,stdSchoolPhone,stdSchLocation,stdSchlCat,stdSchlEduLevel,stdPresentClass,stdReasonInPreClass,stdLastReportSheet) VALUES (?,?,?,?,?,?,?,?,?,?);");
				if ($this->stmt->execute(array($applicant_id,$schoolname,$proprietress,$schl_phone,$prev_schl_loca,$category,$edu_offered,$present_class,$reason_to,$reportsheet_realName))) {
				$_SESSION['AUTH_SMAPP_APPLICANT_ID'] = $applicant_id;
				if (move_uploaded_file($reportsheet_temp, $destination)) {
					$this->dbh->commit();
			$this->response = self::alert_msg("Step Four completed successfully, Pls wait...","success")."<script>setTimeout(()=>{
			window.location.href='".ADMISSION_ROOT."step5?applicant=".$admission_no."&page=5';
			},500);</script>";
				}
					
				}
				
			} catch (PDOException $e) {
			$this->dbh->rollback();
    $this->response  = self::alert_msg("Error Occurred!: Error Info: ".$e->getMessage(),"danger");
			}
		}
		return $this->response;
		unset($this->dbh);
	}
	/*ADMISSION REGISTRATION STEP FOUR*/
	
	/*ADMISSION REGISTRATION STEP FIVE*/
	public function start_student_admission_fifth_step($admission_data){
		$bypass = 			self::Clean($admission_data['bypass']);
		$admission_no = self::Clean($admission_data['admission_no']);
		$applicant_id = self::Clean($admission_data['auth_code_applicant_id']);

		$hospital_name = self::Clean($admission_data['hospital_name']);
		$doctor_name = self::Clean($admission_data['doctor_name']);
		$phone = self::Clean($admission_data['phone']);
		$member_since = self::Clean(date("Y-m-d",strtotime($admission_data['member_since'])));
		$address = self::Clean($admission_data['address']);
		$blood_group = self::Clean($admission_data['blood_group']);
		$genotype = self::Clean($admission_data['genotype']);
		$illness = self::Clean($admission_data['illness']);
		$family_illness = self::Clean($admission_data['family_illness']);
		$hospitalized = self::Clean($admission_data['hospitalized']);
		$surgical_operation = self::Clean($admission_data['surgical_operation']);
		//check for auth
		if (self::isEmptyStr($bypass) || $bypass!= md5("oiza123456789")) {
		$this->response = self::alert_msg("Authentication Failed, Please Check your Connection and Try again!","danger");
		}elseif (self::isEmptyStr($applicant_id) || self::isEmptyStr($admission_no) || self::isEmptyStr($hospital_name) || self::isEmptyStr($doctor_name) || self::isEmptyStr($phone) || self::isEmptyStr($member_since) || self::isEmptyStr($address) || self::isEmptyStr($blood_group) || self::isEmptyStr($genotype) || self::isEmptyStr($illness) || self::isEmptyStr($family_illness) || self::isEmptyStr($hospitalized) || self::isEmptyStr($surgical_operation)) {
			$this->response = self::alert_msg("Please fill in all the required fields and Try again!","danger");
		}
		else{
			//continue with the registration steps
			try {
				$this->dbh->beginTransaction();
				//update the student info on student tbl
				$this->stmt = $this->dbh->prepare("INSERT INTO `visap_stdmedical_tbl` (studId,stdHospitalName,stdHospitalOwner,stdHospitalPhone,stdRegDate,stdHospitalAddress,stdBlood,stdGenotype,stdSickness,stdFamilySickness,stdIsHospitalized,stdSurgical) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
				if ($this->stmt->execute(array($applicant_id,$hospital_name,$doctor_name,$phone,$member_since,$address,$blood_group,$genotype,$illness,$family_illness,$hospitalized,$surgical_operation))) {
				$_SESSION['AUTH_SMAPP_APPLICANT_ID'] = $applicant_id;
				$this->dbh->commit();
			$this->response = self::alert_msg("Step Five completed successfully, Pls wait...","success")."<script>setTimeout(()=>{
			window.location.href='".ADMISSION_ROOT."submitapplication?applicant=".$admission_no."&page=6';
			},500);</script>";
				}
			} catch (PDOException $e) {
			$this->dbh->rollback();
    $this->response  = self::alert_msg("Error Occurred!: Error Info: ".$e->getMessage(),"danger");
			}
		}
		return $this->response;
		unset($this->dbh);
	}
	/*ADMISSION REGISTRATION STEP FIVE*/

	/*ADMISSION REGISTRATION FINAL STEP*/
	public function start_student_admission_final_step($admission_data,$file){
		$bypass = 			self::Clean($admission_data['bypass']);
		$admission_no = self::Clean($admission_data['admission_no']);
		$applicant_id = self::Clean($admission_data['auth_code_applicant_id']);
		$passport_name = $file['student_passport']['name'];
   	$passport_size = $file['student_passport']['size']/1024;
   	$passport_temp = $file['student_passport']['tmp_name'];
   	$passport_error = $file['student_passport']['error'];
   	$allowed = array("jpg","jpeg","png");
   	$name_div = explode(".", $passport_name);
   	$image_ext = strtolower(end($name_div));
		
		//check for auth
		if (self::isEmptyStr($bypass) || $bypass!= md5("oiza123456789")) {
		$this->response = self::alert_msg("Authentication Failed, Please Check your Connection and Try again!","danger");
		}elseif (self::isEmptyStr($applicant_id) || self::isEmptyStr($admission_no)|| self::isEmptyStr($passport_name)) {
			$this->response = self::alert_msg("Please select your passport to continue!","danger");
		}elseif (!in_array($image_ext, $allowed)) {
			$this->response = self::alert_msg("Your File format is not supported, Only PNG,JPG,JPEG!","danger");
			// 
		}elseif ($passport_size > 25) {
			$this->response = self::alert_msg("Your passport Size should not exceed 25KB, Selected file Size is :".number_format($passport_size,2)."KB","danger");
		}elseif ($passport_error !=0) {
			$this->response = self::alert_msg("There was an error Uploading your passport, try again!","danger");
		}
		else{
			//continue with the registration steps
			$student_data = self::get_student_details_byRegNo($admission_no);
    $passport_realName =$student_data->stdRegNo.mt_rand(10,9999999).".".$image_ext;
    //lets update the student passport in the db
    $destination = "../eportal/schoolImages/students/".$passport_realName;
			try {
				$studentEmail = $student_data->stdEmail;
				$studentSurname = $student_data->stdSurName;
				$confirmation_code = $student_data->stdConfToken;
				$userType ="student";
				$this->dbh->beginTransaction();
				//update the student info on student tbl
				$this->stmt = $this->dbh->prepare("UPDATE `visap_student_tbl` SET stdPassport=? WHERE stdId=? AND stdRegNo=? LIMIT 1");
				if ($this->stmt->execute(array($passport_realName,$applicant_id,$admission_no))) {
				$_SESSION['AUTH_SMAPP_APPLICANT_ID'] = $applicant_id;
				if (move_uploaded_file($passport_temp, $destination)) {
					//send registrationmessage to the new student
					$Osotech_mailing = new Osotech_mailing();
					if ($Osotech_mailing->SendUserConfirmationEmail($studentEmail,$studentSurname,$confirmation_code,$userType)) {
						// Generate the student registration photo card...
						$this->dbh->commit();
			$this->response = self::alert_msg("Congratulations, Your registration with us was successful, Pls wait... while we generate your Photo Card","success")."<script>setTimeout(()=>{
			window.location.href='".ADMISSION_ROOT."regphotocard?applicant=".$admission_no."&page=photocard';
			},1500);</script>";
					}
					
				}
					
				}
				
			} catch (PDOException $e) {
			$this->dbh->rollback();
    $this->response  = self::alert_msg("Error Occurred!: Error Info: ".$e->getMessage(),"danger");
			}
		}
		return $this->response;
		unset($this->dbh);
	}
	/*ADMISSION REGISTRATION FINAL STEP*/

	public function check_duplicate_phone($phone){
		$this->stmt =$this->dbh->prepare("SELECT * FROM `visap_student_tbl` WHERE stdPhone=? LIMIT 1");
		$this->stmt->execute(array($phone));
		if ($this->stmt->rowCount()==1) {
			// phone no is already taken...
			$this->response ='<i class="text-danger">'.$phone.' is already taken.</i>';
		}else{
			//let check staff for this phone
		$this->stmt =$this->dbh->prepare("SELECT * FROM `visap_staff_tbl` WHERE staffPhone=? LIMIT 1");
		$this->stmt->execute(array($phone));
		if ($this->stmt->rowCount()==1) {
			// phone no is already taken...
			$this->response ='<i class="text-danger">'.$phone.' is already taken.</i>';
		}else{
$this->response ='<i class="text-success">'.$phone.' is available.</i>';
		}
		}
		return $this->response;
	}

	//

	public function encrypt_user_password($password){
    if (!self::isEmptyStr($password)) {
      $this->response = password_hash($password, PASSWORD_DEFAULT);
      return $this->response;
    }
  }

	public function check_duplicate_email($Email){
		$this->stmt =$this->dbh->prepare("SELECT * FROM `visap_student_tbl` WHERE stdEmail=? LIMIT 1");
		$this->stmt->execute(array($Email));
		if ($this->stmt->rowCount()==1) {
			// phone no is already taken...
			$this->response ='<i class="text-danger">'.$Email.' is already taken.</i>';
		}else{
			//let check staff for this phone
		$this->stmt =$this->dbh->prepare("SELECT * FROM `visap_staff_tbl` WHERE staffEmail=? LIMIT 1");
		$this->stmt->execute(array($Email));
		if ($this->stmt->rowCount()==1) {
			// phone no is already taken...
			$this->response ='<i class="text-danger">'.$Email.' is already taken.</i>';
		}else{
$this->response ='<i class="text-success">'.$Email.' is available.</i>';
		}
		}
		return $this->response;
	}

public function validate_Mobile_Number($mobile) {
  if (!empty($mobile)) {
    $isMobileNmberValid = TRUE;
    $mobileDigitsLength = strlen($mobile);
    if ($mobileDigitsLength < 10 || $mobileDigitsLength > 15) {
      $isMobileNmberValid = FALSE;
    } else {
      if (!preg_match("/^[+]?[1-9][0-9]{9,14}$/", $mobile)) {
        $isMobileNmberValid = FALSE;
      }
    }
    return $isMobileNmberValid;
  } else {
    return FALSE;
  }
}

//
public function Clean($string) {
    if (!empty($string)) {
      $string = trim($string);
   // $string = htmlspecialchars($string);
     $string = stripcslashes($string);
     $string = filter_var($string,FILTER_SANITIZE_STRING);
     return $string;
    }
 }

 public function generate_admission_number(){
	 $prefix="SMA";
	$this->stmt = $this->dbh->prepare("SELECT stdRegNo FROM `visap_student_tbl` ORDER BY stdRegNo DESC LIMIT 1");
	$this->stmt->execute();
	if ($this->stmt->rowCount() > 0) {
    if ($row = $this->stmt->fetch()) {
      $value2 = $row->stdRegNo;
      $value2 = substr($value2, 5,11);//separating numeric part
      $value2 =$value2 + 1;//incrementing numeric value
      $value2 = $prefix.date('y').sprintf('%06s',$value2);//concatenating incremented value
      $this->response = $value2;
    }
	}else{
	// "GSSOTA/00001"
    $value2 =$prefix.date('y')."000001";
    $this->response =$value2;
	}
	return $this->response;
	unset($this->dbh);
}

public function fetch_all_local_govt_state($state){
	$this->response ="";
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_state_tbl` WHERE name=? LIMIT 1");
	$this->stmt->execute(array($state));
	if ($this->stmt->rowCount() ==1) {
		$state_list = $this->stmt->fetch();
		//grab all local govt that have this state id
$this->stmt= $this->dbh->prepare("SELECT * FROM `local_govt_tbl` WHERE state_id=? ORDER BY local_name ASC");
	$this->stmt->execute(array($state_list->state_id));
	if ($this->stmt->rowCount() > 0) {
		while ($rows = $this->stmt->fetch()) {
		$this->response.='<option value="'.$rows->local_name.'">'.$rows->local_name.'</option>';
		}
	}else{
		$this->response = false;
	}
	}
	return $this->response;
	unset($this->dbh);
}

public function get_states_of_origin_InDropDown(){
		$this->response ="";
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_state_tbl` ORDER BY name ASC");
			$this->stmt->execute();
			if ($this->stmt->rowCount()>0) {
			while ($row = $this->stmt->fetch()) {
		$this->response.='<option value="'.$row->name.'">'.$row->name.'</option>';
			}
			}else{
				$this->response = false;
			}
			return $this->response;
	}

	public function get_student_infoId($studentId){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_info_tbl` WHERE studentId=? LIMIT 1");
  	$this->stmt->execute([$studentId]);
  	if ($this->stmt->rowCount()==1) {
  		$this->response = $this->stmt->fetch();
  		return $this->response;
  		unset($this->dbh);
  	}
	}

	public function get_student_medical_infoId($studentId){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_stdmedical_tbl` WHERE studId=? LIMIT 1");
  	$this->stmt->execute([$studentId]);
  	if ($this->stmt->rowCount()==1) {
  		$this->response = $this->stmt->fetch();
  		return $this->response;
  		unset($this->dbh);
  	}
	}

	public function get_all_active_blogs_post(){
	$blogStatus = "2";
  	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_tbl` WHERE blog_status=? ORDER BY created_at DESC");
$this->stmt->execute(array($blogStatus));
if ($this->stmt->rowCount() >0) {
	$this->response = $this->stmt->fetchAll();
	return $this->response;
	unset($this->dbh); 
}
}

public function show_all_recent_active_blogs_post(){
	$blogStatus = "2";
  	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_tbl` WHERE blog_status=? ORDER BY created_at DESC LIMIT 3");
$this->stmt->execute(array($blogStatus));
if ($this->stmt->rowCount() >0) {
	$this->response = $this->stmt->fetchAll();
	return $this->response;
	unset($this->dbh); 
}
}

public function get_blog_ById($Id){
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_tbl` WHERE blog_id=? LIMIT 1");
$this->stmt->execute([$Id]);
if ($this->stmt->rowCount()==1) {
	$this->response = $this->stmt->fetch();
	return $this->response;
	unset($this->dbh);
}
}

public function get_all_approved_blog_comments($blogId){
$status = "1";
  	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_comments` WHERE blogId=? AND status=? ORDER BY comment_date DESC");
$this->stmt->execute(array($status,$blogId));
if ($this->stmt->rowCount()>0) {
	$this->response = $this->stmt->fetchAll();
	return $this->response;
	unset($this->dbh); 
}
}

public function count_approved_blog_comments($blogId){
$status = "1";
  	$this->stmt = $this->dbh->prepare("SELECT count(commentId) as cnt FROM `visap_blog_post_comments` WHERE blogId=? AND status=?");
$this->stmt->execute(array($status,$blogId));
if ($this->stmt->rowCount()>0) {
	$rows = $this->stmt->fetch();
	$this->response = $rows->cnt;
	return $this->response;
	unset($this->dbh); 
}
}

public function get_all_related_blog_post($category){
	$status = "1";
  	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_tbl` WHERE category_id=? AND blog_status=? ORDER BY created_at DESC");
$this->stmt->execute(array($status,$category));
if ($this->stmt->rowCount()>0) {
	$this->response = $this->stmt->fetchAll();
	return $this->response;
	unset($this->dbh); 
}
}

public function getConfigData(){
		$this->query ="SELECT * FROM `visap_school_profile` WHERE id=1";
		$this->stmt =$this->dbh->prepare($this->query);
	$this->response =$this->stmt->execute();
	if ($this->stmt->rowCount()>0) {
		// code...
		$this->response = $this->stmt->fetch();
		return $this->response;
	}
	}

public function get_schoolLogoImage(){
    $schoolDatas = self::getConfigData();
    //school real logo 
    $schoolLogo = $schoolDatas->school_logo;
    if ($schoolLogo == NULL || $schoolLogo =="") {
      $ourLogo = APP_ROOT."eportal/schlogo.png";
    }else{
       $ourLogo = APP_ROOT."eportal/schoolImages/Logo/".$schoolLogo;
    }
    $this->response = $ourLogo;
    return $this->response;
  }
  
}

$Osotech = new Osotech();