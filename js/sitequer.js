    // parseUri 1.2.2
// (c) Steven Levithan <stevenlevithan.com>
// MIT License
(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
$(document).ready(function(){
	
    $(".link").hover(function(){
       $(this).children("span").animate({"margin-left":160},140);
    },function(){
        $(this).children("span").animate({"margin-left":140},140);
    });
    
    var i=1;
    var ids=1;
    var htmldata=[];
    $("#link_1").addClass("overpush");
    $(".imgsliders").children("li").each(function(){
        htmldata.push($(this).html());
    });
    killhtml("img1");
    function killhtml(img){
    $(".imgsliders").children("li").each(function(s){
        if($(this).children("img").attr("id")!=img)
        {
            $(this).html("");
        }
    });    
    }
    for(i;i<4;i++)
    {
        $("#link_"+i).click(function(){
            if($(this).attr("class")=="releasepush overpush")
            {
                retun;
            }
            for(i=1;i<4;i++)
            {
                $("#link_"+i).removeClass("overpush");
            }
            
            $("#img"+ids).animate({"opacity":0},"100",null,function(){
                    var obj=$(this);
                    $(".imgsliders").css("margin-left",-980);
                    $(".imgsliders").html("<li>"+htmldata[ids-1]+"</li>");
                    $(".imgsliders").animate({"margin-left":0},"1000",null,function(){
                        //killhtml($("#img"+$(this).attr("key")).attr("id"));
                    });
            });
            $(this).addClass("overpush");
            ids=$(this).attr("key");
        });
    }
function parseUri (str) {
	var	o   = parseUri.options,
		m   = o.parser[o.strictMode ? "strict" : "loose"].exec(str),
		uri = {},
		i   = 14;

	while (i--) uri[o.key[i]] = m[i] || "";

	uri[o.q.name] = {};
	uri[o.key[12]].replace(o.q.parser, function ($0, $1, $2) {
		if ($1) uri[o.q.name][$1] = $2;
	});

	return uri;
};

parseUri.options = {
	strictMode: false,
	key: ["source","protocol","authority","userInfo","user","password","host","port","relative","path","directory","file","query","anchor"],
	q:   {
		name:   "queryKey",
		parser: /(?:^|&)([^&=]*)=?([^&]*)/g
	},
	parser: {
		strict: /^(?:([^:\/?#]+):)?(?:\/\/((?:(([^:@]*)(?::([^:@]*))?)?@)?([^:\/?#]*)(?::(\d*))?))?((((?:[^?#\/]*\/)*)([^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,
		loose:  /^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/)?((?:(([^:@]*)(?::([^:@]*))?)?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/
	}
};
                    $(".menu-new ul li a").hover(function(){
                        
                        $(this).animate({"width":170},200);
                        $(this).children(".texto").css("color","#ffffff");
                        $(this).children(".f").animate({"margin-left":20},150);
                        $(this).children(".texto").animate({"margin-left":8},150);
                        //$(this).css("background-color","#2B3D0E");
                        
                    },function(){
                        if($(this).attr("open")!="true"){
                           //$(this).css("background-color","#D9DCD1");
                            $(this).animate({"width":160},200);
                            $(this).children(".texto").css("color","#60762E");
                            $(this).children(".f").animate({"margin-left":0},150);
                            $(this).children(".texto").animate({"margin-left":0},150);
                    
                            
                        }
                        
                    });
                    
                    /*$(".menu-new ul li a").click(function(e){
                        e.preventDefault();
                        console.debug("in");
                        var uri=$(this).attr("href");
                        if($(this).attr("open")=="true"){
                           $(this).attr("open","false");
                           $(this).css("background-color","#D9DCD1");
                           $(".submenu").hide(500);
                           //background-color:#D9DCD1;
                        }else{
                           $(this).css("background-color","#2B3D0E");
                        $(this).attr("open","true");
                        if(uri=="#content"){
                           $(".submenu").show(150);
                           
                        } 
                            
                        }
                        
                    });*/
                    //$(".submenu").hide();
                    
                    /*
                    Transformación de formularios comunes y corrientes
                    */
                    $('form').jqTransform({imgPath:'/js/img/'});
                    /*
                    control de vistas módulo profesor
                    */
                    
                    $("#btnmostrar").click(function(){
                        if($(this).children("span").html()=="Ver Todo")
                        {
                         $(this).children("span").html("cerrar")
                           $("#contentScroller").animate({"width":1200},150); 
                        }else if($(this).children("span").html()=="cerrar")
                        {
                            $(this).children("span").html("Ver Todo")
                           $("#contentScroller").animate({"width":810},150); 
                        }
                        
                    });
                    
                    
                    
});