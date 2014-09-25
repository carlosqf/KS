$(document).ready(function() {       
                
        
        $('#miselectrol').change(function(){
            var id_rol = document.getElementById("miselectrol").value;
            document.location.href = 'usuario_lista.php?rol='+id_rol;
        });
            
        $('#editar').click(function(){
            $('.editable').removeAttr('disabled');
            $('.editable').css("font-weight","normal");
            $('#editar').attr("disabled","true");
            $('.eliminar_especialidad').attr("disabled","true");
            document.getElementById("especialidad_descripcion").focus(); 
            $('.modificar').removeAttr('disabled');
            $('.cancelar_modificacion').removeAttr('disabled');
        });
        
        $('.cancelar_modificacion').click(function(event){
            location.reload();
        });
        
        $('.modificar').click(function(event){
            var id = event.target.id;
            
            var especialidad = $.trim(document.getElementById("especialidad_descripcion").value);            
            var estado = document.getElementById("miselect_estado").value;
            if ( especialidad.length > 0 ){
                //$('#carga1').html('<div><img src="../imagenes/pagina/ajax-loader.gif"/></div>');
                var valores = {    
                    "accion" : "modificar-especialidad",
                    "id" : id,
                    "especialidad" : especialidad,        
                    "estado": estado
                };
                $.ajax({
                        data:  valores,
                        url:   'especialidad_ajax.php',
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
                      
        
});
