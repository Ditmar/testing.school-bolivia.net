<?php /* Smarty version 2.6.26, created on 2012-02-17 02:15:34
         compiled from verCalendario.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form id="form1" name="form1" method="post" action="" class="prepend-1 span-18 append-1 prepend-top">
  <table class="buscartable">
    <caption>
      Ver celendario materia
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
<table class="buscartable">
  <caption>
    Resultados
  </caption>
  <tr>
    <th>Dia</th>
    <th>Mes</th>
    <th>Tarea</th>
  </tr>
  <?php if ($this->_tpl_vars['totalResultados'] > 0): ?>
  <?php $_from = $this->_tpl_vars['listaTareas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['tareas']):
?>
  <tr>
    <td><?php echo $this->_tpl_vars['tareas']['dia']; ?>
</td>
    <td><?php echo $this->_tpl_vars['tareas']['mes']; ?>
</td>
    <td><?php echo $this->_tpl_vars['tareas']['descripcion']; ?>
</td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <?php else: ?>
  <tr>
    <td colspan="3">No se encontraron tareas.</td>
  </tr>
  <?php endif; ?>
</table>
<br>
<a class="boton" href="/calendario/ver/<?php echo $this->_tpl_vars['id_asignacion']; ?>
">Ver</a>
<a class="boton" href="/calendario/insertarTarea/<?php echo $this->_tpl_vars['id_asignacion']; ?>
">Insertar</a>
<br>
<a href="/profesor/bienvenido"> Volver al menu principal</a>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>