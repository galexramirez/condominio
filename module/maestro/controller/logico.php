<?php
class logico
{
	var $modulo = "maestro";
	// 1.0 CARGA DATOS DE BUSQUEDA DE PILOTO
	function Contenido($NombreDeModuloVista)    
	{		
		MView($this->modulo,'local_view',compact('NombreDeModuloVista') );
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

	public function buscar_data_bd($tabla_bd, $campo_bd, $data_buscar)
    {
        MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd, $campo_bd, $data_buscar);

        print json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

}