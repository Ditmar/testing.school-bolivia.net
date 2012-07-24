<?php /* Smarty version 2.6.26, created on 2012-05-28 02:16:36
         compiled from descargarDocAlumno.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/alumno.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form id="form1" name="form1" method="post" action="" class="prepend-1 span-18 append-1 prepend-top">
<table class="buscartable">
  <caption>Descarga de documentos</caption>
  <tr>
    <td><label for="nombreDoc">Nombre del documento:</label></td>
    <td><input type="text" name="nombreDoc" id="nombreDoc" value="<?php echo $_POST['nombreDoc']; ?>
" class="text"/></td>
  </tr>
  <tr>
    <td colspan="2">
      <input type="submit" name="btnBuscaDoc" id="btnBuscaDoc" value="Buscar" class="boton"/>
    </td>
  </tr>
</table>
</form>
<table class="buscartable">
  <caption>Resultados</caption>
  <tr>
    <th>Nombre</th>
    <th>Materia</th>
    <th>Acción</th>
  </tr>
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
    <?php $_from = $this->_tpl_vars['listaDocumentos'][$this->_sections['contAlum']['index']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['documento']):
?>
    <tr>
      <td><?php echo $this->_tpl_vars['documento']['nombre_documento']; ?>
 </td>
      <td><?php echo $this->_tpl_vars['documento']['nombre_materia']; ?>
 </td>
      <td><div align="center"><a href="<?php echo site_url(); ?>documentos/descargarArchivo/<?php echo $this->_tpl_vars['documento']['documento_id']; ?>
">Descargar</a></div></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
  <?php endfor; endif; ?>
  <?php else: ?>
    <tr><td colspan="3">No se encontraron documentos.</td></tr>
  <?php endif; ?>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/alumno.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>