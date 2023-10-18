<?php
class logico
{
	var $modulo = "ajuste_usuario";
	// 1.0 CARGA DATOS DE BUSQUEDA DE PILOTO
	function Contenido($NombreDeModuloVista)    
	{		
		MView($this->modulo,'local_view',compact('NombreDeModuloVista') );
	}
}