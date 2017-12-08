<?php
session_start();
$nombre = $_SESSION["datos-usuario"]["nombre"];
$rol = $_SESSION["datos-usuario"]["rol"];
?>

         <?php
        if ($_SESSION["datos-usuario"]["rol"] == "admin") {
            ?>
            <script>
    <!--
                window.location.replace('MenuPrincipalAdmin.php');
    //-->
            </script>

            <?php
        } else {
            ?>
            <script>
    <!--
                window.location.replace('MenuPrincipalCliente.php');
    //-->
            </script>
            <?php
        }
        ?>
