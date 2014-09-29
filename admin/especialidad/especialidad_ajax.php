<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_especialidad.php';

$respuesta = "false";

$accion = $_POST['accion'];
switch ($accion) {      
    
    case "modificar-especialidad":
        $especialidad       = new mod_especialidad();
        $id                 = $_POST['id'];
        $especialidad_nombre= $_POST['especialidad'];
        $estado             = $_POST['estado'];
        
        $especialidad->modificar($id, $especialidad_nombre, $estado);
        
        $id_padre = $especialidad->devolverPadre($id);
        
        $respuesta = $id_padre;
        break;
    
    case "cancelar-modificacion-especialidad":
        $especialidad       = new mod_especialidad();
        $id                 = $_POST['id'];               
        $id_padre = $especialidad->devolverPadre($id);        
        $respuesta = $id_padre;
        break;
    
    case "registrar-especialidad":
        $especialidad        = new mod_especialidad();
        $id_padre            = $_POST['id_padre'];
        $especialidad_nombre = $_POST['especialidad'];
        $estado              = 1;
        
        $especialidad->registrar($especialidad_nombre, $estado, $id_padre);
        
        $respuesta = "true";
        break;
    
    case "eliminar_especialidad":
        $especialidad  = new mod_especialidad();
        $id            = $_POST['id_especialidad'];
        $respuesta = "false";
        if ( $especialidad->consultarNumeroHijosTodos($id) <= 0 ){            
              if ( $especialidad->consultarNumeroCasos($id) <= 0 ){
                  $especialidad->eliminar($id);
                  $respuesta = "true";
              }            
        }
        break;
    
}
echo $respuesta;