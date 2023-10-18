<?php
class usuario 
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

		function ValidaUsuario($usuario,$password)
		{
		$password = MD5($password);
		$this->sql="SELECT * FROM `glo_usuario` WHERE `usua_usuario_web`='".$usuario."' AND `usua_password`='".$password."' AND `usua_estado`='ACTIVO'";
		$this->rpta=$this->cnx->prepare($this->sql);
		$this->rpta->execute();
		$this->fila=$this->rpta->fetch(PDO::FETCH_ASSOC); 
 		$this->cant=$this->rpta->rowCount();
        $this->rpta->closeCursor();
       	if ($this->cant=="1")
       		{
			$_SESSION['USU_NOMBRES']=$this->fila['usua_nombres'];
		    $_SESSION['USUARIO_ID']=$this->fila['usuario_id'];
		    $_SESSION['USU_PERFIL']=$this->fila['usua_perfil'];
		    $_SESSION['USUA_NOMBRECORTO']=$this->fila['usua_nombre_corto'];

			$usuario_id = $this->fila['usuario_id'];
			$this->sql="SELECT TO_BASE64 (`maes_fotografia`) AS `b64_foto` FROM `glo_maestro_imagen` WHERE `maestro_id`='$usuario_id'";
			$this->rpta=$this->cnx->prepare($this->sql);
			$this->rpta->execute();
			$this->fila=$this->rpta->fetch(PDO::FETCH_ASSOC); 
			$this->cant=$this->rpta->rowCount();
			$this->rpta->closeCursor();
			if($this->fila['b64_foto']==null){
				$_SESSION['USUA_FOTOGRAFIA'] = "services/plantilla_templon/view/img/usuario.png";
			}else{
				$_SESSION['USUA_FOTOGRAFIA'] = "data:image/jpg;base64,".$this->fila['b64_foto'];
			}

			}    
        
		}
	}
