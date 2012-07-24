<?php /* Smarty version 2.6.26, created on 2012-05-28 02:24:53
         compiled from verAlumnosCurso.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table class="buscartable">
&nbsp;&nbsp;
<br />
<p class="titulo">Curso: <?php echo $this->_tpl_vars['nombre']; ?>
</p>
<br />
  <tr>
    <th><div class="tlabel">Nombres y apellidos</div></th>
    <th><div class="tlabel">Usuario</div></th>
	<th><div class="tlabel">Estado</div></th>
  </tr>
  <?php if ($this->_tpl_vars['totalResultados'] > 0): ?>
    <?php $_from = $this->_tpl_vars['listaMiembros']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['usuario']):
?>
      <tr>
        <td><?php echo $this->_tpl_vars['usuario']['nombre']; ?>
 <?php echo $this->_tpl_vars['usuario']['apellido']; ?>
</td>
		<td><?php echo $this->_tpl_vars['usuario']['usuario']; ?>
</td>
		<td><?php echo $this->_tpl_vars['usuario']['estado']; ?>
</td>
      </tr>
      <?php endforeach; endif; unset($_from); ?>
  <?php else: ?>
    <tr><td colspan="3">
        No hay alumnos inscritos en este curso.
    </td></tr>
  <?php endif; ?>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>