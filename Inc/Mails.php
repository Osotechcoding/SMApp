<?php 
@session_start();
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Mails {
    protected $_Host ="smtp.gmail.com";
    protected $_User ="osotechsoftware@gmail.com";
    protected $_Pass ="samsonjerry12345!@";
    protected $_Port =465;


public function sendEmailConfirmationToStudent($student_name,$student_email,$msg_subject,$message){

//Load Composer's autoloader
require 'vendor/autoload.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP(); 
    $mail->Host       = $this->_Host;            //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                         //Enable SMTP authentication
    $mail->Username   = $this->_User;   //SMTP username
    $mail->Password   = $this->_Pass;           //SMTP password
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  //Enable implicit TLS encryption
    $mail->Port       = $this->_Port; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom('no-reply@osotechsoftware.com');
    $mail->addAddress($student_email, $student_name);     //Add a recipient
    $mail->addCC('visapportal@gmail.com');
    //Content
    $mail->isHTML(true);   //Set email format to HTML
    $mail->Subject = $subject; //mail subject
    $mail->Body    = $message; // mail main message body
    $mail->AltBody = $message;
//send status
    if($mail->send()){
        return true;
    }else{
         return false;
    }
   
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
}
//sendConfirmationMailToUser();

//send welcome message to new regsistered users

function sendWelcomeMessageToNewRegisterUser($email_to,$user_name,$schoolname,$subject,$message){
//Load Composer's autoloader
require 'vendor/autoload.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
   //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP(); 
    $mail->Host       = $this->_Host;            //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                         //Enable SMTP authentication
    $mail->Username   = $this->_User;   //SMTP username
    $mail->Password   = $this->_Pass;           //SMTP password
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  //Enable implicit TLS encryption
    $mail->Port       = $this->_Port; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom('no-reply@osotechcoding.com');
    $mail->addAddress($user_email, $username);     //Add a recipient
    $mail->addCC('osotechsoftware@gmail.com');
    //Content
    $mail->isHTML(true);   //Set email format to HTML
    $mail->Subject = $subject; //mail subject
    $mail->Body    = $message; // mail main message body
    $mail->AltBody = $message;
//send status
    if($mail->send()){
        return true;
    }else{
         return false;
    }
   
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}

}

function SendUserActivationCodeViaEmail($email,$username,$code,$schoolname,$url) {
require 'vendor/autoload.php';
//db and school info

$mail = new PHPMailer(true);
try {
   //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP(); 
    $mail->Host       = $this->_Host;            //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                         //Enable SMTP authentication
    $mail->Username   = $this->_User;   //SMTP username
    $mail->Password   = $this->_Pass;           //SMTP password
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  //Enable implicit TLS encryption
    $mail->Port       = $this->_Port; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS` have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom("no-reply@ikraamidealmodelcollege.com","IKIMC");
    $mail->addAddress($email, $username);     //Add a recipient
    //Content
    $subject = "Your Registration With ".$schoolname;
    $messageBody = "Hello ".$username.". <br /> 
        Thanks for your registration with ".$schoolname.". <br />
        Please click the link below to confirm your registration. <br /><br /><a href='".$url."'>Confirmation Link</a>.<br />
        Or use the confirmation code (".$code.") on the portal<br /><br />
        Regards.<br />". $schoolname;

    $mail->isHTML(true);   //Set email format to HTML
    $mail->Subject = $subject; //mail subject
    $mail->Body    = $messageBody; // mail main message body
    $mail->AltBody = $messageBody;
//send status
    if($mail->send()){
        return true;
    }else{
         return false;
    }
   
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
    }

    }

    $Mails = new Mails();

?>