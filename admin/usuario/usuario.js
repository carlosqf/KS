$(document).ready(function() {       
                
        
        $('#miselectrol').change(function(){
            var id_rol = document.getElementById("miselectrol").value;
            document.location.href = 'usuario_lista.php?rol='+id_rol;
        });
            
        $('#editar').click(function(){
            $('.editable').removeAttr('disabled');
            $('.editable').css("font-weight","normal");
            $('#editar').attr("disabled","true");
            $('.eliminar_usuario').attr("disabled","true");
            document.getElementById("nombre_usuario").focus(); 
            $('.modificar').removeAttr('disabled');
            $('.cancelar_modificacion').removeAttr('disabled');
        });
        
        $('.cancelar_modificacion').click(function(event){
            location.reload();
        });
        
        $('.modificar').click(function(event){
            var id = event.target.id;
            
            var nombre = $.trim(document.getElementById("nombre_usuario").value);
            var identificador = $.trim(document.getElementById("identificador_usuario").value);
            var user = $.trim(document.getElementById("user_usuario").value);
            var password = $.trim(document.getElementById("password_usuario").value);
            var rol = document.getElementById("miselectrol_mod").value;
            var telefono = $.trim(document.getElementById("telefono_usuario").value);
            var estado = document.getElementById("miselectestado_mod").value;
            
            if ( user.length > 0 && password.length > 0 ){
                //$('#carga1').html('<div><img src="../imagenes/pagina/ajax-loader.gif"/></div>');
                var valores = {    
                    "accion" : "modificar-usuario",
                    "id" : id,
                    "nombre" : nombre,
                    "identificador" : identificador,
                    "user" : user,                    
                    "password" : password,
                    "rol" : rol,
                    "telefono" : telefono,                    
                    "estado": estado
                };
                $.ajax({
                        data:  valores,
                        url:   'usuario_ajax.php',
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
        
        $('#cancelar_registro').click(function(event){
            window.location = "usuario_lista.php";
        });
        
        $('#registrar').click(function(){
            
            var nombre = $.trim(document.getElementById("nombre_usuario").value);
            var identificador = $.trim(document.getElementById("identificador_usuario").value);
            var user = $.trim(document.getElementById("user_usuario").value);
            var password = $.trim(document.getElementById("password_usuario").value);
            var rol = document.getElementById("miselectrol_mod").value;
            var telefono = $.trim(document.getElementById("telefono_usuario").value);
            var estado = document.getElementById("miselectestado_mod").value;
            
            if ( user.length > 0 && password.length > 0 ){
                //$('#carga1').html('<div><img src="../imagenes/pagina/ajax-loader.gif"/></div>');
                var valores = {    
                    "accion" : "registrar-usuario",
                    "nombre" : nombre,
                    "identificador" : identificador,
                    "user" : user,                    
                    "password" : password,
                    "rol" : rol,
                    "telefono" : telefono,           
                    "estado": estado
                };
                $.ajax({
                        data:  valores,
                        url:   'usuario_ajax.php',
                        type:  'post',
                        beforeSend: function () {
                        },
                        success:  function (respuesta) {
                            var id_registrado = $.trim(respuesta);
                            window.location = "usuario_detalle.php?id="+id_registrado;
                        }
                });
            }else{    
                $("#nombre_usuario").focus();
                alert("Datos incorrectos");
            }            
        });
           
        
});