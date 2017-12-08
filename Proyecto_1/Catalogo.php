
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Catalogo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel = "stylesheet" type = "text/css" href="css/style.css" media="all">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>

            #container {
                margin: auto;
                width: 1200px;
            }
        </style>
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="50" >

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="MenuPrincipalCliente.php">Menu Principal</a>
                </div>
                <div>
                    <div class="collapse navbar-collapse" id="myNavbar">

                    </div>
                </div>
            </div>
        </nav>

        <div id="container">

            <br>
            <br>
            <br>
            <br>

            <div class="nav1">
                <h2 align="center">Productos</h2>

            </div>

            <div id="content">
                <br />
                <br />
                <div id="product">

                    <?php
                    require 'conexion/conexion.php';

                    $query = $BD->query("SELECT * FROM tbl_articulo ORDER BY idp ") or die(mysqli_error());

                    while ($fetch = $query->fetch_array()) {
                        //print_r($fetch);
                        $idp = $fetch['Idp'];

                        $query1 = $BD->query("SELECT * FROM tbl_articulo WHERE Idp ='$idp'") or die(mysqli_error());
//                        $rows = $query1->fetch_array();
//
//                        //print_r(rows);
//                        $qty = $rows['qty'];
//                        if ($qty <= 5) {
//
//                        } else {
                        echo "<div class='float'>";
                        echo "<center>";
                        echo "<br />";
                        echo "<a href='detalles1.php?id=" . $fetch['Idp'] . "'><img class='img-polaroid' src='photo/" . $fetch['imagenp'] . "' height = '300px' width = '300px'></a>";
                        echo "<h4 class='text-info' style='color:black; position:absolute; margin-top:-90px; text-indent:15px;'> Cantidad: " . $fetch['Cantidad'] . "</h4>";
                        echo "<br />";
                        echo "" . $fetch['Descripcion'] . "";
                        echo "<br />";
                        echo "  Precio ₡" . $fetch['Precio'] . "";
                        echo "<br />";

                        echo "</center>";
                        echo "</div>";
//                        }
                    }
                    ?>
                </div>
            </div>


            <footer class="container">

              <p> 2017 Stephanie <a href="MenuPrincipalCliente.php">Menu principal</a></p>
              <form name="frmLogout" method="post" action="FuncionesGenerales.php">
                    <input type="hidden" name="accion" value="logout">
                    <input  class="btn btn-default"type="submit" name="btnLogout" value="Cerrar Sesión">
                </form>
            </footer>
    </body>
</html>
