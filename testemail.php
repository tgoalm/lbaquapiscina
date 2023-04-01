<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teste de Email</title>
</head>
<body>
    <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);
    try {
        //Configurações do servidor
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'contato@lbaquapiscina.com.br';
        $mail->Password   = 'Gomes09@';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Destinatário
        $mail->setFrom('contato@lbaquapiscina.com.br', 'Contato solicitado via lbaquapiscina.com.br');
        $mail->addAddress('contato@lbaquapiscina.com.br', 'Contato solicitado via lbaquapiscina.com.br');
        $mail->addAddress('lbaquapiscina@gmail.com', 'Contato solicitado via lbaquapiscina.com.br');
        $mail->addAddress('tgoalm@gmail.com', 'Contato solicitado via lbaquapiscina.com.br'); //Name is optional
        $mail->addReplyTo('lbaquapiscina@gmail.com', 'Contato solicitado via lbaquapiscina.com.br');

        //Conteúdo
        $mail->isHTML(true);
        $mail->Subject = 'Contato';
        $mail->Body    = '<b>Teste</b> de envio de e-mail.';

        $mail->send();

        echo "A mensagem foi enviada com sucesso.";
    } catch (Exception $exception) {
        echo "A mensagem não pode ser enviada. Erro: {$mail->ErrorInfo}";
    }
    ?>
</body>
</html>