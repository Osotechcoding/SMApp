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
@Session::init_ses();
$Visitor = new Visitors();
$Student = new Student();
$Result = new Result();
$Staff = new Staff();
$Configuration = new Configuration();
$Administration = new Administration();
//$Configuration  = new Configuration();
 $Admin          = new Admin();
$Pin_serial     = new Pins();
$Alert = new Alert();
Session::check_session_data("STAFF_TOKEN");
//Session Details
$session_data = $Administration->get_session_details();
$activeSess =$Administration->get_active_session_details();
 ?>
