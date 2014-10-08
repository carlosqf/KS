<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_caso.php';

$respuesta = "false";

$accion = $_POST['accion'];
switch ($accion) {      
        
    case "registrar-caso":
        $caso = new mod_caso();
        $titulo = $_POST['titulo'];
        $id_tipocaso = $_POST['id_tipocaso'];        
        $caso->registrar(1, $titulo, $id_tipocaso);        
        $ultimo_id = $caso->consultarUltimoID();        
        $respuesta = $ultimo_id;
        break;
    
    case "modificar-titulo":
        $caso = new mod_caso();
        $id_caso = $_POST['id_caso'];
        $titulo  = $_POST['titulo'];
        
        $caso->modificarTitulo($id_caso, $titulo);
                
        $respuesta = "true";
        break;
    
}
echo $respuesta;