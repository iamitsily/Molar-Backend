<?php 

include '../conexion.php';

$id=$_POST['id'];
$dia=$_POST['dia']; 
$hora=$_POST['hora'];
$motivo=$_POST['motivo'];
$estado=$_POST['estado'];
$status=$_POST['status'];
$idUsuario=$_POST['idUsuario'];



$consulta = "INSERT INTO cita (id, dia, hora, motivo, estado, status, idUsuario) values (?,?,?,?,?,?,?)"; 
$params = array(dia,hora,motivo,estado,status);
$stmt = sqlsrv_prepare($conexion, $consulta, $params);

if (sqlsrv_execute($stmt) === false) {
    die(print_r(sqlsrv_errors(), true));
    echo "Registro fallido";
}else{
    echo "Registro exitoso";
}

sqlsrv_close($conexion);

?>