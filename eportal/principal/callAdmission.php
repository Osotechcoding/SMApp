<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title>Admission Portal - VISAP</title>
     <?php include ("../template/HeaderLink.php"); ?>
    <!-- include dataTableHeaderLink.php -->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
    <!-- headerNav.php -->
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
  <!--  -->
  <?php include ("template/Sidebar.php"); ?>
    <!-- END: Main Menu-->

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
                  <li class="breadcrumb-item active">Call Admission
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><div class="row">
  <div class="col-12">
  <h4><span class="fa fa-bullhorn"></span> CALL FOR ACADEMIC ADMISSION</h4>
  </div>

</div>
<div class="text-center ml-2"> <?php include("template/admBtnLink.php");?></div>
<section id="multiple-column-form">
  <div class="row match-height">
    <div class="col-12">
      <div class="card">
         <div class="card-header">
         
        </div>
        <div class="card-body">
          <form class="form">
            <div class="form-body">
              <div class="row">
                 <div class="col-md-6 col-12 mt-1">
                  <div class="form-label-group">
                    <input type="text" class="form-control form-control-lg" name="csession" value="2021/2022" readonly>
                    <label for="csession">Academic Session</label>
                  </div>
                </div>
                <div class="col-md-6 col-12 mt-1">
                  <div class="form-label-group">
                    <input type="text" id="country-floating" class="form-control form-control-lg" name="cterm" value="First Term" readonly>
                    <label for="cterm"> Current Term</label>
                  </div>
                </div>
                 <div class="col-md-6 col-12 mt-1">
                  <div class="form-label-group">
                  <input type="text" class="form-control form-control-lg" name="admission_desc" placeholder="January Admission">
                    <label for="admission_desc">Admission Desc</label>
                  </div>
                </div>
                 <div class="col-md-6 col-12 mt-1">
                  <div class="form-label-group">
                  <input type="text" class="form-control form-control-lg" name="batch" placeholder="Batch A">
                    <label for="batch">Admission Batch</label>
                  </div>
                </div>
               
                <div class="col-md-6 col-12">
                   <p>Application Duration.</p>
                  <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control form-control-lg dateranges" placeholder="Select Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
                </div>
                <div class="col-md-6 col-12 mt-1">
                   <p>Interview Duration.</p>
                  <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control form-control-lgform-control-lg dateranges" placeholder="Select Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
                </div>
                 <div class="col-md-6 col-12 mt-2">
                  <div class="form-label-group">
                  <input type="text" id="company-column" class="form-control form-control-lg" name="duty_post"
                      placeholder="Buhari Memorial Hall">
                    <label for="csession">Interview Venue</label>
                  </div>
                </div>
                 <div class="col-md-6 col-12 mt-2">
                  <div class="form-label-group">
                  <input type="text" class="form-control form-control-lg pickatime-format" name="interview_time"
                      placeholder="12:00 Noon">
                    <label for="csession">Interview Time</label>
                  </div>
                </div>
               <div class="col-12 mt-2">
                      <fieldset class="form-label-group mb-0">
                          <textarea data-length=150 class="form-control char-textarea" id="textarea-counter" rows="3" placeholder="Instruction to Application (Max Character (150))"></textarea>
                          <label for="textarea-counter">Instruction to Application (Max Character (150))</label>
                      </fieldset>
                      <small class="counter-value float-right mb-2"><span class="char-count">0</span> / 150 </small>
                  </div>
  <!-- daterange end -->
                </div>
                <!--   -->
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary btn-lg mr-1"><i class="bx bx-paper-plane"></i> Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Zero configuration table -->
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="mt-2" style="text-align: center;">
          <h4 class="text-center text-info">ACTIVE ADMISSION PORTAL FOR 2021/2022 APPLICATION BATCH A </h4>
        </div>
        <div class="card-body card-dashboard">
          <div class="table-responsive">
            <table class="table zero-configuration">
              <thead class="text-center">
                <tr>
                  <th> Interview</th>
                  <th>Batch</th>
                  <th>Portal Open</th>
                  <th>Portal Close</th>
                  <th> Status</th>
                  <th>Instruction</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr>
                  <td>03-03-2022</td>
                  <td>Batch A</td>
                  <td>Feb 10,2022</td>
                  <td>March 2nd,2022</td>
                  <td><span class="badge badge-pill badge-success badge-icon">Open</span></td>
                   <td> <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#default"> Read</button></td>
                  <td><button class="btn btn-danger btn-sm round declear_open_close"><i class="fas fa-reply-all"></i> Close</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Zero configuration table -->
        </div>
      </div>
    </div>
    <!-- END: Content-->
    <!-- demo chat-->

<!-- widget chat demo ends -->
    </div>
  
          <!--Basic Modal -->
          <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel1">Instruction</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="mb-0">
                    Bonbon caramels muffin. Chocolate bar oat cake cookie pastry dragée pastry. Carrot cake
                    chocolate tootsie roll chocolate bar candy canes biscuit.
                    Gummies bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet roll.
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Back</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
    <!-- BEGIN: Footer-->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/FooterScript.php"); ?>
    <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
     <?php include_once ("Links/adm_button_links.js.php") ?>
  </body>
  <!-- END: Body-->

</html>