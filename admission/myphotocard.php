<?php 
@session_start();
 ?>
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
<?php include_once ("Template/HeaderScriptLink.php");?>
<title><?php echo __SCHOOL_NAME__; ?> :: <?php echo $student_data->full_name;?></title>
<style>
    @media print {
        .noprint {
            display: none !important;
        }
    }

    #logo-bak {
        background-image: url(../icons/bbg3.jpg);
        background-repeat: repeat;
    }
    .page {
        width: 200px;
        height: 500px;
        background: #DD5555;
      }

      @page {
        size: A4;
        margin: 0;
      }

      @media print {
        body {
          margin: 0;
        }
        .page {
          width: 210mm;
          height: 297mm;
        }
      }
    </style>
</head>
<body>
  <?php include_once ("Template/Preloaders.php");?>


<div class="page-banner-area bg-2">
<div class="container">
<div class="page-banner-content">
<h1><i class="flaticon-student-with-graduation-cap"></i> <?php echo $student_data->full_name; ?>  Photo Card </h1>
<ul>
<li><a href="../">Home</a></li>
<li>Photo Card</li>
</ul>
</div>
</div>
</div>
<!-- Android app developement tutorial full course  -->
<!-- https://www.youtube.com/watch?v=KsNabzrQca8 -->

<div class="register-area pt-100 pb-70">
<div class="container">
<div class="register">
<h2 class="text-center"></h2>
<!-- photo card starts-->
                            <div class="card">
                                <div class="card-body">
                                    <div class='row'>
                                        <div class='col-xs-2 col-sm-2 col-md-2 text-center'>
                                            <img src="../assets/images/newlogo.png" class='img-rounded img-responsive'style="border-radius: 10px;border: 5px solid darkblue;"
                                                width="200" alt='logo' />
                                        </div>
                                        <div class='col-xs-8 col-sm-8 col-md-8 text-center'>
                                            <h1 class="text-info text-bolder active" style="color:darkblue !important;">
                                                <?php  echo __SCHOOL_NAME__;?></h1>
                                            <h4 class='text-danger'>
                                                <span><em>Registrar:
                                                       08037940665</em> </span>
                                            </h4>
                                            <h5><?php echo $student_data->full_name;?> Photo Card</h5>
                                            <p><span class="text-danger">Printed Today:
                                                    <?php echo date('l F jS Y').' @ '.date('h:i A');?></span> </p>
                                        </div>

                                        <div class='col-xs-2 col-sm-2 col-md-2 text-center text-responsive'>
                                            <img style="border-radius: 10px;border: 5px solid darkblue;" src="../eportal/schoolImages/students/<?php echo $student_data->stdPassport;?>"
                                                class='img-rounded img-responsive' width="200" 
                                                alt='logo' />
                                        </div>
                                    </div>
                                    <hr />

                                    <div class='row'>
                                        <div class='col-xs-4 col-md-4'>
                                            <legend class="text-info" style="color:darkblue !important;">
                                                Bio-Data</legend>
                                            <p>Surname: <strong><?php echo $student_data->stdSurName ;?></strong> </p>
                                            <p>First Name: <strong><?php echo $student_data->stdFirstName ;?></strong> </p>
                                            <p>Middle Name: <strong><?php echo $student_data->stdMiddleName;?></strong> </p>
                                            <p>Sex: <strong><?php echo $student_data->stdGender;?></strong> </p>
                                            <p>Most Hobby: <strong><?php echo "Reading";?></strong> </p>
                                            <p>Nationality: <b><?php echo $student_infos->stdCountry;?></b></p>
                                            <p>Username: <strong><?php echo $student_data->stdUserName;?></strong> </p>
                                            <p>E-mail Address : <strong><?php echo $student_data->stdEmail;?></strong> </p>
                                            <p>Date of Birth : <strong><?php echo $student_data->stdDob;?></strong></p>
                                        </div>
                                        <div class='col-xs-4 col-md-4'>
                                            <legend class="" style="color:darkblue !important;">Contact Info</legend>
                                            <p> Phone: <strong> <?php echo $student_data->stdPhone;?></strong> </p>
                                            <p>State of Origin: <strong><?php echo $student_infos->stdSOR;?></strong></p>
                                            <p>LGA: <strong><?php echo $student_infos->stdLGA;?></strong></p>
                                            <p>Health Conditions: <strong>None</strong></p>
                                            <p>Home Town : <strong><?php echo $student_infos->stdHomeTown;?></strong> </p>
                                            <p> Address: <strong><?php echo $student_data->stdAddress;?></strong> </p>
                                            <p>Religion : <strong><?php echo $student_infos->stdReligion;?></strong> </p>
                                            <p>Age: <strong><?php if ($Osotech->get_student_age($student_data->stdDob)=="0" || $Osotech->get_student_age($student_data->stdDob)=="1") {
                                              echo "1 Yr";
                                            }else{
                                              echo $Osotech->get_student_age($student_data->stdDob)." Yrs";
                                            } ?></strong></p>
                                        </div>
                                        <div class='col-xs-4 col-md-4'>
                                            <legend class="text-bold" style="color:darkblue !important;">Parents/
                                                Quardian Info</legend>
                                            <p>Father : <strong><?php echo $student_infos->stdMGTitle ." ".$student_infos->stdMGName;?></strong> </p>
                                            <p>Mother : <strong><?php echo $student_infos->stdFGTitle ." ".$student_infos->stdFGName;?></strong></p>
                                            <p> Address : <strong><?php echo $student_infos->stdMGAddress;?></strong></p>
                                            <p>Father's Phone : <strong><?php echo $student_infos->stdMGPhone;?></strong></p>
                                            <p>Mother's Phone :<strong> <?php echo $student_infos->stdFGPhone;?></strong></p>
                                            <p>Father's Work :<strong> <?php echo $student_infos->stdMGOccupation;?></strong></p>
                                            <p>Mother's Work : <strong><?php echo $student_infos->stdFGOccupation;?></strong></p>
                                            <p>Email :<strong> <?php echo $student_infos->stdMGEmail;?></strong></p>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col-xs-4 col-md-4'>
                                            <legend class="text-bold" style="color:darkblue !important;">Academics Info
                                            </legend>
                                            <p>Registration No: <br><b class="text-info"><?php echo $student_data->stdRegNo;?></b></p>
                                            <?php
                                            $card_details = $Osotech->get_admission_scratch_card_usage($admission_no);
                
                   ?>
                                            <p> Your Used Card Pin: <b
                                            class="text-info"><?php  echo substr($card_details->pin_code, 0,5).'*****'.substr($card_details->pin_code, 10,5);?></b>
                                            </p>
                                            <p>Your Used Pin Serial : <b class="text-info"><?php  echo $card_details->pin_serial;?></b> </p>

                                            <p>Process Admission Into: <br> <b><?php echo $student_data->studentClass;?></b></p>
                                            <p>Status: <span class="text-warning">Not Yet Admitted</span></p>
                                        </div>
                                        <div class='col-xs-4 col-md-4'>
                                            <legend class="text-bold" style="color:darkblue !important;">Medical History
                                            </legend>
                                            <?php  ?>
                                            <p>BLOOD GROUP : <?php echo $student_medInfos->stdBlood; ?></p>
                                            <p>GENOTYPE : <?php echo $student_medInfos->stdGenotype; ?></p>
                                            <p>Allergic To : None </p>
                                            <p> Hospital : <b><?php echo $student_medInfos->stdHospitalName; ?></b></p>
                                            <p>Doctor : <b><?php echo $student_medInfos->stdHospitalOwner; ?></b></p>
                                            <p> Doctor's Phone : <b><?php echo $student_medInfos->stdHospitalPhone; ?></b></p>
                                            <p> Member Since :<b><?php echo $student_medInfos->stdRegDate; ?></b></p>
                                             
                                        </div>
                                        <div class='col-xs-4 col-md-4'>
                                            <legend class="text-bold" style="color:darkblue !important;">Application
                                                Info</legend>
                                            <!-- <p>Portal Opens On: <b class="text-success"></b> -->
                                            </p>
                                            <p>Registration Date: <br><b><?php echo date("l jS F Y",strtotime($student_data->stdApplyDate));?></b></p>
                                           <!--  <p>Admission Portal Closes On: <b
                                                    class="text-danger"><?php// echo $end_date;?></b></p>
                                            <p>Academic Session: <b><?php //echo $academic_session;?></b></p> -->
                                            <p><strong class="text-danger">INSTRUCTION:</strong><br>
                                                <b><i>Your date of interview will be sent to you via <br> (<?php echo $student_data->stdEmail;?>)</i></b>
                                            </p>
                                            <?php
            //}

                ?>

                                        </div>

                                    </div>
                                    <p class="text-warning"> I <b
                                            class="text-info"><?php echo strtoupper($student_data->full_name);?> </b>
                                        affirmed that the information provided on this form are to the best of my
                                        knowledge and correct, if admited I shall regard myself bound to the rules and
                                        regulations of <b class="text-info"><?php echo __SCHOOL_NAME__; ?></b>
                                        and at any time the school is reasonably conviced that the information given is
                                        false or incorrect I will be required to withdrawal from the school. I will also
                                        pay my school fees regularly</p>
                                    <hr />
                                    <div class="row">

                                        <div class="col-xs-12 col-md-12 text-center">
                                            <p class="text-center"><strong class="text-danger">NOTE: </strong> This Photo
                                                Card was generated based on the fact that the Student details and
                                                Passport which appeared above has applied for Admission under
                                                <?php //echo $_SESSION['SCHOOL_NAME']?> The information contained in this
                                                examination photo-card was generated based on the applicant's supplied
                                                details<br><b class="text-danger"> Any
                                                    attempt to forge this Photo-card will be taken as a Criminal Offence
                                                    which is Punishable</b> </p>
                                            <em>
                                                <span class="fa fa-phone"></span>
                                                 &nbsp;&nbsp;
                                                <span class="fa fa-envelope"></span>
                                                 &nbsp;&nbsp;
                                                <a href="printphotocard?applicant=<?php echo $admission_no;?>&page=photo-card"><button type="button" class="btn btn-primary noprint"><i class="fa fa-print"></i> Print</button></a>
                                                <a class="noprint btn btn-danger"
                                                    onclick="return confirm('Make Sure You print your photo-card before logging out!')"
                                                    href="logout?bypass=<?php echo md5('Smapp');?>"><i
                                                        class="fa fa-power-off"></i> Logout</a></button>
                                            </em>
                                        </div>
                                    </div>

                                </div>
                                </div>
                                <!-- photo card ends -->
</div>
</div>
</div>
<?php include_once("Template/CopyRight.php");?>

<div class="go-top">
<i class="ri-arrow-up-s-line"></i>
<i class="ri-arrow-up-s-line"></i>
</div>
<?php include_once("Template/FooterScriptLink.php");?>

</body>
</html>