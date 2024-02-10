			<!-- begin row -->
			<div class="row"> 

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
                            <h4 class="panel-title">Proveedor : <?php echo @$proveedor->nombre?></h4>
                        </div>
                        <div class="panel-body">
  							<?php if($cambio == "new"):?>
    		  					<form name="proveedor_cambio" enctype="multipart/form-data"  class="form-horizontal" method="post" action="<?php echo HOME?>proveedor_insert.html">
                                
		  					<?php else:?>
	    					    <form name="proveedor_cambio" enctype="multipart/form-data"  class="form-horizontal" method="post" action="<?php echo HOME?>proveedor_update/<?php echo $_GET['id'];?>/">
		  					    <input name="_idProveedor" type="hidden" value="<?php echo $_GET['id'];?>">
                            <?php endif;?>	

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nombre</label>
                                    <div class="col-md-9">
									<input type="text" class="form-control" name="nombre" value="<?php echo @$nombre?>">
                                    </div>
                                </div>                                
                    
                                <div class="form-group">
                                    <label class="col-md-3 control-label">identification_number</label>
                                    <div class="col-md-9">
									<input  class="form-control" type="text" name="identification_number" value="<?php echo @$identification_number?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">bill_to_pay</label>
                                    <div class="col-md-9">
									<input class="form-control" type="text" name="bill_to_pay" value="<?php echo @$bill_to_pay?>">
                                    </div>
                                </div>    

                                <div class="form-group">
                                    <label class="col-md-3 control-label">bill_to_refund</label>
                                    <div class="col-md-9">
									<input class="form-control" type="text" name="bill_to_refund" value="<?php echo @$bill_to_refund?>">
                                    </div>
                                </div>     
                                <div class="form-group">
                                    <label class="col-md-3 control-label">street</label>
                                    <div class="col-md-9">
                                    <input class="form-control" type="text" name="street" value="<?php echo @$street?>">
                                    </div>
                                </div>                                 
                                                                                              
                                <div class="form-group">
                                    <label class="col-md-3 control-label">number</label>
                                    <div class="col-md-9">
									<input class="form-control" type="text" name="number" value="<?php echo @$number?>">
                                    </div>
                                </div>     
                                <div class="form-group">
                                    <label class="col-md-3 control-label">postal_code</label>
                                    <div class="col-md-9">
									<input class="form-control" type="text" name="postal_code" value="<?php echo @$postal_code?>">
                                    </div>
                                </div>     
                                <div class="form-group">
                                    <label class="col-md-3 control-label">category</label>
                                    <div class="col-md-9">
									<input class="form-control" type="text" name="category" value="<?php echo @$category?>">
                                    </div>
                                </div>                                     
                                <div class="form-group">
                                    <label class="col-md-3 control-label">channel</label>
                                    <div class="col-md-9">
                                    <input class="form-control" type="text" name="channel" value="<?php echo @$channel?>">
                                    </div>
                                </div>                                     

                                <div class="form-group">
                                    <label class="col-md-3 control-label">geographic_code</label>
                                    <div class="col-md-9">
                                    <input class="form-control" type="text" name="geographic_code" value="<?php echo @$geographic_code?>">
                                    </div>
                                </div>  

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Status</label>
                                    <div class="col-md-9">
										<select name="active" class="form-control">
											<option value="1" <?php if(@$active == "1") echo "selected"; ?> >active</option>
											<option value="0" <?php if(@$active == "0") echo "selected"; ?>>No active</option>
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
	<script src="<?php echo ADMIN?>assets/js/table-manage-buttons.demo.min.js"></script>
	<script src="<?php echo ADMIN?>assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			TableManageButtons.init();
		});
	</script>
        <script src="<?php echo JS?>cropper.js" type="text/javascript"></script>
    <script src="<?php echo JS?>main.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            var MaxInputs       = 20; //Número Maximo de Campos
            var contenedor       = $("#contenedor"); //ID del contenedor
            var AddButton       = $("#agregarCampo"); //ID del Botón Agregar

            //var x = número de campos existentes en el contenedor
            var x = $("#contenedor div").length + 1;
            var FieldCount = x-1; //para el seguimiento de los campos

            $(AddButton).click(function (e) {
                if(x <= MaxInputs) //max input box allowed
                {
                    FieldCount++;
                    //agregar campo
                    $(contenedor).append('<label class="col-md-3 control-label"></label><div class="col-md-9" style="padding-top:10px"><input type="text" name="titulo_'+ FieldCount +'"  id="campo_'+ FieldCount +'" placeholder="titulo '+ FieldCount +'"/>&nbsp;<input type="text" name="descripcion_'+ FieldCount +'"  placeholder="Descripcion "/>&nbsp;<a href="#" class="eliminar">&times;</a></div>');
                    x++; //text box increment
                }
                return false;
            });

            $("body").on("click",".eliminar", function(e){ //click en eliminar campo
                if( x > 1 ) {
                    $(this).parent('div').remove(); //eliminar el campo
                    x--;
                }
                return false;
            });
        }); 

    function borrar_infotecnica(_id,db=0)
    {       
        $.get("<?php echo HOME?>view/borrar_infotecnica.php", { code: _id, base:db }, function(){

                location.reload();
        });
    }
    </script>

</body>
</html>