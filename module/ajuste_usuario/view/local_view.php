
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

	<div class="container-fluid ml-0 mr-0 mb-0">
		<form id="form_ajuste_usuario" enctype="multipart/form-data" action="" method="post">    
			<div class="form-group">
				<div class="row d-flex justify-content-araound">
					<div class="col-lg-6 mx-1">
						<div class="row border border-muted border-radius rounded">
			      		    <div class="col-lg-6">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
						          			<label for="maestro_id" class="col-form-label form-control-sm">DNI</label>
											<input type="text" readonly class="form-control form-control-sm form-control-plaintext" id="maestro_id">
				  		       			</div>
									</div>
								</div>
				  		        <div class="row">
									<div class="col-lg-12">
				  		        		<div class="form-group">
						           			<label for="maes_apellidos_nombres" class="col-form-label form-control-sm">APELLIDOS Y NOMBRES</label>
						           			<input type="text" readonly class="form-control form-control-sm form-control-plaintext" id="maes_apellidos_nombres">
				  		        		</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
				  		        		<div class="form-group">
						           			<label for="usua_nombre_corto" class="col-form-label form-control-sm">1er. NOMBRE Y 1er. APELLIDO</label>
						           			<input type="text" readonly class="form-control form-control-sm form-control-plaintext" id="usua_nombre_corto">
				  		        		</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-8">
				  		        		<div class="form-group">
						           			<label for="maes_cargo_actual" class="col-form-label form-control-sm">CARGO ACTUAL</label>
											<input type="text" readonly class="form-control form-control-sm form-control-plaintext" id="maes_cargo_actual">
						       			</div>               
						    		</div>
									<div class="col-lg-4">
			      		       			<div class="form-group">
			      		        			<label for="maes_fecha_ingreso" class="col-form-label form-control-sm">F. INGRESO</label>
			      		        			<input type="date" readonly class="form-control form-control-sm form-control-plaintext" id="maes_fecha_ingreso">
			      		        		</div>
			      		    		</div>    
								</div>
								<div class="row">
						    		<div class="col-lg-6">
						        		<div class="form-group">
											<label for="maes_perfil_evaluacion" class="col-form-label form-control-sm">PERFIL</label>
						            		<input type="text" readonly class="form-control form-control-sm form-control-plaintext" id="maes_perfil_evaluacion">
										</div> 
			      		    		</div>  
								</div>
			      		    </div>
			      		    <div class="col-lg-6">
								<div class="row">
									<div class="col-lg-12 ml-auto">
										<div class="text-center p-3 mb-3" id="div_fotografia_ajuste_usuario">
											<!--<img src="data:image/jpg;base64," height="260px" width="280px" alt="" />-->
										</div>
									</div>		
								</div>
							</div>
							<div class="col-lg-12">
			      				<div class="row">
			      				    <div class="col-lg-4">
										<div class="form-group">
			      				        	<label for="maes_email" class="col-form-label form-control-sm">CORREO ELECTRONICO</label>
		      		    		    		<input type="text" readonly class="form-control form-control-sm form-control-plaintext" id="maes_email">
										</div>
			      				    </div>
									<div class="col-lg-4">
										<div class="form-group">
				        		       		<label for="usua_usuario_web" class="col-form-label form-control-sm">USUARIO WEB</label>
				        		       		<input type="text" readonly class="form-control form-control-sm form-control-plaintext" id="usua_usuario_web">
										</div>
			      				    </div>
									<div class="col-lg-4">
	      		        		       	<div class="form-group">
	      		        		        	<label for="usua_password" class="col-form-label form-control-sm">PASSWORD</label>
											<div class="input-group">
	      		        		        		<input type="password" name="usua_password" class="form-control form-control-sm" id="usua_password" placeholder="Contraseña" required 	autocomplete="off" disabled>
												<div class="input-group-append">
													<button id="show_password" class="btn btn-primary btn-sm" type="button" onclick="f_mostrar_password()" disabled> <span class="fa fa-eye-slash icon"></span> 	</button>
												</div>
											</div>
	      		        		        </div>
	      		        		    </div>    
				      			</div>
							</div>
							<div class="col-lg-12">
								<div class="row">
			      				    <div class="col-lg-8">
				  				        <div class="form-group">
											<label for="maes_direccion" class="col-form-label form-control-sm">DIRECCION</label>
								        	<input type="text" readonly class="form-control form-control-sm form-control-plaintext" id="maes_direccion">
										</div> 
			      				    </div>    
			      				    <div class="col-lg-4">
				  				        <div class="form-group">
								        	<label for="maes_distrito" class="col-form-label form-control-sm">DISTRITO</label>
								        	<input type="text" readonly class="form-control form-control-sm form-control-plaintext" id="maes_distrito">
				  				        </div> 
			      				    </div>    
			      				</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 mx-1">
						<div class="row border border-muted border-radius rounded">
							<div class="col-lg-12">
			      				<div class="row d-flex justify-content-end align-items-center">
									<div class="p-2 form-group" id="div_btn_ajuste_usuario"> 
										<!-- mostrar_div -->
									</div>
			      				</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>    
	</div>  			

</div>
