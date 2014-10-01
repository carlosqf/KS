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
    
    
    
    // todos los casos
    
    public function totalCasosTodos(){        
        return $this->dat_caso->totalCasosTodos();
    }
    
    public function totalCasosJudicialesTodos(){        
        return $this->dat_caso->totalCasosJudicialesTodos();
    }
    
    public function totalCasosExtrajudicialesTodos(){        
        return $this->dat_caso->totalCasosExtrajudicialesTodos();
    }
    
    public function totalCasosConsultasTodos(){        
        return $this->dat_caso->totalCasosConsultasTodos();
    }
    
    public function totalCasosFinalizadosTodos(){        
        return $this->dat_caso->totalCasosFinalizadosTodos();
    }
    
    public function totalCasosEmpezadosTodos(){        
        return $this->dat_caso->totalCasosEmpezadosTodos();
    }
    
    public function totalCasosParaRevisarTodos(){
        return $this->dat_caso->totalCasosParaRevisarTodos();
    }
    
    public function totalCasosRealizarCambiosTodos(){
        return $this->dat_caso->totalCasosRealizarCambiosTodos();
    } 
    
    public function consultarTodos($pagina){        
        return $this->dat_caso->consultarTodos($pagina);
    }
    
    public function consultarJudicialesTodos($pagina){
        return $this->dat_caso->consultarJudicialesTodos($pagina);
    }
    
    public function consultarExtrajudicialesTodos($pagina){        
        return $this->dat_caso->consultarExtrajudicialesTodos($pagina);
    }
    
    public function consultarConsultasTodos($pagina){        
        return $this->dat_caso->consultarConsultasTodos($pagina);
    }
    
    public function consultarFinalizadosTodos($pagina){        
        return $this->dat_caso->consultarFinalizadosTodos($pagina);
    }   
    
    public function consultarEmpezadosTodos($pagina){
        return $this->dat_caso->consultarEmpezadosTodos($pagina);
    }
    
    public function consultarRevisadosTodos($pagina){        
        return $this->dat_caso->consultarRevisadosTodos($pagina);
    }
    
    public function consultarCambiosRealizarTodos($pagina){
        return $this->dat_caso->consultarCambiosRealizarTodos($pagina);
    }
    
    
}
?>