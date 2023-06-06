<?php 

include '../conexion.php';

$matricula = $_POST['matricula'];

$consulta = "SELECT DISTINCT usuario.matricula, usuario.nombre, usuario.apellidoPaterno, usuario.apellidoMaterno, usuario.email, usuario.sexo FROM cita JOIN usuario ON cita.idUsuario = usuario.matricula WHERE cita.idMedico = '$matricula'
";
$stmt = sqlsrv_query($conexion, $consulta);

//guarda la consulta 
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$usuarios = array();
$usuarios['datos'] =array();
while ($row = sqlsrv_fetch_array($stmt)) {
    $index['matricula'] =$row['0'];
    $index['nombre'] =$row['1']; 
    $index['apellidoPaterno'] =$row['2'];
    $index['apellidoMaterno'] = $row['3'];
    $index['email'] = $row['4'];
    $index['sexo'] = $row['5'];

    //rol
    array_push($usuarios['datos'], $index);
}
$usuarios["exito"]="1";
echo json_encode($usuarios);

sqlsrv_free_stmt($stmt); //libera la memoria asociada con el resultado de la consulta SQL
sqlsrv_close($conexion);


?>