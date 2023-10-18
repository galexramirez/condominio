<?php
class accesos
{
	var $modulo = "ajuste_condominio";

	public function creacion_tab($nombre_tab,$tipo_tab)    
	{		
		$tab_html = '';
		switch($nombre_tab)
		{
			case "nav-tab-ajuste_condominio":
				$tab_html = '	<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Condominio</a>
								<a class="nav-item nav-link" id="nav-tc_cta_pagar-tab" data-toggle="tab" href="#nav-tc_cta_pagar" role="tab" aria-controls="nav-tc_cta_pagar" aria-selected="false">Cta. por Pagar</a>
								<a class="nav-item nav-link" id="nav-tc_cta_cobrar-tab" data-toggle="tab" href="#nav-tc_cta_cobrar" role="tab" aria-controls="nav-tc_cta_cobrar" aria-selected="false">Cta. por Cobrar</a>';
			break;
		}
		echo $tab_html;
	}
	
    public function creacion_tabla($nombre_tabla,$_tipo_tabla)
    {
		$tabla_html = "";
        switch ($nombre_tabla) 
		{
			case "tabla_tc_condominio":
                $tabla_html = '	<table id="tabla_tc_condominio" class="table table-striped table-bordered table-condensed w-80">
									<thead class="text-center">
										<tr>
											<th>ID</th>
											<th>FICHA</th>
											<th>CATEGORIA_1</th>
											<th>CATEGORIA_2</th>
											<th>ACCIONES</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>';
            break;

			case "tabla_tc_cta_pagar":
                $tabla_html = '	<table id="tabla_tc_cta_pagar" class="table table-striped table-bordered table-condensed w-80">
									<thead class="text-center">
										<tr>
											<th>ID</th>
											<th>FICHA</th>
											<th>CATEGORIA_1</th>
											<th>CATEGORIA_2</th>
											<th>ACCIONES</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>';
            break;

			case "tabla_tc_cta_cobrar":
                $tabla_html = '	<table id="tabla_tc_cta_cobrar" class="table table-striped table-bordered table-condensed w-80">
									<thead class="text-center">
										<tr>
											<th>ID</th>
											<th>FICHA</th>
											<th>CATEGORIA_1</th>
											<th>CATEGORIA_2</th>
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
			case "tabla_tc_condominio":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button title='Editar' class='btn btn-primary btn-sm btn_editar_tc_condominio'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button title='Borrar' class='btn btn-danger btn-sm btn_borrar_tc_condominio'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "tc_condominio_id"},
									{"data": "tc_ficha"},
									{"data": "tc_categoria1"},
									{"data": "tc_categoria2"},
									{"defaultContent": " '.$defaultContent1.' "}
								]';
			break;

			case "tabla_tc_cta_pagar":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button title='Editar' class='btn btn-primary btn-sm btn_editar_tc_cta_pagar'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button title='Borrar' class='btn btn-danger btn-sm btn_borrar_tc_cta_pagar'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "tc_cta_pagar_id"},
									{"data": "tc_ficha"},
									{"data": "tc_categoria1"},
									{"data": "tc_categoria2"},
									{"defaultContent": " '.$defaultContent1.' "}
								]';
			break;

			case "tabla_tc_cta_cobrar":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btn_editar_tc_cta_cobrar'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button class='btn btn-danger btn-sm btn_borrar_tc_cta_cobrar'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '	[	{"data": "tc_cta_cobrar_id"},
                    					{"data": "mod_nombre"},
                    					{"data": "mod_nombre_vista"},
                    					{"data": "mod_icono"},
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
			case "form_seleccion_tc_condominio":
				switch($nombre_objeto)
				{
					case "btn_seleccion_tc_condominio":
						$botones_formulario = '<button id="btn_nuevo_tc_condominio" type="button" class="btn btn-secondary btn-sm btn_nuevo_tc_condominio" data-toggle="modal">+ Nuevo</button>';
					break;
				}
			break;

			case "form_seleccion_tc_cta_pagar":
				switch($nombre_objeto)
				{
					case "btn_seleccion_tc_cta_pagar":
						$botones_formulario = '<button id="btn_nuevo_tc_cta_pagar" type="button" class="btn btn-secondary btn-sm btn_nuevo_tc_cta_pagar" data-toggle="modal">+ Nuevo</button>';
					break;
				}
			break;

			case "form_seleccion_tc_cta_cobrar":
				switch($nombre_objeto)
				{
					case "btn_seleccion_tc_cta_cobrar":
						$botones_formulario = '<button id="btn_nuevo_tc_cta_cobrar" type="button" class="btn btn-secondary btn-sm btn_nuevo_tc_cta_cobrar" data-toggle="modal">+ Nuevo</button>';
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