{include file="headers/profesor.tpl"}
{literal}
	<script>
		$(document).ready(function(){
			
			fecha=new Date();
			var timeline = new Timeline("timeline", fecha);
		});	
	</script>
{/literal}
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
  {foreach from=$listaTareas key=key item=tareas}
  		<li class="Actividad" title="{$tareas.fecha}">{$tareas.descripcion}</li>
  {/foreach}
  </ul>
  </div>
<br>
<a class="boton" href="/calendario/ver/{$id_asignacion}">Ver</a>
<a class="boton" href="/calendario/insertarTarea/{$id_asignacion}">Insertar</a>
<br>
<a href="/profesor/bienvenido"> Volver al menu principal</a>
{include file="footers/profesor.tpl"}