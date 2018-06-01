

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
						          <?php if($_usuario->gerarquia == 1): ?>

                                	<tr><th ><a href="<?php echo HOME?>producto_new.html">NUEVO PRODUCTO</a></th></tr>
                                  <?php endif;?>	
                                    <tr style="font-size: 11px">
									<th>ID</th>
									<th>Nombre</th>
									<th>Color</th>
									<th>Marca</th>
									<th>Modelo</th>
									<th>Peso</th>
									<th>Precio</th>
						          <?php if($_usuario->gerarquia == 1): ?>
									<th>Editar</th>
									<th> Replicar</th>
								  	<?php if(@$_GET["id"]):?>
										<th>Orden</th>
									<?php endif;?>		
								  <?php endif;?>	

                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($productos as $producto):?>
										<tr style="color:gray;font-size: 11px">
										<form name="orden" method="post" action="<?php echo HOME?>cambio_orden/<?php echo $_GET['id']?>/">
											<input type="hidden" name="integrante" value="<?php echo $producto["id"];?>">


											<td><?php echo $producto["id"];?></td>
											<td><?php echo $producto["nombre"];?></td>
											<td><?php echo $producto["color"];?></td>
											<td><?php echo $producto["marca_nombre"];?></td>
											<td><?php echo $producto["modelo"];?></td>
											<td><?php echo $producto["peso"];?></td>
											<td><?php echo $producto["precio"];?></td>
    									    <?php if($_usuario->gerarquia == 1): ?>
												
											<?php if(@$_GET['id']):?>
											<td><a href="<?php echo HOME?>producto_campania_edit-<?php echo $producto["id"];?>-<?php echo $_GET['id']?>">Editar</td>
											<?php else:?>
											<td><a href="<?php echo HOME?>producto_edit/<?php echo $producto["id"];?>/">Ver mas</td>
											<?php endif;?>		
											<td>
												<?php
												$referencia_shopper_id = explode("_", $producto["referencia_shopper"] );
												$referencia_shopper_id = $referencia_shopper_id[2];
												 if($producto["id"] == $referencia_shopper_id ):?>
												<a href="<?php echo HOME?>producto_new/<?php echo $producto["id"];?>/">REPLICAR</a>
												<?php endif;?>
												 </td>										
									  	<?php if(@$_GET["id"]):?>
											<td>
												<select name="orden_<?php echo $producto["id"];?>" onchange="this.form.submit()">

												<?php for($i=1;$i <= $total_productos;$i++ ): ?>

													<option value="<?php echo $i ?>" <?php if($i == $producto["orden"]) echo "selected"; ?>  > <?php echo $i?></option>

												<?php endfor;?>	

											</select>
												
											</td>
											
										<?php endif;?>	
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