<?php

Class ClaseCompra {
    /* ===== Atributos ====== */

    private $id;
      private $id_usuario;
      private $id_articulo;
      private $num_factura;
      private $fecha_compra;

    /* ===== Constructor ====== */

    function ClaseCompras() {
        $this->id = "";
        $this->id_usuario = "";
        $this->id_articulo = "";
        $this->num_factura = "";
        $this->fecha_compra = "";

    }


    function CrearCompra($datos) {
        require './Conexion/conexion.php';

        $retorno = array();
        $sql = "INSERT INTO tbl_compra(id_usuario,id_articulo,num_factura,fecha_compra)";
        $sql .= "VALUES ('" . $datos['id_usuario'] . "','" . $datos['id_articulo'] . "','" . $datos['num_factura'];
        $sql .= "','" . $datos['fecha_compra'] . "' )";

        $resultado = $BD->query($sql);
        $id = $BD->insert_id;

        if ($id > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }


    //Funcion para la busqueda de un usuario
    function BuscaCompra($factu_busqueda) {
        require './Conexion/conexion.php';
        $retorno = array();
        $sql = "SELECT * FROM tbl_compra WHERE num_factura='$factu_busqueda'";
        $resultado = $BD->query($sql);

        if ($resultado->num_rows > 0) {
            $retorno["valido"] = true;
            $retorno["datos"] = $resultado->fetch_assoc();
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }


    //Funcion que lista los usuarios del sistema
    function ListarCompras() {
        require './Conexion/conexion.php';
        $resultado = array();
        $sql = "SELECT id_usuario,id_articulo,num_factura,fecha_compra FROM tbl_compra";
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
    function EliminarCompra($factura_busqueda) {
        require './Conexion/conexion.php';
        $valido = "";
        $sql = "DELETE FROM tbl_compra WHERE num_factura='$factura_busqueda'";
        $resultado = $BD->query($sql);

        if ($BD->affected_rows > 0) {
            $valido = true;
        } else {
            $valido = false;
        }
        return $valido;
    }

        function ActualizarCompra($datos) {
            require './Conexion/conexion.php';
            $valido = "";
            $sql = "UPDATE tbl_compra ";
            $sql .= "SET id_usuario='" . $datos["id_usuario"] . "',";
            $sql .= "id_articulo='" . $datos["id_articulo"] . "',";
            $sql .= "num_factura='" . $datos["num_factura"] . "',";
            $sql .= "fecha_compra='" . $datos["fecha_compra"] . "',";
            $sql .= " WHERE id=" . $datos["id_compra"];
    
            $BD->query($sql);

            if ($BD->affected_rows > 0) {
                $valido = true;
            } else {
                $valido = false;
            }
            return $valido;
        }

}

?>
