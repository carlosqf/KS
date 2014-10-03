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
    private $estado;

    public function __construct() {
        $this->con = Conexion::getInstancia();
    }

    public function setEstado($estado) {
        $this->estado = $estado;
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
        $consulta = "insert into to_especialidad values(default,'$this->especialidad',$this->estado,0,0,0,0,0,0,0,0,0,$this->id_padre,'000');";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarPorCodigo() {
        $this->con->Conectar();
        $consulta = "select id, especialidad, estado from to_especialidad where id = $this->id;";
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function getEspecialidadPorCodigo() {
        $this->con->Conectar();
        $consulta = "select especialidad from to_especialidad where id = $this->id;";
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function consultarHijosTodos(){// habilitados 1 e inhablitados 0
        $this->con->Conectar();
        $consulta = "select id, especialidad, id_padre, estado
from to_especialidad
where id_padre = $this->id_padre
order by especialidad";
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarNumeroHijosTodos(){
        $this->con->Conectar();
        $consulta = "select count(id)
from to_especialidad
where id_padre = $this->id_padre;";
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function consultarNumeroCasos(){
        $this->con->Conectar();
        $consulta = "select count(id) from to_casos where id_especialidad = $this->id;";
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
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
        $consulta = "update to_especialidad
set especialidad='$this->especialidad', estado=$this->estado
where id = $this->id;";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function eliminar(){ // elimina definitivamente
        $this->con->Conectar();
        $consulta = "delete from to_especialidad where id = $this->id;";
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
    
    public function buscarEspecialidad() {
        $this->con->Conectar();
        $consulta = "select id, especialidad from to_especialidad where especialidad LIKE '%$this->especialidad%' order by especialidad;";
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
}
