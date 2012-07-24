<?php /* Smarty version 2.6.26, created on 2012-05-28 02:14:20
         compiled from verCursos.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form id="form1" name="form1" method="post" action="" class="prepend-1 span-18 append-1 prepend-top">
<table class="buscartable">
<div <?php echo $this->_tpl_vars['divError']; ?>
 class="error">
	Al exportar las libretas debe exitir la carpeta "libretas" en el disco C:
</div>
  <caption>Buscar curso</caption>
  <tr>
    <td><label for="nivelCurso">Nivel:</label></td>
    <td><input type="text" name="nivelCurso" id="nivelCurso" value="<?php echo $_POST['nivelCurso']; ?>
" class="text" maxlength=2/></td>
  </tr>
  <tr>
    <td colspan="2">
      <input type="submit" name="btnBuscaCurso" id="btnBuscaCurso" value="Buscar" class="boton"/>
    </td>
  </tr>
</table>
</form>
<table class="buscartable">
  <caption>Resultados</caption>
  <tr>
    <th><div class="tlabel">ID curso</div></th>
    <th><div class="tlabel">Nombre</div></th>
    <th><div class="tlabel">Acción</div></th>
  </tr>
  <?php if ($this->_tpl_vars['totalResultados'] > 0): ?>
    <?php $_from = $this->_tpl_vars['listaCursos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['curso']):
?>
    <tr>
      <td><?php echo $this->_tpl_vars['curso']['curso_id']; ?>
</td>
      <td><?php echo $this->_tpl_vars['curso']['nombre_curso']; ?>
</td>
      <td><div class="links" align="center"><a href="<?php echo site_url(); ?>curso/verAlumnosCurso/<?php echo $this->_tpl_vars['curso']['curso_id']; ?>
">Ver alumnos</a>  |  <a href="<?php echo site_url(); ?>libreta/libretasCurso/<?php echo $this->_tpl_vars['curso']['curso_id']; ?>
">Exportar libretas</a></div></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
  <?php else: ?>
    <tr><td colspan="2">No se encontraron cursos.</td></tr>
  <?php endif; ?>
</table>
&nbsp;&nbsp;

<br />
<br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>