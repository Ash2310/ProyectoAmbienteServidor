<?php
require_once './Conexion/Conexion.php';
include './Clases/ClaseProducto.php';
$Usuario = new ClaseProducto();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mantenimiento Producto</title>
    <link rel="icon" href="Imagenes/2.png">
     <!-- Bootstrap core CSS -->
     <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="Js/plugins/jquery/external/jquery/jquery.js" type="text/javascript"></script>
       <script src="Js/plugins/jquery/jquery-ui.js" type="text/javascript"></script>
       <link href="Js/plugins/jquery/jquery-ui.css" rel="stylesheet" type="text/css"/>
       <script src="Js/Scripts/Articulo.js" type="text/javascript"></script>
     <!-- Custom styles for this template -->
     <link href="CSS/carousel.css" rel="stylesheet">
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Mantenimiento Producto</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

      </nav>
    </header>

    <main role="main">

      <div class="container marketing">


        <hr class="featurette-divider">

        <div class="row featurette" id="#1">
          <div class="container" align="center">
          <h2>Lista de Articulos</h2>
 <p>Productos en el inventario:</p>
 <table class="table table-striped" >

  <?php
  $resultado = $Usuario->ListarArticulos();
  if ($resultado["valido"]) {

    echo "<tr class='table-info' >"
."<td>Codigo</td>"
."<td>marca</td>"
."<td>descripcion</td>"
."<td>precio</td>"
."<td>cantidad</td>"

."</tr>";
      foreach ($resultado["datos"] as $usuario) {
        echo "<tr>"
 ."<td>".$usuario['codigo']."</td>"
  ."<td>".$usuario['marca']."</td>"
 ."<td>".$usuario['descripcion']."</td>"
 ."<td>".$usuario['precio']."</td>"
 ."<td>".$usuario['cantidad']."</td>"

 ."</tr>";
      }
  } else {
      echo "<div><p>No  en el sistema.</p></div>";
  }
  ?>
</table>


        </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette" id="#2">
          <Center>
          <form name="frmCrearArticulo" method="POST" action="">
                <input type="text" name="Codigo" class="form-control" placeholder="Digite el codigo del articulo" value=""><br/>
                <input type="text" name="Marca" class="form-control" placeholder="Digite el nombre del Articulo" value=""><br/>
                <input type="text" name="Descripcion" class="form-control" placeholder="Digite la descripcion de articulo" value=""><br/>
                <input type="text" name="Precio" class="form-control" placeholder="Digite el precio del articulo" value=""><br/>
                <input type="text" name="Cantidad" class="form-control" placeholder="Digite la cantidad de articulos disponibles" value=""><br/>
                <input type="text" name="imagenp" class="form-control" placeholder="Digite el nombre de la imagen" value=""><br/>

                <input type="submit" name="btnCrearArticulo" value="Crear Articulo" class="btn btn-info">

            </form>
          </Center>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette" id="#3">
          <div class="form-busqueda">
          <form id="frmBuscarArticulo" name="frmBuscarArticulo" method="post" action="">
              <input class="form-control" type="text" name="codigo_busqueda" placeholder="Digite el codigo" value="">
              <input type="hidden" id="tipoForm" name="tipoForm" value="actualizar">
              <input class="btn btn-primary" type="button" id="btnBuscarArticulo" name="btnBuscarArticulo" value="Buscar Articulo">
          </form>
      </div>
      <div class="form-datos">
      </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->


      <!-- FOOTER -->
      <footer class="container">

        <p> 2017 Stephanie <a href="MenuPrincipalAdmin.php">Menu principal</a></p>
        <form name="frmLogout" method="post" action="FuncionesGenerales.php">
              <input type="hidden" name="accion" value="logout">
              <input  class="btn btn-default"type="submit" name="btnLogout" value="Cerrar Sesión">
          </form>
      </footer>

    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="https://getbootstrap.com/assets/js/vendor/holder.min.js"></script>
  </body>
</html>
