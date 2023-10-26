<?php
session_start();
class crud
{	
	var $conexion;
	var $objeto;

	function __construct()
	{
		if (!isset($_SESSION['USUARIO_ID'])){         
			session_destroy();
			echo '<script>window.location.href = "log_out";</script>';  
			exit();
		}
	
		SController('conexiones_bd','c_conexion_bd');
		$instancia = new c_conexiones_bd();
		$this->conexion = $instancia->Conectar(); 	
	}

	function buscar_data_bd($tabla_bd, $campo_bd, $data_buscar)
	{
		$consulta = "SELECT * FROM `$tabla_bd` WHERE `$campo_bd` = '$data_buscar'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

		return $data;
		$this->conexion=null;
	}

	function leer_usuario()
	{
        $consulta="SELECT * FROM `glo_usuario`";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   
		 
	function crear_usuario($usuario_id,$usua_nombres,$usua_nombre_corto,$usua_usuario_web,$usua_password,$usua_perfil,$usua_estado)
	{
		$usua_password = MD5($usua_password);
		$consulta = "INSERT INTO `glo_usuario`(`usuario_id`, `usua_nombres`, `usua_nombre_corto`, `usua_usuario_web`, `usua_password`, `usua_perfil`, `usua_estado`)
					 VALUES ('$usuario_id','$usua_nombres','$usua_nombre_corto','$usua_usuario_web','$usua_password','$usua_perfil','$usua_estado')";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		
		$consulta= "SELECT * FROM `glo_usuario` WHERE `usuario_id` ='$usuario_id'";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  	
	
	function editar_usuario($usuario_id,$usua_nombres,$usua_nombre_corto,$usua_usuario_web,$usua_password,$usua_perfil,$usua_estado)
	{
		$consulta= "SELECT `usua_password` FROM `glo_usuario` WHERE `usuario_id` ='$usuario_id'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		
		foreach($data as $row){
			$password = $row['usua_password'];
		}
		if($usua_password!==$password){
			$usua_password=MD5($usua_password);
		}        
		
		$consulta = "UPDATE `glo_usuario` SET `usua_nombres`='$usua_nombres',`usua_nombre_corto`='$usua_nombre_corto',`usua_usuario_web`='$usua_usuario_web',`usua_password`='$usua_password',`usua_perfil`='$usua_perfil',`usua_estado`='$usua_estado' WHERE `usuario_id`='$usuario_id'";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		
		$consulta= "SELECT * FROM `glo_usuario` WHERE `usuario_id` ='$usuario_id'";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  		
	
	function borrar_usuario($usuario_id)
	{
		$consulta = "DELETE FROM `glo_usuario` WHERE `usuario_id`='$usuario_id'";		
  		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
        $this->conexion=null;	
	}  		

	function select_categoria($tabla, $tc_categoria1, $tc_categoria2)
	{
		$consulta="SELECT `$tabla`.`tc_categoria3` AS `Detalle` FROM `$tabla` WHERE `$tabla`.`tc_categoria1` = '$tc_categoria1' AND `$tabla`.`tc_categoria2`= '$tc_categoria2' ORDER BY`Detalle` ASC";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();        
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		return $data;

		$this->conexion=null;
	}
}