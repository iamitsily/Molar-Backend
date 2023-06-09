<?php 

include '../conexion.php';

//$consulta = "SELECT * FROM dbo.usuario";
$telefono = $_POST['telefono'];

$consulta = "SELECT matricula FROM usuario WHERE telefono = '$telefono' AND status = 1
UNION 
SELECT matricula FROM medico WHERE telefono = '$telefono' AND status = 1";
$stmt = sqlsrv_query($conexion, $consulta);

//guarda la consulta 
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$usuarios = array();
$usuarios['datos'] =array();
while ($row = sqlsrv_fetch_array($stmt)) {
    $index['matricula'] =$row['0'];
    //rol
    array_push($usuarios['datos'], $index);
}
$usuarios["exito"]="1";
echo json_encode($usuarios);

sqlsrv_free_stmt($stmt); //libera la memoria asociada con el resultado de la consulta SQL
sqlsrv_close($conexion);


?>