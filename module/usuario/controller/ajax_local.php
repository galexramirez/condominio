<?php
$Accion = $_POST['Accion']; 
$modulo = 'usuario';  

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

   case 'select_categoria':
      $tabla         = $_POST['tabla'];
      $tc_categoria2 = $_POST['tc_categoria2'];
      $tc_categoria1 = $_POST['tc_categoria1'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->select_categoria($tabla, $tc_categoria1, $tc_categoria2);
   break;

   case 'buscar_data_bd':
      $tabla_bd      = $_POST['tabla_bd'];
      $campo_bd      = $_POST['campo_bd'];
      $data_buscar   = $_POST['data_buscar'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta     = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $data_buscar);
   break;

   case 'leer_usuario':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_usuario();
   break;

   case 'crear_usuario':
      $usuario_id          = $_POST['usuario_id'];
      $usua_nombres        = strtoupper($_POST['usua_nombres']);
      $usua_nombre_corto   = strtoupper($_POST['usua_nombre_corto']);
      $usua_usuario_web    = $_POST['usua_usuario_web'];
      $usua_password       = $_POST['usua_password'];
      $usua_perfil         = $_POST['usua_perfil'];
      $usua_estado         = $_POST['usua_estado'];
      
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->crear_usuario($usuario_id,$usua_nombres,$usua_nombre_corto,$usua_usuario_web,$usua_password,$usua_perfil,$usua_estado);
   break;

   case 'editar_usuario':
      $usuario_id          = $_POST['usuario_id'];
      $usua_nombres        = strtoupper($_POST['usua_nombres']);
      $usua_nombre_corto   = strtoupper($_POST['usua_nombre_corto']);
      $usua_usuario_web    = $_POST['usua_usuario_web'];
      $usua_password       = $_POST['usua_password'];
      $usua_perfil         = $_POST['usua_perfil'];
      $usua_estado         = $_POST['usua_estado'];
      
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta=$instancia_ajax->editar_usuario($usuario_id,$usua_nombres,$usua_nombre_corto,$usua_usuario_web,$usua_password,$usua_perfil,$usua_estado);
   break;

   case 'borrar_usuario':
      $usuario_id=$_POST['usuario_id'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->borrar_usuario($usuario_id);
   break;

   default: header('Location: /inicio');
}