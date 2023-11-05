<?php 
    class c_conexiones_bd{
    public static function Conectar() 
    {   
        if(defined('servidor')==false){
            define('servidor', 'localhost');
        }
        if(defined('nombre_bd')==false){
            //define('nombre_bd', 'csitecc_bd_condominio');
            define('nombre_bd', 'bd_condominio');
        }
        if(defined('usuario')==false){
            //define('usuario', 'csitecc');
            define('usuario', 'root');
        }
        if(defined('password')==false){
            //define('password', 'F9b.q@0%K7sM');
            define('password', '');
        }
        
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');			
        try
            {
                $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);			
                return $conexion;
            }
        catch(Exception $e)
            {
                die("El error de Conexión es: ". $e->getMessage());
            }
    }

    public static function Conectar2() 
    {        
        define('servidor', 'localhost');
        define('nombre_bd', 'bd_condominio');
        define('usuario', 'mysqladmin');
        define('password', 'condo$2023');					        
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');			
        try
            {
                $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);			
                return $conexion;
            }
        catch(Exception $e)
            {
                die("El error de Conexión es: ". $e->getMessage());
            }
    }
}
