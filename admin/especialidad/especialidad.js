$(document).ready(function() {       
                
        
        $('#miselectrol').change(function(){
            var id_rol = document.getElementById("miselectrol").value;
            document.location.href = 'usuario_lista.php?rol='+id_rol;
        });
              
        $('.cancelar_modificacion').click(function(event){
            var id = event.target.id;            
            var valores = {    
                "accion" : "cancelar-modificacion-especialidad",
                "id" : id
            };
            $.ajax({
                    data:  valores,
                    url:   'especialidad_ajax.php',
                    type:  'post',
                    beforeSend: function () {
                    },
                    success:  function (respuesta) {
                        location.href = "especialidad_arbol.php?id="+respuesta;
                    }
            });
            
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
                            location.href = "especialidad_arbol.php?id="+respuesta;
                        }
                });
            }else{
                $("#nombre_usuario").focus();
                alert("Datos incorrectos");
            }
            
        });
        
        
        $('.registrar_especialidad').click(function(event){
            var id_padre = event.target.id;        
            var especialidad_resgitrar = $.trim(document.getElementById("especialidad_registrar").value);                        
            
            if ( especialidad_resgitrar.length > 0 ){
                //$('#carga1').html('<div><img src="../imagenes/pagina/ajax-loader.gif"/></div>');
                var valores = {    
                    "accion" : "registrar-especialidad",
                    "id_padre" : id_padre,
                    "especialidad" : especialidad_resgitrar
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
                $("#especialidad_registrar").focus();
                alert("Datos incorrectos");
            }
        });
        
        $('.eliminar-especialidad').click(function(event){
            var id_especialidad = event.target.id;            
            if ( confirm("Esta seguro de eliminar la especialidad") ){
                //$('#carga1').html('<div><img src="../imagenes/pagina/ajax-loader.gif"/></div>');
                var valores = {    
                    "accion" : "eliminar_especialidad",
                    "id_especialidad" : id_especialidad
                };
                $.ajax({
                        data:  valores,
                        url:   'especialidad_ajax.php',
                        type:  'post',
                        beforeSend: function () {
                        },
                        success:  function (respuesta) {
                            if ( respuesta == 'false' )
                                alert("No se puede eliminar porque tiene subespecialidades o casos relacionados");
                            else
                                location.reload();
                        }
                });
            }
        });
                      
        
});
