<?php 
use PHPMailer\PHPMailer\PHPMailer;

require_once('phpmail/PHPMailer/Autoload.php');

//require 'PHPMailer-6.0.5/src/Exception.php';
//require 'PHPMailer-6.0.5/src/PHPMailer.php';
//require 'PHPMailer-6.0.5/src/SMTP.php';

class VisapMailer{
	public $smtpHost;
    public $smtpPort;
    public $sender;
    public $password;
    public $receiver;
    public $code;

    public function __construct($recepient){
    	/**
         * Your email id  
         * For example : visap@gmail.com
         * contact@visap.com
         * 
         */
        $this->sender = __OSO_GMAIL_USER; 

        /**
         *  YOUR PASSWORD 
         *  ************
         */               
        $this->password = __OSO_GMAIL_PASS;  

        /**
         * Receiver email
         * For example : johndoe@gmail.com
         */     
        $this->receiver = $receiver;  

        /**
         * YOUR SMTP HOST NAME 
         * For example : smtp.gmail.com 
         * OR mail.youwebsite.com
         */     
        $this->smtpHost="mail.glorysupremeschool.com";        
        
        /**
         * SMTP port number
         * For example :587
         */
        $this->smtpPort = 587;
    }

    public function send_resend_confirmation_code($data){
    	$mailer = new PHPMailer(true);
    	$mailer->isSMTP();
    	$mailer->SMTPAuth = true;
    	$mailer->SMTPOptions = array(
    		'ssl'=>array(
    			'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
    		)
    	);
    	$mailer->Host = $this->smtpHost;   
        $mailer->Port = $this->smtpPort;    
        $mailer->IsHTML(true);
        $mailer->Username = $this->sender;
        $mailer->Password = $this->password;
        $mailer->Body=$this->getHTMLMessage();
        $mailer->Subject = "Your verification code is {$this->code}";
        $mailer->SetFrom($this->sender,"Verification Codes");
        $mailer->AddAddress($this->receiver);
        try {
        	 $mail->send();
          echo "MAIL SENT SUCCESSFULLY";
          // return true;
          exit;  
        } catch (Exception $e) {
        	 echo "FAILED TO SEND MAIL";
        // return false;
        }
	}

	 public function getVerificationCode()
    {
        return (int) substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    }

    public function getHTMLMessage(){
        $this->code = $this->getVerificationCode();   
        $htmlMessage=<<<MSG
        <!DOCTYPE html>
        <html>
         <body>
            <h1>Your verification code is {$this->code}</h1>
            <p>Use this code to verify your account.</p>
         </body>
        </html>        
MSG;
    return $htmlMessage;
    }
}

//instant of 
 $VisapMailer = new VisapMailer();
 $VisapMailer->send_resend_confirmation_code($data['email'],$data['name']);