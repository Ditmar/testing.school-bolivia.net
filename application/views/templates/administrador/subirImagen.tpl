{include file="headers/administrador.tpl"}
<div class="span-12 append-3 prepend-3 last">
{$error}
<form enctype="multipart/form-data" id="formImagenUs" name="formImagenUs" method="post" action="/imagen/subirImagen/{$tipo_usuario}/{$id_usuario}" class="append-1 prepend-1 span-18 prepend-top">
<fieldset><legend>Subir Imagen</legend>
	<table class="buscartable" cellpadding="0" cellspacing="0">
		<tr>
			<td>Imagen:   </td>
			<td><input type="file" name="subirImagen" id="subirImagen"/></td>
		</tr>
		<tr><td><input type="submit" name="subirBtn" id="subirBtn" value="Subir Imagen" class="boton"/></td></tr>
	</table>
</fieldset>
</form>
<br/>
<ul class="minmenu">
    
    <li>
        <a href="/administrador/bienvenido">Volver al menu principal</a>
    </li>
</ul>
</div>
{include file="footers/administrador.tpl"}
