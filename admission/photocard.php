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
        .no-print {
            display: none !important;
        }
    }

    #logo-bak {
        background-image: url(../icons/bbg3.jpg);
        background-repeat: repeat;
    }
    .page {
        width: 100%;
        height: auto;
        /*background: #DD5555;*/
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
           width: 100%;
        height: auto;
        }
      }
    </style>
</head>
<body>
  <?php include_once ("Template/Preloaders.php");?>
  <!-- TopHeader -->
<div class="container page">
<aside class="right-side">                
              <!-- Content Header (Page header) -->
                               <section class="content-header">
                
                    <h1 class="no-print"><i class="flaticon-student-with-graduation-cap "></i> Photo Card </h1>
                </section>

                 <div class="pad margin no-print">
                    <div class="alert alert-warning" style="margin-bottom: 0!important;">
                        <i class="fa fa-info"></i>
                        <b>Note:</b> Please Print this Photo Card For your Examinations. All you need is Here.
                    </div>
                </div>
                <!-- Main content -->
                <section class="content invoice">                    
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12 col-md-10">
                            <h2 class="page-header">
                                <img src="../assets/images/newlogo.png" width="100" alt="logo" style="border-radius:10px;border:3px solid darkblue;">
                                 Photo Card.
                                <small class="pull-right">Date: <?php print date("jS F, Y"); ?></small>
                            </h2>                            
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 col-md-4 col-lg-4 invoice-col">
                           <strong> School Details </strong>
                            <address>
                               <?php echo __SCHOOL_NAME__; ?><br>
                                Address: 38, Oluwalogbon, Ijoko<br>
                                State: Ogun State<br>
                                Current Year: <?php echo date("Y");?><br><br>
                                Slip Type: Photo Card
                                <br>
                                <?php
                                            $card_details = $Osotech->get_admission_scratch_card_usage($admission_no);
                
                   ?>
                                             Card Pin: <b
                                            class="text-info"><?php  echo substr($card_details->pin_code, 0,5).'*****'.substr($card_details->pin_code, 10,5);?></b><br>
                                            Pin Serial : <b class="text-info"><?php  echo $card_details->pin_serial;?></b>
                              
                            </address>
                        </div><!-- /.col -->
                        <div class="col-sm-4 col-md-4 invoice-col">
                           <strong> Applicant Details </strong>
                            <address>
                                Application No: <?php echo $student_data->stdRegNo;?><br>
                                Email: <?php echo $student_data->stdEmail;?><br>
                               Mobile: <?php echo $student_data->stdPhone;?><br/>
                               Registration Date: <?php echo date("l jS F Y",strtotime($student_data->stdApplyDate));?><br/> <br />
                                <!-- Status: <span class="text-info"> Eligible for interview</span>
                                <br> -->
                                Admission Status: <span class="text-danger">Not Admitted</span>
                            </address>
                        </div><!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                      <img style="border-radius: 10px;border: 5px solid darkblue;" src="../eportal/schoolImages/students/<?php echo $student_data->stdPassport;?>"
                      class='img-rounded img-responsive' width="120" alt='logo' />
                        </div>
                        <!-- /.col -->
                    </div><!-- /.row -->
                <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Field</th>
                                        <th>Details</th>
                                        <th>Field</th>
                                        <th>Details</th>
                                    </tr>                                    
                                </thead>
                                <tbody>
                    <tr>
                        <td>FullName</td>
                        <td><?php echo $student_data->full_name;?></td>
                    <td>Parent/Guardian</td>
                    <td><?php echo $student_infos->stdMGTitle ." ".$student_infos->stdMGName;?></td>
                    </tr> 
                    <tr>
                        <td>Gender</td>
                        <td><?php echo $student_data->stdGender; ?></td>
                    <td>Parent/Guardian Phone</td>
                    <td><?php echo $student_infos->stdMGPhone;?></td>
                </tr>
                    <tr>
                        <td>Admission Class</td>
                        <td><?php echo $student_data->studentClass; ?></td>
                    <td>Relationship</td>
                    <td><?php echo $student_infos->stdMGRelationship;?></td></tr> 
                    <tr>
                        <td>Date Of Birth</td>
                        <td><?php echo date("l jS F, Y",strtotime($student_data->stdDob)); ?></td>
                    <td>Registation Number</td>
                    <td><?php echo $student_data->stdRegNo;?></td></tr> 
                    <tr><td>Address</td>
                        <td><?php echo $student_data->stdAddress; ?></td>
                    <td>Blood Group/Genotype</td>
                        <td><?php echo $student_medInfos->stdBlood; ?> /  <?php echo $student_medInfos->stdGenotype; ?></td>
                </tr>
                    <tr>
                        <td>Country/State</td>
                        <td><?php echo $student_infos->stdCountry;?> / <?php echo $student_infos->stdSOR;?></td>
                    <td>LGA /Home Town</td>
                    <td><?php echo $student_infos->stdLGA;?> / <?php echo $student_infos->stdHomeTown;?></td>
                </tr> 
                <tr>
                        <td>Blood Group/Genotype</td>
                        <td><?php echo $student_medInfos->stdBlood; ?> /  <?php echo $student_medInfos->stdGenotype; ?></td>
                    <td>Hospital /Doctor</td>
                    <td><?php echo $student_medInfos->stdHospitalName; ?> / <?php echo $student_medInfos->stdHospitalOwner; ?></td>
                </tr> 
                <tr>
                        <td>Hospital Line/Member Since</td>
                        <td><?php echo $student_medInfos->stdHospitalPhone; ?> / <?php echo $student_medInfos->stdRegDate; ?></td>
                    <td>Portal Username</td>
                    <td><?php echo $student_data->stdUserName;?></td>
                </tr> 
                
                    </tbody>
                            </table> 
                            <p class="text-muted"> I <b
                                            class="text-info"><i> 
                                             <?php echo strtoupper($student_data->full_name);?> </b>
                                        affirmed that the information provided on this form are to the best of my
                                        knowledge and correct, if admited I shall regard myself bound to the rules and
                                        regulations of <b class="text-info"><?php echo __SCHOOL_NAME__; ?></b>
                                        and at any time the school is reasonably conviced that the information given is
                                        false or incorrect I will be required to withdrawal from the school. I will also
                                        pay my school fees regularly </i></p>
                            <br />
                        <p class="text-warning"><b>Additional Instruction:</b> 
                        This Photo Card was generated based on the fact that the Students details and Passport which appeared above has applied for Admission under the School whose Details Appears Above.
                        <br />Note:  Any Attempt to Forge this Photo-card will be taken as a Criminal Offence which is Punishable.</p>  <br /><br />                    
                        </div>
                    </div>

                    <!-- this row will not appear when printing -->
                    <div class="row no-print mb-4">
                        <div class="col-xs-12">
                            <button class="btn btn-dark btn-md" onclick="window.print();"><i class="flaticon-blueprint"></i> Print</button>   
                            <a onclick="return confirm('Make sure you print your Registration Photo Card before logging out');" href="logout?action=<?php echo md5("Smapp");?>"><button class="btn btn-danger btn-md"><i class="flaticon-power-off"></i> Logout</button></a>
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
</div>
<?php include_once("Template/FooterScriptLink.php");?>
</body>
</html>