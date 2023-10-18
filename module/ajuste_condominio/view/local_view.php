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
	 		<div class="nav nav-tabs" id="nav-tab-ajuste_condominio" role="tablist">
				<!-- creacion_tab -->
			</div>
		</nav>

		<div class="tab-content" id="nav-tabContent">

			<!-- TAB TC_CONDOMINIO -->
			<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

			<section class="container-fluid py-3" id="div_btn_seleccion_tc_condominio">
					<!-- botones_formulario -->
				</section>

				<div class="row p-3">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_tc_condominio">
							<!-- creacion_tabla -->
						</div>
    				</div>
				</div>

				<!--Modal para CRUD-->
				<div class="row modal fade" id="modal_crud_tc_condominio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
	   
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
	  
			  				<form id="form_tc_condominio">
				  				<div class="modal-body">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
										  		<label for="tc_condominio_id" class="col-form-label form-control-sm">ID</label>
										   		<input type="text" readonly class="form-control form-control-sm" id="tc_condominio_id">
										 	</div>
									 	</div>
									 	<div class="col-lg-6">
									  		<div class="form-group">
												<label for="tc_condominio_ficha" class="col-form-label form-control-sm">FICHA</label>
										   		<input type="text" class="form-control text-uppercase form-control-sm" id="tc_condominio_ficha" maxlength="45">
											</div> 
									 	</div>    
									</div>
					  				<div class="row"> 
										<div class="col-lg-6">
									  		<div class="form-group">
												<label for="tc_condominio_categoria1" class="col-form-label form-control-sm">CATEGORIA 1</label>
												<input type="text" class="form-control text-uppercase form-control-sm" id="tc_condominio_categoria1" maxlength="45">
											</div> 
						  				</div>
									</div>
									<div class="row"> 
						  				<div class="col-lg-12">
									  		<div class="form-group">
												<label for="tc_maetsro_categoria2" class="col-form-label form-control-sm">CATEGORIA 2</label>
										  		<textarea class="form-control z-depth-1 text-uppercase" id="tc_condominio_categoria2" rows="7" placeholder="escribe algo aqui..." maxlength="250"></textarea>
											</div>               
						   				</div>
					  				</div>
								</div>
				  				<div class="modal-footer">
					  				<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
					  				<button type="submit" id="btn_guardar_tc_condominio" class="btn btn-dark">Guardar</button>
				  				</div>
			  				</form>    
						</div>
					</div>
				</div>
			</div>

			<!-- TAB TC CUENTAS POR PAGAR -->
			<div class="tab-pane fade" id="nav-tc_cta_pagar" role="tabpanel" aria-labelledby="nav-tc_cta_pagar-tab">
				<section class="container-fluid py-3" id="div_btn_seleccion_tc_cta_pagar">
					<!-- botones_formulario -->
				</section>

				<div class="row p-3">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_tc_cta_pagar">
							<!-- creacion_tabla -->
						</div>
    				</div>
				</div>

				<!--Modal para CRUD-->
				<div class="row modal fade" id="modal_crud_tc_cta_pagar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
	   
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
	  
			  				<form id="form_tc_cta_pagar">
				  				<div class="modal-body">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
										  		<label for="tc_cta_pagar_id" class="col-form-label form-control-sm">ID</label>
										   		<input type="text" readonly class="form-control form-control-sm" id="tc_cta_pagar_id">
										 	</div>
									 	</div>
									 	<div class="col-lg-6">
									  		<div class="form-group">
												<label for="tc_cta_pagar_ficha" class="col-form-label form-control-sm">FICHA</label>
										   		<input type="text" class="form-control text-uppercase form-control-sm" id="tc_cta_pagar_ficha" maxlength="45">
											</div> 
									 	</div>    
									</div>
					  				<div class="row"> 
										<div class="col-lg-6">
									  		<div class="form-group">
												<label for="tc_cta_pagar_categoria1" class="col-form-label form-control-sm">CATEGORIA 1</label>
												<input type="text" class="form-control text-uppercase form-control-sm" id="tc_cta_pagar_categoria1" maxlength="45">
											</div> 
						  				</div>
									</div>
									<div class="row"> 
						  				<div class="col-lg-12">
									  		<div class="form-group">
												<label for="tc_maetsro_categoria2" class="col-form-label form-control-sm">CATEGORIA 2</label>
										  		<textarea class="form-control z-depth-1 text-uppercase" id="tc_cta_pagar_categoria2" rows="7" placeholder="escribe algo aqui..." maxlength="250"></textarea>
											</div>               
						   				</div>
					  				</div>
								</div>
				  				<div class="modal-footer">
					  				<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
					  				<button type="submit" id="btn_guardar_tc_cta_pagar" class="btn btn-dark">Guardar</button>
				  				</div>
			  				</form>    
						</div>
					</div>
				</div>


			</div>

			<!-- TAB TC CUENTAS POR COBRAR -->
			<div class="tab-pane fade" id="nav-tc_cta_cobrar" role="tabpanel" aria-labelledby="nav-tc_cta_cobrar-tab">
				<section class="container-fluid py-3" id="div_btn_seleccion_tc_cta_cobrar">
					<!-- botones_formulario -->
				</section>

				<div class="row p-3">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_tc_cta_cobrar">
							<!-- creacion_tabla -->
						</div>
    				</div>
				</div>

				<!--Modal para CRUD-->
				<div class="row modal fade" id="modal_crud_tc_cta_cobrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
	   
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
	  
			  				<form id="form_tc_cta_cobrar">
				  				<div class="modal-body">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
										  		<label for="tc_cta_cobrar_id" class="col-form-label form-control-sm">ID</label>
										   		<input type="text" readonly class="form-control form-control-sm" id="tc_cta_cobrar_id">
										 	</div>
									 	</div>
									 	<div class="col-lg-6">
									  		<div class="form-group">
												<label for="tc_cta_cobrar_ficha" class="col-form-label form-control-sm">FICHA</label>
										   		<input type="text" class="form-control text-uppercase form-control-sm" id="tc_cta_cobrar_ficha" maxlength="45">
											</div> 
									 	</div>    
									</div>
					  				<div class="row"> 
										<div class="col-lg-6">
									  		<div class="form-group">
												<label for="tc_cta_cobrar_categoria1" class="col-form-label form-control-sm">CATEGORIA 1</label>
												<input type="text" class="form-control text-uppercase form-control-sm" id="tc_cta_cobrar_categoria1" maxlength="45">
											</div> 
						  				</div>
									</div>
									<div class="row"> 
						  				<div class="col-lg-12">
									  		<div class="form-group">
												<label for="tc_maetsro_categoria2" class="col-form-label form-control-sm">CATEGORIA 2</label>
										  		<textarea class="form-control z-depth-1 text-uppercase" id="tc_cta_cobrar_categoria2" rows="7" placeholder="escribe algo aqui..." maxlength="250"></textarea>
											</div>               
						   				</div>
					  				</div>
								</div>
				  				<div class="modal-footer">
					  				<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
					  				<button type="submit" id="btn_guardar_tc_cta_cobrar" class="btn btn-dark">Guardar</button>
				  				</div>
			  				</form>    
						</div>
					</div>
				</div>

			</div>


		</div>
	</div>
</div>