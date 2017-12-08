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
                    window.location = "menu-principal.php";
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
                        $_html += '<input type="text" name="cedula" placeholder="Digite su cédula" value="' + data.datos.cedula + '"' + readonly + '><br/>';
                        $_html += '<input type="text" name="nombre" placeholder="Digite su nombre" value="' + data.datos.nombre + '"' + readonly + '><br/>';
                        $_html += '<input type="text" name="apellido1" placeholder="Digite su primer apellido" value="' + data.datos.apellido1 + '"' + readonly + '><br/>';
                        $_html += '<input type="text" name="apellido2" placeholder="Digite su segundo apellido" value="' + data.datos.apellido2 + '"' + readonly + '><br/>';
                        $_html += '<input type="email" name="email" placeholder="Digite su email" value="' + data.datos.email + '"' + readonly + '><br/>';
                        $_html += '<input type="password" id="password" name="password" value="' + data.datos.password + '"' + readonly + '><br/>';
                        $_html += '<input type="button" id="' + btn + '" name="' + btn + '" value="' + accion + '">';
                        var adminselected = "";
                        var visitanteselected = "";
                        if (data.datos.rol == "admin") {
                            adminselected = "selected";
                        }
                        if (data.datos.rol == "visitante") {
                            visitanteselected = "selected";
                        }
                        $_html += '<select name="rol">';
                        $_html += '<option value="0">Seleccione</option>';
                        $_html += "<option value='admin' " + adminselected + ">Administrador</option>";
                        $_html += "<option value='visitante' " + visitanteselected + ">Visitante</option>";
                        $_html += '</select>';
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
            url: 'procesa_usuarios.php',
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
            url: 'procesa_usuarios.php',
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
            url: 'procesa_usuarios.php',
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
