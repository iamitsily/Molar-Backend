<?php 

include '../conexion.php';

$matricula = $_POST['matricula']; 
$status = $_POST['status'];
$params = array($status);
//Query
$consulta = "UPDATE usuario SET status = (?) WHERE matricula = $matricula";
    $stmt = sqlsrv_prepare($conexion, $consulta, $params);

    if (sqlsrv_execute($stmt) === false) {
        echo  "Eliminacion fallida";
        die(print_r(sqlsrv_errors(), true));
    }else{
        echo "Eliminación exitosa";
    }
    sqlsrv_close($conexion);
?>