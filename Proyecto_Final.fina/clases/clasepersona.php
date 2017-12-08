<?php

Class clasepersona {
    /* ===== Atributos ====== */

    private $id;
    private $cedula;
    private $nombre;
    private $apellidos;
    private $telefono;
    private $email;
    private $usuario;
    private $contrasena;
    private $rol;

    /* ===== Constructor ====== */

    function clasepersona() {
        $this->id = "";
        $this->cedula = "";
        $this->nombre = "";
        $this->apellidos = "";
        $this->telefono = "";
        $this->email = "";
        $this->usuario = "";
        $this->contrasena = "";
        $this->rol = "";
    }

    function CreaUsuarios($datos) {
        require '../Conexion/conexion.php';

        $retorno = array();
        $sql = "INSERT INTO tbl_usuario (cedula,nombre,apellidos,telefono,email,usuario,contrasena,rol)";
        $sql .= "VALUES ('" . $datos['cedula'] . "','" . $datos['nombre'] . "','" . $datos['apellidos'];
        $sql .= "','" . $datos['telefono'] . "','" . $datos['email'] . "','". $datos['usuario'] . "','" . md5($datos['contrasena']) . "','" . $datos['rol'] . "' )";

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
        require '../conexion/conexion.php';
        $valido = "";
        $sql = "SELECT id FROM tbl_usuario WHERE email='$email'";
        $resultado = $BD->query($sql);
        if ($resultado->num_rows > 0) {
            $valido = true;
        } else {
            $valido = false;
        }
        return $valido;
    }
    //Funcion para la busqueda de un usuario
    function BuscaUsuario($email_busqueda) {
        require '../conexion/conexion.php';
        $retorno = array();
        $sql = "SELECT * FROM tbl_usuario WHERE email='$email_busqueda'";
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
        require '../conexion/conexion.php';
        $valido = "";
        $sql = "DELETE FROM tbl_usuario WHERE email='$email'";
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
        require '../conexion/conexion.php';
        $valido = "";
        $sql = "UPDATE tbl_usuario ";
        $sql .= "SET cedula='" . $datos["cedula"] . "',";
        $sql .= "nombre='" . $datos["nombre"] . "',";
        $sql .= "apellidos='" . $datos["apellidos"] . "',";
        $sql .= "telefono='" . $datos["telefono"] . "',";
        $sql .= "email='" . $datos["email"] . "',";
        $sql .= "usuario='" . $datos["usuario"] . "',";
        $sql .= "contrasena='" . $datos["contrasena"] . "',";
        $sql .= "rol='" . $datos["rol"] . "'";
        $sql .= " WHERE id=" . $datos["id_usuario"];

        $BD->query($sql);

        if ($BD->affected_rows > 0) {
            $valido = true;
        } else {
            $valido = false;
        }
        return $valido;
    }

    //Funcion que lista los usuarios del sistema
    function ListarUsuarios() {
        require '../conexion/conexion.php';
        $resultado = array();
        $sql = "SELECT cedula, nombre, apellidos,telefono, email,usuario, rol FROM tbl_usuario";
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


    function Login($datos) {
        require '../conexion/conexion.php';
        $retorno = array();
        $sql = "SELECT * FROM tbl_usuario WHERE usuario='" . $datos["usuario"] . "' AND contrasena='" . md5($datos["contrasena"]) . "'";
        $resultado = $BD->query($sql);
         if ($resultado->num_rows > 0) {
            $retorno["valido"] = true;
            session_start();
            $usuario = $resultado->fetch_assoc();
            $_SESSION["datos"] = array(
                "id" => $usuario["id"],
                "cedula" => $usuario["cedula"],
                "nombre" => $usuario["nombre"],
                "apellidos" => $usuario["apellidos"],
                "telefono" => $usuario["telefono"],
                "usuario" => $usuario["usuario"],
                "email" => $usuario["email"],
                "rol" => $usuario["rol"]
            );    
        } else {
        $retorno["valido"] = false;
        }
        return $retorno;
    }

}


