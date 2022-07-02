<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: Publish Student Result</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
  </head>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
    <!-- headerNav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
  <?php include ("template/Sidebar.php"); ?>
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
             <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"> <?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">PUBLISH RESULT
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><div class="row">
 
</div>
<!--start--> 
<div class="col-md-12">
                        <div class="row">
                            <div class="col-12">
                                <!-- Validation Tooltips -->
                                <div class='card'>
                                    <div class="card-header bg-primary">
                                        <div class="card-title"><h3 class="text-center text-white">Publish
                                                Uploaded
                                                Results</h3></div>
                                    </div>
                                    <div class="card-body">
                                    <!--  -->
            <p class='text-info mb-3'>
              <b>NOTE: Before Publishing The Result of any Class, Make Sure that All the
                    results for each subject for that particular Class have been Uploaded Properly. Click On Result Upload Tab to view Uploaded Results 
                  ...</b></p>
            <form method="POST">
                <div class="row">
                     <div class='col-md-4 col-sm-12 col-xs-12'>
                        <div class='form-group'>
                            <label>Academic Session</label>
                             <select class="select2 form-control" id="school_session" name="school_session">
                                <option value="">--select--</option>
                                <option value="2019/2022">2019/2022</option>
                                 <option value="2020/2021">2020/2021</option>
                                 <option value="2021/2022">2021/2022</option>
                                  </select>
                        </div>
                    </div>
                      <div class='col-md-4 col-sm-12 col-xs-12'>
                        <div class='form-group'>
                            <label>Term</label>
                             <select class="js-basic-single form-control" id="result_term" name="result_term">
                                <option value="">--select--</option>
                                <option value="First Term">First Term</option>
                                 <option value="Second Term">Second Term</option>
                                 <option value="Third Term">Third Term</option>
                                  </select>
                        </div>
                    </div>
                   
                     <div class='col-md-4 col-sm-12 col-xs-12'>
                        <div class='form-group'>
                            <label>Actions</label>
                            <select id="result_action" name="result_action" class="form-control">
                                <option value="">--select--</option>
                                    <option value="1">Pending</option>
                                    <option value="2">Release</option>
                            </select>
                        </div>
                    </div>
                    <div class='form-group'>
                    <button type="submit" id="publish_result_btn" name="publish_result_btn" value="update_result" class="btn btn-danger btn-md float-right"> Submit </button>
                    </div> <div class="clearfix"></div>
                    <span class="mt-5" id="response"></span>
                </div>
            </form>
        </div>
      </div>
    </div>

         <!-- page contend goes here -->

                            </div>
                            <!-- show -->
<section id="column-selectors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body card-dashboard">
          <div class="table-responsive">
            <table class="table table-striped osotechDatatable">
              <thead class="text-center">
                <tr>
           <th>Academic Session</th>
            <th>School Term</th>
            <th>Number Of Students</th>
            <th>Result Status</th>
             <th>Released Date</th>
             <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr>
                  <td>2021-2022</td>
                  <td>First Term</td>
                  <td><span class="badge badge-pill badge-info">270</span></td>
                  <td><span class="badge badge-pill badge-success">Released</span></td>
                   <td>02-10-2021</td>
                  <td><div class="btn-group dropdown mr-1 mb-1">
            <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="5,20">
              Options
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
             <a class="dropdown-item text-warning" href="javascript:void(0);"><span class="fa fa-check"></span>&nbsp;Release</a>
              <!--  -->
               <a class="dropdown-item text-danger" href="javascript:void(0);"><span class="fa fa-times"></span>&nbsp;Pend</a>
          
            </div>
          </div></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
                <!-- show ends -->
                    </div>
                        </div>  
                      </div>
<!--     ends-->
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
    <!-- BEGIN: Footer-->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
  </body>
  <!-- END: Body-->
</html>