{include file="headers/profesor.tpl"}
{$error}
<form enctype="multipart/form-data" id="form1" name="form1" method="post" action="/documentos/subirArchivo/{$id_asignacion}" class="append-1 prepend-1 span-18 prepend-top">
  <table class="buscartable">
    <caption>Usted puede subir archivos en pdf, xls, ppt, txt, doc, docx, o xlsx</caption>
    <tr><td><input type="file" name="subirDocumento" id="subirDocumento"/></td></tr>
    <tr><td><input type="submit" name="subirBtn" id="subirBtn" value="Subir documento" class="boton"/></td>
    </tr>
  </table>
</form>
{include file="footers/profesor.tpl"}