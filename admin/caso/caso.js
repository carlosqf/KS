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
                            window.location = "edicion_consulta.php?id="+id_registrado;
                        }
                });
            }else{    
                $("#titulo").focus();
                alert("Datos incorrectos");
            }            
        });
        
        
        // inicio de modificacion de TITULO
        $('#edit_titulo').click(function (){
            var left = screen.width;
            var top = screen.height;
            var width  = 600;
            var height = 260;            
            var mydiv = document.getElementById('id_caso');            
            var id_caso = mydiv.getAttribute("data-brand");            
            window.open("cargadores/titulo_editar.php?id="+id_caso, "_blank", "toolbar=yes, scrollbars=yes, resizable=0, top="+((top/2)-(height/2))+", left="+((left/2)-(width/2))+", width="+width+", height="+height);
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
                    url:   '../caso_ajax.php',
                    type:  'post',
                    beforeSend: function () {
                    },
                    success:  function () {
                        parametros={};
                        parametros.id_caso = id_caso;
                        window.opener.$('#div_titulo_caso').load('cargadores/titulo.php',parametros,function(){});
                        javascript:window.close();                                                
                    }
            });            
        });
        // FIN de modificacion de TITULO
        
        
        
        // inicio de modificacion de TIPO_CASO
        $('#edit_tipocaso').click(function (){
            var left = screen.width;
            var top = screen.height;
            var width  = 400;
            var height = 240;            
            var mydiv = document.getElementById('id_caso');            
            var id_caso = mydiv.getAttribute("data-brand");            
            window.open("cargadores/tipocaso_editar.php?id="+id_caso, "_blank", "toolbar=yes, scrollbars=yes, resizable=0, top="+((top/2)-(height/2))+", left="+((left/2)-(width/2))+", width="+width+", height="+height);
        });        
        $('.ventana_tipocaso').click(function (){
            javascript:window.close();     
        });        
        $('.boton_modificar_tipocaso').click(function (event){
            var id_caso = event.target.id;
            var tipocaso_nuevo = $.trim(document.getElementById("tipocaso_nuevo_modificar").value);            
            var valores = {    
                "accion" : "modificar-tipocaso",
                "id_caso" : id_caso,
                "id_tipocaso": tipocaso_nuevo          
            };
            $.ajax({
                    data:  valores,
                    url:   '../caso_ajax.php',
                    type:  'post',
                    beforeSend: function () {
                    },
                    success:  function () {
                        parametros={};
                        parametros.id_caso = id_caso;
                        window.opener.$('#div_tipocaso_caso').load('cargadores/tipocaso.php',parametros,function(){});
                        javascript:window.close();                                                
                    }
            });            
        });
        // FIN de modificacion de TIPO_CASO
        
        
        
        // inicio de modificacion de ESTADO
        $('#edit_estado').click(function (){
            var left = screen.width;
            var top = screen.height;
            var width  = 400;
            var height = 240;            
            var mydiv = document.getElementById('id_caso');            
            var id_caso = mydiv.getAttribute("data-brand");            
            window.open("cargadores/estado_editar.php?id="+id_caso, "_blank", "toolbar=yes, scrollbars=yes, resizable=0, top="+((top/2)-(height/2))+", left="+((left/2)-(width/2))+", width="+width+", height="+height);
        });        
        $('.ventana_estado').click(function (){
            javascript:window.close();     
        });        
        $('.boton_modificar_estado').click(function (event){
            var id_caso = event.target.id;
            var id_estado = $.trim(document.getElementById("estado_nuevo_modificar").value);            
            var valores = {
                "accion" : "modificar-estado",
                "id_caso" : id_caso,
                "id_estado": id_estado          
            };
            $.ajax({
                    data:  valores,
                    url:   '../caso_ajax.php',
                    type:  'post',
                    beforeSend: function () {
                    },
                    success:  function () {
                        parametros={};
                        parametros.id_caso = id_caso;
                        window.opener.$('#div_estado_caso').load('cargadores/estado.php',parametros,function(){});
                        javascript:window.close();                                                
                    }
            });            
        });
        // FIN de modificacion de ESTADO
        
        
        
        // inicio de modificacion de ESPECIALIDAD
        $('#edit_especialidad').click(function (){
            var left = screen.width;
            var top = screen.height;
            var width  = 830;
            var height = 500;            
            var mydiv = document.getElementById('id_caso');            
            var id_caso = mydiv.getAttribute("data-brand");            
            window.open("cargadores/especialidad_editar.php?id="+id_caso, "_blank", "toolbar=yes, scrollbars=yes, resizable=0, top="+((top/2)-(height/2))+", left="+((left/2)-(width/2))+", width="+width+", height="+height);
        });        
        $('.ventana_especialidad').click(function (){
            javascript:window.close();     
        });        
        $('.guardar-especialidad').click(function (event){
            var especialidad_caso = event.target.id;
            var array = especialidad_caso.split('-');
            
            var id_especialidad = array[0];
            var id_caso = array[1];
            
            var valores = {
                "accion" : "modificar-especialidad",
                "id_caso" : id_caso,
                "id_especialidad": id_especialidad          
            };
            $.ajax({
                    data:  valores,
                    url:   '../caso_ajax.php',
                    type:  'post',
                    beforeSend: function () {
                    },
                    success:  function () {
                        parametros={};
                        parametros.id_caso = id_caso;
                        window.opener.$('#div_especialidad_caso').load('cargadores/especialidad.php',parametros,function(){});
                        javascript:window.close();                                                
                    }
            });            
        });
        // FIN de modificacion de ESPECIALIDAD
        
        // inicio de modificacion de NUMERO GRUPO DE DOCUMENTOS
        $('#edit_grupodocumentos').click(function (){
            var left = screen.width;
            var top = screen.height;
            var width  = 400;
            var height = 240;            
            var mydiv = document.getElementById('id_caso');            
            var id_caso = mydiv.getAttribute("data-brand");            
            window.open("cargadores/grupodocumentos_editar.php?id="+id_caso, "_blank", "toolbar=yes, scrollbars=yes, resizable=0, top="+((top/2)-(height/2))+", left="+((left/2)-(width/2))+", width="+width+", height="+height);
        });        
        $('.ventana_grupodocumentos').click(function (){
            javascript:window.close();     
        });        
        $('.boton_modificar_grupodocumentos').click(function (event){
            var id_caso = event.target.id;            
            var id_docs = $.trim(document.getElementById("id_docs").value);
            var valores = {
                "accion" : "modificar-id_docs",
                "id_caso" : id_caso,
                "id_docs": id_docs          
            };
            $.ajax({
                    data:  valores,
                    url:   '../caso_ajax.php',
                    type:  'post',
                    beforeSend: function () {
                    },
                    success:  function () {
                        parametros={};
                        parametros.id_caso = id_caso;
                        window.opener.$('#div_grupodocumentos_caso').load('cargadores/grupodocumentos.php',parametros,function(){});
                        javascript:window.close();                                                
                    }
            });            
        });
        // FIN de modificacion de NUMERO GRUPO DE DOCUMENTOS
           
           
        // inicio de modificacion de VOCES
        $('#edit_voces').click(function (){
            var left = screen.width;
            var top = screen.height;
            var width  = 830;
            var height = 588;            
            var mydiv = document.getElementById('id_caso');            
            var id_caso = mydiv.getAttribute("data-brand");            
            window.open("cargadores/voces_editar.php?id="+id_caso, "_blank", "toolbar=yes, scrollbars=yes, resizable=0, top="+(((top/2)-(height/2))-20)+", left="+((left/2)-(width/2))+", width="+width+", height="+height);
        });        
        $('.guardar-voces').click(function (event){
            var id_caso = event.target.id;
            parametros={};
            parametros.id_caso = id_caso;
            window.opener.$('#div_voces_caso').load('cargadores/voces.php',parametros,function(){});
            window.opener.$('#div_vocessinonimos_caso').load('cargadores/voces_sinonimos.php',parametros,function(){});
            javascript:window.close();                          
        });
        // FIN de modificacion de VOCES   
        
});