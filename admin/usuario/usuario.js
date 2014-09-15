$(document).ready(function() {  
    
    
//	$('.paginate').live('click', function(){
//		//$('#content').html('<div class="loading"><img src="../../imagenes/loading.gif" width="70px" height="70px"/></div>');
//		var page = $(this).attr('data');		
//		var dataString = 'page='+page;
//		$.ajax({
//                    type: "GET",
//                    url: "pagination.php",
//                    data: dataString,
//                    success: function(data) {
//                        $('#content').fadeIn(500).html(data);
//                    }
//                });
//        });     
        
        $('.paginate').live('click', function(){
		//$('#content').html('<div class="loading"><img src="../../imagenes/loading.gif" width="70px" height="70px"/></div>');
		var page = $(this).attr('data');
                parametros={};
                parametros.accion = "lista";
                parametros.pagina = page;
                parametros.id_rol = document.getElementById("miselectrol").value;
                $('#contenido').load('index.php',parametros,function(){});
        });
        
        $('#miselectrol').change(function(){
            parametros={};
            parametros.accion = "lista";
            parametros.id_rol = document.getElementById("miselectrol").value;
            $('#contenido').load('index.php', parametros, function(){});
        });
        
        
});


