
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>Registrar</title>
<link rel="icon" href="Imagenes/2.png">
<script src="Js/plugins/jquery/external/jquery/jquery.js" type="text/javascript"></script>
        <script src="Js/plugins/jquery/jquery-ui.js" type="text/javascript"></script>
        <link href="Js/plugins/jquery/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="Js/Scripts/Usuarios.js" type="text/javascript"></script>

 <!-- Bootstrap core CSS -->
 <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

 <!-- Custom styles for this template -->
 <link href="CSS/carousel.css" rel="stylesheet">
</head>
  <body>

      <header>
        <nav  id="menu"class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

          <img class="rounded-circle" src="Imagenes/1.png" alt="Generic placeholder image" width="40" height="40">
    <a class="navbar-brand" href="Index.php">Inicio Sesión</a>
        </nav>
      </header>

    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="Imagenes/s.png" alt="First slide">

          </div>
          <div class="carousel-item">
            <img class="second-slide" src="Imagenes/Step.png" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="Imagenes/Stephanie.png" alt="Third slide">

          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <Center>
          <form id="frmCrearUsuario" name="frmCrearUsuario" method="POST" action="">
            <h3>Fomulario de Registro</h3> <br>
                  <input class="form-control" id="cedula" type="text" name="cedula" placeholder="Digite su Cédula" value=""><br/>
                  <input class="form-control" id="nombre" type="text" name="nombre" placeholder="Digite su Nombre" value=""><br/>
                  <input class="form-control" id="apellidos" type="text" name="apellidos" placeholder="Digite sus Apellidos" value=""><br/>
                  <input class="form-control"  id="telefono" type="text" name="telefono" placeholder="Digite su Teléfono" value=""><br/>
                  <input class="form-control" id="email" type="email" name="email" placeholder="Digite su Email" value=""><br/>
                    <input class="form-control" id="usuario" type="text" name="usuario" placeholder="Digite su Usuario" value=""><br/>
                  <input  class="form-control" id="contrasena"type="password" name="contrasena" placeholder="Digite su Contraseña" value=""><br/>
                  <select class="form-control" id="rol" name="rol">
                      <option value="0">Seleccione</option>
                      <option value="admin">Administrador</option>
                      <option value="visitante">Visitante</option>
                  </select> <br>

                  <input  class="btn btn-default"type="button" id="btnCrearUsuario" name="btnCrearUsuario" value="Crear Usuario">
              </form>

        </Center>

        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading"><span class="text-muted">Infromación</span></h2>
            <p class="lead"> Somos una pequeña joyería que esta para brindar sus servicios.</p>
<img class="rounded-circle" src="Imagenes/ubicacion.png" alt="Generic placeholder image" width="40" height="40">
          <p><span class="text-muted"> Ubicación:</span>Costado oeste de la iglesia católica
Guápiles, Limon, Costa Rica</p>
          <img class="rounded-circle" src="Imagenes/telefono.jpg" alt="Generic placeholder image" width="40" height="40">
<p><span class="text-muted"> Teléfono:</span>2710 0604</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="Imagenes/logo.png" alt="Generic placeholder image">
          </div>
        </div>

        <footer class="container">
          <p>&copy; 2017 Stephanie joyeria</a>
      </p>
        </footer>
      </div><!-- /.container -->


    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>

    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->

  </body>
</html>
