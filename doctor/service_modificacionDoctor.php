<?php

include '../conexion.php';

$matricula = $_POST['matricula'];
$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$rol = $_POST['rol'];
$sexo = $_POST['sexo'];
$password = $_POST['password'];

$params = array($nombre, $apellido_paterno, $apellido_materno, $email, $telefono, $rol, $sexo, $password);
//$consulta = "UPDATE usuario SET nombre, apellido_paterno, apellido_materno, email, telefono, rol, sexo, password WHERE matricula = $matricula VALUES (?,?,?,?,?,?,?)";
$consulta = "UPDATE medico SET nombre = (?), apellidoPaterno = (?), apellidoMaterno = (?), email = (?), telefono = (?), rol = (?), sexo = (?), password = (?) WHERE matricula = $matricula";

$stmt = sqlsrv_prepare($conexion, $consulta, $params);


if(sqlsrv_execute($stmt) === false){
    echo "Modificacion fallida";
    die(print_r(sqlsrv_errors(), true));
}else{
    echo "Modificacion exitosa";
}
sqlsrv_close($conexion);

/*
//---------------------------------
//Modificacion de nombre
if(isset($nombre)){
    //Nombre esta definido
    $consulta = "UPDATE usuario SET (Nombre) WHERE id = $id VALUES(?)";
    //Query
    $stmt = sqlsrv_prepare($conexion, $consulta, $nombre);

    if (sqlsrv_execute($stmt) === false) {
        //No existe el registro
        die(print_r(sqlsrv_errors(), true));
    }
}

//---------------------------------
//Modificacion de apellidoPaterno
if(isset($apellido_paterno)){
    //ApellidoPaterno esta definido
    $consulta = "UPDATE usuario SET (ApellidoPaterno) WHERE id = $id VALUES(?)";
    //Query
    $stmt = sqlsrv_prepare($conexion, $consulta, $apellido_paterno);

    if (sqlsrv_execute($stmt) === false) {
        //No existe el registro
        die(print_r(sqlsrv_errors(), true));
    }
}

//---------------------------------
//Modificacion de apellidoMaterno
if(isset($apellido_materno)){
    //ApellidoPaterno esta definido
    $consulta = "UPDATE usuario SET (ApellidoMaterno) WHERE id = $id VALUES(?)";
    //Query
    $stmt = sqlsrv_prepare($conexion, $consulta, $apellido_materno);

    if (sqlsrv_execute($stmt) === false) {
        //No existe el registro
        die(print_r(sqlsrv_errors(), true));
    }
}


//---------------------------------
//Modificacion de email
if(isset($email)){
    //Email esta definido
    $consulta = "UPDATE usuario SET (Email) WHERE id = $id VALUES(?)";
    //Query
    $stmt = sqlsrv_prepare($conexion, $consulta, $email);

    if (sqlsrv_execute($stmt) === false) {
        //No existe el registro
        die(print_r(sqlsrv_errors(), true));
    }
}

//---------------------------------
//Modificacion de telefono
if(isset($telefono)){
    //ApellidoPaterno esta definido
    $consulta = "UPDATE usuario SET (Telefono) WHERE id = $id VALUES(?)";
    //Query
    $stmt = sqlsrv_prepare($conexion, $consulta, $telefono);

    if (sqlsrv_execute($stmt) === false) {
        //No existe el registro
        die(print_r(sqlsrv_errors(), true));
    }
}

//---------------------------------
//Modificacion de sexo
if(isset($sexo)){
    //ApellidoPaterno esta definido
    $consulta = "UPDATE usuario SET (Sexo) WHERE id = $id VALUES(?)";
    //Query
    $stmt = sqlsrv_prepare($conexion, $consulta, $sexo);

    if (sqlsrv_execute($stmt) === false) {
        //No existe el registro
        die(print_r(sqlsrv_errors(), true));
    }
}

//---------------------------------
//Modificacion de passwrd
if(isset($PassWrd)){
    //ApellidoPaterno esta definido
    $consulta = "UPDATE usuario SET (PassWrd) WHERE id = $id VALUES(?)";
    //Query
    $stmt = sqlsrv_prepare($conexion, $consulta, $PassWrd);

    if (sqlsrv_execute($stmt) === false) {
        //No existe el registro
        die(print_r(sqlsrv_errors(), true));
    }
}
//---------------------------------
*/


?>