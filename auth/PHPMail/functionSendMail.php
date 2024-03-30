<?php
require './PHPMail/Exception.php';
require './PHPMail/PHPMailer.php';
require './PHPMail/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendEmail($email,$subject,$message)
{
    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'haihailua123456@gmail.com';                     //SMTP username
        $mail->Password   = 'fhdi kdqq iryp sjao';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('haihailua123456@gmail.com', 'Hari');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                 
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function randomSixDigits() {
    $result = "";
    for ($i = 0; $i < 6; $i++) {
        $result .= rand(0, 9);
    }
    return $result;
}