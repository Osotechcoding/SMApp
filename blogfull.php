<?php 
ob_start();
include_once ("Inc/Osotech.php");?>
<?php include_once ("checkportalstatus.php");?>
<?php 

if (isset($_GET['bId']) && ($_GET['bId'] !="") && isset($_GET['action']) && $_GET['action'] ==="view") {
 $blogId = $_GET['bId'];
 $blog_details = $Osotech->get_blog_ById($blogId);
}else{
  header("Location: ./blogs");
  exit();
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ("Templates/HeaderScriptLink.php");?>
<title><?php echo __SCHOOL_NAME__;?>:: <?php echo $blog_details->blog_title;?></title>
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
<h1><?php echo $blog_details->blog_title;?> </h1>
<ul>
<li><a href="./">Home</a></li>
<li>Blog</li>
<li><?php echo $blog_details->blog_title;?></li>
</ul>
</div>
</div>
</div>


<div class="news-details-area pt-100 pb-70">
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="news-details">
<div class="news-simple-card">
<img src="eportal/news-images/<?php echo $blog_details->blog_image;?>" alt="Image">
<div class="list">
<ul>
<li><i class="flaticon-user"></i>By <a href="javascript:void(0);">Admin</a></li>
<li><i class="flaticon-tag"></i><?php echo $blog_details->category_id;?></li>
</ul>
</div>
<h2><?php echo $blog_details->blog_title;?></h2>
<p><?php echo $blog_details->blog_content;?> </p>
</div>

<div class="tags-and-share">
<div class="row align-items-center">
<div class="col-lg-6 col-md-6">
<div class="tags">
<ul>
  
<li><span>Tags :</span>
</li>
<?php
$tags = explode(",", $blog_details->tags)?>
<?php foreach($tags as $tag){
  echo '<li><a href="javascript:void(0);">'.$tag.'</a></li>';
}?>
</ul>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="share">
<ul>
<li><span>Share :</span></li>
<li>
<a href="javascript:void(0);" target="_blank"><i class="flaticon-facebook"></i></a>
</li>
<li>
<a href="javascript:void(0);" target="_blank"><i class="flaticon-twitter"></i></a>
</li>
<li>
<a href="javascript:void(0);" target="_blank"><i class="flaticon-instagram"></i></a>
</li>
<li>
<a href="javascript:void(0);" target="_blank"><i class="flaticon-linkedin"></i></a>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="comments">
<h3><?php echo $Osotech->count_approved_blog_comments($blog_details->blog_id) ?> comments</h3>
<?php $get_all_comments = $Osotech->get_all_approved_blog_comments($blog_details->blog_id); 

  if ($get_all_comments) {
   foreach ($get_all_comments as $bcomments) {?>
<div class="single-comments-box">
<img src="assets/images/news/man.jpg" class="rounded-circle" width="50" alt="Images">
<h4><?php echo ucwords($bcomments->guestName);?></h4>
<div class="date">
<p><?php echo date("M j, Y",strtotime($bcomments->comment_date)) ?> at <?php echo date("h:i:s a",strtotime($bcomments->comment_date)) ?></p>
</div>
<div class="reply">
<a href="javascript:void(0);">Reply</a>
</div>
<p><?php echo $bcomments->comment;?> </p>
</div>
    <?php
   }
  }else{
   echo '<div class="alert alert-danger text-center"> <h3>Hey! No Comment yet! Be the first to comment on this post</h3></div>'; 
  }
?>
</div>
<div class="reply-area">
<div class="reply-form">
<h3>Leave a Reply</h3>
<p>Your email address will not be published.</p>
<form>
<div class="row">
<div class="col-md-6 col-lg-6">
<div class="form-group">
<input type="text" class="form-control" id="name" placeholder="Name">
</div>
</div>
<div class="col-md-6 col-lg-6">
<div class="form-group">
<input type="email" class="form-control" id="email" placeholder="Email">
</div>
</div>
<div class="col-md-12 col-lg-12">
<div class="form-group">
<input type="text" class="form-control" id="website" placeholder="Website">
</div>
</div>
<div class="col-md-12 col-lg-12">
<div class="form-group">
<textarea class="form-control" id="review" rows="4" placeholder="Write Comment Here..."></textarea>
</div>
</div>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
<label class="form-check-label" for="flexCheckDefault">
Save my name, email, and website in this browser for the next time I comment.
</label>
</div>
<button type="submit" class="default-btn btn">Submit Comment <i class="flaticon-paper-plane"></i></button>
</form>
</div>
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
<a href="blogs?category=education&action=view">Education<i class="ri-arrow-drop-right-fill"></i></a>
</li>
</ul>
</div>
<div class="related-post-area">
<h3>Related Post</h3>

  <?php $ourRelatedPosts = $Osotech->get_all_related_blog_post($blog_details->category_id);
  if ($ourRelatedPosts) {
  foreach ($ourRelatedPosts as $RelatedPost) {?>
     <div class="related-post-box">
<div class="related-post-content">
<a href="blogsfull?blogId="><img src="assets/images/news/<?php echo $RelatedPost->blog_image;?>" alt="Image"></a>
<h4><a href="blogsfull?blogId="><?php echo ucwords($RelatedPost->blog_title);?></a></h4>
<p><i class="flaticon-tag"></i> Social Sciences</p>
</div>
</div>
    <?php
  }
  }else{
 echo '<div class="alert alert-danger text-center"> <h4>Hey! There are No Related Post Yet!</h4></div>';
  }
  ?>
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