<?php
/**
 * Description of dat_supuesto
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/conexion.php';

class dat_supuesto {
    private $con; // conexion
    private $id;
    private $id_caso;
    private $fecha;
    private $lugar;
    private $descripcion;
    
    public function __construct() {
        $this->con = conexion::getInstancia();
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function setIdCaso($id_caso){
        $this->id_caso = $id_caso;
    }
    
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    
    public function setLugar($lugar){
        $this->lugar = $lugar;
    }
    
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    
    public function registrar() {
        $this->con->conectar();
        $consulta = "";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function modificar() {
        $this->con->conectar();
        $consulta = "";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function eliminar() {
        $this->con->conectar();
        $consulta = "";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarPorCodigo() {
        $this->con->Conectar();
        $consulta = "";
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    
    
}
