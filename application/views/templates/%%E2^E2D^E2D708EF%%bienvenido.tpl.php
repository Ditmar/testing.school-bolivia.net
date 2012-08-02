<?php /* Smarty version 2.6.26, created on 2012-08-02 01:37:14
         compiled from profesor/bienvenido.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h3>Bienvenid@ profesor <?php echo nombreCompletoUsuario(); ?> a nuestro sistema</h3>
<ul>
	<?php 
		if(daMaterias() == true)
            	{
		  			foreach (misMaterias() as $id => $display) 
                    {
 				   		echo "<li><a href='/area/imprimePlantilla/$id/1'>$display Primer Trimestre</a></li>";
 				   		echo "<li><a href='/area/imprimePlantilla/$id/2'>$display Segundo Trimestre</a></li>";
 				   		echo "<li><a href='/area/imprimePlantilla/$id/3'>$display Tercer Trimestre</a></li>";
					}
                 }
                 else
                 {
                 	$display = "No tiene materias asignadas.";
                 	echo "<li><a>$display</a></li>";
                 }
	 ?>
</ul>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>