<?php
@session_start();
require_once '../classes/Database.php';
require_once "../languages/config.php";
require_once "../classes/Configuration.php";
date_default_timezone_set("Africa/Lagos");
//create an autoload function
spl_autoload_register(function($filename){
  include_once "../classes/".ucwords($filename).".php";
});

// if(!isset($_SESSION['ADMIN_TOKEN_ID'])){
//     header("Location:".APP_ROOT);
//     exit();
// }
$Visitor        = new Visitors();
$Student        = new Student();
$Result         = new Result();
$Staff          = new Staff();
$Configuration  = new Configuration();
$Administration = new Administration();
 $Admin         = new Admin();
$Pin_serial     = new Pins();
$Alert          = new Alert();
$Blog          = new Blog();

@$Configuration->osotech_session_kick();
$Admin->check_Auth_data();
$adminId = $_SESSION['ADMIN_TOKEN_ID'];

/*ADMIN SESS DETAILS*/
$admin_data = $Admin->getAdminDetails();

/*ADMIN SESS DETAILS*/
$isSuperAdmin = $Admin->isSuperAdmin($admin_data->adminId);
if ($isSuperAdmin) {
  $adminType = $isSuperAdmin->adminType;
}

$VisaPSchoolDetails = $Administration->get_school_profile_details();
$VisaPSoicalLink = $Administration->get_schoolsocil_link_details();
//Session Details
$session_data = $Administration->get_session_details();
$activeSess =$Administration->get_active_session_details();
 ?>
