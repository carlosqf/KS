<?php
/**
 * Description of dat_caso
 *
 * @author CARLOS
 */
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/datos/conexion.php';

class dat_caso {
    private $con; // conexion
    private $id;
    
    private $id_admin;
    private $id_estado;
    private $id_tipocaso;
    
    //completar los demas atributos

    public function __construct() {
        $this->con = Conexion::getInstancia();
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function setIdAdmin($id_admin) {
        $this->id_admin = $id_admin;
    }

    public function setIdEstado($id_estado) {
        $this->id_estado = $id_estado;
    }
    
    public function setIdTipoCaso($id_tipocaso) {
        $this->id_tipocaso = $id_tipocaso;
    }
    
    public function totalCasos(){
        $this->con->Conectar();
        $consulta = "select COUNT(*) as total
                     from to_casos
                     where id_admin= $this->id_admin;";
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function totalCasosJudiciales(){
        $this->con->Conectar();
        $consulta = "select COUNT(*) as total
                     from to_casos
                     where id_tipocaso=1 
                     and id_admin=$this->id_admin;";        
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function totalCasosExtrajudiciales(){
        $this->con->Conectar();
        $consulta = "select COUNT(*) as total
                     from to_casos
                     where id_tipocaso=2
                     and id_admin=$this->id_admin;";        
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function totalCasosConsultas(){
        $this->con->Conectar();
        $consulta = "select COUNT(*) as total
                     from to_casos
                     where id_tipocaso=9
                     and id_admin=$this->id_admin;";        
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function totalCasosFinalizados(){
        $this->con->Conectar();
        $consulta = "select COUNT(*) as total
                     from to_casos
                     where id_estado=3
                     and id_admin=$this->id_admin;";        
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function totalCasosEmpezados(){
        $this->con->Conectar();
        $consulta = "select COUNT(*) as total
                     from to_casos
                     where id_estado=1 
                     and id_admin=$this->id_admin;";        
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function totalCasosParaRevisar(){
        $this->con->Conectar();
        $consulta = "select COUNT(*) as total
                     from to_casos
                     where id_estado=2 
                     and id_admin=$this->id_admin;";
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function totalCasosRealizarCambios(){
        $this->con->Conectar();
        $consulta = "select COUNT(*) as total
                     from to_casos
                     where id_estado=4
                     and id_admin=$this->id_admin;";        
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }   
    
    public function consultarTodosPorUsuario($pagina){
        $this->con->Conectar();
        $pagina = ($pagina - 1) * 10;
        $consulta = "SELECT id, titulo, id_tipocaso, id_estado 
                     FROM to_casos
                     where id_admin= $this->id_admin
		     order by id desc
                     limit $pagina,10";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarJudicialesPorUsuario($pagina){
        $this->con->Conectar();
        $pagina = ($pagina - 1) * 10;
        $consulta = "SELECT id, titulo, id_tipocaso, id_estado 
                     FROM to_casos
                     where id_admin= $this->id_admin and id_tipocaso=1
		     order by id desc
                     limit $pagina,10";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarExtrajudicialesPorUsuario($pagina){
        $this->con->Conectar();
        $pagina = ($pagina - 1) * 10;
        $consulta = "SELECT id, titulo, id_tipocaso, id_estado 
                     FROM to_casos
                     where id_admin= $this->id_admin and id_tipocaso=2
		     order by id desc
                     limit $pagina,10";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarConsultasPorUsuario($pagina){
        $this->con->Conectar();
        $pagina = ($pagina - 1) * 10;
        $consulta = "SELECT id, titulo, id_tipocaso, id_estado 
                     FROM to_casos
                     where id_admin= $this->id_admin and id_tipocaso=9
		     order by id desc
                     limit $pagina,10";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarFinalizadosPorUsuario($pagina){
        $this->con->Conectar();
        $pagina = ($pagina - 1) * 10;
        $consulta = "SELECT id, titulo, id_tipocaso, id_estado 
                     FROM to_casos
                     where id_admin= $this->id_admin and id_estado=3
		     order by id desc
                     limit $pagina,10";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }   
    
    public function consultarEmpezadosPorUsuario($pagina){
        $this->con->Conectar();
        $pagina = ($pagina - 1) * 10;
        $consulta = "SELECT id, titulo, id_tipocaso, id_estado 
                     FROM to_casos
                     where id_admin= $this->id_admin and id_estado=1
		     order by id desc
                     limit $pagina,10";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarRevisadosPorUsuario($pagina){
        $this->con->Conectar();
        $pagina = ($pagina - 1) * 10;
        $consulta = "SELECT id, titulo, id_tipocaso, id_estado 
                     FROM to_casos
                     where id_admin= $this->id_admin and id_estado=2
		     order by id desc
                     limit $pagina,10";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarCambiosRealizarPorUsuario($pagina){
        $this->con->Conectar();
        $pagina = ($pagina - 1) * 10;
        $consulta = "SELECT id, titulo, id_tipocaso, id_estado 
                     FROM to_casos
                     where id_admin= $this->id_admin and id_estado=4
		     order by id desc
                     limit $pagina,10";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    
}

?>
