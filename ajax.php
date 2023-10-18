<?php
set_time_limit(10000);
// Nivel Modulo o Servicio donde se esta trabajando
    $MoS=$_POST['MoS'];

// Nombre  del Modulo o Servicio donde se esta trabajando    
    $NombreMoS=$_POST['NombreMoS']; 

// 0.3 Funciones para enrutamiento MVC
    // Servicios
    function SModel($NomModulo,$Modelo,$array=array())
       {     extract($array);    require_once  "services/$NomModulo/model/$Modelo.php"; }
    function SView($NomModulo,$Vista,$array=array())
       {     extract($array);    require_once  "services/$NomModulo/view/$Vista.php"; }
    function SController($NomModulo,$Controlador,$array=array())
       {     extract($array);    require_once "services/$NomModulo/controller/$Controlador.php";  }

    // Local-Modulo
    function MModel($NomModulo,$Modelo,$array=array())
        {    extract($array);    require_once  "module/$NomModulo/model/$Modelo.php"; }
    function MView($NomModulo,$Vista,$array=array())
        {    extract($array);    require_once  "module/$NomModulo/view/$Vista.php"; }
    function MController($NomModulo,$Controlador,$array=array())
        {    extract($array);    require_once "module/$NomModulo/controller/$Controlador.php";  }

    include  "$MoS/$NombreMoS/controller/ajax_local.php";

    
