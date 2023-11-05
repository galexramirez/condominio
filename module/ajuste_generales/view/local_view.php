<!-- 2.2 CONTENIDO DE MODULO -->
<div  id="contenido" class="my-contenido-con-sidebar  p-0">
		
	<nav class="navbar navbar-light bg-light p-0">
		<div class="container-fluid">

			<a class="navbar-brand text-muted" href="#">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
 			 	<path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
				</svg>
				<?= $NombreDeModuloVista ?>
			</a>
		</div>
	</nav>

	<!-- Contenido para el Modulo -->
	<div class="my-contenidoModulo container-fluid pl-0 pr-0 ml-0 mr-0">

		<nav>
	 		<div class="nav nav-tabs" id="nav-tab-ajuste_generales" role="tablist">
				<!-- creacion_tab -->
			</div>
		</nav>

		<div class="tab-content" id="nav-tabContent">

			<!-- TAB ROLES DE ROLES -->
			<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

				<section class="container-fluid py-3" id="div_btn_seleccion_roles">
					<!-- botones_formulario -->
				</section>

				<div class="row p-3">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_roles">
							<!-- creacion_tabla -->
						</div>
					</div>
				</div>

				<!--Modal para CRUD-->
				<div class="row modal fade" id="modal_crud_roles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
	   
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
	  
			  				<form id="form_roles">    
				  				<div class="modal-body">
					  				<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="roles_id" class="col-form-label form-control-sm">ID</label>
												<input type="text" class="form-control form-control-sm" id="roles_id" disabled>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="roles_dni" class="col-form-label form-control-sm">Nro. DNI</label>
												<input type="text" class="form-control form-control-sm" id="roles_dni" maxlength="8">
											</div> 
									  	</div>    
					  				</div>
					  				<div class="row"> 
										<div class="col-lg-12">
							  				<div class="form-group">
												<label for="roles_apellidos_nombres" class="col-form-label form-control-sm">APELLIDOS Y NOMBRES</label>
												<input type="text" readonly class="form-control form-control-sm" id="roles_apellidos_nombres">
											</div>
						  				</div>
									</div>
									<div class="row">
						  				<div class="col-lg-6">
							  				<div class="form-group">
												<label for="roles_nombre_corto" class="col-form-label form-control-sm">NOMBRE CORTO</label>
												<input type="text" readonly class="form-control form-control-sm" id="roles_nombre_corto">
											</div>               
						   				</div>
										<div class="col-lg-6">
							  				<div class="form-group">
												<label for="roles_perfil" class="col-form-label form-control-sm">PERFIL</label>
												<input type="text" class="form-control form-control-sm" id="roles_perfil">
											</div>
						  				</div>
									</div>
								</div>
								<div class="modal-footer">
					  				<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
					  				<button type="submit" id="btn_guardar_roles" class="btn btn-dark btn-sm btn_guardar_roles">Guardar</button>
				  				</div>
			  				</form>    
						</div>
					</div>
				</div>  			
			</div>

			<!-- TAB TIPO DE CAMBIO -->
			<div class="tab-pane fade" id="nav-tipo_cambio" role="tabpanel" aria-labelledby="nav-tipo_cambio-tab">
				<section class="container-fluid py-3" id="div_btn_seleccion_tipo_cambio">
					<!-- botones_formulario -->
				</section>
	
				<div class="row p-3">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_tipo_cambio">
							<!-- creacion_tabla -->
						</div>
					</div>
				</div>

				<!-- Modal para CRUD -->
				<div class="row modal fade" id="modal_crud_tipo_cambio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			    	<div class="modal-dialog" role="document">
			        	<div class="modal-content">
			           
					    	<div class="modal-header">
			                	<h5 class="modal-title" id="exampleModalLabel"></h5>
			                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
			                	</button>
			            	</div>
			      	
					  		<form id="form_tipo_cambio">    
			      		    	<div class="modal-body">
			      		        	<div class="row">
			      		            	<div class="col-lg-6">
				  		                	<div class="form-group">
						                  		<label for="tipo_cambio_id" class="col-form-label form-control-sm">NRO. ID</label>
						                   		<input type="text" readonly class="form-control form-control-sm" id="tipo_cambio_id">
				  		               		</div>
			      		            	</div>
			      		            	<div class="col-lg-6">
				  		                	<div class="form-group">
						                		<label for="tcam_fecha" class="col-form-label form-control-sm">FECHA</label>
												<input type="date" class="form-control form-control-sm" id="tcam_fecha">
											</div> 
			      		            	</div>    
			      		        	</div>
			      		        	<div class="row"> 
			      		            	<div class="col-lg-6">
				  		                	<div class="form-group">
						                   		<label for="tcam_moneda" class="col-form-label form-control-sm">MONEDA</label>
												<select class="form-control form-control-sm" id="tcam_moneda">
													<option disabled selected>Selecciona una opción</option>
						    						<option value="DOLARES">DOLARES</option>
							    					<option value="EUROS">EUROS</option>
												</select>
											</div>               
						           		</div>
						               	<div class="col-lg-6">
						                  	<div class="form-group">
						                   		<label for="tcam_tipo" class="col-form-label form-control-sm">TIPO</label>
						                   		<select class="form-control form-control-sm" id="tcam_tipo">
													<option disabled selected>Selecciona una opción</option>
						    						<option value="COMPRA">COMPRA</option>
							    					<option value="VENTA">VENTA</option>
												</select>
				  		                	</div>
			      		            	</div>
									</div>  
									<div class="row"> 
			      		            	<div class="col-lg-6">
				  		                	<div class="form-group">
												<label for="tcam_valor" class="col-form-label form-control-sm">VALOR</label>
												<input type="number" step="any" class="form-control form-control-sm" id="tcam_valor">
											</div>               
						           		</div>
									</div>  
								</div>
			      		    	<div class="modal-footer">
			      		        	<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
			      		        	<button type="submit" id="btn_guardar_tipo_cambio" class="btn btn-dark btn-sm btn_guardar_tipo_cambio">Guardar</button>
			      		    	</div>
			      			</form>    
			        	
						</div>
			    	</div>
				</div>  			

				<!-- Modal para Cargar Tipo Cambio de URL -->
				<div class="row modal fade" id="modal_crud_importar_tipo_cambio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			    	<div class="modal-dialog modal-lg" role="document">
			        	<div class="modal-content">
			           
					    	<div class="modal-header">
			                	<h5 class="modal-title" id="exampleModalLabel"></h5>
			                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
			                	</button>
			            	</div>
			      	
					  		<form id="form_importar_tipo_cambio">    
			      		    	<div class="modal-body">
			      		        	<div class="row">
			      		            	<div class="col-lg-12">
				  		                	<div class="form-group">
						                  		<label for="tcam_url" class="col-form-label form-control-sm">URL</label>
						                   		<input type="text" readonly class="form-control form-control-sm" id="tcam_url">
				  		               		</div>
			      		            	</div>
			      		        	</div>
			      		        	<div class="row"> 
			      		            	<div class="col-lg-3">
				  		                	<div class="form-group">
						                   		<label for="tcam_fecha_inicio" class="col-form-label form-control-sm">FECHA INICIO</label>
												<input type="date" class="form-control form-control-sm" id="tcam_fecha_inicio">
											</div>               
						           		</div>
						               	<div class="col-lg-3">
						                  	<div class="form-group">
						                   		<label for="tcam_fecha_fin" class="col-form-label form-control-sm">FECHA FIN</label>
						                   		<input type="date" class="form-control form-control-sm" id="tcam_fecha_fin">
				  		                	</div>
			      		            	</div>
										<div class="col-lg-3">
						                  	<div class="form-group">
						                   		<label for="tcam_moneda_carga" class="col-form-label form-control-sm">MONEDA</label>
						                   		<input type="text" readonly class="form-control form-control-sm" id="tcam_moneda_carga">
				  		                	</div>
			      		            	</div>
									</div>  
								</div>
			      		    	<div class="modal-footer">
			      		        	<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
			      		        	<button type="submit" id="btn_cargar_tipo_cambio" class="btn btn-dark btn-sm btn_cargar_tipo_cambio">Cargar</button>
			      		    	</div>
			      			</form>    
			        	
						</div>
			    	</div>
				</div>  			

			</div>

			<!-- TAB PERIODO -->
			<div class="tab-pane fade" id="nav-periodo" role="tabpanel" aria-labelledby="nav-periodo-tab">

				<section class="container-fluid py-3">
					<div id="div_btn_nuevo_periodo">

					</div>
				</section>

				<div class="row p-3">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_periodo">
							
						</div>
					</div>
				</div>

				<!--Modal para CRUD-->
				<div class="row modal fade" id="modal_crud_periodo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
	   
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
	  
			  				<form id="form_periodo">    
				  				<div class="modal-body">
					  				<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="periodo_id" class="col-form-label form-control-sm">PERIODO ID</label>
												<input type="text" readonly class="form-control form-control-sm" id="periodo_id">
											</div>
										</div>
					  				</div>
					  				<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="peri_anio" class="col-form-label form-control-sm">AÑO</label>
												<input type="number" class="form-control form-control-sm" id="peri_anio">
											</div> 
									  	</div>    
										  <div class="col-lg-6">
											<div class="form-group">
												<label for="peri_mes" class="col-form-label form-control-sm">MES</label>
												<select class="form-control form-control-sm" id="peri_mes">
													<option value="ENERO">ENERO</option>
													<option value="FEBRERO">FEBRERO</option>
													<option value="MARZO">MARZO</option>
													<option value="ABRIL">ABRIL</option>
													<option value="MAYO">MAYO</option>
													<option value="JUNIO">JUNIO</option>
													<option value="JULIO">JULIO</option>
													<option value="AGOSTO">AGOSTO</option>
													<option value="SETIEMBRE">SETIEMBRE</option>
													<option value="OCTUBRE">OCTUBRE</option>
													<option value="NOVIEMBRE">NOVIEMBRE</option>
													<option value="DICIEMBRE">DICIEMBRE</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row"> 
										<div class="col-lg-6">
							  				<div class="form-group">
												<label for="peri_proceso" class="col-form-label form-control-sm">PROCESO</label>
												<input type='text' class="form-control form-control-sm text-uppercase" id="peri_proceso">
											</div>
						  				</div>
						  				<div class="col-lg-6">
							  				<div class="form-group">
												<label for="peri_descripcion" class="col-form-label form-control-sm">PERIODO</label>
												<input type="text" readonly class="form-control form-control-sm" id="peri_descripcion">
											</div>               
						   				</div>
					  				</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="peri_fecha_inicio" class="col-form-label form-control-sm">FECHA INICIO</label>
												<input type="date" class="form-control form-control-sm" id="peri_fecha_inicio" placeholder="dd/mm/aaaaa">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
											<label for="peri_fecha_termino" class="col-form-label form-control-sm">FECHA TERMINO</label>
												<input type="date" class="form-control form-control-sm" id="peri_fecha_termino" placeholder="dd/mm/aaaaa">
											</div> 
									  	</div>    
					  				</div>

								</div>
				  				<div class="modal-footer">
					  				<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
					  				<button type="submit" id="btn_guardar:periodo" class="btn btn-dark btn-sm btn_guardar_periodo">Guardar</button>
				  				</div>
			  				</form>    
						</div>
					</div>
				</div>  			
			</div>

			<!-- TAB MODULOS -->
			<div class="tab-pane fade" id="nav-modulo" role="tabpanel" aria-labelledby="nav-modulo-tab">
				<section class="container-fluid py-3" id="div_btn_seleccion_modulo">
					<!-- botones_formulario -->
				</section>
	
				<div class="row p-3">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_modulo">
							<!-- creacion_tabla-->
						</div>
    				</div>
				</div>

				<!--Modal para CRUD-->
				<div class="row modal fade" id="modal_crud_modulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			    	<div class="modal-dialog" role="document">
			        	<div class="modal-content">
						    <div class="modal-header">
				                <h5 class="modal-title" id="exampleModalLabel"></h5>
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				                </button>
			    	        </div>
						  	<form id="form_modulo">    
			      			    <div class="modal-body">
			      			        <div class="row">
			      			            <div class="col-lg-6">
				  		    	            <div class="form-group">
						        	          	<label for="modulo_id" class="col-form-label form-control-sm">ID</label>
						            	       	<input type="text" readonly class="form-control form-control-sm" id="modulo_id">
				  		               		</div>
				      		            </div>
				      		            <div class="col-lg-6">
					  		                <div class="form-group">
							                   <label for="mod_nombre" class="col-form-label form-control-sm">NOMBRE</label>
							                   <input type="text" class="form-control form-control-sm" id="mod_nombre">
				  			                </div> 
			      		    	        </div>    
			      		        	</div>
				      		        <div class="row"> 
				      		            <div class="col-lg-12">
					  		                <div class="form-group">
							                   	<label for="mod_nombre_vista" class="col-form-label form-control-sm">NOMBRE DE VISTA</label>
							                   	<input type="text" class="form-control form-control-sm" id="mod_nombre_vista">
							               	</div>               
						    	       </div>
				      		        </div>
				      		        <div class="row"> 
				      		            <div class="col-lg-6">
					  		                <div class="form-group">
							                   	<label for="mod_tipo" class="col-form-label form-control-sm">TIPO</label>
							                   	<select type="text" class="form-control form-control-sm" id="mod_tipo">
												   <option value="Modulo">Modulo</option>
        											<option value="Plegable">Plegable</option>
												</select>
							               	</div>               
						    	       </div>
									   <div class="col-lg-6">
					  		                <div class="form-group">
							                   	<label for="mod_plegable" class="col-form-label form-control-sm">MENU PLEGABLE</label>
							                   	<input type="text" class="form-control form-control-sm" id="mod_plegable" maxlength="25">
							               	</div>               
						    	       </div>
									</div>
									<div class="row"> 
						        	    <div class="col-lg-12">
						            	    <div class="form-group">
						                	   	<label for="mod_icono" class="col-form-label form-control-sm">LINK DE ICONO</label>
						                   		<input type="text" class="form-control form-control-sm" id="mod_icono">
					  		                </div>
				      		            </div>  
				      		        </div>

			    	  		    </div>
			      			    <div class="modal-footer">
			      			        <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
			      		    	    <button type="submit" id="btn_guardar_modelo" class="btn btn-dark btn-sm btn_guardar_modelo">Guardar</button>
			      		    	</div>
			      			</form>    
			        	</div>
			    	</div>
				</div>

			</div>

			<!-- TAB PERMISOS -->
			<div class="tab-pane fade" id="nav-permisos" role="tabpanel" aria-labelledby="nav-permisos-tab">
				<section class="container-fluid py-3" id="div_btn_seleccion_permisos">
					<!-- botones_formulario -->
				</section>

				<div class="row p-3">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_permisos">
							<!-- creaacion_tabla -->
						</div>
    				</div>
				</div>

				<!--Modal para CRUD-->
				<div class="row modal fade" id="modal_crud_permisos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			    	<div class="modal-dialog" role="document">
			        	<div class="modal-content">
						    <div class="modal-header">
				                <h5 class="modal-title" id="exampleModalLabel"></h5>
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				                </button>
			    	        </div>
						  	<form id="form_permisos">    
				      		    <div class="modal-body">
				      		        <div class="row">
				      		            <div class="col-lg-6">
					  		                <div class="form-group">
							                  	<label for="permiso_id" class="col-form-label form-control-sm">ID</label>
							                   	<input type="text" readonly class="form-control form-control-sm" id="permiso_id">
				  		        	       	</div>
			      		            	</div>
				      		            <div class="col-lg-6">
					  		                <div class="form-group">
							                	<label for="per_usuario_id" class="col-form-label form-control-sm">DNI</label>
												<input type="text" class="form-control form-control-sm" id="per_usuario_id" maxlength="8">
				  			                </div> 
			      			            </div>    
			      		    	    </div>
			      		        	<div class="row"> 
										<div class="col-lg-6">
					  		                <div class="form-group">
							                	<label for="per_nombre_corto" class="col-form-label form-control-sm">USUARIO</label>
												<input type="text" readonly class="form-control form-control-sm" id="per_nombre_corto">
				  			                </div> 
			      			            </div>    
										<div class="col-lg-6">
				  		                	<div class="form-group">
						                   		<label for="per_modulo_nombre" class="col-form-label form-control-sm">MODULO</label>
											   	<select class="form-control form-control-sm" id="per_modulo_nombre">
												</select>
						               		</div>               
						           		</div>
			      		        	</div>
			      		        	<div class="row"> 
			      		            	<div class="col-lg-6">
				  		                	<div class="form-group">
												<label for="per_modulo_inicio" class="col-form-label form-control-sm">MODULO DE INICIO</label>
						                   		<select class="form-control form-control-sm" id="per_modulo_inicio">
								   					<option disabled selected>Selecciona una opción</option>
						    						<option value="NO">NO</option>
							    					<option value="SI">SI</option>
												</select>										  
						               		</div>               
						           		</div>
			      		        	</div>
								</div>
			      		    	<div class="modal-footer">
			      		        	<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
			      		        	<button type="submit" id="btn_guardar_permisos" class="btn btn-dark btn-sm btn_guardar_permisos">Guardar</button>
			      		    	</div>
			      			</form>    
			        	</div>
			    	</div>
				</div>  			
			</div>

			<!-- TAB OBJETOS -->
			<div class="tab-pane fade" id="nav-objeto" role="tabpanel" aria-labelledby="nav-objeto-tab">
				<section class="container-fluid py-3" id="div_btn_seleccion_objeto">
					<!-- botones_formulario -->
				</section>

				<div class="row p-3">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_objeto">
							<!-- creacion_tabla -->
						</div>
    				</div>
				</div>

				<!--Modal para CRUD-->
				<div class="row modal fade" id="modal_crud_objeto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
	   
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
	  
			  				<form id="form_objeto">
				  				<div class="modal-body">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
										  		<label for="objeto_id" class="col-form-label form-control-sm">ID</label>
										   		<input type="text" readonly class="form-control form-control-sm" id="objeto_id">
										 	</div>
									 	</div>
									 	<div class="col-lg-6">
									  		<div class="form-group">
												<label for="obj_nombre_modulo" class="col-form-label form-control-sm">MODULO</label>
										   		<select class="form-control form-control-sm" id="obj_nombre_modulo">

												</select>
											</div> 
									 	</div>    
									</div>
					  				<div class="row"> 
										<div class="col-lg-12">
									  		<div class="form-group">
												<label for="ob_nombre_objeto" class="col-form-label form-control-sm">NOMBRE</label>
												<input type="text" class="form-control form-control-sm" id="obj_nombre_objeto" maxlength="100">
											</div> 
						  				</div>
									</div>
									<div class="row"> 
						  				<div class="col-lg-12">
									  		<div class="form-group">
												<label for="obj_descripcion" class="col-form-label form-control-sm">DESCRIPCION (Máx.200 caracteres)</label>
										  		<textarea class="form-control z-depth-1 text-uppercase form-control-sm" id="obj_descripcion" rows="7" placeholder="escribe algo aqui..." maxlength="200"></textarea>
											</div>               
						   				</div>
					  				</div>
								</div>
				  				<div class="modal-footer">
					  				<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
					  				<button type="submit" id="btn_guardar_objeto" class="btn btn-dark btn-sm btn_guardar_objeto">Guardar</button>
				  				</div>
			  				</form>    
						</div>
					</div>
				</div>
			</div>

			<!-- TAB CONTROL DE ACCESOS -->
			<div class="tab-pane fade" id="nav-control_acceso" role="tabpanel" aria-labelledby="nav-control_acceso-tab">
				<section class="container-fluid py-3" id="div_btn_seleccion_control_acceso">
					<!-- botones_formulario -->
				</section>

				<div class="row p-3">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_control_acceso">
							
						</div>
    				</div>
				</div>

				<!--Modal para CRUD-->
				<div class="row modal fade" id="modal_crud_control_acceso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			    	<div class="modal-dialog" role="document">
			        	<div class="modal-content">
						    <div class="modal-header">
				                <h5 class="modal-title" id="exampleModalLabel"></h5>
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				                </button>
			    	        </div>
						  	<form id="form_control_acceso">
				      		    <div class="modal-body">
				      		        <div class="row">
				      		            <div class="col-lg-6">
					  		                <div class="form-group">
							                  	<label for="control_acceso_id" class="col-form-label form-control-sm">ID</label>
							                   	<input type="text" readonly class="form-control form-control-sm" id="control_acceso_id">
				  		        	       	</div>
			      		            	</div>
				      		            <div class="col-lg-6">
					  		                <div class="form-group">
							                	<label for="cacces_perfil" class="col-form-label form-control-sm">PERFIL</label>
												<select class="form-control form-control-sm" id="cacces_perfil">
												</select>
				  			                </div> 
			      			            </div>    
			      		    	    </div>
			      		        	<div class="row"> 
			      		            	<div class="col-lg-6">
				  		                	<div class="form-group">
						                   		<label for="cacces_nombre_modulo" class="col-form-label form-control-sm">MODULO</label>
											   	<select class="form-control form-control-sm" id="cacces_nombre_modulo">
												
												</select>
						               		</div>               
						           		</div>
						               	<div class="col-lg-6">
						                  	<div class="form-group">
						                   		<label for="cacces_nombre_objeto" class="col-form-label form-control-sm">OBJETO</label>
						                   		<select class="form-control form-control-sm" id="cacces_nombre_objeto">

												</select>
				  		                	</div>
			      		            	</div>  
			      		        	</div>
			      		        	<div class="row"> 
			      		            	<div class="col-lg-6">
				  		                	<div class="form-group">
												<label for="cacces_acceso" class="col-form-label form-control-sm">Acceso</label>
						                   		<select class="form-control form-control-sm" id="cacces_acceso">
								   					<option disabled selected>Selecciona una opción</option>
						    						<option value="NO">NO</option>
							    					<option value="SI">SI</option>
												</select>										  
						               		</div>               
						           		</div>
			      		        	</div>
								</div>
			      		    	<div class="modal-footer">
			      		        	<button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
			      		        	<button type="submit" id="btn_guardar_control_accesos" class="btn btn-dark">Guardar</button>
			      		    	</div>
			      			</form>    
			        	</div>
			    	</div>
				</div>  			
			</div>

			<!-- TAB TC_MAESTRO -->
			<div class="tab-pane fade" id="nav-tc_maestro" role="tabpanel" aria-labelledby="nav-tc_maestro-tab">
				<section class="container-fluid py-3" id="div_btn_seleccion_tc_maestro">
					<!-- botones_formulario -->
				</section>

				<div class="row p-3">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_tc_maestro">
							<!-- creacion_tabla -->
						</div>
    				</div>
				</div>

				<!--Modal para CRUD-->
				<div class="row modal fade" id="modal_crud_tc_maestro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
	   
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
	  
			  				<form id="form_tc_maestro">
				  				<div class="modal-body">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
										  		<label for="tc_maestro_id" class="col-form-label form-control-sm">ID</label>
										   		<input type="text" readonly class="form-control form-control-sm" id="tc_maestro_id">
										 	</div>
									 	</div>
									 	<div class="col-lg-6">
									  		<div class="form-group">
												<label for="tc_maestro_categoria1" class="col-form-label form-control-sm">CATEGORIA 1</label>
										   		<input type="text" class="form-control text-uppercase form-control-sm" id="tc_maestro_categoria1" maxlength="45">
											</div> 
									 	</div>    
									</div>
					  				<div class="row"> 
										<div class="col-lg-6">
									  		<div class="form-group">
												<label for="tc_maestro_categoria2" class="col-form-label form-control-sm">CATEGORIA 2</label>
												<input type="text" class="form-control text-uppercase form-control-sm" id="tc_maestro_categoria2" maxlength="45">
											</div> 
						  				</div>
									</div>
									<div class="row"> 
						  				<div class="col-lg-12">
									  		<div class="form-group">
												<label for="tc_maestro_categoria3" class="col-form-label form-control-sm">CATEGORIA 3</label>
										  		<textarea class="form-control z-depth-1 text-uppercase" id="tc_maestro_categoria3" rows="7" placeholder="escribe algo aqui..." maxlength="250"></textarea>
											</div>               
						   				</div>
					  				</div>
								</div>
				  				<div class="modal-footer">
					  				<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
					  				<button type="submit" id="btn_guardar_tc_maestro" class="btn btn-dark">Guardar</button>
				  				</div>
			  				</form>    
						</div>
					</div>
				</div>
			</div>

			<!-- TAB TC_USUARIO -->
			<div class="tab-pane fade" id="nav-tc_usuario" role="tabpanel" aria-labelledby="nav-tc_usuario-tab">
				<section class="container-fluid py-3" id="div_btn_seleccion_tc_usuario">
					<!-- botones_formulario -->
				</section>

				<div class="row p-3">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_tc_usuario">
							<!-- creacion_tabla -->
						</div>
    				</div>
				</div>

				<!--Modal para CRUD-->
				<div class="row modal fade" id="modal_crud_tc_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
	   
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
	  
			  				<form id="form_tc_usuario">
				  				<div class="modal-body">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
										  		<label for="tc_usuario_id" class="col-form-label form-control-sm">ID</label>
										   		<input type="text" readonly class="form-control form-control-sm" id="tc_usuario_id">
										 	</div>
									 	</div>
									 	<div class="col-lg-6">
									  		<div class="form-group">
												<label for="tc_usuario_categoria1" class="col-form-label form-control-sm">CATEGORIA 1</label>
										   		<input type="text" class="form-control text-uppercase form-control-sm" id="tc_usuario_categoria1" maxlength="45">
											</div> 
									 	</div>    
									</div>
					  				<div class="row"> 
										<div class="col-lg-6">
									  		<div class="form-group">
												<label for="tc_usuario_categoria2" class="col-form-label form-control-sm">CATEGORIA 2</label>
												<input type="text" class="form-control text-uppercase form-control-sm" id="tc_usuario_categoria2" maxlength="45">
											</div> 
						  				</div>
									</div>
									<div class="row"> 
						  				<div class="col-lg-12">
									  		<div class="form-group">
												<label for="tc_usuario_categoria3" class="col-form-label form-control-sm">CATEGORIA 3</label>
										  		<textarea class="form-control z-depth-1 text-uppercase form-control-sm" id="tc_usuario_categoria3" rows="7" placeholder="escribe algo aqui..." maxlength="250"></textarea>
											</div>               
						   				</div>
					  				</div>
								</div>
				  				<div class="modal-footer">
					  				<button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
					  				<button type="submit" id="btn_guardar_tc_usuario" class="btn btn-dark btn-sm">Guardar</button>
				  				</div>
			  				</form>    
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>