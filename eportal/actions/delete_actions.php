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
  ?>
 <?php 
$ses_token = Session::set_xss_token();
$Configuration 	= new Configuration();
$Admin = new Admin();
$Student = new Student();
$Pin_serial = new Pins();
$Visitor = new Visitors();
$Administration = new Administration();

$request_method = $_SERVER['REQUEST_METHOD'];
if (isset($_POST['action']) && $_POST['action']!="") {
  // code...
  if ($_POST['action'] ==="delete_subject_now") {
    // code...
    $subjectId = $Configuration->Clean($_POST['subjectId']);
    $result = $Administration->delete_subject_ById($subjectId);
    if ($result) {
      // code...
      echo $result;
    }
  }

   // code...
  if ($_POST['action'] ==="delete_classroom_now") {
    // code...
    $grade = $Configuration->Clean($_POST['grade']);
    $result = $Administration->delete_classroom_ById($grade);
    if ($result) {
      // code...
      echo $result;
    }
  }

  //delete lesson file
    if ($_POST['action'] ==="delete_files") {
    // code...
    $lectureId = $Configuration->Clean($_POST['lectureId']);
    $result = $Administration->delete_virtual_lecture_ById($lectureId);
    if ($result) {
      // code...
      echo $result;
    }
  }

  if ($_POST['action'] ==="delete_compo") {
   $Id = $Configuration->Clean($_POST['Id']);
    $result = $Administration->delete_fee_component_ById($Id);
    if ($result) {
      echo $result;
    }
  }

  //delete_duty
  if ($_POST['action'] ==="delete_duty") {
   $dutyId = $Configuration->Clean($_POST['dutyId']);
    $result = $Administration->delete_staff_duty_by_id($dutyId);
    if ($result) {
      echo $result;
    }
  }

  //remove_student_from_office
  if ($_POST['action'] ==="remove_student_from_office") {
    $prefect_id = $Configuration->Clean($_POST['prefect_id']);
    $result = $Student->remove_student_from_office_now($prefect_id);
    if ($result) {
     echo $result;
    }
  }

  //delete_assignment_now
  if ($_POST['action'] ==="delete_assignment_now") {
    $assId = $Configuration->Clean($_POST['assId']);
    $result = $Student->remove_student_assignment_file_now($assId);
    if ($result) {
     echo $result;
    }
  }

}