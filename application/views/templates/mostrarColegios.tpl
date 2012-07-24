{include file="headers/superAdmin.tpl"}
<form id="form1" name="form1" method="post" action="/superadmin/listaColegios" class="prepend-1 span-18 append-1 prepend-top">
<table class="buscartable">
  <caption>Buscar colegio</caption>
  <tr>
    <td><label for="nombre_cole">Nombre:</label></td>
    <td>
      <input type="text" name="nombre_cole" id="nombre_cole" value="{$smarty.post.nombre_cole}" class="text"/>
    </td>
  </tr>
  <tr>
    <td colspan="4">
      <input type="submit" name="buscarBtn" id="buscarBtn" value="Buscar" class="boton"/>
    </td>
  </tr>
</table>
</form>
<table class="buscartable">
  <caption>Resultados</caption>
  <tr>
    <th>Nombre</th>
    <th>Acciones</th>
  </tr>
  {if $totalResultados > 0}
    {foreach from=$listaMiembros key=key item=cole}
      <tr>
        <td>{$cole.nombre_colegio}</td>
       <td>
        	<div class="links"><a href="/curso/nuevo/{$cole.colegio_id}">Crear curso</a>  |
			<a href="/curso/subir/{$cole.colegio_id}" onclick="return confirm('¿Realmente desea subir un año?');">Subir a&ntilde;o</a>  |    
			<a href="/curso/bajar/{$cole.colegio_id}" onclick="return confirm('¿Realmente desea bajar un año?');">Bajar a&ntilde;o</a> 
            </div>
        </td>
      </tr>
      {/foreach}
  {else}
    <tr><td colspan="3">
        No se encontraron registros
    </td></tr>
  {/if}
</table>
{include file="footers/superAdmin.tpl"}
