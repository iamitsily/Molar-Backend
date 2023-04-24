<?php 

include '../conexion.php';

//$consulta = "SELECT * FROM dbo.usuario";

$consulta = "SELECT * FROM dbo.usuario ORDER BY nombre ASC"; //para que se ordene por orden alfabetico
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
    $index['correo'] =$row['4'];
    $index['numeroTelefono'] =$row['5'];
    $index['rol'] =$row['6'];
    $index['sexo'] =$row['7'];
    $index['password'] =$row['8'];
    $index['status'] =$row['9'];

    array_push($usuarios['datos'], $index);
}
$usuarios["exito"]="1";
echo json_encode($usuarios);

sqlsrv_free_stmt($stmt); //libera la memoria asociada con el resultado de la consulta SQL
sqlsrv_close($conexion);


?>