<?php include_once ("Inc/Osotech.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ("Templates/HeaderScriptLink.php");?>
<title><?php echo __SCHOOL_NAME__;?>:: Maintenance Page</title>
</head>
<body class="body_wrapper" style="background: rgba(0, 0, 0, 0.9);">
  <?php include_once ("Templates/Preloaders.php");?>

<div class="latest-news-area pt-100 pb-70">
<div class="container">
<section class="area-404">
<div class="d-table">
<div class="d-table-cell">
<div class="container">
        <h2 class="section-title" style="color:white;">We are Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. we&rsquo;ll be back online shortly!!</h2>
                <h4 style="color:white;font-weight: bolder;">Please Bear With Us</h4>
                <div class="error-btn">
                  
                    <a href="javascript:void(0);" class="btn btn-danger style-one mt-5">Please do not refresh this page</a>
                    <br>
                    <h3 id="info-message-notice" style="color: yellow;"></h3>
                   <h4 style="color: whitesmoke; font-weight: bold;">Page will redirect automatically!</h4>
                </div>
      
</div>
</div>
</div>
</section>
</div>
</div>
<?php include_once("Templates/FooterScriptLink.php");?>
<script>
        //check the main portal every 30 seconds to know if the maintainance mode is off
        $(document).ready(function() {
             $("#info-message-notice").html("<b class='text-bold'>Checking Portal Status Please Wait...<img src='rolling_loader.svg' width='50' alt='Please wait...' class='loading' style='display:block;'></b>");
            setInterval(() => {
                checkPortal();
            }, 30000);

            function checkPortal() {
                $.ajax({
                    url: "Inc/checkModule",
                    type: "POST",
                    data: {
                        action: "check_portal_status"
                    },
                    success: function(data) {
                        if (data) {
                    $(".loading").css("display","none");
                $("#info-message-notice").html("<b class='text-bold'> Redirecting Please Wait...</b>");
               setTimeout(()=>{
                 self.location.href='./';
               },3000);
                 
                } else {
               self.location.reload();
                        }
                    }
                });
            }
        })
    </script>
</body>

</html>