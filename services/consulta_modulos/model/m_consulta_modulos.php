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
            //$this->consulta = "SELECT `mod_nombre`, `mod_nombre_vista`, `mod_icono`, `per_modulo_inicio` FROM `glo_permisos` LEFT JOIN `glo_modulo` ON `per_modulo_id`= `modulo_id` WHERE `per_usuario_id`='".$_SESSION['USUARIO_ID']."' ORDER BY `mod_nombre_vista` ASC";
            $this->consulta = " SELECT 
                                    `glo_modulo`.`mod_nombre`,
                                    `glo_modulo`.`mod_nombre_vista`,
                                    `glo_modulo`.`mod_icono`,
                                    `glo_modulo`.`mod_tipo`,
                                    `glo_modulo`.`mod_plegable`,
                                    CONCAT(IF(`glo_modulo`.`mod_plegable`='Ajustes',CONCAT('ZZ',`glo_modulo`.`mod_plegable`),`glo_modulo`.`mod_plegable`),`glo_modulo`.`mod_nombre_vista`) AS `indice`,
                                    `glo_permisos`.`per_modulo_inicio`
                                FROM `glo_permisos`
                                LEFT JOIN `glo_modulo`
                                    ON `glo_permisos`.`per_modulo_id`=`glo_modulo`.`modulo_id`
                                WHERE `glo_permisos`.`per_usuario_id`='".$_SESSION['USUARIO_ID']."'
                                UNION
                                SELECT 
                                    `glo_modulo`.`mod_nombre`,
                                    `glo_modulo`.`mod_nombre_vista`,
                                    `glo_modulo`.`mod_icono`,
                                    `glo_modulo`.`mod_tipo`,
                                    `glo_modulo`.`mod_nombre_vista` AS `mod_plegable`,
                                    CONCAT(IF(`glo_modulo`.`mod_nombre_vista`='Ajustes',CONCAT('ZZ',`glo_modulo`.`mod_nombre_vista`),`glo_modulo`.`mod_nombre_vista`),CONCAT('0',`glo_modulo`.`mod_nombre_vista`)) AS `indice`,
                                    'NO' AS `per_modulo_inicio`
                                FROM `glo_modulo`
                                RIGHT JOIN 
                                    (SELECT DISTINCT `glo_modulo`.`mod_plegable` FROM `glo_permisos` LEFT JOIN `glo_modulo` ON  `glo_permisos`.`per_modulo_id`=`glo_modulo`.`modulo_id` WHERE `glo_permisos`.`per_usuario_id`='".$_SESSION['USUARIO_ID']."') AS `t1` ON `glo_modulo`.`mod_nombre_vista`= `t1`.`mod_plegable`
                                WHERE `glo_modulo`.`mod_tipo`='Plegable'
                                ORDER BY `indice` ";

            $this->resultado = $this->cnx->prepare($this->consulta);
            $this->resultado->execute();
            $this->data = $this->resultado->fetchall(PDO::FETCH_ASSOC);
            return $this->data;
        }
    }