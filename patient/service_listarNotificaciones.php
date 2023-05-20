<?php

include '../conexion.php';

$matricula = $_POST['matricula'];

//if (empty($matricula)) {
    //die("La matrícula no se ha proporcionado"); //pa cuando haya una exepcion
//}

$consulta = "SELECT * FROM dbo.notificaciones WHERE matricula = '$matricula' AND Leida = 0"; //Aqui al hacer pruebas en postman cuando pasan a leidas ya no se filtran :D
//$consulta = "SELECT * FROM dbo.notificaciones WHERE matricula = '$matricula'";

$stmt = sqlsrv_query($conexion, $consulta);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$notificaciones = array();
$notificaciones['datos'] = array();

while ($row = sqlsrv_fetch_array($stmt)) {
    $index['IdNotificacion'] = $row['IdNotificacion'];
    $index['Mensaje'] = $row['Mensaje'];
    $index['Leida'] = $row['Leida'];
    $index['Fecha'] = $row['Fecha'];
    $index['matricula'] = $row['matricula'];

    // Marcar la notificación como leída
    $idNotificacion = $row['IdNotificacion'];
    $marcarLeida = "UPDATE dbo.notificaciones SET Leida = 1 WHERE matricula = '$matricula' AND idNotificacion = $idNotificacion";
    $stmtMarcarLeida = sqlsrv_query($conexion, $marcarLeida);

    if ($stmtMarcarLeida === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    array_push($notificaciones['datos'], $index);
}

//$notificaciones["exito"] = "1";
echo json_encode($notificaciones);

sqlsrv_free_stmt($stmt); //libera la memoria asociada con el resultado de la consulta SQL
sqlsrv_close($conexion);

?>
