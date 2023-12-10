<?php
class accesos
{
	var $modulo = "cta_pagar";

	public function creacion_tab($nombre_tab,$tipo_tab)    
	{		
		$tab_html = '';
		switch($nombre_tab)
		{
			case "nav-tab-cta_pagar":
				$tab_html = '	<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Listado</a>
								<a class="nav-item nav-link" id="nav-registro-tab" data-toggle="tab" href="#nav-registro" role="tab" aria-controls="nav-registro" aria-selected="false">Registro</a>
								<a class="nav-item nav-link" id="nav-proveedor-tab" data-toggle="tab" href="#nav-proveedor" role="tab" aria-controls="nav-proveedor" aria-selected="false">Proveedor</a>
								<a class="nav-item nav-link" id="nav-producto-tab" data-toggle="tab" href="#nav-producto" role="tab" aria-controls="nav-producto" aria-selected="false">Producto</a>
								<a class="nav-item nav-link" id="nav-reporte-tab" data-toggle="tab" href="#nav-reporte" role="tab" aria-controls="nav-reporte" aria-selected="false">Reporte</a>';
				MModel($this->modulo, 'crud');
				$instancia_ajax = new crud();
				$respuesta = $instancia_ajax->permisos($this->modulo,'nav-ajustes_cta_pagar-tab');
				if ($respuesta=="SI"){
					$tab_html .= '<a class="nav-item nav-link" id="nav-ajustes_cta_pagar-tab" data-toggle="tab" href="#nav-ajustes_cta_pagar" role="tab" aria-controls="nav-ajustes_cta_pagar" aria-selected="false">Ajustes</a>';
				}
			break;

			case "nav-tab-ajustes_cta_pagar":
				MModel($this->modulo, 'crud');
				$instancia_ajax= new crud();
				$respuesta = $instancia_ajax->permisos($this->modulo,'nav-ajustes_cta_pagar_usuario-tab');
				if ($respuesta=="SI"){
					$tab_html = '	<a class="nav-item nav-link active" id="nav-ajustes_cta_pagar_usuario-tab" data-toggle="tab" href="#nav-ajustes_cta_pagar_usuario" role="tab" aria-controls="nav-ajustes_cta_pagar_usuario" aria-selected="true">Usuario</a>';
				}
				MModel($this->modulo, 'crud');
				$instancia_ajax = new crud();
				$respuesta = $instancia_ajax->Permisos($this->modulo,'nav-ajustes_cta_pagar_sistema-tab');
				if ($respuesta=="SI"){
					$tab_html .= '	<a class="nav-item nav-link" id="nav-ajustes_cta_pagar_sistema-tab" data-toggle="tab" href="#nav-ajustes_cta_pagar_sistema" role="tab" aria-controls="nav-ajustes_cta_pagar_sistema" aria-selected="false">Sistema</a>';
				}
			break;

		}
		echo $tab_html;
	}
	
    public function creacion_tabla($nombre_tabla,$_tipo_tabla)
    {
		$tabla_html = "";
        switch ($nombre_tabla) 
		{
            case "tabla_listado_cta_pagar":
                $tabla_html = '<table id="tabla_listado_cta_pagar" class="table table-striped table-bordered table-condensed w-100">
									<thead class="text-center">
										<tr>
											<th>VER</th>
											<th>PERIODO</th>
											<th>ESTADO</th>
											<th>TIPO</th>
											<th>NRO.DOCUMENTO</th>
											<th>FECHA</th>
											<th>RUC</th>
											<th>PROVEEDOR</th>
											<th>DESCRIPCION</th>
											<th>SUB_TOTAL</th>
											<th>IGV</th>
											<th>TOTAL</th>
											<th>USUARIO_REGISTRA</th>
											<th>FECHA_REGISTRO</th>
											<th>ACCIONES</th>
										</tr>
									</thead>	
									<tbody>
									</tbody>
								</table>';
            break;

			case "tabla_proveedor":
                $tabla_html = '	<table id="tabla_proveedor" class="table table-striped table-bordered table-condensed w-100">
									<thead class="text-center">
										<tr>
											<th>RUC</th>
											<th>RAZON_SOCIAL</th>
											<th>CONTACTO</th>
											<th>CTA_BANCARIA_SOLES</th> 
											<th>CORREO_ELECTRONICO</th>
											<th>TELEFONO</th>
											<th>ESTADO</th>
											<th>DIRECCION_PRINCIPAL</th>
											<th>DISTRITO</th>
											<th>ACCION</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>';
            break;

			case "tabla_producto":
                $tabla_html = '	<table id="tabla_producto" class="table table-striped table-bordered table-condensed w-100">
									<thead class="text-center">
										<tr>
											<th>ID</th>
											<th>RUBRO_DE_PRODUCTO</th>
											<th>TIPO</th>
											<th>CODIGO</th> 
											<th>DESCRIPCION_DE_PRODUCTO</th>
											<th>ESTADO</th>
											<th>ACCION</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>';
            break;

			case "tabla_tc_cta_pagar_usuario":
                $tabla_html = '	<table id="tabla_tc_cta_pagar_usuario" class="table table-striped table-bordered table-condensed w-100">
									<thead class="text-center">
										<tr>
											<th>ID</th>
											<th>CATEGORIA 1</th>
											<th>CATEGORIA 2</th>
											<th>CATEGORIA 3</th>
											<th>ACCIONES</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>';
            break;

			case "tabla_tc_cta_pagar_sistema":
                $tabla_html = '	<table id="tabla_tc_cta_pagar_sistema" class="table table-striped table-bordered table-condensed w-100">
									<thead class="text-center">
										<tr>
											<th>ID</th>
											<th>CATEGORIA 1</th>
											<th>CATEGORIA 2</th>
											<th>CATEGORIA 3</th>
											<th>ACCIONES</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>';
            break;

			case "":
				$tabla_html = '';
			break;

        }
		echo $tabla_html;
	}

