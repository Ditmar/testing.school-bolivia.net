<?php /* Smarty version 2.6.26, created on 2012-05-28 03:35:39
         compiled from mostrarColegios.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/superAdmin.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form id="form1" name="form1" method="post" action="/superadmin/listaColegios" class="prepend-1 span-18 append-1 prepend-top">
<table class="buscartable">
  <caption>Buscar colegio</caption>
  <tr>
    <td><label for="nombre_cole">Nombre:</label></td>
    <td>
      <input type="text" name="nombre_cole" id="nombre_cole" value="<?php echo $_POST['nombre_cole']; ?>
" class="text"/>
    </td>
  </tr>
  <tr>
    <td colspan="4">
      <input type="submit" name="buscarBtn" id="buscarBtn" value="Buscar" class="boton"/>
    </td>
  </tr>
</table>
</form>
<table class="buscartable">
  <caption>Resultados</caption>
  <tr>
    <th>Nombre</th>
    <th>Acciones</th>
  </tr>
  <?php if ($this->_tpl_vars['totalResultados'] > 0): ?>
    <?php $_from = $this->_tpl_vars['listaMiembros']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['cole']):
?>
      <tr>
        <td><?php echo $this->_tpl_vars['cole']['nombre_colegio']; ?>
</td>
       <td>
        	<div class="links"><a href="/curso/nuevo/<?php echo $this->_tpl_vars['cole']['colegio_id']; ?>
">Crear curso</a>  |
			<a href="/curso/subir/<?php echo $this->_tpl_vars['cole']['colegio_id']; ?>
" onclick="return confirm('¿Realmente desea subir un año?');">Subir a&ntilde;o</a>  |    
			<a href="/curso/bajar/<?php echo $this->_tpl_vars['cole']['colegio_id']; ?>
" onclick="return confirm('¿Realmente desea bajar un año?');">Bajar a&ntilde;o</a> 
            </div>
        </td>
      </tr>
      <?php endforeach; endif; unset($_from); ?>
  <?php else: ?>
    <tr><td colspan="3">
        No se encontraron registros
    </td></tr>
  <?php endif; ?>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/superAdmin.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>