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
<?php include_once ("Templates/SideBarModal.php");?>

<div class="page-banner-area bg-2">
<div class="container">
<div class="page-banner-content">
<h1>Login</h1>
<ul>
<li><a href="./">Home</a></li>
<li>Login</li>
</ul>
</div>
</div>
</div>


<div class="login-area pt-100 pb-70">
<div class="container">
<div class="login">
 <h3>Login</h3>
<form>
<div class="form-group">
<input type="email" id="email" class="form-control" placeholder="Username Or Email Address*">
</div>
<div class="form-group">
<input type="password" id="password" class="form-control" placeholder="Password*">
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
<label class="form-check-label" for="flexCheckDefault">
Remember Me
</label>
</div>
<button type="submit" class="default-btn btn active">Login</button>
<a href="recover-password.html">Lost your password?</a>
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