<?php

include './Clases/ClasePersona.php';
include './Clases/ClaseProducto.php';
include './Clases/ClaseCompra.php';
$Usuario = new ClasePersona();
$Articulo = new ClaseProducto();
$Compra = new ClaseCompra();


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
        $datos["apellidos"] = $_POST["apellidos"];
        $datos["telefono"] = $_POST["telefono"];
        $datos["email"] = $_POST["email"];
          $datos["usuario"] = $_POST["usuario"];
        $datos["contrasena"] = $_POST["contrasena"];
        $datos["rol"] = $_POST["rol"];
        $resultado = $Usuario->CreaUsuarios($datos);

        break;
    case "eliminar-usuario":
        $datos["usuario"] = $_POST["usuario"];
        $resultado = $Usuario->EliminarUsuario($datos["usuario"]);
        break;
    case "actualizar-usuario":
    $datos["cedula"] = $_POST["cedula"];
    $datos["nombre"] = $_POST["nombre"];
    $datos["apellidos"] = $_POST["apellidos"];
    $datos["telefono"] = $_POST["telefono"];
    $datos["email"] = $_POST["email"];
      $datos["usuario"] = $_POST["usuario"];
    $datos["contrasena"] = $_POST["contrasena"];
    $datos["rol"] = $_POST["rol"];
        $datos["id_usuario"] = $_POST["id_usuario"];
        $resultado = $Usuario->ActualizaUsuario($datos);

        break;
    case "login":
        $datos["usuario"] = $_POST["usuario"];
        $datos["contrasena"] = $_POST["contrasena"];
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
        $datos["cedula"] = $_POST["cedula_busqueda"];
        $resultado = $Usuario->BuscaUsuario($datos["cedula"]);
        break;
}
echo json_encode($resultado);
