<?php
class logico
{
	var $modulo = "ajuste_generales";

	function Contenido($NombreDeModuloVista)    
	{		
		MView($this->modulo,'local_view',compact('NombreDeModuloVista') );
	}

	public function buscar_data_bd($tabla_bd, $campo_bd, $data_buscar)
    {
        MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $data_buscar);

        print json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

	public function select_objeto($cacces_nombre_modulo)
	{
		$tabla_bd = "glo_modulo";
        $campo_bd = "mod_nombre";

        MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd,$campo_bd,$cacces_nombre_modulo);
		
        foreach($respuesta as $row){
			$cacces_modulo_id = $row['modulo_id'];
		}

		MModel($this->modulo, 'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->select_objeto($cacces_modulo_id);
	
		$html = '<option value="">Seleccione una opcion</option>';
		foreach ($respuesta as $row) {
			$html .= '<option value="'.$row['Detalle'].'">'.$row['Detalle'].'</option>';
		}
		echo $html;
	}

	public function select_categoria($tabla, $tc_categoria1, $tc_categoria2)
	{
		MModel($this->modulo, 'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->select_categoria($tabla, $tc_categoria1, $tc_categoria2);

		$html = '<option value="">Seleccione una opcion</option>';

		foreach ($respuesta as $row) {
			$html .= '<option value="'.$row['Detalle'].'">'.$row['Detalle'].'</option>';
		}
		echo $html;
	}

	public function existe_categoria($tabla, $tc_variable, $tc_categoria1, $tc_categoria2, $tc_categoria3)
	{
		MModel($this->modulo, 'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->existe_categoria($tabla, $tc_variable, $tc_categoria1, $tc_categoria2, $tc_categoria3);

		$html = 'NO';

		foreach ($respuesta as $row) {
			$html = 'SI';
		}
		echo $html;
	}

	public function select_maestro()
	{
		MModel($this->modulo, 'crud');
		$instancia_ajax= new crud();
		$respuesta = $instancia_ajax->select_maestro();

		$html = '<option value="">Seleccione una opcion</option>';
		foreach ($respuesta as $row) {
			$html .= '<option value="'.$row['nombres'].'">'.$row['nombres'].'</option>';
		}
		echo $html;
	}

	public function buscar_DNI($roles_apellidos_nombres)
	{
		MModel($this->modulo, 'crud');
		$instancia_ajax= new crud();
		$respuesta = $instancia_ajax->buscar_DNI($roles_apellidos_nombres);

		$html = '';
		foreach ($respuesta as $row) {
			$html = $row['DNI'];
		}
		echo $html;
	}

	public function buscar_nombre_corto($roles_dni)
	{
		MModel($this->modulo, 'crud');
		$instancia_ajax= new crud();
		$respuesta = $instancia_ajax->buscar_nombre_corto($roles_dni);

		$html = '';
		foreach ($respuesta as $row) {
			$html = $row['nombre_corto'];
		}
		echo $html;
	}

	public function select_usuario()
	{
		MModel($this->modulo,'crud');
		$instancia_ajax= new crud();
		$respuesta = $instancia_ajax->select_usuario();
		
		$html = '<option value="">Seleccione una opcion</option>';
		foreach ($respuesta as $row)
		{
			$html .= '<option value="'.$row['usuario'].'">'.$row['usuario'].'</option>';
		}
		echo $html;	
	}

	public function select_modulo()
	{
		MModel($this->modulo,'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->select_modulo();
		$html = '<option value="">Seleccione una opcion</option>';
		foreach ($respuesta as $row)
		{
			$html .= '<option value="'.$row['modulo'].'">'.$row['modulo'].'</option>';
		}
		echo $html;	
	}

	public function validar_permisos($per_usuario_id, $per_modulo_nombre)
	{
		$validar = "";
		
		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd('glo_modulo','mod_nombre',$per_modulo_nombre);
		
        foreach($respuesta as $row){
			$per_modulo_id = $row['modulo_id'];
		}
		
		MModel($this->modulo,'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->validar_permisos($per_usuario_id,$per_modulo_id);
		
		if($respuesta==false){
			$validar = "NO";
		}else{
			$validar = "SI";
		}
		echo $validar;	
	}

	public function crear_control_acceso($control_acceso_id, $cacces_perfil, $cacces_nombre_modulo, $cacces_nombre_objeto, $cacces_acceso)
	{
		$tabla_bd = "glo_modulo";
        $campo_bd = "mod_nombre";

        MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd,$campo_bd,$cacces_nombre_modulo);
		
		foreach ($respuesta as $row)
		{
			$cacces_modulo_id = $row['modulo_id'];
		}

		$tabla_bd = "glo_objeto";
        $campo_bd = "obj_nombre_objeto";

        MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd,$campo_bd,$cacces_nombre_objeto);
		
		foreach ($respuesta as $row)
		{
			$cacces_objeto_id = $row['objeto_id'];
		}

		MModel($this->modulo,'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->crear_control_acceso($cacces_perfil, $cacces_modulo_id, $cacces_objeto_id, $cacces_acceso);

	}

	public function editar_control_acceso($control_acceso_id, $cacces_perfil, $cacces_nombre_modulo, $cacces_nombre_objeto, $cacces_acceso)
	{

		$tabla_bd = "glo_modulo";
        $campo_bd = "mod_nombre";

        MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd,$campo_bd,$cacces_nombre_modulo);
		
		foreach ($respuesta as $row)
		{
			$cacces_modulo_id = $row['modulo_id'];
		}

		$tabla_bd = "glo_objeto";
        $campo_bd = "obj_nombre_objeto";

        MModel($this->modulo,'crud');
        $instancia_ajax= new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd,$campo_bd,$cacces_nombre_objeto);
		
		foreach ($respuesta as $row)
		{
			$cacces_objeto_id = $row['objeto_id'];
		}

		MModel($this->modulo,'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->editar_control_acceso($control_acceso_id, $cacces_perfil, $cacces_modulo_id, $cacces_objeto_id, $cacces_acceso);

	}

	public function validar_objeto($obj_nombre_objeto_modulo, $obj_nombre_objeto_objeto)
	{
		$tabla_bd = "glo_modulo";
        $campo_bd = "mod_nombre";

        MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd,$campo_bd,$obj_nombre_objeto_modulo);
		
		foreach ($respuesta as $row)
		{
			$obj_modulo_id = $row['modulo_id'];
		}

		MModel($this->modulo,'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->validar_objeto($obj_modulo_id, $obj_nombre_objeto_objeto);
		$validar = "";
		if($respuesta == false){
			$validar = "NO";
		}else{
			$validar = "SI";
		}
		echo $validar;	
	}

	public function validar_control_acceso($cacces_perfil, $cacces_nombre_modulo, $cacces_nombre_objeto)
	{
		$tabla_bd = "glo_modulo";
        $campo_bd = "mod_nombre";

        MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd,$campo_bd,$cacces_nombre_modulo);
		
		foreach ($respuesta as $row)
		{
			$cacces_modulo_id = $row['modulo_id'];
		}

		$tabla_bd = "glo_objeto";
        $campo_bd = "obj_nombre_objeto";

        MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd,$campo_bd,$cacces_nombre_objeto);
		
		foreach ($respuesta as $row)
		{
			$cacces_objeto_id = $row['objeto_id'];
		}

		MModel($this->modulo,'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->validar_control_acceso($cacces_perfil, $cacces_modulo_id, $cacces_objeto_id);
		$validar = "";
		if($respuesta ==false){
			$validar = "NO";
		}else{
			$validar = "SI";
		}
		echo $validar;	
	}

	public function importar_tipo_cambio($tcam_url, $tcam_fecha_inicio, $tcam_fecha_fin, $tcam_moneda)
	{
		// SE CONSEGUI LA DATA DEL URL DEL BCR TIPO DE CAMBIO INTERBANCARIO EN UN PERIODO DE TIEMPO
		$str_data = file_get_contents($tcam_url.$tcam_fecha_inicio."/".$tcam_fecha_fin);
		// SE FORMATEA LA DATA DEL BCR PARA QUE PUEDA SER DECODIFICADA COMO ARCHIVO JSON
		$inicio 	= stripos($str_data,'periods',0)+9;
		$largo 		= strlen($str_data);
		$data1 		= substr($str_data,$inicio,$largo);
		$fin 		= strrpos($data1,'}',0);
		$data2 		= substr($data1,0,$fin);
		$json_data 	= json_decode($data2,true);
		$inicio 	= "0";
		$tcam_valor = 0;
		foreach ($json_data as $row){
			switch (substr($row['name'],3,3)){
				case "Ene":
					$mes = "01";
				break;
				case "Feb":
					$mes = "02";
				break;
				case "Mar":
					$mes = "03";
				break;
				case "Abr":
					$mes = "04";
				break;
				case "May":
					$mes = "05";
				break;
				case "Jun":
					$mes = "06";
				break;
				case "Jul":
					$mes = "07";
				break;
				case "Ago":
					$mes = "08";
				break;
				case "Set":
					$mes = "09";
				break;
				case "Oct":
					$mes = "10";
				break;
				case "Nov":
					$mes = "11";
				break;
				case "Dic":
					$mes = "12";
				break;
			}
			$tcam_fecha = "20".substr($row['name'],-2)."-".$mes."-".substr($row['name'],0,2);
			if($inicio == "0"){
				$fecha_mas1dia = $tcam_fecha;
				$inicio = "1";
			}
			if($tcam_fecha != $fecha_mas1dia){
				while($tcam_fecha != $fecha_mas1dia){
					$tcam_tipo = "COMPRA";
					MModel($this->modulo,'crud');
					$instancia_ajax= new crud();
					$respuesta = $instancia_ajax->crear_tipo_cambio($fecha_mas1dia, $tcam_moneda, $tcam_tipo, $tcam_valor_compra);
					$tcam_tipo = "VENTA";
					MModel($this->modulo,'crud');
					$instancia_ajax= new crud();
					$respuesta = $instancia_ajax->crear_tipo_cambio($fecha_mas1dia, $tcam_moneda, $tcam_tipo, $tcam_valor_venta);
					$fecha_mas1dia = date("Y-m-d",strtotime("+1 days",strtotime($fecha_mas1dia)));	
				}
			}
			if($tcam_fecha == $fecha_mas1dia){
				$tcam_tipo 			= "COMPRA";
				$tcam_valor 		= round($row['values'][0],4);
				$tcam_valor_compra 	= $tcam_valor; 
				MModel($this->modulo,'crud');
				$instancia_ajax = new crud();
				$respuesta = $instancia_ajax->crear_tipo_cambio($tcam_fecha, $tcam_moneda, $tcam_tipo, $tcam_valor);
				$tcam_tipo 			= "VENTA";
				$tcam_valor 		= round($row['values'][1],4);
				$tcam_valor_venta 	= $tcam_valor; 
				MModel($this->modulo,'crud');
				$instancia_ajax = new crud();
				$respuesta = $instancia_ajax->crear_tipo_cambio($tcam_fecha, $tcam_moneda, $tcam_tipo, $tcam_valor);
				$fecha_mas1dia = date("Y-m-d",strtotime("+1 days",strtotime($tcam_fecha)));
			}
		}
	}
}