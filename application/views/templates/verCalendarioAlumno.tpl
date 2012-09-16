{include file="headers/alumno.tpl"}
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
      Ver calendario materia
    </caption>
    <tr>
      <td><label for="nombreDoc">Mostrar tareas de:</label></td>
      <td><label>
        <select name="filtrarTarea" size="1" id="filtrarTarea">
        
          <option value="hoy" {if "hoy"==$smarty.post.filtrarTarea} selected="selected" {/if}>Hoy</option>
          <option value="proximas" {if "proximas"==$smarty.post.filtrarTarea} selected="selected" {/if}>Proximas</option>
          <option value="pasadas" {if "pasadas"==$smarty.post.filtrarTarea} selected="selected" {/if}>Pasadas</option>
        </select>
      </label></td>
      <td colspan="2"><input type="submit" name="btnMosTareas" id="btnMosTareas" value="Mostrar" class="boton"/></td>
    </tr>
   </table>
</form>

  <div id="timeline">
  <ul>
  {if $totalResultados > 0}
  {section loop=$vec name=contAlum}
  {foreach from=$listaTareas[contAlum] key=key item=tareas}
  <li class="Actividad" title="{$tareas.fecha}">{$tareas.descripcion}</li>
  {/foreach}
  {/section}
  {/if}
</ul>
</div>
<br>
<a href="/alumno/bienvenido"> Volver al menu principal</a>{include file="footers/alumno.tpl"}