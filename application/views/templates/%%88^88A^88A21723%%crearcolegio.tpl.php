<?php /* Smarty version 2.6.26, created on 2012-02-17 02:12:48
         compiled from crearcolegio.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/superAdmin.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="span-12 append-3 prepend-3 last">
<br>
<?php echo $this->_tpl_vars['mensajeError']; ?>

<form id="formInscAlumno" name="formInscAlumno" method="post" action="/colegio/nuevo">
<fieldset>
<legend>Datos colegio</legend>
<table class="buscartable">  
  <tr>
    <td ><label for ="nombre_cole">Nombre:</label></td>
    <td >      
        <input class="text" type="text" name="nombre_cole" id="nombre_cole" value="<?php echo $_POST['nombre_cole']; ?>
"/><?php echo $this->_tpl_vars['errorCole']; ?>

    </td>    
  </tr>
  <tr>
    <td><label for ="nota_max">Nota maxima :</label></td>
    <td>     
        <input class="text" type="text" name="nota_max" id="nota_max" value="<?php echo $_POST['nota_max']; ?>
"/><?php echo $this->_tpl_vars['errorNota']; ?>

    </td>    
  </tr>
  <tr>
    <td><label for="curso_corresponde">Gestion : </label></td>
    <td><select name="gestion" id="gestion">
		<option value="">Seleccione...</option>
          <?php unset($this->_sections['numero']);
$this->_sections['numero']['loop'] = is_array($_loop=$this->_tpl_vars['misNiveles']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	          <option value="<?php echo $this->_tpl_vars['misNiveles'][$this->_sections['numero']['index']]; ?>
" <?php if ($this->_tpl_vars['misNiveles'][$this->_sections['numero']['index']] == $_POST['gestion']): ?> selected="selected" <?php endif; ?> <?php if ($this->_tpl_vars['misNiveles'][$this->_sections['numero']['index']] == $this->_tpl_vars['nivel_curso']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['misNiveles'][$this->_sections['numero']['index']]; ?>
</option>
		  <?php endfor; endif; ?>
        </select><?php echo $this->_tpl_vars['errorGestion']; ?>
</td>
  </tr>
  </table>      
</fieldset>
	<div>
        <input class="boton" type="submit" name="crearBtn" id="crearBtn" value="Crear" />
    </div>
</form>
</br>
<a href="/superadmin/bienvenido"> Volver al menu principal</a>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/superAdmin.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>