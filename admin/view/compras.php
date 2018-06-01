			<!-- begin row -->
			<div class="row">
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title"><?php echo @$titulo?> </h4>
                        </div>
                        <div class="panel-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>	
                                	<?php if($proceso == true):?>
                                	<tr>
                                		<td colspan="5">
										<form method="post" name="exportar_excel" action="<?php echo HOME?>procesar_compras/<?php echo $_GET["id"]?>/" >
                                			<input type="submit" name="submit" value="PROCESAR" id="procesar">
                                		</form>
                                		</td>
                                	</tr>
	                                <?php elseif($descarga == true):?>
                                	<tr>
                                		<td colspan="5">
										<form method="post" name="exportar_excel" action="<?php echo HOME?>descargar_compras_procesadas/<?php echo $_GET["id"]?>/" >
                                			<input type="submit" name="submit" value="DESCARGAR" id="descargar">
                                		</form>
                                		</td>
                                	</tr>	                                	
	                                <?php endif;?>
                                    <tr style="font-size: 11px">
									<th>Fecha</th>
									<th>Nro Pedido</th>
									<th>Operación</th>
									<th>Nro de Op</th>
									<th>CUIT</th>
									<th>Tipo</th>
									<th>Fecha Autorización</th>
									<th>Dni</th>
									<th>Cp</th>
									<th>Localidad</th>
									<th>CodigoProvincia</th>
									<th>Total Precio</th>
									<th>Código Producto</th>
									<th>Telefonos</th>
									<th>Telefonos</th>
									<th>Dirección</th>
									<th>Titular</th>
									<th>Autorizado1</th>
									<th>Autorizado2</th>
									<th>Observaciones</th>
									<th>ver</th>

                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($compras as $compra):
									//if($compra["provinciaId"] > 1): $compra["provinciaId"] = $compra["provinciaId"] -1; 
									$precio_total = $compra["precio_total_productos"] + $compra["precio_total_envio"];
									if($campania["tipo"] == "hsbc"):
									$precio_compra = $compra["precio_producto"] + $compra["envio_peso"];
									else:
									$precio_compra = $compra["precio_producto"] + $compra["envio_localidad"] + $compra["envio_peso"] ;
	
									endif;
									?>
										<tr style="color:gray;font-size: 11px">
											<td><?php 
												$date=date_create($compra["date"]);  
	      										$fecha_dia = date_format($date,"d/m/Y");
	       										ECHO $fecha_dia?>

											</td>
											<td><?php echo $compra["id"];?></td>
											<?php if($campania["tipo"] == "hsbc"):?>
											<td>HSBC VTA</td>
											<?php else:?>
											<td>FRANCES VTA</td>
											<?php endif;?>
											<td><?php echo $compra["id"];?></td>	
											<td><?php echo $compra["dni"];?></td>
											<td>AUTORIZADOS</td>
											<td><?php 
												$date=date_create($compra["date"]);  
	      										$fecha_dia = date_format($date,"d/m/Y H:m:s");
	       										ECHO $fecha_dia?></td>
											<td><?php echo $compra["dni"];?></td>
											<td><?php echo $compra["cp"];?></td>
											<td><?php echo $compra["localidad"];?></td>
											<td>
												<?php if($compra["provinciaId"] > 1):
													echo $compra["provinciaId"] - 1;	
												else:
													echo $compra["provinciaId"];	
												 endif;?>	
											</td>
																			
											<td><?php echo $precio_compra;?></td>
											<td><?php echo $compra["codigoProducto"];?></td>
											<td><?php echo $compra["telefono"];?></td>
											<td></td>
											<td><?php echo $compra["direccion"];?></td>
											<td><?php echo $compra["nombre"];?></td>
											<td>0</td>
											<td>0</td>
											<td><?php echo $compra["observaciones"];?></td>

											<td><a href="<?php echo HOME?>compra_campania_detail-<?php echo $compra["id"];?>-<?php echo $_GET['id']?>">Ver mas</td>
										</tr>
									<?php endforeach;?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-10 -->
            </div>
            <!-- end row -->

		</div>
		<!-- end #content -->
		

	</div>
	<!-- end page container -->
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo HOME?>assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php echo HOME?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo HOME?>assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/extensions/Buttons/js/jszip.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/extensions/Buttons/js/pdfmake.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/extensions/Buttons/js/vfs_fonts.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo HOME?>assets/js/table-manage-buttons.demo.min.js"></script>
	<script src="<?php echo HOME?>assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			TableManageButtons.init();
		});
	</script>
</body>
</html>