

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
                            <h4 class="panel-title"><?php echo @$titulo?> - Clientes</h4>
                        </div>
                        <div class="alert alert-warning fade in">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="panel-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>

                                	<?php if($tipo == "clientes"):?>
    	                            	<tr><th colspan="3"><a href="<?php echo HOME?>cliente_new.html">NUEVO CLIENTE</a></th></tr>
                                	<?php else:?>
	                                	<tr><th colspan="3"><a href="<?php echo HOME?>proveedor_new.html">NUEVO PROVEEDOR</a></th></tr>

                                	<?php endif;?>	

                                    <tr style="font-size: 11px">
									<th style="background-color: #5DBD90;">ID</th>
									<th style="background-color: #5DBD90;">Razon social</th>
									<th style="background-color: #5DBD90;">Telefono</th>
									<th style="background-color: #5DBD90;">Email</th>
									<th style="background-color: #5DBD90;">Estado</th>
									<th style="background-color: #5DBD90;">Deuda Vencida</th>
									<th style="background-color: #5DBD90;">Facturas</th>
									<th style="background-color: #5DBD90;">Nueva Factura</th>
									<th style="background-color: #5DBD90;">Editar</th>
									<th style="background-color: #5DBD90;">Borrar</th>
	

                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($clientes as $cliente):?>
										<tr style="color:gray;font-size: 11px">
										<form name="orden" method="post" action="<?php echo HOME?>cambio_orden/<?php echo $_GET['id']?>/">
											<input type="hidden" name="integrante" value="<?php echo $producto["id"];?>">


											<td><?php echo $cliente->get_id();?></td>
											<td><?php echo $cliente->get_nombre();?></td>
											<td><?php echo $cliente->get_telefono();?></td>
											<td><?php echo $cliente->get_mail();?></td>
											<?php if($tipo == "proveedores"):?>

											<td><?php echo $cliente_deudor = Factura::get_cliente_deudor($cliente->get_id(),2);?></td>
											<td><?php echo Factura::get_cliente_deudor_vencida($cliente->get_id(),2);?></td>	

											<?php else:?>											

											<td><?php echo $cliente_deudor = Factura::get_cliente_deudor($cliente->get_id(),1);?></td>
											<td><?php echo Factura::get_cliente_deudor_vencida($cliente->get_id(),1);?></td>
											
											<?php endif;?>												
											<?php if($tipo == "proveedores"):?>
											<td><?php echo Factura::facturas_cantidad($cliente->get_id(),2);?>
											 <a href="<?php echo HOME?>facturas_proveedor/<?php echo $cliente->get_id()?>/">Ver</a> 
											</td>
											<?php else:?>
											<td><?php echo Factura::facturas_cantidad($cliente->get_id(),1);?>
											 <a href="<?php echo HOME?>facturas_proveedor/<?php echo $cliente->get_id()?>/">Ver</a>	
											</td>
											<?php endif;?>
											<?php if($tipo == "proveedores"):?>												
												<td><a href="<?php echo HOME?>proveedor_factura/<?php echo $cliente->get_id() ?>/">Nueva factura</a></td>
											<?php else:?>
												<td><a href="<?php echo HOME?>modelo_factura/<?php echo $cliente->get_id() ?>/">Nueva factura</a></td>
	
											<?php endif;?>


											<td><a href="<?php echo HOME?>cliente_modify/<?php echo $cliente->get_id();?>/">
											<i class="fa fa-edit" aria-hidden="true"></i>
											</a></td>
											
											<td align="center">
											<?php if($tipo == "proveedores"):?>

												<a href="#" data-href="<?php echo HOME?>proveedor_delete/<?php echo $cliente->get_id();?>/" data-toggle="modal" data-target="#confirm-delete">
											<i class="fa fa-trash" aria-hidden="true"></i>									
											</a>
											<?php else:?>
												<a href="#" data-href="<?php echo HOME?>cliente_delete/<?php echo $cliente->get_id();?>/" data-toggle="modal" data-target="#confirm-delete">
												<i class="fa fa-trash" aria-hidden="true"></i>								</a>												
											<?php endif;?>
										</td>

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

		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	    <div class="modal-dialog">

	        <div class="modal-content">

	            <div class="modal-header">

	                Eliminar dato

	            </div>

	            <div class="modal-body">

	                ¿Confirma que quiere eliminar?

	            </div>

	            <div class="modal-footer">

	                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

	                <a class="btn btn-danger btn-ok">Borrar</a>

	            </div>

	        </div>

	    </div>

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

    <script type="text/javascript">

		$('#confirm-delete').on('show.bs.modal', function(e) {

		    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

		});    	

    	

    </script>

</body>
</html>