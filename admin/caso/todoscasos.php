<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="es" lang="es" style="height: 100%;">
<head>
<title>Todos los casos</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../css/reset.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../css/main.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../css/2col.css" title="2col" />
<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="../../css/1col.css" title="1col" />
<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]-->
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../css/style.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../css/mystyle.css" />
<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/switcher.js"></script>
<script type="text/javascript" src="../../js/toggle.js"></script>
<script type="text/javascript" src="../../js/ui.core.js"></script>
<script type="text/javascript" src="../../js/ui.tabs.js"></script>

<script type="text/javascript" src="usuario.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".tabs > ul").tabs();
	});
	</script>
</head>
<body style="height: 100%;">
<div id="main" style="height: 85%;">
  <!-- Tray -->
  <div id="tray" class="box">
      <!-- Switcher -->
	  <p class="f-left box" style="font-size: 25px;">
      <!-- Switcher -->
      <span class="f-left" id="switcher"> <a href="javascript:void(0);" rel="1col" class="" title=""></a> <a href="javascript:void(0)" rel="2col" class="styleswitch ico-col2" title="Display two columns"><img src="../../design/switcher-2col.gif" alt="" /></a> </span><strong>ADMINISTRACION KSOLUCION</strong></p>
    <p class="f-right">User: <strong>Administrator</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="" id="logout">Salir</a></strong></p>
  </div>
  <!--  /tray -->
  <hr class="noscreen" />
  <!-- Menu -->
  <div id="menu" class="box">
    <ul class="box f-right">
      <li><a href=""><span><strong>Visitar KSolucion &raquo;</strong></span></a></li>
    </ul>
    <ul class="box">
      <li><a href=""><span>Inicio</span></a></li>  
        <li id="menu-active"><a href="../usuario/index.php"><span>Usuarios</span></a></li>
      <!-- Active -->
      <li><a href="../especialidad/index.php"><span>Especialidades</span></a></li>
      <li><a href="../voces/index.php"><span>Voces</span></a></li>
      <li><a href=""><span>Preceptos</span></a></li>      
      <li><a href=""><span>Libros</span></a></li>
      <li><a href=""><span>Documentos</span></a></li>
      <li><a href=""><span>Casos</span></a></li>
    </ul>
  </div>
  <!-- /header -->
  <hr class="noscreen" />
  <!-- Columns -->
  <div id="cols" class="box" style="height: 83%;">
    <!-- Aside (Left Column) -->
    <div id="aside" class="box">
      <div class="padding box">
        <!-- Search caso -->
        <form action="../caso/caso_edicion.php" method="get" id="search">
          <fieldset>
          <legend>Buscar caso</legend>          
          <input style="color: red;" placeholder="Nro de caso" type="text" name="id" size="17" class="input-text" id="caso_busqueda"/>
            &nbsp;
            <input type="submit" value="OK" class="input-submit-02" id="buscar" />
            <br />            
          </fieldset>
        </form>
                
      </div>
      <!-- /padding -->
      <ul class="box">
          
      </ul>      
    </div>
    <!-- /aside -->
    <hr class="noscreen" />
    <!-- Content (Right Column) -->
    <div id="content" class="box" style="min-height: 100%;">
        
        <div style="max-width: 600px;">
              <div><h2>Todos los casos</h2></div>              
        </div>
        
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_rol.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_caso.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_tipocaso.php';

$caso = new mod_caso();
$total_casos = $caso->totalCasosTodos();
$casos_judiciales = $caso->totalCasosJudicialesTodos();
$casos_extrajudiciales = $caso->totalCasosExtrajudicialesTodos();
$casos_consultas = $caso->totalCasosConsultasTodos();
$casos_finalizados = $caso->totalCasosFinalizadosTodos();
$casos_empezados = $caso->totalCasosEmpezadosTodos();
$casos_revisar = $caso->totalCasosParaRevisarTodos();
$casos_realizar_Cambios = $caso->totalCasosRealizarCambiosTodos();

?>

<div style="max-width: 850px;">    
        
<table border="0" style="width: 600px;">              
      <tr>
          <td width="200">Total Casos: <div style="float: right; margin-right: 25px;"><?php echo $total_casos;?> 
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="todoscasos.php?&cm=to">ver</a>  </div>
          </td>
        <td width="200">Total Casos Finalizados: <div style="float: right; margin-right: 25px;"><?php echo $casos_finalizados;?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="todoscasos.php?cm=fi">ver</a>  </div>
        </td>
      </tr>
      <tr>
        <td>Total Casos Judiciales: <div style="float: right; margin-right: 25px;"><?php echo $casos_judiciales;?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="todoscasos.php?cm=ju">ver</a>  </div>
        </td>
        <td>Total Casos Empezados: <div style="float: right; margin-right: 25px;"><?php echo $casos_empezados;?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="todoscasos.php?cm=em">ver</a>  </div>
        </td>
      </tr>
      <tr>
        <td>Total Casos Extrajudiciales: <div style="float: right; margin-right: 25px;"><?php echo $casos_extrajudiciales;?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="todoscasos.php?cm=ex">ver</a>  </div>
        </td>
        <td>Total Casos para Revisar: <div style="float: right; margin-right: 25px;"><?php echo $casos_revisar;?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="todoscasos.php?cm=re">ver</a>  </div>
        </td>
      </tr>
      <tr>
        <td>Total Casos Consultas: <div style="float: right; margin-right: 25px;"><?php echo $casos_consultas;?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="todoscasos.php?cm=co">ver</a>  </div>
        </td>
        <td>Total Casos Realizar Cambios: <div style="float: right; margin-right: 25px;"><?php echo $casos_realizar_Cambios;?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="todoscasos.php?cm=ca">ver</a>  </div>
        </td>
      </tr>
