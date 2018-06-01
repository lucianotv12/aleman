<?php
session_start();
include_once("../funciones.php");
$conductas = Reward::get_conducts();
$total_reconocimientos = Reward::get_total_rewards();
$funciones = Reward::get_rewards_function();

$total_publications = Publication::get_total_publications();
$publicaciones_funcion = Publication::get_publications_function();
$publicaciones_subarea = Publication::get_publications_subarea();
$reconocimientos_subarea = Reward::get_rewards_subarea();
$total_avales = Reward::get_total_avales();
$total_megusta = Publication::get_total_megusta();
$aprendizaje = Reward::get_rewards_function_comportamiento(1);
$colaboracion = Reward::get_rewards_function_comportamiento(2);
$impacto = Reward::get_rewards_function_comportamiento(3);
$comunicacion = Reward::get_rewards_function_comportamiento(4);
$agilidad = Reward::get_rewards_function_comportamiento(5);
$liderazgo = Reward::get_rewards_function_comportamiento(6);
$emprendedor = Reward::get_rewards_function_comportamiento(7);

$aprendizaje_total = Reward::get_total_rewards_comportamiento(1);
$colaboracion_total = Reward::get_total_rewards_comportamiento(2);
$impacto_total = Reward::get_total_rewards_comportamiento(3);
$comunicacion_total = Reward::get_total_rewards_comportamiento(4);
$agilidad_total = Reward::get_total_rewards_comportamiento(5);
$liderazgo_total = Reward::get_total_rewards_comportamiento(6);
$emprendedor_total = Reward::get_total_rewards_comportamiento(7);



function validar_administrador($_redireccion_estricta = true)
	{
	if (!isset($_SESSION["administrator"]))
		{
		# Verifico si me pasa una URL para mostrar un mensaje de error
		if($_redireccion_estricta)
			{# sino muestro el mensaje por defecto y redirecciono al Index
			redireccionar_admisnitrador("Su sessi&oacute;n ha caducado, aguarde, ser&aacute; redireccionado...",3);
			}
		return false;
		}
	else
		{
		return true;
		}
	}


function redireccionar_admisnitrador (  $message="", $seconds=0)
	{
	$url= HOME ;
//	header("Refresh: ".$seconds."; url=".$url); // waits 3 seconds & sends to homepage
    echo '<script type="text/javascript">window.location.assign("login.php");</script>';

	echo "<h4>".$message."</h4>";
	die();
	}


