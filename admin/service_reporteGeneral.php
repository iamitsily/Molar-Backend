<?php 

include '../conexion.php';

$usuarios = array();
$usuarios['datos'] =array();
//Numero de usuarios pacientes
$consulta = "SELECT COUNT(*) as NumUsuario FROM usuario WHERE rol = '1' AND status=1";
$stmt = sqlsrv_query($conexion, $consulta);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}else{
    while ($row = sqlsrv_fetch_array($stmt)) {
        $indexUsuario['NumUsuario'] =$row['0'];
        array_push($usuarios['datos'], $indexUsuario);
    }
}
//Numero de medicos
$consulta = "SELECT COUNT(*) as NumMedico FROM medico WHERE status=1";
$stmt = sqlsrv_query($conexion, $consulta);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}else{
    while ($row = sqlsrv_fetch_array($stmt)) {
        $indexMedico['NumMedico'] =$row['0'];
        array_push($usuarios['datos'], $indexMedico);
    }
}
//Numero de asistentes
$consulta = "SELECT COUNT(*) as NumAsistente FROM usuario WHERE rol = '3' AND status=1";
$stmt = sqlsrv_query($conexion, $consulta);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}else{
    while ($row = sqlsrv_fetch_array($stmt)) {
        $indexAsistente['NumAsistente'] =$row['0'];
        array_push($usuarios['datos'], $indexAsistente);
    }
}
//Total Citas
$consulta = "SELECT COUNT(*) as NumCitas FROM cita WHERE status=1";
$stmt = sqlsrv_query($conexion, $consulta);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}else{
    while ($row = sqlsrv_fetch_array($stmt)) {
        $indexNumCitas['NumCitas'] =$row['0'];
        array_push($usuarios['datos'], $indexNumCitas);
    }
}
//Total Agendadas
$consulta = "SELECT COUNT(*) as NumCitasAgendadas FROM cita WHERE status=1 AND estado = 1";
$stmt = sqlsrv_query($conexion, $consulta);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}else{
    while ($row = sqlsrv_fetch_array($stmt)) {
        $indexAgendadas['NumCitasAgendadas'] =$row['0'];
        array_push($usuarios['datos'], $indexAgendadas);
    }
}
//Total reagendadas
$consulta = "SELECT COUNT(*) as NumCitasReagendadas FROM cita WHERE status=1 AND estado = 3";
$stmt = sqlsrv_query($conexion, $consulta);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}else{
    while ($row = sqlsrv_fetch_array($stmt)) {
        $indexReagendadas['NumCitasReagendadas'] =$row['0'];
        array_push($usuarios['datos'], $indexReagendadas);
    }
}
//Total canceladas
$consulta = "SELECT COUNT(*) as NumCitasCanceladas FROM cita WHERE status=1 AND estado = 2";
$stmt = sqlsrv_query($conexion, $consulta);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}else{
    while ($row = sqlsrv_fetch_array($stmt)) {
        $indexCanceladas['NumCitasCanceladas'] =$row['0'];
        array_push($usuarios['datos'], $indexCanceladas);
    }
}
//Total terminada
$consulta = "SELECT COUNT(*) as NumCitasTerminadas FROM cita WHERE status=1 AND estado = 0";
$stmt = sqlsrv_query($conexion, $consulta);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}else{
    while ($row = sqlsrv_fetch_array($stmt)) {
        $indexTerminadas['NumCitasTerminadas'] =$row['0'];
        array_push($usuarios['datos'], $indexTerminadas);
    }
}
$usuarios["exito"]="1";
echo json_encode($usuarios);

sqlsrv_free_stmt($stmt); //libera la memoria asociada con el resultado de la consulta SQL
sqlsrv_close($conexion);


?>