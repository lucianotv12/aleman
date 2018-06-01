
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
                            <h4 class="panel-title">Producto : <?php echo @$producto->descripcion?></h4>
                        </div>
                        <div class="panel-body">
  							<?php if($cambio == "new"):?>
		  					<form name="producto_insert" enctype="multipart/form-data"  class="form-horizontal" method="post" action="<?php echo HOME?>producto_insert.html">
                                
		  					<?php else:?>
                                <?php if(!@$_GET["tipo"]):?>
		  					       <form name="producto_cambio" enctype="multipart/form-data"  class="form-horizontal" method="post" action="<?php echo HOME?>producto_update/<?php echo $_GET['id'];?>/">
		  					       <input name="_idProducto" type="hidden" value="<?php echo $_GET['id'];?>">
		  					    <?php else:?>
                                   <form name="producto_cambio" enctype="multipart/form-data"  class="form-horizontal" method="post" action="<?php echo HOME?>producto_campania_update-<?php echo $_GET['id'];?>-<?php echo $_GET['tipo'];?>">
                                   <input name="_idProducto" type="hidden" value="<?php echo $_GET['id'];?>">
                                <?php endif;?>   
                            <?php endif;?>	
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Categorias</label>
                                    <div class="col-md-9">
                                        <select name="idCategoria" class="form-control">
                                            <option value="1" > Categoria</option>
   
                                        </select>
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Categorias</label>
                                    <div class="col-md-9">
                                        <select name="idSubCategoria" class="form-control">

                                            <option value="1" > Subcategoria</option>

                                        </select>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nombre</label>
                                    <div class="col-md-9">
									<input type="text" class="form-control" name="descripcion" value="<?php echo @$descripcion?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Referencia</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="referencia" value="<?php echo @$referencia?>">
                                    </div>
                                </div>         
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Stock bajo minimo</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="aviso_stock" value="<?php echo @$aviso_stock?>">
                                    </div>
                                </div>         

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Precio</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="precio" value="<?php echo @$precio?>">
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Descuento 1</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="desc1" value="<?php echo @$desc1?>">
                                    </div>
                                </div>       
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Descuento 2</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="desc2" value="<?php echo @$desc2?>">
                                    </div>
                                </div>      
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Descuento 3</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="desc3" value="<?php echo @$desc3?>">
                                    </div>
                                </div>                                      

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Utilidad</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="utilidad" value="<?php echo @$utilidad?>">
                                    </div>
                                </div>      
                                <div class="form-group">
                                    <label class="col-md-3 control-label">IVA</label>
                                    <div class="col-md-9">
                                        <select name="iva" >
                                        <option value="21" <?php if($iva == "21") echo"selected";?>>21</option>
                                        <option value="10.5"  <?php if($iva == "10.5") echo"selected";?>>10.5</option>
                                        <option value="0"  <?php if($iva == "0") echo"selected";?>>0</option>
                                        </select>%
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Moneda</label>
                                    <div class="col-md-9">
                                        <select name="idMoneda" class="form-control">
                                        <?php foreach($monedas as $moneda):?>
                                            <option value="<?php echo $moneda['id']?>" <?php if(@$monedaId == $moneda['id']) echo "selected"; ?> > <?php echo $moneda['nombre']?></option>
                                        <?php endforeach;?> 
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Estado</label>
                                    <div class="col-md-9">
                                        <select name="activo" >
                                        <option value="1" <?php if($activo == "1") echo"selected";?>>Activo</option>
                                        <option value="0"  <?php if($activo == "0") echo"selected";?>>Desactivado</option>
                                    </div>
                                </div> 
                                <input type="hidden" name="bulto" value="1">
                                <input type="hidden" name="iva_10" value="0">
                            

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
	


</body>
</html>