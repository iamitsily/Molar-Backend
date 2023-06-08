<?php 

include '../conexion.php';

$usuarios = array();
$usuarios['datos'] =array();
$mes = $_POST['mes'];
$year = $_POST['year'];
//Numero de usuarios pacientes
$consulta = "SELECT id, dia, hora, motivo, descripcion, estado, idUsuario, idMedico
FROM [dbo].[cita]
WHERE MONTH(CONVERT(datetime, dia, 105)) = '$mes'
AND YEAR(CONVERT(datetime, dia, 105)) = '$year'";
$stmt = sqlsrv_query($conexion, $consulta);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}else{
    while ($row = sqlsrv_fetch_array($stmt)) {
        $index['id'] =$row['0'];
        $index['dia'] =$row['1'];
        $index['hora'] =$row['2'];
        $index['motivo'] =$row['3'];
        $index['descripcion'] =$row['4'];
        $index['estado'] =$row['5'];
        $index['idUsuario'] =$row['6'];
        $index['idMedico'] =$row['7'];
        array_push($usuarios['datos'], $index);
    }
}
$usuarios["exito"]="1";
echo json_encode($usuarios);

sqlsrv_free_stmt($stmt); //libera la memoria asociada con el resultado de la consulta SQL
sqlsrv_close($conexion);


?>