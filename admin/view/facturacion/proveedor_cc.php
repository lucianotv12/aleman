

			<!-- begin row -->
			<div class="row">
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title"><?php echo @$titulo?> - Cuenta Corriente <span> PROVEEDOR : <?php if($cliente) echo $cliente->get_nombre();?> </span></h4>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="7">
                                            <form method="post" action="<?php echo ADMIN?>proveedor_cc.html">
                                                <select name="proveedorId" id="proveedorId" onchange="submit()">    
                                                    <option value="0">Seleccione Proveedor</option>
                                                    <?php foreach($proveedores as $proveedor):?>
                                                        <option value="<?php echo $proveedor->id?>" <?php if($_proveedor == $proveedor->id) echo "selected";?>><?php echo $proveedor->nombre?></option>
                                                     <?php endforeach;?>
                                                </select>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                	<tr><th colspan="3">
                                                <a href="#"  data-toggle="modal" data-target="#nuevo_movimiento" style="color:red">Nuevo movimiento Debe </a>                                            
                                            </th>
                                            <th colspan="3">
                                                <a href="#"  data-toggle="modal" data-target="#nuevo_movimiento_haber" style="color:blue">Nuevo movimiento Haber </a>                                            
                                            </th></tr>                                        

                                    <tr style="font-size: 11px">
                                            <th style="background-color: #5DBD90;">Id ref</th>
                                            <th style="background-color: #5DBD90;">Fecha</th>                                            
                                            <th style="background-color: #5DBD90;">Factura</th>
                                            <th style="background-color: #5DBD90;">Remito</th>
                                            <th style="background-color: #5DBD90;">Detalle</th>
                                            <!--<th style="background-color: #5DBD90;">F.Deposito</th>-->
                                            <th style="background-color: #5DBD90;">Debe</th>
                                            <th style="background-color: #5DBD90;">Haber</th>
                                            <th style="background-color: #5DBD90;">Saldo</th>
                                            
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $saldo = 0;
                                        foreach($facturas as $factura):
                                        if($factura["idCliente"] == 1):
                                                $consumidor_final = Factura::get_consumidor_final($factura["id"]);
                                        endif;
                                        $saldo += $factura["importe"];
                                        ?>
                                        <tr style="color:gray;font-size: 11px">
                                            <td><?php echo $factura["id"] ?></td>                                            
                                            <td><?php $date=date_create($factura["fecha"]); echo date_format($date, "Y/m/d");  ?></td>
                                            <td><?php echo $factura["n_factura"] ?></td>
                                            <td><?php echo $factura["n_remito"] ?></td>
                                            <td>&nbsp;</td>                                            
                                            <!--<td>&nbsp;</td>-->
                                            <td><?php echo $factura["importe"] ?></td>
                                            <td>&nbsp;</td>
                                            <td><?php echo number_format($saldo, 2, ",", ".")?></td>

                                        </tr>
                                        <?php 
                                        $pagos = PAGO::get_pagos_factura($factura["id"]);    
                                        foreach ($pagos as $pago){ $saldo -= $pago["importe"]; ?>
                                        <tr style="color:gray;font-size: 11px">
                                            <td><?php echo $factura["id"] ?>&nbsp;</td>                                                                                        
                                            <td><?php echo  $pago["fecha"] ?></td>
                                            <td><?php echo $factura["n_factura"] ?></td>
                                            <td><?php echo $factura["n_remito"] ?></td>
                                            <td><?php echo $pago["descripcion"] ?></td>
                                            <td>&nbsp;</td>
                                            <!--<td>&nbsp;</td>-->                                            
                                            <td><?php echo $pago["importe"] ?></td>
                                            <td><?php echo number_format($saldo, 2, ",", ".")?></td>        
                                        </tr>    
                                        <?php                                        
                                        }                                        
                                        ?>
                                        
                                    <?php endforeach;?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-10 -->
            </div>
            <!-- end row -->

		</div>
		<!-- end #content -->
		

	</div>



        <div class="modal fade" id="nuevo_movimiento_haber" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	    <div class="modal-dialog">

	        <div class="modal-content">

	            <div class="modal-header">

	                Nuevo registro Cuenta Corriente

	            </div>

	            <div class="modal-body">
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                        <form name="nuevo_movimiento" method="post" action="<?php echo HOME?>nuevo_movimiento_cc_haber.html">
                        
                        <div class="panel-body">
                            <input type="hidden" name="proveedorId" value="<?php echo $_GET['id']?>">
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <label class="col-form-label col-md-3">Forma de pago:</label>
                                    <div class="col-md-9">
                                    <select name="idTipoPago" id="idTipoPago" class="">    
			                <?php foreach(Pago::get_tipos_pagos() as $tipo_pago): ?>
                                        <option value="<?php echo $tipo_pago["id"];?>"><?php echo $tipo_pago["nombre"];?></option>
