<?php /* Smarty version 2.6.26, created on 2012-01-29 00:32:17
         compiled from administrador/modificarAlumno.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'administrador/modificarAlumno.tpl', 12, false),)), $this); ?>
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
<form id="formInscAlumno" name="formInscAlumno" method="post" action="/alumno/modificar/<?php echo $this->_tpl_vars['id_alumno']; ?>
">
<fieldset><legend>Datos personales</legend>
<table class="buscartable">
  <tr>
    <td ><label for ="nombre_alum">Nombres:</label></td>
    <td >
        <input class="text" type="text" name="nombre_alum" id="nombre_alum" value="<?php echo ((is_array($_tmp=@$_POST['nombre_alum'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['nombres']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['nombres'])); ?>
"/><?php echo $this->_tpl_vars['errorNom']; ?>

    </td>
  </tr>
  <tr>
    <td><label for ="apell_alumn">Apellidos:</label></td>
    <td>
      <input class="text" type="text" name="apell_alumn" id="apell_alumn" value="<?php echo ((is_array($_tmp=@$_POST['apell_alumn'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['apellidos']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['apellidos'])); ?>
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
    <td>
    <select name="curso_corresponde" id="curso_corresponde">
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
        </select>
    <?php echo $this->_tpl_vars['errorCurso']; ?>
</td>
  </tr>
  </table>
</fieldset>
  <fieldset>
  	<legend>Estado del alumno</legend>
  <table class="buscartable">
  <tr>
    <td><label for="estado">Estado</label></td>
    <td><select name="estado" id="estado">
          <option value="activo" <?php if ('activo' == $this->_tpl_vars['estado_al']): ?> selected="selected"<?php endif; ?>>Activo</option>
          <option value="inactivo" <?php if ('inactivo' == $this->_tpl_vars['estado_al']): ?> selected="selected"<?php endif; ?>>Inactivo</option>
        </select>
    </td>
  </tr>
  </table>
</fieldset>
	<div>
        <input class="boton" type="submit" name="asignarBtn" id="asignarBtn" value="Guardar" />
    </div>
</form>
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