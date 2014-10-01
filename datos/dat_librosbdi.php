<?php
/**
 * Description of dat_librosbdi
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/conexion.php';

class dat_librosbdi {
    
    private $con; // conexion
    private $id;
    private $id_libro;
    private $id_caso;
    
    public function __construct() {
        $this->con = Conexion::getInstancia();
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function setIdLibro($id_libro){
        $this->id_libro = $id_libro;
    }
    
    public function setIdCaso($id_caso){
        $this->id_caso = $id_caso;
    }
    
    public function registrar(){
        $this->con->conectar();
        $consulta = "insert into to_libros_casos_2 values(default,$this->id_libro,$this->id_caso,1);";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function eliminar(){
        $this->con->conectar();
        $consulta = "delete from to_libros_casos_2 where id = $this->id;";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarPorcaso(){
        $this->con->Conectar();
        $consulta = "select id, id_libro, id_caso from to_libros_casos_2 where id_caso=$this->id_caso;";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    
}

?>
