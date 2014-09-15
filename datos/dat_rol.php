<?php
/**
 * Description of dat_rol
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/conexion.php';

class dat_rol {
    private $con; // conexion
    
    public function __construct() {
        $this->con = Conexion::getInstancia();
    }
    
    public function consultarRoles() {
        $this->con->Conectar();
        $consulta = "SELECT id, identificadorempresa, rol, paginainicio FROM to_rolinit t;";
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
}
