<?php /* Smarty version 2.6.26, created on 2012-05-28 02:16:28
         compiled from cambiarPassword.tpl */ ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Iniciar Sesión</title>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "stylesheets.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "scripts.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
              <td><input type="password" name="nuevo_pass" id="nuevo_pass" value="<?php echo $_POST['nuevo_pass']; ?>
" class="text"/><?php echo $this->_tpl_vars['errorPass']; ?>
</td>
            </tr>
            <tr>
              <td>Confirmar contraseña:</td>
              <td><input type="password" name="confirmar_pass" id="confirmar_pass" value="<?php echo $_POST['confirmar_pass']; ?>
" class="text"/><?php echo $this->_tpl_vars['errorConfPass']; ?>
</td>
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