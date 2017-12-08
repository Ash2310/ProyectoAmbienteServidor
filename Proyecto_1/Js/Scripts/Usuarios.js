$(function () {
//Selector por id
//$("#email").remove();
//Selector por clase
//$(".email")

    /*======== EVENTOS =========*/
    $("#btnLogin").click(function () {
        $_form = $("#frmLogin");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'FuncionesGenerales.php',
            data: $_form.serialize() + "&accion=login",
            success: function (data) {
                if (data.valido) {
                    window.location = "login.php";
                } else {
                    alert("Usuario no existe en el sistema");
                }
            }
        }); //cierre ajax
    }); //cierre evento

    $("#btnCrearUsuario").click(function () {
        $_form = $("#frmCrearUsuario");
        var valido = ValidaEmail($_form);
        if (valido) {
            alert("Ya existe un usuario con el email");
        } else {
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: 'FuncionesGenerales.php',
                data: $_form.serialize() + '&accion=crea-usuario',
                success: function (data) {
                    if (data.valido) {
                        alert("Usuario creado correctamente");
                    } else {
                        alert("Problemas al crear el usuario");
                    }
                }//success
            }); //ajax
        }//else
    }); //Crear Usuario

    $("#btnBuscaUsuario").click(function () {
        $_form = $("#frmBuscaUsuario");
        var tipoform = $("#tipoForm").val();
        var readonly;
        var accion = "";
        var btn = "";
        $("#frmDatos").remove();

        if (tipoform == "eliminar") {
            var readonly = "readonly";
            var accion = "Eliminar Usuario";
            var btn = "btnEliminarUsuario";
        } else {
            var readonly = "";
            var accion = "Actualizar Usuario";
            var btn = "btnActualizarUsuario";
        }

        if (!$("#frmDatos").length > 0) {
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: 'FuncionesGenerales.php',
                data: $_form.serialize() + '&accion=busca-usuario',
                success: function (data) {
                    if (data.valido) {
                        $_html = '<form id="frmDatos" name="frmDatos" method="post" action="">';
                        $_html += '<input class="form-control" type="text" name="cedula" placeholder="Digite su Cédula" value="' + data.datos.cedula + '"' + readonly + '><br/>';
                        $_html += '<input class="form-control" type="text" name="nombre" placeholder="Digite su Nombre" value="' + data.datos.nombre + '"' + readonly + '><br/>';
                        $_html += '<input class="form-control" type="text" name="apellidos" placeholder="Digite sus Apellidos" value="' + data.datos.apellidos + '"' + readonly + '><br/>';
                        $_html += '<input class="form-control" type="text" name="telefono" placeholder="Digite su Teléfono" value="' + data.datos.telefono + '"' + readonly + '><br/>';
                        $_html += '<input class="form-control" type="email" name="email" placeholder="Digite su Email" value="' + data.datos.email + '"' + readonly + '><br/>';
                              $_html += '<input class="form-control" type="text" name="usuario" placeholder="Digite su Usuario" value="' + data.datos.usuario + '"' + readonly + '><br/>';
                        $_html += '<input class="form-control" type="password" id="contrasena" name="contrasena" value="' + data.datos.contrasena + '"' + readonly + '><br/>';

                        $_html += '<select class="form-control" name="rol">';
                        $_html += '<option value="0">Seleccione</option>';
                        $_html += "<option value='admin' " + adminselected + ">Administrador</option>";
                        $_html += "<option value='visitante' " + visitanteselected + ">Visitante</option>";
                        $_html += '</select>';

                        var adminselected = "";
                        var visitanteselected = "";
                        if (data.datos.rol == "admin") {
                            adminselected = "selected";
                        }
                        if (data.datos.rol == "visitante") {
                            visitanteselected = "selected";
                        }
                        $_html += '<input class="btn btn-success" type="button" id="' + btn + '" name="' + btn + '" value="' + accion + '">';
                        $_html += '<input class="btn btn-primary" type="button" id="btnEliminarUsuario" name"btnEliminarUsuario"  value="Eliminar">'+'<br/>';
                        $_html += '<input type="hidden" id="id_usuario" name="id_usuario" value="' + data.datos.id + '"' + readonly + '><br/>';
                        $_html += '</form>';
                        $(".form-datos").append($_html);

                    } else {
                        alert("Usuario no encontrado");
                    }
                }
            });//ajax
        }
    });//Crear Usuario

    $(document).on("click", "#btnEliminarUsuario", function (e) {
        $_form = $("#frmDatos");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'FuncionesGenerales.php',
            data: $_form.serialize() + '&accion=eliminar-usuario',
            success: function (data) {
                if (data) {
                    alert("Usuario eliminado correctamente");
                } else {
                    alert("Problemas al eliminar el usuario");
                }
            }//success
        }); //ajax
    });

    /*======== FUNCIONES =========*/
    function ValidaEmail($_form) {
        var resultado;
        $.ajax({
            async: false,
            type: 'post',
            dataType: 'json',
            url: 'FuncionesGenerales.php',
            data: $_form.serialize() + '&accion=valida-email',
            success: function (data) {
                resultado = data.valido;
            }
        });//ajax
        return resultado;
    }//funcion validaemail

    $(document).on("click", "#btnActualizarUsuario", function (e) {
        $_form = $("#frmDatos");
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: 'FuncionesGenerales.php',
            data: $_form.serialize() + '&accion=actualizar-usuario',
            success: function (data) {
                if (data.valido) {
                    alert("Usuario actualizado correctamente");
                } else {
                    alert("Problemas al actualizar el usuario");
                }
            }//success
        }); //ajax
    });



});
