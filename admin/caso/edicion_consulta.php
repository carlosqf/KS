<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="es" lang="es" style="height: 100%;">
<head>
<title>Edicion de caso</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../css/reset.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../css/main.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../css/2col.css" title="2col" />
<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="../../css/1col.css" title="1col" />
<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]-->
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../css/style.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../css/mystyle.css" />
<link rel="stylesheet" media="screen,projection" type="text/css" href="../../css/style_edicion.css" />

<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/switcher.js"></script>
<script type="text/javascript" src="../../js/toggle.js"></script>
<script type="text/javascript" src="../../js/ui.core.js"></script>
<script type="text/javascript" src="../../js/ui.tabs.js"></script>

<script type="text/javascript" src="caso.js"></script>
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
      <li ><a href="../usuario/index.php"><span>Usuarios</span></a></li>      
      <li><a href="../especialidad/index.php"><span>Especialidades</span></a></li>
      <li><a href="../voces/index.php"><span>Voces</span></a></li>
      <li id="menu-active"><a href="../miscasos/miscasos.php"><span>Mis casos</span></a></li>
      <li><a href="../miscasos/todoscasos.php"><span>Todos los casos</span></a></li>
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
    <div id="content" class="box" style="min-height: 490px;" align="center">
      

<div style="max-width: 700px;">  
    <span style="float: right; cursor: pointer; text-decoration: underline; color: red;">Ver caso finalizado</span>
    <h2 align="left">Edicion de casos</h2>
    
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_caso.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_rol.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_tipocaso.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_estado.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_especialidad.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_voces.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_voces_sin.php';

$usuario = new mod_usuario();
$caso = new mod_caso();
$rol = new mod_rol();
$tipocaso = new mod_tipocaso();
$estado = new mod_estado();
$especialidad = new mod_especialidad();
$voces = new mod_voces();
$voces_sin = new mod_voces_sin();


if (isset($_GET['id'])) {  
    $id_caso = $_GET['id'];
    $caso_registro = $caso->consultarPorCodigo($id_caso);
}else{
    $caso_registro = array();
}

