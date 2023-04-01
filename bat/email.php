<?php
require 'phpmailer/PHPMailerAutoload.php';

$configuracao = json_decode('email.config.json');

var_dump($configuracao);
$assunto = "Contato site lbaquapiscina";
$mensagem = "<bold>Teste<bold> envio de e-mail.";

if (isset($_POST['assunto']) && !empty($_POST['assunto'])) {
    $assunto = $_POST['assunto'];
}
 if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
    $mensagem = $_POST['mensagem'];
}
 $mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'mx1.hostinger.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'contato@lbaquapiscina.com.br';
$mail->Password = 'Gomes09@';
$mail->Port = 587;

$mail->setFrom('tialmeid@gmail.com', 'Contato');
$mail->addAddress('lbaquapiscina@gmail.com.br');
$mail->addAddress('contato@lbaquapiscina.com.br');

$mail->isHTML(true);

$mail->Subject = $assunto;
$mail->Body    = nl2br($mensagem);
//$mail->AltBody = nl2br(strip_tags($mensagem));

if(!$mail->send()) {
    echo 'Não foi possível enviar a mensagem.<br>';
    echo 'Erro: ' . $mail->ErrorInfo;
} else {
    header('Location: index.php?enviado');
}

$mail->SMTPDebug = 4;
$mail->Debugoutput = 'html';
$mail->setLanguage('pt');