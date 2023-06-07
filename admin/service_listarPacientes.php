<?php 

include '../conexion.php';

//$consulta = "SELECT * FROM dbo.usuario";

$consulta = "SELECT matricula, nombre, apellidoPaterno, apellidoMaterno, email, telefono, sexo, rol FROM usuario WHERE status = '1' AND rol = 1";
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
    $index['apellidoMaterno'] =$row['3'];
    $index['email'] =$row['4'];
    $index['telefono'] =$row['5'];
    $index['sexo'] =$row['6'];
    $index['rol'] =$row['7'];

    array_push($usuarios['datos'], $index); 
}
$usuarios["exito"]="1";
echo json_encode($usuarios);

sqlsrv_free_stmt($stmt); //libera la memoria asociada con el resultado de la consulta SQL
sqlsrv_close($conexion);


?>