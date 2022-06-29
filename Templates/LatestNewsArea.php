<div class="lates-news-area ptb-100">
<div class="container">
<div class="section-title">
<h2>Latest Blog/News</h2>
<p>Lorem ipsum dolor sit amet consectetur adipiscing elit ut elit tellus luctus nec ullamcorper mattis</p>
</div>
<div class="row justify-content-center">
	<?php 
$recentBlogs = $Osotech->show_all_recent_active_blogs_post();
if ($recentBlogs) {
	foreach ($recentBlogs as $recentBlog) {?>

<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200" data-aos-once="true">
<div class="single-news-card">
<div class="news-img">
<a href="blogfull?bId=<?php echo $recentBlog->blog_id;?>&action=view"><img src="eportal/news-images/<?php echo $recentBlog->blog_image;?>" width="400" height="300" alt="Blog-Image"></a>
</div>
<div class="news-content">
<div class="list">
<ul>
<li><i class="flaticon-user"></i>By <a href="javascript:void(0);">Admin</a></li>
<li><i class="flaticon-tag"></i><?php echo $recentBlog->category_id;?></li>
</ul>
</div>
<a href="blogfull?bId=<?php echo $recentBlog->blog_id;?>&action=view"><h3><?php echo $recentBlog->blog_title;?></h3></a>
<a href="blogfull?bId=<?php echo $recentBlog->blog_id;?>&action=view" class="read-more-btn">Read More<i class="flaticon-next"></i></a>
</div>
</div>
</div>
		<?php
	}
}
	 ?>
</div>
<div class="more-latest-news text-center">
<p>Select From Hundreds of Options.<a href="blogs" class="read-more-btn active"> More on News<i class="flaticon-next"></i></a></p>
</div>
</div>
</div>