<?php

include '../conexion.php';

$email = $_POST['email'];
$password = $_POST['password'];

$params = array($password);

$consulta = "UPDATE usuario SET password = (?) WHERE email = '$email'";
$stmt = sqlsrv_prepare($conexion, $consulta, $params);


if(sqlsrv_execute($stmt) === false){
    echo "Modificacion fallida";
    die(print_r(sqlsrv_errors(), true));
}else{
    echo "Modificacion exitosa";
}
sqlsrv_close($conexion);