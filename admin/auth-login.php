<?php 
// require_once "helpers/helper.php";
require_once "languages/config.php";
require_once "classes/Configuration.php";
require_once "classes/Session.php";
$tses_token = Session::set_xss_token();
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
    <title> Login - <?php echo $lang['webtitle'];?></title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.html">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
     <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/toastr.css">
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
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/authentication.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/toastr.min.css">
    <!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <!-- bg-full-screen-image -->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 1-column  navbar-sticky footer-static  blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="semi-dark-layout" style="background: url(assets/loaders/bg1.jpg);">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- login page start -->
<section id="auth-login" class="row flexbox-container">
    <div class="col-xl-8 col-11">
        <div class="card bg-authentication mb-0">
            <div class="row m-0">
                <!-- left section-login -->
                <div class="col-md-6 col-12 px-0">
                    <div class="card disable-rounded-right mb-0 p-2 h-80 d-flex justify-content-center">  
                        <div class="card-header pb-1">
                             </div>
                            <div class="text-center">
                                <h2 class="text-center mb-2"><?php echo ucwords($lang['welcome-back']) ?> </h2>
                                <div class="text-center">
                                    <p class="text-center lead text-warning"><?php echo ucwords($lang['choose-lang'])?></p>
                                <a href="?lang=en" class="badge badge-info badge-icon">English</a> <a href="?lang=yor" class="badge badge-warning badge-icon">Yoruba</a> <a href="?lang=hausa" class="badge badge-dark badge-icon">Hausa</a> <a href="?lang=igbo" class="badge badge-success badge-icon">Igbo</a>
                                </div>
                            </div>
                       
                        <div class="card-body">
                           
                            <div class="divider">
                                <div class="divider-text text-uppercase text-muted"><small> <?php echo $lang['login-w-email-user'] ?></small>
                                </div>
                            </div>
                            <form id="login-Form">
                                <input type="hidden" name="txss_token" value="<?php echo $tses_token;?>">
                                <div class="form-group mb-50">
                                    <label class="text-bold-600" for="exampleInputEmail1"><?php echo $lang['email'];?></label>
                                    <input type="text" class="form-control" name="ad_email" id="exampleInputEmail1"
                                        placeholder="<?php echo $lang['email'];?>" value="<?php if(isset($_COOKIE['login_email'])){
                                            echo $_COOKIE['login_email'];
                                        }else{
                                            echo '';
                                        } ?>"></div>
                                <div class="form-group">
                                    <label class="text-bold-600" for="exampleInputPassword1"><?php echo $lang['password'];?></label>
                                    <input type="password" class="form-control" name="ad_pass" value="<?php if(isset($_COOKIE['login_pass'])){
                                            echo $_COOKIE['login_pass'];
                                        }else{
                                            echo '';
                                        } ?>" id="exampleInputPassword1"
                                        placeholder="<?php echo $lang['password'];?>">
                                </div>
                                  <div class="form-group">
                                    <label class="text-bold-600" for="login_as">Login As</label>
                                   <select name="login_as" id="login_as" class="select2 form-control">
                                       <option value="">Choose...</option>
                                       <option value="admin">Admin</option>
                                       <option value="principal">Principal</option>
                                       <option value="registrar">Registrar</option>
                                       <option value="bursar">Bursar</option>
                                       <option value="teacher">Teacher</option>
                                   </select>
                                </div>
                                <div
                                    class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                                    <div class="text-left">
                                        <div class="checkbox checkbox-sm">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="rememberme">
                                            <label class="checkboxsmall" for="exampleCheck1"><small><?php echo $lang['Keep-logged'] ?></small></label>
                                        </div>
                                    </div>
                                    <div class="text-right"><a href="forgot-password"
                                            class="card-link"><small><?php echo $lang['forgot-pwd'] ?></small></a></div>
                                </div>
                                <input type="hidden" name="action" value="logAdminIn">
                                <button type="submit" class="btn btn-dark w-100 position-relative __loadingBtn__"><?php echo $lang['login'];?><i
                                        id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                            </form>
                            <hr>
                             
                            <div class="text-center"><small class="mr-25"><?php echo $lang['dont-av-account'] ?></small>
                                <a href="auth-register"><small><?php echo $lang['signup'] ?></small></a></div>
                        </div>
                    </div>
                </div>
                <!-- right section image -->
                <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                    <img class="img-fluid" src="result-asset/logo.png" width="500" alt="branding logo">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- login page ends -->

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js"></script>
    <script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js"></script>
    <script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
     <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/scripts/configs/vertical-menu-dark.min.js"></script>
    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <script src="app-assets/js/scripts/components.min.js"></script>
    <script src="app-assets/js/scripts/footer.min.js"></script>
    <script src="app-assets/js/scripts/extensions/toastr.min.js"></script>
    <div id="server-response"></div>
    <script>
    $(document).ready(function(){
    $("#login-Form").on("submit", function(event){
    event.preventDefault();
    const adminFormData = $(this).serialize();
    // alert(adminFormData);
    // return false;
    //send request via ajax 
    $.ajax({
        url:"actions/actions",
        type:"POST",
        data:adminFormData,
        beforeSend:function(){
        $(".__loadingBtn__").html('<img src="assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        },
        success:function(res){
            setTimeout(()=>{
            $("#server-response").html(res);
            $(".__loadingBtn__").html('<?php echo $lang['login'];?><i id="icon-arrow" class="bx bx-right-arrow-alt"></i>').attr("disabled",false);
            },2000);
        }
    })
            });
   
        })
    /*
     toastr['info']('<?php //echo $lang['login_error1'];?>');
toastr.error("<?php //echo $lang['login_error1'];?>","<?php //echo $lang['alert-title-success'];?>",{closeButton:!0});
toastr.success("<?php //echo $lang['login_error1'];?>","<?php //echo $lang['alert-title-success'];?>",{showMethod:"fadeIn",hideMethod:"fadeOut",timeOut:2e3})*/
    </script>
    <!-- END: Theme JS-->
    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->

</html>