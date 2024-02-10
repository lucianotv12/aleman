<?php
//$URL = "http://localhost/comprasgo/admin";

if("localhost" == $_SERVER['SERVER_NAME'] ):
	$URL = "http://192.168.1.236/aleman/admin";
//	$URL = "http://localhost/aleman/admin";

	define('ROOT','localhost');
	define('DATABASE','aleman');
	define('USER','aleman');
	define('PASS','1610Lucho');	

else:
/*$URL = '/admin';

define('ROOT','directgroup.c3aiub4xgnfs.us-west-2.rds.amazonaws.com');
define('DATABASE','aleman');
define('USER','ibris');
define('PASS','Ibris1193');*/
	$URL = "http://192.168.1.236/aleman/admin";
	define('ROOT','localhost');
	define('DATABASE','aleman');
	define('USER','aleman');
	define('PASS','1610Lucho');	

endif;


define('HOME',$URL.'/');
define('ADMIN',$URL.'/');
define('IMGS',$URL.'/images/');
define('JS',$URL.'/js/');
define('CSS',$URL.'/css/');
define('VIEW',$URL.'/view/');
define('CTRL',$URL.'/ctrl/');
define('CLASES',$URL.'/models/');
define('BOOTSTRAP_CSS',$URL.'/template/css/bootstrap/');
define('BOOTSTRAP_JS',$URL.'/template/js/bootstrap/');



/*----------------------------------------------------------------------------*/
/* funcion que hace una inclusion automatica de las clases
/*----------------------------------------------------------------------------*/
function __autoload($class_name)
	{
	$bajadas = "";
	while (!is_dir($bajadas."models"))
		{
		$bajadas .= "../";
		}

		require_once($bajadas."models/".strtolower($class_name).".class.php");
	}


function validar_permanencia ($_redireccion_estricta = true)
	{
	if (!isset($_SESSION["usuario"]))
		{
		# Verifico si me pasa una URL para mostrar un mensaje de error
		if($_redireccion_estricta)
			{# sino muestro el mensaje por defecto y redirecciono al Index
			redireccionar("Su sessi&oacute;n ha caducado, aguarde, ser&aacute; redireccionado...",3);
			}
		return false;
		}
	else
		{
		return true;
		}
	}
function redireccionar (  $message="", $seconds=0)
	{
	$url= HOME ;
//	header("Refresh: ".$seconds."; url=".$url); // waits 3 seconds & sends to homepage
    echo '<script type="text/javascript">window.location.assign("'. HOME .'");</script>';

	echo "<h4>".$message."</h4>";
	die();
	}
	
function redondear_dos_decimal($valor) { 
   $float_redondeado=round($valor * 100) / 100; 
   return $float_redondeado; 
} 
function convertir_fecha($fecha){
    $fecha = explode("/", $fecha);
    $fecha_retorno = $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];	
    return $fecha_retorno;
} 
?>
