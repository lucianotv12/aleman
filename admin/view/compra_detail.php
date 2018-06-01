			<!-- begin row -->
			<div class="row">
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <h4 class="panel-title">Compra detalle nro <?php echo $_GET["id"]?> - Productos</h4>
                        </div>

                        <div class="panel-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr style="font-size: 11px">
									<th>Nombre</th>
									<th>Codigo</th>
									<th>Marca</th>
									<th>Modelo</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
									<th>Total</th>

                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($productos as $producto):?>
										<tr style="color:gray;font-size: 11px">
                                            <td><?php echo $producto["nombre"];?></td>
											<td><?php echo $producto["codigo"];?></td>
											<td><?php echo $producto["marca"];?></td>
											<td><?php echo $producto["modelo"];?></td>
											<td><?php echo $producto["precio"];?></td>
											<td><?php echo $producto["cantidad"];?></td>
											<td><?php echo $producto["precio"] * $producto["cantidad"];?></td>
										
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

            <!-- begin row -->
            <div class="row">
                <div class="col-md-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <h4 class="panel-title">Compra detalle nro <?php echo $_GET["id"]?> - Datos tarjeta</h4>
                        </div>

                        <div class="panel-body">
                            <table id="data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr style="font-size: 11px">
                                    <th>Titular</th>
                                   <!-- <th>Nro tarjeta</th>
                                    <th>Mes vto</th>
                                    <th>Año vto</th>
                                    <th>cod. seguridad</th>-->
                                    <th>Tarjeta</th>
                                    <th>Cuotas</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        <tr style="color:gray;font-size: 11px">
                                            <td><?php echo $tarjeta["titular"];?></td>
                                       <!--     <td>xxxx-xxxx-xxxx-xxxx</td>
                                            <td><?php echo $tarjeta["mes_vencimiento"];?></td>
                                            <td><?php echo $tarjeta["anio_vencimiento"];?></td>
                                            <td><?php echo $tarjeta["codigo_seguridad"];?></td>-->
                                            <td><?php echo $tarjeta["tarjeta"];?></td>
                                            <td><?php echo $tarjeta["cuotas"];?></td>
                                        
                                        </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-10 -->
            </div>
            <!-- end row -->
            <div class="row">
                <!-- begin panel -->
                <div class="panel panel-inverse" >
                    <div class="panel-heading">
                        <h4 class="panel-title">Datos de usuario</h4>
                    </div>
                    <div class="panel-body">          
                        <form>                  
                        <div class="form-group" >
                            <label class="col-md-3 control-label text-right" style="padding-top: 5px; font-size: 16px">Nombre</label>
                            <div class="col-md-9" style="padding-bottom: 10px">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user["nombre"];?>" disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label text-right" style="padding-top: 5px; font-size: 16px">Apellido</label>
                            <div class="col-md-9" style="padding-bottom: 10px">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user["apellido"];?>" disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label text-right" style="padding-top: 5px; font-size: 16px">Email</label>
                            <div class="col-md-9" style="padding-bottom: 10px">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user["email"];?>" disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label text-right" style="padding-top: 5px; font-size: 16px">Telefono</label>
                            <div class="col-md-9" style="padding-bottom: 10px">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user["telefono"];?>" disabled="disabled">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-3 control-label text-right" style="padding-top: 5px; font-size: 16px">Calle</label>
                            <div class="col-md-9" style="padding-bottom: 10px">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user["calle"];?>" disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label text-right" style="padding-top: 5px; font-size: 16px">Numero</label>
                            <div class="col-md-9" style="padding-bottom: 10px">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user["numero"];?>" disabled="disabled">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-md-3 control-label text-right" style="padding-top: 5px; font-size: 16px">Piso</label>
                            <div class="col-md-9" style="padding-bottom: 10px">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user["piso"];?>" disabled="disabled">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-md-3 control-label text-right" style="padding-top: 5px; font-size: 16px">Dpto</label>
                            <div class="col-md-9" style="padding-bottom: 10px">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user["dpto"];?>" disabled="disabled">
                            </div>
                        </div>                            
                        <div class="form-group">
                            <label class="col-md-3 control-label text-right" style="padding-top: 5px; font-size: 16px">Entre Calles</label>
                            <div class="col-md-9" style="padding-bottom: 10px">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user["entre_calles"];?>" disabled="disabled">
                            </div>
                        </div>                            
                        <div class="form-group">
                            <label class="col-md-3 control-label text-right" style="padding-top: 5px; font-size: 16px">Localidad</label>
                            <div class="col-md-9" style="padding-bottom: 10px">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user["localidad"];?>" disabled="disabled">
                            </div>
                        </div>       
                        <div class="form-group">
                            <label class="col-md-3 control-label text-right" style="padding-top: 5px; font-size: 16px">DNI</label>
                            <div class="col-md-9" style="padding-bottom: 10px">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user["dni"];?>" disabled="disabled">
                            </div>
                        </div>       
                        <div class="form-group">
                            <label class="col-md-3 control-label text-right" style="padding-top: 5px; font-size: 16px">Cantidad Productos</label>
                            <div class="col-md-9" style="padding-bottom: 10px">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user["cantidad_productos"];?>" disabled="disabled">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label text-right" style="padding-top: 5px; font-size: 16px">Valor total Envio</label>
                            <div class="col-md-9" style="padding-bottom: 10px">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user["precio_total_envio"];?>" disabled="disabled">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-md-3 control-label text-right" style="padding-top: 5px; font-size: 16px">Valor Total</label>
                            <div class="col-md-9" style="padding-bottom: 10px">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user["precio_total_productos"];?>" disabled="disabled">
                            </div>
                        </div>                                                  
                        <div class="form-group">
                            <label class="col-md-3 control-label text-right" style="padding-top: 5px; font-size: 16px">Fecha</label>
                            <div class="col-md-9" style="padding-bottom: 10px">
                            <input type="text" class="form-control" name="nombre" value="<?php echo $user["fecha"];?>" disabled="disabled">
                            </div>
                        </div>                       
                        </form>
                    </div>
                </div>
            </div>    
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
    <script src="<?php echo ADMIN?>assets/js/apps.min.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
            TableManageButtons.init();
        });
    </script>