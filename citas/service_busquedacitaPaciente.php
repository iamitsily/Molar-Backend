<?php 

include '../conexion.php';
//Preguntar como se sabe que es para la cita ;_; 
$consulta = "SELECT * FROM dbo.usuario "; //para que se ordene por orden alfabetico
$stmt = sqlsrv_query($conexion, $consulta);


    if (sqlsrv_execute($stmt) === false) {
        //No existe el registro
        die(print_r(sqlsrv_errors(), true));
    }

    echo "Modificacion exitosa";
    sqlsrv_close($conexion);
?>