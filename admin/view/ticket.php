<?php

if(isset($_POST["submit"] ) and $_POST["message"] != "" and $_POST["ticket_id"]):
	$asunto ="Respuesta de Shopper Ticket N:" . $_POST["ticket_id"];
	$html="";
	$html .= "<p><img src='http://myanalytics.com.ar/admin/images/logo.png'></p>";
	$html .= "<p>Muchas gracias por escribirnos.</p>";
	$html .= "<p>Su respuesta en relación al ticket N°" . $_POST['ticket_id'] ." es la siguiente:</p>";
	$html .= "<p>". $_POST["message"] ."</p>";
	$html .= "<p>Saludos Cordiales</p>";
	$html .= "<p>Equipo Shopper</p>";

//	$html .= "<p><img src='".IMGS."email_footer.png'></p>";

	require_once  '../mandrill/Mandrill.php'; 
	$mandrill = new Mandrill('1Tg-biFyBAAq8yh7GYaYWg');
	try{ 
		$message = array(
			'subject' => $asunto,
			'html' => $html ,
			'from_email' => 'admin@shopper.com.ar',
			'to' => array(
				array(
					'email' => $_POST["email"],
					'name' => $_POST["usuario"]
				)                       
			)
		);
		$result = $mandrill->messages->send($message);   
		if($result){ $envio_email	= true; }
	} catch(Mandrill_Error $e) { 
		$envio_email	= false;
	}	
	$resultado->resultado	= true;
//	print_r($result);die;
	if($envio_email):	
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$_hora= date ("H:i:s");
	$_fecha= date ("Y-m-d");
	$hora_actual = $_fecha . " " . $_hora;
	$ticket_id = $_POST["ticket_id"];
	$user_id = $_POST["user_id"];

	$conn = new Conexion();
	$sql = $conn->prepare("INSERT INTO tickets_mensajes values(NULL, :TICKET, :MESSAGE, :STATUS, '$hora_actual',1 )");
	$sql->execute(array("TICKET" => $ticket_id, "MESSAGE" => $_POST["message"], "STATUS" => $_POST["status"]));

	$sql = $conn->prepare("UPDATE tickets set status = :STATUS where id = :TICKET ");
	$sql->execute(array("TICKET" => $ticket_id, "STATUS" => $_POST["status"]));

	$sql =null;
	$conn=null;
	$_POST["submit"] = "";
	$_POST["ticket_id"] = "";
	endif;
		echo '<script type="text/javascript">window.location.assign("tickets_campania/campania_preproductiva/");</script>'; 
		header('Location:' . HOME . 'tickets_campania/campania_preproductiva/');	
endif;



?>
		  	<div class="row">

  			<div class="content-box-large" style=" ">
  				<div class="panel-heading">
					<div class="panel-title" >DETALLE TICKET NRO <?php echo $_GET["id"]?></div>
				</div>  			
  				<div class="panel-body" >
  					<fieldset>
						<div class="form-group"> 
<!--							<p style="">ID : <?php echo $ticket["id"] ?></p>-->
							<p style="">Asunto : <?php echo $ticket["asunto"] ?></p>
							<p style="">
							<?php if($ticket["status"] == 1):
								echo "Pendiente";
							elseif($ticket["status"] == 2):
								echo "Abierto";
							elseif($ticket["status"] == 3):								
								echo "A confirmar cierre";
							elseif($ticket["status"] == 4):								
								echo "Cerrado";							
							endif;?></p>
							<p style="">Nombre : <?php echo $ticket["nombre"] .' '. $ticket["apellido"]; ?></p>
						</div>  		

						<div class="row">
									    <div class="col-md-12">
									        <!-- begin panel -->
						                    <div class="panel panel-inverse">
						                        <div class="panel-heading">
						                            <h4 class="panel-title">Mensajes</h4>
						                        </div>
						                        <div class="panel-body">
						                            <table id="data-table" class="table table-striped table-bordered">
						                                <thead>
						                                    <tr style="font-size: 11px">
															<th>Fecha</th>
															<th>Mensaje</th>

						                                    </tr>
						                                </thead>
						                                <tbody>
														<?php foreach($messages as $message):?>
															<tr style="color:gray;font-size: 11px">
																<td><?php $date=date_create($message["date"]);	
																	echo date_format($date,"Y/m/d H:i:s");?></td>
																<td><?php echo $message["mensaje"];?></td>
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
																		

  					</fieldset>	

  				</div>
  			</div>
  		<?php if($ticket["status"] != 4):?>	
  			<!-- RESPONDER-->
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">RESPONDER TICKET NRO <?php echo $_GET["id"]?></div>
				</div>  			
  				<div class="panel-body">
  					<form name="tickets"  method="post">  				
	  					<input type="hidden" name="ticket_id" value="<?php echo $_GET['id']?>">
	  					<input type="hidden" name="asunto" value="<?php echo $ticket["asunto"] ?>">
	  					<input type="hidden" name="email" value="<?php echo $ticket["email"] ?>">
	  					<input type="hidden" name="usuario" value="<?php echo $ticket['nombre'] . $ticket['apellido']  ?>">


	  					<fieldset>
							<div class="form-group"> 
								<label>ID : <?php echo $ticket["id"] ?></label> &nbsp; &nbsp; &nbsp;

							</div>  		
							<div class="form-group"> 
								<label>Status (pasar a) : </label>
								<select name="status" class="form-control">
									<option value="2">Abierto</option>
									<option value="3">A confirmar cierre</option>
								</select>
							</div> 		
							<div class="form-group"> 
								<label>Message : </label>
								<textarea class="form-control" name="message" placeholder="..." rows="6"></textarea>
							</div> 		
							<div class="form-group">
								<input type="submit" name="submit" class="btn btn-primary">	
							</div>	
	  					</fieldset>	
  					</form>
  				</div>
  			</div>
  			<!-- RESPONDER-->
  	<?php endif;?>		

		  </div>
		</div>
    </div>

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
	<script src="<?php echo HOME?>assets/js/inbox.demo.min.js"></script>
	<script src="<?php echo HOME?>assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			Inbox.init();
		});
	</script>

  </body>
</html>