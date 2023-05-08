<?php

include '../conexion.php';

$matricula = $_POST['matricula'];
$password = $_POST['password'];

$params = array($password);

$consulta = "UPDATE usuario SET password = (?) WHERE matricula = $matricula";
$stmt = sqlsrv_prepare($conexion, $consulta, $params);


if(sqlsrv_execute($stmt) === false){
    echo "Modificacion fallida";
    die(print_r(sqlsrv_errors(), true));
}else{
    echo "Modificacion exitosa";
}
sqlsrv_close($conexion);