<?php /* Smarty version 2.6.26, created on 2012-09-16 04:29:24
         compiled from verCalendario.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/profesor.tpl", 'smarty_include_vars' => array()));
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
      Ver celendario materia
    </caption>
    <tr>
      <td><label for="nombreDoc">Mostrar tareas de:</label></td>
      <td><label>
        
      </label></td>
      <td colspan="2"><input type="submit" name="btnMosTareas" id="btnMosTareas" value="Mostrar" class="boton"/></td>
    </tr>
   </table>
</form>

 <div id="timeline">
  <ul>
  <?php $_from = $this->_tpl_vars['listaTareas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['tareas']):
?>
  		<li class="Actividad" title="<?php echo $this->_tpl_vars['tareas']['fecha']; ?>
"><?php echo $this->_tpl_vars['tareas']['descripcion']; ?>
</li>
  <?php endforeach; endif; unset($_from); ?>
  </ul>
  </div>
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