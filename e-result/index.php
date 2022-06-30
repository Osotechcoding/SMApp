<?php include_once ("../Inc/Osotech.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo __SCHOOL_ABBREV; ?> - Student Online Result Checker</title>
<?php include_once ("temp/HeaderScriptLink.php");?>

<style>
  ul li.emp{
    list-style: numbering;
    font-weight: 300;
    font-size: 1.3rem;
  }

  .blinking{
    animation:blinkingText 3.5s infinite;
}
@keyframes blinkingText{
    0%{     color: #f00;    }
    49%{    color: #f00; }
    60%{    color: transparent; }
    99%{    color:transparent;  }
    100%{   color: #2CA67A;    }
}
</style>
</head>
<body>
  <?php include_once ("temp/Preloaders.php");?>
  <!-- TopHeader -->
<?php include_once ("temp/TopHeader.php");?>
<!-- TopHeader -->
<div class="page-banner-area bg-2">
<div class="container">
<div class="page-banner-content">
<h1><i class="flaticon-clock"></i> Result Portal</h1>
<ul>
<li><a href="../">Home</a></li>
<li><a href="./rfaqs">FAQs</a></li>
<li>Result</li>
</ul>
</div>
</div>
</div>


<div class="register-area pt-100 pb-70">
<div class="container">
<div class="register"> 

  <div class="card mb-5">
    <div class="card-header">
       <h2 class="text-center">Welcome to <br> <?php echo __SCHOOL_NAME__; ?><br> Result Portal </h2>
    </div>
    <div class="card-body">
      <div class="col-md-12 mb-4">
   <div class="section-tittle">
<h2 class="text-danger blinking"><span class="blinking">Public Notice!</span> </h2>
<h5 class="blinking"><span>2021/2022 Academic Promotion Report Sheet is Now Out.</span>
</h5>
<h4> You can now check your result. Scratch Cards are available for purchase. <a href="javascript:void(0);" title="Call Admin on 08131374443"> at the School Premises</a></h4>
<h2 class="text-center">How to Check your <a href="#" style="color:red;"> Result?</a></h2>
<!-- You can now check your result online. -->
<p>To check your result, Please, follow the instructions below:</p>
<ul style="font-weight: bold;" class="text-danger">
  <em>
  <li class="emp">Carefully scratch off the covered area of your scratch card to unveil your secret PIN Number</li>
  <li class="emp">Enter Your Admission Number in the space provided</li>
  <li class="emp">Choose Examination Result Class from the list</li>
  <li class="emp">elect Result Session from the list</li>
  <li class="emp">Choose your Examination Term (1st,2nd or 3rd)</li>
  <li class="emp">Enter the PIN Number in your scratch card correctly</li>
  <li class="emp">Enter your scratch card SERIAL Number</li>
  <li class="emp">Finaly, Click check result Button and wait for your result to display.</li>
  </em>
</ul>
<div class="text-center">
      <img src="cardb.jpg" alt="scratch-card" width="500">
    </div>
</div>
  </div>
    </div>
   
  </div>
<form id="student_result_checker_form">
  <div class="col-md-12 text-center" id="response"></div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<input type="text" name="student_reg_number" class="form-control" placeholder="Admission No">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<select name="result_class" id="" class="form-control">
  <option value="" selected>Choose Class</option>
  <?php echo $Osotech->get_classroom_InDropDown_list();?>
</select>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<select name="result_session" id="" class="form-control">
  <option value="" selected>Choose Session</option>
 <?php echo $Osotech->get_all_session_lists();?>
</select>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<select name="result_term" id="" class="form-control">
  <option value="" selected>Choose Term</option>
  <option value="1st Term">1st Term</option>
  <option value="2nd Term">2nd Term</option>
  <option value="3rd Term">3rd Term</option>
</select>
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<input type="password" autocomplete="off" id="password2" name="cardPin_" class="form-control" placeholder="Enter Scratch Pin">
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<input type="text" autocomplete="off" id="password3" name="cardSerial_" class="form-control" placeholder="Enter Pin Serial">
</div>
</div>
</div>
<input type="hidden" name="action" value="check_Student_Result">
<button type="submit" class="btn btn-primary btn-lg btn-block __loadingBtn__" style="border-radius: 20px; float: right;">Check Result</button>
<div class="clearfix"></div>
</form>
</div>
</div>
</div>
<?php include_once("temp/CopyRight.php");?>
<div class="go-top">
<i class="ri-arrow-up-s-line"></i>
<i class="ri-arrow-up-s-line"></i>
</div>
<?php include_once("temp/FooterScriptLink.php");?>
<script>
  $(document).ready(function(){
$("#student_result_checker_form").on("submit",function(event){
    $(".__loadingBtn__").html('<img src="../rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
    //send request
    event.preventDefault();
    const checkResultForm = $(this).serialize();
    $.post("../Inc/checkStudentResult",checkResultForm,function(data){
    setTimeout(function(){
      //popWindow();
      $("#response").html(data);
      $(".__loadingBtn__").html('Check Result').attr("disabled",false);
      setTimeout(()=>{
        $("#student_result_checker_form")[0].reset();
        $(".alert").alert('close').slideUp('slow');
      },3000);
    },1000);  
    })
    
  });

  });
</script>
</body>
</html>