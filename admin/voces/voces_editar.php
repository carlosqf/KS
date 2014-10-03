<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="es" lang="es" style="height: 100%;">
<head>
<title>Editar voces</title>
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
      
      <div style="max-width: 700px;">
          <div style="float: left;"><h2>Editar voz</h2></div>
          <div style="float: right;"><br /><a href="javascript:history.back()">Volver</a> </div>
      </div>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_voces.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_voces_sin.php';

if (isset($_GET['id'])){
    $id_voz = $_GET['id']; // id del voz
}
$voces = new mod_voces();    
$voz_registro = $voces->consultarPorCodigo($id_voz);

if ( count($voz_registro) > 0 ){
    foreach ($voz_registro as $registro) {
        $voz = $registro['voces'];
        $estado = $registro['estado'];    
    }
?>    
<div style="max-width: 700px;" >    
    
    <table width="100%" cellpadding="7" style="border: none; ">
    <tr>
        <td style=" width: 35%;" align="left">
            Voz <span style="float: right;">:</span>
        </td>
        <td style=" width: 65%;">
            <input onKeyUp="this.value=this.value.toUpperCase();" class="editable" type="text" name="texto" value="<?php echo $voz;?>" disabled style="font-weight: bold; height: 35px; width: 97%;" id="nombre_voz"></input>
            <span class="asterisco" style="float: right; margin-top: 12px;">*</span>    
        </td>
    </tr>
    <tr>
        <td align="left">
            Estado <span style="float: right;">:</span>
        </td>
        <td  align="left">
            <select class="editable" id="miselectestado_voz" style="width: 50%; height: 30px; font-weight: bold;" disabled>
                <?php
                if ( $estado == 1 ){
                    echo '<option value="1" selected>Habilitado</option>';
                    echo '<option value="0" >Deshabilitado</option>';
                }
                if ( $estado == 0 ){
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
    <input type="button" value="Editar" id="editar_voz" style="width: 20%; height: 28px; margin-right: 10px;"></input>
    <input type="button" value="Modificar" class="modificar_voz" id="<?php echo $id_voz;?>" style="width: 20%; height: 28px; margin-right: 10px;" disabled></input>
    <input type="button" value="Cancelar" class="cancelar_modificacion_voz" id="<?php echo $id_voz;?>" style="width: 20%; height: 28px;  margin-right: 10px;" disabled></input>
    <input type="button" value="Eliminar" class="eliminar_voz" id="<?php echo $id_voz;?>" style="width: 20%; height: 28px;"></input>
</div>
    
    <h2>Sinonimos</h2>
<?php
$sinonimos = $voces->consultarSinonimos($id_voz);
if ( count($sinonimos)>0 ){
    ?>
    <table width="100%">
        <?php
        foreach($sinonimos as $sin_reg) {
            $id_sin     = $sin_reg['id'];
            $sinonimo  = $sin_reg['sinonimo'];        
            ?>
            <tr>
                <td width="70%" align="left">
                    <?php echo $sinonimo;?></a>
                </td>
                <td width="30%" align="right">                    
                    <a title="Editar <?php echo $sinonimo;?>" href="sinonimo_editar.php?id=<?php echo $id_sin;?>">Editar</a> /
                    <span onmouseover="javascript:this.style.color='red';" onmouseout="javascript:this.style.color='#0085cc';" 
                        style="text-decoration: underline; cursor: pointer; color:#0085cc;" title="Eliminar <?php echo $sinonimo;?>" class="eliminar-sinonimo" id="<?php echo $id_sin;?>">
                        Eliminar
                    </span>
                </td>
            </tr>
            <?php                    
        }                
        ?>                
    </table>
<?php
}else{
    echo 'No existen sinonimos';    
}
?>   
<br />    
    
<div align="center">
    <input style="width: 200px;" onKeyUp="this.value=this.value.toUpperCase();" placeholder="Sinonimo" type="text" name="id" size="17" class="input-text" id="sinonimo_registrar"/>
    &nbsp;
    <input style="width: 100px; height: 28px;" title='Registrar sinonimo para la voz' type="button" value="Registrar" class="registrar_sinonimo" id="<?php echo $id_voz;?>" />
</div>     
<?php    
}else{
    echo "Voz eliminada o no existe";
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