<?php

include '../conexion.php';

$idPos = $_POST['idPos'];

$consulta = "SELECT medico.matricula FROM medico WHERE medico.idPos = $idPos";
$stmt = sqlsrv_query($conexion, $consulta);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}else{
    if (sqlsrv_has_rows($stmt)) {
        $usuarios = array();
        $usuarios['datos'] =array();
        while ($row = sqlsrv_fetch_array($stmt)) {
                $index['matricula'] =$row['0'];
                array_push($usuarios['datos'], $index);
        }
        $usuarios["exito"]="1";
        echo json_encode($usuarios);
    }else{
        $usuarios = array();
        $usuarios["exito"]="0";
        echo json_encode($usuarios);
    }
}
sqlsrv_free_stmt($stmt); 
sqlsrv_close($conexion);

?>