<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>File Manager Application - Frest - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.html">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/app-file-manager.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout content-left-sidebar file-manager-application navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar" data-layout="semi-dark-layout">

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
      <div class="content-area-wrapper">
        <div class="sidebar-left">
          <div class="sidebar"><div class="app-file-sidebar sidebar-content d-flex">
  <!-- App File sidebar - Left section Starts -->
  <div class="app-file-sidebar-left">
    <!-- sidebar close icon starts -->
    <span class="app-file-sidebar-close"><i class="bx bx-x"></i></span>
    <!-- sidebar close icon ends -->
    <div class="form-group add-new-file text-center">
      <!-- Add File Button -->
      <label for="getFile" class="btn btn-primary btn-block glow my-2 add-file-btn text-capitalize"><i
          class="bx bx-plus"></i>Add File</label>
      <input type="file" class="d-none" id="getFile">
    </div>
    <div class="app-file-sidebar-content">
      <!-- App File Left Sidebar - Drive Content Starts -->
      <label class="app-file-label">My Drive</label>
      <div class="list-group list-group-messages my-50">
        <a href="javascript:void(0);" class="list-group-item list-group-item-action pt-0 active">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: morph-folder.svg; size: 24px; style: lines; strokeColor:#5A8DEE; eventOn:grandparent; duration:0.85;"></i>
          </div>
          All Files
          <span class="badge badge-light-danger badge-pill badge-round float-right mt-50">2</span>
        </a>
        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: morph-desktop-smartphone.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;"></i>
          </div>
          My Devices
        </a>
        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: clock.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;"></i>
          </div> Recents
        </a>
        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: morph-star.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;"></i>
          </div>
          Important
        </a>
        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: trash.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;"></i>
          </div>
          Deleted Files
        </a>
      </div>
      <!-- App File Left Sidebar - Drive Content Ends -->

      <!-- App File Left Sidebar - Labels Content Starts -->
      <label class="app-file-label">Labels</label>
      <div class="list-group list-group-labels my-50">
        <a href="javascript:void(0);" class="list-group-item list-group-item-action pt-0">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: morph-doc.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;"></i>
          </div>
          Documents
        </a>
        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: image.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;"></i>
          </div>
          Images
        </a>
        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: camcoder.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;"></i>
          </div> Videos
        </a>
        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: music.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;"></i>
          </div>
          Audio
        </a>
        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: servers.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;"></i>
          </div>
          Zip Files
        </a>
      </div>
      <!-- App File Left Sidebar - Labels Content Ends -->

      <!-- App File Left Sidebar - Storage Content Starts -->
      <label class="app-file-label mb-75">Storage Status</label>
      <div class="d-flex mb-1">
        <div class="fonticon-wrap mr-1">
          <i class="livicon-evo cursor-pointer"
            data-options="name: save.svg; size: 30px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;">
          </i>
        </div>
        <div class="file-manager-progress">
          <span class="text-muted font-size-small">19.5GB used of 25GB</span>
          <div class="progress progress-bar-primary progress-sm mb-0">
            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="80" aria-valuemax="100"
              style="width:80%;"></div>
          </div>
        </div>
      </div>
      <a href="javascript:void(0);" class="font-weight-bold">Upgrade Storage</a>
      <!-- App File Left Sidebar - Storage Content Ends -->
    </div>
  </div>
