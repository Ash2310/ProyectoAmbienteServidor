<?php
//include("function/session.php");
require "conexion/conexion.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Carrito</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel = "stylesheet" type = "text/css" href="css/style.css" media="all">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/carousel.js"></script>
        <script src="js/button.js"></script>
        <script src="js/dropdown.js"></script>
        <script src="js/tab.js"></script>
        <script src="js/tooltip.js"></script>
        <script src="js/popover.js"></script>
        <script src="js/collapse.js"></script>
        <script src="js/modal.js"></script>
        <script src="js/scrollspy.js"></script>
        <script src="js/alert.js"></script>
        <script src="js/transition.js"></script>

    </head>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="menuprincipaladmin.php">Menu Principal</a>
            </div>
            <div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Catalogo</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <body>


        <br>
        <div id="container">

        </div>

        <form method="post" class="well" style="background-color:#fff;">
            <table class="table">
                <label style="font-size:25px;">Carrito</label>
                <tr>
                    <th><h3>Imagen</h3></td>
                    <th><h3>Nombre</h3></th>
                    <th><h3>Descripcion</h3></th>
                    <th><h3>Cantidad</h3></th>
                    <th><h3>Codigo</h3></th>
                    <th><h3>Precio</h3></th>
                    <th><h3>Agregar</h3></th>
                    <th><h3>Remover</h3></th>
                    <th><h3>Subtotal</h3></th>
                </tr>

                <?php
                if (isset($_GET['id']))
                    $id = $_GET['id'];
                else
                    $id = 1;
                if (isset($_GET['action']))
                    $action = $_GET['action'];
                else
                    $action = "empty";

                switch ($action) {

                    case "view":
                        if (isset($_SESSION['cart'][$id]))
                            $_SESSION['cart'][$id];
                        break;
                    case "add":
                        if (isset($_SESSION['cart'][$id]))
                            $_SESSION['cart'][$id] ++;
                        else
                            $_SESSION['cart'][$id] = 1;
                        break;
                    case "remove":
                        if (isset($_SESSION['cart'][$id])) {
                            $_SESSION['cart'][$id] --;
                            if ($_SESSION['cart'][$id] == 0)
                                unset($_SESSION['cart'][$id]);
                        }
                        break;
                    case "empty":
                        unset($_SESSION['carrito']);
                        break;
                }
                if (isset($_SESSION['cart'])) {

                    $total = 0;
                    foreach ($_SESSION['cart'] as $id => $x) {
                        $result = $BD->query("Select * from tbl_articulo where Idp=$id");
                        $myrow = $result->fetch_array();
                        $nombre = $myrow['Marca'];
                        $nombre = substr($nombre, 0, 40);
                        $desc = $myrow ['Descripcion'];
                        $precio = $myrow['Precio'];
                        $image = $myrow['imagenp'];
                        $codigo = $myrow ['Codigo'];
                        $line_cost = $precio * $x;
                        $total = $total + $line_cost;


                        echo "<tr class='table'>";
                        echo "<td><h4><img height='70px' width='70px' src='photo/" . $image . "'></h4></td>";
                        echo "<td><h4><input type='hidden' required value='" . $id . "' name='id[]'> " . $nombre . "</h4></td>";
                        echo "<td><h4><input type='hidden' required value='" . $id . "' name='pid[]'> " . $desc . "</h4></td>";
                        echo "<td><h4><input type='hidden' required value='" . $x . "' name='qty[]'> " . $x . "</h4></td>";
                        echo "<td><h4><input type='hidden' required value='" . $id . "' name='pid[]'> " . $codigo . "</h4></td>";
                        echo "<td><h4>" . $precio . "</h4></td>";
                        echo "<td><h4><a href='carrito.php?id=" . $id . "&action=add'><i class='icon-plus-sign'></i></a></td>";
                        echo "<td><h4><a href='carrito.php?id=" . $id . "&action=remove'><i class='icon-minus-sign'></i></a></td>";
                        echo "<td><strong><h3>₡ " . $line_cost . "</h3></strong>";
                        echo "</tr>";
                    }

                    echo"<tr>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td><h2>TOTAL:</h2></td>";
                    echo "<td><strong><input type='hidden' value='" . $total . "' required name='total'><h2 class='text-danger'> ₡" . $total . "</h2></strong></td>";
                    echo "<td></td>";
                    echo "<td><a class='btn btn-danger btn-sm pull-right' href='carrito.php?id=" . $id . "&action=empty'><i class='fa fa-trash-o'></i> Empty cart</a></td>";
                    echo "</tr>";
                } else
                    echo "<font color='#111' class='alert alert-error' style='float:right'>Cart is empty</font>";
                ?>
            </table>


            <br />	
        </div>
        <br />

</body>
</html>