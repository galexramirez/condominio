<?php
class modulos_m 
	{	
	var $cnx;
	var $sql;
	var $rpta;
	var $cant;
	var $fila=array();

	function __construct()
		{
        SController('conexiones_bd','c_conexion_bd');
        $instancia = new c_conexiones_bd();
        $this->cnx = $instancia->Conectar(); 	
        }

	/// F. PARA VALIDAR INGRESO DE USUARIOS/ USUARIO, CONTRASEÑA / VALOS O NO VALISA
	function ModulosPorUsuario()
		{
            $this->consulta = "SELECT `mod_nombre`, `mod_nombre_vista`, `mod_icono`, `per_modulo_inicio`, `per_nivel` FROM `glo_permisos` LEFT JOIN `glo_modulo` ON `per_modulo_id`= `modulo_id` WHERE `per_usuario_id`='".$_SESSION['USUARIO_ID']."' ORDER BY `mod_nombre_vista` ASC";

            $this->resultado = $this->cnx->prepare($this->consulta);
            $this->resultado->execute();
            $this->data = $this->resultado->fetchall(PDO::FETCH_ASSOC);
            return $this->data;
        }
    }