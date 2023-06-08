<?php 

include '../conexion.php';

$usuarios = array();
$usuarios['datos'] =array();
$consulta = "SELECT COUNT(*) as NumUsuario FROM usuario WHERE status=1 and rol = '1'";
$stmt = sqlsrv_query($conexion, $consulta);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}else{
    while ($row = sqlsrv_fetch_array($stmt)) {
        $index['NumUsuario'] =$row['0'];
        array_push($usuarios['datos'], $index);
    }
    $consulta = "SELECT COUNT(*) as NumMedico FROM cita WHERE estado=4";
    $stmt = sqlsrv_query($conexion, $consulta);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }else{
        while ($row = sqlsrv_fetch_array($stmt)) {
            $indexdos['NumMedico'] =$row['0'];
            array_push($usuarios['datos'], $indexdos);
        }
        $usuarios["exito"]="1";
        echo json_encode($usuarios);
    }

}
sqlsrv_free_stmt($stmt); //libera la memoria asociada con el resultado de la consulta SQL
sqlsrv_close($conexion);


?>