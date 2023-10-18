<?php
$Accion = $_POST['Accion'];
$modulo = "ajuste_condominio";

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

   case 'leer_tc_condominio':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_tc_condominio();
   break;

   case 'crear_tc_condominio':
      $tc_condominio_id = $_POST['tc_condominio_id'];
      $tc_ficha         = strtoupper($_POST['tc_ficha']);
      $tc_categoria1    = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2    = strtoupper($_POST['tc_categoria2']);

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->crear_tc_condominio($tc_condominio_id,$tc_ficha,$tc_categoria1,$tc_categoria2);
   break;

   case 'editar_tc_condominio':
      $tc_condominio_id = $_POST['tc_condominio_id'];
      $tc_ficha         = strtoupper($_POST['tc_ficha']);
      $tc_categoria1    = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2    = strtoupper($_POST['tc_categoria2']);

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->editar_tc_condominio($tc_condominio_id,$tc_ficha,$tc_categoria1,$tc_categoria2);
   break;

   case 'borrar_tc_condominio':
      $tc_condominio_id = $_POST['tc_condominio_id'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->borrar_tc_condominio($tc_condominio_id);
   break;

   case 'leer_tc_cta_pagar':
      MModel($modulo,'crud');
      $instancia_ajax= new crud();
      $respuesta = $instancia_ajax->leer_tc_cta_pagar();
   break;

   case 'crear_tc_cta_pagar':
      $tc_cta_pagar_id  = $_POST['tc_cta_pagar_id'];
      $tc_ficha         = strtoupper($_POST['tc_ficha']);
      $tc_categoria1    = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2    = strtoupper($_POST['tc_categoria2']);

      MModel($modulo,'crud');
      $instancia_ajax= new crud();
      $respuesta = $instancia_ajax->crear_tc_cta_pagar($tc_cta_pagar_id,$tc_ficha,$tc_categoria1,$tc_categoria2);
   break;

   case 'editar_tc_cta_pagar':
      $tc_cta_pagar_id  = $_POST['tc_cta_pagar_id'];
      $tc_ficha         = strtoupper($_POST['tc_ficha']);
      $tc_categoria1    = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2    = strtoupper($_POST['tc_categoria2']);

      MModel($modulo,'crud');
      $instancia_ajax= new crud();
      $respuesta = $instancia_ajax->editar_tc_cta_pagar($tc_cta_pagar_id,$tc_ficha,$tc_categoria1,$tc_categoria2);
   break;

   case 'borrar_tc_cta_pagar':
      $tc_cta_pagar_id = $_POST['tc_cta_pagar_id'];

      MModel($modulo,'crud');
      $instancia_ajax= new crud();
      $respuesta = $instancia_ajax->borrar_tc_cta_pagar($tc_cta_pagar_id);
   break;

   case 'leer_tc_cta_cobrar':
      MModel($modulo,'crud');
      $instancia_ajax= new crud();
      $respuesta = $instancia_ajax->leer_tc_cta_cobrar();
   break;

   case 'crear_tc_cta_cobrar':
      $tc_cta_cobrar_id  = $_POST['tc_cta_cobrar_id'];
      $tc_ficha         = strtoupper($_POST['tc_ficha']);
      $tc_categoria1    = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2    = strtoupper($_POST['tc_categoria2']);

      MModel($modulo,'crud');
      $instancia_ajax= new crud();
      $respuesta = $instancia_ajax->crear_tc_cta_cobrar($tc_cta_cobrar_id,$tc_ficha,$tc_categoria1,$tc_categoria2);
   break;

   case 'editar_tc_cta_cobrar':
      $tc_cta_cobrar_id  = $_POST['tc_cta_cobrar_id'];
      $tc_ficha         = strtoupper($_POST['tc_ficha']);
      $tc_categoria1    = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2    = strtoupper($_POST['tc_categoria2']);

      MModel($modulo,'crud');
      $instancia_ajax= new crud();
      $respuesta = $instancia_ajax->editar_tc_cta_cobrar($tc_cta_cobrar_id,$tc_ficha,$tc_categoria1,$tc_categoria2);
   break;

   case 'borrar_tc_cta_cobrar':
      $tc_cta_cobrar_id = $_POST['tc_cta_cobrar_id'];

      MModel($modulo,'crud');
      $instancia_ajax= new crud();
      $respuesta = $instancia_ajax->borrar_tc_cta_cobrar($tc_cta_cobrar_id);
   break;

   default: header('Location: /inicio');
}