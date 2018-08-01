

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
                            <h4 class="panel-title"><?php echo @$titulo?> - Productos</h4>
                        </div>
                        <div class="alert alert-warning fade in">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="panel-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>


                                	<tr><th colspan="3"><a href="<?php echo HOME?>modelo_factura.html">NUEVA FACTURA</a></th></tr>

                                    <tr style="font-size: 11px">
									<th style="background-color: #5DBD90;">Fecha</th>
									<th style="background-color: #5DBD90;">Cliente</th>
									<th style="background-color: #5DBD90;">Importe</th>
									<th style="background-color: #5DBD90;">Saldo</th>
									<th style="background-color: #5DBD90;">Estado</th>
									<th style="background-color: #5DBD90;">Comprobante</th>


                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($facturas as $factura):?>
										<tr style="color:gray;font-size: 11px">
										<form name="orden" method="post" action="<?php echo HOME?>cambio_orden/<?php echo $_GET['id']?>/">
											<input type="hidden" name="integrante" value="<?php echo $producto["id"];?>">


											<td><?php echo $factura["fecha"] ?></td>
											<td><?php echo $factura["nombre_cliente"] ?></td>
											<td><?php echo $factura["importe"] ?></td>

											<?php $saldo_factura = Factura::get_saldo_factura($factura["importe"],$factura["id"]) ;
											if($saldo_factura > 0) {
																?>
											<td>$<FONT SIZE='' COLOR='red'><?php echo $saldo_factura?></FONT></td>
											<?php }else{ ?>
											<td>$<FONT SIZE='' COLOR='green'><?php echo $saldo_factura?></FONT></td>

											<?php } 
											$fecha_factura=explode("-",$factura["fecha"]);
											$fechasalida= $fecha[2]."-".$fecha[1]."-".$fecha[0];

											$fecha_vencimiento = date("Y-m-d",mktime(0, 0, 0, $fecha_factura[1]+1, $fecha_factura[2],   $fecha_factura[0]));
												if($fecha_vencimiento < date("Y-m-d") and $saldo_factura != 0 )
													{
														echo "<td>Vencida</td>";
													}
												elseif($fecha_vencimiento > date("Y-m-d") and $saldo_factura != 0 )	
													{
														echo "<td>Pendiente</td>";
													}
												elseif($saldo_factura == 0 )	
													{
														echo "<td>Abonada</td>";
													}
											?>

											

												
											<?php if(@$_GET['id']):?>
											<td><a href="<?php echo HOME?>producto_campania_edit-<?php echo $producto["id"];?>-<?php echo $_GET['id']?>">Editar</td>
											<?php else:?>
											<td><a href="<?php echo HOME?>detalle_factura/<?php echo $factura["id"];?>/">Ver mas</td>
											<?php endif;?>		
										


											</form>										
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