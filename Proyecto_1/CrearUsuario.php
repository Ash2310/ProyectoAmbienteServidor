<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> registro</title>
    <script src="Js/plugins/jquery/external/jquery/jquery.js" type="text/javascript"></script>
      <script src="Js/plugins/jquery/jquery-ui.js" type="text/javascript"></script>
      <link href="Js/plugins/jquery/jquery-ui.css" rel="stylesheet" type="text/css"/>
      <script src="Js/Scripts/Usuarios.js" type="text/javascript"></script>
  </head>
  <body>

      <form id="frmCrearUsuario" name="frmCrearUsuario" method="POST" action="">
              <input type="text" name="cedula" placeholder="Digite su cédula" value=""><br/>
              <input type="text" name="nombre" placeholder="Digite su nombre" value=""><br/>
              <input type="text" name="apellidos" placeholder="Digite sus apellidos" value=""><br/>
              <input type="text" name="telefono" placeholder="Digite su telefono" value=""><br/>
              <input type="email" name="email" placeholder="Digite su email" value=""><br/>
                <input type="text" name="usuario" placeholder="Digite su usuario" value=""><br/>
              <input type="password" name="password" placeholder="Digite su contraseña" value=""><br/>
              <select name="rol">
                  <option value="0">Seleccione</option>
                  <option value="admin">Administrador</option>
                  <option value="visitante">Visitante</option>
              </select>
              <input type="button" id="btnCrearUsuario" name="btnCrearUsuario" value="Crear Usuario">
          </form>

  </body>
</html>
