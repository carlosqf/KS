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
    
    public function consultarPorCodigo($id){
        $this->dat_especialidad->setId($id);
        return $this->dat_especialidad->consultarPorCodigo();
    }
    
    public function consultarHijos($id_padre){
        $this->dat_especialidad->setIdPadre($id_padre);
        return $this->dat_especialidad->consultarHijos();
    }
    
    public function consultarPadres(){
        return $this->dat_especialidad->consultarPadres();
    }
    
    public function modificar(){
    }
    
    public function eliminar(){ // cambia de estado       
    }
    
    public function devolverPadre($id){
        $this->dat_especialidad->setId($id);
        return $this->dat_especialidad->devolverPadre();
    }
    
    public function devolverRuta($id_nivel){
        $ruta = 0;
        if ($id_nivel == 0){
            $ruta = '<a href="especialidad_arbol.php">Inicio</a> /';
        }else{
            $id_padre = $id_nivel;
            while ($id_padre != 0) {                
                $reg = $this->consultarPorCodigo($id_nivel);
                $id = $reg[0][0]; 
                $especialidad = $reg[0][1];                
                $ruta = '<a href="especialidad_arbol.php?es='.$id.'">'.$especialidad.'</a> /'.$ruta;                
                $id_padre = $this->devolverPadre($id);
            }
            $ruta = '<a href="especialidad_arbol.php">Inicio</a> /'.$ruta;            
        }
        return $ruta;
    }
    
}
