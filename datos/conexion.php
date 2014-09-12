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

require_once '../adodb/adodb.inc.php';
require_once '../adodb/adodb-exceptions.inc.php';
require_once '../config/configuracion.php'; 

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
            // DATOS DE LA BASE DE DATOS Y EL USUARIO con autentificacion de windows               
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
    
    public function ejecutarSQL($sql)
    {
        $this->db->Execute("SET NAMES 'utf8'");
        if ($this->db->Execute($sql)){
            return 1;  // SE EJECUTO CORRECTAMENTE
        }else{
            return 0;  // NO SE EJECUTO CORRECTAMENTE
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
    
    public function getArray($sql)
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