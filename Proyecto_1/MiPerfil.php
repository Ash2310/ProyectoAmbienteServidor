<?php
require_once './Conexion/Conexion.php';
include './Clases/ClasePersona.php';

include './ValidarAcceso.php';
$Usuario = new ClasePersona();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mantenimiento Usuarios</title>
    <link rel="icon" href="Imagenes/2.png">
    <script src="Js/Scripts/Usuarios.js" type="text/javascript"></script>
     <!-- Bootstrap core CSS -->
     <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="Js/plugins/jquery/external/jquery/jquery.js" type="text/javascript"></script>
       <script src="Js/plugins/jquery/jquery-ui.js" type="text/javascript"></script>
       <link href="Js/plugins/jquery/jquery-ui.css" rel="stylesheet" type="text/css"/>
       <script src="Js/Scripts/Usuarios.js" type="text/javascript"></script>
     <!-- Custom styles for this template -->
     <link href="CSS/carousel.css" rel="stylesheet">
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Mi Perfil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">

        </div>
      </nav>
    </header>

    <main role="main">

      <div class="container marketing">

        <div class="row featurette">

      <Center>
<img src="Imagenes/s.png" alt="">

            <h4><span class="text-muted"> Nombre:</span> <?php if (isset($_SESSION['datos-usuario'])) echo $_SESSION['datos-usuario']['nombre']; ?></h4>
            <h4><span class="text-muted"> Apellidos:</span> <?php if (isset($_SESSION['datos-usuario'])) echo $_SESSION['datos-usuario']['apellidos']; ?></h4>
            <h4><span class="text-muted"> Teléfono:</span> <?php if (isset($_SESSION['datos-usuario'])) echo $_SESSION['datos-usuario']['telefono']; ?></h4>
            <h4><span class="text-muted"> Email:</span> <?php if (isset($_SESSION['datos-usuario'])) echo $_SESSION['datos-usuario']['email']; ?></h4>
            <h4><span class="text-muted"> Rol:</span>  <?php if (isset($_SESSION['datos-usuario'])) echo $_SESSION['datos-usuario']['rol']; ?></h4>

    </Center>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->


      <!-- FOOTER -->
      <footer class="container">

        <p> 2017 Stephanie <a href="MenuPrincipalCliente.php">Menu principal</a></p>
        <form name="frmLogout" method="post" action="FuncionesGenerales.php">
              <input type="hidden" name="accion" value="logout">
              <input  class="btn btn-default"type="submit" name="btnLogout" value="Cerrar Sesión">
          </form>
      </footer>

    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="https://getbootstrap.com/assets/js/vendor/holder.min.js"></script>
  </body>
</html>
