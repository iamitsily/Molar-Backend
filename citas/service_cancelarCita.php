<?php

include '../conexion.php';

$idCita = $_POST['id'];
$estado = $_POST['estado'];
$motivo = $_POST['motivo'];
$matricula = $_POST['matricula'];

$params = array($estado,$motivo);
$consulta = "UPDATE cita SET estado = (?), motivoCancelar = (?) WHERE id = '$idCita'";
$stmt = sqlsrv_prepare($conexion, $consulta, $params);

if (sqlsrv_execute($stmt) === false) {
    echo "Modificacion fallida";
    die(print_r(sqlsrv_errors(), true));

}else{
    echo "Modificacion exitosa";
}

$consultaTolerancia = "SELECT tolerancia from usuario where matricula = '$matricula'";
$resultadoObtenerTolerancia = sqlsrv_query($conexion, $consultaTolerancia);
// Obtener el valor de tolerancia actual
$row = sqlsrv_fetch_array($resultadoObtenerTolerancia, SQLSRV_FETCH_ASSOC);
$toleranciaActual = $row['tolerancia'];

// Sumarle 1 a la tolerancia actual
$nuevaTolerancia = $toleranciaActual + 1;

// Actualizar el campo tolerancia con el nuevo valor
$sqlActualizarTolerancia = "UPDATE usuario SET tolerancia = '$nuevaTolerancia' WHERE matricula = '$matricula'";
$resultadoActualizarTolerancia = sqlsrv_query($conexion, $sqlActualizarTolerancia);


sqlsrv_close($conexion);
?>