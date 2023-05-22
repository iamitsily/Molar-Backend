<?php

include '../conexion.php';

$matricula = $_POST['matricula'];
$idNotificacion = $_POST['idNotificacion'];

$marcarLeida = "UPDATE dbo.notificaciones SET Leida = 1 WHERE matricula = '$matricula' AND idNotificacion = $idNotificacion";
$stmtMarcarLeida = sqlsrv_query($conexion, $marcarLeida);

if ($stmtMarcarLeida === false) {
    die(print_r(sqlsrv_errors(), true));
}

/* mensajes de prueba
if ($stmtMarcarLeida === false) {
    $response = array(
        "nosirveXD" => false,
        "message" => "Error al marcar la notificación como leída",
        "error" => sqlsrv_errors()
    );
    echo json_encode($response);
    exit();
}

$response = array(
    "sisirve" => true,
    "message" => "Notificación marcada como leída exitosamente"
);
echo json_encode($response);*/

sqlsrv_free_stmt($stmtMarcarLeida);
sqlsrv_close($conexion);

?>
