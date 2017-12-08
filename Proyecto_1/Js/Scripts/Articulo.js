$(function () {
//Selector por id
//$("#email").remove();
//Selector por clase
//$(".email")

    /*======== EVENTOS =========*/

    $("#btnCrearArticulo").click(function () {
        $_form = $("#frmCrearArticulo");

            $.ajax({
                type: 'post',
                dataType: 'json',
                url: 'FuncionesGenerales.php',
                data: $_form.serialize() + '&accion=crear-articulo',
                success: function (data) {
                    if (data.valido) {
                        alert("El articulo creado correctamente");
                    } else {
                        alert("Problemas al crear el articulo");
                    }
                }//success
            }); //ajax
        }//else
    }); //Crear Usuario

    $("#btnBuscarArticulo").click(function () {
        $_form = $("#frmBuscarArticulo");
        var tipoform = $("#tipoForm").val();
        var readonly;
        var accion = "";
        var btn = "";
        $("#frmDatos").remove();

        if (tipoform == "eliminar") {
            var readonly = "readonly";
            var accion = "Eliminar Articulo";
            var btn = "btnEliminarArticulo";
        } else {
            var readonly = "";
            var accion = "Actualizar Articulo";
            var btn = "btnActualizarArticulo";
        }

        if (!$("#frmDatos").length > 0) {
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: 'FuncionesGenerales.php',
                data: $_form.serialize() + '&accion=busca-articulo',
                success: function (data) {
                    if (data.valido) {
                        $_html = '<form id="frmDatos" name="frmDatos" method="post" action="">';
                        $_html += '<input class="form-control" type="text" name="Codigo" placeholder="Digite Código" value="' + data.datos.Codigo + '"' + readonly + '><br/>';
                        $_html += '<input class="form-control" type="text" name="Marca" placeholder="Digite la Marca" value="' + data.datos.Marca + '"' + readonly + '><br/>';
                        $_html += '<input class="form-control" type="text" name="Descripcion" placeholder="Digite la Descripcion" value="' + data.datos.Descripcion + '"' + readonly + '><br/>';
                        $_html += '<input class="form-control" type="text" name="Precio" placeholder="Digite su Teléfono" value="' + data.datos.Precio + '"' + readonly + '><br/>';
                        $_html += '<input class="form-control" type="email" name="Cantidad" placeholder="Digite su Email" value="' + data.datos.Cantidad + '"' + readonly + '><br/>';
                              $_html += '<input class="form-control" type="text" name="imagenp" placeholder="Digite su Usuario" value="' + data.datos.imagenp + '"' + readonly + '><br/>';

                        $_html += '<input class="btn btn-success" type="button" id="' + btn + '" name="' + btn + '" value="' + accion + '">';
                        $_html += '<input class="btn btn-primary" type="button" id="btnEliminarArticulo" name"btnEliminarArticulo"  value="Eliminar">'+'<br/>';
                        $_html += '<input type="hidden" id="id_articulo" name="id_articulo" value="' + data.datos.Idp + '"' + readonly + '><br/>';
                        $_html += '</form>';
                        $(".form-datos").append($_html);

                    } else {
                        alert("articulo no encontrado");
                    }
                }
            });//ajax
        }
    });//Crear Usuario

    $(document).on("click", "#btnEliminarArticulo", function (e) {
        $_form = $("#frmDatos");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'FuncionesGenerales.php',
            data: $_form.serialize() + '&accion=eliminar-articulo',
            success: function (data) {
                if (data) {
                    alert("articulo eliminado correctamente");
                } else {
                    alert("Problemas al eliminar el articulo");
                }
            }//success
        }); //ajax
    });



    $(document).on("click", "#btnActualizarArticulo", function (e) {
        $_form = $("#frmDatos");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'FuncionesGenerales.php',
            data: $_form.serialize() + '&accion=actualizar-articulo',
            success: function (data) {
                if (data.valido) {
                    alert("articulo actualizado correctamente");
                } else {
                    alert("Problemas al actualizar el articulo");
                }
            }//success
        }); //ajax
    });



});
