<?php
/**
 * Description of dat_especialidad
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/conexion.php';

class dat_especialidad {
    
    private $con; // conexion
    private $id;
    private $especialidad;
    private $id_padre;

    public function __construct() {
        $this->con = Conexion::getInstancia();
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function setEspecialidad($especialidad) {
        $this->especialidad = $especialidad;
    }
    
    public function setIdPadre($id_padre) {
        $this->id_padre = $id_padre;
    }
    
    public function registrar() {
        $this->con->conectar();
        $consulta = "insert into to_usuarios values(default,'$this->identificadorempresa','$this->username','$this->password',$this->id_rol,'$this->nombre','$this->telefono',$this->activo,$this->borrado);";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarPorCodigo() {
        $this->con->Conectar();
        $consulta = "select id, especialidad from to_especialidad where id = $this->id;";
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarHijos(){
        $this->con->Conectar();
        $consulta = "select id, especialidad, id_padre
from to_especialidad
where id_padre = $this->id_padre
order by especialidad";
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarPadres(){
        $this->con->Conectar();
        $consulta = "select id, especialidad, id_padre
from to_especialidad
where id_padre = 0
order by especialidad;";
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function modificar(){
        $this->con->Conectar();
        $consulta = "";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function eliminar(){ // cambia de estado
        $this->con->Conectar();
        $consulta = "";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function devolverPadre(){
        $this->con->Conectar();
        $consulta = "select id_padre from to_especialidad where id = $this->id;";
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
}
