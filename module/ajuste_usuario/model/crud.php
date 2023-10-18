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

	function leer_ajuste_usuario()
	{
        $maestro_id = $_SESSION['USUARIO_ID'];
		$consulta = "SELECT * FROM `glo_maestro` LEFT JOIN `glo_usuario` ON `glo_usuario`.`usuario_id`=`glo_maestro`.`maestro_id` WHERE `maestro_id`='$maestro_id'";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

		print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   
		 
	function editar_ajuste_usuario($usua_password)
   	{
		$usuario_id = $_SESSION['USUARIO_ID'];
		$consulta = "SELECT `usua_password` FROM `glo_usuario` WHERE `usuario_id` ='$usuario_id'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

		foreach($data as $row){
			$password = $row['usua_password'];
		}

		if($usua_password !== $password){
			$usua_password = MD5($usua_password);
			$consulta = "UPDATE `glo_usuario` SET `usua_password`='$usua_password' WHERE `usuario_id`='$usuario_id'";		
			$resultado = $this->conexion->prepare($consulta);
			$resultado->execute();   
		}        

		$this->conexion=null;	
	}  		
	
	function buscar_fotografia()
	{
		$maestro_id = $_SESSION['USUARIO_ID'];
		$consulta = "SELECT TO_BASE64 (`maes_fotografia`) AS `b64_Foto` FROM `glo_maestro_imagen` WHERE `maestro_id`='$maestro_id'";
  		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		print json_encode($data, JSON_UNESCAPED_UNICODE);

		$this->conexion=null;	
	}  		

}