validar_administrador();	

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Administrator REC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="<?php echo BOOTSTRAP_CSS?>bootstrap.min.css" rel="stylesheet"/>
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header" style=" background-color:#0093d7">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php">administrator REC</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
    	<?php include_once("menu_lateral.php");?>		
		  <div class="col-md-10">

		  	<div class="row" style="padding-bottom: 40px">
		  		<div class="col-xs-3 text-center" style="background: #0093d7;  font-size: 20px; color:white">
		  			<p>Total Reconocimientos :</p>
		  			<p style="font-size: 28px;"><?php echo $total_reconocimientos["cantidad"]?></p>
		  		</div>
		  		<div class="col-xs-3 text-center" style="background: #ffe100;  font-size: 20px; color:white">
		  			<p>Total Publicaciones :</p>
		  			<p style="font-size: 28px;"><?php echo $total_publications["cantidad"]?></p>
		  		</div>
		  		<div class="col-xs-3 text-center" style="background: #0093d7;  font-size: 20px; color:white">
		  			<p>Total Avales :</p>
		  			<p style="font-size: 28px;"><?php echo $total_avales["cantidad"]?></p>
		  		</div>
		  		<div class="col-xs-3 text-center" style="background: #ffe100;  font-size: 20px; color:white">
		  			<p>Total Me Gusta :</p>
		  			<p style="font-size: 28px;"><?php echo $total_megusta["cantidad"]?></p>
		  		</div>		  		

		  	</div>

		  	<div class="row">
		  		<div class="col-xs-4 text-center">
		  			<div class=" col-xs-12">
			  			<p style="font-size: 16px; font-weight: bold">Reconocimientos por comportamiento</p>		  			
		  			</div>
		  			<div class="col-xs-7 text-left">
						<div id="hero-donut" style="height: 230px;"></div>
					</div>
					<div class="col-xs-5 text-right" style="padding-top: 20px; font-size: 11px; font-weight: bold;" >
						<?php $contador = 0;
						foreach ($conductas as $conducta):
							$contador++;
							$porcentaje = round( ($conducta["cuenta"] * 100) / $total_reconocimientos["cantidad"],2);
							$conducta_nombre = substr($conducta['name'],0, 20);
						?>	
					        <?php echo $conducta_nombre;?>:<?php echo substr($porcentaje,0,3)?>%<br/>
						

						<?php endforeach;?> 

					</div>
		  		</div>	

		  		<div class="col-xs-4 text-center">
		  			<div class="col-xs-12">
			  			<p style="font-size: 16px; font-weight: bold">Reconocimientos por Funciones</p>
		  			</div>
		  			<div class="col-xs-7 text-left">
						<div id="hero-donut2" style="height: 230px;"></div>
					</div>
					<div class="col-xs-5 text-right" style="padding-top: 20px; font-size: 11px; font-weight: bold;" >
						<?php $contador = 0;
						foreach ($funciones as $funcion):
							$contador++;
							$porcentaje = round( ($funcion["cantidad"] * 100) / $total_reconocimientos["cantidad"],2);
							$funcion_nombre = substr($funcion['function'],0,15);
						?>	
					        <?php echo $funcion_nombre;?>:<?php echo substr($porcentaje,0,3)?>%<br/>
        						
						<?php endforeach;?>    

					</div>

		  		</div>	
		  		<div class="col-xs-4 text-center">
		  			<div class="col-xs-12">
			  			<p style="font-size: 16px; font-weight: bold">Reconocimientos por Planta</p>
			  		</div>	

		  			<div class="col-xs-7 text-left">
						<div id="hero-donut5" style="height: 230px;"></div>
					</div>
					<div class="col-xs-5 text-right" style="padding-top: 20px; font-size: 11px; font-weight: bold;" >
						<?php $contador = 0;
						foreach ($reconocimientos_subarea as $reconocimiento):
							$contador++;
							$porcentaje = round( ($reconocimiento["cantidad"] * 100) / $total_reconocimientos["cantidad"],2);
							$funcion_nombre = substr($reconocimiento['subarea'],0, 15);
						?>	
					        <?php echo $funcion_nombre;?>:<?php echo substr($porcentaje,0,3)?>%<br/>

						<?php endforeach;?> 

					</div>

		  		</div>					  				  		
		  	</div>
		  	<div class="row" style="padding-top: 20px">	 				  		
  				  				  		
		  		<div class="col-xs-4 text-center">
		  			<div class="col-xs-12">
		  				<p style="font-size: 16px; font-weight: bold">Publicaciones por Funciones</p>
		  			</div>
		  			<div class="col-xs-7 text-left">
						<div id="hero-donut3" style="height: 230px;"></div>
					</div>
					<div class="col-xs-5 text-right" style="padding-top: 20px; font-size: 11px; font-weight: bold;" >
						<?php $contador = 0;
						foreach ($publicaciones_funcion as $publicacion):
							$contador++;
							$porcentaje = round( ($publicacion["cantidad"] * 100) / $total_publications["cantidad"],2);
							$funcion_nombre = substr($publicacion['function'],0,15);
						?>	
					        <?php echo $funcion_nombre;?>:<?php echo substr($porcentaje,0,3)?>%<br/>
						<?php endforeach;?> 

					</div>	
		  		</div>			  				  		
		  		<div class="col-xs-4 text-center">
		  			<div class="col-xs-12">
		  				<p style="font-size: 16px; font-weight: bold">Publicaciones por Planta</p>
		  			</div>
		  			<div class="col-xs-7 text-left">
						<div id="hero-donut4" style="height: 230px;"></div>
					</div>
					<div class="col-xs-5 text-right" style="padding-top: 20px; font-size: 11px; font-weight: bold;" >
						<?php $contador = 0;
						foreach ($publicaciones_subarea as $publicacion):
							$contador++;
							$porcentaje = round( ($publicacion["cantidad"] * 100) / $total_publications["cantidad"],2);
							$funcion_nombre = substr($publicacion['subarea'],0,15);
						?>	
					        <?php echo $funcion_nombre;?>:<?php echo substr($porcentaje,0,3)?>%<br/>
						<?php endforeach;?> 

					</div>	
		  		</div>			  				 

			</div>
			<div class="row text-center"  style="margin-top: 40px; padding-top: 5px; background: #0093d7; color: white">
		  		<p style="font-size: 26px; font-weight: bold">COMPORTAMIENTOS</p>
			</div>	
		  	<div class="row" style="padding-top: 20px">
		  		<div class="col-xs-4 text-center">
		  			<div class="col-xs-12">
		  				<p style="font-size: 16px; font-weight: bold">Aprendizaje Total : <?php echo $aprendizaje_total["cantidad"]?></p>
		  			</div>	

		  			<div class="col-xs-7 text-left">
						<div id="hero-donut6" style="height: 230px;"></div>
					</div>
					<div class="col-xs-5 text-right" style="padding-top: 20px; font-size: 11px; font-weight: bold;" >
						<?php $contador = 0;
						foreach ($aprendizaje as $funcion):
							$contador++;
							$porcentaje = round( ($funcion["cantidad"] * 100) / $aprendizaje_total["cantidad"],2);
							$funcion_nombre = substr($funcion['function'],0,15);
						?>
					        <?php echo $funcion_nombre;?>:<?php echo substr($porcentaje,0,3);?>%<br/>
						<?php endforeach;?> 

					</div>	


		  		</div>	

		  		<div class="col-xs-4 text-center">
		  			<div class="col-xs-12">
			  			<p style="font-size: 16px; font-weight: bold">Colaboraci&oacute;nTotal : <?php echo $colaboracion_total["cantidad"]?></p>
					</div>				
		  			<div class="col-xs-7">
						<div id="hero-donut7" style="height: 230px;"></div>
					</div>
					<div class="col-xs-5 text-right" style="padding-top: 20px; font-size: 11px; font-weight: bold;" >
						<?php $contador = 0;
						foreach ($colaboracion as $funcion):
							$contador++;
							$porcentaje = round( ($funcion["cantidad"] * 100) / $colaboracion_total["cantidad"],2);
							$funcion_nombre = substr($funcion['function'],0,15);
						?>	
					        <?php echo $funcion_nombre;?>:<?php echo $porcentaje?> % <br/>
						<?php endforeach;?> 

					</div>	

		  		</div>	

		  		<div class="col-xs-4 text-center">
		  			<div class="col-xs-12">
		  				<p style="font-size: 16px; font-weight: bold">Impacto Total : <?php echo $impacto_total["cantidad"]?></p>
		  			</div>
		  			<div class="col-xs-7">
						<div id="hero-donut8" style="height: 230px;"></div>
					</div>
					<div class="col-xs-5 text-right" style="padding-top: 20px; font-size: 11px; font-weight: bold;" >
						<?php $contador = 0;
						foreach ($impacto as $funcion):
							$contador++;
							$porcentaje = round( ($funcion["cantidad"] * 100) / $impacto_total["cantidad"],2);
							$funcion_nombre = substr($funcion['function'],0,20);
						?>	
					        <?php echo $funcion_nombre;?>:<?php echo $porcentaje?> % <br/>
						<?php endforeach;?> 

					</div>	
		  		</div>
		  	</div>	
		  	<div class="row" style="padding-top: 20px">
		  		<div class="col-xs-4 text-center">
		  			<div class="col-xs-12">
		  				<p style="font-size: 16px; font-weight: bold">Comunicaci&oacute;n Total : <?php echo $comunicacion_total["cantidad"]?></p>							
					</div>
		  			<div class="col-xs-7">
						<div id="hero-donut9" style="height: 230px;"></div>
					</div>
					<div class="col-xs-5 text-right" style="padding-top: 20px; font-size: 11px; font-weight: bold;" >
						<?php $contador = 0;
						foreach ($impacto as $funcion):
							$contador++;
							$porcentaje = round( ($funcion["cantidad"] * 100) / $impacto_total["cantidad"],2);
							$funcion_nombre = substr($funcion['function'],0,20);
						?>	
					        <?php echo $funcion_nombre;?>:<?php echo $porcentaje?>% <br/>
						<?php endforeach;?> 
					</div>					
		  		</div>					  				  				  		


		  		<div class="col-xs-4  text-center">
		  			<div class="col-xs-12">
			  			<p style="font-size: 16px; font-weight: bold">Agilidad Total : <?php echo $agilidad_total["cantidad"]?></p>
		  			</div>
		  			<div class="col-xs-7">
						<div id="hero-donut10" style="height: 230px;"></div>
					</div>
					<div class="col-xs-5 text-right" style="padding-top: 20px; font-size: 11px; font-weight: bold;" >
							<?php $contador = 0;					
							foreach ($agilidad as $funcion):
								$contador++;
								$porcentaje = round( ($funcion["cantidad"] * 100) / $agilidad_total["cantidad"],2);
								$funcion_nombre = substr($funcion['function'],0,20);
							?>	
					        <?php echo $funcion_nombre;?>:<?php echo $porcentaje?>% <br/>
						<?php endforeach;?> 
					</div>					
		  		</div>	

		  		<div class="col-xs-4 text-center">
		  			<div class="col-xs-12">
		  			<p style="font-size: 16px; font-weight: bold">Liderazgo Total : <?php echo $liderazgo_total["cantidad"]?></p>
		  			</div>
		  			<div class="col-xs-7">
						<div id="hero-donut11" style="height: 230px;"></div>
					</div>
					<div class="col-xs-5 text-right" style="padding-top: 20px; font-size: 11px; font-weight: bold;" >
							<?php $contador = 0;
							foreach ($liderazgo as $funcion):
								$contador++;
								$porcentaje = round( ($funcion["cantidad"] * 100) / $liderazgo_total["cantidad"],2);
								$funcion_nombre = substr($funcion['function'],0,20);
							?>	
					        <?php echo $funcion_nombre;?>:<?php echo $porcentaje?>% <br/>
						<?php endforeach;?> 
					</div>	
		  		</div>
		  	</div>
		  	<div class="row" style="padding-top: 20px">		  			
		  		<div class="col-xs-4 text-center">
		  			<div class="col-xs-12">
		  				<p style="font-size: 16px; font-weight: bold">Esp&iacute;ritu Emprendedor Total : <?php echo $emprendedor_total["cantidad"]?></p>
		  			</div>
		  			<div class="col-xs-7">
						<div id="hero-donut12" style="height: 230px;"></div>
					</div>
					<div class="col-xs-5 text-right" style="padding-top: 20px; font-size: 11px; font-weight: bold;" >
					<?php $contador = 0;
					foreach ($emprendedor as $funcion):
						$contador++;
						$porcentaje = round( ($funcion["cantidad"] * 100) / $emprendedor_total["cantidad"],2);
						$funcion_nombre = substr($funcion['function'],0,20);
					?>	
					    <?php echo $funcion_nombre;?>:<?php echo $porcentaje?>% <br/>
						<?php endforeach;?> 
					</div>	
		  		</div>			  	
		  	</div>

			<div class="row text-center"  style="margin-top: 40px; padding-top: 5px; background: #0093d7; color: white">
		  		<p style="font-size: 26px; font-weight: bold">RECONOCIMIENTOS POR FUNCION</p>
			</div>	
			<div class="row" style="padding-top: 20px">
			<?php $funtions = User::get_funtions_by_users();
				$contador =0;
				foreach($funtions as $function):?>
			<?php   $reconocidos = Reward::get_mas_felicitados_funtion($function["function"]);?>
				<?php if($reconocidos): $contador++;?>
					<?php if($contador == 5): echo "</div><div class='row'>";  endif;?>
					<div class="col-xs-3" style="border: 2px solid white; min-height: 140px; padding-top: 20px; margin-top: 20px;">
						<p style="font-size: 16px; font-weight: bold"><?php echo $function["function"];?></p>
					<?php	foreach($reconocidos as $reconocido):?>
						<p><?php echo $reconocido["name"];?> : <?php echo $reconocido["cantidad"];?></p>
					<?php endforeach;?>						
					</div>	
				<?php endif;?>
			<?php endforeach;?>
			</div>	

			<div class="row text-center"  style="margin-top: 40px; padding-top: 5px; background: #0093d7; color: white">
		  		<p style="font-size: 26px; font-weight: bold">RECONOCIMIENTOS POR SUBAREA</p>
			</div>	
			<div class="row" style="padding-top: 20px">
			<?php $subareas = User::get_subarea_by_users();
				$contador=0;
				foreach($subareas as $subarea):?>
			<?php   $reconocidos = Reward::get_mas_felicitados_subarea($subarea["subarea"]);?>
				<?php if($reconocidos): $contador++;?>
					<?php if($contador == 5): echo "</div><div class='row'>";  endif;?>

					<div class="col-xs-3" style="border: 2px solid white; min-height: 140px; padding-top: 20px; margin-top: 20px;">
						<p style="font-size: 16px; font-weight: bold"><?php echo $subarea["subarea"];?></p>
					<?php	foreach($reconocidos as $reconocido):?>
						<p><?php echo $reconocido["name"];?> : <?php echo $reconocido["cantidad"];?></p>
					<?php endforeach;?>						
					</div>	
				<?php endif;?>
			<?php endforeach;?>
			</div>	

		</div>
    </div>


      <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script language="JavaScript" src="<?php echo BOOTSTRAP_JS?>bootstrap.min.js"></script>

    <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/tables.js"></script>
    <script src="vendors/jquery.knob.js"></script>
    <script src="vendors/raphael-min.js"></script>
    <script src="vendors/morris/morris.min.js"></script>
  </body>
