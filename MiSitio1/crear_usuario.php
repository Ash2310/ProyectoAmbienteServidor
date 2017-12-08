<?php
include './ValidaAcceso.php';
?> 
<html>
    <head>
        <title>Crear Usuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="JS/plugins/jquery/external/jquery/jquery.js" type="text/javascript"></script>
        <script src="JS/plugins/jquery/jquery-ui.js" type="text/javascript"></script>    
        <link href="JS/plugins/jquery/jquery-ui.css" rel="stylesheet" type="text/css"/>        
        <script src="JS/Scripts/Usuarios.js" type="text/javascript"></script>
    </head>
    <body>
        <div>
            <form id="frmCrearUsuario" name="frmCrearUsuario" method="POST" action="">
                <input type="text" name="cedula" placeholder="Digite su cédula" value=""><br/>
                <input type="text" name="nombre" placeholder="Digite su nombre" value=""><br/>
                <input type="text" name="apellido1" placeholder="Digite su primer apellido" value=""><br/>
                <input type="text" name="apellido2" placeholder="Digite su segundo apellido" value=""><br/>
                <input type="email" name="email" placeholder="Digite su email" value=""><br/>
                <input type="password" name="password" placeholder="Digite su contraseña" value=""><br/>
                <select name="rol">
                    <option value="0">Seleccione</option>
                    <option value="admin">Administrador</option>
                    <option value="visitante">Visitante</option>                    
                </select>       
                <input type="button" id="btnCrearUsuario" name="btnCrearUsuario" value="Crear Usuario">                                               
            </form>
        </div>
    </body>
</html>