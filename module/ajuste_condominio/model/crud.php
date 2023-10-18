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
		$Instancia = new c_conexiones_bd();
		$this->conexion=$Instancia->Conectar(); 	
	}

	function select_categoria($tabla,$tc_ficha,$tc_categoria1)
	{
		$consulta="SELECT `$tabla`.`tc_categoria2` AS `Detalle` FROM `$tabla` WHERE `$tabla`.`tc_ficha` = '$tc_ficha' AND `$tabla`.`tc_categoria1`= '$tc_categoria1' ORDER BY`Detalle` ASC";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();        
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		return $data;

		$this->conexion=null;
	}

	function leer_tc_condominio()
	{
        $consulta="SELECT * FROM `tc_condominio`";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   
		 
	function crear_tc_condominio($tc_condominio_id,$tc_ficha,$tc_categoria1,$tc_categoria2)
	{
		$consulta = "INSERT INTO `tc_condominio`(`tc_ficha`, `tc_categoria1`, `tc_categoria2`) VALUES ('$tc_ficha','$tc_categoria1','$tc_categoria2')";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta = "SELECT * FROM `tc_condominio`";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  	
	
	function editar_tc_condominio($tc_condominio_id,$tc_ficha,$tc_categoria1,$tc_categoria2)
	{
		$consulta = "UPDATE `tc_condominio` SET `tc_ficha`='$tc_ficha',`tc_categoria1`='$tc_categoria1',`tc_categoria2`='$tc_categoria2' WHERE `tc_condominio_id`='$tc_condominio_id'";		
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta= "SELECT * FROM `tc_condominio` WHERE `tc_condominio_id` ='$tc_condominio_id'";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
		print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  		
	
	function borrar_tc_condominio($tc_condominio_id)
	{
		$consulta = "DELETE FROM `tc_condominio` WHERE `tc_condominio_id`='$tc_condominio_id'";		
  		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
        $this->conexion=null;	
	}  		

	function leer_tc_cta_pagar()
	{
        $consulta="SELECT * FROM `tc_cta_pagar`";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   
		 
	function crear_tc_cta_pagar($tc_cta_pagar_id,$tc_ficha,$tc_categoria1,$tc_categoria2)
	{
		$consulta = "INSERT INTO `tc_cta_pagar`(`tc_ficha`, `tc_categoria1`, `tc_categoria2`) VALUES ('$tc_ficha','$tc_categoria1','$tc_categoria2')";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta = "SELECT * FROM `tc_cta_pagar`";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
		print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  	
	
	function editar_tc_cta_pagar($tc_cta_pagar_id,$tc_ficha,$tc_categoria1,$tc_categoria2)
	{
		$consulta = "UPDATE `tc_cta_pagar` SET `tc_ficha`='$tc_ficha',`tc_categoria1`='$tc_categoria1',`tc_categoria2`='$tc_categoria2' WHERE `tc_cta_pagar_id`='$tc_cta_pagar_id'";		
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta= "SELECT * FROM `tc_cta_pagar` WHERE `tc_cta_pagar_id` ='$tc_cta_pagar_id'";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
		print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  		
	
	function borrar_tc_cta_pagar($tc_cta_pagar_id)
	{
		$consulta = "DELETE FROM `tc_cta_pagar` WHERE `tc_cta_pagar_id`='$tc_cta_pagar_id'";		
  		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
        $this->conexion=null;	
	}  		

	function leer_tc_cta_cobrar()
	{
        $consulta="SELECT * FROM `tc_cta_cobrar`";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   
		 
	function crear_tc_cta_cobrar($tc_cta_cobrar_id,$tc_ficha,$tc_categoria1,$tc_categoria2)
	{
		$consulta = "INSERT INTO `tc_cta_cobrar`(`tc_ficha`, `tc_categoria1`, `tc_categoria2`) VALUES ('$tc_ficha','$tc_categoria1','$tc_categoria2')";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta = "SELECT * FROM `tc_cta_cobrar`";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
		print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  	
	
	function editar_tc_cta_cobrar($tc_cta_cobrar_id,$tc_ficha,$tc_categoria1,$tc_categoria2)
	{
		$consulta = "UPDATE `tc_cta_cobrar` SET `tc_ficha`='$tc_ficha',`tc_categoria1`='$tc_categoria1',`tc_categoria2`='$tc_categoria2' WHERE `tc_cta_cobrar_id`='$tc_cta_cobrar_id'";		
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta= "SELECT * FROM `tc_cta_cobrar` WHERE `tc_cta_cobrar_id` ='$tc_cta_cobrar_id'";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
		print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  		
	
	function borrar_tc_cta_cobrar($tc_cta_cobrar_id)
	{
		$consulta = "DELETE FROM `tc_cta_cobrar` WHERE `tc_cta_cobrar_id`='$tc_cta_cobrar_id'";		
  		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
        $this->conexion=null;	
	}

}