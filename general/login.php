<?php 

include '../conexion.php';

//$consulta = "SELECT * FROM dbo.usuario";
$id = $_POST['id'];

$consulta = "SELECT matricula, password from dbo.usuario WHERE matricula = $id";
$stmt = sqlsrv_query($conexion, $consulta);

//guarda la consulta 
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$usuarios = array();
while ($usuario = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $usuarios[] = $usuario;
}

echo json_encode($usuarios, JSON_UNESCAPED_UNICODE);

sqlsrv_free_stmt($stmt); //libera la memoria asociada con el resultado de la consulta SQL
sqlsrv_close($conexion);


?>