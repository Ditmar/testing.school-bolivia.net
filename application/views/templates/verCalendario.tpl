{include file="headers/profesor.tpl"}
<form id="form1" name="form1" method="post" action="" class="prepend-1 span-18 append-1 prepend-top">
  <table class="buscartable">
    <caption>
      Ver celendario materia
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
<table class="buscartable">
  <caption>
    Resultados
  </caption>
  <tr>
    <th>Dia</th>
    <th>Mes</th>
    <th>Tarea</th>
  </tr>
  {if $totalResultados > 0}
  {foreach from=$listaTareas key=key item=tareas}
  <tr>
    <td>{$tareas.dia}</td>
    <td>{$tareas.mes}</td>
    <td>{$tareas.descripcion}</td>
  </tr>
  {/foreach}
  {else}
  <tr>
    <td colspan="3">No se encontraron tareas.</td>
  </tr>
  {/if}
</table>
<br>
<a class="boton" href="/calendario/ver/{$id_asignacion}">Ver</a>
<a class="boton" href="/calendario/insertarTarea/{$id_asignacion}">Insertar</a>
<br>
<a href="/profesor/bienvenido"> Volver al menu principal</a>
{include file="footers/profesor.tpl"}