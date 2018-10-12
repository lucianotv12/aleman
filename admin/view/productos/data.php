<?php

include_once("../../funciones.php");

$productos = Producto::get_productos();

$results = array(
"sEcho" => 1,
"iTotalRecords" => count($productos),
"iTotalDisplayRecords" => count($productos),
"aaData"=>$productos);
echo json_encode($results);


?>
