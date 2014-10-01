<?php
/**
 * Description of mod_tipocaso
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/dat_tipocaso.php';

class mod_tipocaso {
    
    private $dat_tipocaso;
    
    public function __construct() {
        $this->dat_tipocaso = new dat_tipocaso();
    }
    
    public function getTipoCasoId($id) {
        $this->dat_tipocaso->setId($id);
        return $this->dat_tipocaso->getTipoCasoId();
    }
    
    public function consultar(){        
        return $this->dat_tipocaso->consultar();
    }
    
}

?>
