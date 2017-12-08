<?php
require_once './Conexion/Conexion.php';
include './Clases/ClasePersona.php';
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
        <a class="navbar-brand" href="#">Mantenimiento usuarios</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#1">Lista de usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#2">Crear usuario</a>
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
          <h2>Lista de usuarios</h2>
 <p>Registro de usuarios</p>
 <table class="table table-dark table-hover" >

  <?php
  $resultado = $Usuario->ListarUsuarios() ;
  if ($resultado["valido"]) {

    echo "<tr class='table-success' >"
."<td>Cedula</td>"
."<td>Nombre</td>"
."<td>Apellidos</td>"
."<td>Telefono</td>"
."<td>Email</td>"
."<td>Usuario</td>"
."<td>Rol</td>"
."</tr>";
      foreach ($resultado["datos"] as $usuario) {
        echo "<tr >"
 ."<td>".$usuario['cedula']."</td>"
  ."<td>".$usuario['nombre']."</td>"
 ."<td>".$usuario['apellidos']."</td>"
 ."<td>".$usuario['telefono']."</td>"
 ."<td>".$usuario['email']."</td>"
 ."<td>".$usuario['usuario']."</td>"
."<td>".$usuario['rol']."</td>"
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
          <form id="frmCrearUsuario" name="frmCrearUsuario" method="POST" action="">
                  <input type="text" name="cedula" placeholder="Digite su cédula" value=""><br/>
                  <input type="text" name="nombre" placeholder="Digite su nombre" value=""><br/>
                  <input type="text" name="apellidos" placeholder="Digite sus apellidos" value=""><br/>
                  <input type="text" name="telefono" placeholder="Digite su telefono" value=""><br/>
                  <input type="email" name="email" placeholder="Digite su email" value=""><br/>
                    <input type="text" name="usuario" placeholder="Digite su usuario" value=""><br/>
                  <input type="password" name="contrasena" placeholder="Digite su contraseña" value=""><br/>
                  <select name="rol">
                      <option value="0">Seleccione</option>
                      <option value="admin">Administrador</option>
                      <option value="visitante">Visitante</option>
                  </select>
                  <input type="button" id="btnCrearUsuario" name="btnCrearUsuario" value="Crear Usuario">
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

    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="https://getbootstrap.com/assets/js/vendor/holder.min.js"></script>
  </body>
</html>
