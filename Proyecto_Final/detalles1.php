<?php
require 'conexion/conexion.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Detalles</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel = "stylesheet" type = "text/css" href="css/style.css" media="all">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery-1.7.2.min.js"></script>
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

        <div id="container">

        </div>
        <?php
        require 'conexion/conexion.php';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = $BD->query("SELECT * FROM tbl_articulo WHERE Idp = '$id' ");
            $row = $query->fetch_array();
            ?>
            <div>
                <center>
                    <br>
                    <br>
                    <img class="img-polaroid" style="width:400px; height:370px;" src="photo/<?php echo $row['imagenp']; ?>">
                    <div style="; align-content:center; 
                         background-color:orangered; 
                         max-width:65%;
                         height:190px;
                         ">
                        <h2 class="text-uppercase bg-primary" style="background-color: #810038"><?php echo $row['Descripcion'] ?></h2>
                        <h3 class="text-uppercase">Precio: ₡<?php echo $row['Precio'] ?></h3>
                        <h3 class="text-uppercase">Cantidad Disponible: <?php echo $row['Cantidad'] ?></h3>
                        <?php echo "<a href='carrito.php?id=" . $id . "&action=add'><input type='submit' class='btn btn-inverse' name='add' value='Agregar al carrito'></a> &nbsp;  <a href='catalogoa.php'><button class='btn btn-inverse'>Regresar</button></a> " ?>
                        </center>
                    </div>
                <?php } ?>

        </div>
    </div>
</body>
</html>