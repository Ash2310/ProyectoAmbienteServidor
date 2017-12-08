<?php
require_once './Conexion/Conexion.php';
include './Clases/ClaseCompra.php';
$Usuario = new ClaseCompra();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mantenimiento Compra</title>
    <link rel="icon" href="Imagenes/2.png">
     <!-- Bootstrap core CSS -->
     <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="Js/plugins/jquery/external/jquery/jquery.js" type="text/javascript"></script>
       <script src="Js/plugins/jquery/jquery-ui.js" type="text/javascript"></script>
       <link href="Js/plugins/jquery/jquery-ui.css" rel="stylesheet" type="text/css"/>
       <script src="Js/Scripts/Compra.js" type="text/javascript"></script>
     <!-- Custom styles for this template -->
     <link href="CSS/carousel.css" rel="stylesheet">
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Mantenimiento Compra</a>
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
          <h2>Resgistro de Compra</h2>
 <table class="table table-striped" >

  <?php
  $resultado = $Usuario->ListarCompras();
  if ($resultado["valido"]) {

    echo "<tr class='table-info' >"
."<td>Id_Usuario</td>"
."<td>Id_Articulo</td>"
."<td>Numero Factura</td>"
."<td>Fecha de Compra</td>"


."</tr>";
      foreach ($resultado["datos"] as $usuario) {
        echo "<tr class='table-warning'>"
 ."<td>".$usuario['id_usuario']."</td>"
  ."<td>".$usuario['id-articulo']."</td>"
 ."<td>".$usuario['num_factura']."</td>"
 ."<td>".$usuario['fecha_compra']."</td>"
 ."</tr>";
      }
  } else {
      echo "<div><p>No hay registro en la base datos</p></div>";
  }
  ?>
</table>


        </div>
        </div>


        <hr class="featurette-divider">

        <div class="row featurette" id="#3">
          <div class="form-busqueda">
          <form id="frmBuscaCompra" name="frmBuscaCompra" method="post" action="">
              <input class="form-control" type="text" name="factura_busqueda" placeholder="Digite el N° Factura" value="">
              <input class="form-control" type="hidden" id="tipoForm" name="tipoForm" value="actualizar">
              <input  class="btn btn-primary"type="button" id="btnBuscarCompra" name="btnBuscarCompra" value="Buscar Compra">
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
