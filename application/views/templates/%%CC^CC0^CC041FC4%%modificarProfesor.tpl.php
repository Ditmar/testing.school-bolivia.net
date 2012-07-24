<?php /* Smarty version 2.6.26, created on 2012-05-28 02:26:47
         compiled from administrador/modificarProfesor.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'administrador/modificarProfesor.tpl', 14, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="span-12 append-3 prepend-3 last">
<div <?php echo $this->_tpl_vars['divError']; ?>
 class="error">
	<?php echo $this->_tpl_vars['mensajeError']; ?>

</div>
<form id="formContraProfe" name="formContraProfe" method="post" action="/profesor/modificar/<?php echo $this->_tpl_vars['id_profe']; ?>
">
<fieldset><legend>Datos Personales</legend>
<table>
  <tr>
    <td>
      <label for="nombres_prof">Nombres:</label>
    </td>
    <td>      
        <input class="text" type="text" name="nombres_prof" id="nombres_prof" value="<?php echo ((is_array($_tmp=@$_POST['nombres_prof'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['nombres']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['nombres'])); ?>
"/><?php echo $this->_tpl_vars['errorNom']; ?>

    </td>
    
  </tr>
  <tr>
    <td>
    	<label for="apelli_prof">Apellidos:</label>
    </td>
    <td>
    <input class="text" type="text" name="apelli_prof" id="apelli_prof" value="<?php echo ((is_array($_tmp=@$_POST['apelli_prof'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['apellidos']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['apellidos'])); ?>
"/><?php echo $this->_tpl_vars['errorApell']; ?>

    </td>
  </tr>
  <tr>
    <td>
    <label for="jQueryUICalendar1">Fecha Nacimiento:</label></td>
    <td><input class="text" type="text" id="jQueryUICalendar1" name="calendario" value="<?php echo ((is_array($_tmp=@$_POST['calendario'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['fecha']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['fecha'])); ?>
"/><?php echo $this->_tpl_vars['errorFecha']; ?>
</td>
  </tr>
</table>
</fieldset>
</fieldset>
  <fieldset>
  	<legend>Estado del profesor</legend>
  <table>
  <tr>
    <td><label for="estado">Estado</label></td>
    <td><select name="estado" id="estado">
          <option value="activo" <?php if ('activo' == $this->_tpl_vars['estado_pro']): ?> selected="selected"<?php endif; ?>>Activo</option>
          <option value="inactivo" <?php if ('inactivo' == $this->_tpl_vars['estado_pro']): ?> selected="selected"<?php endif; ?>>Inactivo</option>
        </select>
    </td>
  </tr>
  </table>
</fieldset>
<div>  
           <input class="boton" type="submit" name="modProfe" id="modProfe" value="Guardar" />
</div>     
</form>
<?php echo '
<script>
	$( "#jQueryUICalendar1" ).datepicker({
		changeMonth: true,
		changeYear: true
	});
</script>
'; ?>

<br/>
<a href="#" onclick="window.back();">Volver a la búsqueda</a>
<br/>
<a href="/administrador/bienvenido">Volver al menu principal</a>
<br/>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>