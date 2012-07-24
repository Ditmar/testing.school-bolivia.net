<?php /* Smarty version 2.6.26, created on 2012-06-08 02:11:54
         compiled from padres/bienvenido.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headers/padre.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script>
    <?php echo '
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
                                
                                html+="<li class=\'materia\'><a href=\'/padres/plantillaNotaMateria/"+data.materias[i].asignar_id+"/1\'><span class=\'texto\'>"+data.materias[i].nombre_materia+" T1</span><span class=\'f\'>></span></a></li>";
                                html+="<li class=\'materia\'><a href=\'/padres/plantillaNotaMateria/"+data.materias[i].asignar_id+"/2\'><span class=\'texto\'>"+data.materias[i].nombre_materia+" T1</span><span class=\'f\'>></span></a></li>";
                                html+="<li class=\'materia\'><a href=\'/padres/plantillaNotaMateria/"+data.materias[i].asignar_id+"/3\'><span class=\'texto\'>"+data.materias[i].nombre_materia+" T1</span><span class=\'f\'>></span></a></li>";
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
    '; ?>

</script>
<div id="contentLeft" class="span-4">
        <div>
    	<div  class="maskuser"><img src="<?php echo imagenAlumno() ?>" height="150" width="150" /></div> 
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
    <?php if (isset ( $_GET['mensaje'] )): ?>
      <div class="success" id="info"><?php echo $_GET['mensaje']; ?>
</div>
    <?php endif; ?>
<div class="ajax_content">
    
</div>
<div id="est">
    
</div>
<div class="estudianteclass">
<h2>
    Ver notas de:
</h2>
<ul>
    <?php $_from = $this->_tpl_vars['lista']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['usuario']):
?>
        <li id="li_<?php echo $this->_tpl_vars['usuario']['alumno_id']; ?>
" nombre="<?php echo $this->_tpl_vars['usuario']['nombre']; ?>
 <?php echo $this->_tpl_vars['usuario']['apellido']; ?>
">
             <?php echo $this->_tpl_vars['usuario']['nombre']; ?>
 <?php echo $this->_tpl_vars['usuario']['apellido']; ?>
 <b>Curso</b> <?php echo $this->_tpl_vars['usuario']['nombre_curso']; ?>
 --> <?php echo $this->_tpl_vars['usuario']['alumno_id']; ?>

        </li>
    <?php endforeach; endif; unset($_from); ?>
</ul>
<div class="mensajes">
    
</div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footers/padre.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>