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

$Visitor        = new Visitors();
$Student        = new Student();
$Result         = new Result();
$Staff          = new Staff();
$Configuration  = new Configuration();
$Administration = new Administration();
 $Admin         = new Admin();
$Pin_serial     = new Pins();
$Alert          = new Alert();

@$Configuration->osotech_session_kick();
$Admin->check_Auth_data();
$adminId = $_SESSION['ADMIN_TOKEN_ID'];
/*Get School Details*/
$VisaPSchoolDetails = $Administration->get_school_profile_details();
$VisaPSoicalLink = $Administration->get_schoolsocil_link_details();

/*ADMIN SESS DETAILS*/
$admin_data = $Admin->getAdminDetails();

/*ADMIN SESS DETAILS*/
$isSuperAdmin = $Admin->isSuperAdmin($admin_data->adminId);
if ($isSuperAdmin) {
  $adminType = $isSuperAdmin->adminType;
}
//Session Details
$session_data = $Administration->get_session_details();
$activeSess =$Administration->get_active_session_details();
 ?>
