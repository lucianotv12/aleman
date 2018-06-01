<?php

include_once("../../funciones.php");
session_start();

//print_r($_GET);die;
//$_GET["base"] = "campania_preproductiva";
Producto::borrar_infotecnica($_GET["code"], $_GET["base"]);


?>