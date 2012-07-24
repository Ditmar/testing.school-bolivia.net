{include file="headers/administrador.tpl"}
<form id="form1" name="form1" method="post" action="" class="prepend-1 span-18 append-1 prepend-top">
<table class="buscartable">
<div {$divError} class="error">
	Al exportar las libretas debe exitir la carpeta "libretas" en el disco C:
</div>
  <caption>Buscar curso</caption>
  <tr>
    <td><label for="nivelCurso">Nivel:</label></td>
    <td><input type="text" name="nivelCurso" id="nivelCurso" value="{$smarty.post.nivelCurso}" class="text" maxlength=2/></td>
  </tr>
  <tr>
    <td colspan="2">
      <input type="submit" name="btnBuscaCurso" id="btnBuscaCurso" value="Buscar" class="boton"/>
    </td>
  </tr>
</table>
</form>
<table class="buscartable">
  <caption>Resultados</caption>
  <tr>
    <th><div class="tlabel">ID curso</div></th>
    <th><div class="tlabel">Nombre</div></th>
    <th><div class="tlabel">Acción</div></th>
  </tr>
  {if $totalResultados > 0}
    {foreach from=$listaCursos key=key item=curso}
    <tr>
      <td>{$curso.curso_id}</td>
      <td>{$curso.nombre_curso}</td>
      <td><div class="links" align="center"><a href="{php}echo site_url();{/php}curso/verAlumnosCurso/{$curso.curso_id}">Ver alumnos</a>  |  <a href="{php}echo site_url();{/php}libreta/libretasCurso/{$curso.curso_id}">Exportar libretas</a></div></td>
    </tr>
    {/foreach}
  {else}
    <tr><td colspan="2">No se encontraron cursos.</td></tr>
  {/if}
</table>
&nbsp;&nbsp;

<br />
<br />

{include file="footers/administrador.tpl"}