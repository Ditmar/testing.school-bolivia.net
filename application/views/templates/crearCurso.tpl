{include file="headers/superAdmin.tpl"}
<div class="span-12 append-3 prepend-3 last">
<br>
{$mensajeError}

<form id="formCrearCurso" name="formCrearCurso" method="post" action="/curso/nuevo/{$idcole}">
<fieldset>
<legend>Crear Curso</legend>
<table>
   <tr>
    <td><label for="crear_curso">Nombre de curso:</label></td>
    <td>
<label>
  <input type="text" name="nomCurso" id="nomCurso" value="{$smarty.post.nomCurso}">
</label>
{$errorNombre} </td>
  </tr>
</table>
</fieldset>
	<div >
        <input class="boton" type="submit" name="crearBtn" id="crearBtn" value="Crear" />
    </div>
</form></br>
<br>
      <a href="/administrador/bienvenido">Volver al menu principal</a>

</div>
{include file="footers/superAdmin.tpl"}