<?php

$Accion = $_POST['Accion'];   
$modulo = "ajuste_usuario";

switch ($Accion)
   {
   case 'creacion_tab':
      $nombre_tab = $_POST['nombre_tab'];
      $tipo_tab   = $_POST['tipo_tab'];

      MController($modulo,'accesos');
      $instancia_ajax = new accesos();
      $respuesta = $instancia_ajax->creacion_tab($nombre_tab,$tipo_tab);
   break;

   case 'creacion_tabla':
      $nombre_tabla  = $_POST['nombre_tabla'];
      $tipo_tabla    = $_POST['tipo_tabla'];

      MController($modulo,'accesos');
      $instancia_ajax = new accesos();
      $respuesta=$instancia_ajax->creacion_tabla($nombre_tabla,$tipo_tabla);
   break;

   case 'columnas_tabla':
      $nombre_tabla  = $_POST['nombre_tabla'];
      $tipo_tabla    = $_POST['tipo_tabla'];

      MController($modulo,'accesos');
      $instancia_ajax = new accesos();
      $respuesta = $instancia_ajax->columnas_tabla($nombre_tabla,$tipo_tabla);
   break;

   case 'botones_formulario':
      $nombre_formulario   = $_POST['nombre_formulario'];
      $nombre_objeto       = $_POST['nombre_objeto'];

      MController($modulo,'accesos');
      $instancia_ajax = new accesos();
      $respuesta = $instancia_ajax->botones_formulario($nombre_formulario,$nombre_objeto);
   break;

   case 'div_formulario':
      $nombre_formulario=$_POST['nombre_formulario'];
      $nombre_objeto=$_POST['nombre_objeto'];

      MController($modulo,'accesos');
      $instancia_ajax = new accesos();
      $respuesta = $instancia_ajax->div_formulario($nombre_formulario,$nombre_objeto);
   break;

   case 'mostrar_div':
      $nombre_formulario   = $_POST['nombre_formulario'];
      $nombre_objeto       = $_POST['nombre_objeto'];
      $dato1               = $_POST['dato1'];
      $dato2               = $_POST['dato2'];

      MController($modulo,'accesos');
      $instancia_ajax = new accesos();
      $respuesta = $instancia_ajax->mostrar_div($nombre_formulario,$nombre_objeto,$dato1,$dato2);
   break;

   case 'leer_ajuste_usuario':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_ajuste_usuario();
   break;

   case 'editar_ajuste_usuario':
      $usua_password = $_POST['usua_password'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->editar_ajuste_usuario($usua_password);
   break;

   case 'buscar_fotografia':
         MModel($modulo,'crud');
         $instancia_ajax= new crud();
         $respuesta = $instancia_ajax->buscar_fotografia();
   break;

   default: header('Location: /inicio');
}

?>