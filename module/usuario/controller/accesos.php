<?php
class accesos
{
	var $modulo="usuario";

	public function creacion_tab($nombre_tab,$tipo_tab)    
	{		
		$tab_html = '';
		switch($nombre_tab)
		{
			case "":
				$tab_html = ' ';
			break;
		}
		echo $tab_html;
	}
	
    public function creacion_tabla($nombre_tabla,$tipo_tabla)
    {
		$tabla_html = "";
        switch ($nombre_tabla) 
		{
            case "tabla_usuario":
                $tabla_html = '	<table id="tabla_usuario" class="table table-striped table-bordered table-condensed w-80">
									<thead class="text-center">
										<tr>
											<th>ID</th>
											<th>APELLIDOS_Y_NOMBRES</th>
											<th>NOMBRE_CORTO</th>
											<th>USUARIO</th>
											<th>PASSWORD</th>
											<th>PERFIL</th>
											<th>ESTADO</th>
											<th>ACCIONES</th>
										</tr>
									</thead>
									<tbody>                           
									</tbody>
								</table>';
            break;

            case "":
                $tabla_html = ' ';
            break;

        }
		echo $tabla_html;
	}

	public function columnas_tabla($nombre_tabla,$tipo_tabla)
	{
		$columnas_html = "";
        switch ($nombre_tabla) 
		{
            case "tabla_usuario":
				$defaultContent = "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btn_editar'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button class='btn btn-danger btn-sm btn_borrar'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "usuario_id"},
                    				{"data": "usua_nombres"},
                    				{"data": "usua_nombre_corto"},
                    				{"data": "usua_usuario_web"},
                    				{"data": "usua_password"},
                    				{"data": "usua_perfil"},
                    				{"data": "usua_estado"},
                    				{"defaultContent": " '.$defaultContent.' "}
                  				]';
			break;

            case "":
				$columnas_html = ' ';	
            break;

			case "":
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
			case "form_seleccion_usuario":
				switch($nombre_objeto)
				{
					case "btn_seleccion_usuario":
						$botones_formulario = '<button id="btn_nuevo" type="button" class="btn btn-secondary btn-sm btn_nuevo" data-toggle="modal">+ Nuevo</button>';
					break;
				}
			break;
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