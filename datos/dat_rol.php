<?php
/**
 * Description of dat_rol
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/conexion.php';

class dat_rol {
    private $con; // conexion
    private $id;
    
    public function setId($id){
        $this->id = $id;
    }
    
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
    
    public function getRolId(){
        $this->con->Conectar();
        $consulta = "SELECT rol FROM to_rolinit t where id = $this->id;";
        $result = $this->con->getArrayModoRegistro($consulta);        
        $this->con->desconectar();
        return $result[0][0];
    }
    
}
