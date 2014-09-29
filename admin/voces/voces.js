$(document).ready(function() {       
                
        
        $('#editar_voz').click(function(){
            $('.editable').removeAttr('disabled');
            $('.editable').css("font-weight","normal");
            $('#editar_voz').attr("disabled","true");
            $('.eliminar_voz').attr("disabled","true");
            document.getElementById("nombre_voz").focus(); 
            $('.modificar_voz').removeAttr('disabled');
            $('.cancelar_modificacion_voz').removeAttr('disabled');
        });
        
        $('.cancelar_modificacion_voz').click(function(event){
            location.reload();
        });
        
        $('.modificar_voz').click(function(event){
            var id = event.target.id;            
            var voz    = $.trim(document.getElementById("nombre_voz").value);
            var estado = document.getElementById("miselectestado_voz").value;  
            if ( voz.length > 0 ){
                //$('#carga1').html('<div><img src="../imagenes/pagina/ajax-loader.gif"/></div>');
                var valores = {    
                    "accion" : "modificar-voz",
                    "id" : id,
                    "voces" : voz,                  
                    "estado": estado
                };
                $.ajax({
                        data:  valores,
                        url:   'voces_ajax.php',
                        type:  'post',
                        beforeSend: function () {
                        },
                        success:  function (respuesta) {
                            location.reload();
                        }
                });
            }else{
                $("#nombre_voz").focus();
                alert("Datos incorrectos");
            }            
        });
        
        $('.eliminar_voz').click(function(event){    
            if ( confirm("Esta seguro de eliminar la voz") ){
                var id = event.target.id; 
                var valores = {    
                    "accion" : "eliminar-voz",
                    "id" : id
                };
                $.ajax({
                        data:  valores,
                        url:   'voces_ajax.php',
                        type:  'post',
                        beforeSend: function () {
                        },
                        success:  function (respuesta) {                        
                            if ( respuesta == 'false' )                        
                                alert('No se puede eliminar porque tiene sinonimos o esta relacionado a algunos casos');
                            else
                                location.reload();
                        }
                });
            }    
        });
        
        $('.registrar_sinonimo').click(function(){
            var id_voz = event.target.id; 
            var sinonimo = $.trim(document.getElementById("sinonimo_registrar").value);
            
            if ( sinonimo.length > 0 ){
                //$('#carga1').html('<div><img src="../imagenes/pagina/ajax-loader.gif"/></div>');
                var valores = {    
                    "accion" : "registrar-sinonimo",
                    "id_voz" : id_voz,
                    "sinonimo" : sinonimo
                };
                $.ajax({
                        data:  valores,
                        url:   'voces_ajax.php',
                        type:  'post',
                        beforeSend: function () {
                        },
                        success:  function (respuesta) {                            
                            location.reload();
                        }
                });
            }else{    
                $("#nombre_usuario").focus();
                alert("Datos incorrectos");
            }            
        }); 
          
    
        $('.eliminar-sinonimo').click(function(event){                
            if ( confirm("Esta seguro de eliminar el sinonimo") ){
                var id_sin = event.target.id; 
                var valores = {    
                    "accion" : "eliminar-sinonimo",
                    "id_sin" : id_sin
                };
                $.ajax({
                        data:  valores,
                        url:   'voces_ajax.php',
                        type:  'post',
                        beforeSend: function () {
                        },
                        success:  function (respuesta) {
                            location.reload();
                        }
                });
            }            
        });
                        
        $('.cancelar_modificacion_sinonimo').click(function(event){
            var id_voz = $('#id_voz').attr('class');
            location.href = "voces_editar.php?id="+id_voz;
        });
        
        $('.modificar_sinonimo').click(function(event){
            var id_sinonimo = event.target.id;            
            var sinonimo    = $.trim(document.getElementById("nombre_sinonimo").value); 
                        
            var id_voz = $('#id_voz').attr('class');
            if ( sinonimo.length > 0 ){
                //$('#carga1').html('<div><img src="../imagenes/pagina/ajax-loader.gif"/></div>');
                var valores = {    
                    "accion" : "modificar-sinonimo",
                    "id_sinonimo" : id_sinonimo,
                    "sinonimo" : sinonimo                    
                };
                $.ajax({
                        data:  valores,
                        url:   'voces_ajax.php',
                        type:  'post',
                        beforeSend: function () {
                        },
                        success:  function (respuesta) {
                            location.href = "voces_editar.php?id="+id_voz;
                        }
                });
            }else{
                $("#nombre_sinonimo").focus();
                alert("Datos incorrectos");
            }            
        });
        
        $('#registrar_voz').click(function(){
            
            var voz_descripcion = $.trim(document.getElementById("voz_descripcion").value);
            var estado = document.getElementById("miselectestado_voz").value;
            
            if ( voz_descripcion.length > 0 ){
                //$('#carga1').html('<div><img src="../imagenes/pagina/ajax-loader.gif"/></div>');
                var valores = {    
                    "accion" : "registrar-voz",
                    "voz" : voz_descripcion,           
                    "estado": estado
                };
                $.ajax({
                        data:  valores,
                        url:   'voces_ajax.php',
                        type:  'post',
                        beforeSend: function () {
                        },
                        success:  function (respuesta) {
                            var id_voz_registrado = $.trim(respuesta);
                            window.location = "voces_editar.php?id="+id_voz_registrado;
                        }
                });
            }else{    
                $("#voz_descripcion").focus();
                alert("Datos incorrectos");
            }            
        });
        
        $('#cancelar_registro').click(function(){
            window.location = "voces_lista.php";                     
        });
        
        
});