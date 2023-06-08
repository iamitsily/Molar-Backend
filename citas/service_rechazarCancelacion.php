<?php

include '../conexion.php';

$idCita = $_POST['id'];
$estado = $_POST['estado'];

$params = array($estado,$motivo);
$consulta = "UPDATE cita SET estado = (?), motivoCancelar = (?) WHERE id = '$idCita'";
$stmt = sqlsrv_prepare($conexion, $consulta, $params);

if (sqlsrv_execute($stmt) === false) {
    echo "Modificacion fallida";
    die(print_r(sqlsrv_errors(), true));

}else{
    echo "Modificacion exitosa";
}

sqlsrv_close($conexion);
?>