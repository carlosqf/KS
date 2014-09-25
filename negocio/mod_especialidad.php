<?php
/**
 * Description of mod_especialidad
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/dat_especialidad.php';

class mod_especialidad {
    
    private $dat_especialidad;
    
    public function __construct() {
        $this->dat_especialidad = new dat_especialidad();
    }
    
    public function registrar() {
    }
    
    public function modificar($id,$especialidad, $estado){
        $this->dat_especialidad->setId($id);
        $this->dat_especialidad->setEspecialidad($especialidad);
        $this->dat_especialidad->setEstado($estado);
        $this->dat_especialidad->modificar();
    }
    
    public function consultarPorCodigo($id){
        $this->dat_especialidad->setId($id);
        return $this->dat_especialidad->consultarPorCodigo();
    }
    
    public function consultarHijosTodos($id_padre){
        $this->dat_especialidad->setIdPadre($id_padre);
        return $this->dat_especialidad->consultarHijosTodos();
    }
    
    public function consultarPadres(){
        return $this->dat_especialidad->consultarPadres();
    }
    
    
    
    public function eliminar(){ // cambia de estado       
    }
    
    public function devolverPadre($id){
        $this->dat_especialidad->setId($id);
        return $this->dat_especialidad->devolverPadre();
    }
    
    public function devolverRuta($id_nivel){
        $ruta = "";
        if ($id_nivel == 0){
            $ruta = '/ ';
        }else{                
            $reg = $this->consultarPorCodigo($id_nivel);
            $especialidad = $reg[0][1];                
            $ruta = ' / '.$especialidad.$ruta;
            $id_nivel = $this->devolverPadre($id_nivel);
            while ($id_nivel != 0){                               
                $reg = $this->consultarPorCodigo($id_nivel);
                $id = $reg[0][0];
                $especialidad = $reg[0][1];                
                $ruta = ' / <a href="especialidad_arbol.php?id='.$id.'">'.$especialidad.'</a>'.$ruta;
                $id_nivel = $this->devolverPadre($id_nivel); 
            }
            $ruta = '<a href="especialidad_arbol.php">Inicio</a>'.$ruta;            
        }
        return $ruta;
    }
    
}
