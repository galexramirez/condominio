<?php 
// 01. Configuracion php Inicio
    ini_set('display_error', true);
    error_reporting(E_ALL);

    session_start();

// 02. Datos del Sitio / Config. Cambia
    define("DF_TITULO", "Csitecc");
    define("DF_MENSAJE", "Condominio");
    define("DF_RAIZ",dirname(__FILE__));

// 0.3 Funciones para enrutamiento MVC
    // Servicios
    function SModel($NomModulo,$Modelo,$array=array())
       {     extract($array);    require_once  "services/$NomModulo/model/$Modelo.php"; }
    function SView($NomModulo,$Vista,$array=array())
       {     extract($array);    require_once  "services/$NomModulo/view/$Vista.php"; }
    function SController($NomModulo,$Controlador,$array=array())
       {     extract($array);    require_once "services/$NomModulo/controller/$Controlador.php"; }

    // Local-Modulo
    function MModel($NomModulo,$Modelo,$array=array())
        {    extract($array);    require_once  "module/$NomModulo/model/$Modelo.php"; }
    function MView($NomModulo,$Vista,$array=array())
        {    extract($array);    require_once  "module/$NomModulo/view/$Vista.php"; }
    function MController($NomModulo,$Controlador,$array=array())
        {    extract($array);    require_once  "module/$NomModulo/controller/$Controlador.php";  }

//04. Configuracion de Ruting 
    $ruta=$_SERVER['REQUEST_URI'];
   
    switch ($ruta)
    {
        case '/inicio': MController('sesion','renderice'); break;

        case '/usuario': MController('usuario','renderice'); break;
    
        case '/maestro': MController('maestro','renderice'); break;
    
        case '/recupera_contrasena': MController('recupera_contrasena','renderice'); break;     

        case '/ajuste_generales': MController('ajuste_generales','renderice'); break;     

        case '/log_out': MController('sesion','log_out'); break;

        case '/ajuste_usuario': MController('ajuste_usuario','renderice'); break;     

        case '/condominio': MController('condominio','renderice'); break;     

        case '/cta_pagar': MController('cta_pagar','renderice'); break;     

        default: header('Location: /inicio');
    }