</div>
<!-- App File sidebar - Right section Starts -->
<div class="app-file-sidebar-info">
  <div class="card shadow-none mb-0 p-0 pb-1">
    <div class="card-header d-flex justify-content-between align-items-center border-bottom">
      <h6 class="mb-0">Document.pdf</h6>
      <div class="app-file-action-icons d-flex align-items-center">
        <i class="bx bx-trash cursor-pointer mr-50"></i>
        <i class="bx bx-x close-icon cursor-pointer"></i>
      </div>
    </div>
    <ul class="nav nav-tabs justify-content-center" role="tablist">
      <li class="nav-item mr-1 pt-50 pr-1 border-right">
        <a class=" nav-link active d-flex align-items-center" id="details-tab" data-toggle="tab" href="#details"
          aria-controls="details" role="tab" aria-selected="true">
          <i class="bx bx-file mr-50"></i>Details</a>
      </li>
      <li class="nav-item pt-50 ">
        <a class=" nav-link d-flex align-items-center" id="activity-tab" data-toggle="tab" href="#activity"
          aria-controls="activity" role="tab" aria-selected="false">
          <i class="bx bx-pulse mr-50"></i>Activity</a>
      </li>
    </ul>
    <div class="tab-content pl-0">
      <div class="tab-pane active" id="details" aria-labelledby="details-tab" role="tabpanel">
        <div class="border-bottom d-flex align-items-center flex-column pb-1">
          <img src="app-assets/images/icon/pdf.png" alt="PDF" height="42" width="35" class="my-1">
          <p class="mt-2">15.3mb</p>
        </div>
        <div class="card-body pt-2">
          <label class="app-file-label">Setting</label>
          <div class="d-flex justify-content-between align-items-center mt-75">
            <p>File Sharing</p>
            <div class="custom-control custom-switch custom-switch-primary custom-switch-glow custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="customSwitchGlow1">
              <label class="custom-control-label" for="customSwitchGlow1"></label>
            </div>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <p>Synchronization</p>
            <div class="custom-control custom-switch custom-switch-primary custom-switch-glow custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="customSwitchGlow2" checked>
              <label class="custom-control-label" for="customSwitchGlow2"></label>
            </div>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <p>Backup</p>
            <div class="custom-control custom-switch custom-switch-primary custom-switch-glow custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="customSwitchGlow3">
              <label class="custom-control-label" for="customSwitchGlow3"></label>
            </div>
          </div>

          <label class="app-file-label">Info</label>
          <div class="d-flex justify-content-between align-items-center mt-75">
            <p>Type</p>
            <p class="font-weight-bold">PDF</p>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <p>Size</p>
            <p class="font-weight-bold">15.6mb</p>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <p>Location</p>
            <p class="font-weight-bold">Files > Documents</p>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <p>Owner</p>
            <p class="font-weight-bold">Elnora Reese</p>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <p>Modified</p>
            <p class="font-weight-bold">September 4 2019</p>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <p>Opened</p>
            <p class="font-weight-bold">July 8, 2019</p>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <p>Created</p>
            <p class="font-weight-bold">July 1, 2019</p>
          </div>
        </div>
      </div>
      <div class="tab-pane pl-0" id="activity" aria-labelledby="activity-tab" role="tabpanel">
        <div class="card-body">
          <ul class="timeline mb-0">
            <li class="timeline-item timeline-icon-success active">
              <div class="timeline-time">Today</div>
              <h6 class="timeline-title">You added an item to</h6>
              <p class="timeline-text">You added an item</p>
              <div class="timeline-content">
                <img src="app-assets/images/icon/psd.png" alt="PSD" height="30" width="25"
                  class="mr-50">Mockup.psd
              </div>
            </li>
            <li class="timeline-item timeline-icon-info active">
              <div class="timeline-time">10 min ago</div>
              <h6 class="timeline-title">You shared 2 times</h6>
              <p class="timeline-text">Emily Bennett edited an item</p>
              <div class="timeline-content">
                <img src="app-assets/images/icon/sketch.png" alt="Sketch" height="30" width="25"
                  class="mr-50">Template_Design.sketch
              </div>
            </li>
            <li class="timeline-item timeline-icon-danger active">
              <div class="timeline-time">Mon 10:20 PM</div>
              <h6 class="timeline-title">You edited an item</h6>
              <p class="timeline-text">You edited an item</p>
              <div class="timeline-content">
                <img src="app-assets/images/icon/pdf.png" alt="document" height="30" width="25"
                  class="mr-50">Information.doc
              </div>
            </li>
            <li class="timeline-item timeline-icon-primary active">
              <div class="timeline-time">Jul 13 2019</div>
              <h6 class="timeline-title">You edited an item</h6>
              <p class="timeline-text">John Keller edited an item</p>
              <div class="timeline-content">
                <img src="app-assets/images/icon/pdf.png" alt="document" height="30" width="25"
                  class="mr-50">Documentation.doc
              </div>
            </li>
            <li class="timeline-item timeline-icon-warning">
              <div class="timeline-time">Apr 18 2019</div>
              <h6 class="timeline-title">You added an item to</h6>
              <p class="timeline-text">You edited an item</p>
              <div class="timeline-content">
                <img src="app-assets/images/icon/pdf.png" alt="document" height="30" width="25"
                  class="mr-50">Resume.pdf
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- App File sidebar - Right section Ends -->

          </div>
        </div>
        <div class="content-right">
          <div class="content-overlay"></div>
          <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- File Manager app overlay -->
