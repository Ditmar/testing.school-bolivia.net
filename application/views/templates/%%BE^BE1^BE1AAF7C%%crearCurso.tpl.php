<?php /* Smarty version 2.6.26, created on 2012-03-27 10:24:00
         compiled from crearCurso.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/superAdmin.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="span-12 append-3 prepend-3 last">
<br>
<?php echo $this->_tpl_vars['mensajeError']; ?>


<form id="formCrearCurso" name="formCrearCurso" method="post" action="/curso/nuevo/<?php echo $this->_tpl_vars['idcole']; ?>
">
<fieldset>
<legend>Crear Curso</legend>
<table>
   <tr>
    <td><label for="crear_curso">Nombre de curso:</label></td>
    <td>
<label>
  <input type="text" name="nomCurso" id="nomCurso" value="<?php echo $_POST['nomCurso']; ?>
">
</label>
<?php echo $this->_tpl_vars['errorNombre']; ?>
 </td>
  </tr>
</table>
</fieldset>
	<div >
        <input class="boton" type="submit" name="crearBtn" id="crearBtn" value="Crear" />
    </div>
</form></br>
<br>
      <a href="/administrador/bienvenido">Volver al menu principal</a>

</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/superAdmin.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>