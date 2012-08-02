{include file="headers/profesor.tpl"}
<h3>Bienvenid@ profesor {php}echo nombreCompletoUsuario();{/php} a nuestro sistema</h3>
<ul>
	{php}
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
	{/php}
</ul>
{include file="footers/profesor.tpl"}