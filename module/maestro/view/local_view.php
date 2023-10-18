<div id="contenido" class="container-fluid p-0">

	<nav class="navbar navbar-light bg-light p-0">
		<div class="container-fluid">
			<a class="navbar-brand text-muted align-baselin" href="#">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
 					 <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
				</svg>	
				<?= $NombreDeModuloVista ?>
			</a>
		</div>
	</nav>

	<section class="container-fluid py-3" id="div_btn_seleccion_maestro">
		<!--<button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal">+ Nuevo</button>  -->
	</section>
	
	<div class="row p-3">
		<div class="col-auto m-0">
			<div class="table-responsive" id="div_tabla_maestro">
				<!-- creacion_tabla -->
			</div>
    	</div>
	</div>


	<!--Modal para CRUD-->
	<div class="row modal fade" id="modal_crud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg"  role="document">
			<div class="modal-content">

				<div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel"></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
			        </button>
			    </div>
			      	
				<form id="form_maestro">    
			      	<div class="modal-body">
			      		<div class="row">
			      		    <div class="col-lg-6">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
						          			<label for="maestro_id" class="col-form-label form-control-sm">DNI</label>
						           			<input type="text" class="form-control form-control-sm" id="maestro_id" maxlength="8">
				  		       			</div>
									</div>
								</div>
				  		        <div class="row">
									<div class="col-lg-12">
				  		        		<div class="form-group">
						           			<label for="maes_apellidos_nombres" class="col-form-label form-control-sm">NOMBRES</label>
						           			<input type="text" class="form-control text-uppercase form-control-sm" id="maes_apellidos_nombres" maxlength="60">
				  		        		</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
				  		        		<div class="form-group">
						           			<label for="maes_cargo_actual" class="col-form-label form-control-sm">CARGO ACTUAL</label>
						           			<select class="form-control form-control-sm" id="maes_cargo_actual">
											</select>
						       			</div>               
						    		</div>
								</div>
								<div class="row">
						    		<div class="col-lg-12">
						        		<div class="form-group">
						            		<label for="maes_estado" class="col-form-label form-control-sm">ESTADO</label>
						            		<select class="form-control form-control-sm" id="maes_estado">
											</select>
				  		        		</div>
			      		    		</div>  
								</div>
			      		    </div>
			      		    <div class="col-lg-6">
								<div class="row">
									<div class="col-lg-12 ml-auto" >
										<div class="text-center form-group" id="div_fotografia_maestro">
											<!--<img src="data:image/jpg;base64," height="260px" width="280px" alt="" />-->
										</div>
									</div>		
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="maes_fotografia" class="col-form-label form-control-sm">FOTOGRAFIA</label>
											<div class="custom-file">
									  			<label id="label_maes_fotografia" class="custom-file-label form-control-sm" for="customFileLang">Seleccionar Archivo .jpg o .bmp</label>
									  			<input type="file" class="custom-file-input form-control-sm" id="maes_fotografia" lang="es" accept=".jpg, .bmp"> 
											</div>
				  		               	</div>
									</div>
								</div>
							</div>    
			      		</div>
			      		<div class="row">
			      		    <div class="col-lg-6">
			      		       	<div class="form-group">
			      		        	<label for="maes_fecha_ingreso" class="col-form-label form-control-sm">FECHA DE INGRESO</label>
			      		        	<input type="date" class="form-control form-control-sm" id="maes_fecha_ingreso">
			      		        </div>
			      		    </div>    
			      		    <div class="col-lg-6">    
			      		        <div class="form-group">
			      		        	<label for="maes_fecha_cese" class="col-form-label form-control-sm">FECHA DE CESE</label>
			      		        	<input type="date" class="form-control form-control-sm" id="maes_fecha_cese">
			      		        </div>            
			      		    </div>    
			      		</div>   
			      		<div class="row">
			      		    <div class="col-lg-6">
								<div class="form-group">
			      		        	<label for="maes_email" class="col-form-label form-control-sm">CORREO ELECTRONICO</label>
									<div class="input-group mb-3">
										<span class="input-group-text form-control-sm">@</span>
			      		        		<input type="text" class="form-control form-control-sm" id="maes_email" placeholder="john@example.com">
									</div>
								</div>
			      		    </div>
							<div class="col-lg-6">
				  		        <div class="form-group">
									<label for="maes_perfil_evaluacion" class="col-form-label form-control-sm">PERFIL</label>
						            <select class="form-control form-control-sm" id="maes_perfil_evaluacion">
									</select>
								</div> 
			      		    </div>    
				      	</div>
						<div class="row">
			      		    <div class="col-lg-12">
				  		        <div class="form-group">
									<label for="maes_direccion" class="col-form-label form-control-sm">DIRECCION</label>
						        	<input type="text" class="form-control text-uppercase form-control-sm" id="maes_direccion" maxlength="130">
								</div> 
			      		    </div>    
			      		</div>  
						  <div class="row">
			      		    <div class="col-lg-6">
				  		        <div class="form-group">
						        	<label for="maes_distrito" class="col-form-label form-control-sm">DISTRITO</label>
						        	<select class="form-control form-control-sm" id="maes_distrito">
									</select>
				  		        </div> 
			      		    </div>    
			      		</div>
			      	</div>
			      	<div class="modal-footer">
			      		<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
			      		<button type="submit" id="btn_guardar_maestro" class="btn btn-dark btn-sm">Guardar</button>
			      	</div>
			    </form>    
			</div>
		</div>
	</div>  			

	<!--Modal para CRUD FOTOGRAFIA-->
	<div class="row modal fade" id="modal_crud_fotografia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel"></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
			        </button>
			    </div>
			      	
				<form id="form_fotografia">    
			      	<div class="modal-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="text-center form-group" id="div_mostrar_fotografia">

								</div>
							</div>		
						</div>
			      	</div>
			      	<div class="modal-footer">
			      		<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cerrar</button>
			      	</div>
			    </form>    
			</div>
		</div>
	</div>  			

</div>
