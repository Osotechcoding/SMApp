<?php include_once ("visap_helper.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>GSSOTA - Subject Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/datetimepicker/css/tempusdominus-bootstrap-4.min.css">

<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="assets/css/select2.min.css">

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
<h1 class="text-center mb-5 text-warning">SEARCH SUBMITTED ASSIGNMENTS.</h1>
<div class="row">
<div class="col-sm-4 col-12">
</div>

</div>
<div class="content-page">
<div class="row filter-row">
<div class="col-sm-6 col-md-3">
<div class="form-group form-focus">
<select name="subject" id="subject" class="select2 form-control">
	<option value="">Choose...</option>
	<option value="Mathematics">Mathematics</option>
	<option value="English Language">English Language</option>
	<option value="Biology">Biology</option>
</select>
<label class="focus-label">Subject</label>
</div>
</div>
<div class="col-sm-6 col-md-3">
<div class="form-group form-focus select-focus">
<input type="text" name="from_date" id="from_date" class="form-control datetimepicker" data-toggle="datetimepicker">
<label class="focus-label">From Date</label>
</div>
</div>
<div class="col-sm-6 col-md-3">
<div class="form-group form-focus select-focus">
<input type="text" name="to_date" id="to_date" class="form-control datetimepicker" data-toggle="datetimepicker">
<label class="focus-label">To Date</label>
</div>
</div>
<div class="col-sm-6 col-md-3">
<a href="#" class="btn btn-search rounded btn-block mb-3"> Search Assignment </a>
</div>
</div>
<h3 class="mt-3 text-center mb-3 text-success">WEEKLY ASSIGNMENT FOR FIRST TERM 2021/2022.</h3>
<div class="row">
<div class="col-lg-12 mb-3">
<div class="table-responsive">
<table class="table custom-table datatable">
<thead class="thead-light text-center">
<tr>
	<th>S/N</th>
<th>Teacher</th>
<th>Subject</th>
<th>Answer</th>
<th>Score</th>
<th>Submitted Date</th>
</tr>
</thead>
<tbody class="text-center">
<tr>
<td>01</td>
<td>Agberayi Samson</td>
<td>Mathematics</td>
<td><button type="button" class="badge badge-success-border badge-lg">Read</button></td>
<td><?php echo 30; ?></td>
<td><?php echo date("d-m-Y"); ?></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/select2.min.js"></script>
<script src="assets/js/moment.min.js"></script>

<script src="assets/plugins/datetimepicker/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="assets/js/app.js"></script>
<script>
	$(document).ready(function(){
		$(".select2").select2();
		$(".datetimepicker").datetimepicker();
	})
</script>
</body>
</html>