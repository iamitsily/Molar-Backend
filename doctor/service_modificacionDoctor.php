<?php

include '../conexion.php';

$matricula = $_POST['matricula'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$password = $_POST['password'];

$params = array($email, $telefono, $password);

$consulta = "UPDATE medico SET email = (?), telefono = (?), password = (?) WHERE matricula = '$matricula'";
$stmt = sqlsrv_prepare($conexion, $consulta, $params);


if(sqlsrv_execute($stmt) === false){
    echo "Modificacion fallida";
    die(print_r(sqlsrv_errors(), true));
}else{
    echo "Modificacion exitosa";
}
sqlsrv_close($conexion);

?>