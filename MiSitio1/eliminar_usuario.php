<?php
include './ValidaAcceso.php';
include './Clases/ClaseUsuario.php';

$Usuario = new ClaseUsuario();
?>
<html>
    <head>
        <title>Eliminar Usuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="JS/plugins/jquery/external/jquery/jquery.js" type="text/javascript"></script>
        <script src="JS/plugins/jquery/jquery-ui.js" type="text/javascript"></script>    
        <link href="JS/plugins/jquery/jquery-ui.css" rel="stylesheet" type="text/css"/>        
        <script src="JS/Scripts/Usuarios.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="form-busqueda">           
            <form id="frmBuscaUsuario" name="frmBuscaUsuario" method="post" action="">
                <input type="email" name="email_busqueda" placeholder="Digite el email" value="">
                <input type="hidden" id="tipoForm" name="tipoForm" value="eliminar">                                
                <input type="button" id="btnBuscaUsuario" name="btnBuscaUsuario" value="Buscar Usuario">
            </form>
        </div>   
        <div class="form-datos"> 
        </div> 
    </body>
</html>