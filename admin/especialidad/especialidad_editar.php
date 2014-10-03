<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="es" lang="es" style="height: 100%;">
<head>
<title>Detalle de especialidad</title>
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

<script type="text/javascript" src="especialidad.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".tabs > ul").tabs();
                document.getElementById("especialidad_descripcion").focus();
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
      <li ><a href="../usuario/index.php"><span>Usuarios</span></a></li>      
            <li id="menu-active"><a href="../especialidad/index.php"><span>Especialidades</span></a></li>
      <li><a href="../voces/index.php"><span>Voces</span></a></li>
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
        <form action="especialidad_busqueda.php" method="get" id="search">
          <fieldset>
          <legend>Buscar especialidad</legend>          
            <input placeholder="Especialidad" type="text" name="texto" size="17" class="input-text" id="texto_busqueda" />
            &nbsp;
            <input type="submit" value="OK" class="input-submit-02" id="buscar" />
            <br />            
          </fieldset>
        </form>
      </div>
      <!-- /padding -->
      <ul class="box">
          <li><a href="especialidad_arbol.php">Especialidades</a></li>
      </ul>
    </div>
    <!-- /aside -->
    <hr class="noscreen" />
    <!-- Content (Right Column) -->
    <div id="content" class="box" style="min-height: 490px; height: 100%;">
      
        <div style="max-width: 600px;">
              <div style="float: left;"><h2>Detalle de especialidad</h2></div>
              <div style="float: right;"><br /><a href="javascript:window.history.go(-1);">Volver</a> </div>
        </div>
             
                 
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_especialidad.php';

$especialidad = new mod_especialidad();
if (isset($_GET['id'])){
    $id_nivel = $_GET['id']; // id del usuario
}else{
    $id_nivel = 0;
}

$especialidad_reg = $especialidad->consultarPorCodigo($id_nivel);

if ( count($especialidad_reg) > 0  ){

    foreach ($especialidad_reg as $registro) {
        $id_especialidad = $registro['id'];  
        $especialidad_descripcion = $registro['especialidad'];
        $estado = $registro['estado'];
    }        
    ?>
    <div style="max-width: 600px;">

        <table width="100%" cellpadding="7" style="border: none; ">
            <tr>
                <td style=" width: 35%;" align="left">
                    Especialidad <span style="float: right;">:</span>
                </td>
                <td style=" width: 65%;">
                    <input type="text" name="texto" value="<?php echo $especialidad_descripcion;?>" style="height: 35px; width: 97%;" id="especialidad_descripcion"></input>
                    <span class="asterisco" style="float: right; margin-top: 12px;">*</span>   
                </td>
            </tr>
            <tr>
                <td align="left">
                    Estado <span style="float: right;">:</span>
                </td>
                <td align="left">
                    <select id="miselect_estado" style="width: 50%; height: 30px;">
                        <?php                            
                        if ($estado == 1){
                            echo '<option value="1" selected>Habilitado</option>';
                            echo '<option value="0" >Deshabilitado</option>';
                        }else{
                            echo '<option value="0" selected>Deshabilitado</option>';
                            echo '<option value="1" >Habilitado</option>';
                        }
                        ?>
                    </select>
                    <span class="asterisco" style="float: right; margin-top: 12px;">*</span>
                </td>
            </tr> 
        </table>

        <div align="center" style="margin-top: 15px;">                        
            <input type="button" value="Modificar" class="modificar" id="<?php echo $id_especialidad;?>" style="width: 20%; height: 28px; margin-right: 10px;" ></input>
            <input type="button" value="Cancelar" class="cancelar_modificacion" id="<?php echo $id_especialidad;?>" style="width: 20%; height: 28px;  margin-right: 10px;" ></input>
        </div>   


    </div><?php
}else{
    ?>
    <br/><br/><br/><br/><div>
        Especialidad eliminada (Vuelva atras y actualize la página)
    </div>
    <?php
}?>
      
            
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