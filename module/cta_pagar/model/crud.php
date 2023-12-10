<?php
session_start();
class crud
{	
	var $conexion;
	var $objeto;

	function __construct()
	{
		if(!isset($_SESSION['USUARIO_ID'])){         
			session_destroy();
			echo '<script>window.location.href = "log_out";</script>';  
			exit();
		}
		SController('conexiones_bd','c_conexion_bd');
		$Instancia = new c_conexiones_bd();
		$this->conexion=$Instancia->Conectar(); 	
	}

	function select_categoria($tabla, $tc_variable, $tc_categoria1, $tc_categoria2)
	{
		$consulta="SELECT `$tabla`.`tc_categoria3` AS `Detalle` FROM `$tabla` WHERE `$tabla`.`tc_variable` = '$tc_variable' AND `$tabla`.`tc_categoria1` = '$tc_categoria1' AND `$tabla`.`tc_categoria2`= '$tc_categoria2' ORDER BY`Detalle` ASC";

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

	function buscar_bd($tabla, $c_where)
	{
		$consulta  ="SELECT * FROM `$tabla` WHERE ".$c_where;
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

		return $data;
		$this->conexion=null;
	}

	function buscar_dato($nombre_tabla, $campo_buscar, $condicion_where)
	{
		$consulta = "SELECT `$nombre_tabla`.`$campo_buscar` FROM `$nombre_tabla` WHERE ".$condicion_where;

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
		return $data;   
		$this->conexion=null;
	}

	function contar_dato($nombre_tabla, $campo_buscar, $condicion_where)
	{
		$consulta = "SELECT COUNT(`$nombre_tabla`.`$campo_buscar`) AS `cantidad` FROM `$nombre_tabla` WHERE ".$condicion_where;

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
		$cacces_perfil 		= $_SESSION['USUA_PERFIL'];

		$consulta = "SELECT * FROM `glo_modulo` WHERE `glo_modulo`.`mod_nombre` = '$cacces_nombre_modulo'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $row){
			$cacces_modulo_id = $row['modulo_id'];
		}

		$consulta = "SELECT * FROM `glo_objeto` WHERE `glo_objeto`.`obj_nombre_objeto` = '$cacces_nombre_objeto'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $row){
			$cacces_objeto_id = $row['objeto_id'];
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

	function select_combo($nombre_tabla, $es_campo_unico, $campo_select, $condicion_where, $order_by)
	{
		$distinct = "";
		$c_where = "";
		if($es_campo_unico == "SI"){
			$distinct = "DISTINCT";
		}
		if($condicion_where!=""){
			$c_where = "WHERE ".$condicion_where;
		}
		$consulta = "SELECT ".$distinct." `$nombre_tabla`.`$campo_select` AS `detalle` FROM `$nombre_tabla` ".$c_where." ORDER BY `$nombre_tabla`.`$campo_select` ".$order_by;
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
		return $data;   
		$this->conexion=null;
	}

	function select_roles($roles_perfil, $roles_campo)
	{
		$consulta = " 	SELECT 
							`glo_maestro`.`$roles_campo` AS `nombres` 
						FROM 
							`glo_roles` 
						RIGHT JOIN 
							`glo_maestro` 
						ON 
							`glo_maestro`.`maestro_id`= `glo_roles`.`roles_dni` AND 
							`glo_maestro`.`maes_estado`='ACTIVO' 
						WHERE 
							`glo_roles`.`roles_perfil` = '$roles_perfil'  
						ORDER BY 
							`nombres` ASC";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();        
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		return $data;

		$this->conexion=null;
	}

	function leer_listado_cta_pagar($fecha_inicio, $fecha_termino)
	{
        $consulta = "SELECT * FROM `doc_pagar` WHERE `dpag_fecha_documento`>='$fecha_inicio' AND `dpag_fecha_documento`<='$fecha_termino'";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);
        $this->conexion=null;
   	}   

