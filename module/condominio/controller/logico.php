<?php
class logico
{
	var $modulo = "condominio";

	function Contenido($NombreDeModuloVista)    
	{		
		MView($this->modulo,'local_view',compact('NombreDeModuloVista') );
	}

	public function select_categoria($tabla, $tc_ficha, $tc_categoria1)
	{
		MModel($this->modulo, 'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->select_categoria($tabla, $tc_ficha, $tc_categoria1);

		$html = '<option value="">Seleccione una opcion</option>';

		foreach ($respuesta as $row) {
			$html .= '<option value="'.$row['Detalle'].'">'.$row['Detalle'].'</option>';
		}
		echo $html;
	}

	public function select_nombre_corto($roles_perfil)
	{
		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->select_nombre_corto($roles_perfil);

		$html = '<option value="">Seleccione una opcion</option>';

		foreach ($respuesta as $row) {
			$html .= '<option value="'.$row['nombre_corto'].'">'.$row['nombre_corto'].'</option>';
		}
		echo $html;
	}

	public function buscar_data_bd($tabla_bd, $campo_bd, $data_buscar)
    {
        MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd,$campo_bd,$data_buscar);

        print json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

	public function crear_condominio($cond_tipo, $cond_nombre, $cond_edificio, $cond_dpto, $cond_puerta, $cond_estacionamiento, $cond_direccion, $cond_distrito, $cond_estado, $array_data)
	{
		$condominio_id = "";
        MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->crear_condominio($cond_tipo, $cond_nombre, $cond_edificio, $cond_dpto, $cond_puerta, $cond_estacionamiento, $cond_direccion, $cond_distrito, $cond_estado);

		$tabla_bd = "condominio";
		$campo_id = "condominio_id";
		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->max_id($tabla_bd, $campo_id);

		foreach($respuesta as $row){
			$condominio_id = $row['max_id'];
		}

		foreach($array_data as $row){
			$pta_nombre 	= $row['pta_nombre'];
			$pta_direccion 	= $row['pta_direccion'];
			MModel($this->modulo,'crud');
			$instancia_ajax = new crud();
			$respuesta = $instancia_ajax->crear_puerta($condominio_id, $pta_nombre, $pta_direccion);
		}
	}

	public function editar_condominio($condominio_id, $cond_tipo, $cond_nombre, $cond_edificio, $cond_dpto, $cond_puerta, $cond_estacionamiento, $cond_direccion, $cond_distrito, $cond_estado, $array_data)
	{
        MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->editar_condominio($condominio_id,$cond_tipo, $cond_nombre, $cond_edificio, $cond_dpto, $cond_puerta, $cond_estacionamiento, $cond_direccion, $cond_distrito, $cond_estado);

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->borrar_puerta($condominio_id);

		foreach($array_data as $row){
			$pta_nombre 	= $row['pta_nombre'];
			$pta_direccion 	= $row['pta_direccion'];
			MModel($this->modulo,'crud');
			$instancia_ajax = new crud();
			$respuesta = $instancia_ajax->crear_puerta($condominio_id, $pta_nombre, $pta_direccion);
		}
	}

	public function borrar_condominio($condominio_id)
	{
		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->borrar_condominio($condominio_id);

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->borrar_puerta($condominio_id);

	}

	public function select_condominio()
	{
		MModel($this->modulo, 'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->select_condominio();

		$html = '<option value="">Seleccione una opcion</option>';

		foreach ($respuesta as $row) {
			$html .= '<option value="'.$row['condominio_nombre'].'">'.$row['condominio_nombre'].'</option>';
		}
		echo $html;
	}

	public function existe_edificio($edificio_id, $edi_condominio_nombre){
        $rpta_existe_edificio	= "";
		$edi_condominio_id 		= "";
		$tabla_bd = "condominio";
		$campo_bd = "cond_nombre";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $edi_condominio_nombre);

		foreach($respuesta as $row){
			$edi_condominio_id = $row['condominio_id'];
		}

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->existe_edificio($edificio_id, $edi_condominio_id);

		if($respuesta==true){
			$rpta_existe_edificio = "SI";
		}		
		
		echo $rpta_existe_edificio;
	}

	public function crear_edificio($edificio_id, $edi_descripcion, $edi_condominio_nombre,  $edi_piso, $edi_dpto, $edi_estado)
	{
		$edi_condominio_id = "";
		$tabla_bd = "condominio";
		$campo_bd = "cond_nombre";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $edi_condominio_nombre);

		foreach($respuesta as $row){
			$edi_condominio_id = $row['condominio_id'];
		}

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->crear_edificio($edificio_id, $edi_descripcion, $edi_condominio_id,  $edi_piso, $edi_dpto, $edi_estado);

	}

