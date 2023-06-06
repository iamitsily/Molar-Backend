<?php 

include '../conexion.php';

$idCita = $_POST['id']; 
$status = '0';
$params = array($status);
//Query
$consulta = "UPDATE cita SET estado = (?) WHERE id = '$idCita'";
    $stmt = sqlsrv_prepare($conexion, $consulta, $params);

    if (sqlsrv_execute($stmt) === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    echo "Cita terminada";
    sqlsrv_close($conexion);
?>