</html>

<script type="text/javascript">
  // Morris Donut Chart
Morris.Donut({
    element: 'hero-donut',
    data: [
	<?php $contador = 0;
	foreach ($conductas as $conducta):
		$contador++;
		$porcentaje = round( ($conducta["cuenta"] * 100) / $total_reconocimientos["cantidad"],2);
		$conducta_nombre = html_entity_decode($conducta['name']);
	?>	
        {label: "<?php echo $conducta_nombre;?>", value: <?php echo $porcentaje?> }
       	<?php if($conducta === end($conductas)):
        else:?>, 
        <?php endif;?>		        

	

	<?php endforeach;?>    
    ],
    colors: ["#30a1ec", "#76bdee", "#c4dafe"],
    formatter: function (y) { return y + "%" }
});

// Morris Donut Chart
Morris.Donut({
    element: 'hero-donut2',
    data: [
		<?php $contador = 0;
		foreach ($funciones as $funcion):
			$contador++;
			$porcentaje = round( ($funcion["cantidad"] * 100) / $total_reconocimientos["cantidad"],2);
			$funcion_nombre = html_entity_decode($funcion['function']);
		?>	
	        {label: "<?php echo $funcion_nombre;?>", value: <?php echo $porcentaje?> }
	       	<?php if($funcion === end($funciones)):
	        else:?>, 
	        <?php endif;?>		        
		

		<?php endforeach;?>    

    ],
    colors: ["#30a1ec", "#76bdee", "#c4dafe"],
    formatter: function (y) { return y + "%" }
});
// Morris Donut Chart
Morris.Donut({
    element: 'hero-donut3',
    data: [
		<?php $contador = 0;
		foreach ($publicaciones_funcion as $publicacion):
			$contador++;
			$porcentaje = round( ($publicacion["cantidad"] * 100) / $total_publications["cantidad"],2);
			$funcion_nombre = html_entity_decode($publicacion['function']);
		?>	
	        {label: "<?php echo $funcion_nombre;?>", value: <?php echo $porcentaje?> }
	       	<?php if($publicacion === end($publicaciones_funcion)):
	        else:?>, 
	        <?php endif;?>		        
		

		<?php endforeach;?>    

    ],
    colors: ["#30a1ec", "#76bdee", "#c4dafe"],
    formatter: function (y) { return y + "%" }
});
// Morris Donut Chart
Morris.Donut({
    element: 'hero-donut4',
    data: [
		<?php $contador = 0;
		foreach ($publicaciones_subarea as $publicacion):
			$contador++;
			$porcentaje = round( ($publicacion["cantidad"] * 100) / $total_publications["cantidad"],2);
			$funcion_nombre = html_entity_decode($publicacion['subarea']);
		?>	
	        {label: "<?php echo $funcion_nombre;?>", value: <?php echo $porcentaje?> }
	       	<?php if($publicacion === end($publicaciones_subarea)):
	        else:?>, 
	        <?php endif;?>	        

		<?php endforeach;?>    

    ],
    colors: ["#30a1ec", "#76bdee", "#c4dafe"],
    formatter: function (y) { return y + "%" }
});

