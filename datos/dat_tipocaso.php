<?php
/**
 * Description of dat_tipocaso
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/conexion.php';

class dat_tipocaso {
    private $con; // conexion
    private $id;
    
    public function __construct() {
        $this->con = Conexion::getInstancia();
    }
    
    public function setId($id){
        $this->id = $id;
    }
        
    public function getTipoCasoId(){
        $this->con->Conectar();
        $consulta = "SELECT caso FROM to_tipocaso where id = $this->id;";
        $result = $this->con->getArrayModoRegistro($consulta);        
        $this->con->desconectar();
        return $result[0][0];
    }
    
}

?>