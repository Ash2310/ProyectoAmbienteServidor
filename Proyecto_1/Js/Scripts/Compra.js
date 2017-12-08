$(function () {
//Selector por id
//$("#email").remove();
//Selector por clase
//$(".email")



    $("#btnBuscarCompra").click(function () {
        $_form = $("#frmBuscarUsuario");
        var tipoform = $("#tipoForm").val();
        var readonly;
        var accion = "";
        var btn = "";
        $("#frmDatos").remove();

        if (tipoform == "eliminar") {
            var readonly = "readonly";
            var accion = "Eliminar Compra";
            var btn = "btnEliminarCompra";
        } else {
            var readonly = "";
            var accion = "Actualizar Compra";
            var btn = "btnActualizarCompra";
        }

        if (!$("#frmDatos").length > 0) {
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: 'FuncionesGenerales.php',
                data: $_form.serialize() + '&accion=busca-compra',
                success: function (data) {
                    if (data.valido) {
                        $_html = '<form id="frmDatos" name="frmDatos" method="post" action="">';
                        $_html += '<input class="form-control" type="text" name="id_usuario" placeholder="Digite id usuario" value="' + data.datos.id_usuario + '"' + readonly + '><br/>';
                        $_html += '<input class="form-control" type="text" name="id_articulo"placeholder="Digite id articulo"  value="' + data.datos.id_articulo + '"' + readonly + '><br/>';
                        $_html += '<input class="form-control" type="text" name="num_factura" placeholder="Digite sus N° factura" value="' + data.datos.num_factura + '"' + readonly + '><br/>';
                        $_html += '<input class="form-control" type="text" name="fecha_compra" placeholder="Digite fecha de compra" value="' + data.datos.fecha_compra+ '"' + readonly + '><br/>';

                        $_html += '<input class="btn btn-success" type="button" id="' + btn + '" name="' + btn + '" value="' + accion + '">';
                        $_html += '<input class="btn btn-primary" type="button" id="btnEliminarCompra" name"btnEliminarCompra"  value="Eliminar">'+'<br/>';
                        $_html += '<input type="hidden" id="id_compra" name="id_compra" value="' + data.datos.id + '"' + readonly + '><br/>';
                        $_html += '</form>';
                        $(".form-datos").append($_html);

                    } else {
                        alert("compra no encontrado");
                    }
                }
            });//ajax
        }
    });//Crear Usuario

    $(document).on("click", "#btnEliminarCompra", function (e) {
        $_form = $("#frmDatos");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'FuncionesGenerales.php',
            data: $_form.serialize() + '&accion=eliminar-compra',
            success: function (data) {
                if (data) {
                    alert("La compra fue eliminado correctamente");
                } else {
                    alert("Problemas al eliminar la compra");
                }
            }//success
        }); //ajax
    });



    $(document).on("click", "#btnActualizarCompra", function (e) {
        $_form = $("#frmDatos");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'FuncionesGenerales.php',
            data: $_form.serialize() + '&accion=actualizar-compra',
            success: function (data) {
                if (data.valido) {
                    alert("La compra actualizado correctamente");
                } else {
                    alert("Problemas al actualizar la compra");
                }
            }//success
        }); //ajax
    });



});
