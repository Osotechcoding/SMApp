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
  header("Location: ./step3");
  exit();
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ("Template/HeaderScriptLink.php");?>
<title>Admission Step4 :: <?php echo __SCHOOL_NAME__;?></title>
</head>
<body>
  <?php include_once ("Template/Preloaders.php");?>
  <!-- TopHeader -->

<div class="page-banner-area bg-2">
<div class="container">
<div class="page-banner-content">
<h1><i class="flaticon-student-with-graduation-cap"></i> ONLINE APPLICATION STEP FOUR</h1>
<ul>
<li><a href="../">Home</a></li>
<li>Previous School Information</li>
</ul>
</div>
</div>
</div>

<div class="register-area pt-100 pb-70">
<div class="container">
<div class="register">
<h2 class="text-center">Admission Form (Previous School Info)</h2>
<form id="fourthStepForm" method="POST" enctype="multipart/form-data">
  
<div class="row">
  <div class="col-md-12 text-center" id="server-response"></div>
  <input type="hidden" name="action" value="submit_fourth_step_admission">
  <input type="hidden" name="bypass" value="<?php echo md5("oiza12345678");?>">
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
<label>School Name</label>
<input type="text" class="form-control" name="prev_schoolname" placeholder="Name of your Previous school">
</div>
<div class="form-group col-md-6">
<label>Name of Director/Proprietress</label>
<input type="text" class="form-control" name="proprietress" placeholder="e.g Mr. Ayomide Hamad">
</div>
<div class="form-group col-md-6">
<label>Previous School Phone </label>
<input type="text" class="form-control" name="prev_schl_phone" placeholder="Previous School Phone">
</div>
<div class="form-group col-md-6">
<label for="prev_schl_loca">SCHOOL LOCATION</label>
<select name="prev_schl_loca" class="custom-select form-control">
<option value="" selected>Choose...</option>
<option value="Urban">Urban</option>
<option value="Rural">Rural </option>
</select>
</div>
<div class="form-group col-md-6">
 <label for="edu_offered">LEVEL OF EDUCATION OFFERED </label>
 <select name="edu_offered" id="edu_offered" class="custom-select form-control">
 <option value="" selected>Choose...</option>
 <option value="PRIMARY ONLY">PRIMARY ONLY</option>
 <option value="SECONDARY ONLY"> SECONDARY ONLY</option>
 <option value="PRIMARY &amp; SECONDARY">PRIMARY &amp; SECONDARY</option>
</select>
</div>
<div class="form-group col-md-6">
 <label for="category">SCHOOL CATEGORY </label>
<select name="category" id="category" class="custom-select form-control">
 <option value="" selected>Choose...</option>
 <option value="PUBLIC">PUBLIC</option>
 <option value="PRIVATE">PRIVATE</option>
</select>
</div>
<div class="form-group col-md-6">
<label>YOUR PRESENT CLASS </label>
<input type="text" class="form-control" name="present_class" placeholder="Enter Your Present Class here">
</div>
<div class="form-group col-md-6">
<label>REASON FOR CHANGE OF SCHOOL </label>
<input type="text" name="reason_to" class="form-control" />
</div>
<div class="form-group col-md-6">
 <label for="report_sheet">LAST REPORT SHEET <span class="text-danger">(Scanned)</span> </label>
<input type="file" class="form-control-file form-control" id="report_sheet" name="report_sheet">
</div>
</div>
<div style="float: left;"><a href="step3?applicant=<?php echo $_GET['applicant'];?>&page=3" class="default-btn btn" onclick="return confirm('Are you Sure you want to go Back to Previous page?');"> Previous Page</a></div>
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
    const ADMISSION_FORM4_SUBMIT = $("#fourthStepForm");
    ADMISSION_FORM4_SUBMIT.on("submit", function(event){
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
         $(".__loadingBtn__").html('Continue').attr("disabled",false);
       // $("#video_form")[0].reset();
        $("#server-response").html(data);
        //alert(data);
      },1500);
    }

  });

    });

    setTimeout(()=>{
        $(".alert").alert('close').slideUp('slow');
      },3000);
  })
</script>

</body>
</html>