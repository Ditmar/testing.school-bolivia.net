{include file="headers/profesor.tpl"}
<h3>Bienvenid@ profesor {php}echo nombreCompletoUsuario();{/php} a nuestro sistema</h3>
<ul class="materias_css">
	{php}
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
	{/php}
</ul>
{include file="footers/profesor.tpl"}