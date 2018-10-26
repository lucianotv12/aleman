
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
		  					<form name="producto_insert" enctype="multipart/form-data"  class="form-horizontal" method="post" action="<?php echo HOME?>producto_insert.html" data-parsley-validate="true">
                                
		  					<?php else:?>
		  					       <form name="producto_cambio" enctype="multipart/form-data"  class="form-horizontal" method="post" action="<?php echo HOME?>producto_update/<?php echo $_GET['id'];?>/" data-parsley-validate="true">
		  					       <input name="_idProducto" type="hidden" value="<?php echo $_GET['id'];?>">

                            <?php endif;?>	
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Categorias</label>
                                    <div class="col-md-9">
                                        <select name="idCategoria" id="idCategoria" class="form-control" data-parsley-required="true">
                                            <option value="" > Categoria</option>
                                            <?php foreach($categorias as $categoria):?>
                                            <option value="<?php echo $categoria["id"];?>" <?php if($idCategoria == $categoria["id"]) echo"selected";?>><?php echo $categoria["nombre"];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>    
                                <?php if($cambio == "new"):?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Subcategorias</label>
                                    <div class="col-md-9">
                                        <select name="idSubCategoria" id="idSubCategoria" class="form-control">

                                            <option value="" > Ninguna</option>

                                        </select>
                                    </div>
                                </div>                       
                                <?php else:?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Subcategorias</label>
                                    <div class="col-md-9">
                                        <select name="idSubCategoria" id="idSubCategoria" class="form-control">
                                            <option value="" > Ninguna</option>
                                            <?php foreach($subcategorias as $subcategoria):?>
                                            <option value="<?php echo $subcategoria["id"];?>" <?php if($idSubCategoria == $subcategoria["id"]) echo"selected";?>><?php echo $subcategoria["nombre"];?></option>
                                            <?php endforeach;?>

                                        </select>
                                    </div>
                                </div>                       
                                <?php endif;?>         
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nombre</label>
                                    <div class="col-md-9">
									<input type="text" class="form-control" name="descripcion" value="<?php echo @$descripcion?>" data-parsley-required="true">
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
                                    <input type="text" class="form-control" name="precio" value="<?php echo @$precio?>" data-parsley-required="true">
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
                                        <select name="iva" class="form-control" >
                                        <option value="24" <?php if($iva == "24") echo"selected";?>>24</option>
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
                                        <select name="activo" class="form-control" >
                                        <option value="1" <?php if($activo == "1") echo"selected";?>>Activo</option>
                                        <option value="0"  <?php if($activo == "0") echo"selected";?>>Desactivado</option>
                                       </select>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-md-3 control-label">IIBB</label>
                                    <div class="col-md-9">
                                        <select name="IIBB" class="form-control" >
                                        <option value="0" <?php if($IIBB == "1") echo"selected";?>>0</option>
                                        <option value="3.5"  <?php if($IIBB == "3.5") echo"selected";?>>3.5 %</option>
                                       </select>
                                    </div>
                                </div> 

                                <input type="hidden" name="bulto" value="1">
                            

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