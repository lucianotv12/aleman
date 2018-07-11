<?php
//$URL = "http://localhost/comprasgo/admin";

if("localhost" == $_SERVER['SERVER_NAME'] ):
	$URL = "http://localhost/aleman/admin";
	define('ROOT','localhost');
	define('DATABASE','aleman');
	define('USER','root');
	define('PASS','');	

else:
$URL = 'http://www.ibris.com.ar/aleman/admin';
define('ROOT','localhost');
define('DATABASE','c0010037_aleman');
define('USER','c0010037_columbi');
define('PASS','BOtase47pe');
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



/*function conectar_bd()
	{
		try{
			$conn = new PDO("mysql:host=".ROOT.";dbname=".DATABASE, USER, PASS);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		
		}catch(PDOException $e){
			echo "ERROR: " . $e->getMessage();
		}
	}*/


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
?>
