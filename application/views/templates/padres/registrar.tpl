{include file="headers/administrador.tpl"}
<ul class="iconbtn">
    <li>
        <a href="#registrar">Registrar</a>
    </li>
    <li>
        <a href="#">Importar</a>
    </li>
</ul>
<form id="formContraProfe" name="formContraProfe" method="post" action="/profesor/contratarProfe">
<fieldset><legend>Datos Personales</legend>
<table class="buscartable">
  <tr>
    <td>
      <label for="nombres_prof">Nombres:</label>
    </td>
    <td>   
        <input class="text" type="text" name="nombre" id="nombre" value="{$smarty.post.nombre}"/>{$errorNom}
    </td>
  </tr>
  <tr>
    <td>
    	<label for="apelli_prof">Apellidos:</label>
    </td>
    <td>
        <input class="text" type="text" name="apellido" id="apellido" value="{$smarty.post.apellido}"/>{$errorApell}
    </td>
  </tr>
  <tr>
    <td>
    	<label for="apelli_prof">Telf:</label>
    </td>
    <td>
        <input class="text" type="text" name="telf" id="telf" value="{$smarty.post.telf}"/>{$errorApell}
    </td>
  </tr>
</table>
</fieldset>
<div>  
        <input class="boton" type="submit" name="contratar" id="contratar" value="Crear" />
</div>     
</form>
{include file="footers/padre.tpl"}