{include file="headers/administrador.tpl"}
<div class="span-12 append-3 prepend-3 last">
<br>
{$mensajeError}

<form id="formCrearCurso" name="formCrearCurso" method="post" action="/curso/editar/{$id_curso}">
<fieldset>
<legend>Editar Curso</legend>
<table>
   <tr>
    <td><label for="crear_curso">Nombre de curso:</label></td>
    <td>
<label>
  <input type="text" name="nomCurso" id="nomCurso" value="{$smarty.post.nombre_curso|default:$nom_curso}">
</label>
{$errorNombre} </td>
  </tr>
  <tr>
    <td><label for="crear_nivel">Nivel:</label></td>
    <td>
        <select name="nivel" id="nivel">
          {section loop=$misNiveles name=numero}
	          <option value="{$misNiveles[numero]}" {if $misNiveles[numero]==$smarty.post.nivel} selected="selected" {/if} {if $misNiveles[numero]==$nivel_curso} selected="selected"{/if}>{$misNiveles[numero]}</option>
		  {/section}
        </select>
        {$errorNivel}
    </td>
  </tr>

</table>
</fieldset>
	<div >
        <input class="boton" type="submit" name="crearBtn" id="crearBtn" value="Editar" />
    </div>
</form></br>
<br>
      <a href="/administrador/bienvenido">Volver al menu principal</a>

</div>
{include file="footers/administrador.tpl"}