	public function editar_edificio($edificio_id, $edi_descripcion, $edi_condominio_nombre,  $edi_piso, $edi_dpto, $edi_estado)
	{
		$edi_condominio_id = "";
		$tabla_bd = "condominio";
		$campo_bd = "cond_nombre";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $edi_condominio_nombre);

		foreach($respuesta as $row){
			$edi_condominio_id = $row['condominio_id'];
		}

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->editar_edificio($edificio_id, $edi_descripcion, $edi_condominio_id,  $edi_piso, $edi_dpto, $edi_estado);

	}

	public function borrar_edificio($edificio_id, $edi_condominio_nombre)
	{
		$edi_condominio_id = "";
		$tabla_bd = "condominio";
		$campo_bd = "cond_nombre";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $edi_condominio_nombre);

		foreach($respuesta as $row){
			$edi_condominio_id = $row['condominio_id'];
		}

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->borrar_edificio($edificio_id, $edi_condominio_id);

	}

	public function select_edificio($condominio_nombre)
	{
		$condominio_id = "";
		$tabla_bd = "condominio";
		$campo_bd = "cond_nombre";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $condominio_nombre);

		foreach($respuesta as $row){
			$condominio_id = $row['condominio_id'];
		}

		MModel($this->modulo, 'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->select_edificio($condominio_id);

		$html = '<option value="">Seleccione una opcion</option>';

		foreach ($respuesta as $row) {
			$html .= '<option value="'.$row['edificio_descripcion'].'">'.$row['edificio_descripcion'].'</option>';
		}
		echo $html;
	}

	public function existe_departamento($departamento_id, $dpto_condominio_nombre, $dpto_edificio_descripcion){
        $rpta_existe_departamento	= "";
		$dpto_condominio_id 		= "";
		$dpto_edificio_id			= "";
		$tabla_bd = "condominio";
		$campo_bd = "cond_nombre";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $dpto_condominio_nombre);

		foreach($respuesta as $row){
			$dpto_condominio_id = $row['condominio_id'];
		}

		$tabla_bd = "edificio";
		$campo_bd = "edi_descripcion";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $dpto_edificio_descripcion);

		foreach($respuesta as $row){
			$dpto_edificio_id = $row['edificio_id'];
		}

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->existe_departamento($departamento_id, $dpto_condominio_id, $dpto_edificio_id);

		if($respuesta==true){
			$rpta_existe_departamento = "SI";
		}		
		
		echo $rpta_existe_departamento;
	}

	public function crear_departamento($departamento_id, $dpto_descripcion, $dpto_condominio_nombre, $dpto_edificio_descripcion, $dpto_piso, $dpto_dimensiones, $dpto_estado)
	{
		$dpto_condominio_id = "";
		$dpto_edificio_id 	= "";
		$tabla_bd = "condominio";
		$campo_bd = "cond_nombre";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $dpto_condominio_nombre);

		foreach($respuesta as $row){
			$dpto_condominio_id = $row['condominio_id'];
		}

		$tabla_bd = "edificio";
		$campo_bd = "edi_descripcion";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $dpto_edificio_descripcion);

		foreach($respuesta as $row){
			$dpto_edificio_id = $row['edificio_id'];
		}

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->crear_departamento($departamento_id, $dpto_descripcion, $dpto_condominio_id, $dpto_edificio_id, $dpto_piso, $dpto_dimensiones, $dpto_estado);

	}

	public function editar_departamento($departamento_id, $dpto_descripcion, $dpto_condominio_nombre, $dpto_edificio_descripcion, $dpto_piso, $dpto_dimensiones, $dpto_estado)
	{
		$dpto_condominio_id = "";
		$dpto_edificio_id 	= "";
		$tabla_bd = "condominio";
		$campo_bd = "cond_nombre";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $dpto_condominio_nombre);

		foreach($respuesta as $row){
			$dpto_condominio_id = $row['condominio_id'];
		}

		$tabla_bd = "edificio";
		$campo_bd = "edi_descripcion";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $dpto_edificio_descripcion);

		foreach($respuesta as $row){
			$dpto_edificio_id = $row['edificio_id'];
		}

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->editar_departamento($departamento_id, $dpto_descripcion, $dpto_condominio_id, $dpto_edificio_id, $dpto_piso, $dpto_dimensiones, $dpto_estado);

	}

	public function borrar_departamento($departamento_id, $dpto_condominio_nombre, $dpto_edificio_descripcion)
	{
		$dpto_condominio_id = "";
		$dpto_edificio_id	= "";
		$tabla_bd = "condominio";
		$campo_bd = "cond_nombre";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $dpto_condominio_nombre);

		foreach($respuesta as $row){
			$dpto_condominio_id = $row['condominio_id'];
		}

		$tabla_bd = "edificio";
		$campo_bd = "edi_descripcion";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $dpto_edificio_descripcion);

		foreach($respuesta as $row){
			$dpto_edificio_id = $row['edificio_id'];
		}

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->borrar_departamento($departamento_id, $dpto_condominio_id, $dpto_edificio_id);

	}

	public function select_departamento($condominio_nombre, $edificio_descripcion)
	{
		$condominio_id 	= "";
		$edificio_id	= "";
		$tabla_bd = "condominio";
		$campo_bd = "cond_nombre";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $condominio_nombre);

		foreach($respuesta as $row){
			$condominio_id = $row['condominio_id'];
		}

		$tabla_bd = "edificio";
		$campo_bd = "edi_descripcion";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $edificio_descripcion);

		foreach($respuesta as $row){
			$edificio_id = $row['edificio_id'];
		}

		MModel($this->modulo, 'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->select_departamento($condominio_id, $edificio_id);

		$html = '<option value="">Seleccione una opcion</option>';

		foreach ($respuesta as $row) {
			$html .= '<option value="'.$row['departamento_id'].'">'.$row['departamento_id'].'</option>';
		}
		echo $html;
	}

	public function select_residente($condominio_nombre, $edificio_descripcion, $dni, $tipo, $estado, $accion)
	{
		$resi_condominio_id = "";
		$resi_edificio_id	= "";
		$resi_tipo			= $tipo;
		$resi_estado		= $estado;
		$resi_dni			= $dni;
		$tabla_bd 			= "condominio";
		$campo_bd 			= "cond_nombre";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $condominio_nombre);

		foreach($respuesta as $row){
			$resi_condominio_id = $row['condominio_id'];
		}

		$tabla_bd = "edificio";
		$campo_bd = "edi_descripcion";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $edificio_descripcion);

		foreach($respuesta as $row){
			$resi_edificio_id = $row['edificio_id'];
		}

		MModel($this->modulo, 'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->select_residente($resi_condominio_id, $resi_edificio_id, $resi_dni, $resi_tipo, $resi_estado, $accion);

		$html = '<option value="">Seleccione una opcion</option>';

		foreach ($respuesta as $row) {
			$html .= '<option value="'.$row['detalle'].'">'.$row['detalle'].'</option>';
		}
		echo $html;
	}

	public function existe_residente($resi_nombre, $resi_condominio_nombre, $resi_edificio_descripcion, $resi_departamento_id){
        $rpta_existe_residente	= "";
		$resi_condominio_id 	= "";
		$resi_edificio_id		= "";
		$resi_departamento_id	= "";

		$tabla_bd = "glo_roles";
		$campo_bd = "roles_nombre_corto";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $resi_nombre);

		foreach($respuesta as $row){
			$resi_dni = $row['roles_dni'];
		}

		$tabla_bd = "condominio";
		$campo_bd = "cond_nombre";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $resi_condominio_nombre);

		foreach($respuesta as $row){
			$resi_condominio_id = $row['condominio_id'];
		}

		$tabla_bd = "edificio";
		$campo_bd = "edi_descripcion";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $resi_edificio_descripcion);

		foreach($respuesta as $row){
			$resi_edificio_id = $row['edificio_id'];
		}

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->existe_residente($resi_dni, $resi_condominio_id, $resi_edificio_id, $resi_departamento_id);

		if($respuesta==true){
			$rpta_existe_residente = "SI";
		}		
		
		echo $rpta_existe_residente;
	}

	public function crear_residente($resi_nombre, $resi_condominio_nombre, $resi_edificio_descripcion, $resi_departamento_id, $resi_tipo, $resi_fecha_inicio, $resi_fecha_fin, $resi_estado)
	{
		$resi_dni			= "";
		$resi_condominio_id = "";
		$resi_edificio_id 	= "";

		$tabla_bd = "glo_roles";
		$campo_bd = "roles_nombre_corto";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $resi_nombre);

		foreach($respuesta as $row){
			$resi_dni = $row['roles_dni'];
		}

		$tabla_bd = "condominio";
		$campo_bd = "cond_nombre";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $resi_condominio_nombre);

		foreach($respuesta as $row){
			$resi_condominio_id = $row['condominio_id'];
		}

		$tabla_bd = "edificio";
		$campo_bd = "edi_descripcion";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $resi_edificio_descripcion);

		foreach($respuesta as $row){
			$resi_edificio_id = $row['edificio_id'];
		}

		if($resi_fecha_fin=="") {
            $resi_fecha_fin = "NULL";
        }else{
            $resi_fecha_fin = "'".$resi_fecha_fin."'";
        }

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->crear_residente($resi_dni, $resi_condominio_id, $resi_edificio_id, $resi_departamento_id, $resi_tipo, $resi_fecha_inicio, $resi_fecha_fin, $resi_estado);

	}

	public function editar_residente($residente_id, $resi_nombre, $resi_condominio_nombre, $resi_edificio_descripcion, $resi_departamento_id, $resi_tipo, $resi_fecha_inicio, $resi_fecha_fin, $resi_estado)
	{
		if($resi_fecha_fin=="") {
            $resi_fecha_fin = "NULL";
        }else{
            $resi_fecha_fin = "'".$resi_fecha_fin."'";
        }

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->editar_residente($residente_id, $resi_tipo, $resi_fecha_inicio, $resi_fecha_fin, $resi_estado);

	}

	public function crear_directiva($dire_descripcion, $dire_condominio_nombre, $dire_edificio_descripcion, $dire_tipo, $dire_fecha_inicio, $dire_fecha_fin, $dire_estado, $array_data)
	{
		$dire_condominio_id = "";
		$dire_edificio_id = "";

		$tabla_bd = "condominio";
		$campo_bd = "cond_nombre";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $dire_condominio_nombre);

		foreach($respuesta as $row){
			$dire_condominio_id = $row['condominio_id'];
			$dm_condominio_id = $row['condominio_id'];
		}

		$tabla_bd = "edificio";
		$campo_bd = "edi_descripcion";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $dire_edificio_descripcion);

		foreach($respuesta as $row){
			$dire_edificio_id = $row['edificio_id'];
		}

        MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->crear_directiva($dire_descripcion, $dire_condominio_id, $dire_edificio_id, $dire_tipo, $dire_fecha_inicio, $dire_fecha_fin, $dire_estado);

		$tabla_bd = "directiva";
		$campo_id = "directiva_id";
		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->max_id($tabla_bd, $campo_id);

		foreach($respuesta as $row){
			$dm_directiva_id = $row['max_id'];
		}

		foreach($array_data as $row){
			$dm_dni						= "";
			$dm_edificio_id				= "";
			$dm_cargo                	= $row['dm_cargo'];
			$dm_miembro_nombre       	= $row['dm_miembro_nombre'];
			$dm_edificio_descripcion 	= $row['dm_edificio_descripcion'];
			$dm_departamento_id      	= $row['dm_departamento_id'];

			$tabla_bd = "edificio";
			$campo_bd = "edi_descripcion";
	
			MModel($this->modulo,'crud');
			$instancia_ajax = new crud();
			$respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $dm_edificio_descripcion);
	
			foreach($respuesta as $row){
				$dm_edificio_id = $row['edificio_id'];
			}

			$tabla_bd = "glo_roles";
			$campo_bd = "roles_nombre_corto";
	
			MModel($this->modulo,'crud');
			$instancia_ajax = new crud();
			$respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $dm_miembro_nombre);
	
			foreach($respuesta as $row){
				$dm_dni = $row['roles_dni'];
			}

			MModel($this->modulo,'crud');
			$instancia_ajax = new crud();
			$respuesta = $instancia_ajax->crear_miembro($dm_directiva_id, $dm_dni, $dm_condominio_id, $dm_edificio_id, $dm_departamento_id, $dm_cargo);
		}
	}

	public function editar_directiva($directiva_id, $dire_descripcion, $dire_condominio_nombre, $dire_edificio_descripcion, $dire_tipo, $dire_fecha_inicio, $dire_fecha_fin, $dire_estado, $array_data)
	{
		$dire_condominio_id	= "";
		$dire_edificio_id	= "";
		$dm_directiva_id	= $directiva_id; 

		$tabla_bd = "condominio";
		$campo_bd = "cond_nombre";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $dire_condominio_nombre);

		foreach($respuesta as $row){
			$dire_condominio_id = $row['condominio_id'];
			$dm_condominio_id = $row['condominio_id'];
		}

		$tabla_bd = "edificio";
		$campo_bd = "edi_descripcion";

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $dire_edificio_descripcion);

		foreach($respuesta as $row){
			$dire_edificio_id = $row['edificio_id'];
		}

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->editar_directiva($directiva_id, $dire_descripcion, $dire_condominio_id, $dire_edificio_id, $dire_tipo, $dire_fecha_inicio, $dire_fecha_fin, $dire_estado);

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->borrar_miembro($directiva_id);

		foreach($array_data as $row){
			$dm_dni						= "";
			$dm_edificio_id				= "";
			$dm_cargo                	= $row['dm_cargo'];
			$dm_miembro_nombre       	= $row['dm_miembro_nombre'];
			$dm_edificio_descripcion 	= $row['dm_edificio_descripcion'];
			$dm_departamento_id      	= $row['dm_departamento_id'];

			$tabla_bd = "edificio";
			$campo_bd = "edi_descripcion";
	
			MModel($this->modulo,'crud');
			$instancia_ajax = new crud();
			$respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $dm_edificio_descripcion);
	
			foreach($respuesta as $row){
				$dm_edificio_id = $row['edificio_id'];
			}

			$tabla_bd = "glo_roles";
			$campo_bd = "roles_nombre_corto";
	
			MModel($this->modulo,'crud');
			$instancia_ajax = new crud();
			$respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $dm_miembro_nombre);
	
			foreach($respuesta as $row){
				$dm_dni = $row['roles_dni'];
			}

			MModel($this->modulo,'crud');
			$instancia_ajax = new crud();
			$respuesta = $instancia_ajax->crear_miembro($dm_directiva_id, $dm_dni, $dm_condominio_id, $dm_edificio_id, $dm_departamento_id, $dm_cargo);
		}
	}

	public function borrar_directiva($directiva_id)
	{
		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->borrar_directiva($directiva_id);

		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->borrar_miembro($directiva_id);

	}

}