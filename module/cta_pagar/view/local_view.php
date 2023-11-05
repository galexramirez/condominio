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
	 		<div class="nav nav-tabs" id="nav-tab-cta_pagar" role="tablist">
				<!-- creacion_tab -->
			</div>
		</nav>

		<div class="tab-content" id="nav-tab-content">

			<!-- TAB cta_pagar -->
			<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
				<form id="form_listado_cta_pagar" class="row col-sm-12 container-fluid" enctype="multipart/form-data" action="" method="post">	    
					<div class="row align-items-end pb-4 col-sm-12">
						<div class="col-lg-1">
			      			<div class="form-group">
								<label for="fecha_inicio_listado" class="col-form-label form-control-sm">F.INICIO</label>
								<input type="date" class="form-control form-control-sm" id="fecha_inicio_listado" placeholder="dd/mm/aaaa" >
			      			</div>
			    		</div>
						<div class="col-lg-1">
			    		  	<div class="form-group">
								<label for="fecha_termino_listado" class="col-form-label form-control-sm">F.TERMINO</label>
								<input type="date" class="form-control form-control-sm" id="fecha_termino_listado" placeholder="dd/mm/aaaa" >
			    		  	</div>
			    		</div>
						<div class="col-lg-2">             	
							<div class="form-group">
								<button type="button" id="btn_buscar_listado"class="btn btn-secondary btn-sm btn_buscar_listado">Buscar</button>
								<button type="button" id="btn_descargar_listado" class="btn btn-secondary btn-sm btn_descargar_listado">Descargar</button>
							</div>
				    	</div>
					</div>
				</form>

				<div class="row p-3">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_listado_cta_pagar">
							<!-- creacion_tabla -->
						</div>
					</div>
				</div>

				<!-- MODAL PARA CRUD cta_pagar -->
				<div class="row modal fade" id="modal_crud_cta_pagar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
	   
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
	  
			  				<form id="form_cta_pagar">    
				  				<div class="modal-body">
					  				<div class="row">
										<div class="col-lg-2">
											<div class="form-group">
												<label for="cta_pagar_id" class="col-form-label form-control-sm">ID</label>
												<input type="text" readonly class="form-control form-control-sm" id="cta_pagar_id">
											</div>
										</div>
										<div class="col-lg-3">
							  				<div class="form-group">
												<label for="cond_tipo" class="col-form-label form-control-sm">TIPO</label>
												<select class="form-control form-control-sm" id="cond_tipo">

												</select>
											</div>
						  				</div>
										<div class="col-lg-7">
											<div class="form-group">
												<label for="cond_nombre" class="col-form-label form-control-sm">NOMBRE</label>
												<input type="text" class="form-control form-control-sm text-uppercase" id="cond_nombre">
											</div> 
									  	</div>
									</div>
									<div class="row">
						  				<div class="col-lg-2">
							  				<div class="form-group">
												<label for="cond_edificio" class="col-form-label form-control-sm">EDIFICIOS</label>
												<input type="number" class="form-control form-control-sm" id="cond_edificio">
											</div>               
						   				</div>
										<div class="col-lg-2">
							  				<div class="form-group">
												<label for="cond_dpto" class="col-form-label form-control-sm">DPTOS</label>
												<input type="number" class="form-control form-control-sm" id="cond_dpto">
											</div>
						  				</div>
						  				<div class="col-lg-2">
							  				<div class="form-group">
												<label for="cond_puerta" class="col-form-label form-control-sm">PUERTAS</label>
												<input type="number" class="form-control form-control-sm" id="cond_puerta">
											</div>               
						   				</div>
										<div class="col-lg-2">
							  				<div class="form-group">
												<label for="cond_estacionamiento" class="col-form-label form-control-sm">ESTACION.</label>
												<input type="number" class="form-control form-control-sm" id="cond_estacionamiento">
											</div>
						  				</div>
										  <div class="col-lg-4">
							  				<div class="form-group">
												<label for="cond_estado" class="col-form-label form-control-sm">ESTADO</label>
												<select class="form-control form-control-sm" id="cond_estado">
													
												</select>
											</div>
						  				</div>
									</div>
									<div class="row">
						  				<div class="col-lg-8">
							  				<div class="form-group">
												<label for="cond_direccion" class="col-form-label form-control-sm">DIRECCION PRINCIPAL</label>
												<input type="text" class="form-control form-control-sm text-uppercase" id="cond_direccion">
											</div>               
						   				</div>
										<div class="col-lg-4">
							  				<div class="form-group">
												<label for="cond_distrito" class="col-form-label form-control-sm">DISTRITO</label>
												<select class="form-control form-control-sm" id="cond_distrito">

												</select>
											</div>
						  				</div>
									</div>
									<div class="row">
  										<div class="col-lg-10">
										  	<div class="table-responsive" id="div_tabla_puerta">
												<!-- creacion_tabla -->
											</div>
										</div>
  										<div class="col-lg-2">
											<div class="d-flex justify-content-end">
												<button type="button" id="btn_puerta_cta_pagar" class="btn btn-secondary btn-sm btn_puerta_cta_pagar mt-2">+ Puertas</button>
											</div>
											
										</div>
									</div>
								</div>
								<div class="modal-footer">
					  				<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
					  				<button type="submit" id="btn_guardar_cta_pagar" class="btn btn-dark btn-sm btn_guardar_cta_pagar">Guardar</button>
				  				</div>
			  				</form>    
						</div>
					</div>
				</div>
				<!-- FIN MODAL PARA CRUD cta_pagar -->

				<!-- MODAL PARA CRUD PUERTA cta_pagar -->
				<div class="row modal fade" id="modal_crud_puerta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
			        	<div class="modal-content">
					    	<div class="modal-header">
			                	<h5 class="modal-title_puerta" id="exampleModalLabel_puerta"></h5>
			                	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
			                	</button>
			            	</div>
					  		<form id="form_modal_puerta" enctype="multipart/form-data" action="" method="post">    
			      		    	<div class="modal-body">
									<div class="row align-items-end">
										<div class="col-lg-6">
											<div class="form-group">
								        		<label for="puerta_id" class="col-form-label form-control-sm">CODIGO</label>
												<input type="number" readonly class="form-control form-control-sm" id="puerta_id">
				  				        	</div> 
			      		            	</div>
										<div class="col-lg-6">
											<div class="form-group">
								        		<label for="pta_nombre" class="col-form-label form-control-sm">DESCRIPCION</label>
												<input type="text" class="form-control text-uppercase form-control-sm" id="pta_nombre">
				  				        	</div> 
			      		            	</div>
									</div>  
									<div class="row align-items-end">
										<div class="col-lg-12">
											<div class="form-group">
								    			<label for="pta_direccion" class="col-form-label form-control-sm">DIRECCION</label>
												<input type="text" class="form-control form-control-sm text-uppercase" id="pta_direccion">
				  				    		</div> 
			      		            	</div>
									</div>
								</div>
			      		    	<div class="modal-footer">
								  	<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
			      					<button type="submit" id="btn_guardar_puerta" class="btn btn-dark btn-sm btn_guardar_puerta">Agregar</button>
								</div>
							</form>
			        	</div>
			    	</div>
				</div>
				<!-- FIN MODAL CRUD PUERTA cta_pagar -->


			</div>

			<!-- TAB EDIFICIO -->
			<div class="tab-pane fade" id="nav-edificio" role="tabpanel" aria-labelledby="nav-tipo_edificio">
				<section class="container-fluid py-3" id="div_btn_seleccion_edificio">
					<!-- botones_formulario -->
				</section>
	
				<div class="row p-3">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_edificio">
							<!-- creacion_tabla -->
						</div>
					</div>
				</div>

				<!-- Modal para CRUD -->
				<div class="row modal fade" id="modal_crud_edificio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			    	<div class="modal-dialog" role="document">
			        	<div class="modal-content">
			           
					    	<div class="modal-header">
			                	<h5 class="modal-title" id="exampleModalLabel"></h5>
			                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
			                	</button>
			            	</div>
			      	
					  		<form id="form_edificio">    
			      		    	<div class="modal-body">
			      		        	<div class="row">
			      		            	<div class="col-lg-6">
				  		                	<div class="form-group">
						                  		<label for="edificio_id" class="col-form-label form-control-sm">EDIFICIO ID</label>
						                   		<input type="text" class="form-control form-control-sm" id="edificio_id">
				  		               		</div>
			      		            	</div>
			      		            	<div class="col-lg-6">
				  		                	<div class="form-group">
						                   		<label for="edi_descripcion" class="col-form-label form-control-sm">DESCRIPCION</label>
												<input type="text" class="form-control form-control-sm text-uppercase" id="edi_descripcion">
											</div>               
						           		</div>
			      		        	</div>
			      		        	<div class="row"> 
									  	<div class="col-lg-12">
				  		                	<div class="form-group">
						                		<label for="edi_cta_pagar_nombre" class="col-form-label form-control-sm">cta_pagar</label>
												<select class="form-control form-control-sm" id="edi_cta_pagar_nombre">

												</select>
											</div> 
			      		            	</div>    
									</div>  
									<div class="row"> 
			      		            	<div class="col-lg-4">
				  		                	<div class="form-group">
												<label for="edi_piso" class="col-form-label form-control-sm">PISOS</label>
												<input type="number" class="form-control form-control-sm" id="edi_piso">
											</div>               
						           		</div>
										<div class="col-lg-4">
				  		                	<div class="form-group">
												<label for="edi_dpto" class="col-form-label form-control-sm">DPTOS.</label>
												<input type="number" class="form-control form-control-sm" id="edi_dpto">
											</div>               
						           		</div>
										<div class="col-lg-4">
				  		                	<div class="form-group">
												<label for="edi_estado" class="col-form-label form-control-sm">ESTADO</label>
												<select class="form-control form-control-sm" id="edi_estado">

												</select>
											</div>               
						           		</div>
									</div>  
								</div>
			      		    	<div class="modal-footer">
			      		        	<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
			      		        	<button type="submit" id="btn_guardar_edificio" class="btn btn-dark btn-sm btn_guardar_edificio">Guardar</button>
			      		    	</div>
			      			</form>    
			        	
						</div>
			    	</div>
				</div>  			

			</div>

			<!-- TAB DEPARTAMENTO -->
			<div class="tab-pane fade" id="nav-departamento" role="tabpanel" aria-labelledby="nav-departamento-tab">
				<section class="container-fluid py-3" id="div_btn_seleccion_departamento">
					<!-- botones_formulario -->
				</section>
	
				<div class="row p-3">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_departamento">
							<!-- creacion_tabla-->
						</div>
    				</div>
				</div>

				<!--Modal para CRUD-->
				<div class="row modal fade" id="modal_crud_departamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			    	<div class="modal-dialog" role="document">
			        	<div class="modal-content">
						    <div class="modal-header">
				                <h5 class="modal-title" id="exampleModalLabel"></h5>
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				                </button>
			    	        </div>
						  	<form id="form_departamento">    
			      			    <div class="modal-body">
			      			        <div class="row">
			      			            <div class="col-lg-6">
				  		    	            <div class="form-group">
						        	          	<label for="departamento_id" class="col-form-label form-control-sm">ID</label>
						            	       	<input type="text" class="form-control form-control-sm" id="departamento_id">
				  		               		</div>
				      		            </div>
				      		            <div class="col-lg-6">
					  		                <div class="form-group">
							                   <label for="dpto_descripcion" class="col-form-label form-control-sm">DESCRIPCION</label>
							                   <input type="text" class="form-control form-control-sm text-uppercase" id="dpto_descripcion">
				  			                </div> 
			      		    	        </div>    
			      		        	</div>
				      		        <div class="row"> 
				      		            <div class="col-lg-12">
					  		                <div class="form-group">
							                   	<label for="dpto_cta_pagar_nombre" class="col-form-label form-control-sm">NOMBRE DE cta_pagar</label>
							                   	<select class="form-control form-control-sm" id="dpto_cta_pagar_nombre">

												</select>
							               	</div>               
						    	       </div>
				      		        </div>
									<div class="row"> 
				      		            <div class="col-lg-6">
					  		                <div class="form-group">
							                   	<label for="dpto_edificio_descripcion" class="col-form-label form-control-sm">DESCRIPCION DE EDIFICIO</label>
							                   	<select class="form-control form-control-sm" id="dpto_edificio_descripcion">

												</select>
							               	</div>               
						    	       </div>
						        	       	<div class="col-lg-6">
						            	      	<div class="form-group">
						                	   	<label for="dpto_piso" class="col-form-label form-control-sm">NRO. DE PISO</label>
						                   		<input type="number" class="form-control form-control-sm" id="dpto_piso">
					  		                </div>
				      		            </div>  
				      		        </div>
									<div class="row"> 
										<div class="col-lg-6">
						            	    <div class="form-group">
						                	   	<label for="dpto_dimensiones" class="col-form-label form-control-sm">DIMENSIONES</label>
						                   		<input type="text" class="form-control form-control-sm" id="dpto_dimensiones">
					  		                </div>
				      		            </div>  
										<div class="col-lg-6">
					  		                <div class="form-group">
							                   	<label for="dpto_estado" class="col-form-label form-control-sm">ESTADO</label>
							                   	<select class="form-control form-control-sm" id="dpto_estado">

												</select>
							               	</div>               
						    	       </div>
				      		        </div>

								</div>
			      			    <div class="modal-footer">
			      			        <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
			      		    	    <button type="submit" id="btn_guardar_dpto" class="btn btn-dark btn-sm btn_guardar_dpto">Guardar</button>
			      		    	</div>
			      			</form>    
			        	</div>
			    	</div>
				</div>

			</div>

			<!-- TAB RESIDENTE -->
			<div class="tab-pane fade" id="nav-residente" role="tabpanel" aria-labelledby="nav-residente-tab">
				<section class="container-fluid py-3" id="div_btn_seleccion_residente">
					<!-- botones_formulario -->
				</section>

				<div class="row p-3">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_residente">
							<!-- creaacion_tabla -->
						</div>
    				</div>
				</div>

				<!--Modal para CRUD-->
				<div class="row modal fade" id="modal_crud_residente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			    	<div class="modal-dialog" role="document">
			        	<div class="modal-content">
						    <div class="modal-header">
				                <h5 class="modal-title" id="exampleModalLabel"></h5>
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				                </button>
			    	        </div>
						  	<form id="form_residente">    
				      		    <div class="modal-body">
				      		        <div class="row">
				      		            <div class="col-lg-6">
					  		                <div class="form-group">
							                  	<label for="residente_id" class="col-form-label form-control-sm">ID</label>
							                   	<input type="text" readonly class="form-control form-control-sm" id="residente_id">
				  		        	       	</div>
			      		            	</div>
									</div>
			      		        	<div class="row">
				      		            <div class="col-lg-12">
					  		                <div class="form-group">
							                	<label for="resi_nombre" class="col-form-label form-control-sm">RESIDENTE</label>
												<select class="form-control form-control-sm" id="resi_nombre">
												</select>
				  			                </div> 
			      			            </div>    
			      		    	    </div>
			      		        	<div class="row"> 
			      		            	<div class="col-lg-12">
				  		                	<div class="form-group">
						                   		<label for="resi_cta_pagar_nombre" class="col-form-label form-control-sm">cta_pagar</label>
											   	<select class="form-control form-control-sm" id="resi_cta_pagar_nombre">
												</select>
						               		</div>               
						           		</div>
									</div>
			      		        	<div class="row">
						               	<div class="col-lg-6">
						                  	<div class="form-group">
						                   		<label for="resi_edificio_descripcion" class="col-form-label form-control-sm">EDIFICIO</label>
						                   		<select class="form-control form-control-sm" id="resi_edificio_descripcion">
												</select>
				  		                	</div>
			      		            	</div>  
			      		            	<div class="col-lg-6">
				  		                	<div class="form-group">
												<label for="resi_departamento_id" class="col-form-label form-control-sm">DPTO</label>
						                   		<select class="form-control form-control-sm" id="resi_departamento_id">
												</select>										  
						               		</div>               
						           		</div>
									</div>
									<div class="row">
						               	<div class="col-lg-6">
						                  	<div class="form-group">
						                   		<label for="resi_fecha_inicio" class="col-form-label form-control-sm">FECHA INICIO</label>
						                   		<input type="date" class="form-control form-control-sm" id="resi_fecha_inicio">
				  		                	</div>
			      		            	</div>  
										<div class="col-lg-6">
						                  	<div class="form-group">
						                   		<label for="resi_fecha_fin" class="col-form-label form-control-sm">FECHA TERMINO</label>
						                   		<input type="date" class="form-control form-control-sm" id="resi_fecha_fin">
				  		                	</div>
			      		            	</div>  
									</div>
									<div class="row"> 
			      		            	<div class="col-lg-6">
				  		                	<div class="form-group">
												<label for="resi_tipo" class="col-form-label form-control-sm">TIPO RESIDENTE</label>
						                   		<select class="form-control form-control-sm" id="resi_tipo">
												</select>										  
						               		</div>               
						           		</div>
										   <div class="col-lg-6">
				  		                	<div class="form-group">
												<label for="resi_estado" class="col-form-label form-control-sm">ESTADO</label>
						                   		<select class="form-control form-control-sm" id="resi_estado">
												</select>										  
						               		</div>               
						           		</div>
			      		        	</div>
								</div>
			      		    	<div class="modal-footer">
			      		        	<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
			      		        	<button type="submit" id="btn_guardar_residente" class="btn btn-dark btn-sm btn_guardar_resiente">Guardar</button>
			      		    	</div>
			      			</form>    
			        	</div>
			    	</div>
				</div>  			
			</div>

			<!-- TAB JUNTA DIRECTIVA -->
			<div class="tab-pane fade" id="nav-directiva" role="tabpanel" aria-labelledby="nav-directiva-tab">
				<section class="container-fluid py-3" id="div_btn_seleccion_directiva">
					<!-- botones_formulario -->
				</section>

				<div class="row p-3">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_directiva">
							<!-- creacion_tabla -->
						</div>
    				</div>
				</div>

				<!-- MODAL PARA CRUD DIRECTIVA -->
				<div class="row modal fade" id="modal_crud_directiva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
	   
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
	  
			  				<form id="form_directiva" enctype="multipart/form-data" action="" method="post" onsubmit="return false;">
				  				<div class="modal-body">
					  				<div class="row">
										<div class="col-lg-2">
											<div class="form-group">
												<label for="directiva_id" class="col-form-label form-control-sm">ID</label>
												<input type="number" readonly class="form-control form-control-sm" id="directiva_id">
											</div>
										</div>
										<div class="col-lg-3">
							  				<div class="form-group">
												<label for="dire_tipo" class="col-form-label form-control-sm">TIPO</label>
												<select class="form-control form-control-sm" id="dire_tipo">

												</select>
											</div>
						  				</div>
										<div class="col-lg-7">
							  				<div class="form-group">
												<label for="dire_descripcion" class="col-form-label form-control-sm">NOMBRE DE DIRECTIVA</label>
												<input type="text" class="form-control form-control-sm text-uppercase" maxlength="100" id="dire_descripcion">
											</div>
						  				</div>
									</div>
									<div class="row">
						  				<div class="col-lg-9">
							  				<div class="form-group">
												<label for="dire_cta_pagar_nombre" class="col-form-label form-control-sm">cta_pagar</label>
												<select class="form-control form-control-sm" id="dire_cta_pagar_nombre">
												</select>
											</div>               
						   				</div>
										   <div class="col-lg-3">
							  				<div class="form-group">
												<label for="dire_edificio_descripcion" class="col-form-label form-control-sm">EDIFICIO</label>
												<select class="form-control form-control-sm" id="dire_edificio_descripcion">
												</select>
											</div>               
						   				</div>
									</div>
									<div class="row">
										<div class="col-lg-3">
							  				<div class="form-group">
												<label for="dire_fecha_inicio" class="col-form-label form-control-sm">FECHA INICIO</label>
												<input type="date" class="form-control form-control-sm" id="dire_fecha_inicio">
											</div>
						  				</div>
						  				<div class="col-lg-3">
							  				<div class="form-group">
												<label for="dire_fecha_fin" class="col-form-label form-control-sm">FECHA TERMINO</label>
												<input type="date" class="form-control form-control-sm" id="dire_fecha_fin">
											</div>               
						   				</div>
										<div class="col-lg-3">
											<div>
												<label for="dire_estado" class="col-form-label form-control-sm">ESTADO</label>
												<select class="form-control form-control-sm" id="dire_estado">													
												</select>
											</div>
										</div>
										<div class="col-lg-3 d-flex align-items-end flex-column mb-3">
											<div class="form-group mt-4 p-2">
												<button type="button" id="btn_directiva_miembro" class="btn btn-secondary btn-sm btn_directiva_miembro">+ Miembros</button>
											</div>
										</div>
									</div>
									<div class="row">
  										<div class="col-lg-12">
										  	<div class="table-responsive" id="div_tabla_miembro">
												<!-- creacion_tabla -->
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
					  				<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
					  				<button type="button" id="btn_guardar_directiva" class="btn btn-dark btn-sm btn_guardar_directiva">Guardar</button>
				  				</div>
			  				</form>    
						</div>
					</div>
				</div>
				<!-- FIN MODAL PARA CRUD DIRECTIVA -->

				<!-- MODAL PARA CRUD MIEMBRO -->
				<div class="row modal fade" id="modal_crud_miembro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
			        	<div class="modal-content">
					    	<div class="modal-header">
			                	<h5 class="modal-title_miembro" id="exampleModalLabel_miembro"></h5>
			                	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
			                	</button>
			            	</div>
					  		<form id="form_modal_miembro" enctype="multipart/form-data" action="" method="post" onsubmit="return false;">    
			      		    	<div class="modal-body">
									<div class="row align-items-end">
										<div class="col-lg-6">
											<div class="form-group">
								        		<label for="dm_cargo" class="col-form-label form-control-sm">CARGO</label>
												<select class="form-control form-control-sm" id="dm_cargo">
												</select>
				  				    		</div> 
			      		            	</div>
										<div class="col-lg-6">
											<div class="form-group">
								        		<label for="dm_dni" class="col-form-label form-control-sm">DNI</label>
												<input type="number" readonly class="form-control form-control-sm" id="dm_dni">
				  				        	</div> 
			      		            	</div>
									</div>  
									<div class="row align-items-end">
										<div class="col-lg-12">
											<div class="form-group">
								        		<label for="dm_miembro_nombre" class="col-form-label form-control-sm">MIEMBRO</label>
												<select class="form-control form-control-sm" id="dm_miembro_nombre">
												</select>
				  				    		</div> 
			      		            	</div>
									</div>
									<div class="row align-items-end">
										<div class="col-lg-12">
											<div class="form-group">
								        		<label for="dm_cta_pagar_nombre" class="col-form-label form-control-sm">cta_pagar</label>
												<input type="text" readonly class="form-control form-control-sm" id="dm_cta_pagar_nombre">
				  				    		</div> 
			      		            	</div>
									</div>

									<div class="row align-items-end">
										<div class="col-lg-6">
											<div class="form-group">
								    			<label for="dm_edificio_descripcion" class="col-form-label form-control-sm">EDIFICIO</label>
												<select class="form-control form-control-sm" id="dm_edificio_descripcion">

												</select>
				  				    		</div> 
			      		            	</div>
										  <div class="col-lg-6">
											<div class="form-group">
								    			<label for="dm_departamento_id" class="col-form-label form-control-sm">DEPARTAMENTO</label>
												<select class="form-control form-control-sm" id="dm_departamento_id">

												</select>
				  				    		</div> 
			      		            	</div>
									</div>
								</div>
			      		    	<div class="modal-footer">
								  	<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
			      					<button type="button" id="btn_guardar_miembro" class="btn btn-dark btn-sm btn_guardar_miembro">Agregar</button>
								</div>
							</form>
			        	</div>
			    	</div>
				</div>
				<!-- FIN MODAL CRUD MIEMBRO -->
			</div>

			<!-- TAB AJUSTES cta_pagar -->
			<div class="tab-pane fade" id="nav-ajustes_cta_pagar" role="tabpanel" aria-labelledby="nav-ajustes_cta_pagar-tab">
				<h5 class="pt-3 pl-3">Variables</h5>
				
				<nav>
	 				<div class="nav nav-tabs" id="nav-tab-ajustes_cta_pagar" role="tablist">

					</div>
				</nav>
				
				<div class="tab-content" id="nav-tabContent-ajustes_cta_pagar">

					<!------------------------------------------------------------------------------->
					<!-- TAB AJUSTE VARIABLE DE USUARIO DE cta_pagar ------------------------------->
					<!------------------------------------------------------------------------------->
					<div class="tab-pane fade show active" id="nav-ajustes_cta_pagar_usuario" role="tabpanel" aria-labelledby="nav-ajustes_cta_pagar_usuario-tab">

						<section class="container-fluid py-3">
							<button id="btn_nuevo_tc_cta_pagar_usuario" type="button" class="btn btn-secondary btn-sm btn_nuevo_tc_cta_pagar_usuario" data-toggle="modal">+ Nuevo</button>  
						</section>
						<div class="row p-3">
							<div class="col-auto m-0">
								<div class="table-responsive" id="div_tabla_tc_cta_pagar_usuario">

								</div>
							</div>
						</div>

						<div class="row modal fade" id="modal_crud_tc_cta_pagar_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel"></h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form id="form_tc_cta_pagar_usuario">
						  				<div class="modal-body">
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
												  		<label for="tc_cta_pagar_id_usuario" class="col-form-label form-control-sm">ID</label>
												   		<input type="text" readonly class="form-control form-control-sm" id="tc_cta_pagar_id_usuario">
												 	</div>
											 	</div>
											 	<div class="col-lg-6">
											  		<div class="form-group">
														<label for="cond_cat1_usuario" class="col-form-label form-control-sm">CATEGORIA 1</label>
												   		<input type="text" class="form-control form-control-sm text-uppercase" id="cond_cat1_usuario" maxlength="45">
													</div> 
											 	</div>    
											</div>
							  				<div class="row"> 
												<div class="col-lg-6">
											  		<div class="form-group">
														<label for="cond_cat2_usuario" class="col-form-label form-control-sm">CATEGORIA 2</label>
														<input type="text" class="form-control form-control-sm text-uppercase" id="cond_cat2_usuario" maxlength="45">
													</div> 
								  				</div>
											</div>
											<div class="row"> 
								  				<div class="col-lg-12">
											  		<div class="form-group">
														<label for="cond_cat3_usuario" class="col-form-label form-control-sm">CATEGORIA 3</label>
												  		<textarea class="form-control z-depth-1 text-uppercase" id="cond_cat3_usuario" rows="7" placeholder="escribe algo aqui..." maxlength="250"></textarea>
													</div>               
								   				</div>
							  				</div>
										</div>
						  				<div class="modal-footer">
							  				<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
							  				<button type="submit" id="btn_guardar_tc_cta_pagar_usuario" class="btn btn-dark btn-sm btn_guardar_tc_cta_pagar_usuario">Guardar</button>
						  				</div>
									</form>    
								</div>
							</div>
						</div>  
					
					</div>
					
					<!------------------------------------------------------------------------------->
					<!-- TAB AJUSTE VARIABLE DE SISTEMA DE CONSOMINIO ------------------------------->
					<!------------------------------------------------------------------------------->
					<div class="tab-pane fade" id="nav-ajustes_cta_pagar_sistema" role="tabpanel" aria-labelledby="nav-ajustes_cta_pagar_sistema-tab">

						<section class="container-fluid py-3">
							<button id="btn_nuevo_tc_cta_pagar_sistema" type="button" class="btn btn-secondary btn-sm btn_nuevo_tc_cta_pagar_sistema" data-toggle="modal">+ Nuevo</button>  
						</section>
						<div class="row p-3">
							<div class="col-auto m-0">
								<div class="table-responsive" id="div_tabla_tc_cta_pagar_sistema">

								</div>
							</div>
						</div>

						<div class="row modal fade" id="modal_crud_tc_cta_pagar_sistema" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel"></h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form id="form_tc_cta_pagar_sistema">
						  				<div class="modal-body">
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
												  		<label for="tc_cta_pagar_id_sistema" class="col-form-label form-control-sm">ID</label>
												   		<input type="text" readonly class="form-control form-control-sm" id="tc_cta_pagar_id_sistema">
												 	</div>
											 	</div>
											 	<div class="col-lg-6">
											  		<div class="form-group">
														<label for="cond_cat1_sistema" class="col-form-label form-control-sm">CATEGORIA 1</label>
												   		<input type="text" class="form-control form-control-sm text-uppercase" id="cond_cat1_sistema" maxlength="45">
													</div> 
											 	</div>    
											</div>
							  				<div class="row"> 
												<div class="col-lg-6">
											  		<div class="form-group">
														<label for="cond_cat2_sistema" class="col-form-label form-control-sm">CATEGORIA 2</label>
														<input type="text" class="form-control form-control-sm text-uppercase" id="cond_cat2_sistema" maxlength="45">
													</div> 
								  				</div>
											</div>
											<div class="row"> 
								  				<div class="col-lg-12">
											  		<div class="form-group">
														<label for="cond_cat3_sistema" class="col-form-label form-control-sm">CATEGORIA 3</label>
												  		<textarea class="form-control z-depth-1 text-uppercase" id="cond_cat3_sistema" rows="7" placeholder="escribe algo aqui..." maxlength="250"></textarea>
													</div>               
								   				</div>
							  				</div>
										</div>
						  				<div class="modal-footer">
							  				<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
							  				<button type="submit" id="btn_guardar_tc_cta_pagar_sistema" class="btn btn-dark btn-sm btn_guardar_tc_cta_pagar_sistema">Guardar</button>
						  				</div>
									</form>    
								</div>
							</div>
						</div>  

					</div>
				</div>
			</div>
		</div>
	
	</div>
</div>