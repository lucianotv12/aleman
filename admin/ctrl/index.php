<?php
//ECHO "ACA E";DIE;
$sess_name = session_name();
if (session_start()) setcookie($sess_name, session_id(), null, '/', null, true, true);

include_once("../../funciones.php");
//validar_permanencia();	

if(!isset($_GET["accion"]))$accion= "home";
else $accion = $_GET["accion"];
$detalle = false;

$_usuario = unserialize(@$_SESSION["usuario"]);
$site="";	
error_reporting(0);

switch($accion):
	case "home" :
		{			


//		ECHO "ENTROOO";


				if(!isset($_GET["start"])){
				$start = 0;
				}else{
				$start = $_GET["start"];
				}
				$end = 500 ; 

				if($_GET["buscador"]== "TODOS") 
				{
				$_POST["buscador"] = ""; 
				$_GET["buscador"] = "";
				}
				if($_POST["buscador"] != "")$_GET["buscador"] = $_POST["buscador"]; 
				
				$productos = Producto::get_productos($start,$end,$_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"]);	

				$total_productos = Producto::total_productos($_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"]);
				
				$_POST["buscador"] = ""; 
			//	$_GET["buscador"] = "";
				
				Template::draw_header(0, 'home');
				
				include("../view/productos/productos.php");



		}
		break;	

	case "producto_new" :
		{			
		$cambio="new";
		// Muestra el formulario de NUEVO
		$producto = new Producto;
		$mensaje_cabezera = "ALTA DEL PRODUCTO";
		$boton=true;
	//	$cambio = "nuevo";
		$deshabilitado = "";
		$idCategoria = "";
		$descripcion="";
		$fechaCarga="";
		$idUsuario="";
		$activo="";
		$aviso_stock="";
		$precio="";
		$desc1="";
		$desc2="";
		$desc3="";
		$utilidad="";
		$iva="";
		$idMoneda="";
        $referencia="";
        $bulto="";
        $iva_10="";
		$categorias = $producto->get_categorias_combo();
		$monedas = $producto->get_monedas();
		Template::draw_header(2);
		include("../view/productos/producto_abm.php");
		}
		break;	

	case "producto_insert" :
		{			
			$producto = new Producto;
			$producto->nuevo_producto($_POST);

     	echo '<script type="text/javascript">window.location.assign("home.html");</script>'; 
		header('Location:' . HOME . 'home.html');
		}
		break;

	case "producto_edit" :
		{			

			$producto = new Producto($_GET["id"]);
	//		print_r($producto);
			$mensaje_cabezera = "MODIFICACION DEL PRODUCTO";
			$cambio = "modificar";
			$detalle = false;
			$boton=true;							
			$deshabilitado = "";

			$categorias = $producto->get_categorias_combo();
			$monedas = $producto->get_monedas();

			$idCategoria = $producto->get_idCategoria();
			$idSubCategoria = $producto->get_idSubCategoria();
			$descripcion= $producto->get_descripcion();
			$activo= $producto->get_activo();
			$aviso_stock= $producto->get_aviso_stock();
			$precio= $producto->get_precio();
			$desc1=$producto->get_desc1();
			$desc2=$producto->get_desc2();
			$desc3=$producto->get_desc3();
			$utilidad=$producto->get_utilidad();
			$iva=$producto->get_iva();
			$idMoneda=$producto->get_idMoneda();
			$referencia = $producto->get_referencia();
			$bulto = $producto->get_bulto();
			$iva_10 = $producto->get_iva_10();
		$cambio="edit";


		Template::draw_header(0, 'home');

		include("../view/productos/producto_abm.php");

		}
		break;

	case "producto_update" :
		{			
		$cambio="edit";

					$producto = new Producto($_GET["id"]);

					$producto->set_idCategoria($_POST['idCategoria']);
					$producto->set_idSubCategoria($_POST['idSubCategoria']);
					$producto->set_descripcion($_POST['descripcion']);
					$producto->set_aviso_stock($_POST['aviso_stock']);
					$producto->set_precio($_POST['precio']);
					$producto->set_desc1($_POST['desc1']);
					$producto->set_desc2($_POST['desc2']);
					$producto->set_desc3($_POST['desc3']);
					$producto->set_utilidad($_POST['utilidad']);
					$producto->set_iva($_POST['iva']);
					$producto->set_idMoneda($_POST['idMoneda']);
					$producto->set_activo($_POST['activo']);
					$producto->set_referencia($_POST['referencia']);
					$producto->set_bulto($_POST['bulto']);
					$producto->set_iva_10($_POST['iva_10']);
                                        
					$producto->save();


     	echo '<script type="text/javascript">window.location.assign("'. HOME .'home.html");</script>'; 
		header('Location:' . HOME . 'home.html');

		include("../view/producto_abm.php");
		}
		break;			


/*************CATEGORIAS *******************************************************/
	case "list_categorias" :
				{
				if(!isset($_GET["start"])){
				$start = 0;
				}else{
				$start = $_GET["start"];
				}
				$end = 100 ; 

				if($_GET["buscador"]== "TODOS") 
				{
				$_POST["buscador"] = ""; 
				$_GET["buscador"] = "";
				}
				if($_POST["buscador"] != "")$_GET["buscador"] = $_POST["buscador"]; 
				
				$productos = Producto::get_categorias($start,$end,$_GET["buscador"]);	

				$total_productos = Producto::total_productos();
				
				Template::draw_header();
				include("../view/productos/list_categorias.php");
				#				$template->draw_footer();	
				}
				break;

	case "new_categoria" :
				{
				// Muestra el formulario de NUEVO
				$producto = new Producto;
				$subcategorias = Producto::get_subcategorias();
				$mensaje_cabezera = "ALTA DE LA CATEGORIA";
				$boton=true;
				$cambio = "nuevo";
				$deshabilitado = "";
				$id="";
				$nombre="";
                                $dolar="";
				$descripcion="";
				$activo="";
                                $proveedores = Cliente::get_clientes(0,0,2);                                

				Template::draw_header();
				include("../view/productos/abm_categorias.php");

				}
				break;

        case "modify_categoria" :
                                {
                                // ESPERA UN ID
                                        $mensaje_cabezera = "MODIFICACION DE LA CATEGORIA";
                                        $cambio = "modificar";
                                        $detalle = false;
                                        $boton=true;							
                                        $deshabilitado = "";

                                        $categorias = Producto::get_categorias(0,0,0,$_GET["id"]);
                                        foreach($categorias as $categoria):
                                        $id= $categoria["id"];
                                        $nombre= $categoria["nombre"];
                                        $descripcion= $categoria["descripcion"];
                                        $dolar= $categoria["dolar"];
                                        $activo= $categoria["activo"];
                                   //     $idProveedor = $categoria["idProveedor"];
                                        $idProveedor = $categoria["id_proveedor"] ;
                                        
                                        $proveedores = Cliente::get_clientes(0,0,2);

                                        endforeach;
                                        $subcategorias = Producto::get_subcategorias($categoria["id"]);															
                                        Template::draw_header();
                                        include("../view/productos/abm_categorias.php");

                                }
                                break;


	case "insert_categorias":
				{
//						$producto = new Producto;
						Producto::nueva_categoria($_POST);
					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Alta nueva categoria ";
	//				mysql_query("insert into log values(null,".$_producto->get_idproducto().",'".$texto."', '".$hoy."')");
					header("Location: index.php?accion=list_categorias");								

				}
				break;

	case "categoria_update":
				{
					$producto = new Producto($_GET["id"]);

					Producto::update_categoria($_GET["id"], $_POST);
					
					
					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Modificacion producto ".$_GET["id"];

					header("Location:".HOME ."list_categorias.html");								
				}
				break;
	case "delete_categoria" :
				{
				// ESPERA UN ID
				// No icluye Vista, Borra directo..
				Producto::delete_categoria($_GET["id"]);
				//ingreso un registro en el log

				header("Location: index.php?accion=list_categorias");
				}
				break;
/*************CATEGORIAS *******************************************************/

/*************SUBCATEGORIAS *******************************************************/
	case "list_subcategorias" :
				{
				if(!isset($_GET["start"])){
				$start = 0;
				}else{
				$start = $_GET["start"];
				}
				$end = 100 ; 

				if($_GET["buscador"]== "TODOS") 
				{
				$_POST["buscador"] = ""; 
				$_GET["buscador"] = "";
				}
				if($_POST["buscador"] != "")$_GET["buscador"] = $_POST["buscador"]; 
				
				$productos = Producto::get_subcategorias($start,$end,$_GET["buscador"]);	

			//	$total_productos = Producto::total_productos();
				
				Template::draw_header();
				include("../view/productos/list_subcategorias.php");
				#				$template->draw_footer();	
				}
				break;
	case "delete_subcategoria" :
				{
				Producto::delete_subcategoria($_GET["id"]);

				$mensaje_cabezera = "MODIFICACION DE LA CATEGORIA";
				$cambio = "modificar";
				$detalle = false;
				$boton=true;							
				$deshabilitado = "";

				$categorias = Producto::get_categorias(0,0,0,$_GET["id_categoria"]);
				foreach($categorias as $categoria):
				$id= $categoria["id"];
				$nombre= $categoria["nombre"];
				$descripcion= $categoria["descripcion"];
				$activo= $categoria["activo"];

				endforeach;
				$subcategorias = Producto::get_subcategorias($categoria["id"]);															
				Template::draw_header();

				include("../../view/productos/abm_categorias.php");
				}
				break;

	case "new_subcategoria" :
				{
				// Muestra el formulario de NUEVO
			//	$producto = new Producto;
				$mensaje_cabezera = "ALTA DE LA SUBCATEGORIA";
				$boton=true;
				$cambio = "nuevo";
				$deshabilitado = "";
				$id="";
				$nombre="";
                                $dolar="";
				$descripcion="";
				$activo="";
				$idCategoria = $_GET["id"];


				include("../../view/productos/abm_subcategorias.php");

				}
				break;

	case "modify_subcategoria" :
				{
			
				$mensaje_cabezera = "MODIFICACION DE LA SUBCATEGORIA";
				$cambio = "modificar";
				$detalle = false;
				$boton=true;							
				$deshabilitado = "";

				$categorias = Producto::get_subcategoria_byid($_GET["id"]);
				foreach($categorias as $categoria):
				$id= $categoria["id"];
				$idCategoria = $categoria["idCategoria"];
				$nombre= $categoria["nombre"];
				$descripcion= $categoria["descripcion"];
				$dolar= $categoria["dolar"];                                
				$activo= $categoria["activo"];
                                $idProveedor = $categoria["idProveedor"];
                                $proveedores = Cliente::get_clientes(0,0,2);
                                
				endforeach;
				Template::draw_header();

				include("../view/productos/abm_subcategorias.php");

				}
				break;
	case "subcategoria_update":
				{
					$producto = new Producto($_GET["id"]);

					Producto::admin_subcategoria($_POST);
					
					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Modificacion producto ".$_GET["id"];

					header("Location:".HOME ."list_subcategorias.html");								
				}
				break;

/*************SUBCATEGORIAS *******************************************************/

endswitch;
?>
