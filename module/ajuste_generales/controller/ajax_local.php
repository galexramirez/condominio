<?php
$Accion = $_POST['Accion'];
$modulo = "ajuste_generales";

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
      $tc_categoria1 = $_POST['tc_categoria1'];
      $tc_categoria2 = $_POST['tc_categoria2'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->select_categoria($tabla, $tc_categoria1, $tc_categoria2);
   break;

   case 'existe_categoria':
      $tabla         = $_POST['tabla'];
      $tc_variable   = $_POST['tc_variable'];
      $tc_categoria1 = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2 = strtoupper($_POST['tc_categoria2']);
      $tc_categoria3 = strtoupper($_POST['tc_categoria3']);

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->existe_categoria($tabla, $tc_variable, $tc_categoria1, $tc_categoria2, $tc_categoria3);
   break;

   case 'buscar_data_bd':
      $tabla_bd      = $_POST['tabla_bd'];
      $campo_bd      = $_POST['campo_bd'];
      $data_buscar   = $_POST['data_buscar'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta     = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $data_buscar);
   break;

   case 'select_maestro':
      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->select_maestro();
   break;

   case 'buscar_DNI':
      $roles_apellidos_nombres = $_POST['roles_apellidos_nombres'];
   
      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->buscar_DNI($roles_apellidos_nombres);
   break;
   
   case 'buscar_nombre_corto':
      $roles_dni = $_POST['roles_dni'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->buscar_nombre_corto($roles_dni);
   break;

   case 'select_objeto':
      $cacces_nombre_modulo = $_POST['cacces_nombre_modulo'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->select_objeto($cacces_nombre_modulo);
   break;

   case 'validar_permisos':
      $per_usuario_id    = $_POST['per_usuario_id'];
      $per_modulo_nombre = $_POST['per_modulo_nombre'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->validar_permisos($per_usuario_id, $per_modulo_nombre);
   break;

   case 'select_usuario':
      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->select_usuario();
   break;

   case 'select_modulo':
      MController($modulo,'logico');
      $instancia_ajax= new logico();
      $respuesta = $instancia_ajax->select_modulo();
   break;

   case 'validar_objeto':
      $obj_nombre_modulo = $_POST['obj_nombre_modulo'];
      $obj_nombre_objeto = $_POST['obj_nombre_objeto'];

      MController($modulo,'logico');
      $instancia_ajax= new logico();
      $respuesta = $instancia_ajax->validar_objeto($obj_nombre_modulo, $obj_nombre_objeto);
   break;

   case 'validar_control_acceso':
      $cacces_perfil          = $_POST['cacces_perfil'];
      $cacces_nombre_modulo   = $_POST['cacces_nombre_modulo'];
      $cacces_nombre_objeto   = $_POST['cacces_nombre_objeto'];

      MController($modulo,'logico');
      $instancia_ajax= new logico();
      $respuesta = $instancia_ajax->validar_control_acceso($cacces_perfil, $cacces_nombre_modulo, $cacces_nombre_objeto);
   break;

   case 'leer_roles':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_roles();
   break;

   case 'crear_roles':
      $roles_dni                 = $_POST['roles_dni'];
      $roles_apellidos_nombres   = $_POST['roles_apellidos_nombres'];
      $roles_nombre_corto        = $_POST['roles_nombre_corto'];
      $roles_perfil              = $_POST['roles_perfil'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->crear_roles($roles_dni,$roles_apellidos_nombres,$roles_nombre_corto,$roles_perfil);
   break;

   case 'editar_roles':
      $roles_id                  = $_POST['roles_id'];
      $roles_dni                 = $_POST['roles_dni'];
      $roles_apellidos_nombres   = $_POST['roles_apellidos_nombres'];
      $roles_nombre_corto        = $_POST['roles_nombre_corto'];
      $roles_perfil              = $_POST['roles_perfil'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->editar_roles($roles_id,$roles_dni,$roles_apellidos_nombres,$roles_nombre_corto,$roles_perfil);
   break;

   case 'borrar_roles':
      $roles_id = $_POST['roles_id'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->borrar_roles($roles_id);
   break;

   case 'leer_tipo_cambio':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_tipo_cambio();
   break;

   case 'crear_tipo_cambio':
      $tcam_fecha    = $_POST['tcam_fecha'];
      $tcam_moneda   = $_POST['tcam_moneda'];
      $tcam_tipo     = $_POST['tcam_tipo'];
      $tcam_valor    = $_POST['tcam_valor'];
      
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->crear_tipo_cambio($tcam_fecha, $tcam_moneda, $tcam_tipo, $tcam_valor);
   break;

   case 'importar_tipo_cambio':
      $tcam_url            = $_POST['tcam_url'];
      $tcam_fecha_inicio   = $_POST['tcam_fecha_inicio'];
      $tcam_fecha_fin      = $_POST['tcam_fecha_fin'];
      $tcam_moneda         = $_POST['tcam_moneda'];

      MController($modulo,'logico');
      $instancia_ajax= new logico();
      $respuesta = $instancia_ajax->importar_tipo_cambio($tcam_url, $tcam_fecha_inicio, $tcam_fecha_fin, $tcam_moneda);
   break;

   case 'editar_tipo_cambio':
      $tipo_cambio_id   = $_POST['tipo_cambio_id'];
      $tcam_fecha       = $_POST['tcam_fecha'];
      $tcam_moneda      = $_POST['tcam_moneda'];
      $tcam_tipo        = $_POST['tcam_tipo'];
      $tcam_valor       = $_POST['tcam_valor'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->editar_tipo_cambio($tipo_cambio_id, $tcam_fecha, $tcam_moneda, $tcam_tipo, $tcam_valor);
   break;

   case 'borrar_tipo_cambio':
      $tipo_cambio_id = $_POST['tipo_cambio_id'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->borrar_tipo_cambio($tipo_cambio_id);
   break;

   case 'leer_modulo':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_modulo();
   break;

   case 'crear_modulo':
      $mod_nombre       = $_POST['mod_nombre'];
      $mod_nombre_vista = $_POST['mod_nombre_vista'];
      $mod_icono        = $_POST['mod_icono'];
      $mod_tipo         = $_POST['mod_tipo'];
      $mod_plegable     = $_POST['mod_plegable'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->crear_modulo($mod_nombre, $mod_nombre_vista, $mod_icono, $mod_tipo, $mod_plegable);
   break;

   case 'editar_modulo':
      $modulo_id        = $_POST['modulo_id'];
      $mod_nombre       = $_POST['mod_nombre'];
      $mod_nombre_vista = $_POST['mod_nombre_vista'];
      $mod_icono        = $_POST['mod_icono'];
      $mod_tipo         = $_POST['mod_tipo'];
      $mod_plegable     = $_POST['mod_plegable'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->editar_modulo($modulo_id, $mod_nombre, $mod_nombre_vista, $mod_icono, $mod_tipo, $mod_plegable);
   break;

   case 'borrar_modulo':
      $modulo_id = $_POST['modulo_id'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->borrar_modulo($modulo_id);
   break;

   case 'leer_permisos':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_permisos();
   break;

   case 'crear_permisos':
      $per_usuario_id      = $_POST['per_usuario_id'];
      $per_modulo_nombre   = $_POST['per_modulo_nombre'];
      $per_modulo_inicio   = $_POST['per_modulo_inicio'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->crear_permisos($per_usuario_id, $per_modulo_nombre, $per_modulo_inicio);
   break;

   case 'editar_permisos':
      $permiso_id          = $_POST['permiso_id'];
      $per_usuario_id      = $_POST['per_usuario_id'];
      $per_modulo_nombre   = $_POST['per_modulo_nombre'];
      $per_modulo_inicio   = $_POST['per_modulo_inicio'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->editar_permisos($permiso_id, $per_usuario_id, $per_modulo_nombre, $per_modulo_inicio);
   break;

   case 'borrar_permisos':
      $permiso_id = $_POST['permiso_id'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->borrar_permisos($permiso_id);
   break;

   case 'leer_objeto':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_objeto();
   break;

   case 'crear_objeto':
      $objeto_id           = $_POST['objeto_id'];
      $obj_nombre_modulo   = $_POST['obj_nombre_modulo'];
      $obj_nombre_objeto   = $_POST['obj_nombre_objeto'];
      $obj_descripcion     = strtoupper($_POST['obj_descripcion']);

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->crear_objeto($objeto_id, $obj_nombre_modulo, $obj_nombre_objeto, $obj_descripcion);
   break;

   case 'editar_objeto':
      $objeto_id           = $_POST['objeto_id'];
      $obj_nombre_modulo   = $_POST['obj_nombre_modulo'];
      $obj_nombre_objeto   = $_POST['obj_nombre_objeto'];
      $obj_descripcion     = strtoupper($_POST['obj_descripcion']);

      MModel($modulo,'crud');
      $instancia_ajax= new crud();
      $respuesta = $instancia_ajax->editar_objeto($objeto_id, $obj_nombre_modulo, $obj_nombre_objeto, $obj_descripcion);
   break;

   case 'borrar_objeto':
      $objeto_id = $_POST['objeto_id'];

      MModel($modulo,'crud');
      $instancia_ajax= new crud();
      $respuesta = $instancia_ajax->borrar_objeto($objeto_id);
   break;

   case 'leer_control_acceso':
      MModel($modulo,'crud');
      $instancia_ajax= new crud();
      $respuesta = $instancia_ajax->leer_control_acceso();
   break;

   case 'crear_control_acceso':
      $control_acceso_id      = $_POST['control_acceso_id'];
      $cacces_perfil          = $_POST['cacces_perfil'];
      $cacces_nombre_modulo   = $_POST['cacces_nombre_modulo'];
      $cacces_nombre_objeto   = $_POST['cacces_nombre_objeto'];
      $cacces_acceso          = $_POST['cacces_acceso'];
      
      MController($modulo,'logico');
      $instancia_ajax= new logico();
      $respuesta = $instancia_ajax->crear_control_acceso($control_acceso_id, $cacces_perfil, $cacces_nombre_modulo, $cacces_nombre_objeto, $cacces_acceso);
   break;

   case 'editar_control_acceso':
      $control_acceso_id     = $_POST['control_acceso_id'];
      $cacces_perfil          = $_POST['cacces_perfil'];
      $cacces_nombre_modulo   = $_POST['cacces_nombre_modulo'];
      $cacces_nombre_objeto   = $_POST['cacces_nombre_objeto'];
      $cacces_acceso          = $_POST['cacces_acceso'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->editar_control_acceso($control_acceso_id, $cacces_perfil, $cacces_nombre_modulo, $cacces_nombre_objeto, $cacces_acceso);
   break;

   case 'borrar_control_acceso':
      $control_acceso_id = $_POST['control_acceso_id'];
      
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->borrar_control_acceso($control_acceso_id);
   break;

   case 'leer_tc_maestro':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_tc_maestro();
   break;

   case 'crear_tc_maestro':
      $tc_maestro_id = $_POST['tc_maestro_id'];
      $tc_categoria1 = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2 = strtoupper($_POST['tc_categoria2']);
      $tc_categoria3 = strtoupper($_POST['tc_categoria3']);

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->crear_tc_maestro($tc_maestro_id, $tc_categoria1, $tc_categoria2, $tc_categoria3);
   break;

   case 'editar_tc_maestro':
      $tc_maestro_id = $_POST['tc_maestro_id'];
      $tc_categoria1 = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2 = strtoupper($_POST['tc_categoria2']);
      $tc_categoria3 = strtoupper($_POST['tc_categoria3']);

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->editar_tc_maestro($tc_maestro_id, $tc_categoria1, $tc_categoria2, $tc_categoria3);
   break;

   case 'borrar_tc_maestro':
      $tc_maestro_id = $_POST['tc_maestro_id'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->borrar_tc_maestro($tc_maestro_id);
   break;

   case 'leer_tc_usuario':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_tc_usuario();
   break;

   case 'crear_tc_usuario':
      $tc_usuario_id = $_POST['tc_usuario_id'];
      $tc_categoria1 = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2 = strtoupper($_POST['tc_categoria2']);
      $tc_categoria3 = strtoupper($_POST['tc_categoria3']);

      MModel($modulo,'crud');
      $instancia_ajax= new crud();
      $respuesta = $instancia_ajax->crear_tc_usuario($tc_usuario_id, $tc_categoria1, $tc_categoria2, $tc_categoria3);
   break;

   case 'editar_tc_usuario':
      $tc_usuario_id = $_POST['tc_usuario_id'];
      $tc_categoria1 = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2 = strtoupper($_POST['tc_categoria2']);
      $tc_categoria3 = strtoupper($_POST['tc_categoria3']);

      MModel($modulo,'crud');
      $instancia_ajax= new crud();
      $respuesta = $instancia_ajax->editar_tc_usuario($tc_usuario_id, $tc_categoria1, $tc_categoria2, $tc_categoria3);
   break;

   case 'borrar_tc_usuario':
      $tc_usuario_id=$_POST['tc_usuario_id'];

      MModel($modulo,'crud');
      $instancia_ajax= new crud();
      $respuesta = $instancia_ajax->borrar_tc_usuario($tc_usuario_id);
   break;

   default: header('Location: /inicio');
}