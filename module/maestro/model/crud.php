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

	function leer_maestro()
	{
        $consulta="SELECT `maestro_id`, `maes_apellidos_nombres`, `maes_nombre_corto`, `maes_cargo_actual`, `maes_estado`, DATE_FORMAT(`maes_fecha_ingreso`,'%Y-%m-%d') AS `maes_fecha_ingreso`, DATE_FORMAT(`maes_fecha_cese`,'%Y-%m-%d') AS `maes_fecha_cese`, `maes_email`, `maes_direccion`, `maes_distrito` FROM `glo_maestro`";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

		print json_encode($data, JSON_UNESCAPED_UNICODE);
        $this->conexion=null;
   	}   
		 
	function crear_maestro($maestro_id, $maes_apellidos_nombres, $maes_nombre_corto, $maes_cargo_actual, $maes_estado, $maes_fecha_ingreso, $maes_fecha_cese, $maes_email, $maes_direccion, $maes_distrito)
   	{
		$consulta = "INSERT INTO `glo_maestro`(`maestro_id`, `maes_apellidos_nombres`, `maes_cargo_actual`, `maes_estado`, `maes_fecha_ingreso`, `maes_fecha_cese`,`maes_email`, `maes_direccion`, `maes_distrito`, `maes_nombre_corto`) VALUES ('$maestro_id','$maes_apellidos_nombres','$maes_cargo_actual','$maes_estado','$maes_fecha_ingreso',$maes_fecha_cese,'$maes_email','$maes_direccion','$maes_distrito','$maes_nombre_corto')";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta = "INSERT INTO `glo_maestro_imagen`(`maestro_id`) VALUES ('$maestro_id')";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();

		$consulta= "SELECT * FROM glo_maestro WHERE maestro_id ='$maestro_id'";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
	}
	
	function editar_maestro($maestro_id, $maes_apellidos_nombres, $maes_nombre_corto, $maes_cargo_actual, $maes_estado, $maes_fecha_ingreso, $maes_fecha_cese, $maes_email, $maes_direccion, $maes_distrito)
   	{
		$consulta = "UPDATE `glo_maestro` SET `maestro_id`='$maestro_id',`maes_apellidos_nombres`='$maes_apellidos_nombres',`maes_cargo_actual`='$maes_cargo_actual',`maes_estado`='$maes_estado',`maes_fecha_ingreso`='$maes_fecha_ingreso',`maes_fecha_cese`=$maes_fecha_cese, `maes_email`='$maes_email', `maes_direccion`='$maes_direccion',`maes_distrito`='$maes_distrito',`maes_nombre_corto`='$maes_nombre_corto' WHERE `maestro_id`='$maestro_id'";		
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta= "SELECT * FROM glo_maestro WHERE maestro_id ='$maestro_id'";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  		
	
	function borrar_maestro($maestro_id)
   	{
		$consulta = "DELETE FROM `glo_maestro` WHERE `maestro_id`='$maestro_id'";		
  		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta = "DELETE FROM `glo_maestro_imagen` WHERE `maestro_id`='$maestro_id'";		
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$this->conexion=null;	
	}  		

	function fotografia_maestro($maestro_id)
	{
		$consulta="SELECT TO_BASE64(`maes_fotografia`) AS `b64_foto` FROM `glo_maestro_imagen` WHERE `maestro_id`='$maestro_id'";
  		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX

		$this->conexion=null;	
	}  		

	function grabar_fotografia($maestro_id,$maes_fotografia)
	{
		$consulta="UPDATE `glo_maestro_imagen` SET `maes_fotografia`= '$maes_fotografia' WHERE `maestro_id`='$maestro_id'";

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