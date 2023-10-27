<?php
class accesos
{
	var $modulo = "condominio";

	public function creacion_tab($nombre_tab,$tipo_tab)    
	{		
		$tab_html = '';
		switch($nombre_tab)
		{
			case "nav-tab-condominio":
				$tab_html = '	<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Condominio</a>
								<a class="nav-item nav-link" id="nav-edificio-tab" data-toggle="tab" href="#nav-edificio" role="tab" aria-controls="nav-edificio" aria-selected="false">Edificios</a>
								<a class="nav-item nav-link" id="nav-departamento-tab" data-toggle="tab" href="#nav-departamento" role="tab" aria-controls="nav-departamento" aria-selected="false">Departamentos</a>
								<a class="nav-item nav-link" id="nav-residente-tab" data-toggle="tab" href="#nav-residente" role="tab" aria-controls="nav-residente" aria-selected="false">Residentes</a>
								<a class="nav-item nav-link" id="nav-directiva-tab" data-toggle="tab" href="#nav-directiva" role="tab" aria-controls="nav-directiva" aria-selected="false">Junta Directiva</a>';
				MModel($this->modulo, 'crud');
				$instancia_ajax = new crud();
				$respuesta = $instancia_ajax->permisos($this->modulo,'nav-ajustes_condominio-tab');
				if ($respuesta=="SI"){
					$tab_html .= '<a class="nav-item nav-link" id="nav-ajustes_condominio-tab" data-toggle="tab" href="#nav-ajustes_condominio" role="tab" aria-controls="nav-ajustes_condominio" aria-selected="false">Ajustes</a>';
				}
			break;

			case "nav-tab-ajustes_condominio":
				MModel($this->modulo, 'crud');
				$instancia_ajax= new crud();
				$respuesta = $instancia_ajax->permisos($this->modulo,'nav-ajustes_condominio_usuario-tab');
				if ($respuesta=="SI"){
					$tab_html = '	<a class="nav-item nav-link active" id="nav-ajustes_condominio_usuario-tab" data-toggle="tab" href="#nav-ajustes_condominio_usuario" role="tab" aria-controls="nav-ajustes_condominio_usuario" aria-selected="true">Usuario</a>';
				}
				MModel($this->modulo, 'crud');
				$instancia_ajax = new crud();
				$respuesta = $instancia_ajax->Permisos($this->modulo,'nav-ajustes_condominio_sistema-tab');
				if ($respuesta=="SI"){
					$tab_html .= '	<a class="nav-item nav-link" id="nav-ajustes_condominio_sistema-tab" data-toggle="tab" href="#nav-ajustes_condominio_sistema" role="tab" aria-controls="nav-ajustes_condominio_sistema" aria-selected="false">Sistema</a>';
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
            case "tabla_condominio":
                $tabla_html = '<table id="tabla_condominio" class="table table-striped table-bordered table-condensed w-80">
									<thead class="text-center">
										<tr>
											<th>ID</th>
											<th>TIPO</th>
											<th>NOMBRE_DEL_CONDOMINIO</th>
											<th>EDIF.</th>
											<th>DPTOS.</th>
											<th>PUERT.</th>
											<th>ESTAC.</th>
											<th>DIRECCION_PRINCIPAL</th>
											<th>DISTRITO</th>
											<th>ESTADO</th>
											<th>ACCIONES</th>
										</tr>
									</thead>	
									<tbody>
									</tbody>
								</table>';
            break;

			case "tabla_puerta":
                $tabla_html = '	<table id="tabla_puerta" class="table table-striped table-bordered table-condensed w-100">
									<thead class="text-center">
										<tr>
											<th>PUERTA</th>
											<th>DIRECCION</th>
											<th>ACCIONES</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>';
			break;

			case "tabla_edificio":
                $tabla_html = '	<table id="tabla_edificio" class="table table-striped table-bordered table-condensed w-80">
									<thead class="text-center">
										<tr>
											<th>EDIFICIO_ID</th>
											<th>DESCRIPCION</th>
											<th>NOMBRE_DEL_CONDOMINIO</th>
											<th>PISOS</th>
											<th>DPTOS.</th>
											<th>ESTADO</th>
											<th>ACCIONES</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>';
            break;

			case "tabla_departamento":
				$tabla_html = '	<table id="tabla_departamento" class="table table-striped table-bordered table-condensed w-80">
									<thead class="text-center">
										<tr>
											<th>DPTO_ID</th>
											<th>DESCRIPCION</th>
											<th>NOMBRE_DEL_CONDOMINIO</th>
											<th>DESCRIPCION_DEL_EDIFICIO</th>
											<th>DPTO.PISO</th>
											<th>DIMENSIONES</th>
											<th>ESTADO</th>
											<th>ACCIONES</th>
										</tr>
									</thead>
									<tbody>                
									</tbody>
								</table>';
			break;

			case "tabla_residente":
                $tabla_html = '	<table id="tabla_residente" class="table table-striped table-bordered table-condensed w-80">
									<thead class="text-center">
										<tr>
											<th>ID</th>
											<th>NOMBRE_RESIDENTE</th>
											<th>NOMBRE_DEL_CONDOMINIO</th>
											<th>DESCRIPCION_DEL_EDIFICIO</th>
											<th>DEPARTAMENTO</th>
											<th>TIPO_RESIDENTE</th>
											<th>FECHA_INICIAL</th>
											<th>FECHA_TERMINO</th>
											<th>ESTADO</th>
											<th>ACCIONES</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>';
            break;

			case "tabla_directiva":
                $tabla_html = '	<table id="tabla_directiva" class="table table-striped table-bordered table-condensed w-80">
									<thead class="text-center">
										<tr>
											<th>ID</th>
											<th>JUNTA_DIRECTIVA</th>
											<th>CONDOMINIO</th>
											<th>EDIFICIO</th>
											<th>TIPO_DE_JUNTA</th>
											<th>FECHA_INICIAL</th>
											<th>FECHA_TERMINO</th>
											<th>ESTADO</th>
											<th>ACCIONES</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>';
            break;

			case "tabla_miembro":
                $tabla_html = '	<table id="tabla_miembro" class="table table-striped table-bordered table-condensed w-100">
									<thead class="text-center">
										<tr>
											<th>CARGO</th>	
											<th>NOMBRE_DEL_MIEMBRO</th>
											<th>EDIFICIO</th>	
											<th>DPTO.</th>
											<th>ACCION</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>';
            break;

			case "tabla_tc_condominio_usuario":
                $tabla_html = '	<table id="tabla_tc_condominio_usuario" class="table table-striped table-bordered table-condensed w-100">
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

			case "tabla_tc_condominio_sistema":
                $tabla_html = '	<table id="tabla_tc_condominio_sistema" class="table table-striped table-bordered table-condensed w-100">
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
            case "tabla_condominio":
				$defaultContent1 = "";
				$defaultContent2 = "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btn_editar_condominio'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button class='btn btn-danger btn-sm btn_borrar_condominio'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "condominio_id"},
                    				{"data": "cond_tipo"},
                    				{"data": "cond_nombre"},
                    				{"data": "cond_edificio"},
                    				{"data": "cond_dpto"},
									{"data": "cond_puerta"},
                    				{"data": "cond_estacionamiento"},
									{"data": "cond_direccion"},
                    				{"data": "cond_distrito"},
                    				{"data": "cond_estado"},
                    				{"defaultContent": " '.$defaultContent2.' "}
                  				]';
			break;

			case "tabla_puerta":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button title='Borrar' class='btn btn-danger btn-sm btn_borrar_puerta'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "pta_nombre"},
									{"data": "pta_direccion"},
									{"defaultContent": " '.$defaultContent1.' "}
								]';
			break;

