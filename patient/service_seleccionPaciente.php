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
while ($usuario = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $usuarios[] = $usuario;
}

echo json_encode($usuarios);

sqlsrv_free_stmt($stmt); //libera la memoria asociada con el resultado de la consulta SQL
sqlsrv_close($conexion);


?>