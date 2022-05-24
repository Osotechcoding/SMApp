 <?php 
 @session_start();
include_once "../languages/config.php";
// require_once "../classes/Configuration.php";
require_once '../classes/Session.php';
date_default_timezone_set("Africa/Lagos");
//create an autoload function
spl_autoload_register(function($filename){
  include_once "../classes/".$filename.".php";
});


$Configuration 	= new Configuration();
$Student = new Student();
$Administration = new Administration();
$Result = new Result();
$Alert = new Alert();
@$Configuration->osotech_session_kick();
$Configuration->check_student_session_data();
$ses_token = Session::set_xss_token();
//Session Details
$session_data = $Administration->get_session_details();
$activeSess =$Administration->get_active_session_details();
$student_data = $Student->get_student_data_byId($_SESSION['STD_SES_ID']);