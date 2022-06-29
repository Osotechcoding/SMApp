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
  header("Location: ./step5");
  exit();
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ("Template/HeaderScriptLink.php");?>
<title><?php echo __SCHOOL_NAME__;?> :: Student Admission File Uploading </title>
</head>
<body>
  <?php include_once ("Template/Preloaders.php");?>
  <!-- TopHeader -->
<div class="page-banner-area bg-2">
<div class="container">
<div class="page-banner-content">
<h1><i class="flaticon-student-with-graduation-cap"></i> ONLINE APPLICATION FINAL STEP</h1>
<ul>
<li><a href="../">Home</a></li>
<li>Student File Uploading</li>
</ul>
</div>
</div>
</div>
<div class="register-area pt-100 pb-70">
<div class="container">
<div class="register">
<h2 class="text-center"> Admission Form (Student File Uploading)</h2>
<form id="finalStepForm" method="POST" enctype="multipart/form-data">
  
<div class="row">
  <div class="col-md-12 text-center" id="server-response"></div>
  <input type="hidden" name="action" value="submit_final_step_admission">
  <input type="hidden" name="bypass" value="<?php echo md5("oiza123456789");?>">
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
<div class="form-group col-md-12">
  <i class="text-danger">Please Note that your Passport size must not be up to 20KB and dimension should be (100 x 100 pixels)</i>
<label for="student_passport">Choose Passport</label>
<input type="file" class="form-control custom-file" name="student_passport" id="student_passport" onchange="previewFile(this);">
</div>
<div class="col-md-6 offset-md-4" id="uploaded_passport">
  <img id="previewImg" width="150" src="avatar.jpg" alt="Placeholder" style="border: 5px solid darkblue;border-radius:50%;">
  <p>Image Name: <span id="imagename"></span></p> 
  <p>Image Size: <span id="ImageSize"></span></p> 
</div>
<!-- <div class="form-group col-md-6">
<label>Birth Certificate</label>
<input type="file" class="form-control" disabled id="inputEmail15" />
</div> -->
<!-- <div class="form-group col-md-6">
<label>LGA Attestation </label>
<input type="file" class="form-control" disabled id="inputEmail16"  />
</div> -->
<!-- <div class="form-group col-md-6">
 <label for="report_sheet">LAST REPORT SHEET</label>
<input type="file" class="form-control" id="report_sheet" disabled name="report_sheet" />
</div> -->
</div>
<div style="float: left;"><a href="step5?applicant=<?php echo $_GET['applicant'];?>&page=5" class="default-btn btn" onclick="return confirm('Are you Sure you want to go Back to Previous page?');">Previous Page</a></div>
<button type="submit" class="default-btn btn active __loadingBtn__" style="float: right;">Submit Registration</button>
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
    const ADMISSION_FORM_SUBMIT = $("#finalStepForm");
    ADMISSION_FORM_SUBMIT.on("submit", function(event){
      event.preventDefault();
     $.ajax({
    url:"../Inc/checkStudentResult",
    type:"POST",
    data: new FormData(this),
    contentType:false,
    cache:false,
    processData:false,
    beforeSend(){
 $(".__loadingBtn__").html('<img src="../rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
    },
    success:function(data){
      setTimeout(()=>{
         $(".__loadingBtn__").html('Submit Registration').attr("disabled",false);
        $("#server-response").html(data);
      },500);
    }

  });
    });

setTimeout(()=>{
        $(".alert").alert('close').slideUp('slow');
      },3000);
  })
</script>
<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
                $("#imagename").html(file.name);
                $("#ImageSize").html((file.size/1024).toFixed(2) +"KB");
            }
 
            reader.readAsDataURL(file);
        }
    }
</script>
</body>
</html>