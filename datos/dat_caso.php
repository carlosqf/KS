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
    private $id_especialidad;
    private $id_estado;
    private $id_tipocaso;
    private $titulo;
    private $id_docs;
    
    
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
    
    public function setIdEspecialidad($id_especialidad) {
        $this->id_especialidad = $id_especialidad;
    }

    public function setIdEstado($id_estado) {
        $this->id_estado = $id_estado;
    }
    
    public function setIdTipoCaso($id_tipocaso) {
        $this->id_tipocaso = $id_tipocaso;
    }
    
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    
    public function setIdDocs($id_docs){
        $this->id_docs = $id_docs;
    }
    
    public function registrar(){
        $this->con->conectar();
        $consulta = "INSERT INTO to_casos (id_admin,id_tipocaso,id_estado,titulo,voces,articulos,fecha) VALUES ('".
                         $this->id_admin."', '".
			 $this->id_tipocaso."', '".
			 "1', '".
			 $this->titulo."','','','".
			 date("Y-m-d")."'".
             " )";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function modificarTitulo(){
        $this->con->conectar();
        $consulta = "update to_casos
set titulo = '$this->titulo'
where id = $this->id;";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function modificarTipoCaso(){
        $this->con->conectar();
        $consulta = "update to_casos
set id_tipocaso = $this->id_tipocaso
where id = $this->id;";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function modificarEstado(){
        $this->con->conectar();
        $consulta = "update to_casos
set id_estado = $this->id_estado
where id = $this->id;";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function modificarEspecialidad(){
        $this->con->conectar();
        $consulta = "update to_casos
set id_especialidad = $this->id_especialidad
where id = $this->id;";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function modificarIdDocs(){
        $this->con->conectar();
        $consulta = "update to_casos
set id_docs = $this->id_docs
where id = $this->id;";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarUltimoID(){
        $this->con->Conectar();        
        $consulta = "select max(id) as id from to_casos;";        
        $result = $this->con->getArrayModoRegistro($consulta);        
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function consultarPorCodigo(){
        $this->con->Conectar();
        $consulta = "SELECT id, id_admin, id_especialidad, id_tipocaso, titulo, voces, id_norma, jurisprudencia, documentos, id_estado, fecha, cod, objetivo, estrategia, norma, id_docs, articulos, mostrarEnDemo, created_at, updated_at
FROM to_casos t
where id = $this->id;";
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarCasosPorEspecialidad($pagina){
        $this->con->Conectar();
        $pagina = ($pagina - 1) * 20;
        $consulta = "SELECT id, titulo, id_tipocaso, id_estado 
                     FROM to_casos
                     where id_especialidad = $this->id_especialidad
		     order by id desc
                     limit $pagina,20";
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarNumeroCasosPorEspecialidad(){
        $this->con->Conectar();
        $consulta = "select COUNT(*) as total
                     from to_casos
                     where id_especialidad= $this->id_especialidad;";
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function quitarVozDelCaso($id_voz){
        $this->con->Conectar();
        $consulta = "delete from to_caso_voces
                     where id_caso = $this->id and
                           id_voces = $id_voz;";
        $result = $this->con->ejecutarConsulta($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    
    
    
    
    
    
    
    // estos metodos son muy vuelteros dejarlos al ultimo separados de los metodos principales
    
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
    
    
    // TODOS LOS TODOS    
        
    public function totalCasosTodos(){
        $this->con->Conectar();
        $consulta = "select COUNT(*) as total
                     from to_casos;";
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function totalCasosJudicialesTodos(){
        $this->con->Conectar();
        $consulta = "select COUNT(*) as total
                     from to_casos
                     where id_tipocaso=1;";        
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function totalCasosExtrajudicialesTodos(){
        $this->con->Conectar();
        $consulta = "select COUNT(*) as total
                     from to_casos
                     where id_tipocaso=2;";        
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function totalCasosConsultasTodos(){
        $this->con->Conectar();
        $consulta = "select COUNT(*) as total
                     from to_casos
                     where id_tipocaso=9;";        
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function totalCasosFinalizadosTodos(){
        $this->con->Conectar();
        $consulta = "select COUNT(*) as total
                     from to_casos
                     where id_estado=3;";        
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function totalCasosEmpezadosTodos(){
        $this->con->Conectar();
        $consulta = "select COUNT(*) as total
                     from to_casos
                     where id_estado=1;";        
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function totalCasosParaRevisarTodos(){
        $this->con->Conectar();
        $consulta = "select COUNT(*) as total
                     from to_casos
                     where id_estado=2;";
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    }
    
    public function totalCasosRealizarCambiosTodos(){
        $this->con->Conectar();
        $consulta = "select COUNT(*) as total
                     from to_casos
                     where id_estado=4;";        
        $result = $this->con->getArrayModoRegistro($consulta);
        $this->con->desconectar();
        return $result[0][0];
    } 
    
    public function consultarTodos($pagina){
        $this->con->Conectar();
        $pagina = ($pagina - 1) * 20;
        $consulta = "SELECT id, titulo, id_tipocaso, id_estado 
                     FROM to_casos
		     order by id desc
                     limit $pagina,20";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarJudicialesTodos($pagina){
        $this->con->Conectar();
        $pagina = ($pagina - 1) * 20;
        $consulta = "SELECT id, titulo, id_tipocaso, id_estado 
                     FROM to_casos
                     where id_tipocaso=1
		     order by id desc
                     limit $pagina,20";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarExtrajudicialesTodos($pagina){
        $this->con->Conectar();
        $pagina = ($pagina - 1) * 20;
        $consulta = "SELECT id, titulo, id_tipocaso, id_estado 
                     FROM to_casos
                     where id_tipocaso=2
		     order by id desc
                     limit $pagina,20";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarConsultasTodos($pagina){
        $this->con->Conectar();
        $pagina = ($pagina - 1) * 20;
        $consulta = "SELECT id, titulo, id_tipocaso, id_estado 
                     FROM to_casos
                     where id_tipocaso=9
		     order by id desc
                     limit $pagina,20";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarFinalizadosTodos($pagina){
        $this->con->Conectar();
        $pagina = ($pagina - 1) * 20;
        $consulta = "SELECT id, titulo, id_tipocaso, id_estado 
                     FROM to_casos
                     where id_estado=3
		     order by id desc
                     limit $pagina,20";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }   
    
    public function consultarEmpezadosTodos($pagina){
        $this->con->Conectar();
        $pagina = ($pagina - 1) * 20;
        $consulta = "SELECT id, titulo, id_tipocaso, id_estado 
                     FROM to_casos
                     where id_estado=1
		     order by id desc
                     limit $pagina,20";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarRevisadosTodos($pagina){
        $this->con->Conectar();
        $pagina = ($pagina - 1) * 20;
        $consulta = "SELECT id, titulo, id_tipocaso, id_estado 
                     FROM to_casos
                     where id_estado=2
		     order by id desc
                     limit $pagina,20";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    public function consultarCambiosRealizarTodos($pagina){
        $this->con->Conectar();
        $pagina = ($pagina - 1) * 20;
        $consulta = "SELECT id, titulo, id_tipocaso, id_estado 
                     FROM to_casos
                     where id_estado=4
		     order by id desc
                     limit $pagina,20";        
        $result = $this->con->getArrayModoColumna($consulta);
        $this->con->desconectar();
        return $result;
    }
    
    
    
    
    
}

?>
