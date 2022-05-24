<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $lang['webtitle'] ?> || School Administratives</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                   <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">H.O.Ds
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
  <div class="col-12">
    <h3 class="bd-lead text-primary text-bold">SCHOOL ADMINISTRATIVE MEMBERS</h3>
  </div>
</div>
<section id="multiple-column-form">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">ASSIGN SCHOOL ADMINISTRTORS</h4>
        </div>
        <div class="card-body">
         <div class="mb-2">
            <button type="button" class="btn btn-outline-primary block" data-toggle="modal" data-target="#default">
           Add New Office
          </button>
         </div>
          <form class="form" id="RosterForm">
            <div class="form-body">
              <div class="row">
                 <div class="col-md-6 col-12">
                   <label for="csession">Staff Name</label>
                  <select name="" class="select2 form-control">
                    <option value="">Staff</option>
                    <option value="">Miss Adeola M &raquo; BSc </option>
                  </select>
                   
                 
                </div>
                <div class="col-md-6 col-12">
                     <label for="csession">Assign Office</label>
                  <select name="" class="select2 form-control" multiple>
                    <option value="">--Select Office-- </option>
                    <option value="pr">Principal </option>
                    <option value="vpr">Vice Principal </option>
                  </select>
                </div>
             
  <!-- daterange end -->
                </div>
                <!--   -->
                <div class="col-12 d-flex justify-content-end mt-2">
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
        <div class="card-header">
          <h4 class="text-center">STAFF OFFICE FOR THE 2021/2022 ACADEMIC SESSION </h4>
        </div>
        <div class="card-body card-dashboard">
         
          <div class="table-responsive">
            <table class="table osotechDatatable">
              <thead class="text-center">
                <tr>
                  <th>Staff</th>
                  <th>Qualification</th>
                  <th>Position</th>
                  <th>Join Date</th>
                  <th>Salary</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <tr>
                  <td>Samson Ojo</td>
                  <td>Ph'd</td>
                  <td>Principal</td>
                  <td>Feb 2nd, 2021</td>
                   <td> &#8358;100,000.00</td>
                  <td><div class="btn-group dropdown mr-1 mb-1">
            <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="5,20">
              Options
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
             <a class="dropdown-item text-warning" href="javascript:void(0);" data-toggle="modal" data-target="#updateStaffOfficeModal"><span class="fa fa-edit"></span>&nbsp;Edit Office</a>
              <!--  -->
               <a class="dropdown-item text-danger" href="javascript:void(0);"><span class="fa fa-trash"></span>&nbsp; Remove From Office</a>
          
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
<!--/ Zero configuration table -->


        </div>
      </div>
    </div>
    <!-- END: Content-->

    <!-- demo chat-->
   <!-- ChatDemo.php -->
<!-- widget chat demo ends -->
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

          <!--Basic Modal -->
          <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                   <h3 class="text-center"><span class="fa fa-briefcase fa-1x"></span> Add New Office</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
               
               <form action="">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
              
                <div class="col-md-12">
                     <div class="form-group">
                  <label for="csv_class">Office Desc</label>
                    <input type="text" name="" id="office" class="form-control" placeholder="Principal">
                    </div>
                  </div>
                    <div class="col-12 col-md-12 col-sm-12 mt-1">
                      <fieldset class="form-label-group mb-0">
                          <textarea data-length=150 class="form-control char-textarea" id="textarea-counter" rows="3" placeholder="About this Office"></textarea>
                          <label for="textarea-counter">About this Office</label>
                      </fieldset>
                      <small class="counter-value float-right mb-1"><span class="char-count">0</span> / 150 </small>
                  </div>
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="csv_term">Status</label>
                    <select name="csv_term" id="csv_term" class="select2 form-control form-control-lg">
                      <option value="">--Select--</option>
                      <option value="1">Active</option>
                      <option value="2">Inactive</option>
                    </select>
                    </div>
                  </div>
                  <input type="hidden" name="action" value="set_office">
                  
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml-1">
                    <span class="fa fa-paper-plane"></span> Submit</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <i class="bx bx-power-off"></i>
                    Cancel
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
          <!-- End Modal -->

          <!-- Start Update Staff office Modal -->
          <!--Basic Modal -->
          <div class="modal fade text-left" id="updateStaffOfficeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                   <h3 class="text-center"><span class="fa fa-briefcase fa-1x"></span> Update Office</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
               
               <form action="">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
              
                <div class="col-md-12">
                     <div class="form-group">
                  <label for="staff_name">Staff Name</label>
                    <input type="text" name="staff_name" id="staff_name" class="form-control" value="Mr Samson Ojo" readonly>
                    </div>
                  </div>
                      <div class="col-md-12">
                     <div class="form-group">
                  <label for="old_office">Current Office</label>
                    <input type="text" name="old_office" id="old_office" class="form-control" value="Principal" readonly>
                    </div>
                  </div>
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="c_office">Change Office To</label>
                    <select name="c_office" id="c_office" class="select2 form-control form-control-lg">
                      <option value="">--Select--</option>
                      <option value="1">Principal</option>
                      <option value="2">Vice Principal</option>
                    </select>
                    </div>
                  </div>
                  <input type="hidden" name="action" value="update_staff_office">
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml-1">
                    <span class="fa fa-paper-plane"></span> Save Change</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <i class="bx bx-power-off"></i>
                    Cancel
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
          <!-- End Update Staff office Modal -->
    <!-- BEGIN: Footer-->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
  <script>
    $(document).ready(function(){
      $("#RosterForm").on("submit", function(event){
      event.preventDefault()
      if (confirm("Are you Sure?")) {
         window.location.assign("./");
      }else{
        window.location.replace("./page-not-authorized");
      }
    
     
      })
      
    })
  </script>
  </body>
  <!-- END: Body-->

</html>