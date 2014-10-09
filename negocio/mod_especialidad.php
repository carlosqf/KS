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
    
    public function registrar($especialidad, $estado, $id_padre) {
        $this->dat_especialidad->setEspecialidad($especialidad);
        $this->dat_especialidad->setEstado($estado);
        $this->dat_especialidad->setIdPadre($id_padre);
        $this->dat_especialidad->registrar();
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
    
    public function getEspecialidadPorCodigo($id) {
        $this->dat_especialidad->setId($id);
        return $this->dat_especialidad->getEspecialidadPorCodigo();
    }
    
    public function consultarHijosTodos($id_padre){
        $this->dat_especialidad->setIdPadre($id_padre);
        return $this->dat_especialidad->consultarHijosTodos();
    }
    
    public function consultarNumeroHijosTodos($id_padre){
        $this->dat_especialidad->setIdPadre($id_padre);
        return $this->dat_especialidad->consultarNumeroHijosTodos();
    }
    
    public function consultarNumeroCasos($id){
        $this->dat_especialidad->setId($id);
        return $this->dat_especialidad->consultarNumeroCasos();
    }
    
    public function consultarPadres(){
        return $this->dat_especialidad->consultarPadres();
    }
           
    public function eliminar($id){ // elimina definitivamente
        $this->dat_especialidad->setId($id);
        return $this->dat_especialidad->eliminar();
    }
    
    public function devolverPadre($id){
        $this->dat_especialidad->setId($id);
        return $this->dat_especialidad->devolverPadre();
    }
    
    public function devolverRuta($id_nivel, $archivo_ruta){ // archivo_ruta -> a que archivo se redireccionara
        $ruta = "";
        if ($id_nivel == 0){
            $ruta = 'Inicio ';
        }else{                
            $reg = $this->consultarPorCodigo($id_nivel);
            if (count($reg)>0){
                $especialidad = $reg[0][1];                
                $ruta = ' / '.$especialidad.$ruta;
                $id_nivel = $this->devolverPadre($id_nivel);
                while ($id_nivel != 0){                               
                    $reg = $this->consultarPorCodigo($id_nivel);
                    $id = $reg[0][0];
                    $especialidad = $reg[0][1];                
                    $ruta = ' / <a href="'.$archivo_ruta.'?id='.$id.'">'.$especialidad.'</a>'.$ruta;
                    $id_nivel = $this->devolverPadre($id_nivel); 
                }
                $ruta = '<a href="'.$archivo_ruta.'">Inicio</a>'.$ruta;    
            }                        
        }
        return $ruta;
    }
    
    public function devolverRutaSinEnlace($id_nivel){ 
        $ruta = "";                
        $reg = $this->consultarPorCodigo($id_nivel);
        if (count($reg)>0){
            $especialidad = $reg[0][1];                
            $ruta = '<span style="font-weight: bold; color:red;"> / </span><b>'.$especialidad.'</b>';
            $id_nivel = $this->devolverPadre($id_nivel);
            while ($id_nivel != 0){                               
                $reg = $this->consultarPorCodigo($id_nivel);
                $especialidad = $reg[0][1];                
                $ruta = '<span style="font-weight: bold; color:red;"> / </span>'.$especialidad.$ruta;
                $id_nivel = $this->devolverPadre($id_nivel); 
            }   
        }
        return $ruta;
    }
    
    public function buscarEspecialidad($texto_buscar){
        $this->dat_especialidad->setEspecialidad($texto_buscar);
        return $this->dat_especialidad->buscarEspecialidad();
    }
    
}
