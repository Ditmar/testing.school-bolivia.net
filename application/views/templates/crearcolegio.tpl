{include file="headers/superAdmin.tpl"}
<div class="span-12 append-3 prepend-3 last">
<br>
{$mensajeError}
<form id="formInscAlumno" name="formInscAlumno" method="post" action="/colegio/nuevo">
<fieldset>
<legend>Datos colegio</legend>
<table class="buscartable">  
  <tr>
    <td ><label for ="nombre_cole">Nombre:</label></td>
    <td >      
        <input class="text" type="text" name="nombre_cole" id="nombre_cole" value="{$smarty.post.nombre_cole}"/>{$errorCole}
    </td>    
  </tr>
  <tr>
    <td><label for ="nota_max">Nota maxima :</label></td>
    <td>     
        <input class="text" type="text" name="nota_max" id="nota_max" value="{$smarty.post.nota_max}"/>{$errorNota}
    </td>    
  </tr>
  <tr>
    <td><label for="curso_corresponde">Gestion : </label></td>
    <td><select name="gestion" id="gestion">
		<option value="">Seleccione...</option>
          {section loop=$misNiveles name=numero}
	          <option value="{$misNiveles[numero]}" {if $misNiveles[numero]==$smarty.post.gestion} selected="selected" {/if} {if $misNiveles[numero]==$nivel_curso} selected="selected"{/if}>{$misNiveles[numero]}</option>
		  {/section}
        </select>{$errorGestion}</td>
  </tr>
  </table>      
</fieldset>
	<div>
        <input class="boton" type="submit" name="crearBtn" id="crearBtn" value="Crear" />
    </div>
</form>
</br>
<a href="/superadmin/bienvenido"> Volver al menu principal</a>
</div>
{include file="footers/superAdmin.tpl"}
