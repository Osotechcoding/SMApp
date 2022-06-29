<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require_once ("../vendor/autoload.php");

class Osotech_mailing{

    public $response;
    public $_Port               = 465;//465
    public $_CharSet            = 'utf-8';
    public $_Hostname           = "smtp.gmail.com";//smtp.gmail.com 'mail.glorysupremeschool.com';
    public $alert;
    public $_Username           ="osotechsoftware@gmail.com"; //'admin@glorysupremeschool.com';
    public $_Password           ="samsonjerry12345!@"; //;'@gssota123';
    public $_From_Email             = 'admission@julitschools.com';
    //For portal attempted hacking reports
    public $_HackReportMail     = 'info.ftchelpdesk@gmail.com';

    public function SendUserConfirmationEmail($user_mail, $user_name, $confirmation_code, $userType) {
        $mailer           = new PHPMailer();  //new instance of the mailer
        $mailer->IsSMTP(); // telling the class to use SMTP
        $mailer->SMTPDebug  = 0;                     // enables SMTP debug information (for testing), // 1 = errors and messages, // 2 = messages only
        $mailer->SMTPAuth   = true;                  // enable SMTP authentication
        $mailer->CharSet    = 'utf-8';
        $mailer->Host       = $this->_Hostname; // sets the SMTP server
        $mailer->Port       = $this->_Port;                // set the SMTP port for the GMAIL server
        $mailer->Username   = $this->_Username; // SMTP account username
        $mailer->Password   = $this->_Password;        // SMTP account password
        $mailer->addAddress($user_mail);
        $mailer->Subject        = "Your Registration With ".__SCHOOL_NAME__;
        $mailer->setFrom($this->_From_Email);
        $mailer->AddReplyTo($this->_From_Email);

        if ($userType == 'student') {  
            $confirm_url = APP_ROOT.'confirmstudentreg?cemail='.$user_mail.'&ccode='.$confirmation_code;
             }
        else if ($userType == 'staff') { 
         $confirm_url = APP_ROOT.'confirmstaffreg?cemail='.$user_mail.'&ccode='.$confirmation_code;
          }
        $mailer->isHTML(true); //Set email format to HTML
        $mailer->Body    = $this->get_html_message_body($confirm_url);
        $mailer->AltBody =$this->get_html_message_body($confirm_url);
        try {
            $mailer->Send();
            return true;
        } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function SendResetPasswordLink_viaEmail($user_mail, $user_name, $users_password, $user){
       
    }
    //end of class

    public function mailHackingReport($schoolname, $messageBody)  {
        $mailer                 = new PHPMailer();  //new instance of the mailer
        $mailer->IsSMTP(); // telling the class to use SMTP
        $mailer->SMTPDebug  = 0;                     // enables SMTP debug information (for testing), // 1 = errors and messages, // 2 = messages only
        $mailer->SMTPAuth   = true;                  // enable SMTP authentication
        $mailer->CharSet        = 'utf-8';
        $mailer->Host       = $this->_Hostname; // sets the SMTP server
        $mailer->Port       = $this->_Port;                // set the SMTP port for the GMAIL server
        $mailer->Username   = $this->_Username; // SMTP account username
        $mailer->Password   = $this->_Password;        // SMTP account password
        $mailer->AddAddress($this->_HackReportMail, 'Hacking-Report');
        $mailer->Subject        = $schoolname. ": Hacking Auto Generated Report";
        $mailer->FromName       = $schoolname;
        $mailer->From           = $schoolname;
        $mailer->AddReplyTo($schoolname);
        $mailer->MsgHTML($messageBody); // encoding the message body with html
        if(!$mailer->Send()) {
            return false;
        } else {
            return true;
        }
    }

    // public function get_html_message_body(){
    //     $get_html_message = '';
    //     return $get_html_message;
    // }
    //end of class

    public function submit_contact_message($contact_name,$cemail,$msg_subject,$cmessage){
        if (self::isEmptyStr($contact_name)|| self::isEmptyStr($cemail) || self::isEmptyStr($msg_subject) || self::isEmptyStr($cmessage)) {
           $this->response = self::alert_msg("All fileds are required!","danger");
        }elseif (!filter_var($cemail,FILTER_VALIDATE_EMAIL)) {
           $this->response = self::alert_msg("Please enter a valid email address!","danger");
        }else{
            try {
                $mail = new PHPMailer();
          //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $this->_Hostname;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $this->_Username;                     //SMTP username
    $mail->Password   = $this->_Password;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = $this->_Port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    
    $mail->setFrom($cemail,ucwords($contact_name));
    $mail->addAddress($this->_From_Email);     //Add a recipient
    $mail->AddReplyTo($cemail);
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $msg_subject;
    $mail->Body    = $cmessage;
    $mail->AltBody =$cmessage; 

    if ($mail->send()) {
        $this->response = self::alert_msg("Thanks, your message has been recieved, we shall get intouch soon!","success").'<script>
        setTimeout(()=>{
            window.location.reload();
            },2500);
        </script>';
    }
            } catch (Exception $e) {
             $this->response = self::alert_msg("Message could not be sent. Mailer Error: {$mail->ErrorInfo}","danger");   
            }
        }

        return $this->response;
         
    }

public function submit_contact_message_($data){
     $contact_name = self::clean_($data['cname']);
        $cemail =       self::clean_($data['cemail']);
        $msg_subject =  self::clean_($data['msg_subject']);
        $cmessage =     self::clean_($data['cmessage']);
if (self::isEmptyStr($contact_name)|| self::isEmptyStr($cemail) || self::isEmptyStr($msg_subject) || self::isEmptyStr($cmessage)) {
           $this->response = self::alert_msg("All fileds are required!","danger");
        }elseif (!filter_var($cemail, FILTER_VALIDATE_EMAIL)) {
        $this->response = self::alert_msg("Please enter a valid email address!","danger");
        }else{
          try {
             $mail = new PHPMailer();
            //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $this->_Hostname;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $this->_Username;                     //SMTP username
    $mail->Password   = $this->_Password;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($cemail,$contact_name);
    $mail->addAddress('admin@glorysupremeschool.com', 'Admin');     //Add a recipient
    ///$mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('osotechcoding@gmail.com');
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $msg_subject;
    $mail->Body    = $cmessage;
    $mail->AltBody = $cmessage;
    $mail->send();
    $this->response = self::alert_msg("Thanks, your message has been recieved, we shall get intouch soon!","success").'<script>
        setTimeout(()=>{
            window.location.reload();
            },2500);
        </script>';
                
            } catch (Exception $e) {
   $this->response = self::alert_msg("Message could not be sent. Mailer Error: {$mail->ErrorInfo}","danger");   
            }  
        }
        return $this->response;
    }
public function alert_msg($msg="",$type="warning"){
        $this->alert ='<div class="alert alert-'.$type.' alert-dismissible" role="alert"><strong>'.$msg.'</strong></div>';
        return $this->alert;
    }

    public function get_html_message_body($confirm_url){
    }

}
$Osotech_mailing = new Osotech_mailing();
?>