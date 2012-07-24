<?php /* Smarty version 2.6.26, created on 2012-05-09 20:02:53
         compiled from administrador/editarUsuarios.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form id="form1" name="form1" method="post" action="/administracion/miembros" class="prepend-1 span-18 append-1 prepend-top">
<table class="buscartable">
  <caption>Buscar usuario</caption>
  <tr>
    <td><label for="nombre_usuario">Nombres:</label></td>
    <td>
      <input type="text" name="nombre_usuario" id="nombre_usuario" value="<?php echo $_POST['nombre_usuario']; ?>
" class="text"/>
    </td>
  </tr>
  <tr>
    <td><label for="apellido_usuario">Apellidos:</label></td>
    <td>
      <input type="text" name="apellido_usuario" id="apellido_usuario" value="<?php echo $_POST['apellido_usuario']; ?>
" class="text"/>
    </td>
  </tr>
  <tr>
    <td><label for="tipo">Filtrar:</label></td>
    <td>
      <select name="tipo" id="tipo">
        <option value="alumno" <?php if ('alumno' == $_POST['tipo']): ?> selected="selected" <?php endif; ?>>Alumno</option>
        <option value="profesor" <?php if ('profesor' == $_POST['tipo']): ?> selected="selected" <?php endif; ?>>Profesor</option>
      </select>
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
    <th> <div class="tlabel">Nombres y apellidos</div></th>
    <?php if ($this->_tpl_vars['tipo_usuario'] == 'alumno'): ?>
    <th><div class="tlabel">Curso</div></th>
    <?php endif; ?>
    <th><div class="tlabel">Acciones</div></th>
  </tr>
  <?php if ($this->_tpl_vars['totalResultados'] > 0): ?>
    <?php $_from = $this->_tpl_vars['listaMiembros']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['usuario']):
?>
      <tr>
        <td><?php echo $this->_tpl_vars['usuario']['nombre']; ?>
 <?php echo $this->_tpl_vars['usuario']['apellido']; ?>
</td>
        <?php if ($this->_tpl_vars['tipo_usuario'] == 'alumno'): ?>
        <td><?php echo $this->_tpl_vars['usuario']['nombre_curso']; ?>
</td>
        <td>
			<div class="links"><a href="/imagen/subirImagen/<?php echo $this->_tpl_vars['tipo_usuario']; ?>
/<?php echo $this->_tpl_vars['usuario']['alumno_id']; ?>
">Subir imagen</a>  |
        	<a href="/<?php echo $this->_tpl_vars['tipo_usuario']; ?>
/modificar/<?php echo $this->_tpl_vars['usuario']['alumno_id']; ?>
">Editar</a>  |
            <a href="/administracion/resetearPassword/<?php echo $this->_tpl_vars['usuario']['alumno_id']; ?>
/<?php echo $this->_tpl_vars['tipo_usuario']; ?>
" onclick="return confirm('¿Realmente desea resetear la contraseña?');">Resetear contraseña</a>
            </div>
        </td>
        <?php else: ?>
        <td>
            <div class="links">
			<a href="/imagen/subirImagen/<?php echo $this->_tpl_vars['tipo_usuario']; ?>
/<?php echo $this->_tpl_vars['usuario']['profesor_id']; ?>
">Subir imagen</a>  |
			<a href="/<?php echo $this->_tpl_vars['tipo_usuario']; ?>
/modificar/<?php echo $this->_tpl_vars['usuario']['profesor_id']; ?>
">Editar</a> |
            <a href="/administracion/resetearPassword/<?php echo $this->_tpl_vars['usuario']['profesor_id']; ?>
/<?php echo $this->_tpl_vars['tipo_usuario']; ?>
" onclick="return confirm('¿Realmente desea resetear la contraseña?');">Resetear contraseña</a>
            </div>
         </td>
        <?php endif; ?>
      </tr>
      <?php endforeach; endif; unset($_from); ?>
  <?php else: ?>
    <tr><td colspan="3">
        No se encontraron registros
    </td></tr>
  <?php endif; ?>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>