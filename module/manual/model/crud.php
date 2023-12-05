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
		$instancia= new c_conexiones_bd();
		$this->conexion=$instancia->conectar(); 	
	}

	function buscardatabd($tabla_bd, $campo_bd, $data_buscar)
	{
		$consulta = "SELECT * FROM `$tabla_bd` WHERE `$campo_bd` = '$data_buscar'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

		return $data;
		$this->conexion=null;
	}

	function buscar_data_bd($tabla, $c_where)
	{
		$consulta  ="SELECT * FROM `$tabla` WHERE ".$c_where;
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

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
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $row){
			$cacces_modulo_id = $row['modulo_id'];
		}

		$consulta = "SELECT * FROM `glo_objeto` WHERE `glo_objeto`.`obj_nombre_objeto` = '$cacces_nombre_objeto'";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
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

	function select_combo($nombre_tabla, $es_campo_unico, $campo_select, $condicion_where)
	{
		$distinct 	= "";
		$c_where 	= "";
		if($es_campo_unico == "SI"){
			$distinct = "DISTINCT";
		}
		if($condicion_where!=""){
			$c_where = "WHERE ".$condicion_where;
		}
		$consulta = "SELECT ".$distinct." `$nombre_tabla`.`$campo_select` AS `detalle` FROM `$nombre_tabla` ".$c_where." ORDER BY `$nombre_tabla`.`$campo_select`";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		return $data;   
		$this->conexion=null;
	}

	function select_roles($roles_perfil, $roles_campo)
	{
		$consulta="SELECT `glo_maestro`.`$roles_campo` AS `nombres` FROM `glo_roles` RIGHT JOIN `glo_maestro` ON `glo_maestro`.`maestro_id`= `glo_roles`.`roles_dni` AND `glo_maestro`.`maes_estado`='ACTIVO' WHERE `glo_roles`.`roles_perfil` = '$roles_perfil'  ORDER BY `nombres` ASC";

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
		
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		return $data;   
		$this->conexion=null;
	}

	function contar_dato($nombre_tabla, $campo_buscar, $condicion_where)
	{
		$consulta = "SELECT COUNT(`$nombre_tabla`.`$campo_buscar`) AS `cantidad` FROM `$nombre_tabla` WHERE ".$condicion_where;

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		return $data;   
		$this->conexion=null;
	}

	function max_id($tabla_bd, $campo_id)
	{
		$max_id = '0';
		$consulta = "SELECT MAX(`$campo_id`) AS `max_id` FROM `$tabla_bd`";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();        
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
		
		foreach($data as $row){
			$max_id = $row['max_id']; 
		}
		return $max_id;
		$this->conexion=null;
	}

	function contar_tabla($tabla_bd)
	{
		$contar = '0';
		$consulta = "SELECT COUNT(*) AS `contar` FROM `$tabla_bd` ";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();   
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

		foreach($data as $row){
			$contar = $row['contar']; 
		}
		return $contar;
		$this->conexion=null;
	}

	function select_modulo_nombre()
	{
		$usuario_id = $_SESSION['USUARIO_ID'];
		
		$consulta = " SELECT `glo_modulo`.`mod_nombre_vista` AS `detalle` FROM `glo_permisos` LEFT JOIN `glo_modulo` ON `glo_modulo`.`modulo_id`=`glo_permisos`.`per_modulo_id` AND `glo_modulo`.`mod_tipo`='Modulo' WHERE `per_usuario_id`='$usuario_id' ORDER BY `mod_nombre_vista` ";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
		return $data;   
		$this->conexion=null;
	}

	function buscar_manual($man_modulo_id)
	{
		$consulta = " SELECT `glo_manual`.`manual_id`, `glo_modulo`.`mod_nombre_vista`, `glo_manual`.`man_titulo`, `glo_maestro`.`maes_nombre_corto`, `glo_manual`.`man_fecha_genera` FROM `glo_manual` LEFT JOIN `glo_maestro` ON `glo_maestro`.`maestro_id`=`glo_manual`.`man_usuario_genera` LEFT JOIN `glo_modulo` ON `glo_modulo`.`modulo_id`=`glo_manual`.`man_modulo_id` WHERE `glo_manual`.`man_modulo_id`='$man_modulo_id' ORDER BY `mod_nombre`, `man_titulo` ASC ";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();        
		$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

		print json_encode($data, JSON_UNESCAPED_UNICODE);
		$this->conexion=null;
	}

	function crear_manual_registro($man_modulo_id, $man_titulo, $man_html)
	{
		$man_usuario_genera = $_SESSION['USUARIO_ID'];
		$nombre_usuario = $_SESSION['USUA_NOMBRE_CORTO'];
		$man_fecha_genera = date("Y-m-d H:i:s");
		$man_log = date_format(date_create($man_fecha_genera),"d-m-Y H:i")." ".$nombre_usuario." : CREACION <br>";

		$consulta = " INSERT INTO `glo_manual` (`man_modulo_id`, `man_titulo`, `man_usuario_genera`, `man_fecha_genera`, `man_log`) VALUES ('$man_modulo_id', '$man_titulo', '$man_usuario_genera', '$man_fecha_genera', '$man_log') ";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();

		$consulta = " SELECT * FROM `glo_manual` WHERE `man_modulo_id`='$man_modulo_id' AND `man_titulo`='$man_titulo' ";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

		foreach($data as $row){
			$manual_id = $row['manual_id']; 
		}

		$consulta = " INSERT INTO `glo_manual_html` (`manual_id`, `man_html`) VALUES ('$manual_id', '$man_html') ";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();

		$this->conexion=null;
	}

	function editar_manual_registro($manual_id, $man_html)
	{
		$man_log_anterior = '';
		$consulta = " SELECT * FROM `glo_manual` WHERE `manual_id`='$manual_id' ";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();      
		$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

		foreach($data as $row){
			$man_log_anterior = $row['man_log']; 
		}

		$nombre_usuario = $_SESSION['USUA_NOMBRE_CORTO'];
		$man_fecha_genera = date("Y-m-d H:i:s");
		$man_log = date_format(date_create($man_fecha_genera),"d-m-Y H:i")." ".$nombre_usuario." : EDICION <br>".$man_log_anterior;

		$consulta = " UPDATE `glo_manual` SET `man_log`='$man_log' WHERE `manual_id`='$manual_id' ";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();

		$consulta = " UPDATE `glo_manual_html` SET `man_html`='$man_html' WHERE `manual_id`='$manual_id' ";

		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();

		$this->conexion=null;
	}

	function borrar_manual_registro($manual_id)
	{
		$consulta = " DELETE FROM `glo_manual` WHERE `manual_id`='$manual_id' ";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();        

		$consulta = " DELETE FROM `glo_manual_html` WHERE `manual_id`='$manual_id' ";
		$resultado = $this->conexion->prepare($consulta);
		$resultado->execute();        

		$this->conexion=null;
	}

}