Morris.Donut({
    element: 'hero-donut5',
    data: [
		<?php $contador = 0;
		foreach ($reconocimientos_subarea as $reconocimiento):
			$contador++;
			$porcentaje = round( ($reconocimiento["cantidad"] * 100) / $total_reconocimientos["cantidad"],2);
			$funcion_nombre = html_entity_decode($reconocimiento['subarea']);
		?>	
	        {label: "<?php echo $funcion_nombre;?>", value: <?php echo $porcentaje?> }
	       	<?php if($reconocimiento === end($reconocimientos_subarea)):
	        else:?>, 
	        <?php endif;?>

		

		<?php endforeach;?>    

    ],
    colors: ["#30a1ec", "#76bdee", "#c4dafe"],
    formatter: function (y) { return y + "%" }
});

// Morris Donut Chart
Morris.Donut({
    element: 'hero-donut6',
    data: [
		<?php $contador = 0;
		foreach ($aprendizaje as $funcion):
			$contador++;
			$porcentaje = round( ($funcion["cantidad"] * 100) / $aprendizaje_total["cantidad"],2);
			$funcion_nombre = html_entity_decode($funcion['function']);
		?>	
	        {label: "<?php echo $funcion_nombre;?>", value: <?php echo $porcentaje?> }
	       	<?php if($funcion === end($aprendizaje)):
	        else:?>, 
	        <?php endif;?>
		

		<?php endforeach;?>    

    ],
    colors: ["#30a1ec", "#76bdee", "#c4dafe"],
    formatter: function (y) { return y + "%" }
});

