 

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
                            <table>
                                <tr>
                                    <th>Fecha</th>
                                    <th>comentario</th>
                                    <th>cantidad</th>
                                    <th>precio</th>
                                    <th>Usuario</th>

                                </tr>
                                <?php foreach($movimientos as $mov):?>
                                    <tr>

                                       <td><?php echo $mov["fechaCarga"];?></td> 
                                       <td><?php echo $mov["comentario"];?></td> 
                                       <td><?php echo $mov["cantidad"];?></td> 
                                       <td><?php echo $mov["precio"];?></td> 
                                       <td><?php echo $mov["user"];?></td> 
                                    </tr>
                                <?php endforeach;?>    

                            </table>


		  			
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