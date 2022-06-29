<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ("Template/HeaderScriptLink.php");?>
<title>Student Admission :: </title>
</head>
<body>
  <?php include_once ("Template/Preloaders.php");?>
  <!-- TopHeader -->

<div class="page-banner-area bg-2">
<div class="container">
<div class="page-banner-content">
<h1><i class="flaticon-student-with-graduation-cap"></i> ONLINE APPLICATION STEP ONE</h1>
<ul>
<li><a href="../">Home</a></li>
<li>Portal Details</li>
</ul>
</div>
</div>
</div>
<!-- <a href="https://julitschools.com/"></a> -->
<!-- Android app developement tutorial full course  -->
<!-- https://www.youtube.com/watch?v=KsNabzrQca8 -->

<div class="register-area pt-100 pb-70">
<div class="container">
<div class="register"> 
<h3 class="text-center">Start Your Journey with Us!</h3>
<form id="form">
  <div class="col-md-12 text-center" id="server-response"></div>
  <input type="hidden" name="action" value="submit_first_step_admission">
  <input type="hidden" name="bypass" value="<?php echo md5("oiza12345");?>">
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
  <label>Scratch Card Pin</label>
<input type="password" placeholder="Enter Card Pin" autocomplete="off" name="card_pin" class="form-control">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
  <label>Scratch Card Serial</label>
<input type="text" placeholder="Enter Card Serial" autocomplete="off" name="card_serial" class="form-control">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
  <label>Student Gmail(<small class="text-danger">Create Gmail Account <a href="https://accounts.google.com/SignUp" target="_blank"> Here</a> </small>)</label>
<input type="text" autocomplete="off" name="student_email" id="studentEmail" class="form-control" placeholder="Enter Gmail account here*">
<span id="email-error"></span>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
  <label> Surname <small class="text-danger">(as Username)</small></label>
<input type="text" autocomplete="off" placeholder="Your Surname" name="username" class="form-control">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
  <label> Enter Active Phone Number</label>
<input type="text" autocomplete="off" placeholder="Your Phone Number" name="student_phone" id="student_phone" class="form-control">
<span id="phone-error"></span>
</div>

</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
  <label> Enter Your proposed class</label>
<input type="text" autocomplete="off" name="student_class" class="form-control" placeholder="e.g JSS One">
</div>
</div>
<div id="captcha_load">
</div>
</div>

<a href="../howtoapply" class="link" style="float: left;text-decoration: none;color: #ff0000;"> How to Apply ?</a>
<button type="submit" class="default-btn btn active __loadingBtn__" style="float: right;">Continue</button>
<div class="clearfix"></div>
</form>
</div>
</div>
</div>

<?php //include_once("Template/Footer.php");?>

<?php include_once("Template/CopyRight.php");?>

<div class="go-top">
<i class="ri-arrow-up-s-line"></i>
<i class="ri-arrow-up-s-line"></i>
</div>
<?php include_once("Template/FooterScriptLink.php");?>
<script>
  
  $(document).ready(function(){
    const ADMISSION_FORM_SUBMIT = $("#form");
    ADMISSION_FORM_SUBMIT.on("submit", function(event){
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="../rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      $.post("../Inc/checkStudentResult",ADMISSION_FORM_SUBMIT.serialize(), function(result){
        setTimeout(()=>{
          $(".__loadingBtn__").html('Continue').attr("disabled",false);
          $("#server-response").html(result);
        },1500);
      })
    });

    //check duplicate student email addres
    $("#student_phone").on("keyup", function(){
      let studentPhone = $(this).val();
      if (studentPhone!="") {
      let check_action = "check_student_phone";
      //send to server for checking
      $.post("../Inc/checkStudentResult",{action:check_action,Phone:studentPhone},function(data){
        $("#phone-error").html(data);
      })
      }else{
        $("#phone-error").html("");
      }
      
    })

    //check duplicate student email addres
    $("#studentEmail").on("keyup", function(){
      let studentEmail = $(this).val();
      if (studentEmail !="") {
      let check_action = "check_student_email";
      //send to server for checking
      $.post("../Inc/checkStudentResult",{action:check_action,Email:studentEmail},function(res){
        $("#email-error").html(res);
      })
      }else{
        $("#email-error").html("");
      }
      
    })
    setTimeout(()=>{
        $(".alert").alert('close').slideUp('slow');
      },5000);
  })
</script>
<?php
function loadCaptcha(){
   echo'<script> $("#captcha_load").load("./Template/osotech_captcha.php");</script>';
}
loadCaptcha();
?>
</body>
</html>