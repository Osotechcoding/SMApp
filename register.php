<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ("Templates/HeaderScriptLink.php");?>
<title>Sanu - College University HTML Template</title>
</head>
<body>
  <?php include_once ("Templates/Preloaders.php");?>
  <!-- TopHeader -->
<?php include_once ("Templates/TopHeader.php");?>
<!-- TopHeader -->
<!-- NavBarMenus -->
<?php include_once ("Templates/NavBarMenus.php");?>
<!-- NavBarMenus -->
<!-- SideBarModal -->
<?php include_once ("Templates/SideBarModal.php");?>
<!-- SideBarModal -->

<div class="page-banner-area bg-2">
<div class="container">
<div class="page-banner-content">
<h1>Register</h1>
<ul>
<li><a href="./">Home</a></li>
<li>Register</li>
</ul>
</div>
</div>
</div>
<!-- Android app developement tutorial full course  -->
<!-- https://www.youtube.com/watch?v=KsNabzrQca8 -->

<div class="register-area pt-100 pb-70">
<div class="container">
<div class="register"> 
<h3>Register</h3>
<form>
<div class="row">
<div class="col-lg-12">
<div class="form-group">
<input type="email" id="email" class="form-control" placeholder="Phone Or Email Address*">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" id="name" class="form-control" placeholder="First Name*">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<input type="text" id="lname" class="form-control" placeholder="Last Name*">
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<input type="password" id="password2" class="form-control" placeholder="Password*">
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<input type="password" id="password3" class="form-control" placeholder="Confirm Password*">
</div>
</div>
</div>
<button type="submit" class="default-btn btn active">Register</button>
</form>
</div>
</div>
</div>

<?php include_once("Templates/Footer.php");?>

<?php include_once("Templates/CopyRight.php");?>

<div class="go-top">
<i class="ri-arrow-up-s-line"></i>
<i class="ri-arrow-up-s-line"></i>
</div>
<?php include_once("Templates/FooterScriptLink.php");?>
</body>
</html>