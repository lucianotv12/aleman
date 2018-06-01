
<?php

header("Content-Type: application/vnd.ms-excel");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header("content-disposition: attachment;filename=compras.xls");

?>

<html>

<head>

<meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />

<title>CANJES REALIZADOS PROCESADOS</title>

</head>
<body>


	<table >


        <tr style="background: #B0B0B0">
		<th>Fecha</th>
		<th>Nro Pedido</th>
		<th>Operación</th>
		<th>Nro de Op</th>
		<th>CUIT</th>
		<th>Tipo</th>
		<th>Fecha Autorización</th>
		<th>Dni</th>
		<th>Cp</th>
		<th>Localidad</th>
		<th>CodigoProvincia</th>
		<th>Total Precio</th>
		<th>Código Producto</th>
		<th>Telefonos</th>
		<th>Telefonos</th>
		<th>Dirección</th>
		<th>Titular</th>
		<th>Autorizado1</th>
		<th>Autorizado2</th>
		<th>Observaciones</th>
		

		</tr>

		<?php 
		foreach($compras as $compra):
		//if($compra["provinciaId"] > 1): $compra["provinciaId"] = $compra["provinciaId"] -1; 
		$precio_total = $compra["precio_producto"] + $compra["envio_localidad"] + $compra["envio_peso"];
		$precio_total = str_replace(".", ",", $precio_total);

		?>
			<tr style="color:gray;font-size: 11px">
				<td><?php echo $compra["date"];?></td>
				<td><?php echo $compra["id"];?></td>
				<td>FRANCES VTA</td>
				<td><?php echo $compra["id"];?></td>	
				<td><?php echo $compra["dni"];?></td>
				<td>AUTORIZADOS</td>
				<td><?php echo $compra["date"];?></td>
				<td><?php echo $compra["dni"];?></td>
				<td><?php echo $compra["cp"];?></td>
				<td><?php echo $compra["localidad"];?></td>
				<td>
				<?php if($compra["provinciaId"] > 1):
					echo $compra["provinciaId"] - 1;	
				else:
					echo $compra["provinciaId"];	
				 endif;?>						
				</td>
												
				<td><?php echo $precio_total;?></td>
				<td><?php echo $compra["codigoProducto"];?></td>
				<td><?php echo $compra["telefono"];?></td>
				<td></td>
				<td><?php echo $compra["direccion"];?></td>
				<td><?php echo $compra["nombre"];?></td>
				<td>0</td>
				<td>0</td>
				<td><?php echo $compra["observaciones"];?></td>

			</tr>
		<?php endforeach;

		?>

	</table>

</body>
</html>
