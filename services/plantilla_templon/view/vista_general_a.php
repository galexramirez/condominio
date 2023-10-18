<!DOCTYPE html>
<html lang='es'>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
	<meta name='viewport' content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
  	
  	<!-- CSS Template -->
	  	<link rel='stylesheet' href='services/resources/bootstrap-4.5.2-dist/css/bootstrap.min.css' type='text/css' media='all'>
		<link rel='stylesheet'  href='services/plantilla_templon/view/vista_general.css' type='text/css' media='all'>  
	
	<!-- Recursos Insertados de Modulo -->
		<?= $InsertHead ?>

	<!-- Recursos externos -->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'>
		<title><?= DF_TITULO; ?></title>

</head> 

<body>

<!-- 0.0 CONTENEDOR PRINCIPAL--> 

    <!-- 1.0 ENCABEZADO PRINCIPAL -->
	
	<header>
		<nav class='fixed-top  p-0 m-0 d-flex  bg-white my-primernivel'>	
			<div class='col-7 row justify-content-star align-self-center m-0 p-0'>
				<!-- BOTON -->
				<button type='button' class='bg-white my-hamburger' >
					<svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-list' fill='currentColor' xmlns='http://www.w3.org/2000/	svg'>
						<path fill-rule='evenodd' d='M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z'/>
					</svg>
				</button>

				<!-- LOGO -->
				<div>
					<a href='c_modulo_inicio'>
						<img src='services/plantilla_templon/view/img/logo.jpg' class='my-logo'  alt=''>
					</a>
				</div>
			</div>	
			
			<div class='col-5 d-flex row justify-content-end align-self-center m-0 p-0'>
        		<div class='align-self-center'>	
					<a href="ajuste_usuario">
						<img class='rounded-circle' height='40' src='<?= $FotoUsuario ?>'>
					</a>
				</div>
            	<div class='my-tarjetaNombre d-flex flex-column align-self-center  mr-2 ml-2'>
			    	<div>
						<p class='text-muted mb-0 text-sm-left'><?= $NombreUsuario ?></p>
					</div>
            		<div >
						<a href='log_out'>
							<p class='text-muted m-0'>
								Salir    
								<svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-box-arrow-right' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
									<path fill-rule='evenodd' d='M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z'/>
									<path fill-rule='evenodd' d='M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z'/>
								</svg>
							</p>
						</a>
					</div>
				</div>
        	</div>			
   		</nav>  
	</header>

	<!-- 2.0 SEGURNDO NIVEL -->
 
   <div class='container-fluid my-segundonivel p-0'> <!-- Apertura segundo Nivel -->	
       	<!-- 2.1 SIDELBAR JOEL -->
		<div id="my-sideBar" class="border-right">
    		<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-light overflow-auto p-0 my-menu">
      			<ul class="nav nav-pills flex-column mb-auto">
					<?= $OpcionesSidebar ?>
				</ul>
    		</div>
    	</div>
