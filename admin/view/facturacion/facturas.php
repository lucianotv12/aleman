

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
                            <h4 class="panel-title"><?php echo @$titulo?> - Productos</h4>
                        </div>
                        <div class="alert alert-warning fade in">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="panel-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>


                                	<tr><th colspan="3"><a href="<?php echo HOME?>modelo_factura.html">NUEVA FACTURA</a></th></tr>

                                    <tr style="font-size: 11px">
									<th style="background-color: #5DBD90;">Id</th>
									<th style="background-color: #5DBD90;">Fecha</th>
									<th style="background-color: #5DBD90;">Cliente</th>
									<th style="background-color: #5DBD90;">Importe</th>
									<th style="background-color: #5DBD90;">Saldo</th>
									<th style="background-color: #5DBD90;">Estado</th>
									<th style="background-color: #5DBD90;">Comprobante</th>
									<th style="background-color: #5DBD90;">Pagos</th>

                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($facturas as $factura):
										if($factura["idCliente"] == 1):
											$consumidor_final = Factura::get_consumidor_final($factura["id"]);
										endif;
										?>
										<tr style="color:gray;font-size: 11px">
										<form name="orden" method="post" action="<?php echo HOME?>cambio_orden/<?php echo $_GET['id']?>/">
											<input type="hidden" name="integrante" value="<?php echo $producto["id"];?>">


											<td><?php echo $factura["id"] ?></td>
											<td><?php echo $factura["fecha"] ?></td>
											<?php if($factura["idCliente"] == 1):?>
												<td>C.Final <?php echo $consumidor_final["nombre"] ?></td>
											<?php else:?>
												<td><?php echo $factura["nombre_cliente"] ?></td>

											<?php endif;?>
											<td><?php echo $factura["importe"] ?></td>

											<?php $saldo_factura = Factura::get_saldo_factura($factura["importe"],$factura["id"]) ;
											if($saldo_factura > 0) {
																?>
											<td>$<FONT SIZE='' COLOR='red'><?php echo $saldo_factura?></FONT></td>
											<?php }else{ ?>
											<td>$<FONT SIZE='' COLOR='green'><?php echo $saldo_factura?></FONT></td>

											<?php } 
											$fecha_factura=explode("-",$factura["fecha"]);
											$fechasalida= $fecha[2]."-".$fecha[1]."-".$fecha[0];

											$fecha_vencimiento = date("Y-m-d",mktime(0, 0, 0, $fecha_factura[1]+1, $fecha_factura[2],   $fecha_factura[0]));
												if($fecha_vencimiento < date("Y-m-d") and $saldo_factura != 0 )
													{
														echo "<td>Vencida</td>";
													}
												elseif($fecha_vencimiento > date("Y-m-d") and $saldo_factura != 0 )	
													{
														echo "<td>Pendiente</td>";
													}
												elseif($saldo_factura == 0 )	
													{
														echo "<td>Abonada</td>";
													}
											?>

											

												
											<?php if(@$_GET['id']):?>
											<td><a href="<?php echo HOME?>detalle_factura/<?php echo $factura["id"];?>/">Ver</td>
											<?php else:?>
											<td><a href="<?php echo HOME?>detalle_factura/<?php echo $factura["id"];?>/">Ver mas</td>
											<?php endif;?>		
											<td><a data-toggle="modal" data-target="#pagos" data-book-id="<?php echo $factura["id"];?>"  >pagar</a></td>


											</form>										
										</tr>
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

		<div class="modal fade" id="pagos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	               Registrar Pago
	            </div>

	            <div class="modal-body">
	            	<form name="pago" method="post" action="<?php echo HOME?>registrar_pago/<?php echo $_GET["id"]?>/">
	            						<table >
					<input type="hidden" name="idFactura" >
                    <tr>
                        <td >Forma Pago:</td>
                        <td>
			                <?php foreach(Pago::get_tipos_pagos() as $tipo_pago): ?>

			                    <input type="radio" name="idTipoPago" value="<?php echo $tipo_pago["id"];?>" onclick="<?php if($tipo_pago["id"] == 2) echo 'javascript:mostrardiv();'; else echo 'javascript:cerrar();'; ?>">
			                    <?php echo $tipo_pago["nombre"];?>
			                <?php endforeach;?>
                        </td>
                    </tr>

						
					<!-- DATOS DEL CHEQUE -->        
					        <tr id="flotante" style="display:none;">
					            <td colspan="2">
					                <table class="tabla_list" >    
					                    <tr>
					                            <td class="td_text">N° Cheque :</td><td class="td_text"><input class="solo-numero" name="numero_cheque"  type="text"  onFocus="foco(this);" onBlur="no_foco(this);"></td>
					                    </tr>
					                    <tr>
					                            <td class="td_text">Banco :</td>
					                            <td class="td_text" colspan="2">
					                                <select name="banco">
					                                    <? foreach($bancos as $banco):?>
					                                    <option value="<?php echo $banco["id"]?>"><?php echo $banco["nombre"];?></option> 
					                                 
					                                    <? endforeach;?>
					                                </select>
					                            </td>
					                    </tr>
					                    <tr>
					                            <td class="td_text">Titular :</td><td class="td_text"><input name="titular"  type="text"  onFocus="foco(this);" onBlur="no_foco(this);"></td>
					                            <td class="td_text">Destinatario :</td><td class="td_text"><input name="destinatario"  type="text"  onFocus="foco(this);" onBlur="no_foco(this);"></td>
					                    </tr>
					                    <tr>
					                            <td class="td_text">Fecha Emisi&oacute;n :</td><td class="td_text"><input name="fecha_emision" id="datepicker" type="text"  onFocus="foco(this);" onBlur="no_foco(this);"></td>
					                            <td class="td_text">Fecha Cobro :</td><td class="td_text"><input name="fecha_cobro" id="datepicker1"  type="text" onFocus="foco(this);" onBlur="no_foco(this);"></td>
					                    </tr>
					                </table>

					            </td>
					        </tr>
					        
					<!-- FIN DATOS DEL CHEQUE -->        
					        
					        <tr>
							<td class="td_text">Importe :</td><td class="td_text"><input class="solo-numero" name="importe"  type="text" <?= $deshabilitado?> value="<?=$importe?>" onFocus="foco(this);" onBlur="no_foco(this);"></td>
						</tr>

						<tr>
							<td class="td_text">Descripcion:</td><td class="td_area"><textarea name="descripcion" rows="4" cols="60"   onFocus="foco(this);" onBlur="no_foco(this);"><?=$descripcion?></textarea></td>
						</tr>	
						
						<tr>
						<td class="submit" align="center" colspan="10" ><input type="submit" name="submit" value="GUARDAR" ></td>
						</tr>
					</table>
					</form>
	            </div>

	            <div class="modal-footer">
	            </div>

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
	<script src="<?php echo HOME?>assets/js/table-manage-buttons.demo.min.js"></script>
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

</body>
</html>