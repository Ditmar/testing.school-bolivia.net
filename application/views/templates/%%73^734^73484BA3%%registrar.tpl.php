<?php /* Smarty version 2.6.26, created on 2012-07-24 05:29:34
         compiled from padres/registrar.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/administrador.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<form id="formContraProfe" name="formContraProfe" method="post" action="/profesor/contratarProfe">
<fieldset><legend>Datos Personales</legend>
<table class="buscartable">
  <tr>
    <td>
      <label for="nombres_prof">Nombres:</label>
    </td>
    <td>   
        <input class="text" type="text" name="nombre" id="nombre" value="<?php echo $_POST['nombre']; ?>
"/><?php echo $this->_tpl_vars['errorNom']; ?>

    </td>
  </tr>
  <tr>
    <td>
    	<label for="apelli_prof">Apellidos:</label>
    </td>
    <td>
        <input class="text" type="text" name="apellido" id="apellido" value="<?php echo $_POST['apellido']; ?>
"/><?php echo $this->_tpl_vars['errorApell']; ?>

    </td>
  </tr>
  <tr>
    <td>
    	<label for="apelli_prof">Telf:</label>
    </td>
    <td>
        <input class="text" type="text" name="telf" id="telf" value="<?php echo $_POST['telf']; ?>
"/><?php echo $this->_tpl_vars['errorApell']; ?>

    </td>
  </tr>
</table>
</fieldset>
<div>  
        <input class="boton" type="submit" name="contratar" id="contratar" value="Crear" />
</div>     
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/padre.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>