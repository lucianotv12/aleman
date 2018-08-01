<?php
session_start();

include_once("../../funciones.php");

//$_GET["code"];
$categoria = $_GET["code"];
	$subcategorias = Producto::get_subcategoria_byid($categoria);



