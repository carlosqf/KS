<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_voces.php';

$respuesta = "false";

$accion = $_POST['accion'];
switch ($accion) {  
    
    case "quitar-voz":
        $caso = new mod_caso();
        $id_voz  = $_POST['id_voz'];
        $id_caso = $_POST['id_caso'];
        
        
        $caso->quitarVozDelCaso($id_caso, $id_voz);
        
        
        $respuesta = "true";
        break;
    
}
echo $respuesta;