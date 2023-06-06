<?php 

include '../conexion.php';

$idCita = $_POST['idCita'];

$consulta = "SELECT cita.id, cita. dia, cita.hora, cita.motivo, usuario.nombre, usuario.apellidoPaterno, usuario.matricula from cita JOIN usuario ON cita.idUsuario=usuario.matricula WHERE cita.id = '$idCita' AND cita.status=1";
$stmt = sqlsrv_query($conexion, $consulta);

//guarda la consulta 
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$usuarios = array();
$usuarios['datos'] =array();
while ($row = sqlsrv_fetch_array($stmt)) {
    $index['id'] =$row['0'];
    $index['dia'] =$row['1']; 
    $index['hora'] =$row['2'];
    $index['motivo'] = $row['3'];
    $index['nombre'] = $row['4'];
    $index['apellidoPaterno'] = $row['5'];
    $index['matricula'] = $row['6'];
    //rol
    array_push($usuarios['datos'], $index);
}
$usuarios["exito"]="1";
echo json_encode($usuarios);

sqlsrv_free_stmt($stmt); //libera la memoria asociada con el resultado de la consulta SQL
sqlsrv_close($conexion);


?>