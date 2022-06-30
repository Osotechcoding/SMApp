<?php include_once ("Inc/Osotech.php");?>
<?php include_once ("checkportalstatus.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ("Templates/HeaderScriptLink.php");?>
<title><?php echo __SCHOOL_NAME__;?>:: School News</title>
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
<h1>Latest News</h1>
<ul>
<li><a href="./">Home</a></li>
<li>Pages</li>
<li>Latest News</li>
</ul>
</div>
</div>
</div>


<div class="latest-news-area pt-100 pb-70">
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="latest-news-left-content pr-20
                        ">
<!-- <div class="latest-news-simple-card">
<div class="news-content">
<div class="list">
<ul>
<li><i class="flaticon-user"></i>By <a href="blogs">Admin</a></li>
<li><i class="flaticon-tag"></i>Social Sciences</li>
</ul>
</div>
<a href="blogs"><h3>Professor Tom Comments On The Volunteer B. Snack Brand</h3></a>
<a href="blogs" class="read-more-btn active">Read More<i class="flaticon-next"></i></a>
</div>
</div> -->
<div class="latest-news-card-area">
<h3>Latest News</h3>
<div class="row">
  <?php 
$all_blogs_posted = $Osotech->get_all_active_blogs_post();
if ($all_blogs_posted) {
  foreach ($all_blogs_posted as $value) {?>
<div class="col-lg-6 col-md-6">
<div class="single-news-card">
<div class="news-img">
<a href="blogfull?bId=<?php echo $value->blog_id;?>&action=view"><img src="eportal/news-images/<?php echo $value->blog_image;?>" alt="Image" width="400"></a>
</div>
<div class="news-content">
<div class="list">
<ul>
<li><i class="flaticon-user"></i>By <a href="blogfull?bId=<?php echo $value->blog_id;?>&action=view">Admin</a></li>
<li><i class="flaticon-tag"></i><?php echo $value->category_id;?></li>
</ul>
</div>
<a href="blogfull?bId=<?php echo $value->blog_id;?>&action=view"><h3><?php echo $value->blog_title;?></h3></a>
<a href="blogfull?bId=<?php echo $value->blog_id;?>&action=view" class="read-more-btn">Read More<i class="flaticon-next"></i></a>
</div>
</div>
</div>
    <?php
    // code...
  }
}else{
  echo '<div class="alert alert-danger text-center"> <h3> Sorry :) There are no Blog to display at the moment!</h3></div>';
}

   ?>
  
</div>
</div>
<div class="paginations">
<ul>
<li><a href="blogsfull?blogId=1"><i class="flaticon-back"></i></a></li>
<li><a href="blogs">01</a></li>
<li><a href="blogs">02</a></li>
<li><a href="blogs">03</a></li>
<li><a href="blogs" class="active"><i class="flaticon-next"></i></a></li>
</ul>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="serch-content">
<h3>Search</h3>
<div class="form-group">
<input type="text" class="form-control" placeholder="Find Your Course">
<button type="submit" class="src-btn">
<i class="flaticon-search"></i>
</button>
</div>
</div>
<div class="category-list">
<h3>Category List</h3>
<ul>
<li>
<a href="academics">Student<i class="ri-arrow-drop-right-fill"></i></a>
</li>

</ul>
</div>
<div class="related-post-area">
<h3>Related Post</h3>
<div class="related-post-box">
<div class="related-post-content">
<a href="blogs"><img src="assets/images/news/news-1.jpg" alt="Image"></a>
<h4><a href="blogs">Professor Tom comments on the volunteer B. Snack brand</a></h4>
<p><i class="flaticon-tag"></i> Social Sciences</p>
</div>
</div>
<div class="related-post-box">
<div class="related-post-content">
<a href="blogs"><img src="assets/images/news/news-1.jpg" alt="Image"></a>
<h4><a href="blogs">Making a meaningful difference in patients’ lives.</a></h4>
<p><i class="flaticon-tag"></i> Social Sciences</p>
</div>
</div>
<div class="related-post-box">
<div class="related-post-content">
<a href="blogs"><img src="assets/images/news/news-1.jpg" alt="Image"></a>
<h4><a href="blogs">Happiness begins with good health</a></h4>
<p><i class="flaticon-tag"></i> Social Sciences</p>
</div>
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