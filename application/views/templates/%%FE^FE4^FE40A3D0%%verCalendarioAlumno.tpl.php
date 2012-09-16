<?php /* Smarty version 2.6.26, created on 2012-09-16 05:32:50
         compiled from verCalendarioAlumno.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/alumno.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
	<script>
		$(document).ready(function(){
			
			fecha=new Date();
			var timeline = new Timeline("timeline", fecha);
		});	
	</script>
'; ?>

<form id="form1" name="form1" method="post" action="" class="prepend-1 span-18 append-1 prepend-top">
  <table class="buscartable">
    <caption>
      Ver calendario materia
    </caption>
    <tr>
      <td><label for="nombreDoc">Mostrar tareas de:</label></td>
      <td><label>
        <select name="filtrarTarea" size="1" id="filtrarTarea">
        
          <option value="hoy" <?php if ('hoy' == $_POST['filtrarTarea']): ?> selected="selected" <?php endif; ?>>Hoy</option>
          <option value="proximas" <?php if ('proximas' == $_POST['filtrarTarea']): ?> selected="selected" <?php endif; ?>>Proximas</option>
          <option value="pasadas" <?php if ('pasadas' == $_POST['filtrarTarea']): ?> selected="selected" <?php endif; ?>>Pasadas</option>
        </select>
      </label></td>
      <td colspan="2"><input type="submit" name="btnMosTareas" id="btnMosTareas" value="Mostrar" class="boton"/></td>
    </tr>
   </table>
</form>

  <div id="timeline">
  <ul>
  <?php if ($this->_tpl_vars['totalResultados'] > 0): ?>
  <?php unset($this->_sections['contAlum']);
$this->_sections['contAlum']['loop'] = is_array($_loop=$this->_tpl_vars['vec']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['contAlum']['name'] = 'contAlum';
$this->_sections['contAlum']['show'] = true;
$this->_sections['contAlum']['max'] = $this->_sections['contAlum']['loop'];
$this->_sections['contAlum']['step'] = 1;
$this->_sections['contAlum']['start'] = $this->_sections['contAlum']['step'] > 0 ? 0 : $this->_sections['contAlum']['loop']-1;
if ($this->_sections['contAlum']['show']) {
    $this->_sections['contAlum']['total'] = $this->_sections['contAlum']['loop'];
    if ($this->_sections['contAlum']['total'] == 0)
        $this->_sections['contAlum']['show'] = false;
} else
    $this->_sections['contAlum']['total'] = 0;
if ($this->_sections['contAlum']['show']):

            for ($this->_sections['contAlum']['index'] = $this->_sections['contAlum']['start'], $this->_sections['contAlum']['iteration'] = 1;
                 $this->_sections['contAlum']['iteration'] <= $this->_sections['contAlum']['total'];
                 $this->_sections['contAlum']['index'] += $this->_sections['contAlum']['step'], $this->_sections['contAlum']['iteration']++):
$this->_sections['contAlum']['rownum'] = $this->_sections['contAlum']['iteration'];
$this->_sections['contAlum']['index_prev'] = $this->_sections['contAlum']['index'] - $this->_sections['contAlum']['step'];
$this->_sections['contAlum']['index_next'] = $this->_sections['contAlum']['index'] + $this->_sections['contAlum']['step'];
$this->_sections['contAlum']['first']      = ($this->_sections['contAlum']['iteration'] == 1);
$this->_sections['contAlum']['last']       = ($this->_sections['contAlum']['iteration'] == $this->_sections['contAlum']['total']);
?>
  <?php $_from = $this->_tpl_vars['listaTareas'][$this->_sections['contAlum']['index']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['tareas']):
?>
  <li class="Actividad" title="<?php echo $this->_tpl_vars['tareas']['fecha']; ?>
"><?php echo $this->_tpl_vars['tareas']['descripcion']; ?>
</li>
  <?php endforeach; endif; unset($_from); ?>
  <?php endfor; endif; ?>
  <?php endif; ?>
</ul>
</div>
<br>
<a href="/alumno/bienvenido"> Volver al menu principal</a><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/alumno.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>