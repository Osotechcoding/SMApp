<?php 
@session_start();
require_once "Database.php";
require_once "Session.php";
require_once "Configuration.php";
class Blog {
	private $dbh;
	protected $stmt;
	protected $query;
	protected $response;
	protected $config;
	public function __construct(){
		$conn = new Database;
		$this->dbh = $conn->osotech_connect();
		$this->alert = new Alert;
		$this->config = new Configuration;
	}

	public function upload_school_news($data,$file){
		$blogTitle = $this->config->Clean($data['blogTitle']);
		$blogContent = $this->config->Clean($data['blogContent']);
		$blogCat = $this->config->Clean($data['blogCat']);
		$blogstatus = $this->config->Clean($data['blogstatus']);
		$blogTags = implode(",", $data['tags']);
		$postedBy = $this->config->Clean($data['postedBy']);
		$blogFile_temp = $file['blogImage']['tmp_name'];
		$blogFileName = $file['blogImage']['name'];
		$blogFile_size = $file['blogImage']['size']/1024;
		$blogFile_error = $file['blogImage']['error'];
		//$ext = pathinfo($blogFileName, PATHINFO_EXTENSION);
		$allowed = array("jpg","jpeg","png");
		 $name_div = explode(".", $blogFileName);
   		$image_ext = strtolower(end($name_div));
		//CHECK FOR EMPTY FIELDS
		if ($this->config->isEmptyStr($blogTitle) || $this->config->isEmptyStr($blogCat) || $this->config->isEmptyStr($blogTags) || $this->config->isEmptyStr($postedBy) || $this->config->isEmptyStr($blogstatus) || $this->config->isEmptyStr($blogFileName)) {
			$this->response = $this->alert->alert_toastr("error","Invalid form Submission, Pls try again!",__OSO_APP_NAME__." Says");
		}elseif (!in_array($image_ext, $allowed)) {
		$this->response = $this->alert->alert_toastr("error","Your file format is not supported, Please check and try again!",__OSO_APP_NAME__." Says");
		}elseif ($blogFile_size >200) {
		$this->response = $this->alert->alert_toastr("error","Blog Image Size should not exceed 200KB, Selected Image Size is :".number_format($answerFile_size,2)."KB",__OSO_APP_NAME__." Says");
		}elseif ($blogFile_error !==0) {
		 $this->response = $this->alert->alert_toastr("error","There was an error Uploading Blog Image, Try again!",__OSO_APP_NAME__." Says");
		}
		else{
//create image save path
	$newFileName = time().mt_rand().".".$image_ext;
	$file_destination = "../news-images/".$newFileName;
//check if the boldg is already created
$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_tbl` WHERE blog_title=? LIMIT 1");
$this->stmt->execute(array($blogTitle));
if ($this->stmt->rowCount() ==1) {
$this->response = $this->alert->alert_toastr("error","$blogTitle is already Created, Please check and try again!",__OSO_APP_NAME__." Says");
}else{
//create a fresh one
try {
	$blog_time = date("h:i:s");
	$created_at = date("Y-m-d");
    	$this->dbh->beginTransaction();
    	$this->stmt = $this->dbh->prepare("INSERT INTO `visap_blog_post_tbl` (category_id,author,blog_title,blog_content,blog_image,blog_status,created_at,blog_time,tags) VALUES (?,?,?,?,?,?,?,?,?);");
    	if ($this->stmt->execute(array($blogCat,$postedBy,$blogTitle,$blogContent,$newFileName,$blogstatus,$created_at,$blog_time,$blogTags))) {
    		if ($this->config->move_file_to_folder($blogFile_temp,$file_destination)) {
    			$this->dbh->commit();
    $this->response = $this->alert->alert_toastr("success","Blog Posted Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location.reload();
						},1000);</script>";
    		}
    	}else{
    		$this->response = $this->alert->alert_toastr("error","Unknown Error Occured, Please try again!",__OSO_APP_NAME__." Says");
    	}
    	
    } catch (PDOException $e) {
    	$this->dbh->rollback();
    	if (file_exists($file_destination)) {
		 unlink($file_destination);
	}
   $this->response = $this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says"); 	
    }
}
return $this->response;
unset($this->dbh);

		}
	}

public function osotech_resize_image($image_resource_id,$width,$height) {
$target_width =200;
$target_height =200;
$target_layer=imagecreatetruecolor($target_width,$target_height);
imagecopyresampled($target_layer,$image_resource_id,0,0,0,0,$target_width,$target_height, $width,$height);
return $target_layer;
}

public function get_all_active_blogs_post(){
	$blogStatus = "2";
  	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_tbl` WHERE blog_status=? ORDER BY created_at DESC");
$this->stmt->execute(array($blogStatus));
if ($this->stmt->rowCount() >0) {
	$this->response = $this->stmt->fetchAll();
	return $this->response;
	unset($this->dbh); 
}
}

public function count_blog_comment_by_blogId($blogId){
	$this->stmt = $this->dbh->prepare("SELECT count(`commentId`) as cnt FROM `visap_blog_post_comments` WHERE blogId=?");
$this->stmt->execute([$blogId]);
if ($this->stmt->rowCount()>0) {
	$rows = $this->stmt->fetch();
	$this->response = $rows->cnt;
	return $this->response;
	unset($this->dbh);
}
}

public function get_all_approved_blog_comments(){
$status = "1";
  	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_comments` WHERE  status=? ORDER BY comment_date DESC");
$this->stmt->execute(array($status));
if ($this->stmt->rowCount()>0) {
	$this->response = $this->stmt->fetchAll();
	return $this->response;
	unset($this->dbh); 
}
}

public function get_blog_ById($Id){
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_tbl` WHERE blog_id=? LIMIT 1");
$this->stmt->execute([$Id]);
if ($this->stmt->rowCount()==1) {
	$this->response = $this->stmt->fetch();
	return $this->response;
	unset($this->dbh);
}
}

public function get_all_blog_comments($blogId){
  	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_blog_post_comments` WHERE  blogId=? ORDER BY comment_date DESC");
$this->stmt->execute(array($status));
if ($this->stmt->rowCount()> 0) {
	$this->response = $this->stmt->fetchAll();
	return $this->response;
	unset($this->dbh); 
}
}

}

//commentId,blogId,guestName,user_email,website,comment,status,comment_date