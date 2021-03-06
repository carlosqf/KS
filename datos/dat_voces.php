<?php
/**
 * Description of dat_voces
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/conexion.php';

class dat_voces {
    private $con; // conexion
    private $id;
    private $voces;
    private $estado;
        
    public function __construct() {
        $this->con = Conexion::getInstancia();
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function setVoces($voces){
        $this->voces = $voces;
    }
    
    public function setEstado($estado){
        $this->estado = $estado;
    }
    
    public function regitrar(){
        $this->con->conectar();
        $consulta = "insert into to_voces values(default,'$this->voces',$this->estado);";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarVoces($numero_pagina) {
        $this->con->Conectar();
        $pagina = ($numero_pagina - 1) * 20;
        $consulta = "select id, voces, estado
                    from to_voces
                    order by voces
                    limit $pagina,20;";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarVocesTodosHabilitados() {
        $this->con->Conectar();
        $consulta = "select id, voces, estado
                    from to_voces
                    where estado = 1
                    order by voces";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarVocesPorLetra($letra) {
        $this->con->Conectar();
        $consulta = "SELECT * FROM to_voces WHERE  ((voces LIKE '$letra%') or (voces LIKE '$letra%')) and estado = 1;";
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function buscarVocesSinonimos($texto){
        $this->con->Conectar();
        $consulta = "select  distinct vo.id, vo.voces, vo.estado
from to_voces as vo, to_voces_sin as vosin
where vo.voces like '%$texto%' and
      vo.estado = 1 or
      vo.id in ( select id_voz from to_voces_sin where sinonimo like '%$texto%' )
order by voces;";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarVocesPorCaso($id_caso) {
        $this->con->Conectar();
        $consulta = "select cv.id, cv.id_voces, v.voces
from to_caso_voces as cv, to_voces as v
where cv.id_caso = $id_caso and
      cv.id_voces = v.id
order by v.voces;";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function modificarVoces() {
        $this->con->conectar();
        $consulta = "update to_voces set voces = '$this->voces', estado = $this->estado where id=$this->id;";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result; 
    }
    
    public function numeroDeVoces() {
        $this->con->Conectar();
        $consulta = "select count(id) from to_voces;";
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function consultarSinonimos(){
        $this->con->Conectar();
        $consulta = "select id, sinonimo from to_voces_sin where id_voz = $this->id order by sinonimo;";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarNumeroSinonimos(){
        $this->con->Conectar();
        $consulta = "select count(id) from to_voces_sin where id_voz = $this->id;";        
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function eliminar(){
        $this->con->conectar();
        $consulta = "delete from to_voces where id=$this->id;";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarNumeroCasosRelacionados(){
        $this->con->conectar();
        $consulta = "select count(id) from to_caso_voces where id_voces = $this->id;";
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function buscarVoces() {
        $this->con->Conectar();
        $consulta = "select id, voces, estado from to_voces where voces like '%$this->voces%' order by voces;";
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarPorCodigo(){
        $this->con->Conectar();
        $consulta = "select id, voces, estado from to_voces where id = $this->id;";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarUltimoID(){
        $this->con->Conectar();        
        $consulta = "select max(id) as id from to_voces;";        
        $result = $this->con->getArrayModoRegistro($consulta);        
        $this->con->desconectar();
        return $result[0][0];
    }
    
}
