			<!-- begin row -->
			<div class="row">
                      <div class="form-group" >
                        <label> IMAGENES DEL PRODUCTO</label>
                        <form name="upload_img" action="<?php echo HOME?>producto_insert_img/<?php echo $_GET['id'];?>/" enctype="multipart/form-data" method="post" >
                           <input type="file" name="imagen">
                           <input type="submit" name="submit" value="guardar imagen"> 
                        </form>    
                      </div>                 
            <?php if($cambio == "edit"):?>
                <?php if($imagenes):
                        foreach($imagenes as $imagen):?>
                        <div class="col-md-1"> <!--https://s3-us-west-2.amazonaws.com/ibris/-->
                            <img src="<?php echo 'https://s3-us-west-2.amazonaws.com/ibris/images/' . $imagen['carpeta'] . "/" . $imagen['url'] ?>" width="100px">
                            <br/>
                            <a href="<?php echo ADMIN?>borrar_img/<?php echo $imagen['id'];?>/">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ELIMINAR</a>
                        </div>
                    <?php 
                        endforeach;
                    endif;?>    
                <div class="col-md-12">
      <!--                <div class="form-group" id="crop-avatar">
                        <div class="avatar-view" style="width: 200px; height: 200px; margin-top: 0px" title="Cambiar Imagen">

                         <p>Nueva Imagen (600 x 600)</p> 
                         <?php  
                            $url_img = IMGS . "silueta.jpg";
                         ?>                 
                          <img src="<?php echo $url_img ?>"  class="img-responsive">

                        </div>

                        <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form class="avatar-form" action="<?php echo CTRL?>crop_img.php" enctype="multipart/form-data" method="post">
                                <input type="hidden" class="id_usuario" name="id_usuario" value="<?php echo $_GET['id'];?>">
                                <input type="hidden" class="ancho" name="ancho" id="ancho" value="600">
                                <input type="hidden" class="alto" name="alto" id="alto" value="600">
                                <input type="hidden" class="url_save" name="url_save" id="url_save" value="../images/productos/">
                                <input type="hidden" class="campo_save" name="campo_save" id="campo_save" value="image_url">
                                <input type="hidden" class="agregado_save" name="agregado_save" id="agregado_save" value="">
                                <input type="hidden" class="tabla_save" name="tabla_save" id="tabla_save" value="productos_imagenes">


                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title" id="avatar-modal-label">Cambiar Imagen</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="avatar-body">

                                    <div class="avatar-upload">
                                      <input type="hidden" class="avatar-src" name="avatar_src">
                                      <input type="hidden" class="avatar-data" name="avatar_data">
                                      <label for="avatarInput">Cargar Imagen</label>
                                      <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                                    </div>

                                    <div class="row">
                                      <div class="col-md-9">
                                        <div class="avatar-wrapper"></div>
                                      </div>
                                      <div class="col-md-3">
                                      </div>
                                    </div>

                                    <div class="row avatar-btns">
                                      <div class="col-md-9">

                                      </div>
                                      <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary btn-block avatar-save">Grabar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                      </div>-->

                    </div> 
                <?php endif;?>    

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
                            <h4 class="panel-title">Producto : <?php echo @$producto->nombre?></h4>
                        </div>
                        <div class="panel-body">
  							<?php if($cambio == "new"):?>
		  					<form name="producto_cambio" enctype="multipart/form-data"  class="form-horizontal" method="post" action="<?php echo HOME?>producto_insert.html">
                            <input name="referencia_shopper" type="hidden" value="<?php echo $referencia_shopper;?>">
                                
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
                                    <label class="col-md-3 control-label">Name</label>
                                    <div class="col-md-9">
									<input type="text" class="form-control" name="nombre" value="<?php echo @$nombre?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Categorias</label>
                                    <div class="col-md-9">
										<select name="categoriaId" class="form-control">
										<?php foreach($categorias as $categoria):?>
											<option value="<?php echo $categoria['id']?>" <?php if(@$categoriaId == $categoria['id']) echo "selected"; ?> > <?php echo $categoria['nombre']?></option>
										<?php endforeach;?>	
										</select>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Codigo</label>
                                    <div class="col-md-9">
									<input  class="form-control" type="text" name="codigo" value="<?php echo @$codigo?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Marcas</label>
                                    <div class="col-md-9">
                                        <select name="marca" class="form-control">
                                        <?php foreach($marcas as $marca):?>
                                            <option value="<?php echo $marca['id']?>" <?php if(@$marcaId == $marca['id']) echo "selected"; ?> > <?php echo $marca['nombre']?></option>
                                        <?php endforeach;?> 
                                        </select>
                                    </div>
                                </div>                                 

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Modelo</label>
                                    <div class="col-md-9">
									<input class="form-control" type="text" name="modelo" value="<?php echo @$modelo?>">
                                    </div>
                                </div>     
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Origen</label>
                                    <div class="col-md-9">
                                    <input class="form-control" type="text" name="origen" value="<?php echo @$origen?>">
                                    </div>
                                </div>                                 
                                 <div class="form-group">
                                    <label class="col-md-3 control-label">Color</label>
                                    <div class="col-md-9">
                                        <select name="color" class="form-control" >
                                            <option value="">Seleccione color</option>
                                            <option value="white" <?php if(@$color == "white") echo "selected";?>>Blanco</option>
                                            <option value="black" <?php if(@$color == "black") echo "selected";?>>Negro</option>
                                            <option value="red"<?php if(@$color == "red") echo "selected";?> >Rojo</option>
                                            <option value="Midnight Blue" <?php if(@$color == "Midnight Blue") echo "selected";?>>Azul</option>
                                            <option value="silver" <?php if(@$color == "silver") echo "selected";?>>Plateado</option>
                                            <option value="yellow" <?php if(@$color == "yellow") echo "selected";?>>Amarillo</option>
                                            <option value="orange" <?php if(@$color == "orange") echo "selected";?>>Naranja</option>
                                            <option value="grey" <?php if(@$color == "grey") echo "selected";?>>Gris</option>                                            
                                        </select>
                                    </div>
                                </div>                                                                    
                                <div class="form-group">
                                    <label class="col-md-3 control-label">garantia</label>
                                    <div class="col-md-9">
									<input class="form-control" type="text" name="garantia" value="<?php echo @$garantia?>">
                                    </div>
                                </div>     
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Descripción</label>
                                    <div class="col-md-9">
                                    <textarea class="form-control ckeditor" id="editor1" name="descripcion"><?php echo @$descripcion?></textarea>
                                    </div>
                                </div>     
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Peso</label>
                                    <div class="col-md-9">
										<select name="pesoId" class="form-control">
										<?php foreach($pesos as $peso):?>
											<option value="<?php echo $peso['id']?>" <?php if(@$pesoId == $peso['id']) echo "selected"; ?> > <?php echo $peso['peso']?></option>
										<?php endforeach;?>	
										</select>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Stock</label>
                                    <div class="col-md-9">
									<input class="form-control" type="number" name="stock" value="<?php echo @$stock?>">
                                    </div>
                                </div>     
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Precio</label>
                                    <div class="col-md-9">
									<input class="form-control" type="number" name="precio" value="<?php echo @$precio?>">
                                    </div>
                                </div>                                     
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Iva</label>
                                    <div class="col-md-9">
										<select name="iva" class="form-control">
											<option value="21" <?php if(@$iva == "21") echo "selected"; ?> >21%</option>
											<option value="10" <?php if(@$iva == "10.5") echo "selected"; ?> >10.5%</option>
											<option value="0" <?php if(@$iva == "0") echo "selected"; ?>>0</option>
										</select>
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
                                    <label class="col-md-3 control-label">Descuento</label>
                                    <div class="col-md-9">
                                        <input type="number" name="descuento" value="<?php echo @$descuento ?>" class="form-control">
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tipo Producto</label>
                                    <div class="col-md-9">
                                    <select name="tipoId" class="form-control" id="tipoId" >
                                        <?php foreach($tipos as $tipo):?>
                                            <option value="<?php echo $tipo["id"] ?>" <?php if($tipoId == $tipo["id"]) echo "selected";?>><?php echo $tipo["titulo"] ?></option>
                                        <?php endforeach;?>    
                                    </select>
                                    </div>
                                </div>      
                                <div id="producto_detalle" <?php if($tipoId == 1):?> style="display: none;" <?php endif;?>>                            
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Codigo Tipo</label>
                                    <div class="col-md-9">
                                        <input type="text" name="codigo_pd" value="<?php echo @$pd_codigo ?>" class="form-control">
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Fecha Desde</label>
                                    <div class="col-md-9">
                                        <input type="text" name="fecha_desde"  value="<?php echo @$pd_fecha_desde ?>" class="form-control datepicker">
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Fecha Hasta</label>
                                    <div class="col-md-9">
                                        <input type="text" name="fecha_hasta" value="<?php echo @$pd_fecha_hasta ?>" class="form-control datepicker1">
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Codigo seguridad</label>
                                    <div class="col-md-9">
                                        <select name="codigo_seguridad"  class="form-control">
                                            <option value="">Seleccione</option>
                                            <option value="DNI" <?php if(@$pd_codigo_seguridad == "DNI") echo "selected";?> >DNI</option>
                                            <option value="Nombre" <?php if(@$pd_codigo_seguridad == "Nombre") echo "selected";?> >Nombre</option>

                                        </select>

                                    </div>
                                </div>                                                                      
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Descripcion seguridad</label>
                                    <div class="col-md-9">
                                        <input type="text" name="desc_seguridad" value="<?php echo @$pd_desc_seguridad ?>" class="form-control">
                                    </div>
                                </div>  
                                </div>
                            <?php if($cambio == "edit"):?>
                                <div class="form-group">

                                <?php foreach($infotecnicas as $infotecnica):?>
                                    <label class="col-md-3 control-label">Información técnica cargadas : <br/></label>
                                    <p>
                                    <a href="#" onclick="javascript:borrar_infotecnica(<?php echo $infotecnica['id']?>,'<?php echo @$_GET["tipo"]?>');return false;"  class="eliminar">&times;</a>
                                    Titulo : <?php echo $infotecnica["titulo"]?> 
                                    Descripcion : <?php echo $infotecnica["descripcion"]?> 
                                    </p>
                                <?php endforeach;?> 
                                </div>
                            <?php endif;?>  

                                <div class="form-group">
                                   <label class="col-md-3 control-label"> Información técnica</label>
                                    <div class="col-md-9">
                                    <a id="agregarCampo" class="btn btn-info" href="#">Agregar Información técnica</a>

                                    </div>
                                </div>
                                <div class="form-group" id="contenedor">
                                        <div class="added">
                                           <label class="col-md-3 control-label"></label>
                                            <div class="col-md-9">
                                                <input type="text" name="titulo_1"  placeholder="Titulo"/>
                                                <input type="text" name="descripcion_1"  placeholder="Descripcion"/>
                                                <a href="#" class="eliminar">&times;</a>
                                            </div>
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
        
        $("#tipoId").change(function() {
            if($("#tipoId").val() != 1){
               $("#producto_detalle").css("display", "block");
            }else{
               $("#producto_detalle").css("display", "none");

            }

        });

  $( function() {
      $( ".datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
      $( ".datepicker1" ).datepicker({ dateFormat: "yy-mm-dd" });
  } );
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