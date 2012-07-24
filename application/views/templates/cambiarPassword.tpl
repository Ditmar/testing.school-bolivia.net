<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Iniciar Sesión</title>
  {include file="stylesheets.tpl"}
  {include file="scripts.tpl"}
</head>
<body>
  <div class="container">
    <div class="span-10 prepend-7 last append-7">
      <form id="formCambpass" name="formCambpass" method="post" action="/usuario/cambiarPassword">
        <fieldset id="contentIniciarSesion">
          <legend>Cambiar contraseña</legend>
          <table>
            <tr>
              <td>Nueva contraseña:</td>
              <td><input type="password" name="nuevo_pass" id="nuevo_pass" value="{$smarty.post.nuevo_pass}" class="text"/>{$errorPass}</td>
            </tr>
            <tr>
              <td>Confirmar contraseña:</td>
              <td><input type="password" name="confirmar_pass" id="confirmar_pass" value="{$smarty.post.confirmar_pass}" class="text"/>{$errorConfPass}</td>
            </tr>
          </table>
        </fieldset>
        <div>
          <input type="submit" name="cambPass" id="cambPass" value="Cambiar Contraseña" class="boton"/></td>
        </div>
      </form>
    </div>
  </div>
</body>
</html>