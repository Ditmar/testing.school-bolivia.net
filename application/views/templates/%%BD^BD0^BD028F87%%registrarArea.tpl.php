<?php /* Smarty version 2.6.26, created on 2012-01-29 04:38:59
         compiled from registrarArea.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="span-8 prepend-6 append-6 last">
<?php echo $this->_tpl_vars['validationError']; ?>

<?php echo $this->_tpl_vars['mensajeError']; ?>


<form id="formRegArea" name="formRegArea" method="post" action="">
<fieldset>
<legend>Registrar Area</legend>
<table>
  <tr>
    <td><label for="nombre_area">Nombre:</label></td>
    <td >
         <input class="text" type="text" name="nombre_area" id="nombre_area" value="<?php echo $_POST['nombre_area']; ?>
"/><?php echo $this->_tpl_vars['errorNombre']; ?>

      
    </td>
  </tr>
  <tr>
    <td><label for="nota_max">Nota maxima:</label></td>
    <td>
    	<input class="text" type="text" name="nota_max" id="nota_max" value="<?php echo $_POST['nota_max']; ?>
"/><?php echo $this->_tpl_vars['errorNota']; ?>

    </td>
  </tr>  
</table>
</fieldset>
<div>
    <input class="boton" type="submit" name="GuardarArea" id="GuardarArea" value="Guardar" />
    <a href="/area/imprimePlantilla/<?php echo $this->_tpl_vars['id_materia']; ?>
/<?php echo $this->_tpl_vars['trimestre']; ?>
" class="boton">Volver</a>
</div>
</form>
<br />
<a href="/profesor/bienvenido"> Volver al menu principal</a>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>