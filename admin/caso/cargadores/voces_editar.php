<html xml:lang="es" lang="es">
<head>
<title>Edicion de Voces</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../../css/reset.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../../css/main.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../../css/2col.css" title="2col" />
<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="../../../css/1col.css" title="1col" />
<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]-->
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../../css/style.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../../css/mystyle.css" />
<script type="text/javascript" src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../../../js/switcher.js"></script>
<script type="text/javascript" src="../../../js/toggle.js"></script>
<script type="text/javascript" src="../../../js/ui.core.js"></script>
<script type="text/javascript" src="../../../js/ui.tabs.js"></script>

<script type="text/javascript" src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../caso.js"></script>

<script type="text/javascript">
    $(document).ready(function(){            
            $('.buscar_voces').click(function(event){
                var id_caso  = event.target.id;            
                var voz_buscar = $.trim(document.getElementById("vozsin_buscar").value);                
                location.href = "voces_editar.php?id="+id_caso+"&txt="+voz_buscar;
            });
            
            $('#vozsin_buscar').keypress(function(event){                  
                var keycode = (event.keyCode ? event.keyCode : event.which);                  
                if(keycode == '13'){                      
                    var texto_con_espacio = document.getElementById('vozsin_buscar').value
                    var texto_sin_espacio = texto_con_espacio.trim();                                
                    if (texto_sin_espacio.length > 0){                        
                        var mydiv = document.getElementById('id_caso');            
                        var id_caso = mydiv.getAttribute("data-brand");                        
                        location.href = "voces_editar.php?id="+id_caso+"&txt="+texto_sin_espacio;
                    }else{
                        document.getElementById("vozsin_buscar").value = "";
                        document.getElementById("vozsin_buscar").focus(); 
                    }
                }   
            });
            
            $('.quitar-voz').click(function(event){                
                var voz_caso = event.target.id;
                var array = voz_caso.split('-');

                var id_voz = array[0];
                var id_caso = array[1];                
                          
                var valores = {
                    "accion" : "quitar-voz",
                    "id_caso" : id_caso,
                    "id_voz": id_voz
                };
                $.ajax({
                        data:  valores,
                        url:   '../cargadores_ajax.php',
                        type:  'post',
                        beforeSend: function () {
                        },
                        success:  function () {
                            parametros={};
                            parametros.id_caso = id_caso;
                            $('#div_voces_casos').load('voces_agregados.php',parametros,function(){});          
                        }
                }); 
            );
            
    });
</script>

</head>
<body>
        
    <div id="content" class="box" style="min-height: 545px; width: 785px;">
    
        <div align="center"><h2>Editar voces</h2></div>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_caso.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_voces.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_voces_sin.php';

$caso = new mod_caso();
$voces = new mod_voces();
$voces_sin = new mod_voces_sin();
    
$id_caso = $_GET['id']; // id del caso
$caso_registro = $caso->consultarPorCodigo($id_caso);    
?>        
    
        CASO NUMERO: <b><span id="id_caso" data-brand="<?php echo $id_caso;?>"><?php echo $id_caso;?></span></b>
    <?php 
    $voces_del_caso = $voces->consultarVocesPorCaso($id_caso);    
    ?>  
    <div id="div_voces_casos">
    <table width="100%">  
        <tr>
            <th>Voces del caso</th>
            <th><div align="right">Opcion</div></th>
        </tr>
        <?php
        if (count($voces_del_caso) > 0 ){
            foreach($voces_del_caso as $voces_reg) {
                $id_voz    = $voces_reg['id_voces'];
                $voces_voz = $voces_reg['voces'];
                ?>
                <tr>
                    <td width="90%" align="left">
                        <?php echo $voces_voz;?>
                    </td>
                    <td width="10%" align="right">
                        <span onmouseover="javascript:this.style.color='red';" onmouseout="javascript:this.style.color='#0085cc';" 
                            style="text-decoration: underline; cursor: pointer; color:#0085cc;" title="Quitar <?php echo $voces_voz;?>" class="quitar-voz" id="<?php echo $id_voz."-".$id_caso;?>">
                            Quitar</span>
                    </td>
                </tr>
                <?php                    
            }
        }else{
            ?>
            <tr>
                <td>No existen voces agregadas</td>
                <td></td>
            </tr>    
            <?php
        }
        ?>                
    </table>
    </div>
    <br />
    
    <div style="float: right;">
        <input style="width: 250px;" placeholder="Voz o sinonimo" type="text" name="id" size="17" class="input-text" id="vozsin_buscar"/>
        &nbsp;
        <input style="height: 27px; width: 70px;" title='Buscar voz y sinonimo' type="submit" value="Buscar" class="buscar_voces" id="<?php echo $id_caso;?>"/>
    </div>
    <BR /><BR />
    <table width="100%">
        <tr>
            <th>Voces</th>
            <th>Sinonimos</th>
            <th><div align="right">Opcion</div></th>
        </tr>
        <?php   
        if ( isset($_GET['txt']) ){
            $lista_voces = $voces->buscarVocesSinonimos($_GET['txt']);
        }else{
            $lista_voces = $voces->consultarVocesTodosHabilitados();
        }
        
        function reemplazos_insensibles($match){   
            global $_tag;
            return "<$_tag>$match[0]</$_tag>";  
        }
        
        foreach($lista_voces as $voces_reg) {
            $id_voz     = $voces_reg['id'];
            $voces_voz  = $voces_reg['voces'];
            
            if ( isset($_GET['txt']) ){
                $_tag = 'b';
                $pattern = '/'.$_GET['txt'].'/i';            
                $voces_voz = preg_replace_callback($pattern, 'reemplazos_insensibles', $voces_voz);
            }
            $sinonimos = $voces->consultarSinonimos($id_voz);
            
            $sinonimos_mostrar = "";
            $last = end($sinonimos);
            foreach ($sinonimos as $sin_reg){
                $sinonimo_voz = $sin_reg['sinonimo'];
                if ( isset($_GET['txt']) ){
                    $_tag = 'b';
                    $pattern2 = '/'.$_GET['txt'].'/i';            
                    $sinonimo_voz = preg_replace_callback($pattern2, 'reemplazos_insensibles', $sinonimo_voz);
                }
                if ( $last == $sin_reg ){
                    $sinonimos_mostrar = $sinonimos_mostrar.$sinonimo_voz."";
                }else{
                    $sinonimos_mostrar = $sinonimos_mostrar.$sinonimo_voz.' <span style="font-weight: bold; color: red; font-size: 16px;">;</span> ';
                }                
            }
            if (count($sinonimos) > 0 ){
                $sinonimos_mostrar = '<span style="font-weight: bold; color: red; font-size: 12px;">[</span>'.$sinonimos_mostrar.'<span style="font-weight: bold; color: red; font-size: 12px;">]</span>';
            }            
            ?>        
            <tr>
                <td width="38%" align="left">
                    <?php echo $voces_voz;?></a>
                </td>
                <td width="45%">
                    <?php echo $sinonimos_mostrar;?>
                </td>
                <td width="7%" align="right">                    
                    <a href="voces_editar.php?id=<?php echo $id_voz;?>">Agregar</a>
                </td>
            </tr>
            <?php                    
        }
        
        if (count( $lista_voces ) <= 0 ){
            ?>
            
            <tr>
                <td width="38%" align="left"> 
                    No se encontraron resultados
                </td>
                <td width="45%">                    
                </td>
                <td width="7%" align="right"> 
                </td>
            </tr>
            
            <?php
        }
        ?>                
    </table>
    
    
    
    
    <br /> 
    
    <input style="height: 25px; width: 100px;" type="submit" value="Cerrar" class="ventana_voces">
        
    </div>
         
    
    
</body>
</html>