// Morris Donut Chart
// Morris Donut Chart
Morris.Donut({
    element: 'hero-donut7',
    data: [
		<?php $contador = 0;
		foreach ($colaboracion as $funcion):
			$contador++;
			$porcentaje = round( ($funcion["cantidad"] * 100) / $colaboracion_total["cantidad"],2);
			$funcion_nombre = html_entity_decode($funcion['function']);
		?>	
	        {label: "<?php echo $funcion_nombre;?>", value: <?php echo $porcentaje?> }
	       	<?php if($funcion === end($aprendizaje)):
	        else:?>, 
	        <?php endif;?>
		

		<?php endforeach;?>    

    ],
    colors: ["#30a1ec", "#76bdee", "#c4dafe"],
    formatter: function (y) { return y + "%" }
});
// Morris Donut Chart
Morris.Donut({
    element: 'hero-donut8',
    data: [
		<?php $contador = 0;
		foreach ($impacto as $funcion):
			$contador++;
			$porcentaje = round( ($funcion["cantidad"] * 100) / $impacto_total["cantidad"],2);
			$funcion_nombre = html_entity_decode($funcion['function']);
		?>	
	        {label: "<?php echo $funcion_nombre;?>", value: <?php echo $porcentaje?> }
	       	<?php if($funcion === end($impacto)):
	        else:?>, 
	        <?php endif;?>
		

		<?php endforeach;?>    

    ],
    colors: ["#30a1ec", "#76bdee", "#c4dafe"],
    formatter: function (y) { return y + "%" }
});
// Morris Donut Chart
Morris.Donut({
    element: 'hero-donut9',
    data: [
		<?php $contador = 0;
		foreach ($comunicacion as $funcion):
			$contador++;
			$porcentaje = round( ($funcion["cantidad"] * 100) / $comunicacion_total["cantidad"],2);
			$funcion_nombre = html_entity_decode($funcion['function']);
		?>	
	        {label: "<?php echo $funcion_nombre;?>", value: <?php echo $porcentaje?> }
	       	<?php if($funcion === end($comunicacion)):
	        else:?>, 
	        <?php endif;?>
		

		<?php endforeach;?>    

    ],
    colors: ["#30a1ec", "#76bdee", "#c4dafe"],
    formatter: function (y) { return y + "%" }
});

