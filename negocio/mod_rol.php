<?php
/**
 * Description of mod_rol
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/dat_rol.php';

class mod_rol {
    
    private $dat_rol;
    
    public function __construct() {
        $this->dat_rol = new dat_rol();
    }
    
    public function consultarRoles() {
        return $this->dat_rol->consultarRoles();
    }
    
}
