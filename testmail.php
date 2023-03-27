<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$from = 'contato@lbaquapiscina.com.br';
$to = 'contato@lbaquapiscina.com.br';
$subject = 'Telefone para contato';
$message = 'Meu número de teleone para contato é: ';
$headers = "From:$from";
mail($to, $subject, $message, $headers);
echo 'O e-mail foi encaminhado. Entraremos em contato o mais breve possível.';

