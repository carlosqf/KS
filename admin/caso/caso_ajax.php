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
    
    case "modificar-tipocaso":
        $caso = new mod_caso();
        $id_caso = $_POST['id_caso'];
        $id_tipocaso  = $_POST['id_tipocaso'];        
        $caso->modificarTipoCaso($id_caso, $id_tipocaso);
        $respuesta = "true";
        break;
    
    case "modificar-estado":
        $caso = new mod_caso();
        $id_caso = $_POST['id_caso'];
        $id_estado  = $_POST['id_estado'];        
        $caso->modificarEstado($id_caso, $id_estado);
        $respuesta = "true";
        break;
    
    case "modificar-especialidad":
        $caso = new mod_caso();
        $id_caso = $_POST['id_caso'];
        $id_especialidad  = $_POST['id_especialidad'];        
        $caso->modificarEspecialidad($id_caso, $id_especialidad);
        $respuesta = "true";
        break;
    
    case "modificar-id_docs":
        $caso = new mod_caso();
        $id_caso = $_POST['id_caso'];
        $id_docs  = $_POST['id_docs'];        
        if ( strcmp($id_docs, "")==0 )
            $id_docs = 'null';        
        $caso->modificarIdDocs($id_caso, $id_docs);
        $respuesta = "true";
        break;
    
}
echo $respuesta;