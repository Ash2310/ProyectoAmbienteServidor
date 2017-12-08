<?php
//Variables para realizar la conexión
$hostname= "localhost";
$database= "dbproyecto";
$username= "root";
$contrasena= "";

$BD = new mysqli($hostname,$username,$contrasena,$database);

if($BD->connect_error){
    $error_conexion = "Falló la conexión (". $BD->connect_errno.")";
}else{
    $error_conexion = false;
}
?>
