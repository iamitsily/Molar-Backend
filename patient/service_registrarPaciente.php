<?php

include '../conexion.php';

//$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$rol = $_POST['rol'];
$sexo = $_POST['sexo'];
$PassWrd = $_POST['PassWrd'];

$consulta = "INSERT INTO usuario (Nombre, ApellidoPaterno, ApellidoMaterno, Email, Telefono, Rol, Sexo, PassWrd) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$params = array($nombre, $apellido_paterno, $apellido_materno, $email, $telefono, $rol, $sexo, $PassWrd);
$stmt = sqlsrv_prepare($conexion, $consulta, $params);

if (sqlsrv_execute($stmt) === false) {
    die(print_r(sqlsrv_errors(), true));
}

echo "Registro exitoso";
sqlsrv_close($conexion);

?>