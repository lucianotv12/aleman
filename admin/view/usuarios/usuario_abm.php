
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">USUARIO : </h4>
                        </div>
                        <div class="panel-body">
  							<?php if($cambio == "nuevo"):?>
		  					<form name="INSERT" enctype="multipart/form-data"  class="form-horizontal" method="post" action="<?php echo HOME?>usuario_insert.html" data-parsley-validate="true">
                                
		  					<?php else:?>
		  					       <form name="CHANGE" enctype="multipart/form-data"  class="form-horizontal" method="post" action="<?php echo HOME?>usuario_update/<?php echo $_GET['id'];?>/" data-parsley-validate="true">

                            <?php endif;?>	
       
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nombre</label>
                                    <div class="col-md-9">
									<input type="text" class="form-control" name="nombre" value="<?php echo @$nombre?>" data-parsley-required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Apellido</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="apellido" value="<?php echo @$apellido?>" data-parsley-required="true">
                                    </div>
                                </div>                                

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Telefono</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="telefono" value="<?php echo @$telefono?>">
                                    </div>
                                </div>         
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="email" value="<?php echo @$email?>">
                                    </div>
                                </div>         

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Contrase&ntilde;a</label>
                                    <div class="col-md-9">
                                    <input type="password" class="form-control" name="pass" value="<?php echo @$pass?>" data-parsley-required="true">
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Confirmar Contrase&ntilde;a</label>
                                    <div class="col-md-9">
                                    <input type="password" class="form-control" name="pass1" value="<?php echo @$pass1?>" data-parsley-required="true">
                                    </div>
                                    <?php if($mensaje_error):
                                        echo "<H3>" . $mensaje_error . "</H3>";
                                    endif;    ?>
                                </div> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Gerarquia</label>
                                    <div class="col-md-9">
                                        <select name="gerarquia">
                                        <option value="1" <?php if($gerarquia == 1) echo "selected";?>>Administrador</option>
                                        <option value="0" <?php if($gerarquia == 0) echo "selected";?>>Vendedor</option>
                                        </select>
                                    </div>
                                </div>       
                          
								<div class="form-group">
                                    <label class="col-md-3 control-label">Accion</label>
                                    <div class="col-md-9">							
									<input type="submit" name="submit" class="btn btn-sm btn-success" value="GUARDAR">
									</div>
								</div>	


                            </form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
            </div>
            <!-- end row -->

		</div>
		<!-- end #content -->
		

	</div>
	<!-- end page container -->
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo ADMIN?>assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="<?php echo ADMIN?>assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="<?php echo ADMIN?>assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="<?php echo ADMIN?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php echo ADMIN?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo ADMIN?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="<?php echo ADMIN?>assets/plugins/ckeditor/ckeditor.js"></script>
    <script src="<?php echo ADMIN?>assets/plugins/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="<?php echo ADMIN?>assets/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
    <script src="<?php echo ADMIN?>assets/js/form-wysiwyg.demo.min.js"></script>
    <script src="<?php echo ADMIN?>assets/js/apps.min.js"></script>    
	<script src="<?php echo ADMIN?>assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="<?php echo ADMIN?>assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo ADMIN?>assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo ADMIN?>assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js"></script>
	<script src="<?php echo ADMIN?>assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js"></script>
	<script src="<?php echo ADMIN?>assets/plugins/DataTables/extensions/Buttons/js/jszip.min.js"></script>
	<script src="<?php echo ADMIN?>assets/plugins/DataTables/extensions/Buttons/js/pdfmake.min.js"></script>
	<script src="<?php echo ADMIN?>assets/plugins/DataTables/extensions/Buttons/js/vfs_fonts.min.js"></script>
	<script src="<?php echo ADMIN?>assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js"></script>
	<script src="<?php echo ADMIN?>assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js"></script>
	<script src="<?php echo ADMIN?>assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo ADMIN?>assets/plugins/parsley/dist/parsley.js"></script>

	<script src="<?php echo ADMIN?>assets/js/table-manage-buttons.demo.min.js"></script>
	<script src="<?php echo ADMIN?>assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
    <script>
        $(document).ready(function() {
            App.init();
            TableManageButtons.init();
        $("#idCategoria").change(function(){dependencia_estado();});

        });
    function dependencia_estado()
    {
        var code = $("#idCategoria").val();
        $.get("<?php echo VIEW?>productos/carga_subcategorias.php", { code: code },
            function(resultado)
            {
                if(resultado == false)
                {
                    alert(" Esta Categoria no posee Subcategorias");
                }
                else
                {
                    $("#idSubCategoria").attr("disabled",false);
                    document.getElementById("idSubCategoria").options.length=1;
                    $('#idSubCategoria').append(resultado);         
                }
            }

        );
    }

    </script> 

</body>
</html>