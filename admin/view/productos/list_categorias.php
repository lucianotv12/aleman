

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
                            <h4 class="panel-title">CATEGORIAS</h4>
                        </div>
                        <div class="alert alert-warning fade in">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="panel-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>


                                <tr><th colspan="3"><a href="<?php echo HOME?>new_categoria.html">NUEVA CATEGORIA</a></th></tr>

								<tr style="color:gray;font-size: 11px">
								
									<th style="background-color: #5DBD90;">id</th>
									<th style="background-color: #5DBD90;">nombre</th>
									<th style="background-color: #5DBD90;">Descripcion</th>
							        <th style="background-color: #5DBD90;">Proveedor</th>
									<th style="background-color: #5DBD90;">Dolar</th>      
									<th style="background-color: #5DBD90;">Actualizacion</th>                
									<th style="background-color: #5DBD90;">Activo</th>
							        <th style="background-color: #5DBD90;">+ Info</th>
									<th style="background-color: #5DBD90;">Borrar</th>
								</tr>
                                </thead>
                                <tbody>
								<? $contador = 0;
								foreach ($productos as $producto):
								$contador++;
								echo "aca entro";
								?>
								<tr style="color:gray;font-size: 11px">
								
									<td><?php echo  $producto["id"]; ?></td>
									<td><?php echo  $producto["nombre"]; ?></td>
									<td><?php echo  $producto["descripcion"]; ?></td>
									<td><?php echo  $producto["proveedor_categoria"]; ?></td>
							                <td><?php echo  $producto["dolar"]; ?></td>                
							                <td><? if($producto["fechaActualizacion"] == "00/00/0000") echo ""; else echo $producto["fechaActualizacion"]; ?></td>                
									<td><?if($producto["activo"] == 1) echo "Si";else echo "No"; ?></td>

									<td><a href="<?php echo HOME?>modify_categoria/<?php echo  $producto["id"] ?>/">
									<i class="fa fa-edit" aria-hidden="true"></i>

									</a></td>

									<td align="center"><a href="javaScript:pregunta('<?php echo  $producto["id"]?>','Categoria','delete_categoria')">
									<i class="fa fa-trash" aria-hidden="true"></i>									
									</a></td>
								</tr>
								<? endforeach ?>

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