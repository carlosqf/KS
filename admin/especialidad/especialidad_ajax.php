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
        
        $respuesta = "true";
        break;
}
echo $respuesta;