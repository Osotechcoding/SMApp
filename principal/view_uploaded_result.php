<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $lang['Dashboard'] ?> || <?php echo $lang['webtitle'] ?></title>
   <!-- include template/HeaderLink.php -->
    <?php include ("../template/dataTableHeaderLink.php"); ?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- include headernav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
    <!-- include Sidebar.php -->
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
              <h5 class="content-header-title float-left pr-1 mb-0">VISAP PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Current Page Title
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-line-chart fa-2x"></span> Uploaded Results </h3>
  </div>
    </div>
    <!-- content goes here -->
     
        <div class="card">
          <div class="card-header">
             <h3>View Uploaded Results</h3>
             <?php include_once 'Links/results_btn.php'; ?>
           
          </div>

          <div class="card-body">
<!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
  <div class="row match-height">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
         <!-- <button type="button" class="btn btn-danger btn-md badge-pill" data-toggle="modal" data-target="#csv_Modal"><span class="fa fa-file fa-1x"></span> UPLOAD CSV RESULT</button> -->
        </div>
        <div class="card-body">
          <form class="form form-vertical" action="" method="post">
            <div class="form-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="result_subject"> Subject</label>
                    <select name="result_subject" id="result_subject" class="select2 form-control form-control-lg">
                      <option value="">--Select--</option>
                      <option value="Mathematics">Mathematics</option>
                    </select>
                  </div>
                </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="result_class"> Class</label>
                    <select name="result_class" id="result_class" class="select2 form-control form-control-lg">
                      <option value="">--Select--</option>
                      <option value="JSS1">JSS1</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="result_term"> Term</label>
                    <select name="result_term" id="result_term" class="select2 form-control form-control-lg">
                      <option value="">--Select--</option>
                      <option value="1">1st Term</option>
                      <option value="2">2nd Term</option>
                      <option value="3">3rd Term</option>
                    </select>
                  </div>
                </div>
                 <input type="hidden" id="school_session" name="school_session"
                      value="2021-2022">
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" name="show_broad_sheet_btn" class="btn btn-warning btn-lg mr-1"><span class="fa fa-address-card"></span> VIEW RESULT</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
<!-- Basic Vertical form layout section end -->
 <!-- BROADSHEET GOES HERE -->
      <?php 

      //check if someone click on show broadsheet btn
       if (isset($_POST['show_broad_sheet_btn'])): ?>
        <?php if (empty($_POST['result_subject']) || empty($_POST['result_class']) || empty($_POST['result_term'])): ?>
          <?php echo '<hr class="text-bold-600">
          <div class="alert alert-danger alert-dismissible mb-2 text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="d-flex align-items-center">
              <i class="bx bx-bell"></i>
              <span>
              <h3 class="text-center text-white"><strong> Please Select Result Subject,Class and Term to Continue!</strong></h3>
              </span>
            </div>
          </div>
         ' ;?>
        <?php else: ?>
          <!-- show the broadsheet -->
          <!-- Starts -->
          <hr class="text-bold-600">
        <div class="card">
            <div class="card-body">
        <!-- Validation Tooltips -->
        <h2 class="text-info text-center">VISAP IDEAL MODEL COLLEGE</h2>
                  <h5 class="text-center text-warning">31, Olaotan Avenue, Gasline, Ijoko, Sango Ogun State</h5>
        <h4 class="text-center text-danger"><strong>STUDENTS EXAMINATION RESULT SHEET</strong></h4>
                        <!-- ############################# -->
            <br />
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <span class="btn btn-success btn-round text-center">2021/2022 </span>
                <span class="btn btn-dark btn-round text-center">1ST TERM </span>
                <span class="btn btn-warning btn-round text-center">EXAMINATION </span>
                <span class="btn btn-danger btn-round text-center">OSOTECH SAMSON </span>
            </div>
            <br />
            <hr />
            <div class="clearfix"></div>
             <form action="" method="post"></form>
           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <div class="table-responsive">
                    <table class="table table-stripped osotechExp">
                        <thead class="text-center">
                        <tr>
                            <th> STUDENT</th>
                            <th> Reg No</th>
                            <th> Class</th>
                            <th> Subject</th>
                            <th> TEST1(15)</th>
                            <th>TEST2(15)</th>
                            <th>EXAM(x/60)</th>
                            <th>Total(A+B+C/3)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                    <td><span>ADEMOLA ADEOLA</span> </td>
                    <td>VISAP00901</td>
                  <td>JSS1</td>
                  <td>English Language</td>
                  <td><span>15</span></td>
                  <td><span>15</span></td>
                  <td><span>60</span></td>
                  <td><span>100</span></td>
                 
                </tr>
                </tbody>
                </table>
            </div>
           </div>
    </div>
  </div>
  <!-- Ends -->
          <!-- show broadsheet ends -->
        <?php endif ?>
      <?php endif ?>
      
      <!-- BROADSHEET ENDS -->
      </section>
        </div>
      </div>
    <!-- content goes end -->
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
    <!-- BEGIN: Footer-->
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
   <?php include ("../template/DataTableFooterScript.php"); ?>
     <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
    <!-- END: Page JS-->

    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>