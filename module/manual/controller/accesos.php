<?php
class accesos
{
	var $modulo = "manual";

	public function creacion_tab($nombre_tab, $tipo_tab)
	{		
		$tab_html = '';
		switch($nombre_tab)
		{
			case "nav-tab-manual":
				$tab_html = '	<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Listado</a>
								<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Manual</a>';
			break;

		}
		echo $tab_html;
	}
	
    public function creacion_tabla($nombre_tabla, $tipo_tabla)
    {
		$tabla_html = "";
        switch ($nombre_tabla) 
		{
            case "tabla_manual":
                $tabla_html = '	<table id="tabla_manual" class="table table-striped table-bordered table-condensed w-100"  >
									<thead class="text-center">
										<tr>
											<th>VER</th>
											<th>ID</th>
											<th>MODULO</th>
											<th>TITULO</th>
											<th>USUARIO GENERA</th>
											<th>FECHA GENERA</th>
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

	public function columnas_tabla($nombre_tabla, $tipo_tabla)
	{
		$columnas_html = "";
        switch ($nombre_tabla) 
		{
            case "tabla_manual":
				$default_content_0 = "<div class='text-center'><div class='btn-group'><button title='Ver' class='btn btn-sm btn_ver_manual_registro'><i class='bi bi-search'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-search' viewBox='0 0 16 16'><path d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'/></svg></i></button></div></div>";
				$default_content_1 = "<div class='text-center'><div class='btn-group'><button title='Editar' class='btn btn-primary btn-sm btn_editar_manual_registro'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button title='Borrar' class='btn btn-danger btn-sm btn_borrar_manual_registro'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"defaultContent": " '.$default_content_0.' "},
									{"data": "manual_id"},
									{"data": "mod_nombre_vista"},
									{"data": "man_titulo"},
									{"data": "maes_nombre_corto"},
									{"data": "man_fecha_genera"},
									{"defaultContent": " '.$default_content_1.' "}
				  				]';
			break;

			case "":
				$columnas_html = '';
			break;

        }
		echo $columnas_html;
	}

	public function botones_formulario($nombre_formulario, $nombre_objeto)
	{
		$botones_formulario = "";
		switch($nombre_formulario)
		{
			case "form_seleccion_listado_manual":
				switch($nombre_objeto)
				{
					case "btn_seleccion_listado_manual":
						$botones_formulario  = ' <button type="button" id="btn_buscar_listado_manual" class="btn btn-secondary btn-sm btn_buscar_listado_manual">Buscar</button> ';
						MModel($this->modulo, 'crud');
						$instancia_ajax = new crud();
						$respuesta = $instancia_ajax->permisos($this->modulo,'btn_nuevo_manual_registro');
						//if ($Respuesta=="SI"){
							$botones_formulario .= ' <button type="button" id="btn_nuevo_manual_registro" class="btn btn-secondary btn-sm btn_nuevo_manual_registro">+ Nuevo</button> ';
						//}
					break;
				}
			break;

			case "":
				switch($nombre_objeto)
				{
					case "":
						$botonesformulario = '';
					break;
				}
			break;


		}
		echo $botones_formulario;
    }

	public function div_formulario($nombre_formulario, $nombre_objeto)
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

	public function mostrar_div($nombre_formulario, $nombre_objeto, $dato1, $dato2)
	{
		$mostrar_div = "";
		switch($nombre_formulario)
		{

			case "form_seleccion_manual_registro":

				switch($nombre_objeto)
				{
					case "btn_seleccion_manual_registro":
						MModel($this->modulo, 'crud');
						$instancia_ajax = new crud();
						$respuesta = $instancia_ajax->permisos($this->modulo,'btn_cargar_manual_registro');
						//if ($respuesta=="SI"){
							$mostrar_div = ' <button type="button" id="btn_cargar_manual_registro" class="btn btn-secondary btn-sm btn_cargar_manual_registro">Cargar</button> ';
						//}
						$mostrar_div .= ' <button type="button" id="btn_log_manual_registro" class="btn btn-info btn-sm btn_log_manual_registro">Log</button> ';
						$mostrar_div .= ' <button type="button" id="btn_cancelar_manual_registro" class="btn btn-light btn-sm btn_cancelar_manual_registro">Cancelar</button> ';
						if($dato1 == "guardar"){
							MModel($this->modulo, 'crud');
							$instancia_ajax = new crud();
							$respuesta = $instancia_ajax->permisos($this->modulo,'btn_guardar_manual_registro');
							//if ($respuesta=="SI"){
								$mostrar_div .= ' <button type="button" id="btn_guardar_manual_registro" class="btn btn-secondary btn-sm btn_guardar_manual_registro">Guardar</button> ';
							//}	
						}
					break;
				}
			break;

			case "form_manual_html":

				switch($nombre_objeto)
				{
					case "div_manual_html":
						$mostrar_div = ' <textarea class="form-control form-control-sm" id="man_html" name="man_html">'.$dato1.'</textarea> ';
					break;
				}
			break;

			case "contenido":
				switch($nombre_objeto)
				{
					case "div_alertsDropdown_ayuda":
						$man_modulo_id = '';
						MModel($this->modulo, 'crud');
						$instancia_ajax	= new crud();
						$respuesta	= $instancia_ajax->buscardatabd("glo_modulo", "mod_nombre", $dato1 );
						foreach($respuesta as $row){
							$man_modulo_id = $row['modulo_id'];
						}

						MModel($this->modulo, 'crud');
						$instancia_ajax	= new crud();
						$respuesta	= $instancia_ajax->buscardatabd("glo_manual", "man_modulo_id", $man_modulo_id );

						usort($respuesta, function($a, $b) {
                            return $a['man_titulo'] <=> $b['man_titulo'];
                        });
						
						$mostrar_div = '	<h5 class="dropdown-header">
												AYUDA
											</h5>';
						
						foreach($respuesta as $row){
							$mostrar_div .= '	<a class="dropdown-item d-flex align-items-center" href="javascript:f_ayuda_modulo('."'".$row['man_titulo']."'".')">
													<div>
														<div class="font-weight-ligth drop-titulo">'.$row['man_titulo'].'</div>
													</div>
												</a>'; 
						}
					break;

				}
			break;

			case "":

				switch($nombre_objeto)
				{
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