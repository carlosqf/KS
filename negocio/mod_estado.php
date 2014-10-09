<?php
/**
 * Description of mod_estado
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/dat_estado.php';

class mod_estado {
    private $dat_estado;
    
    public function __construct() {
        $this->dat_estado = new dat_estado();
    }
    
    public function getEstadoId($id_estado){
        $this->dat_estado->setId($id_estado);
        return $this->dat_estado->getEstadoId();
    }
    
    public function consultar(){
        return $this->dat_estado->consultar();
    }
    
}
