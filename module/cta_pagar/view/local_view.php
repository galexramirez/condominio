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

				<div class="row p-2">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_listado_cta_pagar">
							<!-- creacion_tabla -->
						</div>
					</div>
				</div>

				<!-- MODAL CRUD VER INFORMACION DE CTA PAGAR -->
				<div class="row modal fade" id="modal_crud_ver_cta_pagar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-xl" role="document">
			        	<div class="modal-content  ui-widget-content" id="modal-resizable_ver_vales">
					    	<div class="modal-header  dragable_touch">
			                	<h5 class="modal-title" id="exampleModalLabel"></h5>
			                	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
			                	</button>
			            	</div>
					  		<form id="form_modal_ver_cta_pagar" enctype="multipart/form-data" action="" method="post">    
								<div class="modal-body" id="div_imprimir">
									<div class="form-group">
										<div class="row d-flex justify-content-araound">
											<div class="col-lg-4">
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1 font-weight-bold">N° VALE :</label>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group form-control-sm mb-1">
															<label for="icod_vale" class="col-form-label form-control-sm mb-1 font-weight-normal" id="icod_vale"></label>
															<!--<input type="text" class="form-control form-control-sm mb-1" id="icod_vale" disabled>-->
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1 font-weight-bold">N° OT :</label>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group form-control-sm mb-1">
															<label for="iva_ot_id" class="col-form-label form-control-sm mb-1 font-weight-normal" id="iva_ot_id"></label>
															<!--<input type="text" class="form-control form-control-sm mb-1" id="iva_ot_id" disabled>-->
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1 font-weight-bold">BUS :</label>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group form-control-sm mb-1">
															<label for="iva_bus" class="col-form-label form-control-sm mb-1 font-weight-normal" id="iva_bus"></label>
															<!--<input type="text" class="form-control form-control-sm mb-1" id="iva_bus" disabled>-->
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row d-flex justify-content-araound">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-lg-2">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1 font-weight-bold">DESC. ACTIVIDAD :</label>
														</div>
													</div>
													<div class="col-lg-10">
														<div class="form-group form-control-sm mb-1">
															<label for="iva_descrip" class="col-form-label form-control-sm mb-1 font-weight-normal" id="iva_descrip"></label>
															<!--<input type="text" class="form-control form-control-sm mb-1" id="iva_descrip" disabled>-->
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row d-flex justify-content-araound">
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1 font-weight-bold">ASOCIADO :</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<label for="iva_asociado" class="col-form-label form-control-sm mb-1 font-weight-normal" id="iva_asociado"></label>
															<!--<input type="text" class="form-control form-control-sm mb-1" id="iva_asociado" disabled>-->
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1 font-weight-bold">RESP.ASOCIADO :</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<label for="iva_responsable" class="col-form-label form-control-sm mb-1 font-weight-normal" id="iva_responsable"></label>
															<!--<input type="text" class="form-control form-control-sm mb-1" id="iva_responsable" disabled>-->
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1 font-weight-bold">REG.REPUESTO :</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<label for="iva_garantia" class="col-form-label form-control-sm mb-1 font-weight-normal" id="iva_garantia"></label>
															<!--<input type="text" class="form-control form-control-sm mb-1" id="iva_garantia" disabled>-->
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1 font-weight-bold">ESTADO :</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<label for="iva_estado" class="col-form-label form-control-sm mb-1 font-weight-normal" id="iva_estado"></label>
															<!--<input type="text" class="form-control form-control-sm mb-1" id="iva_estado" disabled>-->
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1 font-weight-bold">CGM RESP. :</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<label for="iva_genera" class="col-form-label form-control-sm mb-1 font-weight-normal" id="iva_genera"></label>
															<!--<input type="text" class="form-control form-control-sm mb-1" id="iva_genera" disabled>-->
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1 font-weight-bold">FECHA GENERA :</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<label for="iva_date_genera" class="col-form-label form-control-sm mb-1 font-weight-normal" id="iva_date_genera"></label>
															<!--<input type="datetime-local" class="form-control form-control-sm mb-1" id="iva_date_genera" disabled>-->
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1 font-weight-bold">CIERRE ADM. :</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<label for="iva_cierre_adm" class="col-form-label form-control-sm mb-1 font-weight-normal" id="iva_cierre_adm"></label>
															<!--<input type="text" class="form-control form-control-sm mb-1" id="iva_cierre_adm" disabled>-->
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1 font-weight-bold">FEC. CIERRE ADM.:</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<label for="iva_date_cierre_adm" class="col-form-label form-control-sm mb-1 font-weight-normal" id="iva_date_cierre_adm"></label>
															<!--<input type="datetime-local" class="form-control form-control-sm mb-1" id="iva_date_cierre_adm" disabled>-->
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12">
												<div class="container-fluid caja">
													<div class="row w-100 p-0 m-0">
												       	<div class="col-lg-12">
												       		<div class="table-responsive" id="div_tabla_ver_detalle_repuestos">        
												           		<!-- PHP Accesos CreacionTabla -->
												            </div>
												        </div>
												    </div>  
												</div>
											</div>
										</div>
										<div class="row d-flex justify-content-araound">
											<div class="col-lg-12">
												<div class="row">
													<div class="form-group col-lg-6 mb-1">
    													<label for="iva_obs_cgm" class="form-control-sm pl-0 mb-0 font-weight-bold">OBSERVACIONES DE CGM :</label>
														<div class="form-control-sm mb-1 overflow-auto h-100 border border-muted border-radius rounded" id="div_iva_obs_cgm">
															<!-- JS Cierre Administrativo -->
														</div>
													</div>
													<div class="form-group col-lg-6 mb-1">
    													<label for="iva_obs_aom" class="form-control-sm pl-0 mb-0 font-weight-bold">OBSERVACIONES DE AOM :</label>
														<div class="form-control-sm mb-1 overflow-auto h-100 border border-muted border-radius rounded" id="div_iva_obs_aom">
															<!-- JS Cierre Administrativo -->
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
			      		    	<div class="modal-footer">
								  	<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
								  	<button type="button" id="btn_imprimir_vale" class="btn btn-secondary btn-sm btn_imprimir_vale" >Imprimir</button>
								</div>
							</form>
			        	</div>
			    	</div>
				</div>
				<!-- FIN MODAL CRUD VER INFORMACION DE VALES -->

			</div>

			<!-- TAB REGISTRO -->
			<div class="tab-pane fade" id="nav-registro" role="tabpanel" aria-labelledby="nav-registro-tab">
				<form id="form_seleccion_procesar_vales" class="row col-sm-12 container-fluid" onsubmit="return false;">	    
					<div class="row align-items-end pb-0 col-sm-12 mb-1">
						<div class="col-lg-2">
							<div class="form-group mb-0">
								<div class="input-group mt-3">
							  		<div class="input-group-prepend">
       									<span class="input-group-text form-control-sm" id="basic-addon1">Vales N° P-</span>
        								<input type="text" class="form-control form-control-sm" id="cod_vale" placeholder="Código Vales" aria-label="cod_vale" aria-describedby="basic-addon1">
							  		</div>
      							</div>
							</div>
			        	</div>

						<div class="col-lg-2">             	
							<div class="form-group mb-0" id="div_btn_seleccion_procesar_vales">
								
							</div>
			       		</div> 

					</div>
				</form>

				<div class="container-fluid ml-0 mr-0 mb-0">
					<form id="form_procesar_vales" enctype="multipart/form-data" action="" method="post" onsubmit="return false;">    
			      		<div class="form-group">
						<div class="col-lg-6 mx-1 border border-muted border-radius rounded">
							<div class="row d-flex justify-content-araound">
								<div class="col-lg-4">
									<div class="row">
										<div class="col-lg-5">
											<div class="form-group form-control-sm mb-1">
												<label for="tcod_vale" class="col-form-label form-control-sm mb-1">N° VALE :</label>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="form-group form-control-sm mb-1">
												<input type="text" readonly class="form-control form-control-sm mb-1" id="tcod_vale">
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="row">
										<div class="col-lg-5">
											<div class="form-group form-control-sm mb-1">
												<label for="va_ot_id" class="col-form-label form-control-sm mb-1">N° OT :</label>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="form-group form-control-sm mb-1">
												<input tabindex="1" type="text" class="form-control form-control-sm mb-1" id="va_ot_id">
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="row">
										<div class="col-lg-5">
											<div class="form-group form-control-sm mb-1">
												<label for="va_bus" class="col-form-label form-control-sm mb-1">BUS :</label>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="form-group form-control-sm mb-1">
												<input type="text" readonly class="form-control form-control-sm mb-1" id="va_bus">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row d-flex justify-content-araound">
								<div class="col-lg-12">
									<div class="row">
										<div class="col-lg-3">
											<div class="form-group form-control-sm mb-1">
												<label for="va_descrip" class="col-form-label form-control-sm mb-1">DESC. ACTIVIDAD :</label>
											</div>
										</div>
										<div class="col-lg-9">
											<div class="form-group form-control-sm mb-1">
												<input type="text" readonly class="form-control form-control-sm mb-1" id="va_descrip">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row d-flex justify-content-araound">
								<div class="col-lg-6">
									<div class="row">
										<div class="col-lg-5">
											<div class="form-group form-control-sm mb-1">
												<label for="" class="col-form-label form-control-sm mb-1">ASOCIADO :</label>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="form-group form-control-sm mb-1">
												<select tabindex="2" class="form-control form-control-sm mb-1" id="va_asociado">
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-5">
											<div class="form-group form-control-sm mb-1">
												<label for="" class="col-form-label form-control-sm mb-1">RESP.ASOCIADO :</label>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="form-group form-control-sm mb-1">
												<select tabindex="3" class="form-control form-control-sm mb-1" id="va_responsable">
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-5">
											<div class="form-group form-control-sm mb-1">
												<label for="" class="col-form-label form-control-sm mb-1">REG.REPUESTO :</label>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="form-group form-control-sm mb-1">
												<select tabindex="4" class="form-control form-control-sm mb-1" id="va_garantia">
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-5">
											<div class="form-group form-control-sm mb-1">
												<label for="" class="col-form-label form-control-sm mb-1">ESTADO :</label>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="form-group form-control-sm mb-1">
												<input type="text" readonly class="form-control form-control-sm mb-1" id="tva_estado">
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="row">
										<div class="col-lg-5">
											<div class="form-group form-control-sm mb-1">
												<label for="" class="col-form-label form-control-sm mb-1">CGM RESP. :</label>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="form-group form-control-sm mb-1">
												<select tabindex="5" class="form-control form-control-sm mb-1" id="va_genera">
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-5">
											<div class="form-group form-control-sm mb-1">
												<label for="" class="col-form-label form-control-sm mb-1">FECHA GENERA :</label>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="form-group form-control-sm mb-1">
												<input tabindex="6" type="datetime-local" class="form-control form-control-sm mb-1" id="va_date_genera">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-5">
											<div class="form-group form-control-sm mb-1">
												<label for="" class="col-form-label form-control-sm mb-1">CIERRE ADM. :</label>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="form-group form-control-sm mb-1">
												<input type="text" readonly class="form-control form-control-sm mb-1" id="va_cierre_adm">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-5">
											<div class="form-group form-control-sm mb-1">
												<label for="" class="col-form-label form-control-sm mb-1">FEC. CIERRE ADM.:</label>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="form-group form-control-sm mb-1">
												<input type="datetime-local" readonly class="form-control form-control-sm mb-1" id="va_date_cierre_adm">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row d-flex justify-content-araound">
								<div class="col-lg-6">
									<div class="row">
										<div class="col-lg-5">
											<div class="form-group form-control-sm mb-1">
												<label for="va_tipo" class="col-form-label form-control-sm mb-1">TIPO :</label>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="form-group form-control-sm mb-1">
												<input type="text" readonly class="form-control form-control-sm mb-1" id="va_tipo" placeholder="MATERIAL">
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="row align-items-end d-flex">
										<div class="btn-toolbar ml-auto p-2" role="toolbar" aria-label="Toolbbutton groups">
											<div class="btn-group" role="group" aria-label="Four group" id="div_btn_repuesto_vale">
												<button tabindex="10" type="button" id="btn_repuestos_vale" class="btn btn-secondary btn-sm btn_repuestos_vale mr-1">+ Repuestos</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="container-fluid caja">
										<div class="row w-100 p-0 m-0">
									       	<div class="col-lg-12">
									       		<div class="table-responsive" id="div_tablaDetalleRepuestos">        
									           		<!-- PHP Accesos CreacionTabla -->
									            </div>
									        </div>
									    </div>  
									</div>
								</div>
							</div>
							<div class="row d-flex justify-content-araound">
								<div class="col-lg-12">
									<div class="row">
										<div class="form-group col-lg-5 mb-1 border border-muted border-radius rounded">
    										<label for="va_obs_cgm" class="form-control-sm pl-0 mb-0">OBSERVACIONES DE CGM :</label>
    										<textarea class="form-control form-control-sm mb-1 text-uppercase" id="va_obs_cgm" rows="3" placeholder="escribe algo aqui..."></textarea>
										</div>
										<div class="form-group col-lg-5 mb-1 border border-muted border-radius rounded">
    										<label for="va_obs_aom" class="form-control-sm pl-0 mb-0">OBSERVACIONES DE AOM :</label>
    										<textarea class="form-control form-control-sm mb-1 text-uppercase" id="va_obs_aom" rows="3" placeholder="escribe algo aqui..."></textarea>
										</div>
										<div class="form-group col-lg-2 mb-1 border border-muted border-radius rounded">
    										<label for="va_estado" class="form-control-sm pl-0 mb-0">GUARDAR COMO :</label>
											<select class="col-form-label form-control form-control-sm mb-1" id="va_estado" name="va_estado" >
											</select>
										</div>
									</div>
									<div class="row align-items-end d-flex">
										<div class="btn-toolbar ml-auto p-2" role="toolbar" aria-label="Toolbbutton groups">
											<div class="btn-group" role="group" aria-label="Four group" id="div_btn_guardar_vale">
												<button type="button" id="btn_log_vales" class="btn btn-info btn-sm btn_log_vales mr-1">Log..</button>
												<button tabindex="12" type="button" id="btn_cancelar_vale" class="btn btn-light btn-sm btn_cancelar_vale mr-1">Cancelar</button>
												<button type="button" id="btn_alamcen_ok" class="btn btn-secondary btn-sm btn_almacen_ok mr-1">Almacen Ok</button>
												<button type="button" id="btn_coordinador_ok" class="btn btn-secondary btn-sm btn_coordinador_ok mr-1">Coodinador Ok</button>
												<button type="button" id="btn_guardar_vale" class="btn btn-secondary btn-sm btn_guardar_vale mr-1">Guardar</button>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>	
						</div>
					</form>
				</div>

				<!--Modal para CRUD DETALLE REPUESTOS-->
				<div class="row modal fade" id="modal_crud_detalle_repuestos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
			        	<div class="modal-content">
					    	<div class="modal-header">
			                	<h5 class="modal-title" id="exampleModalLabel"></h5>
			                	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
			                	</button>
			            	</div>
					  		<form id="form_modal_detalle_repuestos" enctype="multipart/form-data" action="" method="post">    
			      		    	<div class="modal-body ui-front">
									<div class="row align-items-end">
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-2">
													<div class="form-group form-control-sm">
														<label for="buscar_repuesto" class="col-form-label form-control-sm">BUSCAR:</label>
													</div>
												</div>
												<div class="col-lg-8">
													<div class="form-group form-control-sm ui-widget">
														<input type="text" tabindex="11" class="form-control text-uppercase form-control-sm" id="buscar_repuesto" placeholder="REPUESTO" aria-label="REPUESTO" aria-describedby="btn_buscar_repuesto">
													</div>
												</div>
												<div class="col-lg-2">
													<div class="form-group form-control-sm">
    													<button tabindex="12" title="Buscar" class="btn btn-outline-secondary btn-sm btn_buscar_repuesto mr-1" type="button" id="btn_buscar_repuesto"><i class="bi bi-search"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg></i></button>
														<button tabindex="13" title="Nuevo" class="btn btn-outline-secondary btn-sm btn_nuevo_repuesto mr-1" type="button" id="btn_nuevo_repuesto"><i class="bi bi-plus-square"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16"><path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg></i></button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row align-items-end">
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-2">
													<div class="form-group form-control-sm mb-1">
								        				<label for="rv_repuesto" class="col-form-label form-control-sm">CODIGO:</label>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group form-control-sm mb-1">
														<input type="text" class="form-control text-uppercase form-control-sm" id="rv_repuesto" disabled>
													</div>
												</div>
											</div> 
			      		            	</div>
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-2">
													<div class="form-group form-control-sm mb-1">
														<label for="rv_descripcion" class="col-form-label form-control-sm">DESCRIPCION:</label>
													</div>	
												</div>
												<div class="col-lg-10">
													<div class="form-group  form-control-sm mb-1">
								        				<input type="text" class="form-control text-uppercase form-control-sm" id="rv_descripcion" disabled>
													</div>
												</div>
											</div>
			      		            	</div>
									</div>
									<div class="row align-items-end">
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="mv_asignacion" class="col-form-label form-control-sm mb-1">ASIGNACION:</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="text" readonly class="form-control form-control-sm mb-1" id="mv_asignacion">
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="mv_tarjeta" class="col-form-label form-control-sm mb-1">TARJETA:</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="text" readonly class="form-control form-control-sm mb-1" id="mv_tarjeta">
														</div>
													</div>
												</div>
											</div>
									</div>
									<div class="row align-items-end">
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="mv_macrosistema" class="col-form-label form-control-sm mb-1">MACROSISTEMA:</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="text" readonly class="form-control form-control-sm mb-1" id="mv_macrosistema">
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="mv_condicion" class="col-form-label form-control-sm mb-1">CONDICION:</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="text" readonly class="form-control form-control-sm mb-1" id="mv_condicion">
														</div>
													</div>
												</div>
											</div>
									</div>
									<div class="row align-items-end">
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="mv_sistema" class="col-form-label form-control-sm mb-1">SISTEMA:</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="text" readonly class="form-control form-control-sm mb-1" id="mv_sistema">
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="mv_flota" class="col-form-label form-control-sm mb-1">FLOTA:</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="text" readonly class="form-control form-control-sm mb-1" id="mv_flota">
														</div>
													</div>
												</div>
											</div>
									</div>
									<div class="row align-items-end">
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="mv_patrimonial" class="col-form-label form-control-sm mb-1">COD.PATRIMON.:</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="text" readonly class="form-control form-control-sm mb-1" id="mv_patrimonial">
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="mv_categoria" class="col-form-label form-control-sm mb-1">CATEGORIA:</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="text" readonly class="form-control form-control-sm mb-1" id="mv_categoria">
														</div>
													</div>
												</div>
											</div>
									</div>
									<div class="row align-items-end">
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="rv_unidad" class="col-form-label form-control-sm mb-1">UNID.MEDIDA:</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="text" readonly class="form-control form-control-sm mb-1" id="rv_unidad">
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="mv_tipo" class="col-form-label form-control-sm mb-1">TIPO:</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="text" readonly class="form-control form-control-sm mb-1" id="mv_tipo">
														</div>
													</div>
												</div>
											</div>
									</div>
									<div class="row align-items-end">
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm">
															<label for="mv_moneda" class="col-form-label form-control-sm mb-1">MONEDA:</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="text" readonly class="form-control form-control-sm mb-1" id="mv_moneda">
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm">
															<label for="mv_preciosoles" class="col-form-label form-control-sm mb-1">PRECIO S/:</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="text" readonly class="form-control form-control-sm mb-1" id="mv_preciosoles">
														</div>
													</div>
												</div>
											</div>
									</div>
									
									<div class="row align-items-end">
										<div class="col-lg-2">
											<div class="form-group">
								    			<label for="rv_id" class="col-form-label form-control-sm">ITEM</label>
												<input type="number" tabindex="14" class="form-control form-control-sm" id="rv_id">
				  				    		</div> 
			      		            	</div>
										  <div class="col-lg-3">
											<div class="form-group">
								    			<label for="rv_cantidad_requerida" class="col-form-label form-control-sm">CANT.REQUERIDA</label>
												<input type="number" tabindex="15" class="form-control form-control-sm" id="rv_cantidad">
				  				    		</div> 
			      		            	</div>
									</div>
									<div class="row align-items-end border-top border-bottom">
										<div class="col-lg-2">

										</div>
										<div class="col-lg-3">
											<div class="form-group">
								    			<label for="rv_cantidad" class="col-form-label form-control-sm">CANT.DESPACHO</label>
												<input type="number" tabindex="16" class="form-control form-control-sm" id="rv_cantidad">
				  				    		</div> 
			      		            	</div>
										  <div class="col-lg-3">
											<div class="form-group">
												<label for="rv_cod_patrimonial_despacho" class="col-form-label form-control-sm">COD.PAT.DESPACHO</label>
												<input type="text" tabindex="17" class="form-control form-control-sm" id="rv_cod_patrimonial_despacho" disabled>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="form-group">
								    			<label for="rv_nroserie" class="col-form-label form-control-sm">NRO. SERIE</label>
												<input type="text" tabindex="18" class="form-control form-control-sm" id="rv_nroserie">
				  				    		</div> 
			      		            	</div>
									</div>
									<div class="row align-items-end">
										<div class="col-lg-2">

										</div>
										<div class="col-lg-3">
											<div class="form-group">
								    			<label for="rv_cantidad_real" class="col-form-label form-control-sm">CANT.UTILIZADA</label>
												<input type="number" tabindex="19" class="form-control form-control-sm" id="rv_cantidad_real">
				  				    		</div> 
			      		            	</div>
										<div class="col-lg-3">
											<div class="form-group">
												<label for="rv_cod_patrimonial_recepcion" class="col-form-label form-control-sm">COD.PAT.RECEPCION</label>
												<input type="text" tabindex="20" class="form-control form-control-sm" id="rv_cod_patrimonial_recepcion" disabled>
											</div>
										</div>
									</div>
								</div>
			      		    	<div class="modal-footer">
								  	<button type="button" tabindex="21" id="btn_cancelar_detalle_repuesto" class="btn btn-light btn-sm btn_cancelar_detalle_repuesto" data-dismiss="modal">Cancelar</button>
			      					<button type="submit" tabindex="22" id="btn_guardar_detalle_repuestos" class="btn btn-dark btn-sm btn_guardar_detalle_repuestos">Agregar</button>
								</div>
							</form>
			        	</div>
			    	</div>
				</div>

				<!-- MODAL CRUD VER INFORMACION DE VER PROCESAR VALES -->
				<div class="row modal fade" id="modal_crud_ver_procesar_vales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-xl" role="document">
			        	<div class="modal-content  ui-widget-content" id="modal-resizable_ver_procesar_vales">
					    	<div class="modal-header  dragable_touch">
			                	<h5 class="modal-title" id="exampleModalLabel"></h5>
			                	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
			                	</button>
			            	</div>
					  		<form id="form_modal_ver_procesar_vales" enctype="multipart/form-data" action="" method="post">    
								<div class="modal-body">
									<div class="form-group">
										<div class="row d-flex justify-content-araound">
											<div class="col-lg-4">
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1">N° VALE :</label>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group form-control-sm mb-1">
															<input type="text" class="form-control form-control-sm mb-1" id="ipcod_vale" disabled>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1">N° OT :</label>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group form-control-sm mb-1">
															<input type="text" class="form-control form-control-sm mb-1" id="ipva_ot_id" disabled>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1">BUS :</label>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group form-control-sm mb-1">
															<input type="text" class="form-control form-control-sm mb-1" id="ipva_bus" disabled>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row d-flex justify-content-araound">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-lg-2">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1">DESC. ACTIVIDAD :</label>
														</div>
													</div>
													<div class="col-lg-10">
														<div class="form-group form-control-sm mb-1">
															<input type="text" class="form-control form-control-sm mb-1" id="ipva_descrip" disabled>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row d-flex justify-content-araound">
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1">ASOCIADO :</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="text" class="form-control form-control-sm mb-1" id="ipva_asociado" disabled>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1">RESP.ASOCIADO :</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="text" class="form-control form-control-sm mb-1" id="ipva_responsable" disabled>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1">REG.REPUESTO :</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="text" class="form-control form-control-sm mb-1" id="ipva_garantia" disabled>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1">ESTADO :</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="text" class="form-control form-control-sm mb-1" id="ipva_estado" disabled>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1">CGM RESP. :</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="text" class="form-control form-control-sm mb-1" id="ipva_genera" disabled>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1">FECHA GENERA :</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="datetime-local" class="form-control form-control-sm mb-1" id="ipva_date_genera" disabled>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1">CIERRE ADM. :</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="text" class="form-control form-control-sm mb-1" id="ipva_cierre_adm" disabled>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="form-group form-control-sm mb-1">
															<label for="" class="col-form-label form-control-sm mb-1">FEC. CIERRE ADM.:</label>
														</div>
													</div>
													<div class="col-lg-8">
														<div class="form-group form-control-sm mb-1">
															<input type="datetime-local" class="form-control form-control-sm mb-1" id="ipva_date_cierre_adm" disabled>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12">
												<div class="container-fluid caja">
													<div class="row w-100 p-0 m-0">
												       	<div class="col-lg-12">
												       		<div class="table-responsive" id="div_tabla_ver_procesar_detalle_repuestos">        
												           		<!-- PHP Accesos CreacionTabla -->
												            </div>
												        </div>
												    </div>  
												</div>
											</div>
										</div>
										<div class="row d-flex justify-content-araound">
											<div class="col-lg-12">
												<div class="row">
													<div class="form-group col-lg-6 mb-1">
    													<label for="ipva_obs_cgm" class="form-control-sm pl-0 mb-0">OBSERVACIONES DE CGM :</label>
														<div class="form-control-sm mb-1 overflow-auto h-100 border border-muted border-radius rounded" id="div_ipva_obs_cgm">
															<!-- JS Cierre Administrativo -->
														</div>
													</div>
													<div class="form-group col-lg-6 mb-1">
    													<label for="ipva_obs_aom" class="form-control-sm pl-0 mb-0">OBSERVACIONES DE AOM :</label>
														<div class="form-control-sm mb-1 overflow-auto h-100 border border-muted border-radius rounded" id="div_ipva_obs_aom">
															<!-- JS Cierre Administrativo -->
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
			      		    	<div class="modal-footer">
								  	<button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
								</div>
							</form>
			        	</div>
			    	</div>
				</div>
				<!-- FIN MODAL CRUD VER INFORMACION DE VER PROCESAR VALES -->

				<!-- MODAL CRUD LOG VALES-->
				<div class="row modal fade" id="modal_crud_log_vales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
			        	<div class="modal-content">
					    	<div class="modal-header">
			                	<h5 class="modal-title" id="exampleModalLabel"></h5>
			                	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
			                	</button>
			            	</div>
					  		<form id="form_modal_log_pedido" enctype="multipart/form-data" action="" method="post">    
			      		    	<div class="modal-body">
									<div class="row align-items-end">
										<div class="col-lg-12">
											<div class="form-control-sm mb-1 overflow-auto h-100 border border-muted border-radius rounded" id="div_log_vales">
												<!-- JS btn_log_pedido -->
											</div>
			      		            	</div>
									</div>  
								</div>
			      		    	<div class="modal-footer">
								  	<button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
								</div>
							</form>
			        	</div>
			    	</div>
				</div>
				<!-- FIN CRUD LOG VALES --> 

			</div>

			<!-- TAB PROVEEDOR -->
			<div class="tab-pane fade" id="nav-proveedor" role="tabpanel" aria-labelledby="nav-proveedor-tab">
				<section class="container-fluid py-3">
					<button id="btn_nuevo_proveedor" type="button" class="btn btn-secondary btn-sm btn_nuevo_proveedor" data-toggle="modal">+ Nuevo</button>  
				</section>

				<div class="row p-3">
					<div class="col-auto m-0">
						<div class="table-responsive" id="div_tabla_proveedor">
						</div>
					</div>
				</div>

				<!-- MODAL PARA CRUD -->
				<div class="row modal fade" id="modal_crud_proveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
	   
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"></h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
	  
			  				<form id="form_proveedor">
				  				<div class="modal-body">
									<div class="row">
										<div class="col-lg-4">
											<div class="form-group">
										  		<label for="prov_ruc" class="col-form-label form-control-sm">NRO. RUC</label>
										   		<input type="number" class="form-control form-control-sm" id="prov_ruc">
										 	</div>
									 	</div>
										 <div class="col-lg-8">
									  		<div class="form-group">
												<label for="prov_nombre" class="col-form-label form-control-sm">RAZON SOCIAL</label>
										   		<input type="text" class="form-control text-uppercase form-control-sm" id="prov_nombre" maxlength="100">
											</div> 
									 	</div>    
									</div>
									<div class="row">
										 <div class="col-lg-6">
									  		<div class="form-group">
												<label for="prov_contacto" class="col-form-label form-control-sm">CONTACTO</label>
												<input type="text" class="form-control text-uppercase form-control-sm" id="prov_contacto" maxlength="100">
											</div> 
						  				</div>
										  <div class="col-lg-6">
									  		<div class="form-group">
											  	<label for="prov_cta_banco_soles" class="col-form-label form-control-sm">CUENTA BANCARIA EN SOLES</label>
												<input type="text" class="form-control text-uppercase form-control-sm" id="prov_cta_banco_soles" maxlength="100">
											</div> 
						  				</div>
									</div>
									<div class="row"> 
										<div class="col-lg-3">
									  		<div class="form-group">
												<label for="prov_nro_telefono" class="col-form-label form-control-sm">TELEFONO</label>
												<input type="text" class="form-control form-control-sm" id="prov_nro_telefono" maxlength="45">
											</div> 
						  				</div>
										<div class="col-lg-6">
									  		<div class="form-group">
												<label for="prov_email" class="col-form-label form-control-sm">CORREO ELECTRONICO</label>
												<input type="text" class="form-control text-lowercase form-control-sm" id="prov_email" maxlength="100">
											</div> 
						  				</div>
										  <div class="col-lg-3">
									  		<div class="form-group">
												<label for="prov_estado" class="col-form-label form-control-sm">ESTADO</label>
												<select class="form-control form-control-sm" id="prov_estado">
												</select>
											</div> 
						  				</div>
									</div>
									<div class="row"> 
										 <div class="col-lg-8">
									  		<div class="form-group">
												<label for="prov_direccion" class="col-form-label form-control-sm">DIRECCION</label>
										   		<input type="text" class="form-control text-uppercase form-control-sm" id="prov_direccion" maxlength="100">
											</div> 
									 	</div>    
										 <div class="col-lg-4">
											<div class="form-group">
										  		<label for="prov_distrito" class="col-form-label form-control-sm">DISTRITO</label>
										   		<select class="form-control form-control-sm" id="prov_distrito">
												</select>
										 	</div>
									 	</div>
									</div>
									<div class="row"> 
										<div class="col-lg-12">
									  		<div class="form-group">
												<label for="prov_log" class="col-form-label form-control-sm">LOG</label>
											</div> 
						  				</div>
										<div class="col-lg-12">
											<div class="form-group">
												<div class="form-control-sm overflow-auto border border-muted border-radius rounded" style="height:50px" id="div_proveedor_log">
												</div>
											</div>
										</div>
									</div>
								</div>
				  				<div class="modal-footer">
					  				<button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancelar</button>
					  				<button type="submit" id="btn_guardar_proveedor" class="btn btn-dark btn-sm btn_guardar_proveedor">Guardar</button>
				  				</div>
			  				</form>    
						</div>
					</div>
				</div>  			

			</div>

			<!-- TAB REPORTE -->
			<div class="tab-pane fade" id="nav-reporte" role="tabpanel" aria-labelledby="nav-reporte-tab">

			</div>

			<!-- TAB AJUSTES CTA PAGAR -->
			<div class="tab-pane fade" id="nav-ajustes_cta_pagar" role="tabpanel" aria-labelledby="nav-ajustes_cta_pagar-tab">
				<h5 class="pt-3 pl-3">Variables</h5>
				
				<nav>
	 				<div class="nav nav-tabs" id="nav-tab-ajustes_cta_pagar" role="tablist">

					</div>
				</nav>
				
				<div class="tab-content" id="nav-tabContent-ajustes_cta_pagar">

					<!------------------------------------------------------------------------------->
					<!-- TAB AJUSTE VARIABLE DE USUARIO DE CTA PAGAR ------------------------------->
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
														<label for="ctap_cat1_usuario" class="col-form-label form-control-sm">CATEGORIA 1</label>
												   		<input type="text" class="form-control form-control-sm text-uppercase" id="ctap_cat1_usuario" maxlength="45">
													</div> 
											 	</div>    
											</div>
							  				<div class="row"> 
												<div class="col-lg-6">
											  		<div class="form-group">
														<label for="ctap_cat2_usuario" class="col-form-label form-control-sm">CATEGORIA 2</label>
														<input type="text" class="form-control form-control-sm text-uppercase" id="ctap_cat2_usuario" maxlength="45">
													</div> 
								  				</div>
											</div>
											<div class="row"> 
								  				<div class="col-lg-12">
											  		<div class="form-group">
														<label for="ctap_cat3_usuario" class="col-form-label form-control-sm">CATEGORIA 3</label>
												  		<textarea class="form-control z-depth-1 text-uppercase" id="ctap_cat3_usuario" rows="7" placeholder="escribe algo aqui..." maxlength="250"></textarea>
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
					<!-- TAB AJUSTE VARIABLE DE SISTEMA DE CTA PAGAR -------------------------------->
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
														<label for="ctap_cat1_sistema" class="col-form-label form-control-sm">CATEGORIA 1</label>
												   		<input type="text" class="form-control form-control-sm text-uppercase" id="ctap_cat1_sistema" maxlength="45">
													</div> 
											 	</div>    
											</div>
							  				<div class="row"> 
												<div class="col-lg-6">
											  		<div class="form-group">
														<label for="ctap_cat2_sistema" class="col-form-label form-control-sm">CATEGORIA 2</label>
														<input type="text" class="form-control form-control-sm text-uppercase" id="ctap_cat2_sistema" maxlength="45">
													</div> 
								  				</div>
											</div>
											<div class="row"> 
								  				<div class="col-lg-12">
											  		<div class="form-group">
														<label for="ctap_cat3_sistema" class="col-form-label form-control-sm">CATEGORIA 3</label>
												  		<textarea class="form-control z-depth-1 text-uppercase" id="ctap_cat3_sistema" rows="7" placeholder="escribe algo aqui..." maxlength="250"></textarea>
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