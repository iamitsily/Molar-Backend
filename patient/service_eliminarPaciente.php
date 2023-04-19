<?php 

include '../conexion.php';

$id = $_POST['id']; 
$status = $_POST['status'];

//Query
$consulta = "UPDATE usuario SET (status) WHERE id = $id VALUES(?)";
    $stmt = sqlsrv_prepare($conexion, $consulta, $status);

    if (sqlsrv_execute($stmt) === false) {
        //No existe el registro
        die(print_r(sqlsrv_errors(), true));
    }

    echo "Modificacion exitosa";
    sqlsrv_close($conexion);
?>