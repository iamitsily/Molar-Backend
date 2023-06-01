<?php 

require 'PHPMailer/PHPMailerAutoload.php';
    
$destino = $_POST['destino'];
$asunto = $_POST['destino'];
$mensaje = $_POST['destino'];
// Configuración del servidor SMTP y autenticación
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'molar.haku@gmail.com';
$mail->Password = 'webysycthvywcvlf';

// Configuración de los detalles del correo electrónico
$mail->setFrom('molar.haku@gmail.com', 'Remitente');
$mail->addAddress($destino, 'Destinatario');
$mail->Subject = $asunto;
$mail->Body = $mensaje;

// Envío del correo electrónico
if ($mail->send()) {
    echo "Correo electrónico enviado correctamente";
} else {
    echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
}

?>