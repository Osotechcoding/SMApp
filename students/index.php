<?php include_once ("visap_helper.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>GSSOTA - Student Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

<link rel="stylesheet" href="assets/css/fullcalendar.min.css">

<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="assets/plugins/morris/morris.css">

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

<div class="row">
  <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
  <div class="card">
  <span class="text-center"></span>
  <div class="card-header">
      <h3 class="text-info text-center">  <span>Hi, Welcome to <i class="text-info">JSSS ONE B</i></span></h3>

  </div>
  <div class="card-body text-success text-center">
      <h6>Greetings From Class Teacher</h6>
      <p style="font-size: 20px;">No Teacher assigned to Your Class yet</p>
  </div>
  </div>
  </div>
  <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
    <div class="card">
    <span class="text-center"></span>
    <div class="card-header">
    <h3 class="text-info text-center">Message From Principal!</h3>
    </div>
    <div class="card-body text-warning text-center">

      <p style="font-size: 20px;">There are No Message from the Principal today...<br>
Have a Nice Day....</p>

    </div>
    </div>
  </div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="dash-widget dash-widget5">
<span class="float-left"><img src="assets/img/dash/dash-1.png" alt="" width="80"></span>
<div class="dash-widget-info text-right">
<span>Subjects</span>
<h3>10</h3>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="dash-widget dash-widget5">
<div class="dash-widget-info text-left d-inline-block">
<span>Total Fee</span>
<h3>&#8358;112,000.00</h3>
</div>
<span class="float-right"><img src="assets/img/dash/dash-2.png" width="80" alt=""></span>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="dash-widget dash-widget5">
<span class="float-left"><img src="assets/img/dash/dash-3.png" alt="" width="80"></span>
<div class="dash-widget-info text-right">
<span>Total Paid</span>
<h3>&#8358;100,000.00</h3>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="dash-widget dash-widget5">
<div class="dash-widget-info d-inline-block text-left">
<span>Outstanding</span>
<h3>&#8358;12,000.00</h3>
</div>
<span class="float-right"><img src="assets/img/dash/dash-4.png" alt="" width="80"></span>
</div>
</div>
</div>
<div class="row">

<div class="col-lg-12 col-md-12 col-sm-12 d-flex">
<div class="card flex-fill">
<div class="card-header">
<div class="row align-items-center">
<div class="col-auto">
<div class="page-title">
Student Performance
</div>
</div>
<div class="col text-right">
<div class=" mt-sm-0 mt-2">
<button class="btn btn-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#">Action</a>
<div role="separator" class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Another action</a>
<div role="separator" class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Something else here</a>
</div>
</div>
</div>
</div>
</div>
<div class="card-body">
<div id="chart2"></div>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-12 col-md-12 col-12 d-flex">
<div class="card flex-fill">
<div class="card-header">
<div class="row align-items-center">
<div class="col-auto">
<div class="page-title">
Payment Termwise
</div>
</div>
<div class="col text-right">
<div class=" mt-sm-0 mt-2">
<button class="btn btn-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#">Action</a>
<div role="separator" class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Another action</a>
<div role="separator" class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Something else here</a>
</div>
</div>
</div>
</div>
</div>
<div class="card-body">
<div id="chart4"></div>
</div>
</div>
</div>

</div>
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header">
<div class="row align-items-center">
<div class="col-sm-6">
 <div class="page-title">
My Classmates
</div>
</div>
<div class="col-sm-6 text-sm-right">
<div class=" mt-sm-0 mt-2">
<button class="btn btn-outline-primary mr-2"><img src="assets/img/excel.png" alt=""><span class="ml-2">Excel</span></button>
<button class="btn btn-outline-danger mr-2"><img src="assets/img/pdf.png" alt="" height="18"><span class="ml-2">PDF</span></button>
<button class="btn btn-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#">Action</a>
<div role="separator" class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Another action</a>
<div role="separator" class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Something else here</a>
</div>
</div>
</div>
</div>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table custom-table">
<thead class="thead-light">
<tr>
<th>Name </th>
<th>Student ID</th>
<th>Class</th>
<th>Section</th>
<th>Mobile</th>
<th>Date of Birth</th>
<th class="text-right">Action</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<h2><a href="profile.html" class="avatar text-white"><img src="assets/img/profile/img-1.jpg" alt=""></a><a href="profile.html">Parker <span></span></a></h2>
</td>
<td>ST-0d001</td>
<td>1</td>
<td>A</td>
<td>973-584-58700</td>
<td>20/1/2021</td>
<td class="text-right">
<a href="edit-student.html" class="btn btn-primary btn-sm mb-1">
<i class="far fa-edit"></i>
</a>
<button type="submit" data-toggle="modal" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1">
<i class="far fa-trash-alt"></i>
</button>
</td>
</tr>
<tr>
<td>
<h2><a href="profile.html" class="avatar text-white"><img src="assets/img/profile/img-2.jpg" alt=""></a><a href="profile.html">Smith <span></span></a></h2>
</td>
<td>ST-0d002</td>
<td>2</td>
<td>B</td>
<td>973-584-58700</td>
<td>20/1/2021</td>
<td class="text-right">
<a href="edit-student.html" class="btn btn-primary btn-sm mb-1">
<i class="far fa-edit"></i>
</a>
<button type="submit" data-toggle="modal" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1">
<i class="far fa-trash-alt"></i>
</button>
</td>
</tr>

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<div class="row align-items-center">
<div class="col-sm-6">
<div class="page-title">
My Payment History
</div>
</div>
<div class="col-sm-6 text-sm-right">
<div class=" mt-sm-0 mt-2">
<button class="btn btn-outline-primary mr-2"><img src="assets/img/excel.png" alt=""><span class="ml-2">Excel</span></button>
<button class="btn btn-outline-danger mr-2"><img src="assets/img/pdf.png" alt="" height="18"><span class="ml-2">PDF</span></button>
<button class="btn btn-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="#">Action</a>
<div role="separator" class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Another action</a>
<div role="separator" class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Something else here</a>
</div>
</div>
</div>
</div>
</div>
<div class="card-body">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
<div class="table-responsive">
<table class="table custom-table">
<thead class="thead-light">
<tr>
<th>Name </th>
<th>Student ID</th>
<th>Parent Name</th>
<th>Mobile</th>
<th>Address</th>
<th>Date Of Admition</th>
<th>Fees Receipt</th>
<th class="text-right">Action</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<h2><a href="profile.html" class="avatar text-white"><img src="assets/img/profile/img-1.jpg" alt=""></a><a href="profile.html">Parker <span></span></a></h2>
</td>
<td>ST-0d001</td>
<td>Mr. Johnson</td>
<td>973-584-58700</td>
<td>9946 Baker Rd. Marysville, </td>
<td>20/1/2021</td>
<td><img src="assets/img/pdf.png" alt=""></td>
<td class="text-right">
<a href="edit-student.html" class="btn btn-primary btn-sm mb-1">
 <i class="far fa-edit"></i>
</a>
<button type="submit" data-toggle="modal" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1">
<i class="far fa-trash-alt"></i>
</button>
</td>
</tr>

</tbody>
</table>
</div>
</div>

</div>
</div>
</div>
</div>
<div class="col-12 col-sm-6 col-lg-4">
                          <div class="card">
                            <div class="card-header text-center">
                            <h4 class="text-success"> Active Class Mates</h4>
                              </div>
                              <div class="card-body">
                              <ul class="list-unstyled list-unstyled-border">
                              <li class="media">
                            <img alt="image" class="mr-3 rounded-circle" src="assets/img/author.jpg" alt="image" width="60">
                      <div class="media-body">
              <div class="mt-0 mb-1 font-weight-bold">Bamidele Rokeeb</div>
      <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i> Online</div>
                            </div>
                          </li>
                          <hr>
                          <li class="media">
                        <img alt="image" class="mr-3 rounded-circle" src="assets/img/author.jpg" alt="image" width="60">
                  <div class="media-body">
          <div class="mt-0 mb-1 font-weight-bold">Ojo Adeola</div>
  <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i> Online</div>
                        </div>
                      </li>
                          </ul>
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

<script src="assets/js/select2.min.js"></script>
<script src="assets/js/moment.min.js"></script>

<script src="assets/js/fullcalendar.min.js"></script>
<script src="assets/js/jquery.fullcalendar.js"></script>

<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael-min.js"></script>
<script src="assets/js/apexcharts.js"></script>
<script src="assets/js/chart-data.js"></script>

<script src="assets/js/app.js"></script>
</body>

</html>
