<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: Publish Student Result</title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/HeaderLink.php";?>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
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
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-user-plus fa-2x"></span> Page Info Goes here </h3>
  </div>
    </div>
    <!-- starts  -->
     <!-- start-clients contant-->
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
            <p class='text-info mb-3'><b>NOTE: Before Publishing The Result of any Class, Make Sure that All the
                    results for each subject for that particular Class have been Uploaded Properly. Click On Result Upload Tab to view Uploaded Results ...</b></p>
            <form method="POST">
                <div class="row">
                    <div class="col-md-3">
                        <div class='input-group'>
                            <span class='input-group-addon' id='basic-addon2'>Student Class:</span>
                            <select id="result_class" class="js-basic-single form-control" name="result_class">
                                <option value="">--select--</option>
                                    <option value="BASIC 1">BASIC 1</option><option value="BASIC 2">BASIC 2</option><option value="BASIC 3">BASIC 3</option><option value="BASIC 4">BASIC 4</option><option value="BASIC 5">BASIC 5</option><option value="CRECHE">CRECHE</option><option value="JSS1">JSS1</option><option value="JSS2">JSS2</option><option value="JSS3">JSS3</option><option value="KG1">KG1</option><option value="KG2">KG2</option><option value="NURSERY 1">NURSERY 1</option><option value="NURSERY 2">NURSERY 2</option><option value="Playgroup">Playgroup</option><option value="SSS1">SSS1</option><option value="SSS2">SSS2</option><option value="SSS3">SSS3</option>                            </select>
                        </div>
                    </div> 

                    <div class='col-md-3'>
                        <div class='input-group'>
                            <span class='input-group-addon' id='basic-addon2'>Term:</span>
                             <select class="js-basic-single form-control" id="result_term" name="result_term">
                                <option value="">--select--</option>
                                <option value="First Term">First Term</option>
                                 <option value="Second Term">Second Term</option>
                                 <option value="Third Term">Third Term</option>
                                  </select>
                        </div>
                    </div>

                    <div class='col-md-3'>
                        <div class='input-group'>
                            <span class='input-group-addon' id='basic-addon2'>Session:</span>
                             <select class="js-basic-single form-control" id="result_session" name="result_session">
                        <option value="2021/2022">2021/2022</option>
                        <option value="2022/2023">2022/2023</option>
                        <option value="2023/2024">2023/2024</option>
                             </select>
                        </div>
                    </div>
                     <div class='col-md-3'>
                        <div class='input-group'>
                            <span class='input-group-addon' id='basic-addon2'>Action:</span>
                            <select id="result_action" name="result_action" class="js-basic-single form-control">
                                <option value="">--select--</option>
                                    <option value="1">Pending</option>
                                    <option value="2">Release</option>
                                    <option value="3">Held</option>
                                    <option value="4">Cancel</option>
                            </select>
                        </div>
                    </div>
                    <br />
                    <div class='col-md-2 mt-4'>
                        <button type="submit" id="publish_result_btn" name="publish_result_btn" value="update_result" class="btn
                        btn-outline-danger"> EXECUTE NOW </button>
                    </div>
                    <span class="mt-5" id="response"></span>
                </div>
                 
            </form>
            <br />
        </div>
                                    </div>
    </div>
<div class="card col-12">
    <div class="card-body">
        <div class="col-md-12 col-lg-12">
       <div class="table-responsive">
    <table id="mytable" class="table table-striped table-bordered">
        <thead class="text-center bg-purple text-white">
        <tr>

            <th>Result Class</th>
            <th>Number Of Students</th>
            <th>School Term</th>
            <th>Academic Session</th>
            <th>Result Status</th>


        </tr>
        <tbody class="text-center">
                                <tr>
                        <td>SSS1</td>
                        <td>1</td>
                        <td>Third Term</td>
                        <td>2021/2022</td>
                        <td><span class="badge badge-success">Released</span></td>

                    </tr>
            
            </tbody>
        </thead>
        </table>
    </div>
    </div>
</div>
                                        <!-- ############################# -->
                                </div>
                             <!-- page contend goes here -->
                            </div>
                        </div>
                        <!-- end-clients contant-->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
    <!-- Ends -->
    <!-- content goes here -->
        </div>
      </div>
    </div>
    <!-- END: Content-->

  
    </div>
    <!-- demo chat-->

    <!-- BEGIN: Footer-->
   <!--  -->
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
    <!-- END: Page JS-->

    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>