<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";

//require 'config.php';


function send_email($toAddress, $subject, $body) {

    $phpmailer = new PHPMailer(TRUE);
    $phpmailer->isSMTP();
    $phpmailer->Host = SMTP_Host;
    $phpmailer->SMTPAuth = SMTP_Auth;
    $phpmailer->Port = SMTP_Port;
    $phpmailer->Username = SMTP_Username;
    $phpmailer->Password = SMTP_Password;
    $phpmailer->SMTPSecure = SMTP_SecureMode;

    $phpmailer->setFrom(SMTP_SenderEmail, SMTP_SenderName);
    $phpmailer->addReplyTo(SMTP_SenderEmail, SMTP_SenderName);
    $phpmailer->addAddress($toAddress);

    $phpmailer->Subject = $subject;
    $phpmailer->isHTML = false;
    $phpmailer->Body = $body;

    $phpmailer->SMTPDebug = 4;
    $phpmailer->Debugoutput = 'html';
    $phpmailer->setLanguage('pt');

    if($phpmailer->send()){
        return 0;
    }else{
        $error = 'Message could not be sent. Mailer Error: ' . $phpmailer->ErrorInfo;
        error_log($error);

    }
}



