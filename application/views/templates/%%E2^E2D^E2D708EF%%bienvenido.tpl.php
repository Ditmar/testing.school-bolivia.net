<?php /* Smarty version 2.6.26, created on 2012-08-02 19:38:27
         compiled from profesor/bienvenido.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/profesor.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h3>Bienvenid@ profesor <?php echo nombreCompletoUsuario(); ?> a nuestro sistema</h3>
<ul class="materias_css">
	<?php 
		if(daMaterias() == true)
            	{
		  			foreach (misMaterias() as $id => $display) 
                    {
                    	echo "<li><ul>";
 				   		echo "<li><a href='/area/imprimePlantilla/$id/1'><div>$display Primer Trimestre</div></a></li>";
 				   		echo "<li><a href='/area/imprimePlantilla/$id/2'><div>$display Segundo Trimestre</div></a></li>";
 				   		echo "<li><a href='/area/imprimePlantilla/$id/3'><div>$display Tercer Trimestre</div></a></li>";
						echo "</ul></li>";
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