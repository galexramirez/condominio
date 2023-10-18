<?php
class logico
{
	var $modulo = "ajuste_condominio";

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

}