<div class="app-file-overlay"></div>
<div class="app-file-area">
  <!-- File App Content Area -->
  <!-- App File Header Starts -->
  <div class="app-file-header">
    <!-- Header search bar starts -->
    <div class="app-file-header-search flex-grow-1">
      <div class="sidebar-toggle d-block d-lg-none">
        <i class="bx bx-menu"></i>
      </div>
      <fieldset class="form-group position-relative has-icon-left m-0">
        <input type="text" class="form-control border-0 shadow-none" id="file-search" placeholder="Search file">
        <div class="form-control-position">
          <i class="bx bx-search"></i>
        </div>
      </fieldset>
    </div>
    <!-- Header search bar Ends -->
    <!-- Header Icons Starts -->
    <div class="app-file-header-icons">
      <div class="fonticon-wrap d-inline mx-sm-1 align-middle">
        <i class="livicon-evo cursor-pointer"
          data-options="name: user.svg; size: 24px; style: lines; strokeColor:#596778; duration:0.85;"></i>
      </div>
      <div class="fonticon-wrap d-inline mr-sm-50 align-middle">
        <i class="livicon-evo cursor-pointer"
          data-options="name: trash.svg; size: 24px; style: lines; strokeColor:#596778; duration:0.85;"></i>
      </div>
      <i class="bx bx-dots-vertical-rounded font-medium-3 align-middle cursor-pointer"></i>
    </div>
    <!-- Header Icons Ends -->
  </div>
  <!-- App File Header Ends -->

  <!-- App File Content Starts -->
  <div class="app-file-content p-2">
    <h5>All Files</h5>

    <!-- App File - Recent Accessed Files Section Starts -->
    <label class="app-file-label">Recently Accessed Files</label>
    <div class="row app-file-recent-access">
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <img class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
            <img class="d-block mx-auto" src="app-assets/images/icon/pdf.png" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-recent-details">
              <div class="app-file-name font-size-small font-weight-bold">Felecia Resume.pdf</div>
              <div class="app-file-size font-size-small text-muted mb-25">12.85kb</div>
              <div class="app-file-last-access font-size-small text-muted">Last accessed : 3 hours ago</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <img class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
            <img class="d-block mx-auto" src="app-assets/images/icon/psd.png" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-content-details">
              <div class="app-file-name font-size-small font-weight-bold">Logo_design.psd</div>
              <div class="app-file-size font-size-small text-muted mb-25">15.60mb</div>
              <div class="app-file-last-access font-size-small text-muted">Last accessed : 3 hours ago</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <img class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
            <img class="d-block mx-auto" src="app-assets/images/icon/doc.png" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-content-details">
              <div class="app-file-name font-size-small font-weight-bold">Music_Two.xyz</div>
              <div class="app-file-size font-size-small text-muted mb-25">1.2gb</div>
              <div class="app-file-last-access font-size-small text-muted">Last accessed : 3 hours ago</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <i class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></i>
            <img class="d-block mx-auto" src="app-assets/images/icon/sketch.png" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-content-details">
              <div class="app-file-name font-size-small font-weight-bold">Application.sketch</div>
              <div class="app-file-size font-size-small text-muted mb-25">92.83kb</div>
              <div class="app-file-last-access font-size-small text-muted">Last accessed : 3 hours ago</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- App File - Recent Accessed Files Section Ends -->

    <!-- App File - Folder Section Starts -->
    <label class="app-file-label">Folder</label>
    <div class="row app-file-folder">
      <div class="col-lg-3 col-md-4 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="card-body px-75 py-50">
            <div class="app-file-folder-content d-flex align-items-center">
              <div class="app-file-folder-logo mr-75">
                <i class="bx bx-folder font-medium-4"></i>
              </div>
              <div class="app-file-folder-details">
                <div class="app-file-folder-name font-size-small font-weight-bold">Project</div>
                <div class="app-file-folder-size font-size-small text-muted">2 files, 14.05mb</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="card-body px-75 py-50">
            <div class="app-file-folder-content d-flex align-items-center">
              <div class="app-file-folder-logo mr-75">
                <i class="bx bx-folder font-medium-4"></i>
              </div>
              <div class="app-file-folder-details">
                <div class="app-file-folder-name font-size-small font-weight-bold">Video</div>
                <div class="app-file-folder-size font-size-small text-muted">130 files, 890mb</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="card-body px-75 py-50">
            <div class="app-file-folder-content d-flex align-items-center">
              <div class="app-file-folder-logo mr-75">
                <i class="bx bx-folder font-medium-4"></i>
              </div>
              <div class="app-file-folder-details">
                <div class="app-file-folder-name font-size-small font-weight-bold">Music</div>
                <div class="app-file-folder-size font-size-small text-muted">15 files, 58mb</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="card-body px-75 py-50">
            <div class="app-file-folder-content d-flex align-items-center">
              <div class="app-file-folder-logo mr-75">
                <i class="bx bx-folder font-medium-4"></i>
              </div>
              <div class="app-file-folder-details">
                <div class="app-file-folder-name font-size-small font-weight-bold">Documents</div>
                <div class="app-file-folder-size font-size-small text-muted">12 files, 9.5mb</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="card-body px-75 py-50">
            <div class="app-file-folder-content d-flex align-items-center">
              <div class="app-file-folder-logo mr-75">
                <i class="bx bx-folder font-medium-4"></i>
              </div>
              <div class="app-file-folder-details">
                <div class="app-file-folder-name font-size-small font-weight-bold">Application Design</div>
                <div class="app-file-folder-size font-size-small text-muted">1 files, 36.25kb</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="card-body px-75 py-50">
            <div class="app-file-folder-content d-flex align-items-center">
              <div class="app-file-folder-logo mr-75">
                <i class="bx bx-folder font-medium-4"></i>
              </div>
              <div class="app-file-folder-details">
                <div class="app-file-folder-name font-size-small font-weight-bold">Photos</div>
                <div class="app-file-folder-size font-size-small text-muted">3.6k files, 348mb</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- App File - Folder Section Ends -->

    <!-- App File - Files Section Starts -->
    <label class="app-file-label">Files</label>
    <div class="row app-file-files">
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <img class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
            <img class="d-block mx-auto" src="app-assets/images/icon/pdf.png" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-details">
              <div class="app-file-name font-size-small font-weight-bold">Banner.jpg</div>
              <div class="app-file-size font-size-small text-muted mb-25">13kb</div>
              <div class="app-file-type font-size-small text-muted">Image File</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <img class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
            <img class="d-block mx-auto" src="app-assets/images/icon/psd.png" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-details">
              <div class="app-file-name font-size-small font-weight-bold">Management.docx</div>
              <div class="app-file-size font-size-small text-muted mb-25">15.60mb</div>
              <div class="app-file-type font-size-small text-muted">Word Document</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <img class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
            <img class="d-block mx-auto" src="app-assets/images/icon/doc.png" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-details">
              <div class="app-file-name font-size-small font-weight-bold">Thunder.mp3</div>
              <div class="app-file-size font-size-small text-muted mb-25">3.4mb</div>
              <div class="app-file-type font-size-small text-muted">Mp3 File</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <i class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></i>
            <img class="d-block mx-auto" src="app-assets/images/icon/sketch.png" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-details">
              <div class="app-file-name font-size-small font-weight-bold">Dashboard.sketch</div>
              <div class="app-file-size font-size-small text-muted mb-25">108kb</div>
              <div class="app-file-type font-size-small text-muted">Sketch File</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <img class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
            <img class="d-block mx-auto" src="app-assets/images/icon/psd.png" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-details">
              <div class="app-file-name font-size-small font-weight-bold">Logo.psd</div>
              <div class="app-file-size font-size-small text-muted mb-25">10.6kb</div>
              <div class="app-file-type font-size-small text-muted">Photoshop File</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <i class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></i>
            <img class="d-block mx-auto" src="app-assets/images/icon/sketch.png" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-details">
              <div class="app-file-name font-size-small font-weight-bold">Logo_Design.sketch</div>
              <div class="app-file-size font-size-small text-muted mb-25">256.5kb</div>
              <div class="app-file-type font-size-small text-muted">Sketch File</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <img class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
            <img class="d-block mx-auto" src="app-assets/images/icon/doc.png" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-details">
              <div class="app-file-name font-size-small font-weight-bold">Bootstrap.xyz</div>
              <div class="app-file-size font-size-small text-muted mb-25">0.0kb</div>
              <div class="app-file-type font-size-small text-muted">Unknown File</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <img class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
            <img class="d-block mx-auto" src="app-assets/images/icon/pdf.png" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-details">
              <div class="app-file-name font-size-small font-weight-bold">Read_Me.pdf</div>
              <div class="app-file-size font-size-small text-muted mb-25">10.5kb</div>
              <div class="app-file-type font-size-small text-muted">PDF File</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- App File - Files Section Ends -->
  </div>
