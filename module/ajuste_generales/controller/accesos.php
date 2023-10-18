<?php
class accesos
{
	var $modulo = "ajuste_generales";

	public function creacion_tab($nombre_tab,$tipo_tab)    
	{		
		$tab_html = '';
		switch($nombre_tab)
		{
			case "nav-tab-ajuste_generales":
				$tab_html = '	<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Roles de Usuario</a>
								<a class="nav-item nav-link" id="nav-tipo_cambio-tab" data-toggle="tab" href="#nav-tipo_cambio" role="tab" aria-controls="nav-tipo_cambio" aria-selected="false">Tipo de Cambio</a>
								<a class="nav-item nav-link" id="nav-modulo-tab" data-toggle="tab" href="#nav-modulo" role="tab" aria-controls="nav-modulo" aria-selected="false">Modulos</a>
								<a class="nav-item nav-link" id="nav-permisos-tab" data-toggle="tab" href="#nav-permisos" role="tab" aria-controls="nav-permisos" aria-selected="false">Permisos</a>
								<a class="nav-item nav-link" id="nav-objeto-tab" data-toggle="tab" href="#nav-objeto" role="tab" aria-controls="nav-objeto" aria-selected="false">Objetos</a>
								<a class="nav-item nav-link" id="nav-control_acceso-tab" data-toggle="tab" href="#nav-control_acceso" role="tab" aria-controls="nav-control_acceso" aria-selected="false">Control de Accesos</a>
								<a class="nav-item nav-link" id="nav-tc_maestro-tab" data-toggle="tab" href="#nav-tc_maestro" role="tab" aria-controls="nav-tc_maestro" aria-selected="false">Maestro</a>
								<a class="nav-item nav-link" id="nav-tc_usuario-tab" data-toggle="tab" href="#nav-tc_usuario" role="tab" aria-controls="nav-tc_usuario" aria-selected="false">Usuario</a>';
			break;
		}
		echo $tab_html;
	}
	
