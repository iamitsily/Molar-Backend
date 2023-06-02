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

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 0;                     
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'molar.haku@gmail.com';                    
    $mail->Password   = 'webysycthvywcvlf';                            
    $mail->SMTPSecure = 'ssl';          
    $mail->Port       = 465;

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