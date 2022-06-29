<?php include_once ("Inc/Osotech.php");?>
<?php include_once ("checkportalstatus.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ("Templates/HeaderScriptLink.php");?>
<title><?php echo __SCHOOL_NAME__;?>:: Contact Us</title>
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
<h1>Contact Us</h1>
<ul>
<li><a href="./">Home</a></li>
<li>Contact Us</li>
</ul>
</div>
</div>
</div>


<div class="contact-us-area pt-100 pb-70">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="contacts-form">
<h3>Leave Us a message</h3>
<form id="contactForm">
<div class="row">
<div class="col-lg-6 col-sm-6">
<div class="form-group">
<label>Your name</label>
<input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name">
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-6 col-sm-6">
<div class="form-group">
<label>Your email</label>
<input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email">
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-6 col-sm-6">
<div class="form-group">
<label>Your phone</label>
<input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control">
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-6 col-sm-6">
<div class="form-group">
<label>Subject</label>
<input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject">
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-12">
<div class="form-group">
<label>Your message</label>
<textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message"></textarea>
<div class="help-block with-errors"></div>
</div>
</div>
<div class="form-group">
<div class="form-check">
<input name="gridCheck" value="I agree to the terms and privacy policy." class="form-check-input" type="checkbox" id="gridCheck" required>
<label class="form-check-label" for="gridCheck">
I agree to the <a href="terms-conditions.php">terms</a> and <a href="privacy-policy.php">privacy policy</a>
</label>
<div class="help-block with-errors gridCheck-error"></div>
</div>
</div>
<div class="col-lg-12 col-md-12">
<button type="submit" class="default-btn">
<span>Send message</span>
</button>
<div id="msgSubmit" class="h3 text-center hidden"></div>
 <div class="clearfix"></div>
</div>
</div>
</form>
</div>
</div>
<div class="col-lg-6">
<div class="contact-and-address">
<h2>Feel Free to Contact Us</h2>
<p>Your information with us will not be disclosed </p>
<div class="contact-and-address-content">
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="contact-card">
<div class="icon">
<i class="ri-phone-line"></i>
</div>
<h4>Contact</h4>
<p><a href="tel:+2348131374443">(+234)-81-3137-4443</a></p>
<p><a href="mailto:info@smapp.com">info@smapp.com</a> </p>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="contact-card">
<div class="icon">
<i class="ri-map-pin-line"></i>
</div>
<h4>Address</h4>
<p>38,Oluwalogbon St. Gasline Road,<br> ijoko, Ogun State.
</p>
</div>
</div>
</div>
</div>
<div class="social-media">
<h3>Social Media</h3>
<p>Social Media Speak about Us</p>
<ul>
<li>
<a href="https://www.facebook.com/smapp" target="_blank"><i class="flaticon-facebook"></i></a>
</li>
<li>
<a href="https://www.twitter.com/smapp" target="_blank"><i class="flaticon-twitter"></i></a>
</li>
<li>
<a href="https://instagram.com/smapp" target="_blank"><i class="flaticon-instagram"></i></a>
</li>
<li>
<a href="https://linkedin.com/smapp" target="_blank"><i class="flaticon-linkedin"></i></a>
</li>
</ul>
</div>
</div>
</div>
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