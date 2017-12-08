<?php
//Variables para realizar la conexión
$hostname= "localhost";
$database= "bd_misitio";
$username= "root";
$contrasenia= "";

$BD = new mysqli($hostname,$username,$contrasenia,$database);

if($BD->connect_error){
    $error_conexion = "Falló la conexión (". $BD->connect_errno.")";  
}else{
    $error_conexion = false;
}
?>