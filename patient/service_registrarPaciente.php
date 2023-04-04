<?php

include 'conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];

$consulta = "INSERT INTO users (id, Nombre, Apellidos, Edad) VALUES (?, ?, ?, ?)";
$params = array($id, $nombre, $apellido, $edad);
$stmt = sqlsrv_prepare($conexion, $consulta, $params);

if (sqlsrv_execute($stmt) === false) {
    die(print_r(sqlsrv_errors(), true));
}

echo "Registro exitoso";
sqlsrv_close($conexion);

?>