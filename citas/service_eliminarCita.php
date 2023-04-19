<?php 

include '../conexion.php';

$idCita = $_POST['idCita']; 
$status = $_POST['status'];

//Query
$consulta = "UPDATE cita SET (status) WHERE id = $idCita VALUES(?)";
    $stmt = sqlsrv_prepare($conexion, $consulta, $status);

    if (sqlsrv_execute($stmt) === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    echo "Eliminación exitosa";
    sqlsrv_close($conexion);
?>