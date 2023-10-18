<?php
if (!isset($_SESSION['usua_email']))
	{         
	if(!isset($_POST["maes_email"]))
 		{ 
		MView('recupera_contrasena','login_view');
 		}
	else
		{
		MModel('recupera_contrasena','correo');
		$Instancia = new correo();
		$validado = $Instancia->ValidaCorreo($_POST["maes_email"]);
		if($validado==1){
			/* Se genera nueva contraseña */
			MController('recupera_contrasena','logico');
			$Instancia2 = new logico();
			$longitud = 8;
			$password = $Instancia2->GeneraContrasena($longitud);
	
			/* Grabar en BD nueva contraseña */
			$Respuesta = $Instancia->GrabaContrasena($_POST["maes_email"],$password);

		    //Se envia correo con la contraseña temporal
			$destinatario = $_POST["maes_email"]; 
			$remitente = "Soporte Csitecc <galexramirez@hotmail.com>";
			$asunto = "Cambio de Password";
			$copia = "";
			$copiaOculta = ""; 
			$Respuesta2 = $Instancia2->EnviarCorreo($destinatario,$remitente,$asunto,$copia,$copiaOculta,$password);
				
			$_SESSION['usua_email']= "VALIDADO";
		}else{
			$_SESSION['usua_email']= "INVALIDO";
		}
		header('Location: /recupera_contrasena');
		}
	} 
else
	{
	if($_SESSION['usua_email']=="VALIDADO")
		{
		$MENSAJE = "Se ha enviado un nuevo password a su correo electrónico. Revisar carpetas SPAM. Volver a la página principal";
		}
	else
		{
		$MENSAJE = "El correo electrónico no se encuentra registrado. Volver a la página principal";
		}
	MView('recupera_contrasena','login_view_valido',compact('MENSAJE'));
	session_destroy();
	}