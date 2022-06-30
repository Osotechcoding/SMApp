<?php include_once ("Inc/Osotech.php");?>
<?php include_once ("checkportalstatus.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ("Templates/HeaderScriptLink.php");?>
<title><?php echo __SCHOOL_NAME__; ?> :: Events</title>
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
<h1>Events</h1>
<ul>
<li><a href="./">Home</a></li>
<li>Upcoming</li>
<li>Events</li>
</ul>
</div>
</div>
</div>


<div class="events-area pt-100 pb-70">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-4 col-md-6">
<div class="single-events-card style-4">
<div class="events-image">
<a href="events-details.php"><img src="assets/images/events/event-1.jpg" alt="Image"></a>
<div class="date">
<span>28</span>
<p>Mar</p>
</div>
</div>
<div class="events-content">
<div class="admin">
<p><a href="events-details.php"><i class="flaticon-student-with-graduation-cap"></i>Raymond Salazar</a></p>
</div>
<a href="events-details.php"><h3>Planning And Facilitating Effective Meetings</h3></a>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6">
<div class="single-events-card style-4">
<div class="events-image">
<a href="events-details.php"><img src="assets/images/events/event-1.jpg" alt="Image"></a>
<div class="date">
<span>29</span>
<p>Mar</p>
</div>
</div>
<div class="events-content">
<div class="admin">
<p><a href="events-details.php"><i class="flaticon-student-with-graduation-cap"></i>Raymond Salazar</a></p>
</div>
<a href="events-details.php"><h3>Regular WordPress Meetup In New Jersey, USA</h3></a>
</div>
</div>
</div>

<div class="col-lg-4 col-md-6">
<div class="single-events-card style-4">
<div class="events-image">
<a href="events-details.php"><img src="assets/images/events/event-1.jpg" alt="Image"></a>
<div class="date">
<span>30</span>
<p>Mar</p>
</div>
</div>
<div class="events-content">
<div class="admin">
<p><a href="events-details"><i class="flaticon-student-with-graduation-cap"></i>Admin</a></p>
</div>
<a href="events-details"><h3>Monday Night Concert In Lake View,Mountain City</h3></a>
</div>
</div>
</div>


</div>
<div class="paginations">
<ul>
<li><a href="events-details.php"><i class="flaticon-back"></i></a></li>
<li><a href="events-details.php">01</a></li>
<li><a href="events-details.php">02</a></li>
<li><a href="events-details.php">03</a></li>
<li><a href="events.php" class="active"><i class="flaticon-next"></i></a></li>
</ul>
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