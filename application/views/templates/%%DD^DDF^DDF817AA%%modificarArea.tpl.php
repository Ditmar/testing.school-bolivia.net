<?php /* Smarty version 2.6.26, created on 2012-03-17 15:17:16
         compiled from modificarArea.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'modificarArea.tpl', 13, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="span-8 prepend-6 append-6 last">
<?php echo $this->_tpl_vars['validationError']; ?>

<?php echo $this->_tpl_vars['mensajeError']; ?>



<form id="formModArea" name="formModArea" method="post" action="/area/modificarArea/<?php echo $this->_tpl_vars['area']; ?>
/<?php echo $this->_tpl_vars['id_materia']; ?>
/<?php echo $this->_tpl_vars['trimestre']; ?>
">
<fieldset><legend>Modificar area</legend>
<table>
  <tr>
    <td><label for="nombre_area">Nombre:</label></td>
    <td>
         <input class="text" type="text" name="nombre_area" id="nombre_area" value="<?php echo ((is_array($_tmp=@$_POST['nombre_area'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['nombre_area']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['nombre_area'])); ?>
"/><?php echo $this->_tpl_vars['errorNombre']; ?>

    </td>
  </tr>
  <tr>
    <td><label for="nota_max">Nota maxima:</label></td>
    <td>
          <input class="text" type="text" name="nota_max" id="nota_max" value="<?php echo ((is_array($_tmp=@$_POST['nota_max'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['nota_max']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['nota_max'])); ?>
"/><?php echo $this->_tpl_vars['errorNota']; ?>

    </td>
  </tr> 
</table>
</fieldset>
 <div>
    
      <input class="boton" type="submit" name="ModificarArea" id="ModificarArea" value="Guardar" />
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