</div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Customizer-->
    <div class="customizer d-none d-md-block"><a class="customizer-toggle" href="javascript:void(0);"><i class="bx bx-cog bx bx-spin white"></i></a><div class="customizer-content p-2">
  <h4 class="text-uppercase mb-0">Theme Customizer</h4>
  <small>Customize & Preview in Real Time</small>
  <a href="javascript:void(0)" class="customizer-close">
    <i class="bx bx-x"></i>
  </a>
  <hr>
  <!-- Theme options starts -->
  <h5 class="mt-1">Theme Layout</h5>
  <div class="theme-layouts">
    <div class="d-flex justify-content-start">
      <div class="mx-50">
        <fieldset>
          <div class="radio">
            <input type="radio" name="layoutOptions" value="false" id="radio-light" class="layout-name" data-layout=""
              checked>
            <label for="radio-light">Light</label>
          </div>
        </fieldset>
      </div>
      <div class="mx-50">
        <fieldset>
          <div class="radio">
            <input type="radio" name="layoutOptions" value="false" id="radio-dark" class="layout-name"
              data-layout="dark-layout">
            <label for="radio-dark">Dark</label>
          </div>
        </fieldset>
      </div>
      <div class="mx-50">
        <fieldset>
          <div class="radio">
            <input type="radio" name="layoutOptions" value="false" id="radio-semi-dark" class="layout-name"
              data-layout="semi-dark-layout">
            <label for="radio-semi-dark">Semi Dark</label>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
  <!-- Theme options starts -->
  <hr>

  <!-- Menu Colors Starts -->
  <div id="customizer-theme-colors">
    <h5>Menu Colors</h5>
    <ul class="list-inline unstyled-list">
      <li class="color-box bg-primary selected" data-color="theme-primary"></li>
      <li class="color-box bg-success" data-color="theme-success"></li>
      <li class="color-box bg-danger" data-color="theme-danger"></li>
      <li class="color-box bg-info" data-color="theme-info"></li>
      <li class="color-box bg-warning" data-color="theme-warning"></li>
      <li class="color-box bg-dark" data-color="theme-dark"></li>
    </ul>
    <hr>
  </div>
  <!-- Menu Colors Ends -->
  <!-- Menu Icon Animation Starts -->
  <div id="menu-icon-animation">
    <div class="d-flex justify-content-between align-items-center">
      <div class="icon-animation-title">
        <h5 class="pt-25">Icon Animation</h5>
      </div>
      <div class="icon-animation-switch">
        <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" checked id="icon-animation-switch">
          <label class="custom-control-label" for="icon-animation-switch"></label>
        </div>
      </div>
    </div>
    <hr>
  </div>
  <!-- Menu Icon Animation Ends -->
  <!-- Collapse sidebar switch starts -->
  <div class="collapse-sidebar d-flex justify-content-between align-items-center">
    <div class="collapse-option-title">
      <h5 class="pt-25">Collapse Menu</h5>
    </div>
    <div class="collapse-option-switch">
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="collapse-sidebar-switch">
        <label class="custom-control-label" for="collapse-sidebar-switch"></label>
      </div>
    </div>
  </div>
  <!-- Collapse sidebar switch Ends -->
  <hr>

  <!-- Navbar colors starts -->
  <div id="customizer-navbar-colors">
    <h5>Navbar Colors</h5>
    <ul class="list-inline unstyled-list">
      <li class="color-box bg-white border selected" data-navbar-default=""></li>
      <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
      <li class="color-box bg-success" data-navbar-color="bg-success"></li>
      <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
      <li class="color-box bg-info" data-navbar-color="bg-info"></li>
      <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
      <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
    </ul>
    <small><strong>Note :</strong> This option with work only on sticky navbar when you scroll page.</small>
    <hr>
  </div>
  <!-- Navbar colors starts -->
  <!-- Navbar Type Starts -->
  <h5>Navbar Type</h5>
  <div class="navbar-type d-flex justify-content-start">
    <div class="hidden-ele mx-50">
      <fieldset>
        <div class="radio">
          <input type="radio" name="navbarType" value="false" id="navbar-hidden">
          <label for="navbar-hidden">Hidden</label>
        </div>
      </fieldset>
    </div>
    <div class="mx-50">
      <fieldset>
        <div class="radio">
          <input type="radio" name="navbarType" value="false" id="navbar-static">
          <label for="navbar-static">Static</label>
        </div>
      </fieldset>
    </div>
    <div class="mx-50">
      <fieldset>
        <div class="radio">
          <input type="radio" name="navbarType" value="false" id="navbar-sticky" checked>
          <label for="navbar-sticky">Fixed</label>
        </div>
      </fieldset>
    </div>
  </div>
  <hr>
  <!-- Navbar Type Starts -->

  <!-- Footer Type Starts -->
  <h5>Footer Type</h5>
  <div class="footer-type d-flex justify-content-start">
    <div class="mx-50">
      <fieldset>
        <div class="radio">
          <input type="radio" name="footerType" value="false" id="footer-hidden">
          <label for="footer-hidden">Hidden</label>
        </div>
      </fieldset>
    </div>
    <div class="mx-50">
      <fieldset>
        <div class="radio">
          <input type="radio" name="footerType" value="false" id="footer-static" checked>
          <label for="footer-static">Static</label>
        </div>
      </fieldset>
    </div>
    <div class="mx-50">
      <fieldset>
        <div class="radio">
          <input type="radio" name="footerType" value="false" id="footer-sticky">
          <label for="footer-sticky" class="">Sticky</label>
        </div>
      </fieldset>
    </div>
  </div>
  <!-- Footer Type Ends -->
  <hr>

  <!-- Card Shadow Starts-->
  <div class="card-shadow d-flex justify-content-between align-items-center py-25">
    <div class="hide-scroll-title">
      <h5 class="pt-25">Card Shadow</h5>
    </div>
    <div class="card-shadow-switch">
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" checked id="card-shadow-switch">
        <label class="custom-control-label" for="card-shadow-switch"></label>
      </div>
    </div>
  </div>
  <!-- Card Shadow Ends-->
  <hr>

  <!-- Hide Scroll To Top Starts-->
  <div class="hide-scroll-to-top d-flex justify-content-between align-items-center py-25">
    <div class="hide-scroll-title">
      <h5 class="pt-25">Hide Scroll To Top</h5>
    </div>
    <div class="hide-scroll-top-switch">
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="hide-scroll-top-switch">
        <label class="custom-control-label" for="hide-scroll-top-switch"></label>
      </div>
    </div>
  </div>
  <!-- Hide Scroll To Top Ends-->
