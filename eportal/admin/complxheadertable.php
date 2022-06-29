<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo __SCHOOL_NAME__ ?> :: </title>
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
              <h5 class="content-header-title float-left pr-1 mb-0">DataTables</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="index-2.html"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item active">Datatable
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><div class="row">
  <div class="col-12">
    <p>
      Read full documnetation
      <a href="https://datatables.net/" target="_blank">here</a>
    </p>
  </div>
</div>
<!-- Zero configuration table -->
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Zero configuration</h4>
        </div>
        <div class="card-body card-dashboard">
          <p class="card-text">
            DataTables has most features enabled by default, so all you need
            to do to use it with your own tables is to call the construction
            function: $().DataTable();.
          </p>
          <div class="table-responsive">
            <table class="table zero-configuration">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
                  <th>Salary</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                </tr>
               
              </tbody>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
                  <th>Salary</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Zero configuration table -->
<!-- Row grouping -->
<section id="row-grouping">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Row grouping</h4>
        </div>
        <div class="card-body card-dashboard">
          <p class="card-text">
            Although DataTables doesn't have row grouping built-in (picking
            one of the many methods available would overly limit the
            DataTables core), it is most certainly possible to give the look
            and feel of row grouping.
          </p>
          <div class="table-responsive">
            <table class="table row-grouping">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
                  <th>Salary</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Jena Gaines</td>
                  <td>Office Manager</td>
                  <td>London</td>
                  <td>30</td>
                  <td>2008/12/19</td>
                  <td>$90,560</td>
                </tr>
              
              </tbody>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Age</th>
                  <th>Start date</th>
                  <th>Salary</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Row grouping -->

<!-- Complex headers table -->
<section id="headers">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Complex headers</h4>
        </div>
        <div class="card-body card-dashboard">
          <p class="card-text">
            When using tables to display data, you will often wish to display
            column information in groups. DataTables fully supports colspan
            and rowspan in the table's header, assigning the required order
            listeners to the TH element suitable for that column.
          </p>
          <div class="table-responsive">
            <table class="table table-striped table-bordered complex-headers">
              <thead>
                <tr>
                  <th rowspan="2" class="align-top">Name</th>
                  <th colspan="2">HR Information</th>
                  <th colspan="3">Contact</th>
                </tr>
                <tr>
                  <th>Position</th>
                  <th>Salary</th>
                  <th>Office</th>
                  <th>Extn.</th>
                  <th>E-mail</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>$320,800</td>
                  <td>Edinburgh</td>
                  <td>5421</td>
                  <td>t.nixon@datatables.net</td>
                </tr>
               
              </tbody>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Salary</th>
                  <th>Office</th>
                  <th>Extn.</th>
                  <th>E-mail</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Complex headers table -->


        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Customizer-->
   <!-- Customizer.php -->
    <!-- End: Customizer-->

    <!-- Buynow Button-->
   <!--  <div class="buy-now"><a href="https://1.envato.market/frest_admin" target="_blank" class="btn btn-danger">Buy Now</a>

    </div> -->
    <!-- demo chat-->
   <!-- ChatDemo.php -->
<!-- widget chat demo ends -->
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->
  <?php include ("template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("template/DataTableFooterScript.php"); ?>
   <!-- DataTableFooterScript.php -->
  </body>
  <!-- END: Body-->

</html>