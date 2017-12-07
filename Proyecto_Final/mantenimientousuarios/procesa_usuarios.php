<?php
ob_start();
?>

<?php
include '../clases/clasepersona.php';
$Usuario = new clasepersona();

$datos = array();
$accion = $_POST["accion"];

switch ($accion) {
    case "CreaUsuarios":
        $datos["cedula"] = $_POST["cedula"];
        $datos["nombre"] = $_POST["nombre"];
        $datos["apellidos"] = $_POST["apellidos"];
        $datos["telefono"] = $_POST["telefono"];
        $datos["email"] = $_POST["email"];
        $datos["usuario"] = $_POST["usuario"];
        $datos["contrasena"] = $_POST["contrasena"];
        $datos["rol"] = $_POST["rol"];

        $valido = $Usuario->ValidaEmail($datos["email"]);
        if ($valido) {
            echo "Ya existe un usuario con ese email!!";
        } else {
            $resultado = $Usuario->CreaUsuarios($datos);

            if ($resultado["valido"]) {
                echo "Usuario insertado correctamente!!";
            } else {
                echo "Problemas al insertar el usuario!!";
            }
        }
        break;
    case "eliminar-usuario":
        $datos["email"] = $_POST["email"];
        $resultado = $Usuario->EliminarUsuario($datos["email"]);
        if ($resultado) {
            echo "Usuario eliminado correctamente!!";
        } else {
            echo "Problemas al eliminar el usuario!!";
        }

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

        if ($resultado) {
            echo "Usuario actualizado correctamente.";
        } else {
            echo "Problemas al actualizar usuario.";
        }
        break;
    case "login":
        $datos["usuario"] = $_POST["usuario"];
        $datos["contrasena"] = $_POST["contrasena"];
        $resultado = $Usuario->Login($datos);
         if($resultado["valido"]){
             header("Location:../menuprincipaladmin.php");
         }else{
            echo "Usuario no existe en el sistema" ;
            echo $resultado["valido"];
            echo "<br/><a href='../index.html'>Volver</a>";
         }
        break;
}
?>
<?php
ob_end_flush();
?>