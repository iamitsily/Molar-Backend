<?php

include '../conexion.php';

$idCita = $_POST['idCita'];
$dia = $_POST['dia'];
$hora = $_POST['hora'];
$motivo = $_POST['motivo'];
$estado = $_POST['estado'];
$status = $_POST['status'];
//---------------------------------
//Modificacion del dia
if(isset($dia)){
    //Nombre esta definido
    $consulta = "UPDATE cita SET (dia) WHERE idCita = $idCita VALUES(?)";
    //Query
    $stmt = sqlsrv_prepare($conexion, $consulta, $dia);

    if (sqlsrv_execute($stmt) === false) {
        //No existe el registro
        die(print_r(sqlsrv_errors(), true));
    }
}

//---------------------------------
//Modificacion de apellidoPaterno
if(isset($hora)){
    //ApellidoPaterno esta definido
    $consulta = "UPDATE cita SET (hora) WHERE idCita = $idCita VALUES(?)";
    //Query
    $stmt = sqlsrv_prepare($conexion, $consulta, $apellido_paterno);

    if (sqlsrv_execute($stmt) === false) {
        //No existe el registro
        die(print_r(sqlsrv_errors(), true));
    }
}

//---------------------------------
//Modificacion de apellidoMaterno
if(isset($motivo)){
    //ApellidoPaterno esta definido
    $consulta = "UPDATE cita SET (motivo) WHERE idCita = $idCita VALUES(?)";
    //Query
    $stmt = sqlsrv_prepare($conexion, $consulta, $apellido_materno);

    if (sqlsrv_execute($stmt) === false) {
        //No existe el registro
        die(print_r(sqlsrv_errors(), true));
    }
}

//---------------------------------
//Modificacion de email
if(isset($estado)){
    //Email esta definido
    $consulta = "UPDATE cita SET (estado) WHERE idCita = $idCita VALUES(?)";
    //Query
    $stmt = sqlsrv_prepare($conexion, $consulta, $email);

    if (sqlsrv_execute($stmt) === false) {
        //No existe el registro
        die(print_r(sqlsrv_errors(), true));
    }
}

//---------------------------------
//Modificacion de telefono
if(isset($status)){
    //ApellidoPaterno esta definido
    $consulta = "UPDATE cita SET (status) WHERE idCita = $idCita VALUES(?)";
    //Query
    $stmt = sqlsrv_prepare($conexion, $consulta, $telefono);

    if (sqlsrv_execute($stmt) === false) {
        //No existe el registro
        die(print_r(sqlsrv_errors(), true));
    }
}
echo "Modificacion exitosa";
sqlsrv_close($conexion);

?>