\			                <?php endforeach;?>
                                    </select>
                                    </div>    
                                </div>
                                <div class="col-xs-12 form-group">
                                    <label class="col-form-label col-md-3">Importe:</label>
                                    <div class="col-md-9">
                                    <input type="text" name="importe" class="solo-numero">
                                    </div>    
                                </div>                                                                
                                <div class="col-xs-12 form-group">
                                    <label class="col-form-label col-md-3">N Factura adeudada:</label>
                                    
                                    <div class="col-md-9">                                        
                                    <select name="idFactura" id="idFactura" class="">    
                                        <?php foreach($facturas_deuda as $factura){?>
                                        <option value="<?php echo $factura['id']?>">Id ref :<?php echo $factura['id']?> </option>
                                        <?php }?>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <label class="col-form-label col-md-3">Detalle:</label>
                                    <div class="col-md-9">                
                                        <textarea name="descripcion"></textarea>    

                                    </div>
                                    
                                </div>
                                
                            </div>                 
                        </div></div>
	            </div>

	            <div class="modal-footer">

                        <button type="submit" name="GENERAR" class="btn btn-sm btn-success">Generar movimiento haber</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

	            </div>
                    </form>

	        </div>

	    </div>

	</div>        

	<div class="modal fade" id="nuevo_movimiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	    <div class="modal-dialog">

	        <div class="modal-content">

	            <div class="modal-header">

	                Nuevo registro Debe en Cuenta Corriente

	            </div>

	            <div class="modal-body">
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                        <form name="nuevo_movimiento" method="post" action="<?php echo HOME?>nuevo_movimiento_cc.html">
                        
                        <div class="panel-body">
                            <input type="hidden" name="proveedorId" value="<?php echo $_GET['id']?>">
                            <div class="row">
<!--                                <div class="col-xs-12 form-group">
                                    <label class="col-form-label col-md-3">Pago?:</label>
                                    <div class="col-md-9">
                                    <select name="pagoId" id="pagoId" class="">    
                                        <option value="0">No</option>
			                < ?php foreach(Pago::get_tipos_pagos() as $tipo_pago): ?>
                                        <option value="<?php echo $tipo_pago["id"];?>"><?php echo $tipo_pago["nombre"];?></option>
\			                <? php endforeach;?>
                                    </select>
                                    </div>    
                                </div>-->
                                <div class="col-xs-12 form-group">
                                    
                                    <label class="col-form-label col-md-3">N° Factura :</label>
                                    <div class="col-md-9">
                                    <input type="text" name="n_factura">
                                    </div>
                                </div>
                                <div class="col-xs-12 form-group">
                                    <label class="col-form-label col-md-3">N° Remito :</label>
                                    <div class="col-md-9">                                    
                                    <input type="text" name="n_remito">
                                    </div>
                                </div>          

                                <div class="col-xs-12 form-group">
                                    <label class="col-form-label col-md-3">Importe:</label>
                                    <div class="col-md-9">
                                    <input type="text" name="importe" class="solo-numero">
                                    </div>    
                                </div>
                            </div>                                
                            </div>                 
                            <div class="invoice-footer text-muted text-center" style="padding: 15px">
                                <button type="submit" name="GENERAR" class="btn btn-sm btn-success">Generar movimiento debe</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div></div>
	            </div>

	            <div class="modal-footer">



	            </div>
               </form>

	        </div>

	    </div>

	</div>        
        
	<!-- end page container -->
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
	<script src="<?php echo HOME?>assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/extensions/Buttons/js/jszip.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/extensions/Buttons/js/pdfmake.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/extensions/Buttons/js/vfs_fonts.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo HOME?>assets/js/table-manage-buttons.demo.js"></script>
	<script src="<?php echo HOME?>assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			TableManageButtons.init();
		});
	</script>
	<script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  $(document).ready(function() {
    $("#datepicker1").datepicker();
  });  
//SOLO NUMEROS
	$(document).ready(function(){
	$(".solo-numero").keyup(function(){
	if ($(this).val() != '')
	$(this).val($(this).attr('value').replace(/[^0-9\.]/g, ""));
	});
	});

function mostrardiv() {

div = document.getElementById('flotante');

div.style.display = '';

}

function cerrar() {

div = document.getElementById('flotante');

div.style.display='none';

}

</script>

<script type="text/javascript"> 
$('#pagos').on('show.bs.modal', function(e) { 
    var bookId = $(e.relatedTarget).data('book-id'); 
    $(e.currentTarget).find('input[name="idFactura"]').val(bookId); 

}); 
</script>  
    <script type="text/javascript">

		$('#confirm-salida').on('show.bs.modal', function(e) {

		    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

		});    	

    	

    </script>	


</body>
</html>