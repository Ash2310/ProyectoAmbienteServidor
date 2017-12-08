<?php
include './ValidaAcceso.php';   
include './Clases/ClaseUsuario.php';

$Usuario = new ClaseUsuario();
?>
<html>
    <head>
        <title>Listar Usuarios</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>        
        <div>
            <?php
            $resultado = $Usuario->ListarUsuarios();
            if ($resultado["valido"]) {
                foreach ($resultado["datos"] as $usuario) {
                    echo "<br><strong>Cedula:</strong>" . $usuario["cedula"];
                    echo "<br><strong>Nombre:</strong>" . $usuario["nombre"] . " " . $usuario["apellido1"] . " " . $usuario["apellido2"];
                    echo "<br><strong>Email:</strong>" . $usuario["email"];
                    echo "<br><strong>Rol:</strong>" . $usuario["rol"];
                    echo "<br>===============================================<br>";
                }
            } else {
                echo "<div><p>No existen usuarios en el sistema.</p></div>";
            }
            ?>

        </div>
    </body>
</html>