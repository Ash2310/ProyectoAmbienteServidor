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
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#1">Lista Articulos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#2">Crear Articulo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#3">Modificación</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">

            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerra Sesión</button>
          </form>
        </div>
      </nav>
    </header>

    <main role="main">

      <div class="container marketing">


        <hr class="featurette-divider">

        <div class="row featurette" id="#1">
          <div class="container" align="center">
          <h2>Lista de Articulos</h2>
 <p>Productos en el inventario:</p>
 <table class="table table-dark table-hover" >

  <?php
  $resultado = $Usuario->ListarArticulos();
  if ($resultado["valido"]) {

    echo "<tr class='table-danger' >"
."<td>Codigo</td>"
."<td>marca</td>"
."<td>descripcion</td>"
."<td>precio</td>"
."<td>cantidad</td>"

."</tr>";
      foreach ($resultado["datos"] as $usuario) {
        echo "<tr class='table-warning'>"
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
          <form name="frmCreararticulo" method="POST" action="ProcesaArticulo.php">
                <input type="text" name="id" class="form-control" placeholder="Digite el id del articulo" value=""><br/>
                <input type="text" name="nombre" class="form-control" placeholder="Digite el nombre del Articulo" value=""><br/>
                <input type="text" name="descripcion" class="form-control" placeholder="Digite la descripcion de articulo" value=""><br/>
                <input type="text" name="precio" class="form-control" placeholder="Digite el precio del articulo" value=""><br/>
                <select name="categoria" class="form-control">
                    <option value="0">Seleccione</option>

                    <option value="Plata">Plata</option>
                      <option value="Oro">Oro</option>
                        <option value="Acero">Acero</option>
                </select>
                      <input type="hidden" name="accion" value="crear-articulo">
                <input type="submit" name="btnCrearArticulo" value="Crear Articulo" class="btn btn-info">

            </form>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette" id="#3">
          <div class="form-busqueda">
          <form id="frmBuscaUsuario" name="frmBuscaUsuario" method="post" action="">
              <input type="email" name="email_busqueda" placeholder="Digite el email" value="">
              <input type="hidden" id="tipoForm" name="tipoForm" value="actualizar">
              <input type="button" id="btnBuscaUsuario" name="btnBuscaUsuario" value="Buscar Usuario">
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
