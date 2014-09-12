<?php
/**
 * Description of mod_usuario
 *
 * @author CARLOS
 */
define('__ROOT__', dirname(dirname(__FILE__)));

require __ROOT__.'/datos/dat_usuario.php';

class mod_usuario {
    
    private $dat_usuario;
    
    public function __construct() {
        $this->dat_usuario = new dat_usuario();
    }
    
    public function registrar($identificadorempresa, $username, $password, $id_rol, $nombre, $telefono, $activo, $borrado)
    {
        $this->dat_usuario->setIdentificadorEmpresa($identificadorempresa);
        $this->dat_usuario->setUsername($username);
        $this->dat_usuario->setPassword($password);
        $this->dat_usuario->setIdRol($id_rol);
        $this->dat_usuario->setNombre($nombre);
        $this->dat_usuario->setTelefono($telefono);
        $this->dat_usuario->setActivo($activo);
        $this->dat_usuario->setBorrado($borrado);
        return $this->dat_usuario->registrar();
    }
    
    public function consultarPorRol($id_rol)
    {
        $this->dat_usuario->setIdRol($id_rol);
        return $this->dat_usuario->consultarPorRol();
    }
    
    public function consultarPorCodigo($id) {
        $this->dat_usuario->setId($id);
        return $this->dat_usuario->consultarPorCodigo();
    }
    
    public function buscarUsuario($nombre)
    {
        $this->dat_usuario->setNombre($nombre);
        return $this->dat_usuario->buscarUsuario();
    }
    
    public function modificarUsuario($identificadorempresa, $username, $password, $id_rol, $nombre, $telefono, $activo, $borrado) {
        $this->dat_usuario->setIdentificadorEmpresa($identificadorempresa);
        $this->dat_usuario->setUsername($username);
        $this->dat_usuario->setPassword($password);
        $this->dat_usuario->setIdRol($id_rol);
        $this->dat_usuario->setNombre($nombre);
        $this->dat_usuario->setTelefono($telefono);
        $this->dat_usuario->setActivo($activo);
        $this->dat_usuario->setBorrado($borrado);
        return $this->dat_usuario->modificarUsuario();
    }
    
    public function consultarUsuarios($numero_pagina, $id_rol) {
        return $this->dat_usuario->consultarUsuarios($numero_pagina, $id_r11ol);
    }
    
}
