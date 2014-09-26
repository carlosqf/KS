<?php
/**
 * Description of dat_voces_sin
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/conexion.php';

class dat_voces_sin {
    private $con; // conexion
    private $id;
    private $id_voz;
    private $sinonimo;
    
    public function __construct() {
        $this->con = Conexion::getInstancia();
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function setIdVoz($id_voz){
        $this->id_voz = $id_voz;
    }
    
    public function setSinonimo($sinonimo){
        $this->sinonimo = $sinonimo;
    }
    
    public function regitrar(){
        $this->con->conectar();
        $consulta = "insert into to_voces_sin values(default,$this->id_voz,'$this->sinonimo',1);";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function modificarVozSin() {
        $this->con->conectar();
        $consulta = "update to_voces_sin set sinonimo = '$this->sinonimo' where id=$this->id;";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result; 
    }
    
    public function eliminarVozSin() {
        $this->con->conectar();
        $consulta = "delete from to_voces_sin where id=$this->id;";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result; 
    }
    
}