	function leer_proveedor()
	{
        $consulta = "SELECT * FROM `proveedor`";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);
        $this->conexion=null;
   	}   

	function crear_proveedor($prov_ruc, $prov_nombre, $prov_contacto, $prov_cta_banco_soles, $prov_email, $prov_nro_telefono, $prov_estado, $prov_direccion, $prov_distrito, $prov_log)
	{
        $prov_usuario = $_SESSION['USUA_NOMBRE_CORTO'];
        $prov_fecha_creacion = date("Y-m-d H:i:s");
        $prov_log = "<strong>".$prov_estado."</strong> ".$prov_fecha_creacion." ".$prov_usuario." CREACIÓN <br>";	

		$consulta = "INSERT INTO `proveedor`(`prov_ruc`, `prov_nombre`, `prov_contacto`, `prov_cta_banco_soles`, `prov_email`, `prov_nro_telefono`, `prov_estado`, `prov_direccion`, `prov_distrito`, `prov_log`) VALUES ('$prov_ruc', '$prov_nombre', '$prov_contacto', '$prov_cta_banco_soles', '$prov_email', '$prov_nro_telefono', '$prov_estado', '$prov_direccion', '$prov_distrito', '$prov_log')";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta = "SELECT * FROM `proveedor`";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);
        $this->conexion=null;	
	}  	
	
	function editar_proveedor($prov_ruc, $prov_nombre, $prov_contacto, $prov_cta_banco_soles, $prov_email, $prov_nro_telefono, $prov_estado, $prov_direccion, $prov_distrito, $prov_log)
	{
        $prov_log_edit = '';
		$prov_usuario = $_SESSION['USUA_NOMBRE_CORTO'];
        $prov_fecha_edicion = date("Y-m-d H:i:s");
        $prov_log_edit = "<strong>".$prov_estado."</strong> ".$prov_fecha_edicion." ".$prov_usuario." EDICIÓN <br>".$prov_log;

		$consulta = "UPDATE `proveedor` SET `prov_nombre`='$prov_nombre', `prov_contacto`='$prov_contacto', `prov_cta_banco_soles`='$prov_cta_banco_soles',  `prov_email`='$prov_email',`prov_nro_telefono`='$prov_nro_telefono', `prov_estado`='$prov_estado', `prov_direccion`='$prov_direccion', `prov_distrito`='$prov_distrito',`prov_log`='$prov_log_edit' WHERE `prov_ruc`='$prov_ruc'";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta= "SELECT * FROM `proveedor` WHERE `prov_ruc` ='$prov_ruc'";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  		

	function leer_producto()
	{
        $consulta = " 	SELECT `producto`.`producto_id`,
							`producto`.`prod_rubro`,
							`producto`.`prod_tipo`,
							`producto`.`prod_codigo`,
							`producto`.`prod_descripcion`,
							`producto`.`prod_estado`
						FROM `producto` ";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);
        $this->conexion=null;
   	}   

	function nuevo_codigo()
	{
		$consulta = "SELECT COUNT(DISTINCT `prod_rubro`) AS `cantidad` FROM `producto`";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

		return $data;
		$this->conexion=null;

	}
	function crear_producto($producto_id, $prod_rubro, $prod_tipo, $prod_codigo, $prod_descripcion, $prod_estado, $prod_log)
	{
        $prod_usuario = $_SESSION['USUA_NOMBRE_CORTO'];
        $prod_fecha_creacion = date("Y-m-d H:i:s");
        $prod_log = "<strong>".$prod_estado."</strong> ".$prod_fecha_creacion." ".$prod_usuario." CREACIÓN <br>";	

		$consulta = "INSERT INTO `producto`(`prod_rubro`, `prod_tipo`, `prod_codigo`, `prod_descripcion`, `prod_estado`, `prod_log`) VALUES ('$prod_rubro', '$prod_tipo', '$prod_codigo', '$prod_descripcion', '$prod_estado', '$prod_log')";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta = "SELECT * FROM `producto`";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);
        $this->conexion=null;	
	}  	
	
	function editar_producto($producto_id, $prod_rubro, $prod_tipo, $prod_codigo, $prod_descripcion, $prod_estado, $prod_log)
	{
        $prod_log_edit = '';
		$prod_usuario = $_SESSION['USUA_NOMBRE_CORTO'];
        $prod_fecha_edicion = date("Y-m-d H:i:s");
        $prod_log_edit = "<strong>".$prod_estado."</strong> ".$prod_fecha_edicion." ".$prod_usuario." EDICIÓN <br>".$prod_log;

		$consulta = "UPDATE `producto` SET `prod_rubro`='$prod_rubro', `prod_tipo`='$prod_tipo', `prod_codigo`='$prod_codigo',  `prod_descripcion`='$prod_descripcion',`prod_estado`='$prod_estado', `prod_log`='$prod_log_edit' WHERE `producto_id`='$producto_id'";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta= "SELECT * FROM `producto` WHERE `producto_id` ='$producto_id'";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  		

	function leer_tc_cta_pagar_usuario()
	{
		$tc_variable = 'USUARIO';
        $consulta = "SELECT * FROM `tc_cta_pagar` WHERE `tc_variable`='$tc_variable'";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);
        $this->conexion=null;
   	}   

	function crear_tc_cta_pagar_usuario($tc_cta_pagar_id, $tc_categoria1, $tc_categoria2, $tc_categoria3)
	{
	   	$tc_variable = 'USUARIO';
		$consulta = "INSERT INTO `tc_cta_pagar`(`tc_variable`, `tc_categoria1`, `tc_categoria2`, `tc_categoria3`) VALUES ('$tc_variable', '$tc_categoria1','$tc_categoria2','$tc_categoria3')";
	   	$resultado = $this->conexion->prepare($consulta);
	   	$resultado->execute();   

	   	$consulta = "SELECT * FROM `tc_cta_pagar` WHERE `tc_variable`='$tc_variable'";
	   	$resultado = $this->conexion->prepare($consulta);
	   	$resultado->execute();        
	   	$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
	   	print json_encode($data, JSON_UNESCAPED_UNICODE);
	   	
		$this->conexion=null;	
	}  	
	
	function editar_tc_cta_pagar_usuario($tc_cta_pagar_id, $tc_categoria1, $tc_categoria2, $tc_categoria3)
	{
	   $consulta = "UPDATE `tc_cta_pagar` SET `tc_categoria1`='$tc_categoria1',`tc_categoria2`='$tc_categoria2',`tc_categoria3`='$tc_categoria3' WHERE`tc_cta_pagar_id`='$tc_cta_pagar_id'";		
	   $resultado = $this->conexion->prepare($consulta);
	   $resultado->execute();   

	   $consulta= "SELECT * FROM `tc_cta_pagar` WHERE `tc_cta_pagar_id` ='$tc_cta_pagar_id'";
	   $resultado = $this->conexion->prepare($consulta);
	   $resultado->execute();        
	   $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
	   print json_encode($data, JSON_UNESCAPED_UNICODE);
	   $this->conexion=null;	
	}  		
	
	function borrar_tc_cta_pagar_usuario($tc_cta_pagar_id)
	{
		$consulta = "DELETE FROM `tc_cta_pagar` WHERE `tc_cta_pagar_id`='$tc_cta_pagar_id'";		
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		$this->conexion=null;	
	}

	function leer_tc_cta_pagar_sistema()
	{
        $tc_variable = 'SISTEMA';
		$consulta="SELECT * FROM `tc_cta_pagar` WHERE `tc_variable`='$tc_variable'";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);
        $this->conexion=null;
   	}   

	function crear_tc_cta_pagar_sistema($tc_cta_pagar_id, $tc_categoria1, $tc_categoria2, $tc_categoria3)
	{
		$tc_variable = 'SISTEMA';
	   	$consulta = "INSERT INTO `tc_cta_pagar`(`tc_variable`, `tc_categoria1`, `tc_categoria2`, `tc_categoria3`) VALUES ('$tc_variable', '$tc_categoria1','$tc_categoria2','$tc_categoria3')";
	   	$resultado = $this->conexion->prepare($consulta);
	   	$resultado->execute();   

	   	$consulta = "SELECT * FROM `tc_cta_pagar` WHERE `tc_variable`='$tc_variable'";
	   	$resultado = $this->conexion->prepare($consulta);
	   	$resultado->execute();        
	   	$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
	   	print json_encode($data, JSON_UNESCAPED_UNICODE);
	   	
		$this->conexion=null;	
	}  	
	
	function editar_tc_cta_pagar_sistema($tc_cta_pagar_id, $tc_categoria1, $tc_categoria2, $tc_categoria3)
	{
	   $consulta = "UPDATE `tc_cta_pagar` SET `tc_categoria1`='$tc_categoria1',`tc_categoria2`='$tc_categoria2',`tc_categoria3`='$tc_categoria3' WHERE`tc_cta_pagar_id`='$tc_cta_pagar_id'";	

	   $resultado = $this->conexion->prepare($consulta);
	   $resultado->execute();   

	   $consulta= "SELECT * FROM `tc_cta_pagar` WHERE `tc_cta_pagar_id` ='$tc_cta_pagar_id'";
	   $resultado = $this->conexion->prepare($consulta);
	   $resultado->execute();        
	   $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
	   print json_encode($data, JSON_UNESCAPED_UNICODE);
	   $this->conexion=null;	
	}  		
	
	function borrar_tc_cta_pagar_sistema($tc_cta_pagar_id)
	{
		$consulta = "DELETE FROM `tc_cta_pagar` WHERE `tc_cta_pagar_id`='$tc_cta_pagar_id'";		
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		$this->conexion=null;	
	}

}