			case "tabla_edificio":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button title='Editar' class='btn btn-primary btn-sm btn_editar_edificio'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button title='Borrar' class='btn btn-danger btn-sm btn_borrar_edificio'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "edificio_id"},
									{"data": "edi_descripcion"},
									{"data": "edi_condominio_nombre"},
									{"data": "edi_piso"},
									{"data": "edi_dpto"},
									{"data": "edi_estado"},
									{"defaultContent": " '.$defaultContent1.' "}
								]';
			break;

			case "tabla_departamento":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btn_editar_dpto'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button class='btn btn-danger btn-sm btn_borrar_dpto'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "departamento_id"},
                    				{"data": "dpto_descripcion"},
                    				{"data": "dpto_condominio_nombre"},
                    				{"data": "dpto_edificio_descripcion"},
                    				{"data": "dpto_piso"},
									{"data": "dpto_dimensiones"},
									{"data": "dpto_estado"},
                    				{"defaultContent": " '.$defaultContent1.' "}
                  				]';
			break;

			case "tabla_residente":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button title='Editar' class='btn btn-primary btn-sm btn_editar_residente'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button title='Borrar' class='btn btn-danger btn-sm btn_borrar_residente'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "residente_id"},
									{"data": "resi_nombre"},
									{"data": "resi_condominio_nombre"},
									{"data": "resi_edificio_descripcion"},
									{"data": "resi_departamento_id"},
									{"data": "resi_tipo"},
									{"data": "resi_fecha_inicio"},
									{"data": "resi_fecha_fin"},
									{"data": "resi_estado"},
									{"defaultContent": " '.$defaultContent1.' "}
								]';
			break;

			case "tabla_directiva":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button title='Editar' class='btn btn-primary btn-sm btn_editar_directiva'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button title='Borrar' class='btn btn-danger btn-sm btn_borrar_directiva'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "directiva_id"},
									{"data": "dire_descripcion"},
									{"data": "dire_condominio_nombre"},
									{"data": "dire_edificio_descripcion"},
									{"data": "dire_tipo"},
									{"data": "dire_fecha_inicio"},
									{"data": "dire_fecha_fin"},
									{"data": "dire_estado"},
									{"defaultContent": " '.$defaultContent1.' "}
								]';
			break;

			case "tabla_miembro":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button class='btn btn-danger btn-sm btn_borrar_miembro'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '	[	{"data": "dm_cargo"},    					
										{"data": "dm_miembro_nombre"},
										{"data": "dm_edificio_descripcion"},
										{"data": "dm_departamento_id"},
                    					{"defaultContent": " '.$defaultContent1.' "}
                  					]';
			break;

			case "tabla_tc_condominio_usuario":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btn_editar_tc_condominio_usuario'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button class='btn btn-danger btn-sm btn_borrar_tc_condominio_usuario'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "tc_condominio_id"},
									{"data": "tc_categoria1"},
									{"data": "tc_categoria2"},
									{"data": "tc_categoria3"},
									{"defaultContent": " '.$defaultContent1.' "}
								]';
			break;

			case "tabla_tc_condominio_sistema":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btn_editar_tc_condominio_sistema'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button class='btn btn-danger btn-sm btn_borrar_tc_condominio_sistema'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "tc_condominio_id"},
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
			case "form_seleccion_condominio":
				switch($nombre_objeto)
				{
					case "btn_seleccion_condominio":
						$botones_formulario = '<button id="btn_nuevo_condominio" type="button" class="btn btn-secondary btn-sm btn_nuevo_condominio" data-toggle="modal">+ Nuevo</button>';
					break;
				}
			break;
			case "form_seleccion_edificio":
				switch($nombre_objeto)
				{
					case "btn_seleccion_edificio":
						$botones_formulario = '<button id="btn_nuevo_edificio" type="button" class="btn btn-secondary btn-sm btn_nuevo_edificio" data-toggle="modal">+ Nuevo</button>';
					break;
				}
			break;
			case "form_seleccion_departamento":
				switch($nombre_objeto)
				{
					case "btn_seleccion_departamento":
						$botones_formulario = '<button id="btn_nuevo_dpto" type="button" class="btn btn-secondary btn-sm btn_nuevo_dpto" data-toggle="modal">+ Nuevo</button>';
					break;
				}
			break;

			case "form_seleccion_residente":
				switch($nombre_objeto)
				{
					case "btn_seleccion_residente":
						$botones_formulario = '<button id="btn_nuevo_resdeinte" type="button" class="btn btn-secondary btn-sm btn_nuevo_residente" data-toggle="modal">+ Nuevo</button>';
					break;
				}
			break;

			case "form_seleccion_directiva":
				switch($nombre_objeto)
				{
					case "btn_seleccion_directiva":
						$botones_formulario = '<button id="btn_nuevo_directiva" type="button" class="btn btn-secondary btn-sm btn_nuevo_directiva" data-toggle="modal">+ Nuevo</button>';
					break;
				}
			break;

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