<?php
session_start();
session_destroy();
session_start();

include_once("../funciones.php");


//conectar_bd();

if (isset($_POST["email"]) && isset($_POST["clave"]))
	{
	$id = Usuario::login_admin($_POST["email"],$_POST["clave"]);	
	if ($id)
		{
	 	$_usuario = new Usuario($id);
	 	
	  	$_SESSION["usuario"] = serialize($_usuario);
	 // 	ECHO "ENTRO JOYA";DIE;

		header('Location:' . ADMIN . 'home.html');	
		echo '<script type="text/javascript">window.location.assign("home.html");</script>';
		}
	else
		{
		header('Location:' . ADMIN );	
		echo '<script type="text/javascript">window.location.assign("index.php");</script>';
		}
	}

if(!@$_SESSION["usuario"]):

	include("login.php");
	//Template::draw_footer();

endif;

?>