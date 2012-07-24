{include file="headers/padre.tpl"}
<script>
    {literal}
        $(document).ready(function(){
             var modal
            $.post("/padres/verificarsession",{},
            function(data){
                if(!data.check)
                {
                   modal=$("#est").colorbox({href:".estudianteclass",inline:true, width:"500",open:true,onClosed:function(){
                   }});         
                }else{
                    $(".estudianteclass").hide();
                   
                    $(".ajax_content").html("<b>Viendo las notas de: "+data.nombre+"</b>");
                    cargarmaterias();
                }
            },"json");
            
            $(".estudianteclass ul li").click(function(){
                var id=$(this).attr("id").split("_");
                var nombre_=$(this).attr("nombre");
                $(".ajax_content").html("<b>Viendo las notas de: "+nombre_+"</h2>");
                
                $(".mensajes").html("Accediendo a los datos del estudiante...");
                $.post("/padres/registrarsession",{id:id[1],nombre:nombre_},function(data){
                    modal.colorbox.close();
                    cargarmaterias();
                },"json");
                $(".estudianteclass").hide();
            });
            function cargarmaterias(){
                 $.post("/padres/cargarmaterias/",{},function(data){
                        if(data.haymaterias)
                        {
                            html="";
                            for(var i=0;i<data.materias.length;i++){
                                
                                html+="<li class='materia'><a href='/padres/plantillaNotaMateria/"+data.materias[i].asignar_id+"/1'><span class='texto'>"+data.materias[i].nombre_materia+" T1</span><span class='f'>></span></a></li>";
                                html+="<li class='materia'><a href='/padres/plantillaNotaMateria/"+data.materias[i].asignar_id+"/2'><span class='texto'>"+data.materias[i].nombre_materia+" T1</span><span class='f'>></span></a></li>";
                                html+="<li class='materia'><a href='/padres/plantillaNotaMateria/"+data.materias[i].asignar_id+"/3'><span class='texto'>"+data.materias[i].nombre_materia+" T1</span><span class='f'>></span></a></li>";
                            }
                            $("ul.submenu").html(html);
                            /*Creamos los eventos para los botones*/
                            var notas="";
                            $(".materia").click(function(e){
                               e.preventDefault();
                               var link=$("a",this).attr("href");
                               var idNotas=link.split("/");
                                $(".ajax_content").load("/padres/notas/"+idNotas[3]+"/"+idNotas[4]);
                                
                            });
                        }else{
                             $("ul.submenu").html("<li><a>No tiene materias asignadas</a></li>");
                        }
                     },"json");
                     
            }
            $(".calendario").click(function(e){
                e.preventDefault();
                $(".ajax_content").load($("a",this).attr("href"));
            });
            $(".panel").click(function(e){
                e.preventDefault();
                $(".estudianteclass").show();
                modal=$("#est").colorbox({href:".estudianteclass",inline:true, width:"500",open:true,onClosed:function(){
                    $(".estudianteclass").hide();
                }});         
            });
            
        });
    {/literal}
</script>
<div id="contentLeft" class="span-4">
        <div>
    	<div  class="maskuser"><img src="{php}echo imagenAlumno(){/php}" height="150" width="150" /></div> 
     	<div> 
               
      <div id="menu" class="menu-new" >
        <ul>
          <li><a href="#content">
          <span  class="texto">Materias</span>
               <span class="f">></span>
          </a>
            <ul class="submenu">
            
            </ul>
          </li>
          <li class="calendario">
          <a href="/padres/vistatareas">
            <span  class="texto">Calendario</span>
               <span class="f">></span>
          </a>
          </li>
          <li class="panel">
            <a href="#">
            <span  class="texto">Ver de.</span>
               <span class="f">></span>
          </a>
          </li>
          <li><a href="/administrador/cerrarSesion">
            <span  class="texto">Salir</span>
               <span class="f">></span>
          </a></li>
        </ul>
      </div>
       
      </div>
     </div>
    </div>
    <div class="s_content">
    {if isset($smarty.get.mensaje)}
      <div class="success" id="info">{$smarty.get.mensaje}</div>
    {/if}
<div class="ajax_content">
    
</div>
<div id="est">
    
</div>
<div class="estudianteclass">
<h2>
    Ver notas de:
</h2>
<ul>
    {foreach from=$lista key=key item=usuario}
        <li id="li_{$usuario.alumno_id}" nombre="{$usuario.nombre} {$usuario.apellido}">
             {$usuario.nombre} {$usuario.apellido} <b>Curso</b> {$usuario.nombre_curso} --> {$usuario.alumno_id}
        </li>
    {/foreach}
</ul>
<div class="mensajes">
    
</div>
</div>

{include file="footers/padre.tpl"}