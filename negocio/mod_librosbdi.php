<?php
/**
 * Description of mod_librosbdi
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/dat_librosbdi.php';

class mod_librosbdi {
    
    private $dat_librosbdi;
    
    public function __construct() {
        $this->dat_librosbdi = new dat_librosbdi();
    }
    
    public function registrar($id_libro, $tid_caso){
        $this->dat_librosbdi->setIdLibro($id_libro);
        $this->dat_librosbdi->setIdCaso($id_caso);
        return $this->dat_librosbdi->registrar();
    }
    
    public function eliminar($id){
        $this->dat_librosbdi->setId($id);
        return $this->dat_librosbdi->eliminar();
    }
    
    public function consultarPorcaso($id_caso){
        $this->dat_librosbdi->setIdCaso($id_caso);
        return $this->dat_librosbdi->consultarPorcaso();
    }
    
    public function consultarLibrosBDI($id_caso){        
        $registros = $this->consultarPorcaso($id_caso);        
        $libros = array();        
        $i = 0;
        foreach ($registros as $reg) {            
            $id       = $reg['id'];
            $id_libro = $reg['id_libro']; // marginal
            $id_caso  = $reg['id_caso'];            
            $xml_titulo = simplexml_load_file("http://82.223.210.105:8080/bdi2ks/getTitulo.php?id=".$id_libro,NULL,TRUE);
	    $libros[$i][0] = $id;
            $libros[$i][1] = $id_libro; //marginal
            $libros[$i][2] = utf8_decode($xml_titulo->valor); // titulo
            $libros[$i][3] = $id_caso;
            $i = $i + 1;
        }
        return $libros;
    }
    
    
}

?>
