<?php
//Pa cuando el paciente quiera desacerse de sus noti

include '../conexion.php';

$matricula = $_POST['matricula'];
$idNotificacion = $_POST['idNotificacion'];

if (empty($matricula) || empty($idNotificacion)) {
    die("La matrícula o el ID de notificación no se han proporcionado");
}

// Query
$eliminarNotificacion = "DELETE FROM dbo.notificaciones WHERE matricula = ? AND IdNotificacion = ?";
$params = array($matricula, $idNotificacion);
$stmtEliminar = sqlsrv_prepare($conexion, $eliminarNotificacion, $params);

if ($stmtEliminar === false) {
    die(print_r(sqlsrv_errors(), true));
}

if (sqlsrv_execute($stmtEliminar) === false) {
    echo "Eliminación fallida";
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Eliminación exitosa";
}

sqlsrv_close($conexion);

?>
