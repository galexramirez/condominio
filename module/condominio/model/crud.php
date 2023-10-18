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

	function select_nombre_corto($roles_perfil)
	{
		if(!empty($roles_perfil)){
			$consulta="SELECT `glo_roles`.`roles_nombre_corto` AS `nombre_corto` FROM `glo_roles` WHERE `roles_perfil` = '$roles_perfil' ORDER BY `nombre_corto` ASC";
		}else{
			$consulta="SELECT `glo_roles`.`roles_nombre_corto` AS `nombre_corto` FROM `glo_roles` ORDER BY `nombre_corto` ASC";
		}

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();        
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		return $data;

		$this->conexion=null;
	}

	function buscar_data_bd($tabla_bd,$campo_bd,$data_buscar)
	{
		$consulta = "SELECT * FROM `$tabla_bd` WHERE `$campo_bd` = '$data_buscar'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

		return $data;
		$this->conexion=null;
	}

	function max_id($tabla_bd,$campo_id)
	{
		$consulta = "SELECT MAX(`$campo_id`) AS `max_id` FROM `$tabla_bd`";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();        

		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		
		return $data;
		$this->conexion=null;
	}

	function permisos($cacces_nombre_modulo,$cacces_nombre_objeto)
	{
		$rpta_permisos 		= "";
		$cacces_modulo_id 	= "";
		$cacces_objeto_id 	= "";
		$cacces_perfil 		= $_SESSION['USU_PERFIL'];

		$consulta = "SELECT * FROM `glo_modulo` WHERE `glo_modulo`.`mod_nombre` = '$cacces_nombre_modulo'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $row){
			$cacces_modulo_id = $row['modulo_id'];
		}

		$consulta = "SELECT * FROM `glo_objetos` WHERE `glo_objetos`.`obj_nombre_objeto` = '$cacces_nombre_objeto'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $row){
			$cacces_objeto_id = $row['objetos_id'];
		}

		$consulta = "SELECT * FROM `glo_control_acceso` WHERE `cacces_perfil` = '$cacces_perfil' AND `cacces_modulo_id` = '$cacces_modulo_id' AND `cacces_objeto_id` = '$cacces_objeto_id'";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
		
		foreach($data as $row){
			$rpta_permisos = $row['cacces_acceso'];
		}
		return $rpta_permisos;
		$this->conexion=null;
	}

	function leer_condominio()
	{
        $consulta = "SELECT * FROM `condominio`";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   

	function crear_condominio($cond_tipo, $cond_nombre, $cond_edificio, $cond_dpto, $cond_puerta, $cond_estacionamiento, $cond_direccion, $cond_distrito, $cond_estado)
	{
		$cond_fecha = date("Y-m-d H:m:i");
		$cond_usuario_id = $_SESSION['USUARIO_ID'];
		$nombre_usuario = $_SESSION['USUA_NOMBRECORTO'];
		$cond_log = "<strong>".$cond_estado."</strong> ".$cond_fecha." ".$nombre_usuario." : CREACION";
		
		$consulta = "INSERT INTO `condominio`(`cond_tipo`,	`cond_nombre`, `cond_edificio`,	`cond_dpto`, `cond_puerta`, `cond_estacionamiento`, `cond_direccion`, `cond_distrito`, `cond_estado`, `cond_fecha`, `cond_usuario_id`, `cond_log`) VALUES ('$cond_tipo', '$cond_nombre', '$cond_edificio', '$cond_dpto', '$cond_puerta', '$cond_estacionamiento', '$cond_direccion', '$cond_distrito', '$cond_estado', '$cond_fecha', '$cond_usuario_id', '$cond_log')";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		
		$this->conexion=null;
	}

	function editar_condominio($condominio_id, $cond_tipo, $cond_nombre, $cond_edificio, $cond_dpto, $cond_puerta, $cond_estacionamiento, $cond_direccion, $cond_distrito, $cond_estado)
	{
		$consulta = "SELECT * FROM `condominio` WHERE `condominio_id`='$condominio_id'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $row){
			$cond_log1 = $row['cond_log'];
		}
		
		$consulta = "";
		$cond_fecha = date("Y-m-d H:m:i");
		$nombre_usuario = $_SESSION['USUA_NOMBRECORTO'];
		$cond_log = "<strong>".$cond_estado."</strong> ".$cond_fecha." ".$nombre_usuario." : EDICION <br>".$cond_log1;

		$consulta = "UPDATE `condominio` SET `condominio_id` = '$condominio_id', `cond_tipo` = '$cond_tipo', `cond_nombre` = '$cond_nombre', `cond_edificio` = '$cond_edificio', `cond_dpto` = '$cond_dpto', `cond_puerta` = '$cond_puerta', `cond_estacionamiento` = '$cond_estacionamiento', `cond_direccion` = '$cond_direccion', `cond_distrito` = '$cond_distrito', `cond_log` = '$cond_log' WHERE `condominio_id` = '$condominio_id'";		
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

        $this->conexion=null;	
	}  		
	
	function borrar_condominio($condominio_id)
	{
		$consulta = "DELETE FROM `condominio` WHERE `condominio_id`='$condominio_id'";		
  		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
        $this->conexion=null;	
	}  		

	function leer_puerta($condominio_id)
	{
        $consulta = " SELECT * FROM `puerta` WHERE `pta_condominio_id`='$condominio_id' ";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   

	function crear_puerta($condominio_id, $pta_nombre, $pta_direccion)
	{
        $consulta = "INSERT INTO `puerta`(`pta_condominio_id`,`pta_nombre`,`pta_direccion`) VALUES ('$condominio_id','$pta_nombre','$pta_direccion')";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        

		$this->conexion=null;
	}

	function borrar_puerta($condominio_id)
	{
		$consulta = "DELETE FROM `puerta` WHERE `pta_condominio_id`='$condominio_id' ";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        

		$this->conexion=null;
	}

	function select_condominio()
	{
        $consulta = "SELECT `cond_nombre` AS `condominio_nombre` FROM `condominio`";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $data;
        $this->conexion=null;
   	}   

	function existe_edificio($edificio_id, $edi_condominio_id)
	{
		$valida = 0;
		$consulta = "SELECT * FROM `edificio` WHERE `edificio_id`='$edificio_id' AND `edi_condominio_id`='$edi_condominio_id'";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
		$valida = $resultado->rowCount();
		
		if($valida==0){
			return false;
		}else{
			return true;
		}

		$this->conexion=null;
	}

	function leer_edificio()
	{
        $consulta = "SELECT *, `condominio`.`cond_nombre` AS `edi_condominio_nombre` FROM `edificio` LEFT JOIN `condominio` ON `condominio`.`condominio_id`=`edificio`.`edi_condominio_id`";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   

	function crear_edificio($edificio_id, $edi_descripcion, $edi_condominio_id,  $edi_piso, $edi_dpto, $edi_estado)
	{
		$edi_fecha = date("Y-m-d H:m:i");
		$edi_usuario_id = $_SESSION['USUARIO_ID'];
		$nombre_usuario = $_SESSION['USUA_NOMBRECORTO'];
		$edi_log = "<strong>".$edi_estado."</strong> ".$edi_fecha." ".$nombre_usuario." : CREACION";
		
		$consulta = "INSERT INTO `edificio`(`edificio_id`,	`edi_descripcion`, `edi_condominio_id`,	`edi_piso`, `edi_dpto`, `edi_estado`, `edi_fecha`, `edi_usuario_id`, `edi_log`) VALUES ('$edificio_id', '$edi_descripcion', '$edi_condominio_id',  '$edi_piso', '$edi_dpto', '$edi_estado', '$edi_fecha', '$edi_usuario_id', '$edi_log')";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		
		$this->conexion=null;
	}

	function editar_edificio($edificio_id, $edi_descripcion, $edi_condominio_id,  $edi_piso, $edi_dpto, $edi_estado)
	{
		$consulta = "SELECT * FROM `edificio` WHERE `edificio_id`='$edificio_id' AND `edi_condominio_id`='$edi_condominio_id'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $row){
			$edi_log1 = $row['edi_log'];
		}
		
		$consulta = "";
		$edi_fecha = date("Y-m-d H:m:i");
		$nombre_usuario = $_SESSION['USUA_NOMBRECORTO'];
		$edi_log = "<strong>".$edi_estado."</strong> ".$edi_fecha." ".$nombre_usuario." : EDICION <br>".$edi_log1;
		
		$consulta = "UPDATE `edificio` SET `edi_descripcion`='$edi_descripcion', `edi_piso`='$edi_piso', `edi_dpto`='$edi_dpto', `edi_estado`='$edi_estado', `edi_log`='$edi_log' WHERE `edificio_id`='$edificio_id' AND `edi_condominio_id`='$edi_condominio_id'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		
		$this->conexion=null;
	}

	function borrar_edificio($edificio_id, $edi_condominio_id)
	{
		$consulta = "DELETE FROM `edificio` WHERE `edificio_id`='$edificio_id' AND `edi_condominio_id`='$edi_condominio_id'";		
  		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
        $this->conexion=null;	
	}  		

	function select_edificio($condominio_id)
	{
        $consulta = "SELECT `edi_descripcion` AS `edificio_descripcion` FROM `edificio` WHERE `edi_condominio_id`='$condominio_id'";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $data;
        $this->conexion=null;
   	}   

	function existe_departamento($departamento_id, $dpto_condominio_id, $dpto_edificio_id)
	{
		$valida = 0;
		$consulta = "SELECT * FROM `departamento` WHERE `departamento_id`='$departamento_id' AND `dpto_edificio_id`='$dpto_edificio_id' AND `dpto_condominio_id`='$dpto_condominio_id'";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
		$valida = $resultado->rowCount();
		
		if($valida==0){
			return false;
		}else{
			return true;
		}

		$this->conexion=null;
	}

	function leer_departamento()
	{
        $consulta = "SELECT *, `condominio`.`cond_nombre` AS `dpto_condominio_nombre`, `edificio`.`edi_descripcion` AS `dpto_edificio_descripcion` FROM `departamento` LEFT JOIN `condominio` ON `condominio`.`condominio_id`=`departamento`.`dpto_condominio_id` LEFT JOIN `edificio` ON `edificio`.`edificio_id`=`departamento`.`dpto_edificio_id` AND `edificio`.`edi_condominio_id`=`departamento`.`dpto_condominio_id`";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   

	function crear_departamento($departamento_id, $dpto_descripcion, $dpto_condominio_id, $dpto_edificio_id, $dpto_piso, $dpto_dimensiones, $dpto_estado)
	{
		$dpto_fecha = date("Y-m-d H:m:i");
		$dpto_usuario_id = $_SESSION['USUARIO_ID'];
		$nombre_usuario = $_SESSION['USUA_NOMBRECORTO'];
		$dpto_log = "<strong>".$dpto_estado."</strong> ".$dpto_fecha." ".$nombre_usuario." : CREACION";
		
		$consulta = "INSERT INTO `departamento`	(`departamento_id`,	`dpto_condominio_id`, `dpto_edificio_id`, `dpto_descripcion`, `dpto_piso`, `dpto_dimensiones`, `dpto_estado`, `dpto_fecha`, `dpto_usuario_id`, `dpto_log`) VALUES ('$departamento_id', '$dpto_condominio_id', '$dpto_edificio_id', '$dpto_descripcion', '$dpto_piso', '$dpto_dimensiones', '$dpto_estado', '$dpto_fecha', '$dpto_usuario_id', '$dpto_log')";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		
		$this->conexion=null;
	}

	function editar_departamento($departamento_id, $dpto_descripcion, $dpto_condominio_id, $dpto_edificio_id, $dpto_piso, $dpto_dimensiones, $dpto_estado)
	{
		$consulta = "SELECT * FROM `departamento` WHERE `departamento_id`='$departamento_id'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $row){
			$dpto_log1 = $row['dpto_log'];
		}
		
		$consulta = "";
		$dpto_fecha = date("Y-m-d H:m:i");
		$nombre_usuario = $_SESSION['USUA_NOMBRECORTO'];
		$dpto_log = "<strong>".$dpto_estado."</strong> ".$dpto_fecha." ".$nombre_usuario." : EDICION <br> ".$dpto_log1;
		
		$consulta = "UPDATE `departamento` SET `dpto_descripcion`='$dpto_descripcion', `dpto_piso`='$dpto_piso', `dpto_dimensiones`='$dpto_dimensiones', `dpto_estado`='$dpto_estado', `dpto_log`='$dpto_log' WHERE `departamento_id`='$departamento_id' AND `dpto_condominio_id`='$dpto_condominio_id' AND `dpto_edificio_id`='$dpto_edificio_id'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		
		$this->conexion=null;
	}

	function borrar_departamento($departamento_id, $dpto_condominio_id, $dpto_edificio_id)
	{
		$consulta = "DELETE FROM `departamento` WHERE `departamento_id`='$departamento_id' AND `dpto_edificio_id`='$dpto_edificio_id' AND `dpto_condominio_id`='$dpto_condominio_id'";		
  		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
        $this->conexion=null;	
	}  		

	function select_departamento($condominio_id, $edificio_id)
	{
        $consulta = "SELECT `departamento_id` FROM `departamento` WHERE `dpto_condominio_id`='$condominio_id' AND `dpto_edificio_id`='$edificio_id'";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $data;
        $this->conexion=null;
   	}   

	function select_residente($resi_condominio_id, $resi_edificio_id, $resi_dni, $resi_tipo, $resi_estado, $accion)
	{
		$where_edificio = "";
		$where_dni		= "";

		if($resi_edificio_id!=""){
			$where_edificio = "AND `resi_edificio_id`='".$resi_edificio_id."'";
		}

		if($resi_dni!=""){
			if($accion=="condominio"){
				$where_dni = " WHERE `resi_dni`='".$resi_dni."'";
			}else{
				$where_dni = " AND `resi_dni`='".$resi_dni."'";
			}
		}

		switch($accion)
		{
			case "nombre":
				$consulta = " SELECT (SELECT `roles_nombre_corto` FROM `glo_roles` WHERE `roles_dni`=`resi_dni` LIMIT 1) AS `detalle` FROM `residente` WHERE `resi_tipo`='$resi_tipo' AND `resi_estado`='$resi_estado' AND `resi_condominio_id`='$resi_condominio_id' ".$where_edificio;
			break;

			case "condominio":
				$consulta = " SELECT `condominio`.`cond_nombre` AS `detalle` FROM `residente` LEFT JOIN `condominio` ON `condominio_id` = `resi_condominio_id` ".$where_dni;
			break;

			case "edificio":
				$consulta = " SELECT DISTINCT `edificio`.`edi_descripcion` AS `detalle` FROM `residente` LEFT JOIN `edificio` ON `edificio_id` = `resi_edificio_id` WHERE `resi_tipo`='$resi_tipo' AND `resi_condominio_id`='$resi_condominio_id' ".$where_dni;
			break;

			case "departamento_edificio":
				$consulta = " SELECT `resi_departamento_id` AS `detalle` FROM `residente` WHERE `resi_dni`='$resi_dni' AND `resi_tipo`='$resi_tipo' AND `resi_condominio_id`='$resi_condominio_id' ".$where_edificio.$where_dni;
			break;

			case "departamento_condominio":
				$consulta = " SELECT `resi_departamento_id` AS `detalle` FROM `residente` WHERE `resi_tipo`='$resi_tipo' AND `resi_condominio_id`='$resi_condominio_id' ".$where_dni;
			break;		
		}

		$resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $data;
        $this->conexion=null;
   	}

	function existe_residente($resi_dni, $resi_condominio_id, $resi_edificio_id, $resi_departamento_id)
	{
		$valida = 0;
		$consulta = "SELECT * FROM `residente` WHERE `resi_dni`='$resi_dni' AND `resi_condominio_id`='$resi_condominio_id' AND `resi_edificio_id`='$resi_edificio_id' AND `departamento_id`='$resi_departamento_id'";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
		$valida = $resultado->rowCount();
		
		if($valida==0){
			return false;
		}else{
			return true;
		}

		$this->conexion=null;
	}

	function leer_residente()
	{
        $consulta = "SELECT *, (SELECT `glo_roles`.`roles_nombre_corto` FROM `glo_roles` WHERE `glo_roles`.`roles_dni`=`resi_dni` LIMIT 1) AS `resi_nombre`, `condominio`.`cond_nombre` AS `resi_condominio_nombre`, `edificio`.`edi_descripcion` AS `resi_edificio_descripcion` FROM `residente` LEFT JOIN `condominio` ON `condominio`.`condominio_id`=`residente`.`resi_condominio_id` LEFT JOIN `edificio` ON `edificio`.`edificio_id`=`residente`.`resi_edificio_id` AND `edificio`.`edi_condominio_id`=`residente`.`resi_condominio_id`";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   

	function crear_residente($resi_dni, $resi_condominio_id, $resi_edificio_id, $resi_departamento_id, $resi_tipo, $resi_fecha_inicio, $resi_fecha_fin, $resi_estado)
	{
	   	$resi_fecha = date("Y-m-d H:m:i");
	   	$resi_usuario_id = $_SESSION['USUARIO_ID'];
	   	$nombre_usuario = $_SESSION['USUA_NOMBRECORTO'];
	   	$resi_log = "<strong>".$resi_estado."</strong> ".$resi_fecha." ".$nombre_usuario." : CREACION";
	   
	   	$consulta = "INSERT INTO `residente`	(`resi_condominio_id`, `resi_edificio_id`, `resi_departamento_id`, `resi_dni`, `resi_tipo`, `resi_fecha_inicio`, `resi_fecha_fin`,`resi_estado`, `resi_fecha`, `resi_usuario_id`, `resi_log`) VALUES ('$resi_condominio_id', '$resi_edificio_id', '$resi_departamento_id', '$resi_dni', '$resi_tipo','$resi_fecha_inicio', $resi_fecha_fin, '$resi_estado', '$resi_fecha', '$resi_usuario_id', '$resi_log')";
	   	$resultado = $this->conexion->prepare($consulta);
	   	$resultado->execute();
	   
	   	$this->conexion=null;
	}
   
	function editar_residente($residente_id, $resi_tipo, $resi_fecha_inicio, $resi_fecha_fin, $resi_estado)
	{
		$consulta = "SELECT * FROM `residente` WHERE `residente_id`='$residente_id'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $row){
			$resi_log1 = $row['resi_log'];
		}
		
		$consulta = "";
		$resi_fecha = date("Y-m-d H:m:i");
	   	$nombre_usuario = $_SESSION['USUA_NOMBRECORTO'];
	   	$resi_log = "<strong>".$resi_estado."</strong> ".$resi_fecha." ".$nombre_usuario." : EDICION <br> ".$resi_log1;
	   
	   	$consulta = "UPDATE `residente` SET `resi_tipo`='$resi_tipo', `resi_fecha_inicio`='$resi_fecha_inicio', `resi_fecha_fin`=$resi_fecha_fin, `resi_estado`='$resi_estado', `resi_log`='$resi_log' WHERE `residente_id`='$residente_id'";
	   	$resultado = $this->conexion->prepare($consulta);
	   	$resultado->execute();
	   
	   $this->conexion=null;
	}
   
	function borrar_residente($residente_id)
	{
	   	$consulta = "DELETE FROM `residente` WHERE `residente_id`='$residente_id'";		
		$resultado = $this->conexion->prepare($consulta);
	   	$resultado->execute();   
	   	$this->conexion=null;	
	}  		
 
	function leer_directiva()
	{
        $consulta = "SELECT *, `condominio`.`cond_nombre` AS `dire_condominio_nombre`, `edificio`.`edi_descripcion` AS `dire_edificio_descripcion` FROM `directiva` LEFT JOIN `condominio` ON `condominio`.`condominio_id`=`directiva`.`dire_condominio_id` LEFT JOIN `edificio` ON `edificio`.`edificio_id`=`directiva`.`dire_edificio_id` AND `edificio`.`edi_condominio_id`=`directiva`.`dire_condominio_id`";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   

	function crear_directiva($dire_descripcion, $dire_condominio_id, $dire_edificio_id, $dire_tipo, $dire_fecha_inicio, $dire_fecha_fin, $dire_estado)
	{
		$dire_fecha = date("Y-m-d H:m:i");
		$dire_usuario_id = $_SESSION['USUARIO_ID'];
		$nombre_usuario = $_SESSION['USUA_NOMBRECORTO'];
		$dire_log = "<strong>".$dire_estado."</strong> ".$dire_fecha." ".$nombre_usuario." : CREACION";
		
		$consulta = " INSERT INTO `directiva` (`dire_descripcion`, `dire_condominio_id`, `dire_edificio_id`, `dire_tipo`, `dire_fecha_inicio`, `dire_fecha_fin`, `dire_estado`, `dire_fecha`, `dire_usuario_id`, `dire_log`) VALUES ('$dire_descripcion', '$dire_condominio_id', '$dire_edificio_id', '$dire_tipo', '$dire_fecha_inicio', '$dire_fecha_fin', '$dire_estado', '$dire_fecha', '$dire_usuario_id', '$dire_log') ";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		
		$this->conexion=null;
	}

	function editar_directiva($directiva_id, $dire_descripcion, $dire_condominio_id, $dire_edificio_id, $dire_tipo, $dire_fecha_inicio, $dire_fecha_fin, $dire_estado)
	{
		$consulta = "SELECT * FROM `directiva` WHERE `directiva_id`='$directiva_id'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $row){
			$dire_log1 = $row['dire_log'];
		}
		
		$consulta = "";
		$dire_fecha = date("Y-m-d H:m:i");
		$nombre_usuario = $_SESSION['USUA_NOMBRECORTO'];
		$dire_log = "<strong>".$dire_estado."</strong> ".$dire_fecha." ".$nombre_usuario." : EDICION <br>".$dire_log1;

		$consulta = " UPDATE `directiva` SET `directiva_id` = '$directiva_id', `dire_descripcion` = '$dire_descripcion', `dire_condominio_id` = '$dire_condominio_id', `dire_edificio_id` = '$dire_edificio_id', `dire_tipo` = '$dire_tipo', `dire_fecha_inicio` = '$dire_fecha_inicio', `dire_fecha_fin` = '$dire_fecha_fin', `dire_estado` = '$dire_estado', `dire_log` = '$dire_log' WHERE `directiva_id` = '$directiva_id' ";		
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

        $this->conexion=null;	
	}
	
	function borrar_directiva($directiva_id)
	{
		$consulta = "DELETE FROM `directiva` WHERE `directiva_id`='$directiva_id'";		
  		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
        $this->conexion=null;	
	}  		

	function leer_miembro($directiva_id)
	{
		 $consulta = "SELECT *,(SELECT `glo_roles`.`roles_nombre_corto` FROM `glo_roles` WHERE `glo_roles`.`roles_dni`=`dm_dni` LIMIT 1) AS `dm_miembro_nombre`, `condominio`.`cond_nombre` AS `dm_condominio_nombre`, `edificio`.`edi_descripcion` AS `dm_edificio_descripcion` FROM `directiva_miembro` LEFT JOIN `condominio` ON `condominio`.`condominio_id`=`directiva_miembro`.`dm_condominio_id` LEFT JOIN `edificio` ON `edificio`.`edificio_id`=`directiva_miembro`.`dm_edificio_id` AND `edificio`.`edi_condominio_id`=`directiva_miembro`.`dm_condominio_id` WHERE `dm_directiva_id`='$directiva_id'";
   
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();        
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
   
		print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
		$this->conexion=null;
	}

	function crear_miembro($dm_directiva_id, $dm_dni, $dm_condominio_id, $dm_edificio_id, $dm_departamento_id, $dm_cargo)
	{
        $consulta = " INSERT INTO `directiva_miembro` (`dm_directiva_id`, `dm_dni`, `dm_condominio_id`, `dm_edificio_id`, `dm_departamento_id`, `dm_cargo`) VALUES ('$dm_directiva_id', '$dm_dni', '$dm_condominio_id', '$dm_edificio_id', '$dm_departamento_id', '$dm_cargo') ";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        

		$this->conexion=null;
	}

	function borrar_miembro($dm_directiva_id)
	{
		$consulta = "DELETE FROM `directiva_miembro` WHERE `dm_directiva_id`='$dm_directiva_id' ";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        

		$this->conexion=null;
	}

}