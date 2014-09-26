<?php
/**
 * Description of mod_voces
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/dat_voces.php';

class mod_voces {
    
    private $dat_voces;
    
    public function __construct() {
        $this->dat_voces = new dat_voces();
    }
    
    public function regitrar($voces, $estado){
        $this->dat_voces->setVoces($voces);
        $this->dat_voces->setEstado($estado);
        return $this->dat_voces->regitrar();
    }
    
    public function consultarVoces($numero_pagina) {
        return $this->dat_voces->consultarVoces($numero_pagina);
    }
    
    public function modificarVoces($id, $voces, $estado) {
        $this->dat_voces->setId($id);
        $this->dat_voces->setVoces($voces);
        $this->dat_voces->setEstado($estado);
        return $this->dat_voces->modificarVoces(); 
    }
    
    public function numeroDeVoces() {
        return $this->dat_voces->numeroDeVoces();
    }
    
    public function consultarSinonimos($id){
        $this->dat_voces->setId($id);
        return $this->dat_voces->consultarSinonimos();
    }
    
    public function eliminar($id){
        $this->dat_voces->setId($id);
        return $this->dat_voces->eliminar();
    }
    
    public function consultarNumeroCasosRelacionados($id){
        $this->dat_voces->setId($id);
        return $this->dat_voces->consultarNumeroCasosRelacionados();
    }
    
    
    
}
