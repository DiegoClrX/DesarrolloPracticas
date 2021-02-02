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
$mail->Host = 'smtp.gmail.com';

$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = getenv('USER_EMAIL');
//Password to use for SMTP authentication
$mail->Password = getenv('PASSWORD_EMAIL');  //Usar un token de Gmail (Cuenta -> Seguridad -> Contraseñas de aplicaciones)
//Set who the message is to be sent from
$mail->setFrom('diegoclrx@gmail.com');
//Set who the message is to be sent to
$mail->addAddress('jjavierguillen@gmail.com');
//Set the subject line
$mail->Subject = 'PDF de la Practica 2 ';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML("<body><h1>PDF de la practica 2 de servidor</h1></body>", __DIR__);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->addAttachment('practica2.pdf');
//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: '. $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}

?>