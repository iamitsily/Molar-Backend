<?php 

include '../conexion.php';

$idCita = $_POST['id']; 
$status = $_POST['status'];
$params = array($status);
//Query
$consulta = "UPDATE cita SET status = (?) WHERE id = $idCita";
    $stmt = sqlsrv_prepare($conexion, $consulta, $params);

    if (sqlsrv_execute($stmt) === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    echo "Eliminacion exitosa";
    sqlsrv_close($conexion);
?>