<?php
session_start();
include_once("../../funciones.php");

validar_permanencia();


if($_POST["submit"]):
	$valor_actual = $_POST["dolar"];
	$conn = new Conexion();

	$sql = $conn->prepare("update monedas set cotizacion = $valor_actual where id = 2");
	$sql->execute();
	$conn=null;
	$sql=null;
			
endif;
if($_POST["submit_euro"]):
	$valor_actual = $_POST["euro"];
	$conn = new Conexion();

	$sql = $conn->prepare("update monedas set cotizacion = $valor_actual where id = 5");
	$sql->execute();

	$conn=null;
	$sql=null;			
endif;


Template::draw_header();

	$conn = new Conexion();

	$sql = $conn->prepare("select cotizacion from monedas where id = 2");
	$sql->execute();
	$datos_carga = $sql->fetch(PDO::FETCH_ASSOC);

	$query = $datos_carga["cotizacion"]; 

	$sql = $conn->prepare("select cotizacion from monedas where id = 5");
	$sql->execute();
	$datos_carga = $sql->fetch(PDO::FETCH_ASSOC);
	$query_euro= $datos_carga["cotizacion"];



?>
<script language="JavaScript" src="<?=JS?>funciones.js"></script>



<div class="contentArea"> 


<form method="post" name="datos">
<div class="pageTitle">
PRECIO DEL DOLAR</div>
<br>
<table cellpadding=0 cellspacing=0 border=0 width="30%" align="left" >
	<tr>
		<td colspan=3 align="center">
<!-- ContizacionDolar.com.ar Promedios Ancho Adaptable x 150px -->
<iframe style="width: 98%; height: 150px; min-width: 150px; max-width: 728px; margin: 1%;" frameborder="0" scrolling="no" src="https://www.cotizacion-dolar.com.ar/recursos-webmaster/promedios/cotizacion-argentina-adaptable.php">
</iframe>
<!-- fin código Promedios Ancho Adaptable x 150px -->

		<br>
		</td>
	<tr>
	
	<tr>
		<td>
		<FONT SIZE="" COLOR="white">Precio del Dolar en el sistema:</FONT>	
		</td>
		<td align="left">
		<input type="text" name="dolar" value="<?= $query;?>">	
		</td>
		<td align="left">
		<input type="submit" name="submit" value="actualizar Dolar">	
		</td>
	</tr>
	<tr>
		<td>
		<FONT SIZE="" COLOR="white">Precio del Euro en el sistema:</FONT>	
		</td>
		<td align="left">
		<input type="text" name="euro" value="<?= $query_euro;?>">	
		</td>
		<td align="left">
		<input type="submit" name="submit_euro" value="actualizar Euro">	
		</td>
	</tr>


</table>
</form>
</div>
</div>
