<?php 

include '../conexion.php';


$consulta = "SELECT COUNT(*) as Num FROM medico WHERE status=1";
$stmt = sqlsrv_query($conexion, $consulta);

//guarda la consulta 
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}else{
    $usuarios = array();
    $usuarios['datos'] =array();
    while ($row = sqlsrv_fetch_array($stmt)) {
        $index['Num'] =$row['0'];
        array_push($usuarios['datos'], $index);
    }
    $usuarios["exito"]="1";
    echo json_encode($usuarios);
}
sqlsrv_free_stmt($stmt); //libera la memoria asociada con el resultado de la consulta SQL
sqlsrv_close($conexion);


?>