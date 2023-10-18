<?php 
// Fn.Valida si existe la variable Sesion
if (!isset($_SESSION['USUARIO_ID']))
	{         
	if(!isset($_POST["user_login"]))
 		{ 
 		MView('sesion','login_view');
 		}
	else
		{
		MModel('sesion','usuario');
		$instancia = new usuario();
		$validado = $instancia->ValidaUsuario($_POST["user_login"],$_POST["user_pass"]);
		header('Location: /inicio');
		}
	} 
else
	{
	// Determina que modulo principal 

	SController('consulta_modulos','c_consulta_modulos'); 
	$instancia2 = new c_consulta_modulos();     
    $ModuloInicio = $instancia2->ModuloDeInicio();     	
  
	if($ModuloInicio=='')
        { 
		session_destroy();  
		header('Location: /inicio');
		}
	else
		{ 
		header('Location: /'.$ModuloInicio); 
		}
	}
?>