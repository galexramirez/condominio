<?php
$Accion = $_POST['Accion'];
$modulo = "cta_pagar";

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
      $tc_variable   = $_POST['tc_variable'];
      $tc_categoria1 = $_POST['tc_categoria1'];
      $tc_categoria2 = $_POST['tc_categoria2'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->select_categoria($tabla, $tc_variable, $tc_categoria1, $tc_categoria2);
   break;

   case 'buscar_data_bd':
      $tabla_bd      = $_POST['tabla_bd'];
      $campo_bd      = $_POST['campo_bd'];
      $data_buscar   = $_POST['data_buscar'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd,$campo_bd,$data_buscar);
   break;

   case 'buscar_bd':
      $tabla    = $_POST['tabla'];
      $c_where  = $_POST['c_where'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->buscar_bd($tabla, $c_where);
   break;

   case 'buscar_dato':
      $nombre_tabla     = $_POST['nombre_tabla'];
      $campo_buscar     = $_POST['campo_buscar'];
      $condicion_where  = $_POST['condicion_where'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->buscar_dato($nombre_tabla, $campo_buscar, $condicion_where);
   break;

   case 'contar_dato':
      $nombre_tabla     = $_POST['nombre_tabla'];
      $campo_buscar     = $_POST['campo_buscar'];
      $condicion_where  = $_POST['condicion_where'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->contar_dato($nombre_tabla, $campo_buscar, $condicion_where);
   break;

   case 'document_root':
      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->document_root();
   break;

   case 'select_roles':
      $roles_perfil = $_POST['roles_perfil'];
      $roles_campo  = $_POST['roles_campo'];

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
      $order_by         = $_POST['order_by'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->select_combo($nombre_tabla, $es_campo_unico, $campo_select, $campo_inicial, $condicion_where, $order_by);
   break;

   case 'diferencia_fecha':
      $inicio = $_POST['inicio'];
      $final  = $_POST['final'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->diferencia_fecha($inicio, $final);
   break;

   case 'calcular_diferencia_horas':
      $hora_inicio = $_POST['hora_inicio'];
      $hora_final  = $_POST['hora_final'];
      
      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->calcular_diferencia_horas($hora_inicio, $hora_final);
   break;

   case 'calculo_fecha':
      $inicio = $_POST['inicio'];
      $calculo = $_POST['calculo'];

      MController($modulo,'logico');
      $instancia_ajax= new logico();
      $respuesta = $instancia_ajax->calculo_fecha($inicio, $calculo);
   break;

   case 'mayor_fecha':
      $inicio = $_POST['inicio'];
      $final = $_POST['final'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->mayor_fecha($inicio, $final);
   break;

   case 'leer_listado_cta_pagar':
      $fecha_inicio = $_POST['fecha_inicio'];
      $fecha_termino = $_POST['fecha_termino'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta     = $instancia_ajax->leer_listado_cta_pagar($fecha_inicio, $fecha_termino);
   break;

   case 'leer_proveedor':
      MModel($modulo,'crud');
      $instancia_ajax= new crud();
      $respuesta = $instancia_ajax->leer_proveedor();
   break;

   case 'crear_proveedor':
      $prov_ruc             = $_POST['prov_ruc'];
      $prov_nombre          = strtoupper($_POST['prov_nombre']);
      $prov_contacto        = strtoupper($_POST['prov_contacto']);
      $prov_cta_banco_soles = $_POST['prov_cta_banco_soles'];
      $prov_email           = strtolower($_POST['prov_email']);
      $prov_nro_telefono    = $_POST['prov_nro_telefono'];
      $prov_estado          = $_POST['prov_estado'];
      $prov_direccion       = strtoupper($_POST['prov_direccion']);
      $prov_distrito        = $_POST['prov_distrito'];
      $prov_log             = $_POST['prov_log'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->crear_proveedor($prov_ruc, $prov_nombre, $prov_contacto, $prov_cta_banco_soles, $prov_email, $prov_nro_telefono, $prov_estado, $prov_direccion, $prov_distrito, $prov_log);
   break;

   case 'editar_proveedor':
      $prov_ruc             = $_POST['prov_ruc'];
      $prov_nombre          = strtoupper($_POST['prov_nombre']);
      $prov_contacto        = strtoupper($_POST['prov_contacto']);
      $prov_cta_banco_soles = $_POST['prov_cta_banco_soles'];
      $prov_email           = strtolower($_POST['prov_email']);
      $prov_nro_telefono    = $_POST['prov_nro_telefono'];
      $prov_estado          = $_POST['prov_estado'];
      $prov_direccion       = strtoupper($_POST['prov_direccion']);
      $prov_distrito        = $_POST['prov_distrito'];
      $prov_log             = $_POST['prov_log'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->editar_proveedor($prov_ruc, $prov_nombre, $prov_contacto, $prov_cta_banco_soles, $prov_email, $prov_nro_telefono, $prov_estado, $prov_direccion, $prov_distrito, $prov_log);
   break;

   case 'leer_producto':
      MModel($modulo,'crud');
      $instancia_ajax= new crud();
      $respuesta = $instancia_ajax->leer_producto();
   break;

   case 'crear_codigo':
      $prod_rubro = $_POST['prod_rubro'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->crear_codigo($prod_rubro);
   break;

   case 'crear_producto':
      $producto_id      = $_POST['producto_id'];
      $prod_rubro       = strtoupper($_POST['prod_rubro']);
      $prod_tipo        = strtoupper($_POST['prod_tipo']);
      $prod_codigo      = $_POST['prod_codigo'];
      $prod_descripcion = $_POST['prod_descripcion'];
      $prod_estado      = $_POST['prod_estado'];
      $prod_log         = $_POST['prod_log'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->crear_producto($producto_id, $prod_rubro, $prod_tipo, $prod_codigo, $prod_descripcion, $prod_estado, $prod_log);
   break;

   case 'editar_producto':
      $producto_id      = $_POST['producto_id'];
      $prod_rubro       = strtoupper($_POST['prod_rubro']);
      $prod_tipo        = strtoupper($_POST['prod_tipo']);
      $prod_codigo      = $_POST['prod_codigo'];
      $prod_descripcion = $_POST['prod_descripcion'];
      $prod_estado      = $_POST['prod_estado'];
      $prod_log         = $_POST['prod_log'];
      
      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->editar_producto($producto_id, $prod_rubro, $prod_tipo, $prod_codigo, $prod_descripcion, $prod_estado, $prod_log);
   break;

   case 'leer_tc_cta_pagar_usuario':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta     = $instancia_ajax->leer_tc_cta_pagar_usuario();
   break;

   case 'crear_tc_cta_pagar_usuario':
      $tc_cta_pagar_id = $_POST['tc_cta_pagar_id'];
      $tc_categoria1    = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2    = strtoupper($_POST['tc_categoria2']);
      $tc_categoria3    = strtoupper($_POST['tc_categoria3']);

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta     = $instancia_ajax->crear_tc_cta_pagar_usuario($tc_cta_pagar_id, $tc_categoria1, $tc_categoria2, $tc_categoria3);
   break;

   case 'editar_tc_cta_pagar_usuario':
      $tc_cta_pagar_id = $_POST['tc_cta_pagar_id'];
      $tc_categoria1    = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2    = strtoupper($_POST['tc_categoria2']);
      $tc_categoria3    = strtoupper($_POST['tc_categoria3']);

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->editar_tc_cta_pagar_usuario($tc_cta_pagar_id, $tc_categoria1, $tc_categoria2, $tc_categoria3);
   break;

   case 'borrar_tc_cta_pagar_usuario':
      $tc_cta_pagar_id=$_POST['tc_cta_pagar_id'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->borrar_tc_cta_pagar_usuario($tc_cta_pagar_id);
   break;

   case 'leer_tc_cta_pagar_sistema':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_tc_cta_pagar_sistema();
   break;

   case 'crear_tc_cta_pagar_sistema':
      $tc_cta_pagar_id  = $_POST['tc_cta_pagar_id'];
      $tc_categoria1    = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2    = strtoupper($_POST['tc_categoria2']);
      $tc_categoria3    = strtoupper($_POST['tc_categoria3']);

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->crear_tc_cta_pagar_sistema($tc_cta_pagar_id, $tc_categoria1, $tc_categoria2, $tc_categoria3);
   break;

   case 'editar_tc_cta_pagar_sistema':
      $tc_cta_pagar_id  = $_POST['tc_cta_pagar_id'];
      $tc_categoria1    = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2    = strtoupper($_POST['tc_categoria2']);
      $tc_categoria3    = strtoupper($_POST['tc_categoria3']);

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->editar_tc_cta_pagar_sistema($tc_cta_pagar_id, $tc_categoria1, $tc_categoria2, $tc_categoria3);
   break;

   case 'borrar_tc_cta_pagar_sistema':
      $tc_cta_pagar_id = $_POST['tc_cta_pagar_id'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->borrar_tc_cta_pagar_sistema($tc_cta_pagar_id);
   break;

   default: header('Location: /inicio');
}