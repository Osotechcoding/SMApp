<?php include_once ("visap_helper.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>GSSOTA - Examination Subject Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

<link rel="stylesheet" href="assets/plugins/toastr/toatr.css">

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
<h1 class="text-center mb-5 text-warning">REGISTER YOUR EXAMINATION SUBJECT HERE.</h1>
<div class="row">
<div class="col-md-12">
	<div class="text-center"><h3 id="server-response" class="server-response"></h3></div>
</div>

</div>
<div class="content-page">
	<form id="ExamSubejctRegForm">
<div class="row filter-row">
<div class="col-sm-6 col-md-3">
<div class="form-group form-focus">
<input type="text" class="form-control floating" name="reg_number" value="<?php echo strtoupper($student_data->stdRegNo);?>" readonly>
<label class="focus-label">Student ID</label>
</div>
</div>
<div class="col-sm-6 col-md-3">
<div class="form-group form-focus">
	<?php include_once ("templates/stdHiddenVals.php");?>
<input type="text" class="form-control floating" value="<?php echo strtoupper($student_data->full_name);?>" readonly>
<label class="focus-label">Student Name</label>
</div>
</div>
<div class="col-sm-6 col-md-3">
<div class="form-group form-focus select-focus">
<select name="subject" class="select2 form-control">
<option value="" selected>Select Subject...</option>
<?php echo $Administration->get_all_subjects_InDropDown_list();?>
</select>
<label class="focus-label">Subject</label>
</div>
</div>
<div class="col-sm-6 col-md-3">
	<input type="hidden" name="action" value="submit_my_exam_reg_subject">
<button type="submit" class="btn btn-search rounded btn-block mb-3 __loadingBtn__"> Register </button>
</div>
</div>
</form>
<h3 class="mt-3 text-center mb-3 text-success">TOTAL SUBJECTS REGISTERED FOR 2021/2022 ACADEMIC SESSION</h3>
<div class="row">
<div class="col-lg-12 mb-3">
<div class="table-responsive">
<table class="table custom-table datatable text-center">
<thead class="thead-light">
<tr>
<th>Admission No</th>
<th>Subject Name</th>
<th>Registered Date</th>
<th>Session</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
	<?php 
$regiestered_subejcts = $Student->all_my_registered_exam_subejcts($student_data->stdId,$student_data->stdRegNo,$student_data->studentClass,$activeSess->session_desc_name);
if ($regiestered_subejcts) {
	// code...
	foreach ($regiestered_subejcts as $allSubject) {?>

		<tr>
<td><?php echo $allSubject->stdRegNo;?></td>
<td><?php echo ucwords($allSubject->subject);?></td>
<td><?php echo date("jS F Y",strtotime($allSubject->created_at));?></td>
<td><?php echo $allSubject->schl_Sess; ?></td>
<td class="text-right">
</a>
<button type="button" data-id="<?php echo $allSubject->subId;?>" data-value="<?php echo $allSubject->std_id;?>" class="btn btn-danger btn-sm mb-1 remove_sub_btn __loadingBtn__<?php echo $allSubject->subId;?>">
<i class="far fa-trash-alt"></i> Unregister
</button>
</td>
</tr>
		<?php
		// code...
	}
}


	 ?>

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
<script src="assets/plugins/toastr/toastr.min.js"></script>
<script src="assets/plugins/toastr/toastr.js"></script>

<script src="assets/js/app.js"></script>
<script>
	$(document).ready(function(){
		my_toastr("Welcome to VISAP Version 1.0.1");
		$(".select2").select2();

		//when unregister btn is clicked
		const remove_sub_btn = $(".remove_sub_btn");
		remove_sub_btn.on("click", function(){
			
			let theId =$(this).data("id");
			let stuId =$(this).data("value");
			let action ='unregistered_exam_subject_now';
			var is_true = confirm("Are you Sure you really want to unregister this Subject?");
			if (is_true) {
				$(".__loadingBtn__"+theId).html('<img src="../assets/loaders/rolling_loader.svg" width="20"> Processing...').attr("disabled",true);
				//send request 
				$.post("../actions/actions",{action:action,theId:theId,stuId:stuId},function(data){
					setTimeout(()=>{
						$(".__loadingBtn__"+theId).html("<i class='far fa-trash-alt'></i> Unregister").attr("disabled",false);
						$(".server-response").html(data);
					},1500);
				});
			}else{
				return false;
			}
		})
		//when a register subject btn is clicked 
		const ExamSubejctRegForm =$("#ExamSubejctRegForm");
		ExamSubejctRegForm.on("submit", (event)=>{
			event.preventDefault();
			 $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...');
			//send to server
			$.post("../actions/actions",ExamSubejctRegForm.serialize(),(res)=>{
				setTimeout(()=>{
					$("#server-response").html(res);
					 $(".__loadingBtn__").html('Submit Classnote');
				},2000);
			});
		})
	});

	function my_toastr(msg,title="HELLO GSSOTA"){
	toastr.info(msg,title,{showMethod:"slideDown",hideMethod:"fadeOut",timeOut:10000,progressBar:!0});
	}
</script>
</body>
</html>