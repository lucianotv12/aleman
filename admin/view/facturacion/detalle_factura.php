
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
                            <div class="clientes" id="cliente_<?php echo $_cliente->id?>" >
                                <?php if($factura["idCliente"] == 1):?>
                                <strong><?php echo $consumidor_final["nombre"]?></strong><br />
                                <?php echo $consumidor_final["domicilio"]?> <?php echo $_cliente->cp?><br />
                                Email:<?php echo $consumidor_final["email"]?><br />
                                Telefono: <?php echo $consumidor_final["telefono"]?><br />                                
                                <?php else:?>
                                <strong><?php echo $_cliente->nombre?></strong><br />
                                <?php echo $_cliente->domicilio?> <?php echo $_cliente->cp?><br />
                                Email:<?php echo $_cliente->email?><br />
                                Telefono: <?php echo $_cliente->telefono?><br />                                
                                <?php endif;?>
                            </div>    
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
                                    <th >Detalle</th>
                                    <th>P/unitario</th>
                                    <th>Desc.</th>
                                    <th>Importe</th>
                                    <th></th>
                                </tr>
                                <?php 
                                $iva21 = 0;
                                $iva10 = 0;
                                $precio_total_factura = 0;
                                foreach($productos as $producto):
                                    if($factura["idCliente"] != 1):
                                        if($producto["iva"] == 21 or $producto["iva"] == 24 ):
                                           $iva_precio_unitario = round($producto["precio_unitario"] * 21 / 100,2);
                                           $iva21 += $iva_precio_unitario * $producto["cantidad"];
                                           $precio_unitario_sin_iva = round($producto["precio_unitario"] - $iva_precio_unitario,2); 
                                            $total_sin_iva += $precio_unitario_sin_iva * $producto["cantidad"];
                                            //variables para mostrar
                                            $precio_unitario = $precio_unitario_sin_iva;
                                            $precio_total = round($precio_unitario_sin_iva * $producto["cantidad"],2);
                                            $precio_total_factura += $precio_total; 
                                        elseif($producto["iva"] == 10): // sin desarrollar    
                                        endif;    

                                    elseif($factura["idCliente"] == 1):
                                            $precio_unitario = $producto["precio_unitario"];
                                            $precio_total =  $producto["precio_total"];                                        
                                            $precio_total_factura += $precio_total; 

                                    endif; // idcliente consumidor final    
                                    ?>
                                    <tr>
                                        <td><?php echo $producto["cantidad"]?></td>
                                        <td><?php echo $producto["idProducto"]?></td>
                                        <td><?php if($producto["idProducto"] == 0):
                                            echo $producto["nombre_producto"];
                                        else: 
                                            echo $producto["descripcion"];
                                        endif;?></td>
                                        <td><?php echo number_format($precio_unitario, 2 , ',', '.')?></td>
                                        <td><?php echo $producto["descuento"]?></td>
                                        <td><?php echo number_format($precio_total, 2 , ',', '.')?></td>
                                    </tr>    
                                <?php endforeach;?>    
                        </table>
                    </div>
                    <div class="invoice-price">
                        <div class="invoice-price-left">
                            <div class="invoice-price-row">
                                <div class="sub-price">
                                    <small>SUBTOTAL</small>
                                    $<span id="subtotal_final"><?php echo number_format($precio_total_factura, 2 , ',', '.')?></span>
                                </div>
                                <?php if($iva21):?>
                                    <div class="sub-price">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                    <div class="sub-price">
                                        <small>Iva (21%)</small>
                                        $<?php echo number_format($iva21, 2 , ',', '.')?>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="invoice-price-right">
                            <small>TOTAL</small> 
                            $<span id="total_final"><?php echo number_format($factura["importe"], 2 , ',', '.') ?></span>
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
