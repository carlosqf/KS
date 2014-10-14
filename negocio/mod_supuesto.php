<?php
/**
 * Description of mod_supuesto
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/dat_usuario.php';

class mod_supuesto {
    
    private $dat_supuesto;
    
    public function __construct() {
        $this->dat_supuesto = new dat_supuesto();
    }
    
    public function registrar($id_caso,$fecha,$lugar,$descripcion) {
        $this->con->conectar();
        $consulta = "";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function modificar($id,$fecha,$lugar,$descripcion) {
        $this->con->conectar();
        $consulta = "";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function eliminar($id) {
        $this->con->conectar();
        $consulta = "";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarPorCodigo($id) {
        $this->con->Conectar();
        $consulta = "";
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
}
