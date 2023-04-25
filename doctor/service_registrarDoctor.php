<?php

include '../conexion.php';

$matricula = $_POST['matricula'];
$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$rol = $_POST['rol'];
$sexo = $_POST['sexo'];
$password = $_POST['password'];
$status = $_POST['status'];

$consulta = "INSERT INTO medico (matricula, nombre, apellidoPaterno, apellidoMaterno, email, telefono, rol, sexo, password, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$params = array($matricula,$nombre, $apellido_paterno, $apellido_materno, $email, $telefono, $rol, $sexo, $password, $status);
$stmt = sqlsrv_prepare($conexion, $consulta, $params);

if (sqlsrv_execute($stmt) === false) {
    die(print_r(sqlsrv_errors(), true));
    echo "Registro fallido";
}else{
    echo "Registro exitoso";
}

sqlsrv_close($conexion);

?>