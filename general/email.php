<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$destino = $_POST['destino'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'molar.haku@gmail.com';                     //SMTP username
    $mail->Password   = 'webysycthvywcvlf';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption PHPMailer::ENCRYPTION_SMTPS
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('molar.haku@gmail.com', 'Molar');
    $mail->addAddress($destino);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $mensaje;

    $mail->send();
    echo 'Enviado correctamente';
} catch (Exception $e) {
    echo "Error al enviar: {$mail->ErrorInfo}";
}