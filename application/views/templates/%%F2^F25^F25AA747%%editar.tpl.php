<?php /* Smarty version 2.6.26, created on 2012-02-18 20:06:03
         compiled from criterios/editar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'criterios/editar.tpl', 10, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="span-8 prepend-6 append-6 last">
<?php echo $this->_tpl_vars['validationError']; ?>

<?php echo $this->_tpl_vars['mensajeError']; ?>

<form id="editar_criterio" name="editar_criterio" method="post" action="/criterio/editar/<?php echo $this->_tpl_vars['idCriterio']; ?>
/<?php echo $this->_tpl_vars['id_materia']; ?>
/<?php echo $this->_tpl_vars['trimestre']; ?>
">
  <fieldset><legend>Modificar criterio</legend>
  <table>
    <tr>
      <td><label for="titulo_CE">Titulo:</label></td>
      <td><input class="text" type="text" name="titulo_CE" id="titulo_CE" value="<?php echo ((is_array($_tmp=@$_POST['titulo_CE'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['titulo']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['titulo'])); ?>
"/></td>
    </tr>
    <tr>
      <td><label for="nota_maxCE">Nota:</label></td>
      <td><input class="text" type="text" name="nota_maxCE" id="nota_maxCE" value="<?php echo ((is_array($_tmp=@$_POST['nota_maxCE'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['nota']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['nota'])); ?>
"/></td>
    </tr>
    </table>
  </fieldset>
  <div>
    <input class="boton" type="submit" name="submit" id="submit" value="Modificar" />
    <a href="/area/imprimePlantilla/<?php echo $this->_tpl_vars['id_materia']; ?>
/<?php echo $this->_tpl_vars['trimestre']; ?>
" class="boton">Volver</a>
  </div>
</form>
<br>
<a href="/profesor/bienvenido">Volver al menu principal</a>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>