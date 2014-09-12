<?php

/**
 * Description of mod_cliente
 *
 * @author CARLOS
 */
require_once '../datos/dat_cliente.php';

class mod_cliente {

    private $dat_cliente;

    public function __construct() {
        $this->dat_cliente = new dat_cliente();
    }

    public function registrar($identificadorempresa, $username, $password, $id_rol, $nombre, $telefono, $activo, $borrado) {
        $this->dat_cliente->setIdentificadorEmpresa($identificadorempresa);
        $this->dat_cliente->setUsername($username);
        $this->dat_cliente->setPassword($password);
        $this->dat_cliente->setIdRol($id_rol);
        $this->dat_cliente->setNombre($nombre);
        $this->dat_cliente->setTelefono($telefono);
        $this->dat_cliente->setActivo($activo);
        $this->dat_cliente->setBorrado($borrado);
        return $this->dat_cliente->registrar();
    }

    public function consultarPorRol($id_rol) {
        $this->dat_cliente->setIdRol($id_rol);
        return $this->dat_cliente->consultarPorRol();
    }

    public function consultarPorCodigo($id) {
        $this->dat_cliente->setId($id);
        return $this->dat_cliente->consultarPorCodigo();
    }

    public function buscarCliente($nombre) {
        $this->dat_cliente->setNombre($nombre);
        return $this->dat_cliente->buscarCliente();
    }

    public function modificarCliente($identificadorempresa, $username, $password, $id_rol, $nombre, $telefono, $activo, $borrado) {
        $this->dat_cliente->setIdentificadorEmpresa($identificadorempresa);
        $this->dat_cliente->setUsername($username);
        $this->dat_cliente->setPassword($password);
        $this->dat_cliente->setIdRol($id_rol);
        $this->dat_cliente->setNombre($nombre);
        $this->dat_cliente->setTelefono($telefono);
        $this->dat_cliente->setActivo($activo);
        $this->dat_cliente->setBorrado($borrado);
        return $this->dat_cliente->modificarCliente();
    }

    public function consultarClientes($numero_pagina, $id_rol) {
        return $this->dat_cliente->consultarClientes($numero_pagina, $id_r11ol);
    }

}
