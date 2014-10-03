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
        
        if (count($result) > 0) {
            return $result[0][0];
        } else {
            return "";
        }
    }
    
    public function consultar(){
        $this->con->Conectar();
        $consulta = "select id, caso from to_tipocaso order by caso asc;";
        $result = $this->con->getArrayModoColumna($consulta);        
        $this->con->desconectar();
        return $result;
    }
    
}

?>
