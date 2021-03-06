<?php

/**
 * Description of Conexion
 * 
 * La clase conexion se encarga de establecer conexion con las base de datos 
 * de mysql y tambien de ejecutar script para modificar la base de datos o 
 * realizar consultas
 *
 * @author carlos
 */

require_once $_SERVER['DOCUMENT_ROOT'].'/KS/adodb/adodb.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/adodb/adodb-exceptions.inc.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/KS/config/configuracion.php'; 

class conexion
{
    
    private $db;
    private static $instance = null;
    
    private function __construct() 
    {
        $this->db  = NULL;
    }
    
    public static function getInstancia()
    {        
        if (!self::$instance instanceof self){
            self::$instance = new self;
        }
        return self::$instance;
    }   

    public function conectar()
    {        
        try {                       
            $driver   = 'mysql';              
            $server   = $GLOBALS[ 'server_mysql' ];
            $database = $GLOBALS[ 'database_mysql' ];
            $user     = $GLOBALS[ 'usuario_mysql' ];
            $password = $GLOBALS[ 'password_mysql' ];
                      
            $this->db = ADONewConnection($driver);            
           
            $this->db->Connect($server,$user,$password,$database);            
        } catch (Exception $exc) {
            echo $exc->getMessage();
            die();
        }            
    }
    
    public function desconectar()
    {
        try {
            $this->db->Close();
        } catch (Exception $exc) {
            echo $exc->getMessage();
            die();
        }
    }
        
    public function ejecutarConsulta($sql)
    {
        $this->db->Execute("SET NAMES 'utf8'");
        try {            
            $rs = $this->db->Execute($sql); 
            return $rs;
        } catch (Exception $exc) {
            echo 'Error en la Ejecucion de la Consulta!!!';
        }
    }
    
    public function getArrayModoColumna($sql)
    {
        $this->db->Execute("SET NAMES 'utf8'");
        try {  
            $this->db->SetFetchMode(ADODB_FETCH_ASSOC);
            $rs = $this->db->GetArray($sql); 
            return $rs;
        } catch (Exception $exc) {
            echo 'Error en la Ejecucion de la Consulta getArray!!!'.$sql;
        }
    }
    
    public function getArrayModoRegistro($sql)
    {
        $this->db->Execute("SET NAMES 'utf8'");
        try {  
            $rs = $this->db->GetArray($sql); 
            return $rs;
        } catch (Exception $exc) {
            echo 'Error en la Ejecucion de la Consulta getArray!!!'.$sql;
        }
    }
        
}
?>