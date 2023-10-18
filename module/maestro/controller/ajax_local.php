<?php

$Accion = $_POST['Accion'];   
$modulo = "maestro";

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
      $respuesta = $instancia_ajax->creacion_tabla($nombre_tabla,$tipo_tabla);
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
      $tc_ficha      = $_POST['tc_ficha'];
      $tc_categoria1 = $_POST['tc_categoria1'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->select_categoria($tabla, $tc_ficha, $tc_categoria1);
   break;

   case 'leer_maestro':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_maestro();
   break;

   case 'crear_maestro':
      $maestro_id             = $_POST['maestro_id'];
      $maes_apellidos_nombres = strtoupper($_POST['maes_apellidos_nombres']);
      $maes_cargo_actual      = $_POST['maes_cargo_actual'];
      $maes_estado            = $_POST['maes_estado'];
      $maes_fecha_ingreso     = $_POST['maes_fecha_ingreso'];
      $maes_fecha_cese        = $_POST['maes_fecha_cese'];
      $maes_email             = $_POST['maes_email'];
      $maes_direccion         = strtoupper($_POST['maes_direccion']);
      $maes_distrito          = $_POST['maes_distrito'];
      $maes_perfil_evaluacion = $_POST['maes_perfil_evaluacion'];
      
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->crear_maestro($maestro_id,$maes_apellidos_nombres,$maes_cargo_actual,$maes_estado,$maes_fecha_ingreso,$maes_fecha_cese,$maes_email,$maes_direccion,$maes_distrito,$maes_perfil_evaluacion);
   break;

   case 'editar_maestro':
      $maestro_id             = $_POST['maestro_id'];
      $maes_apellidos_nombres = strtoupper($_POST['maes_apellidos_nombres']);
      $maes_cargo_actual      = $_POST['maes_cargo_actual'];
      $maes_estado            = $_POST['maes_estado'];
      $maes_fecha_ingreso     = $_POST['maes_fecha_ingreso'];
      $maes_fecha_cese        = $_POST['maes_fecha_cese'];
      $maes_email             = $_POST['maes_email'];
      $maes_direccion         = strtoupper($_POST['maes_direccion']);
      $maes_distrito          = $_POST['maes_distrito'];
      $maes_perfil_evaluacion = $_POST['maes_perfil_evaluacion'];
      
      MModel($modulo,'crud');
      $instancia_ajax= new crud();
      $respuesta = $instancia_ajax->editar_maestro($maestro_id,$maes_apellidos_nombres,$maes_cargo_actual,$maes_estado,$maes_fecha_ingreso,$maes_fecha_cese,$maes_email,$maes_direccion,$maes_distrito,$maes_perfil_evaluacion);
   break;

   case 'borrar_maestro':
      $maestro_id = $_POST['maestro_id'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->borrar_maestro($maestro_id);
   break;

   case 'fotografia_maestro':
      $maestro_id = $_POST['maestro_id'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->fotografia_maestro($maestro_id);
   break;

   case 'grabar_fotografia':
      $maestro_id = $_POST['maestro_id'];
      $maes_fotografia = addslashes(file_get_contents($_FILES['maes_fotografia']['tmp_name']));
         
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->grabar_fotografia($maestro_id,$maes_fotografia);
   break;

   default: header('Location: /inicio');
}

?>