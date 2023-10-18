<?php
class accesos
{
	var $modulo="ajuste_usuario";

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
            case "":
                $tabla_html = '';
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
            case "":
				$defaultContent = "";
				$columnas_html = '';
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
			case "":
				switch($nombre_objeto)
				{
					case "":
						$botones_formulario = '';
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
			case "form_ajuste_usuario":
				switch($nombre_objeto)
				{
					case "btn_ajuste_usuario":
						$btn_cancelar = '<button type="button" id="btn_cancelar_ajuste_usuario" class="btn btn-light btn-sm btn_cancelar_ajuste_usuario">Cancelar</button>';
						$btn_editar = '<button type="button" id="btn_editar_ajuste_usuario" class="btn btn-secondary btn-sm btn_editar_ajuste_usuario">Editar</button>';
						$btn_guardar = '<button type="submit" id="btn_guardar_ajuste_usuario" class="btn btn-dark btn-sm btn_guardar_ajuste_usuario">Guardar</button>';
						$mostrar_div = $btn_cancelar;
						switch($dato1)
						{
							case "editar":
								$mostrar_div .= $btn_editar;
							break;

							case "guardar":
								$mostrar_div .= $btn_guardar;
							break;

						}
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