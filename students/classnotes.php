 <?php include_once ("visap_helper.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Preschool - Bootstrap Admin Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

<link rel="stylesheet" href="assets/css/style.css">
<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<div class="main-wrapper">

<!-- NAV BAR HEADER -->
<?php include("templates/navBarMenu.php") ?>
<!-- NAV BAR HEADER ENDS -->
<!-- SIDE BAR HEADER -->
<?php include("templates/studentSideBar.php") ?>
<!-- SIDE BAR HEADER ENDS -->
<div class="page-wrapper">
<div class="content container-fluid">
<!-- GREETING INFO -->
<?php include("templates/greetingInfo.php");?>
<!-- GREETING INFO ENDS -->
<div class="card">
<div class="card-body">
<h2 class="mb-2 text-center"><i class="fas fa-book"></i> My Class Notebook.</h2>
<div class="row">
<div class="col-sm-4 col-12">
</div>
<div class="col-sm-8 col-12 text-right add-btn-col">
<a href="writenote.php" class="btn btn-primary btn-rounded float-right"><i class="fas fa-edit"></i> Write New Note</a>

</div>
</div>

<div class="row staff-grid-row">

<!-- Subject Note Starts -->
<?php 
//get classnote by student id
$stdId = '1';
$std_class = "JSS1";
$stdAdmNo ="GSSOTA/00001";
$all_my_notes = $Student->get_ClassnoteByStudentId($stdId,$stdAdmNo,$std_class);
if ($all_my_notes !=false) {
	// code...
	foreach ($all_my_notes as $notes) {
		$subject_data = $Administration->get_subject_ById($notes->subjectId);

	 ?>
		<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
<div class="profile-widget">
<div class="profile-img">
<a href="" class="avatar"><?php echo strtoupper(substr($subject_data->subject_desc, 0,1)) ?></a>
</div>
<div class="dropdown profile-action">
<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="notes?std_subject_notId=1&stdId=1&term=1st&aca_sess=2022-2023"><i class="fas fa-pencil-alt m-r-5"></i> View All Notes</a>
</div>
</div>
<h4 class="user-name m-t-10 m-b-0 text-ellipsis"><a href="notes.php?std_subject_notId=1&stdId=1&term=1st&aca_sess=2022-2023"><?php echo strtoupper($subject_data->subject_desc); ?></a></h4>
</div>
</div>
	<?php }
}else{
echo '<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
<h3 class="text-danger text-center">No Classnote Yet!</h3>
</div>';
}

 ?>

<!-- Subject Note Starts -->
</div>

</div>
</div>
</div>
</div>
</div>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/plugins/toastr/toastr.min.js"></script>
<script src="assets/plugins/toastr/toastr.js"></script>

<script src="assets/js/app.js"></script>
</body>
</html>
