<?php
$Accion = $_POST['Accion'];
$modulo = "manual";   

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

   case 'select_roles':
      $roles_perfil  = $_POST['roles_perfil'];
      $roles_campo   = $_POST['roles_campo'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->select_roles($roles_perfil, $roles_campo);
   break;

   case 'select_combo':
      $nombre_tabla     = $_POST['nombre_tabla'];
      $es_campo_unico   = $_POST['es_campo_unico'];
      $campo_select     = $_POST['campo_select'];
      $campo_inicial    = $_POST['campo_inicial'];
      $condicion_where  = $_POST['condicion_where'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->select_combo($nombre_tabla, $es_campo_unico, $campo_select, $campo_inicial, $condicion_where);
   break;

   case 'buscardatabd':
      $tablabd    = $_POST['tablabd'];
      $campobd    = $_POST['campobd'];
      $databuscar = $_POST['databuscar'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->buscardatabd($tablabd,$campobd,$databuscar);
   break;

   case 'buscar_data_bd':
      $tabla    = $_POST['tabla'];
      $c_where  = $_POST['c_where'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->buscar_data_bd($tabla, $c_where);
   break;

   case 'calculo_fecha':
      $inicio= $_POST['inicio'];
      $calculo = $_POST['calculo'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->calculo_fecha($inicio, $calculo);
   break;

   case 'comparar_fecha_actual':
      $fecha = $_POST['fecha'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->comparar_fecha_actual($fecha);
   break;

   case 'DiferenciaFecha':
      $inicio= $_POST['inicio'];
      $final = $_POST['final'];

      MController($modulo,'logico');
      $instancia_ajax= new logico();
      $respuesta = $instancia_ajax->diferencia_fecha($inicio, $final);
   break;

   case 'dias_diferencia_fechas':
      $inicio= $_POST['inicio'];
      $final = $_POST['final'];

      MController($modulo,'logico');
      $instancia_ajax= new logico();
      $respuesta=$instancia_ajax->dias_diferencia_fechas($inicio,$final);
   break;

   case 'document_root':
      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->document_root();
   break;

   case 'buscar_dato':
      $nombre_tabla     = $_POST['nombre_tabla'];
      $campo_buscar     = $_POST['campo_buscar'];
      $condicion_where  = $_POST['condicion_where'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta     = $instancia_ajax->buscar_dato($nombre_tabla, $campo_buscar, $condicion_where);
   break;

   case 'contar_dato':
      $nombre_tabla     = $_POST['nombre_tabla'];
      $campo_buscar     = $_POST['campo_buscar'];
      $condicion_where  = $_POST['condicion_where'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta     = $instancia_ajax->contar_dato($nombre_tabla, $campo_buscar, $condicion_where);
   break;

   case 'select_modulo_nombre':
      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta     = $instancia_ajax->select_modulo_nombre();
   break;

   case 'buscar_manual':
      $man_modulo_id = $_POST['man_modulo_id'];

      MModel($modulo,'CRUD');
      $instancia_ajax = new CRUD();
      $respuesta = $instancia_ajax->buscar_manual($man_modulo_id);
   break;

   case 'crear_manual_registro':
      $man_modulo_id = $_POST['man_modulo_id'];
      $man_titulo  = strtoupper($_POST['man_titulo']);

      MModel($modulo,'CRUD');
      $instancia_ajax = new CRUD();
      $respuesta = $instancia_ajax->crear_manual_registro($man_modulo_id, $man_titulo, $man_html);
   break;

   case 'editar_manual_registro':
      $manual_id        = $_POST['manual_id'];
      $man_html         = $_POST['man_html'];

      MModel($modulo,'CRUD');
      $instancia_ajax = new CRUD();
      $respuesta = $instancia_ajax->editar_manual_registro($manual_id, $man_html);
   break;

   case 'borrar_manual_registro':
      $manual_id = $_POST['manual_id'];

      MModel($modulo,'CRUD');
      $instancia_ajax = new CRUD();
      $respuesta = $instancia_ajax->borrar_manual_registro($manual_id);
   break;

   default: header('Location: /inicio');
}