// Morris Donut Chart
Morris.Donut({
    element: 'hero-donut10',
    data: [
		<?php $contador = 0;
		foreach ($agilidad as $funcion):
			$contador++;
			$porcentaje = round( ($funcion["cantidad"] * 100) / $agilidad_total["cantidad"],2);
			$funcion_nombre = html_entity_decode($funcion['function']);
		?>	
	        {label: "<?php echo $funcion_nombre;?>", value: <?php echo $porcentaje?> }
	       	<?php if($funcion === end($agilidad)):
	        else:?>, 
	        <?php endif;?>
		

		<?php endforeach;?>    

    ],
    colors: ["#30a1ec", "#76bdee", "#c4dafe"],
    formatter: function (y) { return y + "%" }
});

// Morris Donut Chart
Morris.Donut({
    element: 'hero-donut11',
    data: [
		<?php $contador = 0;
		foreach ($liderazgo as $funcion):
			$contador++;
			$porcentaje = round( ($funcion["cantidad"] * 100) / $liderazgo_total["cantidad"],2);
			$funcion_nombre = html_entity_decode($funcion['function']);
		?>	
	        {label: "<?php echo $funcion_nombre;?>", value: <?php echo $porcentaje?> }
	       	<?php if($funcion === end($liderazgo)):
	        else:?>, 
	        <?php endif;?>
		

		<?php endforeach;?>    

    ],
    colors: ["#30a1ec", "#76bdee", "#c4dafe"],
    formatter: function (y) { return y + "%" }
});

// Morris Donut Chart
Morris.Donut({
    element: 'hero-donut12',
    data: [
		<?php $contador = 0;
		foreach ($emprendedor as $funcion):
			$contador++;
			$porcentaje = round( ($funcion["cantidad"] * 100) / $emprendedor_total["cantidad"],2);
			$funcion_nombre = html_entity_decode($funcion['function']);
		?>	
	        {label: "<?php echo $funcion_nombre;?>", value: <?php echo $porcentaje?> }
	       	<?php if($funcion === end($emprendedor)):
	        else:?>, 
	        <?php endif;?>
		

		<?php endforeach;?>    

    ],
    colors: ["#30a1ec", "#76bdee", "#c4dafe"],
    formatter: function (y) { return y + "%" }
});
</script>