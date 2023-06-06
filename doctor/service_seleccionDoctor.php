<?php 

include '../conexion.php';

$matricula = $_POST['matricula'];

$consulta = "SELECT matricula, email, telefono, password FROM medico WHERE matricula = $matricula AND status=1";
$stmt = sqlsrv_query($conexion, $consulta);

//guarda la consulta 
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$usuarios = array();
$usuarios['datos'] =array();

while ($row = sqlsrv_fetch_array($stmt)) {
    $index['matricula'] =$row['0'];
    $index['email'] =$row['1']; 
    $index['telefono'] =$row['2'];
    $index['password'] = $row['3'];
    array_push($usuarios['datos'], $index); 
}
$usuarios["exito"]="1";
echo json_encode($usuarios);

sqlsrv_free_stmt($stmt); //libera la memoria asociada con el resultado de la consulta SQL
sqlsrv_close($conexion);


?>