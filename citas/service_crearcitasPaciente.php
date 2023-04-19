<?php 

include '../conexion.php';

$dia=$_POST['dia'];
$hora=$_POST['hora']; 
$motivo=$_POST['motivo'];
$estado=$_POST['estado'];
$status=$_POST['status'];



$consulta = "INSERT INTO usuario (Dia,Hora,Motivo,Estado,Status) values (?,?,?,?,?,?)"; 
$params = array(dia,hora,motivo,estado,status);
    $stmt = sqlsrv_prepare($conexion, $consulta, $params);

    if (sqlsrv_execute($stmt) === false) {
        //No existe el registro
        die(print_r(sqlsrv_errors(), true));
    }

    echo "Modificacion exitosa";
    sqlsrv_close($conexion);
?>