{include file="headers/administrador.tpl"}

<table class="buscartable">
&nbsp;&nbsp;
<br />
<p class="titulo">Curso: {$nombre}</p>
<br />
  <tr>
    <th><div class="tlabel">Nombres y apellidos</div></th>
    <th><div class="tlabel">Usuario</div></th>
	<th><div class="tlabel">Estado</div></th>
  </tr>
  {if $totalResultados > 0}
    {foreach from=$listaMiembros key=key item=usuario}
      <tr>
        <td>{$usuario.nombre} {$usuario.apellido}</td>
		<td>{$usuario.usuario}</td>
		<td>{$usuario.estado}</td>
      </tr>
      {/foreach}
  {else}
    <tr><td colspan="3">
        No hay alumnos inscritos en este curso.
    </td></tr>
  {/if}
</table>
{include file="footers/administrador.tpl"}
