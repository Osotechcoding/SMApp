<?php include_once ("Inc/Osotech.php");?>
<?php include_once ("checkportalstatus.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ("Templates/HeaderScriptLink.php");?>
<title><?php echo __SCHOOL_NAME__;?>:: Homepage</title>
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

<!-- Slider area -->
<?php include_once ("Templates/PageSliderArea.php");?>
<!-- Slider area -->
<!-- Academic area -->
<?php include_once ("Templates/AcademicArea.php");?>
<!-- Academic area -->
<!-- Facility area -->
<?php include_once ("Templates/FacilityArea.php");?>
<!-- Facility area -->

<!-- Classes area -->
<?php include_once ("Templates/ClassesArea.php");?>
<!-- Classes area -->

<!-- Tour area -->
<?php include_once ("Templates/TourArea.php");?>
<!-- Tour area -->


<!-- Past Event area -->
<?php include_once ("Templates/PastEventArea.php");?>
<!-- Past Event area -->

<?php //include_once("Templates/upcomingEventArea.php") ?>

<?php //include_once("Templates/LatestBlogArea.php") ?>

<?php //include_once("Templates/WhyChooseUsArea.php") ?>

<?php include_once("Templates/LatestNewsArea.php");?>

<?php include_once("Templates/Footer.php");?>

<?php include_once("Templates/CopyRight.php");?>

<div class="go-top">
<i class="ri-arrow-up-s-line"></i>
<i class="ri-arrow-up-s-line"></i>
</div>


<?php include_once("Templates/FooterScriptLink.php");?>
</body>

</html>