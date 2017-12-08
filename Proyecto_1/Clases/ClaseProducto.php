<?php

Class ClaseProducto{
    /* ===== Atributos ====== */

    private $Idp;
    private $Codigo;
    private $Marca;
    private $Descripcion;
    private $Precio;
    private $Cantidad;
    private $imagenp;


    /* ===== Constructor ====== */

    function ClaseProductos() {
        $this->Idp = "";
        $this->Codigo = "";
        $this->Marca = "";
        $this->Descripcion = "";
        $this->Precio = "";
        $this->Cantidad = "";
        $this->imagenp ="";
    }


    function CrearArticulo($datos) {
        require './Conexion/conexion.php';

        $retorno = array();
        $sql = "INSERT INTO tbl_articulo (Codigo,Marca,Descripcion,Precio,Cantidad,imagenp)";
        $sql .= "VALUES ('" .$datos['Idp'] . "','" . $datos['Codigo'] . "','" . $datos['Marca'] . "','"  . $datos['Descripcion'] ."','" . $datos['imagenp']. "','" . $datos['Precio']."','" .$datos['Cantidad']. "' )";


        $resultado = $BD->query($sql);
        $id = $BD->insert_id;

        if ($id > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }



    function BuscaArticulo($codigo_busqueda) {
        require './Conexion/conexion.php';
        $retorno = array();
        $sql = "SELECT * FROM tbl_articulo WHERE codigo='$codigo_busqueda'";
        $resultado = $BD->query($sql);

        if ($resultado->num_rows > 0) {
            $retorno["valido"] = true;
            $retorno["datos"] = $resultado->fetch_assoc();
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }


    function EliminarArticulo($cod) {
        require './Conexion/conexion.php';
        $valido = "";
        $sql = "DELETE FROM tbl_articulo WHERE codigo='$cod'";
        $resultado = $BD->query($sql);

        if ($BD->affected_rows > 0) {
            $valido = true;
        } else {
            $valido = false;
        }
        return $valido;
    }


    function ActualizaArticulo($datos) {
        require './Conexion/conexion.php';
        $valido = "";
        $sql = "UPDATE tbl_articulo ";
        $sql .= "SET codigo='" . $datos["codigo"] . "',";
        $sql .= "marca='" . $datos["marca"] . "',";
        $sql .= "descripcion='" . $datos["descripcion"] . "',";
        $sql .= "precio='" . $datos["precio"] . "',";
        $sql .= "cantidad='" . $datos["cantidad"] . "'";
        $sql .= " WHERE id=" . $datos["id_articulo"];

        $BD->query($sql);

        if ($BD->affected_rows > 0) {
            $valido = true;
        } else {
            $valido = false;
        }
        return $valido;
    }


    function ListarArticulos() {
        require './Conexion/conexion.php';
        $resultado = array();
        $sql = "SELECT codigo,marca,descripcion,precio,cantidad FROM tbl_articulo";
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



}
?>
