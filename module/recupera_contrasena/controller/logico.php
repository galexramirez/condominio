<?php
class logico
    {
    
    function GeneraContrasena($longitud)
        {
		    //Carácteres para la contraseña
		    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		    $password = "";
		    //Reconstruimos la contraseña segun la longitud que se quiera
		    for($i=0;$i<$longitud;$i++) {
	   		    //obtenemos un caracter aleatorio escogido de la cadena de caracteres
	   		    $password .= substr($str,rand(0,62),1);
		    }
            return $password;
        }
    
    function EnviarCorreo($destinatario,$remitente,$asunto,$copia,$copiaOculta,$password)
        {
		    $cuerpo = ' 
					<html> 
						<head> 
   							<title>Cambio de Password</title> 
						</head> 
						<body> 
							<h1>Estimado Usuario</h1> 
							<p> 
								Se ha realizado el cambio de password. Este es el nuevo password que debera usar para ingresar al sistema de la empresa.</br> 
                                Nuevo Password : <b>'.$password.'</b>
							</p> 
						</body> 
					</html> 
					'; 

		    //para el envío en formato HTML 
		    $headers = "MIME-Version: 1.0\r\n"; 
		    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

		    //dirección del remitente
			if ($remitente <> "")
			{
				$headers .= "From: ".$remitente."\r\n"; 
			}
            
		    //dirección de respuesta, si queremos que sea distinta que la del remitente 
		    //$headers .= "Reply-To: galexramirez@yahoo.com\r\n"; 

		    //ruta del mensaje desde origen a destino 
		    //$headers .= "Return-path: galexramirez@yahoo.com\r\n"; 

            //direcciones que recibián copia 
			if ($copia <> "")
			{
				$headers .= "Cc: ".$copia."\r\n"; 
			}

			//direcciones que recibirán copia oculta 
			if ($copiaOculta <> "")
			{
				$headers .= "Bcc: ".$copiaOculta."\r\n"; 
			}
            

            if (mail($destinatario,$asunto,$cuerpo,$headers))
			{
				return true;
			}
			else
			{
				return false;
			}

        }

    }