    public function creacion_tabla($nombre_tabla,$_tipo_tabla)
    {
		$tabla_html = "";
        switch ($nombre_tabla) 
		{
            case "tabla_roles":
                $tabla_html = '<table id="tabla_roles" class="table table-striped table-bordered table-condensed w-80">
									<thead class="text-center">
										<tr>
											<th>ID</th>
											<th>NRO.DNI</th>
											<th>APELLIDOS_Y_NOMBRE</th>
											<th>NOMBRE_CORTO</th>
											<th>PERFIL</th>
											<th>ACCIONES</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>';
            break;

			case "tabla_objeto":
                $tabla_html = '	<table id="tabla_objeto" class="table table-striped table-bordered table-condensed w-80">
									<thead class="text-center">
										<tr>
											<th>ID</th>
											<th>MODULO</th>
											<th>OBJETOS</th>
											<th>DESCRIPCION</th>
											<th>ACCIONES</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>';
            break;

			case "tabla_control_acceso":
				$tabla_html = '	<table id="tabla_control_acceso" class="table table-striped table-bordered table-condensed w-80">
									<thead class="text-center">
										<tr>
											<th>ID</th>
											<th>PERFIL</th>
											<th>MODULO</th>
											<th>OBJETO</th>
											<th>ACCESO</th>
											<th>ACCIONES</th>
										</tr>
									</thead>
									<tbody>                           
									</tbody>
								</table>';
			break;

			case "tabla_tc_maestro":
                $tabla_html = '	<table id="tabla_tc_maestro" class="table table-striped table-bordered table-condensed w-80">
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

			case "tabla_tc_usuario":
                $tabla_html = '	<table id="tabla_tc_usuario" class="table table-striped table-bordered table-condensed w-80">
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

			case "tabla_modulo":
                $tabla_html = '<table id="tabla_modulo" class="table table-striped table-bordered table-condensed w-80">
									<thead class="text-center">
										<tr>
											<th>ID</th>
											<th>NOMBRE_MODULO</th>
											<th>NOMBRE_DE_VISTA</th>
											<th>ICONO</th>
											<th>ACCIONES</th>
										</tr>
									</thead>
									<tbody>                           
									</tbody>
								</table>';
            break;

			case "tabla_permisos":
				$tabla_html = '<table id="tabla_permisos" class="table table-striped table-bordered table-condensed w-80">
									<thead class="text-center">
										<tr>
											<th>ID</th>
											<th>NOMBRE_DE_USUARIO</th>
											<th>NOMBRE_DE_MODULO</th>
											<th>NIVEL_DE_ACCESO</th>
											<th>MODULO_DE_INICIO</th>
											<th>ACCIONES</th>
										</tr>
									</thead>
									<tbody>                           
									</tbody>
								</table>';
			break;

			case "tabla_tipo_cambio":
				$tabla_html = '<table id="tabla_tipo_cambio" class="table table-striped table-bordered table-condensed w-80">
									<thead class="text-center">
										<tr>
											<th>NRO.ID</th>
											<th>FECHA</th>
											<th>MONEDA</th>
											<th>TIPO</th>
											<th>VALOR</th>
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
            case "tabla_roles":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btn_editar_roles'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button class='btn btn-danger btn-sm btn_borrar_roles'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "roles_id"},
                    				{"data": "roles_dni"},
                    				{"data": "roles_apellidos_nombres"},
                    				{"data": "roles_nombre_corto"},
                    				{"data": "roles_perfil"},
                    				{"defaultContent": " '.$defaultContent1.' "}
                  				]';
			break;

			case "tabla_objeto":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button title='Editar' class='btn btn-primary btn-sm btn_editar_objeto'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button title='Borrar' class='btn btn-danger btn-sm btn_borrar_objeto'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "objeto_id"},
									{"data": "obj_nombre_modulo"},
									{"data": "obj_nombre_objeto"},
									{"data": "obj_descripcion"},
									{"defaultContent": " '.$defaultContent1.' "}
								]';
			break;

			case "tabla_control_acceso":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btn_editar_control_acceso'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button class='btn btn-danger btn-sm btn_borrar_control_acceso'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "control_acceso_id"},
                    				{"data": "cacces_perfil"},
                    				{"data": "cacces_nombre_modulo"},
                    				{"data": "cacces_nombre_objeto"},
                    				{"data": "cacces_acceso"},
                    				{"defaultContent": " '.$defaultContent1.' "}
                  				]';
			break;

			case "tabla_tc_maestro":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button title='Editar' class='btn btn-primary btn-sm btn_editar_tc_maestro'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button title='Borrar' class='btn btn-danger btn-sm btn_borrar_tc_maestro'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "tc_maestro_id"},
									{"data": "tc_ficha"},
									{"data": "tc_categoria1"},
									{"data": "tc_categoria2"},
									{"defaultContent": " '.$defaultContent1.' "}
								]';
			break;

			case "tabla_tc_usuario":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button title='Editar' class='btn btn-primary btn-sm btn_editar_tc_usuario'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button title='Borrar' class='btn btn-danger btn-sm btn_borrar_tc_usuario'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '[	{"data": "tc_usuario_id"},
									{"data": "tc_ficha"},
									{"data": "tc_categoria1"},
									{"data": "tc_categoria2"},
									{"defaultContent": " '.$defaultContent1.' "}
								]';
			break;

			case "tabla_modulo":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btn_editar_modulo'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button class='btn btn-danger btn-sm btn_borrar_modulo'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '	[	{"data": "modulo_id"},
                    					{"data": "mod_nombre"},
                    					{"data": "mod_nombre_vista"},
                    					{"data": "mod_icono"},
                    					{"defaultContent": " '.$defaultContent1.' "}
                  					]';
			break;

			case "tabla_permisos":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btn_editar_permisos'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button class='btn btn-danger btn-sm btn_borrar_permisos'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '	[	{"data": "permiso_id"},
                    					{"data": "per_usuario_id"},
                    					{"data": "per_modulo_id"},
                    					{"data": "per_nivel"},
                    					{"data": "per_modulo_inicio"},
                    					{"defaultContent": " '.$defaultContent1.' "}
                  					]';
			break;

			case "tabla_tipo_cambio":
				$defaultContent1 = "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btn_editar_tipo_cambio'><i class='bi bi-pencil'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'><path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/></svg></i></button><button class='btn btn-danger btn-sm btn_borrar_tipo_cambio'><i class='bi bi-trash'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg></i></button></div></div>";
				$columnas_html = '	[	{"data": "tipo_cambio_id"},
                    					{"data": "tcam_fecha"},
                    					{"data": "tcam_moneda"},
                    					{"data": "tcam_tipo"},
                    					{"data": "tcam_valor"},
                    					{"defaultContent": " '.$defaultContent1.' "}
                  					]';
			break;

			case "":
				$defaultContent1 = "";
				$columnas_html = '';
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
			case "form_seleccion_roles":
				switch($nombre_objeto)
				{
					case "btn_seleccion_roles":
						$botones_formulario = '<button id="btn_nuevo_roles" type="button" class="btn btn-secondary btn-sm btn_nuevo_roles" data-toggle="modal">+ Nuevo</button>';
					break;
				}
			break;
			case "form_seleccion_modulo":
				switch($nombre_objeto)
				{
					case "btn_seleccion_modulo":
						$botones_formulario = '<button id="btn_nuevo_modulo" type="button" class="btn btn-secondary btn-sm btn_nuevo_modulo" data-toggle="modal">+ Nuevo</button>';
					break;
				}
			break;
			case "form_seleccion_permisos":
				switch($nombre_objeto)
				{
					case "btn_seleccion_permisos":
						$botones_formulario = '<button id="btn_nuevo_permisos" type="button" class="btn btn-secondary btn-sm btn_nuevo_permisos" data-toggle="modal">+ Nuevo</button>';
					break;
				}
			break;

			case "form_seleccion_objeto":
				switch($nombre_objeto)
				{
					case "btn_seleccion_objeto":
						$botones_formulario = '<button id="btn_nuevo_objeto" type="button" class="btn btn-secondary btn-sm btn_nuevo_objeto" data-toggle="modal">+ Nuevo</button>';
					break;
				}
			break;

			case "form_seleccion_control_acceso":
				switch($nombre_objeto)
				{
					case "btn_seleccion_control_acceso":
						$botones_formulario = '<button id="btn_nuevo_control_acceso" type="button" class="btn btn-secondary btn-sm btn_nuevo_control_acceso" data-toggle="modal">+ Nuevo</button>';
					break;
				}
			break;

			case "form_seleccion_tc_maestro":
				switch($nombre_objeto)
				{
					case "btn_seleccion_tc_maestro":
						$botones_formulario = '<button id="btn_nuevo_tc_maestro" type="button" class="btn btn-secondary btn-sm btn_nuevo_tc_maestro" data-toggle="modal">+ Nuevo</button>';
					break;
				}
			break;

			case "form_seleccion_tc_usuario":
				switch($nombre_objeto)
				{
					case "btn_seleccion_tc_usuario":
						$botones_formulario = '<button id="btn_nuevo_tc_usuario" type="button" class="btn btn-secondary btn-sm btn_nuevo_tc_usuario" data-toggle="modal">+ Nuevo</button>';
					break;
				}
			break;

			case "form_seleccion_tipo_cambio":
				switch($nombre_objeto)
				{
					case "btn_seleccion_tipo_cambio":
						$botones_formulario = '	<button id="btn_nuevo_tipo_cambio" type="button" class="btn btn-secondary btn-sm btn_nuevo_tipo_cambio" data-toggle="modal">+ Nuevo</button>'; 
						$botones_formulario .='	<button id="btn_importar_tipo_cambio" type="button" class="btn btn-secondary btn-sm btn_importar_tipo_cambio" data-toggle="modal">Importar</button>';
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