if (count($caso_registro)>0){
    $id_caso     = 0;
    $titulo_caso = "";
    foreach($caso_registro as $caso_reg) {
        $id_caso     = $caso_reg['id'];
        $id_admin    = $caso_reg['id_admin'];
        $titulo_caso = $caso_reg['titulo'];
        $tipo_caso   = $caso_reg['id_tipocaso'];
        $id_estado   = $caso_reg['id_estado'];
        $id_especialidad = $caso_reg['id_especialidad'];
        $grupo_documentos = $caso_reg['id_docs'];
        
        $tipo_caso_descripcion = $tipocaso->getTipoCasoId($tipo_caso);
        $estado_descripcion = $estado->getEstadoId($id_estado);
        $ruta = $especialidad->devolverRutaSinEnlace($id_especialidad);
        
        $admin_caso = $usuario->consultarPorCodigo($id_admin);
        
        foreach($admin_caso as $admin_reg) {
            $nombre = $admin_reg['nombre'];
            $id_rol = $admin_reg['id_rol'];            
            $descripcion_rol = $rol->getRolId($id_rol);
        }        
    }    
    ?>       
    
    <div align="left" class="cabezera_estado_caso">
        Estado del caso:
        <span class="opcion_editar" title="Editar estado" id="edit_estado">
            Editar
        </span>
    </div> 
    <div class="detalle_caso_edicion" id="div_estado_caso">
        <?php echo $estado_descripcion;?>
    </div><br />
    
    <div align="left" class="cabezera_general_caso">
        Documentalista:
    </div> 
    <div class="detalle_caso_edicion">
        <?php echo $nombre;?>
    </div><br />
    
    <div align="left" class="cabezera_general_caso">
        Numero del caso:
    </div> 
    <div class="detalle_caso_edicion" id="id_caso" data-brand="<?php echo $id_caso;?>">
        <?php echo $id_caso;?>
    </div><br />
    
    <div align="left" class="cabezera_general_caso">
        Tipo de caso:
        <span class="opcion_editar" title="Editar tipo de caso" id="edit_tipocaso">
            Editar
        </span></div>
    <div class="detalle_caso_edicion" id="div_tipocaso_caso">
        <?php echo $tipo_caso_descripcion;?>
    </div><br />
    
    <div align="left" class="cabezera_general_caso">
        Titulo:
        <span class="opcion_editar" title="Editar el titulo" id="edit_titulo">
            Editar
        </span>
    </div>
    <div class="detalle_caso_edicion" id="div_titulo_caso">
        <?php echo $titulo_caso;?>
    </div><br />
    
    <div align="left" class="cabezera_general_caso">
        Especialidad:
        <span class="opcion_editar" title="Editar especialidad" id="edit_especialidad">
            Editar
        </span>
    </div>
    <div class="detalle_caso_edicion" id="div_especialidad_caso">
        <?php echo $ruta;?>
    </div><br />
    
    <div align="left" class="cabezera_general_caso">
        Número de Grupo de Documentos:
        <span class="opcion_editar" title="Editar numero de grupo de documentos" id="edit_grupodocumentos">
            Editar
        </span></div>
    <div class="detalle_caso_edicion" id="div_grupodocumentos_caso">
        <?php if ($grupo_documentos == NULL) echo ""; else echo $grupo_documentos;?>
    </div><br />
    
    <div align="left" class="cabezera_general_caso">
        Voces:
        <span class="opcion_editar" title="Editar voces del caso" id="edit_voces">
            Editar
        </span></div>
    <div class="detalle_caso_edicion" id="div_voces_caso">
        <br />
        <?php 
        $voces_del_caso = $voces->consultarVocesPorCaso($id_caso);
        if (count($voces_del_caso) > 0 ){
        ?>        
        <table width="100%">            
            <?php
            foreach($voces_del_caso as $voces_reg) {
                $id_voz    = $voces_reg['id_voces'];
                $voces_voz = $voces_reg['voces'];
                ?>
                <tr>
                    <td width="50%" align="left">
                        <?php echo $voces_voz;?>
                    </td>
                </tr>
                <?php                    
            }
            ?>                
        </table>
        <?php
        }       
        ?>
    </div><br />
    
    <div align="left" class="cabezera_general_caso">
        Voces y Sinonimos del caso:
    </div>
    <div class="detalle_caso_edicion" id="div_vocessinonimos_caso">    
        <br />
        <?php        
        $voces_del_caso = $voces->consultarVocesPorCaso($id_caso);
        if (count($voces_del_caso) > 0 ){
        ?>        
        <table width="100%">
            <?php
            foreach($voces_del_caso as $voces_reg) {
                $id_voz    = $voces_reg['id_voces'];
                $voces_voz = $voces_reg['voces'];

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
                ?>
                <tr>
                    <td width="35%" align="left">
                        <?php echo $voces_voz;?></a>
                    </td>
                    <td width="65%">
                        <?php echo $sinonimos_mostrar;?>
                    </td>
                </tr>
                <?php                    
            }                
            ?>                
        </table>
        <?php
        }
        ?>
    </div><br />
    
    <div align="left" class="cabezera_general_caso">
        Supuesto de hecho:
        <span class="opcion_editar" title="Editar voces del caso" id="edit_supuesto">
            Editar
        </span></div>
    <div class="detalle_caso_edicion" id="div_supuesto_caso">
        <br />
        <?php 
        //$voces_del_caso = $voces->consultarVocesPorCaso($id_caso);
        //if (count($voces_del_caso) > 0 ){
        ?>        
        <table width="100%">  
            <tr>
                <td width="15%" align="left">
                    <b>Fecha :</b>
                </td>
                <td width="85%" align="left">
                    02/02/2015
                </td>
            </tr>
            <tr>
                <td align="left">
                    <b>Lugar :</b>
                </td>
                <td align="left">
                    Madrid
                </td>
            </tr>
            <tr>
                <td align="left" colspan="2" style="text-align: justify;">
                    <b>Descripcion :<br /></b>
                    HOMBRES DE CONFIANZA, S.L. (en adelante HdC) es una entidad dedicada a la prestación de servicios de intermediación en la contratación por vía electrónica, en especial aquellos consistentes en certificar y archivar, como tercera parte imparcial, las declaraciones de voluntad que integran los contratos electrónicos para su constancia a los efectos legal y reglamentariamente oportunos, siendo titular de un website en Internet. ABSTRACTO, S.A. contrata a Hdc para mejorar su website.
                </td>
            </tr>
            
        </table>
        <?php
        //}       
        ?>
    </div><br />
    
     <?php
}else{
    echo 'NO SE ENCONTRO EL CASO';
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