<?php
class permisos_modulo 
{	
	var $conexion;
	var $consulta;
	var $resultado;
	var $objeto;
	var $data;
	var $cant;
	function __construct()
	{
		SController('conexiones_bd','c_conexion_bd');
		$instancia = new c_conexiones_bd();
		$this->conexion=$instancia->Conectar(); 	
	}

	function ListaModulos($usuario_id)
	{
			$this->consulta="SELECT (SELECT `mod_nombre` FROM `glo_modulo`  WHERE `modulo_id`=`per_modulo_id`) AS `mod_nombre`, `per_nivel`, `per_modulo_inicio` FROM `glo_permisos` WHERE `per_usuario_id`='$usuario_id'";

        $this->resultado = $this->conexion->prepare($this->consulta);
      	$this->resultado->execute();
      	$this->data = $this->resultado->fetchall(PDO::FETCH_ASSOC);
      	return $this->data;
    }    

}
