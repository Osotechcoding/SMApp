<?php 
@session_start();
 ?>
<?php include_once ("../Inc/Osotech.php");?>

<?php 

if (isset($_SESSION['AUTH_CODE_APPLICANT_ID']) && ! empty($_SESSION['AUTH_CODE_APPLICANT_ID'])) {
  $auth_code_applicant_id = $_SESSION['AUTH_CODE_APPLICANT_ID'];
  $admission_no = $_SESSION['AUTH_CODE_ADMISSION_NO'];
  $student_data = $Osotech->get_student_details_byRegNo($admission_no);
}else{
  header("Location: ./step2");
  exit();
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ("Template/HeaderScriptLink.php");?>
<title>Admission Step3 :: <?php echo __SCHOOL_NAME__;?></title>
</head>
<body>
  <?php include_once ("Template/Preloaders.php");?>

<div class="page-banner-area bg-2">
<div class="container">
<div class="page-banner-content">
<h1><i class="flaticon-student-with-graduation-cap"></i> ONLINE APPLICATION STEP THREE</h1>
<ul>
<li><a href="../">Home</a></li>
<li>Parents/Guardian Information</li>
</ul>
</div>
</div>
</div>
<!-- Android app developement tutorial full course  -->
<!-- https://www.youtube.com/watch?v=KsNabzrQca8 -->

<div class="register-area pt-100 pb-70">
<div class="container">
<div class="register">
<h2 class="text-center">Admission Form (Parents/Guardian Information) </h2>
<form id="thirdStepForm">
    <h3 class="text-muted mt-5">FATHER/MALE GUARDIAN DETAILS</h3>
<div class="row">
  <div class="col-md-12 text-center" id="server-response"></div>
  <input type="hidden" name="action" value="submit_third_step_admission">
  <input type="hidden" name="bypass" value="<?php echo md5("oiza1234567");?>">
  <input type="hidden" name="admission_no" value="<?php echo ucwords($student_data->stdRegNo);?>">
  <input type="hidden" name="auth_code_applicant_id" value="<?php echo $auth_code_applicant_id;?>">
  <div class="form-group col-md-4">
<label>Registered Email</label>
<input type="text" class="form-control" value="<?php echo $student_data->stdEmail;?>" readonly>
</div>
<div class="form-group col-md-4">
<label>Father's Name (Surname)</label>
<input type="text" class="form-control" name="surname" value="<?php echo ucwords($student_data->stdUserName);?>" readonly>
</div>
<div class="form-group col-md-4">
<label>Class Proposed</label>
<input type="text" class="form-control" value="<?php echo ucwords($student_data->studentClass);?>" readonly>
</div>
<div class="form-group col-md-6">
<label>Title </label>
<input type="text" autocomplete="off" name="mg_title" class="form-control" placeholder="High Chief">
</div>
<div class="form-group col-md-6">
<label>Full Name</label>
<input type="text" autocomplete="off" name="mg_name" class="form-control" placeholder="Prof. Hamad Sani O">
</div>
<div class="form-group col-md-6">
<label> Relationship </label>
<input type="text" autocomplete="off" name="mg_relation" class="form-control" placeholder=" Father" />
</div>
<div class="form-group col-md-6">
<label> Phone </label>
<input type="text" autocomplete="off" name="mg_phone" class="form-control" placeholder=" 082135432123" />
</div>
<div class="form-group col-md-6">
<label> Email </label>
<input type="text" autocomplete="off" name="mg_email" class="form-control" placeholder=" myfather@gmail.com" />
</div>
<div class="form-group col-md-6">
<label> Occupation </label>
<input type="text" autocomplete="off" name="mg_occu" class="form-control" placeholder="Doctor" />
</div>
<div class="form-group col-md-12">
<label> Address </label>
<input type="text" autocomplete="off" name="mg_address" class="form-control" placeholder=" Sango Ota Ogun State" />
</div>
</div>
<div class="row">
  <h3 class="text-muted">MOTHER/FEMALE GUARDIAN DETAILS</h3>  

  <div class="form-group col-md-6">
<label>Title </label>
<input type="text" autocomplete="off" name="fg_title" class="form-control" placeholder="High Chief" />
</div>
<div class="form-group col-md-6">
<label>Full Name</label>
<input type="text" autocomplete="off" name="fg_name" class="form-control" placeholder="Prof. Hamad Sani O" />
</div>
<div class="form-group col-md-6">
<label> Relationship </label>
<input type="text" autocomplete="off" name="fg_relation" class="form-control" placeholder=" Father" />
</div>
<div class="form-group col-md-6">
<label> Phone </label>
<input type="text" autocomplete="off" name="fg_phone" class="form-control" placeholder=" 082135432123" />
</div>
<div class="form-group col-md-6">
<label> Email </label>
<input type="text" autocomplete="off" name="fg_email" class="form-control" placeholder=" myfather@gmail.com" />
</div>
<div class="form-group col-md-6">
<label> Occupation </label>
<input type="text" autocomplete="off" name="fg_occu" class="form-control" placeholder="Nurse" />
</div>
<div class="form-group col-md-12">
<label> Address </label>
<input type="text" autocomplete="off" name="fg_address" class="form-control" placeholder=" Sango Ota Ogun State" />
</div>
</div>
<div style="float: left;"><a href="step2?applicant=<?php echo $_GET['applicant']?>&page=2" class="default-btn btn" onclick="return confirm('Are you Sure you want to go Back to Previous page?');">Previous Page</a></div>
<button type="submit" class="default-btn btn active __loadingBtn__" style="float: right;">Continue</button>
<div class="clearfix"></div>
</form>

</div>
</div>
</div>
<?php include_once("Template/CopyRight.php");?>

<div class="go-top">
<i class="ri-arrow-up-s-line"></i>
<i class="ri-arrow-up-s-line"></i>
</div>
<?php include_once("Template/FooterScriptLink.php");?>
<script>
  
  $(document).ready(function(){
    const ADMISSION_FORM3_SUBMIT = $("#thirdStepForm");
    ADMISSION_FORM3_SUBMIT.on("submit", function(event){
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="../rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      $.post("../Inc/checkStudentResult",ADMISSION_FORM3_SUBMIT.serialize(), function(result){
        setTimeout(()=>{
          $(".__loadingBtn__").html('Continue').attr("disabled",false);
          $("#server-response").html(result);
        },1500);
      })
    });

setTimeout(()=>{
        $(".alert").alert('close').slideUp('slow');
      },3000);
  })
</script>
</body>
</html>