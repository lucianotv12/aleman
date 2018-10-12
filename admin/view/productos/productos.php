

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
									<form method="post" name="datos" action="<?php echo HOME?>home.html">


                                	<tr><th colspan="1"><a href="<?php echo HOME?>producto_new.html">NUEVO PRODUCTO</a></th>
                                	<th  colspan="9">BUSCAR <input type="text" size="70" name="buscador" id="buscar_usuarios" value="<?php echo  @$_POST["buscador"]?>" >
									<b>

									<input type="submit" name="submit" value="BUSCAR" style="background: #5DBD90; color: white; border: none;">
									<!--<a style="color:#5DBD90" onmouseover="this.style.color='blue'" onmouseout="this.style.color='#5DBD90'" href="javaScript:busqueda('home','TODOS')">TODOS</a>	-->
									</b></th>	
                                	</tr>
									</form>

                                    <tr style="font-size: 11px">
									<th style="background-color: #5DBD90;">ID</th>
									<th style="background-color: #5DBD90;">Nombre</th>
									<th style="background-color: #5DBD90;">Referencia</th>
									<th style="background-color: #5DBD90;">Categoria</th>
									<th style="background-color: #5DBD90;">Subcategoria</th>
									<th style="background-color: #5DBD90;">Precio</th>
									<th style="background-color: #5DBD90;">Fecha</th>
									<th style="background-color: #5DBD90;">Stock</th>
									<th style="background-color: #5DBD90;">+ Stock</th>

									<th style="background-color: #5DBD90;">Editar</th>


                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($productos as $producto):?>
										<tr style="color:gray;font-size: 11px">
											<input type="hidden" name="integrante" value="<?php echo $producto["id"];?>">


											<td><?php echo $producto["id"];?></td>
											<td><?php echo $producto["descripcion"];?></td>
											<td><?php echo $producto["referencia"];?></td>
											<td><?php echo $producto["categoria_nombre"];?></td>
											<td><?php echo $producto["subcategoria_nombre"];?></td>
											<td><?php echo Producto::get_precio_lista($producto["id"]);?></td>
											<td><?php $date=date_create($producto["fechaActualizacion"]); echo date_format($date,"d/m/Y");?>
											<td><?php $stock = Producto::get_producto_stock($producto["id"]);
											if($stock < $producto["aviso_stock"]):?>
												<span style="color: red"><?php echo $stock;?></span>
											<?php else: ?> 
												<span style="color: green "><?php echo $stock;?></span>
											<?php endif;?>

											</td>

											<td><a href="<?php echo HOME?>producto_stock/<?php echo $producto["id"];?>/">Agregar Stock</a></td>

												
											<?php if(@$_GET['id']):?>
											<td><a href="<?php echo HOME?>producto_campania_edit-<?php echo $producto["id"];?>-<?php echo $_GET['id']?>">Editar</td>
											<?php else:?>
											<td><a href="<?php echo HOME?>producto_edit/<?php echo $producto["id"];?>/">Ver mas</td>
											<?php endif;?>		
											


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
	//		App.init();
	//		TableManageButtons.init();
		});
	$(function(){
		$('#buscar_usuarios').autocomplete({
		source:"<?php echo VIEW?>productos/ajax.php",				
		});
		
	});


	function busqueda(accion,buscador)
	{

	document.datos.action="index.php?accion="+ accion +"&buscador=" + buscador ;
	document.datos.submit();

	}


	</script>
</body>
</html>