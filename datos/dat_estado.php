<?php
/**
 * Description of dat_estado
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/conexion.php';

class dat_estado {
    private $con; // conexion
    private $id;
    
    public function __construct() {
        $this->con = Conexion::getInstancia();
    }
    
    public function setId($id){
        $this->id = $id;
    }
        
    public function getEstadoId(){
        $this->con->Conectar();
        $consulta = "SELECT estado FROM to_estado where id = $this->id;";
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
        $consulta = "select id, estado, cod from to_estado;";
        $result = $this->con->getArrayModoColumna($consulta);        
        $this->con->desconectar();
        return $result;
    }
}
