<?php
class correo 
{	
	var $cnx;
	var $sql;
	var $rpta;
	var $cant;
	var $fila=array();

	function __construct()
	{
		SController('conexiones_bd','c_conexion_bd');
		$Instancia= new c_conexiones_bd();
		$this->cnx=$Instancia->Conectar(); 	
	}

	function ValidaCorreo($maes_email)
	{
		$this->sql="SELECT * FROM `glo_maestro` WHERE `maes_email`='$maes_email' AND `maes_estado`='ACTIVO'";
		$this->rpta=$this->cnx->prepare($this->sql);
		$this->rpta->execute();
		$this->fila=$this->rpta->fetch(PDO::FETCH_ASSOC); 
 		$this->cant=$this->rpta->rowCount();
        $this->rpta->closeCursor();
		$data = 0;
		if ($this->cant==1){
			$data = 1;
		}
		return $data;
	}

	function GrabaContrasena($maes_email, $password)
	{
		//Se encripta el password
		$usua_password = MD5($password);
		$this->sql="SELECT * FROM `glo_maestro` WHERE `maes_email`='$maes_email' AND `maes_estado`='ACTIVO'";
		$this->rpta=$this->cnx->prepare($this->sql);
		$this->rpta->execute();
		$this->fila=$this->rpta->fetchAll(PDO::FETCH_ASSOC); 
 		$this->cant=$this->rpta->rowCount();
        $this->rpta->closeCursor();
		
		//Se ubica el DNI del usuario
		$maestro_id = "";
		foreach($this->fila as $row){
			$maestro_id = $row['maestro_id'];
		};
		
		$this->sql="UPDATE `glo_usuario` SET `usua_password`='$usua_password' WHERE `usuario_id`='$maestro_id'";
		$this->rpta=$this->cnx->prepare($this->sql);
		$this->rpta->execute();
        $this->rpta->closeCursor();
	}

}