<?php
$Accion = $_POST['Accion'];
$modulo = "condominio";

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
      $tc_categoria1      = $_POST['tc_categoria1'];
      $tc_categoria2 = $_POST['tc_categoria2'];

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
      $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd,$campo_bd,$data_buscar);
   break;

   case 'select_nombre_corto':
      $roles_perfil = $_POST['roles_perfil'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->select_nombre_corto($roles_perfil);
   break;

   case 'leer_condominio':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_condominio();
   break;

   case 'leer_puerta':
      $condominio_id = $_POST['condominio_id'];
      
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_puerta($condominio_id);
   break;

   case 'crear_condominio':
      $cond_tipo              =  $_POST['cond_tipo'];           
      $cond_nombre            =  strtoupper($_POST['cond_nombre']);         
      $cond_edificio          =  $_POST['cond_edificio'];       
      $cond_dpto              =  $_POST['cond_dpto'];           
      $cond_puerta            =  strtoupper($_POST['cond_puerta']);         
      $cond_estacionamiento   =  $_POST['cond_estacionamiento'];
      $cond_direccion         =  strtoupper($_POST['cond_direccion']);      
      $cond_distrito          =  $_POST['cond_distrito'];       
      $cond_estado            =  $_POST['cond_estado'];
      $array_data             =  json_decode($_POST['array_data'],true);               

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->crear_condominio($cond_tipo, $cond_nombre, $cond_edificio, $cond_dpto, $cond_puerta, $cond_estacionamiento, $cond_direccion, $cond_distrito, $cond_estado, $array_data);
   break;

   case 'editar_condominio':
      $condominio_id          =  $_POST['condominio_id'];
      $cond_tipo              =  $_POST['cond_tipo'];           
      $cond_nombre            =  strtoupper($_POST['cond_nombre']);         
      $cond_edificio          =  $_POST['cond_edificio'];       
      $cond_dpto              =  $_POST['cond_dpto'];           
      $cond_puerta            =  strtoupper($_POST['cond_puerta']);         
      $cond_estacionamiento   =  $_POST['cond_estacionamiento'];
      $cond_direccion         =  strtoupper($_POST['cond_direccion']);      
      $cond_distrito          =  $_POST['cond_distrito'];       
      $cond_estado            =  $_POST['cond_estado'];
      $array_data             =  json_decode($_POST['array_data'],true);
      
      MController($modulo,'logico');
      $instancia_ajax= new logico();
      $respuesta = $instancia_ajax->editar_condominio($condominio_id, $cond_tipo, $cond_nombre, $cond_edificio, $cond_dpto, $cond_puerta, $cond_estacionamiento, $cond_direccion, $cond_distrito, $cond_estado, $array_data);
   break;

   case 'borrar_condominio':
      $condominio_id = $_POST['condominio_id'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->borrar_condominio($condominio_id);
   break;

   case 'select_condominio':
      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->select_condominio();
   break;

   case 'existe_edificio':
      $edificio_id            = $_POST['edificio_id'];
      $edi_condominio_nombre  = $_POST['edi_condominio_nombre'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->existe_edificio($edificio_id, $edi_condominio_nombre);
   break;

   case 'leer_edificio':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_edificio();
   break;

   case 'crear_edificio':
      $edificio_id            =  $_POST['edificio_id'];
      $edi_descripcion        =  strtoupper($_POST['edi_descripcion']); 
      $edi_condominio_nombre  =  $_POST['edi_condominio_nombre'];
      $edi_piso               =  $_POST['edi_piso'];
      $edi_dpto               =  $_POST['edi_dpto'];
      $edi_estado             =  $_POST['edi_estado'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->crear_edificio($edificio_id, $edi_descripcion, $edi_condominio_nombre,  $edi_piso, $edi_dpto, $edi_estado);
   break;

   case 'editar_edificio':
      $edificio_id            =  $_POST['edificio_id'];
      $edi_descripcion        =  strtoupper($_POST['edi_descripcion']); 
      $edi_condominio_nombre  =  $_POST['edi_condominio_nombre'];
      $edi_piso               =  $_POST['edi_piso'];
      $edi_dpto               =  $_POST['edi_dpto'];
      $edi_estado             =  $_POST['edi_estado'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->editar_edificio($edificio_id, $edi_descripcion, $edi_condominio_nombre,  $edi_piso, $edi_dpto, $edi_estado);
   break;

   case 'borrar_edificio':
      $edificio_id            = $_POST['edificio_id'];
      $edi_condominio_nombre  =  $_POST['edi_condominio_nombre'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->borrar_edificio($edificio_id, $edi_condominio_id);
   break;

   case 'select_edificio':
      $condominio_nombre = $_POST['condominio_nombre'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->select_edificio($condominio_nombre);
   break;

   case 'existe_departamento':
      $departamento_id              = $_POST['departamento_id'];
      $dpto_condominio_nombre       = $_POST['dpto_condominio_nombre'];
      $dpto_edificio_descripcion    = $_POST['dpto_edificio_descripcion'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->existe_departamento($departamento_id, $dpto_condominio_nombre, $dpto_edificio_descripcion);
   break;

   case 'leer_departamento':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_departamento();
   break;

   case 'crear_departamento':
      $departamento_id           =  $_POST['departamento_id'];
      $dpto_descripcion          =  strtoupper($_POST['dpto_descripcion']); 
      $dpto_condominio_nombre    =  $_POST['dpto_condominio_nombre'];
      $dpto_edificio_descripcion =  $_POST['dpto_edificio_descripcion'];
      $dpto_piso                 =  $_POST['dpto_piso'];
      $dpto_dimensiones          =  $_POST['dpto_dimensiones'];
      $dpto_estado               =  $_POST['dpto_estado'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->crear_departamento($departamento_id, $dpto_descripcion, $dpto_condominio_nombre, $dpto_edificio_descripcion, $dpto_piso, $dpto_dimensiones, $dpto_estado);
   break;

   case 'editar_departamento':
      $departamento_id           =  $_POST['departamento_id'];
      $dpto_descripcion          =  strtoupper($_POST['dpto_descripcion']); 
      $dpto_condominio_nombre    =  $_POST['dpto_condominio_nombre'];
      $dpto_edificio_descripcion =  $_POST['dpto_edificio_descripcion'];
      $dpto_piso                 =  $_POST['dpto_piso'];
      $dpto_dimensiones          =  $_POST['dpto_dimensiones'];
      $dpto_estado               =  $_POST['dpto_estado'];
      
      MController($modulo,'logico');
      $instancia_ajax= new logico();
      $respuesta = $instancia_ajax->editar_departamento($departamento_id, $dpto_descripcion, $dpto_condominio_nombre, $dpto_edificio_descripcion, $dpto_piso, $dpto_dimensiones, $dpto_estado);
   break;

   case 'borrar_departamento':
      $departamento_id           = $_POST['departamento_id'];
      $dpto_condominio_nombre    = $_POST['dpto_condominio_nombre'];
      $dpto_edificio_descripcion = $_POST['dpto_edificio_descripcion'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->borrar_departamento($departamento_id, $dpto_condominio_nombre, $dpto_edificio_descripcion);
   break;

   case 'select_departamento':
      $condominio_nombre      = $_POST['condominio_nombre'];
      $edificio_descripcion   = $_POST['edificio_descripcion'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->select_departamento($condominio_nombre, $edificio_descripcion);
   break;

   case 'existe_residente':
      $resi_nombre               = $_POST['resi_nombre'];
      $resi_condominio_nombre    = $_POST['resi_condominio_nombre'];
      $resi_edificio_descripcion = $_POST['resi_edificio_descripcion'];
      $resi_departamento_id      = $_POST['resi_departamento_id'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->existe_residente($resi_nombre, $resi_condominio_nombre, $resi_edificio_descripcion, $resi_departamento_id);
   break;

   case 'select_residente':
      $condominio_nombre      = $_POST['condominio_nombre'];
      $edificio_descripcion   = $_POST['edificio_descripcion'];
      $dni                    = $_POST['dni'];
      $tipo                   = $_POST['tipo'];
      $estado                 = $_POST['estado'];
      $accion                 = $_POST['accion'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->select_residente($condominio_nombre, $edificio_descripcion, $dni, $tipo, $estado, $accion);
   break;

   case 'leer_residente':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_residente();
   break;

   case 'crear_residente':
      $resi_nombre               =  $_POST['resi_nombre'];
      $resi_condominio_nombre    =  $_POST['resi_condominio_nombre'];
      $resi_edificio_descripcion =  $_POST['resi_edificio_descripcion'];
      $resi_departamento_id      =  $_POST['resi_departamento_id'];
      $resi_tipo                 =  $_POST['resi_tipo'];
      $resi_fecha_inicio         =  $_POST['resi_fecha_inicio'];
      $resi_fecha_fin            =  $_POST['resi_fecha_fin'];
      $resi_estado               =  $_POST['resi_estado'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->crear_residente($resi_nombre, $resi_condominio_nombre, $resi_edificio_descripcion, $resi_departamento_id, $resi_tipo, $resi_fecha_inicio, $resi_fecha_fin, $resi_estado);
   break;

   case 'editar_residente':
      $residente_id              =  $_POST['residente_id'];
      $resi_nombre               =  $_POST['resi_nombre'];
      $resi_condominio_nombre    =  $_POST['resi_condominio_nombre'];
      $resi_edificio_descripcion =  $_POST['resi_edificio_descripcion'];
      $resi_departamento_id      =  $_POST['resi_departamento_id'];
      $resi_tipo                 =  $_POST['resi_tipo'];
      $resi_fecha_inicio         =  $_POST['resi_fecha_inicio'];
      $resi_fecha_fin            =  $_POST['resi_fecha_fin'];
      $resi_estado               =  $_POST['resi_estado'];
      
      MController($modulo,'logico');
      $instancia_ajax= new logico();
      $respuesta = $instancia_ajax->editar_residente($residente_id, $resi_nombre, $resi_condominio_nombre, $resi_edificio_descripcion, $resi_departamento_id, $resi_tipo, $resi_fecha_inicio, $resi_fecha_fin, $resi_estado);
   break;

   case 'borrar_residente':
      $residente_id = $_POST['residente_id'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->borrar_residente($residente_id);
   break;

   case 'leer_directiva':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_directiva();
   break;

   case 'crear_directiva':
      $dire_descripcion             = strtoupper($_POST['dire_descripcion']); 
      $dire_condominio_nombre       = $_POST['dire_condominio_nombre']; 
      $dire_edificio_descripcion    = $_POST['dire_edificio_descripcion']; 
      $dire_tipo                    = $_POST['dire_tipo']; 
      $dire_fecha_inicio            = $_POST['dire_fecha_inicio']; 
      $dire_fecha_fin               = $_POST['dire_fecha_fin']; 
      $dire_estado                  = $_POST['dire_estado']; 
      $array_data                   = json_decode($_POST['array_data'],true);

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->crear_directiva($dire_descripcion, $dire_condominio_nombre, $dire_edificio_descripcion, $dire_tipo, $dire_fecha_inicio, $dire_fecha_fin, $dire_estado, $array_data);
   break;

   case 'editar_condominio':
      $directiva_id                 = $_POST['direrectiva_id']; 
      $dire_descripcion             = strtoupper($_POST['dire_descripcion']); 
      $dire_condominio_nombre       = $_POST['dire_condominio_nombre']; 
      $dire_edificio_descripcion    = $_POST['dire_edificio_descripcion']; 
      $dire_tipo                    = $_POST['dire_tipo']; 
      $dire_fecha_inicio            = $_POST['dire_fecha_inicio']; 
      $dire_fecha_fin               = $_POST['dire_fecha_fin']; 
      $dire_estado                  = $_POST['dire_estado']; 
      $array_data                   = json_decode($_POST['array_data']);
      
      MController($modulo,'logico');
      $instancia_ajax= new logico();
      $respuesta = $instancia_ajax->editar_directiva($directiva_id, $dire_descripcion, $dire_condominio_nombre, $dire_edificio_descripcion, $dire_tipo, $dire_fecha_inicio, $dire_fecha_fin, $dire_estado, $array_data);
   break;

   case 'borrar_directiva':
      $directiva_id = $_POST['directiva_id'];

      MController($modulo,'logico');
      $instancia_ajax = new logico();
      $respuesta = $instancia_ajax->borrar_directiva($directiva_id);
   break;

   case 'leer_miembro':
      $directiva_id = $_POST['directiva_id'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta = $instancia_ajax->leer_miembro($directiva_id);
   break;

   case 'leer_tc_condominio_usuario':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta     = $instancia_ajax->leer_tc_condominio_usuario();
   break;

   case 'crear_tc_condominio_usuario':
      $tc_condominio_id = $_POST['tc_condominio_id'];
      $tc_categoria1    = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2    = strtoupper($_POST['tc_categoria2']);
      $tc_categoria3    = strtoupper($_POST['tc_categoria3']);

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta     = $instancia_ajax->crear_tc_condominio_usuario($tc_condominio_id, $tc_categoria1, $tc_categoria2, $tc_categoria3);
   break;

   case 'editar_tc_condominio_usuario':
      $tc_condominio_id = $_POST['tc_condominio_id'];
      $tc_categoria1    = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2    = strtoupper($_POST['tc_categoria2']);
      $tc_categoria3    = strtoupper($_POST['tc_categoria3']);

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta     = $instancia_ajax->editar_tc_condominio_usuario($tc_condominio_id, $tc_categoria1, $tc_categoria2, $tc_categoria3);
   break;

   case 'borrar_tc_condominio_usuario':
      $tc_condominio_id=$_POST['tc_condominio_id'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta     = $instancia_ajax->borrar_tc_condominio_usuario($tc_condominio_id);
   break;

   case 'leer_tc_condominio_sistema':
      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta     = $instancia_ajax->leer_tc_condominio_sistema();
   break;

   case 'crear_tc_condominio_sistema':
      $tc_condominio_id = $_POST['tc_condominio_id'];
      $tc_categoria1    = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2    = strtoupper($_POST['tc_categoria2']);
      $tc_categoria3    = strtoupper($_POST['tc_categoria3']);

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta     = $instancia_ajax->crear_tc_condominio_sistema($tc_condominio_id, $tc_categoria1, $tc_categoria2, $tc_categoria3);
   break;

   case 'editar_tc_condominio_sistema':
      $tc_condominio_id = $_POST['tc_condominio_id'];
      $tc_categoria1    = strtoupper($_POST['tc_categoria1']);
      $tc_categoria2    = strtoupper($_POST['tc_categoria2']);
      $tc_categoria3    = strtoupper($_POST['tc_categoria3']);

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta     = $instancia_ajax->editar_tc_condominio_sistema($tc_condominio_id, $tc_categoria1, $tc_categoria2, $tc_categoria3);
   break;

   case 'borrar_tc_condominio_sistema':
      $tc_condominio_id=$_POST['tc_condominio_id'];

      MModel($modulo,'crud');
      $instancia_ajax = new crud();
      $respuesta     = $instancia_ajax->borrar_tc_condominio_sistema($tc_condominio_id);
   break;

   default: header('Location: /inicio');
}