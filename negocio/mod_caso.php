<?php
/**
 * Description of mod_caso
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/dat_caso.php';

class mod_caso {
    
    private $dat_caso;
    
    public function __construct() {
        $this->dat_caso = new dat_caso();
    }  
    
    public function consultarPorCodigo($id){
        $this->dat_caso->setId($id);
        return $this->dat_caso->consultarPorCodigo();
    }
    
    public function totalCasos($id_admin){
        $this->dat_caso->setIdAdmin($id_admin);
        return $this->dat_caso->totalCasos();
    }
    
    public function totalCasosJudiciales($id_admin){
        $this->dat_caso->setIdAdmin($id_admin);
        return $this->dat_caso->totalCasosJudiciales();
    }
    
    public function totalCasosExtrajudiciales($id_admin){
        $this->dat_caso->setIdAdmin($id_admin);
        return $this->dat_caso->totalCasosExtrajudiciales();
    }
    
    public function totalCasosConsultas($id_admin){
        $this->dat_caso->setIdAdmin($id_admin);
        return $this->dat_caso->totalCasosConsultas();
    }
    
    public function totalCasosFinalizados($id_admin){
        $this->dat_caso->setIdAdmin($id_admin);
        return $this->dat_caso->totalCasosFinalizados();
    }
    
    public function totalCasosEmpezados($id_admin){
        $this->dat_caso->setIdAdmin($id_admin);
        return $this->dat_caso->totalCasosEmpezados();
    }
    
    public function totalCasosParaRevisar($id_admin){
        $this->dat_caso->setIdAdmin($id_admin);
        return $this->dat_caso->totalCasosParaRevisar();
    }
    
    public function totalCasosRealizarCambios($id_admin){
        $this->dat_caso->setIdAdmin($id_admin);
        return $this->dat_caso->totalCasosRealizarCambios();
    }
    
    
    // casos por usuario de acuardo al tipo de caso o al estado
    
    public function consultarTodosPorUsuario($pagina, $id_admin){
        $this->dat_caso->setIdAdmin($id_admin);
        return $this->dat_caso->consultarTodosPorUsuario($pagina);
    }
    
    public function consultarJudicialesPorUsuario($pagina, $id_admin){
        $this->dat_caso->setIdAdmin($id_admin);
        return $this->dat_caso->consultarJudicialesPorUsuario($pagina);
    }
    
    public function consultarExtrajudicialesPorUsuario($pagina, $id_admin){
        $this->dat_caso->setIdAdmin($id_admin);
        return $this->dat_caso->consultarExtrajudicialesPorUsuario($pagina);
    }
    
    public function consultarConsultasPorUsuario($pagina, $id_admin){
        $this->dat_caso->setIdAdmin($id_admin);
        return $this->dat_caso->consultarConsultasPorUsuario($pagina);
    }
    
    public function consultarFinalizadosPorUsuario($pagina, $id_admin){
        $this->dat_caso->setIdAdmin($id_admin);
        return $this->dat_caso->consultarFinalizadosPorUsuario($pagina);
    }   
    
    public function consultarEmpezadosPorUsuario($pagina, $id_admin){
        $this->dat_caso->setIdAdmin($id_admin);
        return $this->dat_caso->consultarEmpezadosPorUsuario($pagina);
    }
    
    public function consultarRevisadosPorUsuario($pagina, $id_admin){
        $this->dat_caso->setIdAdmin($id_admin);
        return $this->dat_caso->consultarRevisadosPorUsuario($pagina);
    }
    
    public function consultarCambiosRealizarPorUsuario($pagina, $id_admin){
        $this->dat_caso->setIdAdmin($id_admin);
        return $this->dat_caso->consultarCambiosRealizarPorUsuario($pagina);
    }
    
    
}

?>
