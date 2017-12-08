<?php

include './Clases/ClaseUsuario.php';
$Usuario = new ClaseUsuario();

//Permite mostrar todo el contenido del POST
//var_dump($_POST);
//print_r($_POST);
//Obtener los datos del formulario
$datos = array();
$accion = $_POST["accion"];

switch ($accion) {
    case "crea-usuario":
        $datos["cedula"] = $_POST["cedula"];
        $datos["nombre"] = $_POST["nombre"];
        $datos["apellido1"] = $_POST["apellido1"];
        $datos["apellido2"] = $_POST["apellido2"];
        $datos["email"] = $_POST["email"];
        $datos["password"] = $_POST["password"];
        $datos["rol"] = $_POST["rol"];
        $resultado = $Usuario->CreaUsuarios($datos);

        break;
    case "eliminar-usuario":
        $datos["email"] = $_POST["email"];
        $resultado = $Usuario->EliminarUsuario($datos["email"]);       
        break;
    case "actualizar-usuario":
        $datos["cedula"] = $_POST["cedula"];
        $datos["nombre"] = $_POST["nombre"];
        $datos["apellido1"] = $_POST["apellido1"];
        $datos["apellido2"] = $_POST["apellido2"];
        $datos["email"] = $_POST["email"];
        $datos["password"] = $_POST["password"];
        $datos["rol"] = $_POST["rol"];
        $datos["id_usuario"] = $_POST["id_usuario"];
        $resultado = $Usuario->ActualizaUsuario($datos);
       
        break;
    case "login":
        $datos["email"] = $_POST["email"];
        $datos["password"] = $_POST["password"];
        $resultado = $Usuario->Login($datos);
        break;
    case "logout":
        session_start();
        session_destroy();
        header("Location:index.html");
        break;
    case "valida-email":
        $datos["email"] = $_POST["email"];
        $resultado = $Usuario->ValidaEmail($datos["email"]);
        break;
    case "busca-usuario":
        $datos["email"] = $_POST["email_busqueda"];
        $resultado = $Usuario->BuscaUsuario($datos["email"]);
        break;
}
echo json_encode($resultado);