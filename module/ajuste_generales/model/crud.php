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

	function leer_roles()
	{
        $consulta = "SELECT * FROM `glo_roles`";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   
		 
	function crear_roles($roles_dni,$roles_apellidos_nombres,$roles_nombre_corto,$roles_perfil)
	{
		$consulta = "INSERT INTO `glo_roles` (`roles_dni`, `roles_apellidos_nombres`, `roles_nombre_corto`, `roles_perfil`) VALUES ('$roles_dni','$roles_apellidos_nombres','$roles_nombre_corto', '$roles_perfil')";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		
		$consulta = "SELECT * FROM `glo_roles`";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  	
	
	function editar_roles($roles_id,$roles_dni,$roles_apellidos_nombres,$roles_nombre_corto,$roles_perfil)
	{
		$consulta = "UPDATE `glo_roles` SET `roles_dni`='$roles_dni',`roles_apellidos_nombres`='$roles_apellidos_nombres',`roles_nombre_corto`='$roles_nombre_corto',`roles_perfil`='$roles_perfil' WHERE `roles_id` ='$roles_id'";		
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		
		$consulta = "SELECT * FROM `glo_roles` WHERE `roles_id` ='$roles_id'";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  		
	
	function borrar_roles($roles_id)
	{
		$consulta = "DELETE FROM `glo_roles` WHERE `roles_id`='$roles_id'";		
  		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
        $this->conexion=null;	
	}  		

	function leer_tipo_cambio()
	{
        $consulta = "SELECT `tipo_cambio_id`, `tcam_fecha`, `tcam_moneda`, `tcam_tipo`, `tcam_valor` FROM `glo_tipo_cambio`";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   
		 
	function crear_tipo_cambio($tcam_fecha, $tcam_moneda, $tcam_tipo, $tcam_valor)
	{
		$consulta = "INSERT INTO `glo_tipo_cambio`(`tcam_fecha`, `tcam_moneda`, `tcam_tipo`, `tcam_valor`) VALUES ('$tcam_fecha','$tcam_moneda','$tcam_tipo','$tcam_valor')";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		
        $this->conexion=null;	
	}  	
	
	function editar_tipo_cambio($tipo_cambio_id, $tcam_fecha, $tcam_moneda, $tcam_tipo, $tcam_valor)
	{
		$consulta = "UPDATE `glo_tipo_cambio` SET `tcam_fecha`='$tcam_fecha', `tcam_moneda`='$tcam_moneda', `tcam_tipo`='$tcam_tipo', `tcam_valor`='$tcam_valor' WHERE `tipo_cambio_id` ='$tipo_cambio_id'";		
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		
		$consulta = "SELECT * FROM `glo_tipo_cambio` WHERE `tipo_cambio_id` ='$tipo_cambio_id'";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        
		print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  		
	
	function borrar_tipo_cambio($tipo_cambio_id)
	{
		$consulta = "DELETE FROM `glo_tipo_cambio` WHERE `tipo_cambio_id`='$tipo_cambio_id'";		
  		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

        $this->conexion=null;	
	}  		

	function leer_modulo()
	{
        $consulta = "SELECT * FROM `glo_modulo`";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   
		 
	function crear_modulo($mod_nombre, $mod_nombre_vista, $mod_icono, $mod_tipo, $mod_plegable)
	{
		$consulta = "INSERT INTO `glo_modulo`(`mod_nombre`, `mod_nombre_vista`, `mod_icono`, `mod_tipo`, `mod_plegable`) VALUES ('$mod_nombre','$mod_nombre_vista','$mod_icono', '$mod_tipo', '$mod_plegable')";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		
		$consulta = "SELECT * FROM `glo_modulo` ORDER BY `modulo_id` DESC LIMIT 1";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        
		print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  	
	
	function editar_modulo($modulo_id, $mod_nombre, $mod_nombre_vista, $mod_icono, $mod_tipo, $mod_plegable)
	{
		$consulta = "UPDATE `glo_modulo` SET `mod_nombre`='$mod_nombre',`mod_nombre_vista`='$mod_nombre_vista',`mod_icono`='$mod_icono', `mod_tipo`='$mod_tipo', `mod_plegable`='$mod_plegable' WHERE `modulo_id`='$modulo_id'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		
		$consulta = "SELECT * FROM `glo_modulo` WHERE `modulo_id` ='$modulo_id'";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data =$resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  		
	
	function borrar_modulo($modulo_id)
	{
		$consulta = "DELETE FROM `glo_modulo` WHERE `modulo_id`='$modulo_id'";		
  		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
        
		$this->conexion=null;	
	}  		

	function leer_permisos()
	{
        $consulta = "SELECT 
						`permiso_id`,
						`per_usuario_id`,
						`maes_nombre_corto` AS `per_nombre_corto`, 
						`glo_modulo`.`mod_nombre` AS `per_modulo_nombre`, 
						`per_modulo_inicio`  
					FROM `glo_permisos` 
					LEFT JOIN `glo_modulo` 
					ON `per_modulo_id` = `glo_modulo`.`modulo_id`
					LEFT JOIN `glo_maestro`
					ON `per_usuario_id` = `glo_maestro`.`maestro_id`";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   
		 
	function crear_permisos($per_usuario_id, $per_modulo_nombre, $per_modulo_inicio)
	{
		$per_modulo_id = "";

		$consulta1 = "SELECT `glo_modulo`.`modulo_id` FROM `glo_modulo` WHERE `glo_modulo`.`mod_nombre` = '$per_modulo_nombre'";
		$resultado1 = $this->conexion->prepare($consulta1);
		$resultado1->execute();
		
		foreach ($resultado1 as $row){
			$per_modulo_id = $row['modulo_id'];
		}

		$consulta = "INSERT INTO `glo_permisos`(`per_usuario_id`, `per_modulo_id`, `per_modulo_inicio`) VALUES ('$per_usuario_id', '$per_modulo_id', '$per_modulo_inicio')";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		
		$consulta= "SELECT * FROM `glo_permisos` ORDER BY `permiso_id` DESC LIMIT 1";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
		print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  	
	
	function editar_permisos($permiso_id, $per_usuario_id, $per_modulo_nombre, $per_modulo_inicio)
	{
		$per_modulo_id = "";

		$consulta2 = "SELECT `glo_modulo`.`modulo_id` FROM `glo_modulo` WHERE `glo_modulo`.`mod_nombre` = '$per_modulo_nombre'";
		$resultado2 = $this->conexion->prepare($consulta2);
		$resultado2->execute();
		
		foreach ($resultado2 as $row)
		{
			$per_modulo_id = $row['modulo_id'];
		}

		$consulta = "UPDATE `glo_permisos` SET `per_usuario_id`='$per_usuario_id', `per_modulo_id`='$per_modulo_id', `per_modulo_inicio`='$per_modulo_inicio' WHERE `permiso_id`='$permiso_id'";		
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		
		$consulta= "SELECT * FROM `glo_permisos` WHERE `permiso_id` ='$permiso_id'";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
		print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  		
	
	function borrar_permisos($permiso_id)
	{
		$consulta = "DELETE FROM `glo_permisos` WHERE `permiso_id`='$permiso_id'";		
  		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
        
		$this->conexion=null;	
	}  		

	function leer_objeto()
	{
        $consulta = "SELECT `glo_objeto`.`objeto_id`, `glo_modulo`.`mod_nombre` AS `obj_nombre_modulo`, `glo_objeto`.`obj_nombre_objeto`, `glo_objeto`.`obj_descripcion` FROM `glo_objeto` LEFT JOIN `glo_modulo` ON `glo_modulo`.`modulo_id` = `glo_objeto`.`obj_modulo_id`";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   
		 
	function crear_objeto($objeto_id,$obj_nombre_modulo,$obj_nombre_objeto,$obj_descripcion)
	{
		$consulta = "SELECT * FROM `glo_modulo` WHERE `glo_modulo`.`mod_nombre` = '$obj_nombre_modulo'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $row){
			$obj_modulo_id = $row['modulo_id'];
		}

		$consulta = "INSERT INTO `glo_objeto`(`obj_modulo_id`, `obj_nombre_objeto`, `obj_descripcion`) VALUES ('$obj_modulo_id','$obj_nombre_objeto','$obj_descripcion')";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta = "SELECT `glo_objeto`.`objeto_id`, `glo_modulo`.`mod_nombre` AS `obj_nombre_modulo`, `glo_objeto`.`obj_nombre_objeto`, `glo_objeto`.`obj_descripcion` FROM `glo_objeto` LEFT JOIN `glo_modulo` ON `glo_modulo`.`modulo_id`=`glo_objeto`.`obj_modulo_id`";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  	
	
	function editar_objeto($objeto_id, $obj_nombre_modulo, $obj_nombre_objeto, $obj_descripcion)
	{
		$consulta = "SELECT * FROM `glo_modulo` WHERE `glo_modulo`.`mod_nombre` = '$obj_nombre_modulo'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $row){
			$obj_modulo_id = $row['modulo_id'];
		}

		$consulta = "UPDATE `glo_objeto` SET `obj_modulo_id`='$obj_modulo_id',`obj_nombre_objeto`='$obj_nombre_objeto',`obj_descripcion`='$obj_descripcion' WHERE `objeto_id`='$objeto_id'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta= "SELECT `glo_objeto`.`objeto_id`, `glo_modulo`.`mod_nombre` AS `obj_nombre_modulo`, `glo_objeto`.`obj_nombre_objetp`, `glo_objeto`.`obj_descripcion` FROM `glo_objeto` LEFT JOIN `glo_modulo` ON `glo_modulo`.`modulo_id`=`glo_objeto`.`obj_modulo_id`";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  		
	
	function borrar_objeto($objeto_id)
	{
		$consulta = "DELETE FROM `glo_objeto` WHERE `objeto_id`='$objeto_id'";		
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
        $this->conexion=null;	
	}  		

	function leer_control_acceso()
	{
        $consulta="SELECT `glo_control_acceso`.`control_acceso_id`, `glo_control_acceso`.`cacces_perfil`, `glo_modulo`.`mod_nombre` AS `cacces_nombre_modulo`, `glo_objeto`.`obj_nombre_objeto` AS `cacces_nombre_objeto` ,`glo_control_acceso`.`cacces_acceso` FROM `glo_control_acceso` LEFT JOIN `glo_modulo` ON `glo_control_acceso`.`cacces_modulo_id` = `glo_modulo`.`modulo_id` LEFT JOIN `glo_objeto` ON `glo_control_acceso`.`cacces_objeto_id`=`glo_objeto`.`objeto_id`";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   
		 
	function crear_control_acceso($cacces_perfil, $cacces_modulo_id, $cacces_objeto_id, $cacces_acceso)
	{
		$consulta = "INSERT INTO `glo_control_acceso`(`cacces_perfil`, `cacces_modulo_id`, `cacces_objeto_id`, `cacces_acceso`) VALUES ('$cacces_perfil', '$cacces_modulo_id', '$cacces_objeto_id', '$cacces_acceso')";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta= "SELECT `glo_control_acceso`.`control_acceso_id`, `glo_control_acceso`.`cacces_perfil`, `glo_modulo`.`mod_nombre` AS `cacces_nombre_modulo`, `glo_objeto`.`obj_nombre_objeto` AS `cacces_nombre_objeto` ,`glo_control_acceso`.`cacces_acceso` FROM `glo_control_acceso` LEFT JOIN `glo_modulo` ON `glo_control_acceso`.`cacces_modulo_id` = `glo_modulo`.`modulo_id` LEFT JOIN `glo_objeto` ON `glo_control_acceso`.`cacces_objeto_id`=`glo_objeto`.`objeto_id`";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

		print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
		$this->conexion=null;	
	}  	
	
	function editar_control_acceso($control_acceso_id, $cacces_perfil, $cacces_modulo_id, $cacces_objeto_id, $cacces_acceso)
	{
		$consulta = "UPDATE `glo_control_acceso` SET `glo_control_acceso`.`cacces_perfil`='$cacces_perfil',`glo_control_acceso`.`cacces_modulo_id`='$cacces_modulo_id',`cacces_objeto_id`='$cacces_objeto_id',`glo_control_acceso`.`cacces_acceso`='$cacces_acceso' WHERE `glo_control_acceso`.`control_acceso_id`='$control_acceso_id'";		
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta= "SELECT `glo_control_acceso`.`control_acceso_id`, `glo_control_acceso`.`cacces_perfil`, `glo_modulo`.`mod_nombre` AS `cacces_nombre_modulo`, `glo_objeto`.`obj_nombre_objeto` AS `cacces_nombre_objeto` ,`glo_control_acceso`.`cacces_acceso` FROM `glo_control_acceso` LEFT JOIN `glo_modulo` ON `glo_control_acceso`.`cacces_modulo_id` = `glo_modulo`.`modulo_id` LEFT JOIN `glo_objeto` ON `glo_control_acceso`.`cacces_objeto_id`=`glo_objeto`.`objeto_id`";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  		
	
	function borrar_control_acceso($control_acceso_id)
	{
		$consulta = "DELETE FROM `glo_control_acceso` WHERE `control_acceso_id`='$control_acceso_id'";		
  		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
        $this->conexion=null;	
	}  		

	function leer_tc_maestro()
	{
        $consulta="SELECT * FROM `glo_tc_maestro`";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   
		 
	function crear_tc_maestro($tc_maestro_id,$tc_ficha,$tc_categoria1,$tc_categoria2)
	{
		$consulta = "INSERT INTO `glo_tc_maestro`(`tc_ficha`, `tc_categoria1`, `tc_categoria2`) VALUES ('$tc_ficha','$tc_categoria1','$tc_categoria2')";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta = "SELECT * FROM `glo_tc_maestro`";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  	
	
	function editar_tc_maestro($tc_maestro_id,$tc_ficha,$tc_categoria1,$tc_categoria2)
	{
		$consulta = "UPDATE `glo_tc_maestro` SET `tc_ficha`='$tc_ficha',`tc_categoria1`='$tc_categoria1',`tc_categoria2`='$tc_categoria2' WHERE `tc_maestro_id`='$tc_maestro_id'";		
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta= "SELECT * FROM `glo_tc_maestro` WHERE `tc_maestro_id` ='$tc_maestro_id'";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
		print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  		
	
	function borrar_tc_maestro($tc_maestro_id)
	{
		$consulta = "DELETE FROM `glo_tc_maestro` WHERE `tc_maestro_id`='$tc_maestro_id'";		
  		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
        $this->conexion=null;	
	}  		

	function leer_tc_usuario()
	{
        $consulta="SELECT * FROM `glo_tc_usuario`";

        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;
   	}   
		 
	function crear_tc_usuario($tc_usuario_id,$tc_ficha,$tc_categoria1,$tc_categoria2)
	{
		$consulta = "INSERT INTO `glo_tc_usuario`(`tc_ficha`, `tc_categoria1`, `tc_categoria2`) VALUES ('$tc_ficha','$tc_categoria1','$tc_categoria2')";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta = "SELECT * FROM `glo_tc_usuario`";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
		print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  	
	
	function editar_tc_usuario($tc_usuario_id,$tc_ficha,$tc_categoria1,$tc_categoria2)
	{
		$consulta = "UPDATE `glo_tc_usuario` SET `tc_ficha`='$tc_ficha',`tc_categoria1`='$tc_categoria1',`tc_categoria2`='$tc_categoria2' WHERE `tc_usuario_id`='$tc_usuario_id'";		
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   

		$consulta= "SELECT * FROM `glo_tc_usuario` WHERE `tc_usuario_id` ='$tc_usuario_id'";
        $resultado = $this->conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        
		print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
        $this->conexion=null;	
	}  		
	
	function borrar_tc_usuario($tc_usuario_id)
	{
		$consulta = "DELETE FROM `glo_tc_usuario` WHERE `tc_usuario_id`='$tc_usuario_id'";		
  		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
        $this->conexion=null;	
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

	function select_maestro()
	{
		$consulta = "SELECT `glo_maestro`.`maes_apellidos_nombres` AS `nombres` FROM `glo_maestro`";		
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		return $data;   
		$this->conexion=null;
	}  		

	function buscar_DNI($roles_apellidos_nombres)
	{
		$consulta = "SELECT `glo_maestro`.`maestro_id` AS `DNI` FROM `glo_maestro` WHERE `glo_maestro`.`maes_apellidos_nombres`='$roles_apellidos_nombres'";		
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		return $data;   
		$this->conexion=null;
	}  		

	function buscar_nombre_corto($roles_dni)
	{
		$consulta = "SELECT `glo_usuario`.`usua_nombre_corto` AS `nombre_corto` FROM `glo_usuario` WHERE `usuario_id`='$roles_dni'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		return $data;
  		$this->conexion=null;	
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

	function select_objeto($cacces_modulo_id)
	{
		$consulta="SELECT `glo_objeto`.`obj_nombre_objeto` AS 'Detalle' FROM `glo_objeto` WHERE `glo_objeto`.`obj_modulo_id` = '$cacces_modulo_id' ORDER BY `Detalle` ASC";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();        
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		
		return $data;
		$this->conexion=null;
	}

	function validar_permisos($per_usuario_id, $per_modulo_id)
	{
		$consulta= "SELECT * FROM `glo_permisos` WHERE `per_usuario_id`='$per_usuario_id' AND `per_modulo_id`='$per_modulo_id'";
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
	
	function select_usuario()
	{
		$consulta="SELECT DISTINCT `glo_roles`.`roles_nombre_corto` AS `usuario` FROM `glo_roles` WHERE `roles_nombre_corto`!='' ORDER BY `usuario` ASC";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();        
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

		return $data;
		$this->conexion=null;
		   
	}   

	function select_modulo()
	{
		$consulta="SELECT `glo_modulo`.`mod_nombre` AS `modulo` FROM `glo_modulo` ORDER BY `modulo` ASC";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();        
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

		return $data;
		$this->conexion=null;
		   
	}   

	function validar_objeto($obj_modulo_id, $obj_nombre_objeto)
	{
		$consulta= "SELECT * FROM `glo_objeto` WHERE `glo_objeto`.`obj_modulo_id`='$obj_modulo_id' AND `glo_objeto`.`obj_nombre`='$obj_nombre_objeto'";

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

	function validar_control_acceso($cacces_perfil, $cacces_modulo_id, $cacces_objeto_id)
	{
		$consulta= "SELECT * FROM `glo_control_acceso` WHERE `glo_control_acceso`.`cacces_perfil`='$cacces_perfil' AND `glo_control_acceso`.`cacces_modulo_id`='$cacces_modulo_id' AND `glo_control_acceso`.`cacces_objeto_id`='$cacces_objeto_id'";

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

}