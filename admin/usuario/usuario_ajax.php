<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_rol.php';

$respuesta = "false";

$accion = $_POST['accion'];
switch ($accion) {      
    
    case "modificar-usuario":
        $usuario = new mod_usuario();
        $id   = $_POST['id'];
        $nombre = $_POST['nombre'];
        $identificadorempresa = $_POST['identificador'];
        $username = $_POST['user'];
        $password = $_POST['password'];
        $id_rol = $_POST['rol'];
        $telefono = $_POST['telefono'];
        $estado = $_POST['estado'];
        
        $usuario->modificarUsuario($id, $identificadorempresa, $username, $password, $id_rol, $nombre, $telefono, $estado, 0);
        
        $respuesta = "true";
        break; 
    
    case "registrar-usuario":
        $usuario = new mod_usuario();
        $nombre = $_POST['nombre'];
        $identificadorempresa = $_POST['identificador'];
        $username = $_POST['user'];
        $password = $_POST['password'];
        $id_rol = $_POST['rol'];
        $telefono = $_POST['telefono'];
        $estado = $_POST['estado'];
        
        $usuario->registrar($identificadorempresa, $username, $password, $id_rol, $nombre, $telefono, $estado, 0);
        
        $ultimo_id = $usuario->consultarUltimoID();
        
        $respuesta = $ultimo_id;
        break;
    
    case "eliminar-contacto":
        $contacto = new mod_contacto();        
        $codigo    = $_POST['codigo_contacto']; 
        $contacto->eliminar($codigo);
        
        $respuesta = "true";
        break;
}
echo $respuesta;