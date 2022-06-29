<?php 
date_default_timezone_set("Africa/Lagos");
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title>VISAP - VISTORS' MANAGEMENT</title>
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
             <h5 class="content-header-title float-left pr-1 mb-0">VISAP PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Admin</a>
                  </li>
                  <li class="breadcrumb-item active">VISTOR'S MANAGEMENT
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
  <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-user-secret fa-2x"></span> VISTOR'S BOOK </h3>
  </div>
</div>

<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
  <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-warning">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-user-secret fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Today</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Visitor->get_today_visitors();?></h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-user-secret fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">This Week</h3></div>
                  <h2 class="text-white mb-0"> <?php echo $Visitor->get_this_week_visitors();?></h2>
                 
                </div>
              </div>
            </div>

             <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-user-secret fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> This Term</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Visitor->get_current_term_visitors(); ?></h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-user-secret fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">This Session</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Visitor->get_current_session_visitors(); ?></h2>
                  
                </div>
              </div>
            </div>
           
            
          </div>
        </div>
        <!-- Revenue Growth Chart Starts -->
      </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
      
        <div class="card-body">
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="form" style="margin: 1rem;padding: 1rem;" style="width: 100%;">
                         <h3 class="text-muted">You can search Visitor by Date</h3>
                          <form action="visitor_logs" class="form-inline" method="post" style="width: 100%;">
                            <span class="text-c-red"><b> From: </b></span> <input type="date" name="from_date" class="form-control"> ||
                              <span class="text-c-red"><b> To: </b></span> <input type="date" name="to_date" class="form-control">
                            <button type="submit" name="search_by_date" class="btn btn-success btn-md"><i class="fa fa-search"></i> Search </button>
                        </form>
                    </div>
          </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered osotechDatatable">
              <thead class="text-center">
                <tr>
                 
                  <th>Name</th>
                  <th>Address</th>
                  <th>Phone No</th>
                  <th>NIN</th>
                  <th>Whom To See</th>
                  <th>Purpose</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Sign Out</th>
                </tr>
              </thead>
              <tbody class="text-center">
              <!-- filter_sales_history_by_date -->  
                      <?php if (isset($_POST['search_by_date'])): ?>
                    <?php 
                             $from_date = $_POST['from_date'];
                              $to_date = $_POST['to_date'];
                              $filter_visitors = $Visitor->filter_visitor_history_by_date($from_date,$to_date);
                              if ($filter_visitors!= false) {
                  // code...
                  foreach ($filter_visitors as $fvisitor) {?>
                    <tr>
                  <td><?php echo ucwords($fvisitor->visitor_name);?></td>
                  <td><?php echo ucwords($fvisitor->visitor_address);?></td>
                  <td><?php echo $fvisitor->visitor_phone;?></td>
                  <td><?php echo $fvisitor->NIN_number;?></td>
                  <td><?php echo ucfirst($fvisitor->whom_to_see);?></td>
                  <td><?php echo ucfirst($fvisitor->purpose_of_visit);?></td>
                  <td><span class="badge badge-pill badge-dark badge-md"><?php echo date("Y-m-d h:i:s A",strtotime($fvisitor->checkIn_time));?></span></td>
                  <td><?php if ($fvisitor->checkOut_time ==NULL || $fvisitor->status =='0'): ?>
                  <span class="badge badge-pill badge-warning badge-md"> Active</span>
                    <?php else: ?>
                  <span class="badge badge-pill badge-danger badge-md"> <?php echo date("Y-m-d h:i:s A",strtotime($fvisitor->checkOut_time)); ?></span>
                  <?php endif ?></td>
                  <td><?php if ($fvisitor->checkOut_time ==NULL || $fvisitor->status =='0'): ?>
                    <button type="button" title="Click to Sign Out Visitor" data-action="sign_out_vic" data-identity="<?php echo $fvisitor->visitor_id;?>" class="badge badge-pill badge-danger badge-md clickMeBtn"><i class="fa fa-sign-out"></i></button>
                  <?php else: ?>
                    <button type="button" disabled class="badge badge-pill badge-dark text-white"> Signed Out</button>
                  <?php endif ?></td>
                </tr>
                    <?php
                    // code...
                  }
                }
                 ?>
                    
                      <?php endif ?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Column selectors with Export Options and print table -->
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

   <!-- DataTableFooterScript.php -->

   <script>
     $(document).ready(function(){

      //when a sign out btn is clicked
      $(".clickMeBtn").on("click", function(){
       let myaction =$(this).data("action"),vicId=$(this).data("identity");
       if (confirm('Are you sure to Sign Out this Visitor?')) {
        //send request 
        $.post("../actions/actions",{action:myaction,vic_id:vicId},function(data){
           setTimeout(function(){
            $("#server-response").html(data);
           },1000);
        });
       }else{
        return false;
       }
      })
      $("#visitor_sign_in_form").on("submit", function(event){
      event.preventDefault();
       $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      const visitorModal = $(this).serialize();
      $.post("../actions/actions",visitorModal,function(res){
        console.log(res);
        setTimeout(()=>{
           $(".__loadingBtn__").html('<span class="fa fa-paper-plane"></span> Submit').attr("disabled",false);
          $("#server-response").html(res);
         // $("#visitorModal")[0].reset();
        },2500);
      })
   
     // window.location.replace("./");
    })
     })
   </script>
  </body>
  <!-- END: Body-->

</html>