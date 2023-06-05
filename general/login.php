<?php 

include '../conexion.php';

//$consulta = "SELECT * FROM dbo.usuario";
$matricula = $_POST['matricula'];

$consulta = "SELECT matricula, nombre, password, rol, sexo, tolerancia FROM usuario WHERE matricula = '$matricula' AND status = 1
UNION
SELECT matricula, nombre, password, rol, sexo, tolerancia FROM medico WHERE matricula = '$matricula' AND status = 1";
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
    $index['password'] =$row['2'];
    $index['rol'] = $row['3'];
    $index['sexo'] = $row['4'];
    $index['tolerancia'] = $row['5'];
    //rol
    array_push($usuarios['datos'], $index);
}
$usuarios["exito"]="1";
echo json_encode($usuarios);

sqlsrv_free_stmt($stmt); //libera la memoria asociada con el resultado de la consulta SQL
sqlsrv_close($conexion);


?>