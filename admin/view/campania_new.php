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
                            <h4 class="panel-title">NUEVA CAMPAÑA</h4>
                        </div>
                        <div class="panel-body">
		  					<form name="campania_insert" enctype="multipart/form-data"  class="form-horizontal" method="post" action="<?php echo HOME?>campania_insert.html">
                            
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nombre Campaña</label>
                                    <div class="col-md-10">
									<input type="text" class="form-control" name="nombre" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Productos</label>
                                    <div class="col-md-10">
                                        <?php foreach($productos as $producto):?>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="productos[]" value="<?php echo $producto["id"];?>" />
                                                <?php echo $producto["nombre"];?>
                                            </label><br/>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Bancos</label>
                                    <div class="col-md-10">
                                        <?php foreach($bancos as $banco):?>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="bancos" value="<?php echo $banco["nombre"];?>" />
                                                <?php echo $banco["nombre"];?>
                                            </label>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Tarjetas</label>
                                    <div class="col-md-10">
                                        <?php foreach($tarjetas as $tarjeta):?>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="tarjetas[]" value="<?php echo $tarjeta["nombre"];?>" />
                                                <?php echo $tarjeta["nombre"];?>
                                            </label>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Fecha Inicio</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control datepicker" name="fecha_inicio" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Fecha Fin</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control datepicker1" name="fecha_fin" >
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Tipo campaña</label>
                                    <div class="col-md-10">
                                        <select name="tipo">
                                            <option value="sale">Sale</option>
                                            <option value="black">Black</option>
                                            <option value="hsbc">HSBC</option>
                                            <option value="comafi">Comafi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Legales</label>
                                    <div class="col-md-10">
                                    <textarea class="form-control ckeditor" id="editor1" name="legales"><?php echo @$descripcion?></textarea>
                                    </div>
                                </div>                                  

								<div class="form-group">
                                    <label class="col-md-2 control-label">Accion</label>
                                    <div class="col-md-10">							
									<input type="submit" name="submit" class="btn btn-sm btn-success" value="CREAR CAMPAÑA">
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
          $( function() {
              $( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
              $( ".datepicker1" ).datepicker({ dateFormat: "yy-mm-dd" });
          } );            
		});
	</script>
</body>
</html>