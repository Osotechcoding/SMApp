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
                  <li class="breadcrumb-item active">WebSite Settings
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-edit fa-1x"></span> SCHOOL PROFILE MANAGEMENT MODULE </h3>
  </div>
    </div>
    <!-- content goes here -->
      <!-- account setting page start -->
<section id="page-account-settings">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <!-- left menu section -->
                <div class="col-md-3 mb-2 mb-md-0 pills-stacked">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center active" id="account-pill-general" data-toggle="pill"
                                href="#account-vertical-general" aria-expanded="true">
                                <i class="bx bx-cog"></i>
                                <span>Administrator Info</span>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="account-pill-info" data-toggle="pill"
                                href="#account-vertical-info" aria-expanded="false">
                                <i class="bx bx-info-circle"></i>
                                <span>School Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="account-pill-social" data-toggle="pill"
                                href="#account-vertical-social" aria-expanded="false">
                                <i class="bx bxl-twitch"></i>
                                <span>Social links</span>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="account-pill-social" data-toggle="pill"
                                href="#new-account-vertical-form" aria-expanded="false">
                                <i class="fa fa-user-plus"></i>
                                <span>Add New Staff</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- right content section -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                    aria-labelledby="account-pill-general" aria-expanded="true">
                                    <div class="media">
                                        <a href="javascript: void(0);">
                                            <img src="../schlogo.jpg"
                                                class="rounded mr-75" alt="profile image" height="250" width="250">
                                        </a>
                                       
                                    </div>

                                    <hr>
                                    <form class="validate-form">
                                        <div class="row">
                                          <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label> OWNER'S NAME</label>
                                                        <input autocomplete="off" type="text" class="form-control"
                                                            placeholder="Prof. Idowu Samson A" name="username">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label> OWNER'S CONTACT</label>
                                                        <input autocomplete="off" type="text" class="form-control"
                                                            placeholder="09043654443" name="motto">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label> PRINCIPAL'S NAME</label>
                                                        <input autocomplete="off" type="text" class="form-control"
                                                            placeholder="Mr Lawal O.P" name="director">
                                                    </div>
                                                </div>
                                            </div>
                                              <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>PRINCIPAL'S CONTACT</label>
                                                        <input autocomplete="off" type="text" class="form-control"
                                                            placeholder="09043654443"  name="director_phone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label> REGISTRAR'S NAME</label>
                                                        <input autocomplete="off" type="text" class="form-control"
                                                            placeholder="Ayangalu Fagbayi" name="registrar">
                                                    </div>
                                                </div>
                                            </div>
                                           
                                             <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>REGISTRAR'S CONTACT</label>
                                                        <input autocomplete="off" type="text" class="form-control"
                                                            placeholder="09043654443" name="r_phone">
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save Changes</button>
                                                <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                               
                                <div class="tab-pane fade" id="account-vertical-info" role="tabpanel"
                                    aria-labelledby="account-pill-info" aria-expanded="false">
                                    <form class="validate-form">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>SCHOOL NAME</label>
                                                    <input autocomplete="off" type="text" class="form-control"
                                                        placeholder="VISPA GROUP OF SCHOOLS">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>MOTTO</label>
                                                    <input autocomplete="off" type="text" class="form-control"
                                                        placeholder="...all things are possible">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>APPROVAL NUMBER</label>
                                                    <input autocomplete="off" type="text" class="form-control"
                                                        placeholder="OG/NAPPS/009" name="approval_number">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>BRIEF HISTORY OF THE SCHOOL</label>
                                                    <textarea class="form-control" name="school_history" rows="3" placeholder="Brief History of the School here..."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>FOUNDED YEAR</label>
                                                        <input autocomplete="off" type="text" class="form-control birthdate-picker" placeholder="Founded date" name="founded_year">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>SCHOOL LOCATION/ADDRESS</label>
                                                        <textarea name="school_address" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>SCHOOL STATE</label>
                                                    <select class="form-control" name="school_state">
                                                        <option>Choose...</option>
                                                        <option>Ogun State</option>
                                                        <option>Lagos State</option>
                                                        <option>Oyo State</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>SCHOOL LGA</label>
                                                    <select class="form-control" name="school_lga">
                                                        <option>Choose...</option>
                                                        <option>Alimosho lga</option>
                                                        <option>Ikeja</option>
                                                        <option>Shomolu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>SCHOOL COUNTRY</label>
                                                    <select class="form-control" name="country">
                                                        <option>Choose...</option>
                                                        <option>Nigeria</option>
                                                        <option>Ghana</option>
                                                        <option>South Africa</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>OFFICIAL LANGUAGE </label>
                                                    <select class="form-control" name="school_language">
                                                        <option value="English" selected>English</option>
                                                        <option value="yourba">Yoruba</option>
                                                        <option value="hausa">Hausa</option>
                                                        <option value="igbo">Igbo</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>SCHOOL PHONE</label>
                                                        <input autocomplete="off" type="text" class="form-control"
                                                            placeholder="Phone number"
                                                            name="school_phone">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>SCHOOL MOBILE</label>
                                                        <input autocomplete="off" type="text" class="form-control"
                                                            placeholder="Mobile Number"
                                                            name="mobile_number">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>SCHOOL FAX</label>
                                                        <input autocomplete="off" type="text" class="form-control"
                                                placeholder="Fax number" name="school_fax">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>SCHOOL EMAIL</label>
                                                        <input autocomplete="off" type="text" class="form-control"
                                                            placeholder="visapportal@gmail.com" 
                                                            name="school_email">
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>SCHOOL GMAIL</label>
                                                        <input autocomplete="off" type="text" class="form-control"
                                                            placeholder="visapportal@gmail.com" 
                                                            name="school_gmail">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>LONGITUDE</label>
                                                    <input autocomplete="off" type="text" class="form-control"
                                                        placeholder="90 EAST">
                                                </div>
                                            </div>
                                              <div class="col-12">
                                                <div class="form-group">
                                                    <label>LATITUDE</label>
                                                    <input autocomplete="off" type="text" class="form-control"
                                                        placeholder="19 NORTH">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                 <div class="form-group">
                                                    <label>SCHOOL WEBSITE ADDRESS</label>
                                                    <input autocomplete="off" type="text" class="form-control"
                                                        placeholder="https://www.visapportal.com.ng">
                                                </div>
                                            </div>
                                          
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade " id="account-vertical-social" role="tabpanel"
                                    aria-labelledby="account-pill-social" aria-expanded="false">
                                    <form>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Twitter</label>
                                                    <input autocomplete="off" type="text" class="form-control" placeholder="Add link"
                                                        value="https://www.twitter.com/anointedcollege">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Facebook</label>
                                                    <input autocomplete="off" type="text" class="form-control" placeholder="Add link" value="https://facebook.com/anointedcollege">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Google+</label>
                                                    <input autocomplete="off" type="text" class="form-control" placeholder="Add link" value="https://googlemail.com/anointedcollege">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>LinkedIn</label>
                                                    <input autocomplete="off" type="text" class="form-control" placeholder="Add link"
                                                        value="https://www.linkedin.com/anointedcollege">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Instagram</label>
                                                    <input autocomplete="off" type="text" class="form-control" placeholder="Add link" value="https://instagram.com/anointedcollege">
                                                </div>
                                            </div>
                                           
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-light mb-1">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="new-account-vertical-form" role="tabpanel"
                                    aria-labelledby="new-staff-account" aria-expanded="false">
                                    <div class="col-md-12 text-center"><h3><span class="fa fa-user-plus"></span> Add New Staff</h3></div>
                                    <div class="col-md-12 text-center" id="myResponseText3"></div>
                                    <form class="validate-form" id="create_new_staff_form">
                                        <div class="row">
                                            <input type="hidden" name="action" value="submit_new_staff">
                                           
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Surname</label>
                                                        <input autocomplete="off" type="text" class="form-control"
                                                            placeholder="Surname"
                                                            name="sname">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>First Name </label>
                                                        <input autocomplete="off" type="text" class="form-control"
                                                            placeholder="First Name" name="fname">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Middle Name</label>
                                                        <input autocomplete="off" type="text"
                                                            class="form-control"
                                                            placeholder="Middle Name"
                                                            name="mname">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>E-mail</label>
                                                        <input autocomplete="off" type="text"
                                                            class="form-control"
                                                            placeholder="E-mail"
                                                            name="semail">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Mobile</label>
                                                        <input autocomplete="off" type="number"
                                                            class="form-control"
                                                            placeholder="Mobile"
                                                            name="mphone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Username</label>
                                                        <input autocomplete="off" type="text"
                                                            class="form-control"
                                                            placeholder="Portal Username"
                                                            name="musername">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Password</label>
                                                    <input autocomplete="off" type="password"
                                                    class="form-control"
                                                placeholder="Portal Password" name="mpassword">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Level of Education</label>
                                                        <select name="education" id="education" class="custom-select form-control">
                                                            <option value="">Choose...</option>
                                                            <option value="Pry">Pry Schl Cert</option>
                                                            <option value="olevel">O'Level</option>
                                                            <option value="OND">OND </option>
                                                            <option value="NCE">NCE</option>
                                                            <option value="HND">HND</option>
                                                            <option value="BSc">BSc </option>
                                                            <option value="Phd">Phd</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Job Type</label>
                                                        <select name="jobType" id="jobType" class="custom-select form-control">
                                                            <option value="">Choose...</option>
                                                            <option value="Teaching">Teaching</option>
                                                            <option value="Non-Teaching">Non-Teaching </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Job Position</label>
                                                        <select name="jobPosition" id="jobPosition" class="custom-select form-control">
                                                            <option value="">Choose...</option>
                                                            <optgroup label="Teaching Staff">
                                                                <option value="Teacher">Subject Teacher</option>
                                                            <option value="Principal">Principal </option>
                                                            <option value="Vice Principal">Vice Principal </option>
                                                            <option value="Registrar">Registrar </option>
                                                            <option value="Bursar">Bursar </option>
                                                            </optgroup>
                                                        <optgroup label="Non-Teaching Staff">
                                                        <option value="Driver">Driver</option>
                                                            <option value="Receptionist">Receptionist</option>
                                                            <option value="Cleaner">Cleaner </option>
                                                            <option value="Security">Security</option>
                                                            <option value="Bus Attendant">Bus Attendant</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>AUTHENTICATION KEY</label>
                                                    <input autocomplete="off" type="password"
                                                    class="form-control"
                                                placeholder="Auth Code" name="auth_pass">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-dark glow mr-sm-1 mb-1 __loadingBtn3__">Submit</button>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- account setting page ends -->
        </div>
      </div>
    </div>
    <!-- END: Content-->

    </div>
    <!-- demo chat-->
 
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
    <!-- END: Page JS-->
<script>
    $(document).ready(function(){
        const NEWSTAFFFORM = $("#create_new_staff_form");
        NEWSTAFFFORM.on("submit", function(e){
        e.preventDefault();
        //myResponseText3
          $(".__loadingBtn3__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      //send request 
      $.post("../actions/actions",NEWSTAFFFORM.serialize(),function(res_data){
        setTimeout(()=>{
          $(".__loadingBtn3__").html('Save Changes').attr("disabled",false);
          // $("#myResponseText3").html(res_data);
          $("#server-response").html(res_data);
        },1000);
      })
    })
    })
</script>
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>