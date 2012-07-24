{include file="headers/alumno.tpl"}
<form id="form1" name="form1" method="post" action="" class="prepend-1 span-18 append-1 prepend-top">
<table class="buscartable">
  <caption>Descarga de documentos</caption>
  <tr>
    <td><label for="nombreDoc">Nombre del documento:</label></td>
    <td><input type="text" name="nombreDoc" id="nombreDoc" value="{$smarty.post.nombreDoc}" class="text"/></td>
  </tr>
  <tr>
    <td colspan="2">
      <input type="submit" name="btnBuscaDoc" id="btnBuscaDoc" value="Buscar" class="boton"/>
    </td>
  </tr>
</table>
</form>
<table class="buscartable">
  <caption>Resultados</caption>
  <tr>
    <th>Nombre</th>
    <th>Materia</th>
    <th>Acción</th>
  </tr>
  {if $totalResultados > 0}
  {section loop=$vec name=contAlum}
    {foreach from=$listaDocumentos[contAlum] key=key item=documento}
    <tr>
      <td>{$documento.nombre_documento} </td>
      <td>{$documento.nombre_materia} </td>
      <td><div align="center"><a href="{php}echo site_url();{/php}documentos/descargarArchivo/{$documento.documento_id}">Descargar</a></div></td>
    </tr>
    {/foreach}
  {/section}
  {else}
    <tr><td colspan="3">No se encontraron documentos.</td></tr>
  {/if}
</table>
{include file="footers/alumno.tpl"}