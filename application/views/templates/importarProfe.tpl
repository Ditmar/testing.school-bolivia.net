{include file="headers/administrador.tpl"}
<div class="span-12 append-3 prepend-3 last">
<br>
{$error}

<form enctype="multipart/form-data" id="form1" name="form1" method="post" action="/profesor/importarCvs">
<fieldset>
<legend>Importar Profesores</legend>
  <table width="379" class="buscartable">
    <tr>
      <td width="318"><label for="documento_subir">Usted solo puede subir archivos CSV</label></td></tr><br>
    <tr><td><input type="file" name="importarCsv" id="importarCsv" /></td></tr>
    <tr><td><input class="boton" type="submit" name="subirBtn" id="subirBtn" value="Importar" /></td>
    </tr>
  </table>
  </fieldset>
</form>
</br>
<br>
      <a href="/administrador/bienvenido">Volver al menu principal</a>

</div>
{include file="footers/administrador.tpl"}