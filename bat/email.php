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



//require 'phpmailer/src/PHPMailer.php';
//require 'phpmailer/src/SMTP.php';
//require 'phpmailer/src/Exception.php';
//
//$assunto = "Contato site lbaquapiscina";
//$mensagem = "<bold>Teste<bold> envio de e-mail.";
//
//if (isset($_POST['assunto']) && !empty($_POST['assunto'])) {
//    $assunto = $_POST['assunto'];
//}
// if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
//    $mensagem = $_POST['mensagem'];
//}
// $mail = new PHPMailer;
//
//$mail->isSMTP();
//$mail->Host = 'mx1.hostinger.com';
//$mail->SMTPAuth = true;
//$mail->SMTPSecure = 'tls';
//$mail->Username = "contato@lbaquapisicna.com.br";
//$mail->Password = 'Gomes09@';
//$mail->Port = 587;
//
//$mail->setFrom('tialmeid@gmail.com', 'Contato');
//$mail->addAddress('lbaquapiscina@gmail.com.br');
//$mail->addAddress('contato@lbaquapiscina.com.br');
//$mail->addAddress('tgoalm@gmail.com');
//
//$mail->isHTML(true);
//
//$mail->Subject = $assunto;
//$mail->Body    = nl2br($mensagem);
////$mail->AltBody = nl2br(strip_tags($mensagem));
//
//if(!$mail->send()) {
//    echo 'Não foi possível enviar a mensagem.<br>';
//    echo 'Erro: ' . $mail->ErrorInfo;
//} else {
//    header('Location: index.php?enviado');
//}
//
