<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Crear Usuario</title>
  </head>
  <body>
    <form "form-horizontal" style="margin:0 auto" action="procesa_usuarios.php" method="post">
      <div id="registro" class="container-fluid text-center bg-grey">
        <form name="frmCrearUsuario" method="POST" action="procesa_usuarios.php">
        <div class="form-group">
          <label class="control-label col-sm-2" for="cedula">Cedula:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="cedula" placeholder="Ingrese su Cedula" name="cedula">
          </div>
        </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="nombre">Nombre:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nombre" placeholder="Ingrese su Nombre" name="nombre">
            </div>
          </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="apellidos">Apellidos:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="apellidos" placeholder="Ingrese su Apellidos" name="apellidos">
              </div>
            </div>
            <div class="form-group">
                  <label class="control-label col-sm-2" for="telefono">Telefono:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="telefono" placeholder="Ingrese su numero telefono" name="telefono">
                  </div>
                </div>
                  <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" placeholder="Ingrese su Email" name="email">
                        </div>
                          </div>
                      <div class="form-group">
                              <label class="control-label col-sm-2" for="usuario">Usuario:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="usuario" placeholder="Ingrese un Usuario" name="usuario">
                              </div>
                                </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="pwd">Contraseña:</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="contrasena" placeholder="ingrese una contraseña" name="contrasena">
              </div>
            </div>
            <div class="form-group">
                  <label class="control-label col-sm-2" for="rol">Rol:</label>
                  <div class="col-sm-10">
                    <select name="rol" class="form-control">
                        <option value="0">Seleccione</option>
                        <option value="admin">Administrador</option>
                        <option value="user">Visitante</option>
                    </select>
                  </div>
                    </div>
                         <input type="hidden" name="accion" value="CreaUsuarios">
                      <input type="submit"  class="btn btn-primary" name="btnCrearUsuario" value="Crear Usuario">

                  </form>

          </div>

    </form>


  </body>
</html>
