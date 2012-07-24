<?php /* Smarty version 2.6.26, created on 2012-07-24 05:54:01
         compiled from administrador/asignarMateria.tpl */ ?>
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
<form id="formAsigMateria" name="formAsigMateria" method="post" action="/materia/asignarMateria">
<fieldset>
<legend>Asignar Materia</legend>
<table class="buscartable">
  <tr>
    <td><label for="asignar_curso">Curso:</label></td>
    <td><?php echo form_dropdown('asignar_curso', $this->_tpl_vars['cursos'], set_value('asignar_curso')); ?><?php echo $this->_tpl_vars['errorCurso']; ?>
</td>
  </tr>
  <tr>
    <td><label for="asignar_materia">Materia:</label></td>
    <td>
        <select name="asignar_materia" id="asignar_materia">
          <option value="">Seleccione una materia</option>
	        <?php $_from = $this->_tpl_vars['opMateria']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['matKey'] => $this->_tpl_vars['matNombre']):
?>
	        	<option value="<?php echo $this->_tpl_vars['idMateria'][$this->_tpl_vars['matKey']]; ?>
" <?php if ($this->_tpl_vars['idMateria'][$this->_tpl_vars['matKey']] == $_POST['asignar_materia']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['matNombre']; ?>
</option>
		    <?php endforeach; endif; unset($_from); ?>
        </select><?php echo $this->_tpl_vars['errorMateria']; ?>

    </td>
  </tr>
  <tr>
    <td><label for="asignar_profesor">Profesor:</label></td>
    <td>
        <select name="asignar_profesor" id="asignar_profesor">
          <option value="">Seleccione un profesor</option>
	        <?php $_from = $this->_tpl_vars['opProfe']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['profeKey'] => $this->_tpl_vars['profeNombre']):
?>
	        	<option value="<?php echo $this->_tpl_vars['opIdProfe'][$this->_tpl_vars['profeKey']]; ?>
" <?php if ($this->_tpl_vars['opIdProfe'][$this->_tpl_vars['profeKey']] == $_POST['asignar_profesor']): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['profeNombre']; ?>
</option>
		    <?php endforeach; endif; unset($_from); ?>
        </select><?php echo $this->_tpl_vars['errorProfesor']; ?>

    </td>
  </tr>
 
</table> 
</fieldset>
	<div >
        <input class="boton" type="submit" name="asignarBtn" id="asignarBtn" value="Asignar" />      
    </div>
</form></br>

      <a href="/administrador/bienvenido">Volver al menu principal</a>

</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>