{include file="headers/administrador.tpl"}
<script>
    {literal}
        $(document).ready(function(){
            var modal;
            $("div.msn").hide();
            $("#acepted").click(function(e){
                   $("#acepted").hide();
                   $("#cancel").hide();
                   e.preventDefault();
                   $(".msn div").html("<div style='color:#ff0000'>Guardando los datos espere porfavor...</div>");
                   
                   $.post("/alumno/guardarlista",{"id":$("#curso_2").val(),"hashtag":$("#hashtag").val()},function(data){
                            modal.colorbox.close();
                            
                            if(data.success==true)
                            {
                                alert("Datos Guardados Correctamente");
                                document.location.href="";
                            }else
                            {
                                alert(data.msn);
                                $("div.msn").hide();
                            }
                   },"json");
                });
                $("#cancel").click(function(e){
                   e.preventDefault();
                   modal.colorbox.close();
                   $("div.msn").hide();   
                });
            $("#send").submit(function(e){
            	$("#acepted").show();
                $("#cancel").show();
                e.preventDefault();
                $("div.msn").show();
                 
                if($("#curso_corresponde").val()=="")
                {
                    $(".msn div").append($("#curso_corresponde").val());
                    modal=$("#est").colorbox({href:".msn",inline:true, width:"500",open:true,onClosed:function(){}});
                }
                return false;
            });
        });
    {/literal}
</script>
<div class="span-12 append-3 prepend-3 last">
<div {$divError} class="error">
	{$mensajeError}
</div>
<form id="formInscAlumno" name="formInscAlumno" method="post" action="/alumno/inscribirAlumno">
<fieldset><legend>Datos personales</legend>
<table class="buscartable">  
  <tr>
    <td ><label for ="nombre_alum">Nombres:</label></td>
    <td >      
        <input class="text" type="text" name="nombre_alum" id="nombre_alum" value="{$smarty.post.nombre_alum}"/>{$errorNom}
    </td>    
  </tr>
  <tr>
    <td><label for ="apell_alumn">Apellidos:</label></td>
    <td>     
        <input class="text" type="text" name="apell_alumn" id="apell_alumn" value="{$smarty.post.apell_alumn}"/>{$errorApell}
    </td>    
  </tr>
  </table>
  </fieldset>
  <fieldset>
  	<legend>Datos academicos</legend>
  <table class="buscartable">  
  <tr>
    <td><label for="curso_corresponde">Curso que le corresponde</label></td>
    <td><select name="curso_corresponde" id="curso_corresponde">
    		<option value="">Seleccione un curso</option>
          {section loop=$cursos name=numero}
	          <option value="{$id[numero]}" {if $cursos[numero]==$smarty.post.curso_corresponde} selected="selected" {/if} {if $cursos[numero]==$cursillo} selected="selected"{/if}>{$cursos[numero]}</option>
		  {/section}
        </select>{$errorCurso}</td>
  </tr>
  </table>      
</fieldset>
	<div>
        <input class="boton" type="submit" name="asignarBtn" id="asignarBtn" value="Inscribir" />
    </div>
</form>
<fieldset>
    <legend>
        Importar Lista de alumnos CVS
    </legend>
    <a href="#">Ayuda</a>
    <form action="/alumno/subirlista" enctype="multipart/form-data" method="post">
    <table class="buscartable">
        <tr>
            <td>
                <label>Importar </label>
            </td>
            <td>
                <input id="upload_file" type="file" name="upload_file" value="Subir Lista en CVS"/>
                <input type="submit" value="Enviar"/>
            </td>
            
        </tr>
        <tr>
            <td colspan="2">
                {$msn}
                
            </td>
        </tr>
    </table>
</form>
	{if $md5!=""}<div>CheckSum: {$md5}</div><input type="hidden" id="hashtag" value="{$md5}"/>{/if}
    <table>
        {section loop=$csv name=num}
            <tr>
                <td>{$csv[num].id}</td>
                <td>{$csv[num].ci}</td>
                <td>{$csv[num].APELLIDOS_Y_NOMBRES}</td>
            </tr>
        {/section}
    </table>
    {if $md5!=""}
    <form action="" id="send" method="post">
    <fielset>
        <legend>
            Insertar a la Base de datos
        </legend>
        <ul>
            <li>
                <input id="enviar" type="submit" value="Guardar Lista en la Base de datos"/>
            </li>
            <li>
                <select name="curso_2" id="curso_2">
    		<option value="">Seleccione un curso</option>
          {section loop=$cursos name=numero}
	          <option  value="{$id[numero]}" {if $cursos[numero]==$smarty.post.curso_corresponde} selected="selected" {/if} {if $cursos[numero]==$cursillo} selected="selected"{/if}>{$cursos[numero]}</option>
		  {/section}
        </select>{$errorCurso}
            </li>
        </ul>
    </fieldset>
    </form>
    {/if}

</fieldset>
<div id="est">
    
</div>

<div class="msn">
    Se Guardara el contenio en la base de datos, en el curo: <div></div>
    <ul class="iconmenu">
        <li>
            <a href="" id="acepted">
            <img src="/css/icons/add.png"/>
            <span>
                Aceptar
            </span>
            </a>
        </li>
        <li>
            <a href="" id="cancel">
                <img src="/css/icons/return.png"/>
                <span>
                    Cancelar
                </span>
            </a>
        </li>
    </ul>
</div>
</div>
{include file="footers/administrador.tpl"}