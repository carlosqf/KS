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
    
    public function consultarVocesTodosHabilitados() {        
        return $this->dat_voces->consultarVocesTodosHabilitados();
    }
    
    public function consultarVocesPorLetra($letra) {
        return $this->dat_voces->consultarVocesPorLetra($letra);
    }
    
    public function buscarVocesSinonimos($texto){        
        return $this->dat_voces->buscarVocesSinonimos($texto);
    }
    
    public function consultarVocesPorCaso($id_caso) {
        return $this->dat_voces->consultarVocesPorCaso($id_caso);
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
    
    public function consultarNumeroSinonimos($id){
        $this->dat_voces->setId($id);
        return $this->dat_voces->consultarNumeroSinonimos();
    }
    
    public function eliminar($id){
        $this->dat_voces->setId($id);
        return $this->dat_voces->eliminar();
    }
    
    public function consultarNumeroCasosRelacionados($id){
        $this->dat_voces->setId($id);
        return $this->dat_voces->consultarNumeroCasosRelacionados();
    }
    
    public function buscarVoces($texto) {
        $this->dat_voces->setVoces($texto);
        return $this->dat_voces->buscarVoces();
    }
    
    public function consultarPorCodigo($id){
        $this->dat_voces->setId($id);
        return $this->dat_voces->consultarPorCodigo();
    }
    
    public function consultarUltimoID(){
        return $this->dat_voces->consultarUltimoID();
    }
    
}
