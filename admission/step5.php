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
  header("Location: ./step4");
  exit();
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ("Template/HeaderScriptLink.php");?>
<title>Admission Step5 :: <?php echo __SCHOOL_NAME__;?></title>
</head>
<body>
  <?php include_once ("Template/Preloaders.php");?>
  <!-- TopHeader -->
<div class="page-banner-area bg-2">
<div class="container">
<div class="page-banner-content">
<h1><i class="flaticon-student-with-graduation-cap"></i> ONLINE APPLICATION STEP FIVE</h1>
<ul>
<li><a href="../">Home</a></li>
<li>Student Medical Information</li>
</ul>
</div>
</div>
</div>
<div class="register-area pt-100 pb-70">
<div class="container">
<div class="register">
<h2 class="text-center"> Admission Form (STUDENT MEDICAL HISTORY)</h2>
<form id="fifthStepForm">
<div class="row">
  <div class="col-md-12 text-center" id="server-response"></div>
  <input type="hidden" name="action" value="submit_fifth_step_admission">
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
<div class="form-group col-md-6">
<label>Personal Hospital </label>
<input type="text" class="form-control" name="hospital_name" placeholder="Lifeline Hospital" />
</div>
<div class="form-group col-md-6">
<label>Owner's Name (Doctor)</label>
<input type="text" class="form-control" name="doctor_name" placeholder="Dr. Hamad Bello">
</div>
<div class="form-group col-md-6">
<label>Hospital Phone </label>
<input type="number" name="phone" class="form-control" placeholder="080********">
</div>
<div class="form-group col-md-6">
<label for="member_since">Personal Hospital Since </label>
<input type="date" class="form-control" name="member_since">
</div>

<div class="form-group col-md-12">
<label>Hospital Address </label>
<textarea name="address" class="form-control" placeholder="Hospital Address"></textarea>
</div>

<h3>STUDENT HEALTH INFO</h3>
<div class="form-group col-md-6">
<label for="blood_group">Blood Group</label>
<select name="blood_group" class="custom-select form-control">
<option selected>Choose...</option>
<option value="A">A</option>
<option value="B">B </option>
<option value="AB">AB </option>
<option value="O">O+ </option>

</select>
</div>
<div class="form-group col-md-6">
<label for="genotype">Genotype</label>
<select name="genotype" class="custom-select form-control">
<option selected>Choose...</option>
<option value="AA">AA</option>
<option value="AS">AS </option>
<option value="AC">AC </option>
<option value="SS">SS </option>
</select>
</div>

<div class="form-group col-md-6">
<label for="illness">FREQUENT ILLNESS</label>
<input type="text" class="form-control" name="illness" placeholder="Cough">
</div>

<div class="form-group col-md-6">
<label for="family_illness">FAMILY ILLNESS</label>
<input type="text" class="form-control" name="family_illness" placeholder="Cough" />
</div>

<div class="form-group col-md-6">
<label for="hospitalized">Have you Been Hospitalized?</label>
<select name="hospitalized" id="hospitalized" class="form-control">
 <option value="">Choose...</option>
 <option value="Yes">Yes</option>
 <option value="No">No</option>
</select>
</div>
<div class="form-group col-md-6">
<label for="surgical_operation">Any Surgical Operation?</label>
<select name="surgical_operation" id="surgical_operation" class="select2 form-control">
 <option value="">Choose...</option>
 <option value="Yes">Yes</option>
 <option value="No">No</option>
 <option value="I Don Not know">I don't Know</option>
</select>
</div>

</div>
<div style="float: left;"><a href="step4?applicant=<?php echo $_GET['applicant'];?>&page=4" class="btn btn-warning" onclick="return confirm('Are you Sure you want to go Back to Previous page?');">Previous Page</a></div>
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
    const ADMISSION_FORM5_SUBMIT = $("#fifthStepForm");
    ADMISSION_FORM5_SUBMIT.on("submit", function(event){
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="../rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      $.post("../Inc/checkStudentResult",ADMISSION_FORM5_SUBMIT.serialize(), function(result){
        setTimeout(()=>{
          $(".__loadingBtn__").html('Continue').attr("disabled",false);
          $("#server-response").html(result);
        },1000);
      })
    });
setTimeout(()=>{
        $(".alert").alert('close').slideUp('slow');
      },3000);
  })
</script>

</body>
</html>