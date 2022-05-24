<?php 
require_once "visap_helper.php";
$ses_id = $_SESSION['STD_SES_ID'];

if (isset($_GET['action'])) {
	if ($_GET['action'] ==="logout") {
	//$ses_id = $_SESSION['STAFF_ID'];
	if ($Student->logout($ses_id)) {
		if (isset($_COOKIE['student_login_email']) && !$Configuration->isEmptyStr($_COOKIE['student_login_email'])) {
		unset($ses_id);
			Session::lock_screen();
		}else{
		Session::destroy();	
		}
		}	
	}
}
 ?>