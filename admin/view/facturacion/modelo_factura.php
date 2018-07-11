
			<!-- begin invoice -->
			<div class="invoice">
                <div class="invoice-company">
                    <span class="pull-right hidden-print">
                    <a href="javascript:;" class="btn btn-sm btn-success m-b-10"><i class="fa fa-download m-r-5"></i> Exportar a PDF</a>
                    <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-success m-b-10"><i class="fa fa-print m-r-5"></i> Imprimir</a>
                    </span>
                    Maderas "El Aleman"
                </div>
                <div class="invoice-header">
                    <div class="invoice-from">
                        <small>De</small>
                        <address class="m-t-5 m-b-5">
                            <strong>Maderas "El Aleman"</strong><br />
                            Direccion<br />
                            General Rodriguez, Buenos Aires<br />
                            Telefono: (123) 456-7890<br />
                            Fax: (123) 456-7890
                        </address>
                    </div>
                    <div class="invoice-to">
                        <small>Para</small>
                        <address class="m-t-5 m-b-5">
                            <strong>Cliente datos</strong><br />
                            domicilio<br />
                            Ciudad<br />
                            Telefono: (123) 456-7890<br />
                        </address>
                    </div>
                    <div class="invoice-date">
                        <small>Remito / ....</small>
                        <div class="date m-t-5"><?php echo date("d/m/Y");?></div>
                        <div class="invoice-detail">
                            #0000123DSS<br />
                            Productos varios
                        </div>
                    </div>
                </div>
                <div class="" style="background: #5DBD90;padding: 20px">
                      <label>  Seleccione Productos</label>
                        <div class="panel-body panel-form">
                            <form class="form-horizontal form-bordered">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Autocomplete</label>
                                    <div class="col-md-8">
                                        <input type="text" name="" id="jquery-autocomplete" class="form-control" placeholder="Try typing 'a' or 'b'." />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>   
                    <div class="" id="seleccionado" style="background: #5DBD90;padding: 20px; color: white;display: none;">
                        <span >ID: <label style="color: white" id="idproducto"></label></span> &nbsp;&nbsp;-&nbsp;&nbsp;
                        <span >Nombre: <label style="color: white" id="detalle_producto"></label></span>&nbsp;&nbsp;-&nbsp;&nbsp;
                        <span >Precio: <label style="color: white" id="precio_producto"></label></span>
                        <p> Cantidad <input type="number" name="cantidad" value="1" id="cantidad" style="color: black">&nbsp;&nbsp;-&nbsp;&nbsp; Descuento <input type="number" name="descuento" value="0" id="descuento"  style="color: black">

                        </p>
                    </div>
                <div class="invoice-content">


                    <div class="table-responsive">
                        <table class="table table-invoice">
                            <thead>
                                <tr>
                                    <th>DESCRIPCION</th>
                                    <th>PRECIO UNITARIO</th>

                                    <th>TOTAL PRODUCTO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Placa Durlook
                                        <br />
                                        <small>placa durlock 9 x 3</small>
                                    </td>
                                    <td>$50.00</td>
                                    <td>$150.00</td>
                                </tr>
                                <tr>
                                    <td>
                                        TALADRO DEWALT<br />
                                        <small>TALADRO DEWALT DWD 014 / 10 MM - 550W- V.V.R- 0 A 2800 RPM.	</small>
                                    </td>
                                    <td>$4230.00</td>
                                    
                                    <td>$4,230.00</td>
                                </tr>
                                <tr><td></td><td></td><td></td></tr>
                                <tr><td></td><td></td><td></td></tr>
                                <tr><td></td><td></td><td></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="invoice-price">
                        <div class="invoice-price-left">
                            <div class="invoice-price-row">
                                <div class="sub-price">
                                    <small>SUBTOTAL</small>
                                    $4,380.00
                                </div>
                                <div class="sub-price">
                                    <i class="fa fa-plus"></i>
                                </div>
                                <div class="sub-price">
                                    <small>Iva (21%)</small>
                                    $919080
                                </div>
                            </div>
                        </div>
                        <div class="invoice-price-right">
                            <small>TOTAL</small> $5299.80
                        </div>
                    </div>
                </div>
                <div class="invoice-note">
                    * Nota 1<br />
                    * Nota 2<br />
                    * Nota 3
                </div>
                <div class="invoice-footer text-muted">
                    <p class="text-center m-b-5">
                        Muchas gracias
                    </p>
                    <p class="text-center">
                        <span class="m-r-10"><i class="fa fa-globe"></i> elaleman.com</span>
                        <span class="m-r-10"><i class="fa fa-phone"></i> T:0237-4444444</span>
                        <span class="m-r-10"><i class="fa fa-envelope"></i> elaleman@gmail.com</span>
                    </p>
                </div>
            </div>
			<!-- end invoice -->

	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo HOME?>assets/plugins/jquery/jquery-1.9.1.min.js"></script>
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
	
	<script>
		$(document).ready(function() {
			App.init();
            handleJqueryAutocomplete();
		});

var handleJqueryAutocomplete = function() {

 //   $('#jquery-autocomplete').autocomplete({
            $('#jquery-autocomplete').autocomplete({
            source:"<?php echo VIEW?>facturacion/ajax.php",
            select: function(event, ui){
                 $("#idproducto").html(ui.item.id);
                 $("#detalle_producto").html(ui.item.descripcion);
                 $("#precio_producto").html(ui.item.precio); 
                 $("#seleccionado").css("display", "block");            
                 $("#cantidad").val("1");            
                 $("#descuento").val("0");            
            //AGREGAR EL PRECIO DEL PRODUCTO 
            }
                    
            });
};

	</script>
</body>
</html>
