<?php
session_start();

include_once("../../../funciones.php");

//$_GET["code"];
$categoria = $_GET["code"];

if($_GET["code"] != "0"):
	echo "aca entrooo"; die;
	$subcategorias = Producto::get_subcategoria_byid($categoria);
	
?>     
<?php foreach($subcategorias as $subcategoria): ?>
		<option value="<?php echo $subcategoria["id"];?>"><?php echo $subcategoria["nombre"];?></option>	
<?php endforeach;

endif;
?>


