<script type="text/javascript">
	function pregunta_borrar(_id)
	{
	var update=window.confirm("Esta a punto de borrar el producto " + _id + ", desea continuar?");

		if (update){

			window.location="<?php echo HOME?>usuario_delete/" + _id + "/";

		}
	}

</script>

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
                            <h4 class="panel-title"><?php echo @$titulo?> - Usuarios</h4>
                        </div>
                        <div class="alert alert-warning fade in">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="panel-body">
                            <table  class="table table-striped table-bordered">
                                <thead>
                                	<tr><th ><a href="<?php echo HOME?>usuario_new.html">NUEVO USUARIO</a></th></tr>

                                    <tr style="font-size: 11px">
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Email</th>
										<th>Usuario</th>
										<th>Tipo</th>
										<th>Ver</th>
										<th>Borrar</th>
										<?php if(@$gerarquia == true) {?>	<th> </th><?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($usuarios as $usuario):?>
										<tr style="color:gray;font-size: 11px">
											<input type="hidden" name="integrante" value="<?php echo $producto["id"];?>">
											<td><?php echo $usuario->get_nombre() ?></td>
											<td><?php echo $usuario->get_apellido() ?></td>
											<td><a href="mailto:<?php echo $usuario->get_email()?>"><?php echo $usuario->get_email() ?></a></td>		
											<td><?php echo $usuario->get_user() ?></td>	
											<td><?php if($usuario->get_gerarquia() == 1) echo "Administrador"; else echo "Vendedor"; ?></td>	

											<td><a href="<?php echo HOME?>usuario_modify/<?php echo $usuario->get_idUsuario() ?>/">
											Ver mas
											</a></td>
											<td><a href="#" data-href="<?php echo HOME?>usuario_delete/<?php echo $usuario->get_idUsuario();?>/" data-toggle="modal" data-target="#confirm-delete">Borrar </a></td>
	
											


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

	                Eliminación de usuario

	            </div>

	            <div class="modal-body">

	                ¿Confirma que quiere eliminar este usuario?

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


	<script src="<?php echo HOME?>assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	

    <script type="text/javascript">

		$('#confirm-delete').on('show.bs.modal', function(e) {

		    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

		});    	
		$(document).ready(function() {
			App.init();

		});
    	

    </script>	


</body>
</html>