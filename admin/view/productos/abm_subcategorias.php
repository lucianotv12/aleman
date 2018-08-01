
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
                            <h4 class="panel-title">SUBCATEGORIA : <?php echo @ $nombre?></h4>
                        </div>
                        <div class="panel-body">
  							<?php if($cambio == "nuevo"):?>
		  					<form name="categoria_insert" enctype="multipart/form-data"  class="form-horizontal" method="post" action="<?php echo HOME?>subcategoria_insert.html" data-parsley-validate="true">
		  					<?php else:?>
		  					       <form name="categoria_cambio" enctype="multipart/form-data"  class="form-horizontal" method="post" action="<?php echo HOME?>subcategoria_update/<?php echo $_GET['id'];?>/" data-parsley-validate="true">
		  					       <input name="id" type="hidden" value="<?php echo $_GET['id'];?>">

                            <?php endif;?>	
                               <input type="hidden" name="cambio" value="<?php echo $cambio?>">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Categoria</label>
                                    <div class="col-md-9">
                                        <select name="categoria" class="form-control" data-parsley-required="true">                    
                                            <option value ="" selected>NINGUNO</option>    
                                            <?php foreach($categorias as $categoria):?>
                                            <option value="<?php echo $categoria["id"];?>" <?php if($categoria["id"] == $categoria) echo "selected";?> ><?php echo $categoria["nombre"];?></option>
                                            
                                            <?php endforeach;?>    
                                        </select>   
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nombre</label>
                                    <div class="col-md-9">
									<input type="text" data-parsley-required="true" class="form-control" name="nombre" value="<?php echo @$nombre?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Descripcion</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="descripcion" value="<?php echo @$descripcion?>">
                                    </div>
                                </div>         
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Dolar</label>
                                    <div class="col-md-9">
                                    <input type="number" class="form-control" name="dolar" value="<?php echo @$dolar?>">
                                    </div>
                                </div>         

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Estado</label>
                                    <div class="col-md-9">
                                        <select name="activo" class="form-control" >
                                        <option value="1" <?php if($activo == "1") echo"selected";?>>Activo</option>
                                        <option value="0"  <?php if($activo == "0") echo"selected";?>>Desactivado</option>
	                                    </select>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Proveedor</label>
                                    <div class="col-md-9">
					                    <select name="proveedor" class="form-control">                    
					                        <option value ="0" selected>NINGUNO</option>    
					                        <?php foreach($proveedores as $proveedor):?>
					                        <option value="<?php echo $proveedor->id;?>" <?php if($proveedor->id == $idProveedor) echo "selected";?> ><?php echo $proveedor->nombre;?></option>
					                        
					                        <?php endforeach;?>    
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
        });
    </script>        
</body>
</html>