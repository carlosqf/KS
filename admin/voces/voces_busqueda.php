<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="es" lang="es" style="height: 100%;">
<head>
<title>Búsqueda de voces</title>
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

<script type="text/javascript" src="voces.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".tabs > ul").tabs();
                document.getElementById("texto_busqueda").focus();
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
      <li><a href="../usuario/index.php"><span>Usuarios</span></a></li>      
      <li><a href="../especialidad/index.php"><span>Especialidades</span></a></li>
            <li id="menu-active"><a href="../voces/index.php"><span>Voces</span></a></li>
      <li><a href="../caso/miscasos.php"><span>Mis casos</span></a></li>
      <li><a href="../caso/todoscasos.php"><span>Todos los casos</span></a></li>
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
        <!-- Search -->
        <form action="voces_busqueda.php" method="get" id="search">
          <fieldset>
          <legend>Buscar voz</legend>          
            <input placeholder="Voz" type="text" name="texto" size="17" class="input-text" id="texto_busqueda" />
            &nbsp;
            <input type="submit" value="OK" class="input-submit-02" id="buscar" />
            <br />            
          </fieldset>
        </form>
        <!-- Create a new project -->
        <p id="btn-create" class="box"><a href="voces_registrar.php"><span>Crear nueva voz</span></a></p>
      </div>
      <!-- /padding -->
      <ul class="box">
        <li><a href="voces_lista.php">Voces</a></li>
      </ul>
    </div>
    <!-- /aside -->
    <hr class="noscreen" />
    <!-- Content (Right Column) -->
    <div id="content" class="box" style="min-height: 490px; height: 100%;">
      <h2>Búsqueda de voces</h2>
      
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_voces.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_voces_sin.php';

$voces = new mod_voces();

if (isset($_GET['texto'])) {  
    $voces_buscar = $_GET['texto'];
    $lista_voces = $voces->buscarVoces($voces_buscar);
    $numero_voces = count($lista_voces);
}else{
    $lista_usuarios = array();
    $numero_voces = count($lista_voces);
}
?>
<div style="max-width: 700px;">
      
        <table width="100%">
        <tr>
            <th>Voces</th>
            <th>Estado</th>
            <th>Sinónimos</th>
            <th><div align="right">Opcion</div></th>
        </tr>
        <?php
        $voces_sin = new mod_voces_sin();
        
        foreach($lista_voces as $voces_reg) {
            $id_voz     = $voces_reg['id'];
            $voces_voz  = $voces_reg['voces'];
            $estado_voz = $voces_reg['estado'];
            
            $sinonimos = $voces->consultarSinonimos($id_voz);
            
            $sinonimos_mostrar = "";
            $last = end($sinonimos);
            foreach ($sinonimos as $sin_reg){
                $sinonimo_voz = $sin_reg['sinonimo'];
                if ( $last == $sin_reg ){
                    $sinonimos_mostrar = $sinonimos_mostrar.$sinonimo_voz."";
                }else{
                    $sinonimos_mostrar = $sinonimos_mostrar.$sinonimo_voz.' <span style="font-weight: bold; color: red; font-size: 16px;">;</span> ';
                }                
            }
            if (count($sinonimos) > 0 ){
                $sinonimos_mostrar = '<span style="font-weight: bold; color: red; font-size: 12px;">[</span>'.$sinonimos_mostrar.'<span style="font-weight: bold; color: red; font-size: 12px;">]</span>';
            }
            
            if ( $estado_voz == 1 ){
                $estado_mostrar = "Habilitado";
            }
            if ($estado_voz == 0){
                $estado_mostrar = "Deshabilitado";
            }
            ?>
        
            <tr>
                <td width="38%" align="left">
                    <?php echo $voces_voz;?></a>
                </td>
                <td width="10%">
                    <?php echo $estado_mostrar;?>
                </td>
                <td width="45%">
                    <?php echo $sinonimos_mostrar;?>
                </td>
                <td width="7%" align="right">                    
                    <a href="voces_editar.php?id=<?php echo $id_voz;?>">Editar</a>
                </td>
            </tr>
            <?php                    
        }                
        ?>                
    </table>            
    
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