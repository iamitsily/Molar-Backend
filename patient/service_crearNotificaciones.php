<?php
//Aqui yo creo que va en asistente porque este crea la notificacion para aprobar cancelacion XD

include '../conexion.php';

$matricula = $_POST['matricula'];
$mensaje = $_POST['mensaje'];

//if (empty($matricula) || empty($mensaje)) {
//    die("La matrícula o el mensaje no se han proporcionado");
//}

$insertarNotificacion = "INSERT INTO dbo.notificaciones (matricula, Mensaje, Leida, Fecha, IdNotificacion) VALUES (?, ?, 0, GETDATE(), (SELECT ISNULL(MAX(IdNotificacion), 0) + 1 FROM dbo.notificaciones))";

$params = array($matricula, $mensaje);
$stmtInsertar = sqlsrv_query($conexion, $insertarNotificacion, $params);

if ($stmtInsertar === false) {
    die(print_r(sqlsrv_errors(), true));
}

$response = array();
//$response["exito"] = "1";
$response["mensaje"] = "Notificacion creada exitosamente";
echo json_encode($response);

sqlsrv_close($conexion);

?>
