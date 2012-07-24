<?php /* Smarty version 2.6.26, created on 2012-03-13 10:10:29
         compiled from criterios/nuevo.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="span-8 prepend-6 append-6 last">
<?php echo $this->_tpl_vars['validationError']; ?>

<?php echo $this->_tpl_vars['mensajeError']; ?>

<form id="nuevo_criterio" name="nuevo_criterio" method="post" action="/criterio/nuevo/<?php echo $this->_tpl_vars['idArea']; ?>
/<?php echo $this->_tpl_vars['id_materia']; ?>
/<?php echo $this->_tpl_vars['trimestre']; ?>
">
  <fieldset><legend>Agregar criterio</legend>
  <table class="tabla">
    <tr>
      <td><label for="titulo_CE">Titulo:</label></td>
      <td><input class="text" type="text" name="titulo_CE" id="titulo_CE" value="<?php echo $_POST['titulo_CE']; ?>
"/><?php echo $this->_tpl_vars['errorNombre']; ?>
</td>
    </tr>
    <tr>
      <td><label for="nota_maxCE">Nota:</label></td>
      <td><input class="text" type="text" name="nota_maxCE" id="nota_maxCE" value="<?php echo $_POST['nota_maxCE']; ?>
"/><?php echo $this->_tpl_vars['errorNota']; ?>
</td>
    </tr>
  </table>
  </fieldset>
  <div>
  <dude></dude>
    <input class="boton" type="submit" name="submit" id="submit" value="Crear" />    
    <a href="/area/imprimePlantilla/<?php echo $this->_tpl_vars['id_materia']; ?>
/<?php echo $this->_tpl_vars['trimestre']; ?>
" class="boton">Volver</a>
  </div>
</form>
</br>
<a href="/profesor/bienvenido"> Volver al menu principal</a>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>