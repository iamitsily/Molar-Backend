<?php 

include '../conexion.php';

$consulta = "SELECT cita.id, cita.dia, cita.hora, cita.motivo, cita.estado, cita.descripcion, cita.motivoCancelar, usuario.nombre, usuario.apellidoPaterno, usuario.email, usuario.matricula, usuario.sexo from cita JOIN usuario ON cita.idUsuario = usuario.matricula WHERE cita.status=1";
$stmt = sqlsrv_query($conexion, $consulta);

//guarda la consulta 
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$usuarios = array();
$usuarios['datos'] =array();
while ($row = sqlsrv_fetch_array($stmt)) {
    $index['id'] =$row['0'];
    $index['dia'] =$row['1']; 
    $index['hora'] =$row['2'];
    $index['motivo'] = $row['3'];
    $index['estado'] = $row['4'];
    $index['descripcion'] = $row['5'];
    $index['motivoCancelar'] = $row['6'];
    $index['nombre'] = $row['7'];
    $index['apellidoPaterno'] = $row['8'];
    $index['email'] = $row['9'];
    $index['matricula'] = $row['10'];
    $index['sexo'] = $row['11'];
    //rol
    array_push($usuarios['datos'], $index);
}

// Ordenar los registros por la columna "dia" utilizando el algoritmo de ordenamiento de burbuja
$n = count($usuarios['datos']);
for ($i = 0; $i < $n - 1; $i++) {
    for ($j = 0; $j < $n - $i - 1; $j++) {
        $fechaActual = DateTime::createFromFormat('d/m/Y', $usuarios['datos'][$j]['dia']);
        $fechaSiguiente = DateTime::createFromFormat('d/m/Y', $usuarios['datos'][$j + 1]['dia']);
        if ($fechaActual > $fechaSiguiente) {
            // Intercambiar los registros si están en el orden incorrecto
            $temp = $usuarios['datos'][$j];
            $usuarios['datos'][$j] = $usuarios['datos'][$j + 1];
            $usuarios['datos'][$j + 1] = $temp;
        }
    }
}

$usuarios["exito"]="1";
echo json_encode($usuarios);

sqlsrv_free_stmt($stmt); //libera la memoria asociada con el resultado de la consulta SQL
sqlsrv_close($conexion);


?>