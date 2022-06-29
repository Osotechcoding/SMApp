<?php @session_start();?>
<?php include_once ("../Inc/Osotech.php");?>
<?php 

if (isset($_SESSION['AUTH_CODE_APPLICANT_ID']) && ! empty($_SESSION['AUTH_CODE_APPLICANT_ID'])) {
  $auth_code_applicant_id = $_SESSION['AUTH_CODE_APPLICANT_ID'];
  $admission_no = $_SESSION['AUTH_CODE_ADMISSION_NO'];
  $student_data = $Osotech->get_student_details_byRegNo($admission_no);
  $student_infos = $Osotech->get_student_infoId($auth_code_applicant_id);
  $student_medInfos = $Osotech->get_student_medical_infoId($auth_code_applicant_id);
}else{
  header("Location: ./submitapplication");
  exit();
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __SCHOOL_NAME__;?> :: <?php echo ucwords($student_data->full_name);?> REGISTRATION PHOTO SLIP</title>
<style>
html {
  font-family:arial;
  font-size: 12px;
}

body {
        /* background-color: #726E6D; */
        height: 842px;
        width: 595px;
        margin-left: auto;
        margin-right: auto;
    }

thead{
  font-weight:bold;
  text-align:center;
  background: #625D5D;
  color:white;
}

  table, tr, td{
 border:none;
}

.footer {
  text-align:right;
  font-weight:bold;
}

.schname{
    display: block;
    /* margin-left: auto; */
    margin-right: auto;
    width: 100%;
}
.container-ca{
    display: flex;
    flex-wrap: nowrap;
}
.cog-domain{
    width: 400px;
    margin-right: 10px;

}
.attendance{
    width: 185px;
    background-color: rgba(255, 255, 224, 0.137);
}

.footer-area{
  margin-top: 10px;
  width: 100%;
  display: flex;
  flex-wrap: nowrap;
}
.teacher{
  width: 100%;
  border: 2px solid grey;
  border-top-right-radius: 30px;
  margin-right: 10px;
  padding: 5px;
}
.principal{
  width: 100%;
  border: 2px solid grey;
  border-bottom-left-radius: 30px;
  margin-right: 10px;
  padding: 5px;
}
.signarea{
  width: 195px;
  background-image: url(../assets/images/sign.png);
  background-repeat: no-repeat;
  background-size:contain;
}
</style>
</head>
<body>
  <section id="result">
    <img src="../assets/images/resulttop1.jpg" alt="" class="schname">
    <!-- <hr> -->

    <h1 style="text-align:center;"><?php echo $student_data->full_name;?> Admission Slip</h1>
    <hr>
    <h2>Application ID: <b style="color: red; font-weight: 1000;"><?php echo $student_data->stdRegNo; ?> </b>  </h2>
    <h3>Applicant Gender: <b style="color: rgb(0, 17, 255); font-weight: 1000;"><?php echo $student_data->stdGender; ?></b>  </h3>
    <h3>Desired Class: <b style="color: rgb(0, 17, 255); font-weight: 1000;"><?php echo $student_data->studentClass; ?></b>  </h3>
    <br><small class="pull-right">Date: <?php print date("l jS F, Y"); ?></small>

    <img src="../eportal/schoolImages/students/<?php echo $student_data->stdPassport;?>" alt="passport" style="float: right; width: 100px; margin-top: -150px; border: 4px solid #625D5D; padding: 2px;">

    <div class="container-ca">
        <div class="cog-domain">
            <table style="table-layout: auto; width:100%; " id="congnitiveDomain">
                <thead>
                  <td colspan="2" align="left">APPLICANT'S INFORMATION</td>
                </thead>
                <tr>
                  <td>Full Name</td> 
                  <td><?php echo $student_data->stdSurName;?>, <?php echo $student_data->stdFirstName;?> <?php echo $student_data->stdMiddleName;?></td>
                </tr>
                <tr>
                  <td>Date of Birth</td> 
                  <td><?php echo date("F j, Y",strtotime($student_data->stdDob));?></td>
                </tr>
                <tr>
                  <td>Registered E-mail</td> 
                  <td><?php echo $student_data->stdEmail;?></td>
                </tr>
                <tr>
                  <td>Registered Phone</td> 
                  <td><?php echo $student_data->stdPhone;?></td>
                </tr>
                <tr>
                  <td>State of Origin/ LGA</td> 
                  <td><?php echo $student_infos->stdSOR;?> /  <?php echo $student_infos->stdLGA;?></td>
                </tr>
                <tr>
                  <td>Registered Address</td> 
                  <td><?php echo $student_data->stdAddress;?></td>
                </tr>
            </table>
              <br>
              <table style="table-layout: auto; width:100%;" id="NOK">
                <thead>
                  <td colspan="2" align="left">PARENT/GUARDIAN INFO</td>
                </thead>
                <tr>
                  <td>Father/Guardian</td> 
                  <td><?php echo $student_infos->stdMGTitle ." ".$student_infos->stdMGName;?></td>
                </tr>
                <tr>
                  <td>Mother/Guardian</td> 
                  <td><?php echo $student_infos->stdFGTitle ." ".$student_infos->stdFGName;?></td>
                </tr>
                <tr>
                  <td>Address</td> 
                  <td><?php echo $student_data->stdAddress; ?></td>
                </tr>
                <tr>
                  <td>Phone</td> 
                  <td><?php echo $student_infos->stdMGPhone;?>, <?php echo $student_infos->stdFGPhone;?></td>
                </tr>
            </table>
            <br><br>
            <table style="table-layout: auto; width:100%;" id="NOK">
              <thead>
                <td colspan="2" align="left">NEXT OF KIN INFO</td>
              </thead>
              <tr>
                <td>Name</td> 
                <td><?php echo $student_infos->stdMGTitle ." ".$student_infos->stdMGName;?></td>
              </tr>
              <tr>
                <td>Registered Phone</td> 
                <td><?php echo $student_infos->stdMGPhone;?></td>
              </tr>
          </table>
          <br>
          <div class="teacher">
            <h4 style="color:red; font-weight: bold;">NOTE:</h4>
            <hr>
            <p>You are to visit <?php echo ucwords(strtolower(__SCHOOL_NAME__));?> on <b><?php echo date("l jS F, Y",strtotime("+7day")) ?></b> for screening/entrance examination.</p>
            <p>You are to come along with Birth Certificate, Writing material and dress properly.</p>
            <p class="text-center"><strong class="text-danger">NOTE: </strong> This Photo
            <b class="text-danger"> Any
            attempt to forge this Photo-card will be taken as a Criminal Offence which is Punishable</b> </p>
          </div>
   </div>
  </div>
  <br>
  <h4 align="right">Thanks for choosing <?php echo __SCHOOL_NAME__;?>!</h4>
  <br>
  <button onclick="javascript:window.print();" type="button" style="background: black; color: white; margin-bottom: 15px;border-radius: 10px;">Print Now</button>
  <a href="logout?action=exit"> <button onclick="return confirm('Ensure you print put your entrance examination Photo-card before signing out');" type="button" style="background: black; color: white; margin-bottom: 15px;border-radius: 10px;">Print Now</button></a>
<hr>

</body>
</html>