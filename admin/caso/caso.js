$(document).ready(function() {       
                
                
        $('#cancelar_registro').click(function(event){
            window.location = "usuario_lista.php";
        });
        // registrar caso
        $('#registrar').click(function(){            
            var titulo = $.trim(document.getElementById("titulo").value);
            var id_tipocaso = document.getElementById("id_tipocaso").value;            
            if ( titulo.length > 0 ){
                //$('#carga1').html('<div><img src="../imagenes/pagina/ajax-loader.gif"/></div>');
                var valores = {    
                    "accion" : "registrar-caso",
                    "titulo" : titulo,       
                    "id_tipocaso": id_tipocaso
                };
                $.ajax({
                        data:  valores,
                        url:   'caso_ajax.php',
                        type:  'post',
                        beforeSend: function () {
                        },
                        success:  function (respuesta) {                            
                            var id_registrado = $.trim(respuesta);
                            window.location = "caso_edicion.php?id="+id_registrado;
                        }
                });
            }else{    
                $("#titulo").focus();
                alert("Datos incorrectos");
            }            
        });
        
           
        
});