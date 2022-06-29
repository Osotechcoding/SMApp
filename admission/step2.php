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
  header("Location: ./");
  exit();
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ("Template/HeaderScriptLink.php");?>
<title> Admission Step2 :: <?php echo __SCHOOL_NAME__;?></title>
</head>
<body>
  <?php include_once ("Template/Preloaders.php");?>
  <!-- TopHeader -->
<div class="page-banner-area bg-2">
<div class="container">
<div class="page-banner-content">
<h1><i class="flaticon-student-with-graduation-cap"></i> ONLINE APPLICATION STEP TWO</h1>
<ul>
<li><a href="../">Home</a></li>
<li>Student Bio-Data</li>
</ul>
</div>
</div>
</div>
<!-- Android app developement tutorial full course  -->
<!-- https://www.youtube.com/watch?v=KsNabzrQca8 -->

<div class="register-area pt-100 pb-70">
<div class="container">
<div class="register">
<h2 class="text-center">Admission Form (STUDENT BIO-DATA)</h2>
<form id="secondStepForm">
<div class="row">
  <!-- $auth_code_applicant_id -->
  <div class="col-md-12 text-center" id="server-response"></div>
  <input type="hidden" name="action" value="submit_second_step_admission">
  <input type="hidden" name="bypass" value="<?php echo md5("oiza123456");?>">
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
<label>First Name </label>
<input type="text" class="form-control" name="first_name" placeholder="Chikka">
</div>
<div class="form-group col-md-6">
<label>Middle Name </label>
<input type="text" class="form-control" name="middle_name" placeholder=" Desmond">
</div>
<div class="form-group col-md-6">
<label for="dateofbirth">Date of Birth </label>
<input type="date" name="dateofbirth" class="form-control" min="2000-12-31" id="dateofbirth">
</div>

<div class="form-group col-md-6">
<label for="gender">Gender</label>
<select name="gender" class="custom-select form-control">
<option value="" selected>Choose...</option>
<option value="Male">Male</option>
<option value="Female">Female </option>
<option value="Other">Other </option>

</select>
</div>
<div class="form-group col-md-6">
<label for="birth_cert">BIRTH CERTIFICATION</label>
<select name="birth_cert" class="custom-select form-control">
<option value="" selected>Choose...</option>
<option value="Certificate">Certificate</option>
<option value="Affidavit">Affidavit </option>
<option value="None">None </option>
</select>
</div>

<div class="form-group col-md-6">
<label for="nationality">NATIONALITY</label>
<select name="nationality" id="nationality" class="custom-select form-control">
<option value="" selected>Choose...</option>
<option value="Nigerian">Nigerian</option>
<option value="Non Nigerian">None Nigerian </option>
</select>
</div>

<div class="form-group col-md-6">
<label for="state_origin">STATE OF ORIGIN</label>
<select name="state_origin" id="state_origin" class="custom-select form-control">
<option selected>Choose...</option>
<?php echo $Osotech->get_states_of_origin_InDropDown();?>
</select>
</div>
<div class="form-group col-md-6">
<label for="localgvt">LGA OF ORIGIN</label>
<select name="localgovt" id="localgvt" class="custom-select form-control" required>
</select>
</div>
<div class="form-group col-md-6">
 <label for="hometown">Home Town</label>
<input type="text" name="hometown" class="form-control" id="hometown" placeholder="Ibeju Lekki">
</div>
<div class="form-group col-md-6">
<label for="religion">RELIGION</label>
<select name="religion" id="religion" class="custom-select form-control">
<option value="" selected>Choose...</option>
<option value="Christianity">Christianity</option>
<option value="Islamic">Islamic </option>
<option value="Other"> Other </option>
</select>
</div>
<div class="form-group col-md-12">
<label for="home_address">Home Address </label>
<textarea name="home_address" class="form-control" placeholder="Home Address"></textarea>
</div>
<div class="form-group col-md-12">
<label for="challenges">CHALLENGES THAT IMPACT ABILITY</label>
<select name="challenges" id="challenges" class="select2 form-control">
 <option value="" selected>Choose...</option>
 <option value="Visually Challenged">Visually Challenged</option>
 <option value="Albinism">Albinism</option>
 <option value="Learning Disabilities">Learning Disabilities</option>
 <option value="Intellectually Challenged">Intellectually Challenged</option>
 <option value="Auditory Challenged">Hearing/Auditory Challenged</option>
 <option value="Behavioural Disorder">Behavioural Disorder</option>
 <option value="Speech Challenged">Speech Challenged</option>
 <option value="Other">Other</option>
 <option value="None">None</option>
</select>
</div>

</div>
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
    const ADMISSION_FORM2_SUBMIT = $("#secondStepForm");
    ADMISSION_FORM2_SUBMIT.on("submit", function(event){
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="../rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      $.post("../Inc/checkStudentResult",ADMISSION_FORM2_SUBMIT.serialize(), function(result){
        setTimeout(()=>{
          $(".__loadingBtn__").html('Continue').attr("disabled",false);
          $("#server-response").html(result);
        },1000);
      })
    });

$('#state_origin').on('change', function() {
            let state = $('#state_origin').val();
            if (state != '') {
              let myaction ="fetch_local_govt";
                $.ajax({
                    url: "../Inc/checkStudentResult",
                    method: "POST",
                    data: {
                      action:myaction,
                        state: state
                    },
                    success: function(data) {
                        $("#localgvt").html(data);
                    }
                });
            } else {
                //do something
                $("#localgvt").html('<option value="" selected>Choose...</option>');
            }
        });
   
    setTimeout(()=>{
        $(".alert").alert('close').slideUp('slow');
      },3000);
  })
</script>

</body>
</html>