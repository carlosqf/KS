<?php
/**
 * Description of mod_voces_sin
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/dat_voces_sin.php';

class mod_voces_sin {
    private $dat_voces_sin;
    
    public function __construct() {
        $this->dat_voces_sin = new dat_voces_sin();
    }
    
    public function regitrar($id_voz, $sinonimo){
        $this->dat_voces_sin->setIdVoz($id_voz);
        $this->dat_voces_sin->setSinonimo($sinonimo);
        return $this->dat_voces_sin->regitrar();
    }
    
    public function modificarVozSin($id, $sinonimo) {
        $this->dat_voces_sin->setId($id);
        $this->dat_voces_sin->setSinonimo($sinonimo);
        return $this->dat_voces_sin->modificarVozSin(); 
    }
    
    public function eliminarVozSin($id) {
        $this->dat_voces_sin->setId($id);
        return $this->dat_voces_sin->eliminarVozSin(); 
    }
    
    public function consultarPorCodigo($id){
        $this->dat_voces_sin->setId($id);
        return $this->dat_voces_sin->consultarPorCodigo();
    }
    
    
}
