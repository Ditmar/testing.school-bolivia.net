<?php /* Smarty version 2.6.26, created on 2012-07-24 05:57:14
         compiled from administrador/inscribirAlumno.tpl */ ?>
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
<form id="formInscAlumno" name="formInscAlumno" method="post" action="/alumno/inscribirAlumno">
<fieldset><legend>Datos personales</legend>
<table class="buscartable">  
  <tr>
    <td ><label for ="nombre_alum">Nombres:</label></td>
    <td >      
        <input class="text" type="text" name="nombre_alum" id="nombre_alum" value="<?php echo $_POST['nombre_alum']; ?>
"/><?php echo $this->_tpl_vars['errorNom']; ?>

    </td>    
  </tr>
  <tr>
    <td><label for ="apell_alumn">Apellidos:</label></td>
    <td>     
        <input class="text" type="text" name="apell_alumn" id="apell_alumn" value="<?php echo $_POST['apell_alumn']; ?>
"/><?php echo $this->_tpl_vars['errorApell']; ?>

    </td>    
  </tr>
  </table>
  </fieldset>
  <fieldset>
  	<legend>Datos academicos</legend>
  <table class="buscartable">  
  <tr>
    <td><label for="curso_corresponde">Curso que le corresponde</label></td>
    <td><select name="curso_corresponde" id="curso_corresponde">
    		<option value="">Seleccione un curso</option>
          <?php unset($this->_sections['numero']);
$this->_sections['numero']['loop'] = is_array($_loop=$this->_tpl_vars['cursos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['numero']['name'] = 'numero';
$this->_sections['numero']['show'] = true;
$this->_sections['numero']['max'] = $this->_sections['numero']['loop'];
$this->_sections['numero']['step'] = 1;
$this->_sections['numero']['start'] = $this->_sections['numero']['step'] > 0 ? 0 : $this->_sections['numero']['loop']-1;
if ($this->_sections['numero']['show']) {
    $this->_sections['numero']['total'] = $this->_sections['numero']['loop'];
    if ($this->_sections['numero']['total'] == 0)
        $this->_sections['numero']['show'] = false;
} else
    $this->_sections['numero']['total'] = 0;
if ($this->_sections['numero']['show']):

            for ($this->_sections['numero']['index'] = $this->_sections['numero']['start'], $this->_sections['numero']['iteration'] = 1;
                 $this->_sections['numero']['iteration'] <= $this->_sections['numero']['total'];
                 $this->_sections['numero']['index'] += $this->_sections['numero']['step'], $this->_sections['numero']['iteration']++):
$this->_sections['numero']['rownum'] = $this->_sections['numero']['iteration'];
$this->_sections['numero']['index_prev'] = $this->_sections['numero']['index'] - $this->_sections['numero']['step'];
$this->_sections['numero']['index_next'] = $this->_sections['numero']['index'] + $this->_sections['numero']['step'];
$this->_sections['numero']['first']      = ($this->_sections['numero']['iteration'] == 1);
$this->_sections['numero']['last']       = ($this->_sections['numero']['iteration'] == $this->_sections['numero']['total']);
?>
	          <option value="<?php echo $this->_tpl_vars['id'][$this->_sections['numero']['index']]; ?>
" <?php if ($this->_tpl_vars['cursos'][$this->_sections['numero']['index']] == $_POST['curso_corresponde']): ?> selected="selected" <?php endif; ?> <?php if ($this->_tpl_vars['cursos'][$this->_sections['numero']['index']] == $this->_tpl_vars['cursillo']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['cursos'][$this->_sections['numero']['index']]; ?>
</option>
		  <?php endfor; endif; ?>
        </select><?php echo $this->_tpl_vars['errorCurso']; ?>
</td>
  </tr>
  </table>      
</fieldset>
	<div>
        <input class="boton" type="submit" name="asignarBtn" id="asignarBtn" value="Inscribir" />
    </div>
</form>
</br>
<ul class="minmenu">
    <li>
        <a href="/administrador/bienvenido"> Volver al menu principal</a>
    </li>
</ul>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>