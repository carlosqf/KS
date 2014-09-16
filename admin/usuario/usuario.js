$(document).ready(function() {       
    
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
            var id_rol = document.getElementById("miselectrol").value;
            document.location.href = 'usuario_lista.php?rol='+id_rol;
        });
        
        $('#buscar').click(function(){  
            var texto_con_espacio = document.getElementById('texto_busqueda').value;
            var texto_sin_espacio = texto_con_espacio.trim();
            if (texto_sin_espacio.length > 0){
                parametros={};
                parametros.accion = "busqueda";
                parametros.nombre_buscar  = texto_sin_espacio;
                $('#contenido').load('index.php', parametros, function(){})
            }else{
                document.getElementById("texto_busqueda").value = "";
                document.getElementById("texto_busqueda").focus(); 
            }
        });
        
        $('#texto_busqueda').keypress(function(event){  
            var keycode = (event.keyCode ? event.keyCode : event.which);  
            if(keycode == '13'){  
                var texto_con_espacio = document.getElementById('texto_busqueda').value;
                var texto_sin_espacio = texto_con_espacio.trim();            
                if (texto_sin_espacio.length > 0){
                    parametros={};
                    parametros.accion = "busqueda";
                    parametros.nombre_buscar = texto_sin_espacio;
                    $('#contenido').load('index.php', parametros, function(){});
                }else{
                    document.getElementById("texto_busqueda").value = "";
                    document.getElementById("texto_busqueda").focus(); 
                }
            }   
        });
        
        $('#editar').click(function(){
            $('.editable').removeAttr('disabled');
            $('.editable').css("font-weight","normal");
            $('#editar').attr("disabled","true");
            document.getElementById("nombre_usuario").focus(); 
            $('#modificar').removeAttr('disabled');
            $('.cancelar_modificacion').removeAttr('disabled');
        });
        
        $('.cancelar_modificacion').click(function(event){
            var id = event.target.id; 
            parametros={};
            parametros.accion = "detalle";
            $('#contenido').load('index.php?id='+id, parametros, function(){});
        });
        
        $('.usuario_enlace').click(function(event){
            var id = event.target.id; 
            parametros={};
            parametros.accion = "detalle";
            parametros.id = id;
            $('#contenido').load('index.php', parametros, function(){});
        });
        
        
        
});


