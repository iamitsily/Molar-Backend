<?php
include '../conexion.php';

$matricula = $_POST['matricula'];
$idNotificacion = $_POST['idNotificacion'];
$nuevoMensaje = $_POST['mensaje'];

//if (empty($matricula) || empty($idNotificacion) || empty($nuevoMensaje)) {
//    die("La matrícula, ID de notificación o el nuevo mensaje no se han proporcionado");}

$actualizarNotificacion = "UPDATE dbo.notificaciones SET Mensaje = ? WHERE matricula = ? AND idNotificacion = ?";

$params = array($nuevoMensaje, $matricula, $idNotificacion);
$stmtActualizar = sqlsrv_query($conexion, $actualizarNotificacion, $params);

if ($stmtActualizar === false) {
    die(print_r(sqlsrv_errors(), true));
}

$response = array();
//$response["exito"] = "1";
$response["mensaje"] = "Notificacion actualizada exitosamente";
echo json_encode($response);

sqlsrv_close($conexion);
?>
