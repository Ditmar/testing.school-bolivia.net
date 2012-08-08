{include file="headers/profesor.tpl"}
<ul class="iconmenu">
	<li>
		<a href="/profesor/bienvenido"><img src="/css/icons/materias.png"/><span>Mis Materias</span></a>	
	</li>
    <li>
        <a href="/area/imprimePlantilla/{$asignar_id}/{$trimestre}"><img src="/css/icons/grid.png"/><span>Planilla de Notas</span></a>
    </li>
    <li>
        <a href="/area/crearArea/{$asignar_id}/{$trimestre}"><img src="/css/icons/area.png"/><span>Crear area</span></a>
    </li>
    <li>
        <a href="/area/ingresarNotas/{$asignar_id}/{$trimestre}"><img src="/css/icons/add.png"/><span>Insertar Notas</span></a>
    </li>
    <li>
        <a  href="/calendario/insertarTarea/{$asignar_id}"><img src="/css/icons/calendar.png"/><span>Calendario</span> </a>
    </li>
    <li>
        <a href="/documentos/verDocumentos/{$asignar_id}"><img src="/css/icons/download.png"/><span>Descargar Documentos</span> </a>
    </li>
    <li>
       <a  href="/documentos/subirArchivo/{$asignar_id}"><img src="/css/icons/upload.png"/><span>Subir documentos</span> </a> 
    </li>
    <li>
        <!-- Enlace a Jquery-->
        <a href="#" id="btnmostrar">
            <img src="/css/icons/eye.png"/><span>Ver Todo</span>
        </a>
    </li>
    <li>
        <a href="{php}echo site_url("profesor/bienvenido");{/php}"> <img src="/css/icons/return.png"/> <span>volver</span></a>
    </li>
    <li>
    	
       <a  href="/administrador/cerrarSesion"><img src="/css/icons/logout.png"/><span>Salir</span> </a> 
    </li>
</ul>
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