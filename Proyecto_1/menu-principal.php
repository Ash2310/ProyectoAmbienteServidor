 nnnnnnn   <?php
session_start();
$nombre = $_SESSION["datos-usuario"]["nombre"];
$rol = $_SESSION["datos-usuario"]["rol"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Menú Principal</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <form name="frmLogout" method="post" action="procesa_usuarios.php"> 
                <input type="hidden" name="accion" value="logout">
                <input type="submit" name="btnLogout" value="Cerrar Sesión"> 
            </form>
        </div>
        <div>
            <p>BIENVENIDO A NUESTRO SISTEMA</p>
            <p>Usuario:<?php echo $nombre ?></p>
            <p>Rol:<?php echo $rol ?></p>            
        </div>
        <?php
        if ($_SESSION["datos-usuario"]["rol"] == "admin") {
            ?>
            <div>
                <a href="mant_usuarios.php">Mantenimiento Usuarios</a><br/>
                <a href="mant_articulos.php">Mantenimiento Articulos</a>
            </div>
            <?php
        } else {
            ?>
            <div>
                <a href="miperfil.php">Mi Perfil</a>
            </div>
            <?php
        }
        ?>
    </body>
</html>
