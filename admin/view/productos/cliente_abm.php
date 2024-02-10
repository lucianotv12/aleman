
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
                            <h4 class="panel-title">Cliente : <?php echo @$nombre?></h4>
                        </div>
                        <div class="panel-body">
  							<?php if($cambio == "new"):?>
		  					<form name="cliente_insert" enctype="multipart/form-data"  class="form-horizontal" method="post" action="<?php echo HOME?>cliente_insert.html">
                                
		  					<?php else:?>
		  					       <form name="cliente_cambio" enctype="multipart/form-data"  class="form-horizontal" method="post" action="<?php echo HOME?>cliente_update/<?php echo $_GET['id'];?>/">
		  					       <input name="_idcliente" type="hidden" value="<?php echo $_GET['id'];?>">
  
                            <?php endif;?>	
                          
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Razon social</label>
                                    <div class="col-md-9">
									<input type="text" class="form-control" name="nombre" value="<?php echo @$nombre?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Domicilio</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="domicilio" value="<?php echo @$domicilio?>">
                                    </div>
                                </div>         
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Codigo postal</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="cp" value="<?php echo @$cp?>">
                                    </div>
                                </div>         

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Telefono</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="telefono" value="<?php echo @$telefono?>">
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Telefono 2</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="telefono2" value="<?php echo @$telefono2?>">
                                    </div>
                                </div>       
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Contacto</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="contacto" value="<?php echo @$contacto?>">
                                    </div>
                                </div>      
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="email" value="<?php echo @$mail?>">
                                    </div>
                                </div>                                      

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Web</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="web" value="<?php echo @$web?>">
                                    </div>
                                </div>      
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Observaciones</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="observaciones" value="<?php echo @$observaciones?>">
                                    </div>
                                </div>      

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Descuento %</label>
                                    <div class="col-md-9">
                                    <input type="text" class="form-control" name="descuento" value="<?php echo @$descuento?>">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Condición IVA</label>
                                    <div class="col-md-9">
                                        <option value="0" >Seleccione...</option>       
                                        <option value="Responsable Inscripto" <?if($condicion_iva == "Responsable Inscripto") echo"selected"; ?> >Responsable Inscripto</option>
                                        <option value="Monotributista" <?if($condicion_iva == "Monotributista") echo"selected"; ?>>Monotributista</option>
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