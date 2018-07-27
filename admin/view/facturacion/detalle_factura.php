
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
                            <strong>Consumidor Final</strong><br />
                            domicilio<br />
                            Ciudad<br />
                            Telefono: (123) 456-7890<br />
                        </address>
                    </div>
                    <div class="invoice-date">
                        <small>Remito X / <?php echo $factura["id"]?></small>
                        <div class="date m-t-5"><?php echo date("d/m/Y");?></div>
                        <div class="invoice-detail">
                            #0000123DSS<br />
                            Productos varios
                        </div>
                    </div>
                </div>
                <div class="invoice-content">

                    <form name="datos" method="post" enctype="multipart/form-data" action="<?php echo HOME?>generar_factura.html" onKeyPress="return disableEnterKey(event)" >

                    <div class="table-responsive">
                        <table id="mitabla" class="table table-invoice" >
                                <tr id="0">
                                    <th>Cant.</th>
                                    <th>Art.</th>
                                    <th>P/unitario</th>
                                    <th>Desc.</th>
                                    <th>Importe</th>
                                    <th></th>
                                </tr>
                                <?php foreach($productos as $producto):?>
                                    <tr>
                                        <td><?php echo $producto["cantidad"]?></td>
                                        <td><?php echo $producto["idProducto"]?></td>

                                        <td><?php echo $producto["precio_unitario"]?></td>
                                        <td><?php echo $producto["descuento"]?></td>
                                        <td><?php echo $producto["precio_total"]?></td>
                                    </tr>    
                                <?php endforeach;?>    
                        </table>
                    </div>
                    <div class="invoice-price">
                        <div class="invoice-price-left">
                            <div class="invoice-price-row">
                                <div class="sub-price">
                                    <small>SUBTOTAL</small>
                                    $<span id="subtotal_final"><?php echo $factura["importe"]?></span>
                                </div>
                                <div class="sub-price">
                                    <i class="fa fa-plus"></i>
                                </div>
                                <div class="sub-price">
                                    <small>Iva (21%)</small>
                                    $0
                                </div>
                            </div>
                        </div>
                        <div class="invoice-price-right">
                            <small>TOTAL</small> 
                            $<span id="total_final"><?php echo $factura["importe"]?></span>
                        </div>
                    </div>
                </div>
<!--                <div class="invoice-note">
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
                </div>-->
                <div class="invoice-footer text-muted">
                    <input type="submit" name="GENERAR" value="GENERAR PRESUPUESTO">

                </div>


                </form>
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

		});





	</script>
</body>
</html>
