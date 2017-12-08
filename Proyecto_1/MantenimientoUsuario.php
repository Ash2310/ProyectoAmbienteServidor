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

        </div>
      </nav>
    </header>

    <main role="main">

      <div class="container marketing">


        <hr class="featurette-divider">

        <div class="row featurette" >
          <div class="container" align="center">
          <h2>Lista de usuarios</h2>
 <p>Registro de usuarios</p>
 <table class="table table-striped" >

  <?php
  $resultado = $Usuario->ListarUsuarios() ;
  if ($resultado["valido"]) {

    echo "<tr class='table-info' >"
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

        <div class="row featurette" >
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

                    <input  class="btn btn-info"type="button" id="btnCrearUsuario" name="btnCrearUsuario" value="Crear Usuario">
                </form>

          </Center>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <Center>
          <div class="form-busqueda">
          <form id="frmBuscaUsuario" name="frmBuscaUsuario" method="post" action="">
            <h3>Formulario de Modificación</h3>
              <input  class="form-control" type="text" name="cedula_busqueda" placeholder="Digite la cedula" value="">
              <input class="btn btn-primary" type="button" id="btnBuscaUsuario" name="btnBuscaUsuario" value="Buscar Usuario"> <br>
  <input class="form-control" type="hidden" id="tipoForm" name="tipoForm" value="actualizar">

          </form>

      </div>

      <div class="form-datos">
      </div>
        </Center>
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

    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="https://getbootstrap.com/assets/js/vendor/holder.min.js"></script>
  </body>
</html>