</table>   
    
<?php 
if (isset($_GET['cm'])){
    $casos_a_mostrar = $_GET['cm'];
    
    $pagina = 1;
    if (isset($_GET['pag'])){
        $pagina = $_GET['pag'];
    }       
    switch ($casos_a_mostrar) {
        case "to":            
            $registros = $caso->consultarTodos($pagina);
            $numero_registros_total = ($total_casos);
            $seleccionado = "Total Casos";
            break;
        case "ju":
            $registros = $caso->consultarJudicialesTodos($pagina);
            $numero_registros_total = ($casos_judiciales);
            $seleccionado = "Total Casos Judiciales";
            break;
        case "ex":
            $registros = $caso->consultarExtrajudicialesTodos($pagina);
            $numero_registros_total = ($casos_extrajudiciales);
            $seleccionado = "Total Casos Extrajudiciales";
            break;
        case "co":
            $registros = $caso->consultarConsultasTodos($pagina);
            $numero_registros_total = ($casos_consultas);
            $seleccionado = "Total Casos Consultas";
            break;
        case "fi":
            $registros = $caso->consultarFinalizadosTodos($pagina);
            $numero_registros_total = ($casos_finalizados);
            $seleccionado = "Total Casos Finalizados";
            break;
        case "em":
            $registros = $caso->consultarEmpezadosTodos($pagina);
            $numero_registros_total = ($casos_empezados);
            $seleccionado = "Total Casos Empezados";
            break;
        case "re":
            $registros = $caso->consultarRevisadosTodos($pagina);
            $numero_registros_total = ($casos_revisar);
            $seleccionado = "Total Casos para Revisar";
            break;
        case "ca":
            $registros = $caso->consultarCambiosRealizarTodos($pagina);
            $numero_registros_total = ($casos_realizar_Cambios);
            $seleccionado = "Total Casos Realizar Cambios";
            break;
    }    
    $total_paginas = ceil($numero_registros_total / 20); 
    if ($total_paginas == 0) {
        $pagina = 0;
    }
    ?>
    <div style="display: table; text-align: left;">
        <div style="display: table-row;">
            <div style="display: table-cell;"><h3><?php echo $seleccionado;?></h3></div>
            <div style="display: table-cell;">&nbsp;&nbsp;&nbsp;Pagina <?php echo $pagina;?>/<?php echo $total_paginas;?></div>
        </div>
    </div>
    
    <table width="100%">
        <tr>
            <th>Caso</th>
            <th>Título</th>
            <th>Tipo de Caso</th>
            <th><div align="right">Ver caso</div></th>
        </tr>
        <?php
        $tipocaso = new mod_tipocaso();
        foreach($registros as $caso_reg) {
            $id_caso     = $caso_reg['id'];
            $titulo_caso = $caso_reg['titulo'];
            $id_tipocaso    = $caso_reg['id_tipocaso'];
                        
            $tipocaso_descripcion = $tipocaso->getTipoCasoId($id_tipocaso);
            ?>
            <tr>
                <td width="10%" align="left">
                    <?php echo $id_caso;?>
                </td>
                <td width="58%">
                    <?php echo $titulo_caso;?>
                </td>
                <td width="17%">
                    <?php echo $tipocaso_descripcion;?>
                </td>
                <td width="15%" align="right">                    
                    <a href="../caso/caso_edicion.php?id=<?php echo $id_caso;?>" title="Editar el caso">Edicion</a> / <a href="../../vista/caso/caso.php?id=<?php echo $id_caso;?>"title="Vista del caso modo Cliente">Finalizado</a>
                </td>
            </tr>
            <?php                    
        }                
        ?>                
    </table>
    
    <div align="center" style="margin-top: 15px;">            
    <?php        
    if ($total_paginas > 1) {
        echo '<table cellpadding="5">
            <tr>';
        if ($pagina != 1){
            echo '<td><a href="todoscasos.php?cm='.$casos_a_mostrar.'&pag='.($pagina - 1).'">Anterior</a></td>';
        }else{
            echo '<td><a href="" class="paginate_disabled">Anterior</a></td>';
        }
        $inicio = $pagina - 7;
        if ( $inicio <= 0 ){
            $inicio = 1;
        }		
        $fin    = $inicio + 14;
        if ($fin > $total_paginas){
            $fin = $total_paginas;
        }
        for ($i=$inicio;$i<=$fin;$i++) {
            if ($pagina == $i){
                echo '<td class="active">'.$i.'</td>';
            }else{
                echo '<td><a href="todoscasos.php?cm='.$casos_a_mostrar.'&pag='.($i).'">'.$i.'</a></td>';
            }    
        }
        if ($pagina != $total_paginas){
            echo '<td><a href="todoscasos.php?cm='.$casos_a_mostrar.'&pag='.($pagina + 1).'">Siguiente</a></td>';
        }else{
            echo '<td><a href="" class="paginate_disabled">Siguiente</a></td>';
        }   
        echo '</tr>
        </table>';
    }    
    ?>        
    </div>
    <?php    
}
?>   
    
</div>

            
	
    
    </div>	
  <!-- /cols -->
  <hr class="noscreen" />
  <!-- Footer -->
  <div id="footer" class="box">
        
  </div>
  <!-- /footer -->
</div><br></br>
<!-- /main -->

</div>   
</body>
</html>