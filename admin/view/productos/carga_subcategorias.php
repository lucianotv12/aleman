<?php
session_start();

include_once("../../funciones.php");

//$_GET["code"];
$categoria = $_GET["code"];

if($_GET["code"] != "0"):
	$subcategorias = Producto::get_subcategoria_byid($categoria);
	
?>     
<?php foreach($subcategorias as $subcategoria): ?>
<?php endforeach;

endif;
?>


