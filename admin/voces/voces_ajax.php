<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_voces.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_voces_sin.php';

$respuesta = "false";

$accion = $_POST['accion'];
switch ($accion) {      
    
    case "modificar-voz":
        $voces = new mod_voces();
        $id     = $_POST['id'];
        $voz    = $_POST['voces'];
        $estado = $_POST['estado'];
        
        $voces->modificarVoces($id, $voz, $estado);
        
        $respuesta = "true";
        break; 
    
    case "eliminar-voz":
        $voces = new mod_voces();
        $id     = $_POST['id'];        
        $numero_sinonimos = $voces->consultarNumeroSinonimos($id);
        
        if ( $numero_sinonimos <= 0 ){            
            $numero_casos_relacionados = $voces->consultarNumeroCasosRelacionados($id);            
            if ( $numero_casos_relacionados <= 0 ){                
                $voces->eliminar($id);
                $respuesta = "true";
            }
        }
        break;
    
    case "registrar-sinonimo":
        $voces_sin = new mod_voces_sin();
        
        $id_voz = $_POST['id_voz'];
        $sinonimo = $_POST['sinonimo'];
        
        $voces_sin->regitrar($id_voz, $sinonimo);
        
        $respuesta = "true";
        break; 
    
    case "eliminar-sinonimo":
        $voces_sin = new mod_voces_sin();        
        $id_sin = $_POST['id_sin'];        
        $voces_sin->eliminarVozSin($id_sin);        
        $respuesta = "true";
        break;
    
    case "modificar-sinonimo":
        $voces_sin = new mod_voces_sin();
        $id       = $_POST['id_sinonimo'];
        $sinonimo = $_POST['sinonimo'];        
        $voces_sin->modificarVozSin($id, $sinonimo);        
        $respuesta = "true";
        break;
    
    case "registrar-voz":
        $voces = new mod_voces();
        $voz = $_POST['voz'];
        $estado = $_POST['estado'];        
        $voces->regitrar($voz, $estado);        
        $ultimo_id = $voces->consultarUltimoID();        
        $respuesta = $ultimo_id;
        break;
    
}
echo $respuesta;