	public function columnas_tabla($nombre_tabla,$tipo_tabla)
	{
		$columnas_html = "";
        switch ($nombre_tabla) 
		{
            case "tabla_listado_cta_pagar":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button title='Ver' class='btn btn-sm btn_ver_cta_pagar'><i class='bi bi-search'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'><path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/></svg></i></button></div></div>";
				$defaultContent2 = "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btn_editar_cta_pagar'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"defaultContent": " '.$defaultContent1.' "},
									{"data": "dpag_periodo"},
									{"data": "dpag_estado"},
                    				{"data": "dpag_tipo"},
                    				{"data": "dpag_nro_documento"},
                    				{"data": "dpag_fecha_documento"},
                    				{"data": "dpag_ruc_proveedor"},
									{"data": "dpag_nombre_proveedor"},
                    				{"data": "dpag_descripcion"},
									{"data": "dpag_subtotal"},
                    				{"data": "dpag_igv"},
                    				{"data": "dpag_monto_total"},
									{"data": "dpag_usuario_registra"},
									{"data": "dpag_fecha_registro"},
                    				{"defaultContent": " '.$defaultContent2.' "}
                  				]';
			break;

			case "tabla_proveedor":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btn_editar_proveedor'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "prov_ruc"},
									{"data": "prov_nombre"},
									{"data": "prov_contacto"},
									{"data": "prov_cta_banco_soles"},
									{"data": "prov_email"},
									{"data": "prov_nro_telefono"},
									{"data": "prov_estado"},
									{"data": "prov_direccion"},
									{"data": "prov_distrito"},
									{"defaultContent": " '.$defaultContent1.' "}
								]';
			break;

			case "tabla_producto":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btn_editar_producto'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "producto_id"},
									{"data": "prod_rubro"},
									{"data": "prod_tipo"},
									{"data": "prod_codigo"},
									{"data": "prod_descripcion"},
									{"data": "prod_estado"},
									{"defaultContent": " '.$defaultContent1.' "}
								]';
			break;

			case "tabla_tc_cta_pagar_usuario":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btn_editar_tc_cta_pagar_usuario'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button class='btn btn-danger btn-sm btn_borrar_tc_cta_pagar_usuario'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "tc_cta_pagar_id"},
									{"data": "tc_categoria1"},
									{"data": "tc_categoria2"},
									{"data": "tc_categoria3"},
									{"defaultContent": " '.$defaultContent1.' "}
								]';
			break;

			case "tabla_tc_cta_pagar_sistema":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btn_editar_tc_cta_pagar_sistema'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button class='btn btn-danger btn-sm btn_borrar_tc_cta_pagar_sistema'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "tc_cta_pagar_id"},
									{"data": "tc_categoria1"},
									{"data": "tc_categoria2"},
									{"data": "tc_categoria3"},
									{"defaultContent": " '.$defaultContent1.' "}
								]';
			break;

			case "":
				$defaultContent1 = "";
				$columnas_html = '';
			break;
        }
		echo $columnas_html;
	}

	public function botones_formulario($nombre_formulario,$nombre_objeto)
	{
		$botones_formulario = "";
		switch($nombre_formulario)
		{
			case "":
				switch($nombre_objeto)
				{
					case "":
					break;
				}

		}
		echo $botones_formulario;
    }

	public function div_formulario($nombre_formulario,$nombre_objeto)
	{
		$div_formulario = "";
		switch($nombre_formulario)
		{
			case "":
				switch($nombre_objeto)
				{
					case "":
					break;

					case "":
					break;

				}
			break;
		}
		echo $div_formulario;
    }

	public function mostrar_div($nombre_formulario,$nombre_objeto,$dato1,$dato2)
	{
		$mostrar_div = "";
		switch($nombre_formulario)
		{
			case "":
				switch($nombre_objeto)
				{
					case "":
						$mostrar_div = '';
					break;

					case "":
						switch($dato1)
						{
							case "":
							break;

							case "":
							break;

						}
						$mostrar_div = '';
					break;

				}
			break;
		}
		echo $mostrar_div;
    }
}