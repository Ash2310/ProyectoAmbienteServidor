<?php

Class ClaseUsuario {
    /* ===== Atributos ====== */

    private $id;
    private $cedula;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $email;
    private $password;
    private $rol;

    /* ===== Constructor ====== */

    function ClaseUsuario() {
        $this->id = "";
        $this->cedula = "";
        $this->nombre = "";
        $this->apellido1 = "";
        $this->apellido2 = "";
        $this->email = "";
        $this->password = "";
        $this->rol = "";
    }

    /* ===== Set Get ====== */

    /* ===== Metodos ====== */

    //Funcion crea usuarios
    function CreaUsuarios($datos) {
        require './Conexion/conexionbd.php';

        $retorno = array();
        $sql = "INSERT INTO tbl_usuarios (cedula,nombre,apellido1,apellido2,email,password,rol)";
        $sql .= "VALUES ('" . $datos['cedula'] . "','" . $datos['nombre'] . "','" . $datos['apellido1'];
        $sql .= "','" . $datos['apellido2'] . "','" . $datos['email'] . "','" . md5($datos['password']) . "','" . $datos['rol'] . "' )";

        $resultado = $BD->query($sql);
        $id = $BD->insert_id;

        if ($id > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    //Funcion Valida email
    function ValidaEmail($email) {
        require './Conexion/conexionbd.php';
        $valido = "";
        $sql = "SELECT id FROM tbl_usuarios WHERE email='$email'";
        $resultado = $BD->query($sql);

        if ($resultado->num_rows > 0) {
            $valido["valido"] = true;
        } else {
            $valido["valido"] = false;
        }
        return $valido;
    }

    //Funcion para la busqueda de un usuario
    function BuscaUsuario($email_busqueda) {
        require './Conexion/conexionbd.php';
        $retorno = array();
        $sql = "SELECT * FROM tbl_usuarios WHERE email='$email_busqueda'";
        $resultado = $BD->query($sql);

        if ($resultado->num_rows > 0) {
            $retorno["valido"] = true;
            $retorno["datos"] = $resultado->fetch_assoc();
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    //Eliminar Usuario
    function EliminarUsuario($email) {
        require './Conexion/conexionbd.php';
        $valido = "";
        $sql = "DELETE FROM tbl_usuarios WHERE email='$email'";
        $resultado = $BD->query($sql);

        if ($BD->affected_rows > 0) {
            $valido = true;
        } else {
            $valido = false;
        }
        return $valido;
    }

    //Actualizar Usuarios
    function ActualizaUsuario($datos) {
        require './Conexion/conexionbd.php';
        $valido = array();
        $sql = "UPDATE tbl_usuarios ";
        $sql .= "SET cedula='" . $datos["cedula"] . "',";
        $sql .= "nombre='" . $datos["nombre"] . "',";
        $sql .= "apellido1='" . $datos["apellido1"] . "',";
        $sql .= "apellido2='" . $datos["apellido2"] . "',";
        $sql .= "email='" . $datos["email"] . "',";
        $sql .= "password='" . $datos["password"] . "',";
        $sql .= "rol='" . $datos["rol"] . "'";
        $sql .= " WHERE id=" . $datos["id_usuario"];

        $BD->query($sql);

        if ($BD->affected_rows > 0) {
            $valido["valido"] = true;
        } else {
            $valido["valido"] = false;
        }
        return $valido;
    }

    //Funcion que lista los usuarios del sistema
    function ListarUsuarios() {
        require './Conexion/conexionbd.php';
        $resultado = array();
        $sql = "SELECT cedula, nombre, apellido1, apellido2, email, rol FROM tbl_usuarios";
        $retorno = $BD->query($sql);

        if ($retorno->num_rows > 0) {
            $usuarios = array();
            while ($registro = $retorno->fetch_assoc()) {
                array_push($usuarios, $registro);
            }
            $resultado["valido"] = true;
            $resultado["datos"] = $usuarios;
        } else {
            $resultado["valido"] = false;
        }
        return $resultado;
    }

    //Metodo Login
    function Login($datos) {
        require './Conexion/conexionbd.php';
        $retorno = array();
        $sql = "SELECT * FROM tbl_usuarios WHERE email='" . $datos["email"] . "' AND password='" . md5($datos["password"]) . "'";
        $resultado = $BD->query($sql);
        if ($resultado->num_rows > 0) {
            $retorno["valido"] = true;
            session_start();
            $usuario = $resultado->fetch_assoc();
            $_SESSION["datos-usuario"] = array(
                "id" => $usuario["id"],
                "cedula" => $usuario["cedula"],
                "nombre" => $usuario["nombre"],
                "apellido1" => $usuario["apellido1"],
                "apellido2" => $usuario["apellido2"],
                "email" => $usuario["email"],
                "rol" => $usuario["rol"]
            );
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

}

?>
