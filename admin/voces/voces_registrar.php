<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="es" lang="es" style="height: 100%;">
<head>
<title>Registrod de voces</title>
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
                document.getElementById("voz_descripcion").focus();
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
    <div id="content" class="box" style="min-height: 490px; min-height: 490px;">         
        <div style="max-width: 600px;">
            <div style="float: left;"><h2>Registro de voz</h2></div>
            <div style="float: right;"><br /><a href="javascript:history.back()">Volver</a> </div>
        </div>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_voces.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_voces_sin.php';

$voces = new mod_voces();

$voz = "";  
$estado = "";   
      
?>

<div style="max-width: 600px;">

    <table width="100%" cellpadding="7" style="border: none; ">    
        <tr>
            <td style=" width: 35%;" align="left">
                Voz <span style="float: right;">:</span>
            </td>
            <td style=" width: 65%;">
                <input onKeyUp="this.value=this.value.toUpperCase();" type="text" name="texto" value="" style="height: 35px; width: 97%;" id="voz_descripcion"></input>
                <span class="asterisco" style="float: right; margin-top: 12px;">*</span>
            </td>
        </tr>
        <tr>
            <td align="left">
                Estado <span style="float: right;">:</span>
            </td>
            <td  align="left">
                <select id="miselectestado_voz" style="width: 50%; height: 30px;" >
                    <?php
                        echo '<option value="1" selected>Habilitado</option>';
                        echo '<option value="0" >Deshabilitado</option>';                
                    ?>
                </select>
                <span class="asterisco" style="float: right; margin-top: 12px;">*</span>
            </td>
        </tr>  
    </table>

    <div align="center" style="margin-top: 15px;">
        <input type="button" value="Registrar" id="registrar_voz" style="width: 30%; height: 28px; margin-right: 10px;"></input>
        <input type="button" value="Cancelar" id="cancelar_registro" style="width: 30%; height: 28px;"></input>
    </div>

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