</div>

    </div>
    <!-- End: Customizer-->

    <!-- Buynow Button-->
    <div class="buy-now"><a href="https://1.envato.market/frest_admin" target="_blank" class="btn btn-danger">Buy Now</a>

    </div>
    <!-- demo chat-->
    <div class="widget-chat-demo"><!-- widget chat demo footer button start -->
<button class="btn btn-primary chat-demo-button glow px-1"><i class="livicon-evo"
    data-options="name: comments.svg; style: lines; size: 24px; strokeColor: #fff; autoPlay: true; repeat: loop;"></i></button>
<!-- widget chat demo footer button ends -->
<!-- widget chat demo start -->
<div class="widget-chat widget-chat-demo d-none">
  <div class="card mb-0">
    <div class="card-header border-bottom p-0">
      <div class="media m-75">
        <a href="JavaScript:void(0);">
          <div class="avatar mr-75">
            <img src="app-assets/images/portrait/small/avatar-s-2.jpg" alt="avtar images" width="32"
              height="32">
            <span class="avatar-status-online"></span>
          </div>
        </a>
        <div class="media-body">
          <h6 class="media-heading mb-0 pt-25"><a href="javaScript:void(0);">Kiara Cruiser</a></h6>
          <span class="text-muted font-small-3">Active</span>
        </div>
      </div>
      <div class="heading-elements">
        <i class="bx bx-x widget-chat-close float-right my-auto cursor-pointer"></i>
      </div>
    </div>
    <div class="card-body widget-chat-container widget-chat-demo-scroll">
      <div class="chat-content">
        <div class="badge badge-pill badge-light-secondary my-1">today</div>
        <div class="chat">
          <div class="chat-body">
            <div class="chat-message">
              <p>How can we help? 😄</p>
              <span class="chat-time">7:45 AM</span>
            </div>
          </div>
        </div>
        <div class="chat chat-left">
          <div class="chat-body">
            <div class="chat-message">
              <p>Hey John, I am looking for the best admin template.</p>
              <p>Could you please help me to find it out? 🤔</p>
              <span class="chat-time">7:50 AM</span>
            </div>
          </div>
        </div>
        <div class="chat">
          <div class="chat-body">
            <div class="chat-message">
              <p>Stack admin is the responsive bootstrap 4 admin template.</p>
              <span class="chat-time">8:01 AM</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer border-top p-1">
      <form class="d-flex" onsubmit="widgetChatMessageDemo();" action="javascript:void(0);">
        <input type="text" class="form-control chat-message-demo mr-75" placeholder="Type here...">
        <button type="submit" class="btn btn-primary glow px-1"><i class="bx bx-paper-plane"></i></button>
      </form>
    </div>
  </div>
</div>
<!-- widget chat demo ends -->

    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
      <p class="clearfix mb-0"><span class="float-left d-inline-block">2021 &copy; PIXINVENT</span><span class="float-right d-sm-inline-block d-none">Crafted with<i class="bx bxs-heart pink mx-50 font-small-3"></i>by<a class="text-uppercase" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="bx bx-up-arrow-alt"></i></button>
      </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js"></script>
    <script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js"></script>
    <script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/scripts/configs/vertical-menu-dark.min.js"></script>
    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <script src="app-assets/js/scripts/components.min.js"></script>
    <script src="app-assets/js/scripts/footer.min.js"></script>
    <script src="app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/pages/app-file-manager.min.js"></script>
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->

<!-- Mirrored from www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/ltr/vertical-menu-template-semi-dark/app-file-manager.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 22 Jan 2022 08:48:56 GMT -->
</html>