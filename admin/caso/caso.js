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
        
        
        $('#edit_titulo').click(function (){
            var left = screen.width;
            var top = screen.height;
            var width  = 600;
            var height = 240;            
            var mydiv = document.getElementById('id_caso');            
            var id_caso = mydiv.getAttribute("data-brand");            
            window.open("editar_titulo.php?id="+id_caso, "_blank", "toolbar=yes, scrollbars=yes, resizable=0, top="+((top/2)-(height/2))+", left="+((left/2)-(width/2))+", width="+width+", height="+height);
        });        
        $('.ventana_titulo').click(function (){
            javascript:window.close();     
        });        
        $('.boton_modificar_titulo').click(function (event){
            var id_caso = event.target.id;
            var titulo_nuevo = $.trim(document.getElementById("titulo_nuevo_modificar").value);            
            var valores = {    
                "accion" : "modificar-titulo",
                "id_caso": id_caso,
                "titulo" : titulo_nuevo                
            };
            $.ajax({
                    data:  valores,
                    url:   'caso_ajax.php',
                    type:  'post',
                    beforeSend: function () {
                    },
                    success:  function () {
                        parametros={};
                        parametros.id_caso = id_caso;
                        window.opener.document.getElementById("div_titulo_caso").load('titulo.php');
                        javascript:window.close(); 
                        //window.opener.document.location.reload();
                                                
                    }
            });            
        });
        
           
        
});