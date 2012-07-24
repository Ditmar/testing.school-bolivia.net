<?php /* Smarty version 2.6.26, created on 2012-07-21 01:32:13
         compiled from administrador/contratarProfe.tpl */ ?>
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
<form id="formContraProfe" name="formContraProfe" method="post" action="/profesor/contratarProfe">
<fieldset><legend>Datos Personales</legend>
<table class="buscartable">
  <tr>
    <td>
      <label for="nombres_prof">Nombres:</label>
    </td>
    <td>      
        <input class="text" type="text" name="nombres_prof" id="nombres_prof" value="<?php echo $_POST['nombres_prof']; ?>
"/><?php echo $this->_tpl_vars['errorNom']; ?>

    </td>
    
  </tr>
  <tr>
    <td>
    	<label for="apelli_prof">Apellidos:</label>
    </td>
    <td>
    <input class="text" type="text" name="apelli_prof" id="apelli_prof" value="<?php echo $_POST['apelli_prof']; ?>
"/><?php echo $this->_tpl_vars['errorApell']; ?>

    </td>
  </tr>
  <tr>
    <td>
    <label for="jQueryUICalendar1">Fecha Nacimiento:</label></td>
    <td><input class="text" type="text" id="jQueryUICalendar1" name="calendario" value="<?php echo $_POST['calendario']; ?>
"/><?php echo $this->_tpl_vars['errorFecha']; ?>
</td>
  </tr>
</table>
</fieldset>
<div>  
           <input class="boton" type="submit" name="contratar" id="contratar" value="Contratar" />
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

<br>
<a href="/administrador/bienvenido">Volver al menu principal</a>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>