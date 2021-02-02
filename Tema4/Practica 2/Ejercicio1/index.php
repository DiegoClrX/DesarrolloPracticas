<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


error_reporting(E_ALL);
ini_set("display_errors", 1);

// Load Composer's autoloader
require 'vendor/autoload.php';


echo "Enviando mail con PHPMailer ...";

$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//$mail->SMTPDebug = 2;
$mail->Host = 'free.mboxhosting.com';

$mail->Port = 25;
$mail->SMTPAuth = true;
$mail->Username = 'clrx@diegoclrx.tk';
$mail->Password = "@@Diego1!@@";
$mail -> setFrom("clrx@diegoclrx.tk");
$mail->addAddress('jjavierguillen@gmail.com');
//Set the subject line
$mail->Subject = 'Email Informativo';
$mail->msgHTML("<body><h1>hola buenas te hablamos desde ".$_SERVER['SERVER_NAME']." y con la ip ".$_SERVER['REMOTE_ADDR']."</h1></body>", __DIR__);
$mail->AltBody = 'This is a plain-text message body';
//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: '. $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}

?>