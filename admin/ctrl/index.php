<?php
//ECHO "ACA E";DIE;
$sess_name = session_name();
if (session_start()) setcookie($sess_name, session_id(), null, '/', null, true, true);

include_once("../../funciones.php");
validar_permanencia();	

if(!isset($_GET["accion"]))$accion= "home";
else $accion = $_GET["accion"];
$detalle = false;

$_usuario = unserialize(@$_SESSION["usuario"]);
//print_r($_usuario); die;
$site="";	
error_reporting(0);

switch($accion):
	case "home" :
		{			


//		ECHO "ENTROOO";

			//print_r($_POST["buscador"]);

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
				
				$productos = Producto::get_productos($start,$end,$_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"]);	

				$total_productos = Producto::total_productos($_GET["buscador"],$_GET["ordenar"],$_GET["tipo_orden"]);
				
			//	$_POST["buscador"] = ""; 
			//	$_GET["buscador"] = "";
			//	ECHO $total_productos;die;
				Template::draw_header(0, 'productos');
				
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
        $IIBB="";
		$categorias = $producto->get_categorias_combo();
		$monedas = $producto->get_monedas();
		// valor dolar
		$conn = new Conexion();
		$sql = $conn->prepare("SELECT cotizacion from monedas where id = 2");
		$sql->execute();
		$datos_carga = $sql->fetch(PDO::FETCH_ASSOC);  
		$dolar_actual = $datos_carga["cotizacion"];		
		Template::draw_header(2, 'productos');
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
			$subcategorias = $producto->get_subcategoria_byid();
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
			$IIBB = $producto->get_IIBB();
			$precio_final =  Producto::get_precio_lista($producto->id);
			$cambio="edit";
			// valor dolar
			$conn = new Conexion();
			$sql = $conn->prepare("SELECT cotizacion from monedas where id = 2");
			$sql->execute();
			$datos_carga = $sql->fetch(PDO::FETCH_ASSOC);  
			$dolar_actual = $datos_carga["cotizacion"];


		Template::draw_header(0, 'productos');

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
					$producto->set_IIBB(0);
                                        
					$producto->save();


     	echo '<script type="text/javascript">window.location.assign("'. HOME .'home.html");</script>'; 
		header('Location:' . HOME . 'home.html');

		include("../view/productos/producto_abm.php");
		}
		break;			

	case "producto_stock":
		{
			$producto = new Producto($_GET["id"]);
			$movimientos = Producto::producto_stock_movimientos($_GET["id"]);
			Template::draw_header(0, 'productos');

			include("../view/productos/producto_stock.php");

		}	
	break;	

	case "producto_stock_abm":
		{
			Producto::producto_stock_abm($_POST, $_usuario->idUsuario);

			header("Location:".HOME ."producto_stock/" . $_POST["idProducto"] . "/" );								

/*			$producto = new Producto($_GET["id"]);
			$movimientos = Producto::producto_stock_movimientos($_GET["id"]);
			Template::draw_header(0, 'productos');

			include("../view/productos/producto_stock.php");
*/
		}	
	break;	

	case "producto_delete" :
		{
//			echo "entrooo"; die;
		// ESPERA UN ID
		// No icluye Vista, Borra directo..
		$producto = new Producto($_GET["id"]);
		$producto->erase();
		//ingreso un registro en el log
     	echo '<script type="text/javascript">window.location.assign("'. HOME .'home.html");</script>'; 
		header('Location:' . HOME . 'home.html');
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
				
				Template::draw_header(0, 'categorias');
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

				Template::draw_header(0,'categorias');
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
                                        Template::draw_header(0,'categorias');
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
					header("Location:".HOME ."list_categorias.html");								


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
	case "categoria_delete" :
				{
				// ESPERA UN ID
				// No icluye Vista, Borra directo..
				Producto::delete_categoria($_GET["id"]);
				//ingreso un registro en el log

				header("Location:".HOME ."list_categorias.html");								
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
				
				Template::draw_header(0,'subcategorias');
				include("../view/productos/list_subcategorias.php");
				#				$template->draw_footer();	
				}
				break;
	case "delete_subcategoria" :
				{
				Producto::delete_subcategoria($_GET["id"]);

				header("Location:".HOME ."list_subcategorias.html");								

				}
				break;

	case "new_subcategoria" :
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
				$categorias = $producto->get_categorias_combo();

				Template::draw_header(0,'categorias');
				include("../view/productos/abm_subcategorias.php");

		//		include("../../view/productos/abm_subcategorias.php");

				}
				break;

	case "modify_subcategoria" :
				{
			
				$mensaje_cabezera = "MODIFICACION DE LA SUBCATEGORIA";
				$cambio = "modificar";
				$detalle = false;
				$boton=true;							
				$deshabilitado = "";
				$categorias = Producto::get_categorias();
				$subcategoria = Producto::get_subcategoria_byid($_GET["id"]);
				$id= $subcategoria["id"];
				$idCategoria = $subcategoria["idCategoria"];
				$nombre= $subcategoria["nombre"];
				$descripcion= $subcategoria["descripcion"];
				$dolar= $subcategoria["dolar"];                                
				$activo= $subcategoria["activo"];
                $idProveedor = $subcategoria["idProveedor"];
                $proveedores = Cliente::get_clientes(0,0,2);
                                
				Template::draw_header(0,'subcategorias');

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

	case "subcategoria_insert":
				{

					Producto::admin_subcategoria($_POST);
//						$producto = new Producto;
//						Producto::nueva_categoria($_POST);
					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Alta nueva categoria ";
	//				mysql_query("insert into log values(null,".$_producto->get_idproducto().",'".$texto."', '".$hoy."')");
					header("Location:".HOME ."list_subcategorias.html");								


				}
				break;

/*************SUBCATEGORIAS *******************************************************/

/*CLIENTESSSS*/

	case "clientes" :
				{	
				$tipo= "clientes";	

				if(!isset($_GET["start"])){		
				$start = 0;
				}else{
				$start = $_GET["start"];
				}
				$end = 10000 ; 

				if($_GET["buscador"]== "DEUDORES")
					{
					$clientes = Cliente::get_clientes_deudores();				
					}
				else
					{
					if($_GET["buscador"]== "TODOS") 
					{
					$_POST["buscador"] = ""; 
					$_GET["buscador"] = "";
					}
					if($_POST["buscador"] != "")$_GET["buscador"] = $_POST["buscador"]; 
					$clientes = Cliente::get_clientes($start,$end,1,$_GET["buscador"]);	
					}	
			
#				$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);				
#				$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);
				$total_clientes = Cliente::total_clientes();
				Template::draw_header(0,'clientes');
//				include("../../view/clientes/list.php");
				include("../view/clientes/clientes.php");

				#				$template->draw_footer();	
				}
				break;
	case "cliente_new" :
				{
				// Muestra el formulario de NUEVO
				$cliente = new Cliente;
				$tipo= "clientes";	

#				$template->draw_header();
#				include($template->get_vista_url ("cliente/navegador.php"));
#				include($template->get_vista_url ("CLIENTE/panel/navegador.php"));
				$mensaje_cabezera = "ALTA DEL CLIENTE";
				$boton=true;
				$cambio = "new";
				$provincias = Cliente::get_provincias();
				$vendedores = Cliente::get_vendedores();
				$deshabilitado = "";
				$idTipo = "";
				$nombre="";
				$domicilio="";
				$idLocalidad = "";
				$idProvincia=1;
				$pais="";
				$cp="";
				$telefono="";
				$telefono2="";
				$contacto="";
				$mail = "";
				$web="";
				$activo="";
				$observaciones="";
				$idVendedor="";
				$descuento="";
				$nro_cuit="";
				$condicion_iva="";

			//	$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);
				Template::draw_header(2,'clientes');
					include("../view/clientes/cliente_abm.php");
#				$template->draw_footer();
				}
				break;


	case "cliente_modify" :
				{
				// ESPERA UN ID
					$tipo= "clientes";	

					$cliente = new Cliente($_GET["id"]);
				
					$mensaje_cabezera = "MODIFICACION DEL CLIENTE";
					$cambio = "modificar";
					$detalle = false;
					$boton=true;							
					$deshabilitado = "";
	
					$provincias = Cliente::get_provincias();
					$vendedores = Cliente::get_vendedores();				
					$idTipo = $cliente->get_idTipo();
					$nombre= $cliente->get_nombre();
					$domicilio= $cliente->get_domicilio();
					$idLocalidad = $cliente->get_idLocalidad();
					$idProvincia= $cliente->get_idProvincia();
					$pais= $cliente->get_pais();
					$cp= $cliente->get_cp();
					$telefono= $cliente->get_telefono();
					$telefono2= $cliente->get_telefono2();
					$contacto= $cliente->get_contacto();
					$mail = $cliente->get_mail();
					$web= $cliente->get_web();
					$activo= $cliente->get_activo();
					$observaciones=$cliente->get_observaciones();
					$idVendedor=$cliente->get_idVendedor();
					$descuento=$cliente->get_descuento();
					$nro_cuit=$cliente->get_nro_cuit();
					$condicion_iva=$cliente->get_condicion_iva();

					Template::draw_header(2, 'clientes');

					include("../view/clientes/cliente_abm.php");

				}
				break;

	case "cliente_delete" :
				{
				// ESPERA UN ID
				// No icluye Vista, Borra directo..
				$Cliente = new Cliente($_GET["id"]);
				$Cliente->erase();
				//ingreso un registro en el log

		     	echo '<script type="text/javascript">window.location.assign("'. HOME .'clientes.html");</script>'; 
				header('Location:' . HOME . 'clientes.html');
				}
				break;
				
	case "cliente_insert":
				{
				//	ECHO "MMMMMM";DIE;
						$Cliente = new Cliente;
						$Cliente->nuevo_cliente($_POST,1);
					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Alta nuevo Cliente ";
			     	echo '<script type="text/javascript">window.location.assign("clientes.html");</script>'; 
					header('Location:' . HOME . 'clientes.html');

				}
				break;
				
				
	case "cliente_update":
				{
					$cliente = new Cliente($_GET["id"]);

					$cliente->set_nombre($_POST['nombre']);
					$cliente->set_domicilio($_POST['domicilio']);
					$cliente->set_idLocalidad($_POST['cmbLocalidad']);
					$cliente->set_idProvincia($_POST['cmbProvincia']);
					$cliente->set_cp($_POST['cp']);
					$cliente->set_telefono($_POST['telefono']);
					$cliente->set_telefono2($_POST['telefono2']);
					$cliente->set_contacto($_POST['contacto']);
					$cliente->set_mail($_POST['email']);
					$cliente->set_web($_POST['web']);
					$cliente->set_observaciones($_POST['observaciones']);
					$cliente->set_idVendedor($_POST['idVendedor']);
					$cliente->set_descuento($_POST['descuento']);
					$cliente->set_nro_cuit($_POST['nro_cuit']);
					$cliente->set_condicion_iva($_POST['condicion_iva']);

					$cliente->save();

					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Modificacion Cliente ".$_GET["id"];
			     	echo '<script type="text/javascript">window.location.assign("clientes.html");</script>'; 
					header('Location:' . HOME . 'clientes.html');                                    
				}
				break;

/*PROVEEDORES*/				

	case "proveedores" :
				{			

				$tipo= "proveedores";	

				if(!isset($_GET["start"])){		
				$start = 0;
				}else{
				$start = $_GET["start"];
				}
				$end = 10000 ; 

				if($_GET["buscador"]== "DEUDORES")
					{
					$clientes = Cliente::get_clientes_deudores();				
					}
				else
					{
					if($_GET["buscador"]== "TODOS") 
					{
					$_POST["buscador"] = ""; 
					$_GET["buscador"] = "";
					}
					if($_POST["buscador"] != "")$_GET["buscador"] = $_POST["buscador"]; 
					$clientes = Cliente::get_clientes($start,$end,2,$_GET["buscador"]);	
					}	
			
#				$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);				
#				$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);
				$total_clientes = Cliente::total_clientes();
				Template::draw_header(0, 'proveedores');
//				include("../../view/clientes/list.php");
				include("../view/clientes/clientes.php");

				#				$template->draw_footer();	
				}
				break;

	case "proveedor_new" :
				{
				$tipo= "proveedores";	

				// Muestra el formulario de NUEVO
				$cliente = new Cliente;
#				$template->draw_header();
#				include($template->get_vista_url ("cliente/navegador.php"));
#				include($template->get_vista_url ("CLIENTE/panel/navegador.php"));
				$mensaje_cabezera = "ALTA DEL PROVEEDOR";
				$boton=true;
				$cambio = "new";
				$provincias = Cliente::get_provincias();
				$vendedores = Cliente::get_vendedores();
				$deshabilitado = "";
				$idTipo = "";
				$nombre="";
				$domicilio="";
				$idLocalidad = "";
				$idProvincia=1;
				$pais="";
				$cp="";
				$telefono="";
				$telefono2="";
				$contacto="";
				$mail = "";
				$web="";
				$activo="";
				$observaciones="";
				$idVendedor="";
				$descuento="";
				$nro_cuit="";
				$condicion_iva="";

			//	$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);
				Template::draw_header(2,'proveedores');
					include("../view/clientes/cliente_abm.php");
#				$template->draw_footer();
				}
				break;


	case "proveedor_modify" :
				{
				// ESPERA UN ID
					$tipo= "proveedores";	

					$cliente = new Cliente($_GET["id"]);
				
					$mensaje_cabezera = "MODIFICACION DEL PROVEEDOR";
					$cambio = "modificar";
					$detalle = false;
					$boton=true;							
					$deshabilitado = "";
	
					$provincias = Cliente::get_provincias();
					$vendedores = Cliente::get_vendedores();				
					$idTipo = $cliente->get_idTipo();
					$nombre= $cliente->get_nombre();
					$domicilio= $cliente->get_domicilio();
					$idLocalidad = $cliente->get_idLocalidad();
					$idProvincia= $cliente->get_idProvincia();
					$pais= $cliente->get_pais();
					$cp= $cliente->get_cp();
					$telefono= $cliente->get_telefono();
					$telefono2= $cliente->get_telefono2();
					$contacto= $cliente->get_contacto();
					$mail = $cliente->get_mail();
					$web= $cliente->get_web();
					$activo= $cliente->get_activo();
					$observaciones=$cliente->get_observaciones();
					$idVendedor=$cliente->get_idVendedor();
					$descuento=$cliente->get_descuento();
					$nro_cuit=$cliente->get_nro_cuit();
					$condicion_iva=$cliente->get_condicion_iva();

					Template::draw_header(2, 'clientes');

					include("../view/clientes/cliente_abm.php");

				}
				break;

	case "proveedor_delete" :
				{
				// ESPERA UN ID
				// No icluye Vista, Borra directo..
				$proveedor = new Cliente($_GET["id"]);
				$proveedor->erase();
				//ingreso un registro en el log
		     	echo '<script type="text/javascript">window.location.assign("'. HOME .'proveedores.html");</script>'; 
				header('Location:' . HOME . 'proveedores.html');				}
				break;
				
	case "proveedor_insert":
				{
				//	ECHO "MMMMMM";DIE;
						$proveedor = new Cliente;
						$proveedor->nuevo_cliente($_POST,2);
					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Alta nuevo Proveedor ";
			     	echo '<script type="text/javascript">window.location.assign("proveedores.html");</script>'; 
					header('Location:' . HOME . 'proveedores.html');

				}
				break;
				
				
	case "proveedor_update":
				{
					$cliente = new Cliente($_GET["id"]);

					$cliente->set_nombre($_POST['nombre']);
					$cliente->set_domicilio($_POST['domicilio']);
					$cliente->set_idLocalidad($_POST['cmbLocalidad']);
					$cliente->set_idProvincia($_POST['cmbProvincia']);
					$cliente->set_cp($_POST['cp']);
					$cliente->set_telefono($_POST['telefono']);
					$cliente->set_telefono2($_POST['telefono2']);
					$cliente->set_contacto($_POST['contacto']);
					$cliente->set_mail($_POST['email']);
					$cliente->set_web($_POST['web']);
					$cliente->set_observaciones($_POST['observaciones']);
					$cliente->set_idVendedor($_POST['idVendedor']);
					$cliente->set_descuento($_POST['descuento']);
					$cliente->set_nro_cuit($_POST['nro_cuit']);
					$cliente->set_condicion_iva($_POST['condicion_iva']);

					$cliente->save();

					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Modificacion Proveedor ".$_GET["id"];
			     	echo '<script type="text/javascript">window.location.assign("proveedores.html");</script>'; 
					header('Location:' . HOME . 'proveedores.html');                                    
				}
				break;





	case "facturas":
		{
			if(!isset($_GET["start"])){		
			$start = 0;
			}else{
			$start = $_GET["start"];
			}
			$end = 1000 ; 

			if($_GET["buscador"]== "DEUDORES")
				{
				$facturas = Factura::get_facturas_deudores();				
				}
			else
				{
				if($_GET["buscador"]== "TODOS") 
				{
				$_POST["buscador"] = ""; 
				$_GET["buscador"] = "";
				}
				if($_POST["buscador"] != "")$_GET["buscador"] = $_POST["buscador"]; 
				
				if($_GET["tipo_factura"]):
				 $tipo_factura =	$_GET["tipo_factura"];
				$titulo = "LISTADO GENERAL DE FACTURAS";	
				$variable = "FACTURA";
				 else :
				 $tipo_factura = 1;
					 $variable = "PRESUPUESTO";
				 $titulo = "LISTADO GENERAL DE PRESUPUESTOS";	
				endif;				

				$facturas = Factura::get_facturas($_GET["buscador"],$tipo_factura,0,0,0, @$_GET["id"]);	
				}	
		
		//	$total_facturas = Factura::total_facturas();
			Template::draw_header();

			include("../view/facturacion/facturas.php");			
		}				
		break;

	case "detalle_factura":
		{
			$factura = Factura::get_factura_by_id($_GET["id"]);	
			$productos = Factura::get_productos_x_factura($_GET["id"]);	
			$_cliente =  New Cliente($factura["idCliente"]);
			if($factura["idCliente"] == 1):
				$consumidor_final = Factura::get_consumidor_final($_GET["id"]);
			endif;
		
			Template::draw_header();
			include("../view/facturacion/detalle_factura.php");

		}	
		break;

	case "modelo_factura":
		{
			if($_GET["id"]):
				$_cliente =  New Cliente($_GET["id"]);
			else:
				$clientes = Cliente::get_clientes(0,0,1);				
			
			endif;	


			Template::draw_header();
			include("../view/facturacion/modelo_factura.php");

		}			
		break;

	case "proveedor_factura":
		{
			$proveedores = Cliente::get_clientes(0,0,2);				

			Template::draw_header(0,'proveedores');
			include("../view/facturacion/proveedor_factura.php");

		}			
		break;


	case "generar_factura":
			{
			// ESPERA UN ID
			//	$_usuario = unserialize(@$_SESSION["usuario"]);
	//			print_r($_usuario->idUsuario);die;
				//$factura = new Factura($_GET["id"]);
			//	print_r($_GET["id"]);die;
				$_id_factura =Factura::generar_factura2($_POST, $_usuario->idUsuario, 0,$_GET["id"]);
				echo "aca estpy";
				$mensaje_cabezera = "FACTURA GENERADA";
				$boton=true;
				$cambio = "nuevo";
				$deshabilitado = "";
//					$productos_virtuales =	Factura::get_productos_virtuales();
	//			jsCommand(javascript:popUp('../../pdf/presupuesto.php?idFactura=<?= $factura["id"] ? >'));
				$_id=$_GET["id"];

		//		jsCommand("alert('holaaaaaa');");					
				$_variable = true;
				
			// ESPERA UN ID
		     	echo '<script type="text/javascript">window.location.assign("detalle_factura/$_id_factura/");</script>'; 
				header('Location:' . HOME . 'detalle_factura/'.$_id_factura .'/');				
//					header("Location: index.php");				
			}
			break;

	case "pasar_a_factura":
		{
		// ESPERA UN ID
			Factura::pasar_a_factura($_GET["id"]);

	     	echo '<script type="text/javascript">window.location.assign("facturas/factura/");</script>'; 
			header('Location:' . HOME . 'facturas/factura/');				
		}	
	break;				

	case "generar_factura_proveedor":
		{
		// ESPERA UN ID
		//	$_usuario = unserialize(@$_SESSION["usuario"]);
//			print_r($_usuario->idUsuario);die;
			$factura = new Factura($_GET["id"]);
			$_id_factura =Factura::generar_factura2($_POST, $_usuario->idUsuario,2,"factura");
			$mensaje_cabezera = "FACTURA GENERADA";
			$boton=true;
			$cambio = "nuevo";
			$deshabilitado = "";
//					$productos_virtuales =	Factura::get_productos_virtuales();
//			jsCommand(javascript:popUp('../../pdf/presupuesto.php?idFactura=<?= $factura["id"] ? >'));
			$_id=$_GET["id"];

	//		jsCommand("alert('holaaaaaa');");					
			$_variable = true;
			
		// ESPERA UN ID
	     	echo '<script type="text/javascript">window.location.assign("detalle_factura/$_id_factura/");</script>'; 
			header('Location:' . HOME . 'detalle_factura/'.$_id_factura .'/');				
//					header("Location: index.php");				
		}
		break;


/*PROVEEDORES*/

	case "nueva_factura":
				{

				// ESPERA UN ID
				$cliente = new Cliente($_GET["id"]);
			
					$mensaje_cabezera = "NUEVA FACTURA";  		
					$boton=true;
					$cambio = "nuevo";
					$deshabilitado = "";
					$nombre= $cliente->get_nombre();

					$productos_virtuales =	Factura::get_productos_virtuales();
					Template::draw_header();

					include("../../view/clientes/nueva_factura.php");
				
				}
				break;

	case "insert_factura_producto":
				{
					$cliente = new Cliente($_GET["id"]);
					$factura = new Factura;
					$mensaje_producto =$factura->nuevo_producto_factura($_POST);
	
					$productos_virtuales =	Factura::get_productos_virtuales();
					$mensaje_cabezera = "NUEVA FACTURA";  		
					$boton=true;
					$cambio = "nuevo";
					$deshabilitado = "";

					Template::draw_header();

					include("../../view/clientes/nueva_factura.php");

				}
				break;

	case "delete_factura_producto" :
				{
				// ESPERA UN ID
				// No icluye Vista, Borra directo..
				$factura = new Factura();
				$factura->erase($_GET["idfactura_producto"]);

				$cliente = new Cliente($_GET["id"]);
				$productos_virtuales =	Factura::get_productos_virtuales();
				$mensaje_cabezera = "NUEVA FACTURA";  		
				$boton=true;
				$cambio = "nuevo";
				$deshabilitado = "";

				Template::draw_header();

				include("../../view/clientes/nueva_factura.php");

				}
				break;
	

	case "insert_pago":
				{

				// ESPERA UN ID
					$cliente = new Cliente($_GET["id"]);
					Factura::generar_factura_pago($_GET["id"],$_POST);
					$mensaje_cabezera = "PAGO FACTURA GENERADO";
					$boton=true;
					$cambio = "nuevo";
					$deshabilitado = "";
//					$productos_virtuales =	Factura::get_productos_virtuales();

								
					$_id = $_GET["id"];
					header("Location: index.php?accion=facturas&id=$_id");

				
				}
				break;

/*	case "facturas" :
		{
					$cliente = new Cliente($_GET["id"]);
					$nombre= $cliente->get_nombre();

				$facturas = Factura::facturas_x_cliente($_GET["id"]);	

				Template::draw_header();
				include("../../view/clientes/facturas.php");
	
		}
		break;*/

	case "factura_detalle" :
		{
				$cliente = new Cliente($_GET["id"]);
				$factura = new Factura($_GET["idfactura"]);
				$productos_factura = Factura::get_productos_x_factura($_GET["idfactura"]);

				Template::draw_header();

				include("../../view/clientes/factura_detalle.php");
	
		}
		break;

	case "listado_deuda_facturas" :
		{
//					$cliente = new Cliente($_GET["id"]);

				$facturas = Factura::facturas_adeudadas();

//				include("../principal.php");
				include("../../view/clientes/facturas_adeudadas.php");
	
		}
		break;

	case "imprimir_factura" :
		{
				$cliente = new Cliente($_GET["id"]);
				$factura = new Factura($_GET["idfactura"]);
				$productos = Factura::get_productos_x_factura($_GET["idfactura"]);

				include("../../view/clientes/planilla.php");
	
		}

		break;

	case "imprimir_remito" :
		{
				$cliente = new Cliente($_GET["id"]);
				$factura = new Factura($_GET["idfactura"]);
				$productos = Factura::get_productos_x_factura($_GET["idfactura"]);

				include("../../view/clientes/remito.php");
	
		}

		break;

	case "listado_clientes" :
				{				
				if(!isset($_GET["start"])){		
				$start = 0;
				}else{
				$start = $_GET["start"];
				}
				$end = 1000 ; 

				if($_GET["buscador"]== "DEUDORES")
					{
					$clientes = Cliente::get_clientes_deudores();				
					}
				else
					{
					if($_GET["buscador"]== "TODOS") 
					{
					$_POST["buscador"] = ""; 
					$_GET["buscador"] = "";
					}
					if($_POST["buscador"] != "")$_GET["buscador"] = $_POST["buscador"]; 
					$clientes = Cliente::get_clientes($start,$end,1,$_GET["buscador"]);	
					}	
			
#				$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);				
#				$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);
				$total_clientes = Cliente::total_clientes();
				include("../../view/clientes/listado_clientes.php");
				#				$template->draw_footer();	
				}
				break;

	case "listado_proveedores" :
				{				
				if(!isset($_GET["start"])){		
				$start = 0;
				}else{
				$start = $_GET["start"];
				}
				$end = 1000 ; 

				if($_GET["buscador"]== "DEUDORES")
					{
					$clientes = Cliente::get_clientes_deudores();				
					}
				else
					{
					if($_GET["buscador"]== "TODOS") 
					{
					$_POST["buscador"] = ""; 
					$_GET["buscador"] = "";
					}
					if($_POST["buscador"] != "")$_GET["buscador"] = $_POST["buscador"]; 
					$clientes = Cliente::get_clientes($start,$end,2,$_GET["buscador"]);	
					}	
			
#				$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);				
#				$gerarquia = Cliente::gerarquia_Cliente($_Cliente->id);
				$total_clientes = Cliente::total_clientes();
				include("../../view/clientes/listado_clientes.php");
				#				$template->draw_footer();	
				}
				break;		

	case "facturas_proveedor" :
		{
				$cliente = new Cliente($_GET["id"]);
				$nombre= $cliente->get_nombre();

				$facturas = Factura::facturas_x_proveedor($cliente->id);	
				$bancos = Pago::get_bancos();

				Template::draw_header();
//				include("../../view/clientes/facturas.php");
	//		include("../view/facturacion/facturas.php");
			include("../view/facturacion/facturas.php");			

		}
		break;				

	case "registrar_pago":
	{
		Pago::nuevo_pago($_POST);

//     	echo '<script type="text/javascript">window.location.assign("home.html");</script>'; 
		header('Location:' . HOME . 'facturas_proveedor/'. $_GET["id"].'/');

		
	}
	break;

/* CLIENTESSSSSS*/
	case "gestion_precios":
	{

		Template::draw_header();

		include("../view/productos/gestion_precios.php");		

	}	
	break;
	case "modificar_precios":
	{
		Producto::modificacion_precios($_POST);

//		Template::draw_header();

//		include("../view/productos/gestion_precios.php");		

		Template::draw_header();

		include("../view/productos/gestion_precios.php");		

	}	
	break;

	case "usuarios" :
				{				
				if(!isset($_GET["start"])){		
				$start = 0;
				}else{
				$start = $_GET["start"];
				}
				$end = 5 ; 
				$usuarios = Usuario::get_usuarios($start,$end);	
				$total_usuarios = Usuario::total_usuarios();
				Template::draw_header();
				include("../view/usuarios/usuarios.php");
				}
				break;
	case "usuario_new" :
				{
				// Muestra el formulario de NUEVO
				$usuario = new Usuario;
				$mensaje_cabezera = "ALTA DEL USUARIO";
				$boton=true;		
				$cambio = "nuevo";
				$deshabilitado = "";
				$nombre = "";
				$apellido="";
				$telefono="";
				$email="";
				$user="";
				$pass="";
				$gerarquia="";
					
					Template::draw_header();
					include("../view/usuarios/usuario_abm.php");

				}
				break;

	case "usuario_modify" :
				{
				// ESPERA UN ID
					$usuario = new Usuario($_GET["id"]);
				
					$mensaje_cabezera = "MODIFICACION DEL USUARIO";
					$cambio = "modificar";
					$detalle = false;
					$boton=true;							
					$deshabilitado = "";
					$nombre = $usuario->get_nombre();
					$apellido=$usuario->get_apellido();
					$telefono = $usuario->get_telefono();
					$email=$usuario->get_email();
					$user=$usuario->get_user();
					$pass=$usuario->get_password();	
					$gerarquia=$usuario->get_gerarquia();

					Template::draw_header();
					include("../view/usuarios/usuario_abm.php");

				}
				break;

	case "usuario_delete" :
				{
				// ESPERA UN ID
				// No icluye Vista, Borra directo..
				$usuario = new Usuario($_GET["id"]);
				$usuario->erase();
				//ingreso un registro en el log
				$hoy = date("Y-m-d G:i:s"); 
				$texto = "Baja usuario".$_GET["id"];

				header("Location: " .HOME. "usuarios.html");
				}
				break;
				
	case "usuario_insert":
				{
				if($_POST['pass'] == $_POST['pass1'])
					{	
						$usuario = new Usuario;
						$usuario->nuevo_usuario($_POST);
					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Alta nuevo usuario ";
	//				mysql_query("insert into log values(null,".$_usuario->get_idUsuario().",'".$texto."', '".$hoy."')");
					header("Location: " .HOME. "usuarios.html");
					}
				else	
					{
					$usuario = new Usuario;
					$mensaje_cabezera = "ALTA DEL USUARIO";
					$boton=true;		
					$cambio = "nuevo";
					$deshabilitado = "";
					$nombre = $_POST["nombre"];
					$apellido=$_POST["apellido"];
					$telefono=$_POST["telefono"];
					$user = $_POST["usuario"];	
					$email=$_POST["email"];
		//			$gerarquia = Usuario::gerarquia_usuario($_usuario->id);
					Template::draw_header();

						$mensaje_error = "Las contraseñas ingresadas no coinciden";					
					include("../view/usuarios/usuario_abm.php");
					}	
#					$_SESSION["usuario"] = serialize($usuario);

				}
				break;
				
				
	case "usuario_update":
				{
				if($_POST['pass'] == $_POST['pass1'])
					{					
					$usuario = new Usuario($_GET["id"]);
					$usuario->set_nombre($_POST['nombre']);
					$usuario->set_apellido($_POST['apellido']);
					$usuario->set_telefono($_POST['telefono']);
					$usuario->set_email($_POST['email']);
					$usuario->set_user($_POST['usuario']);
					$usuario->set_password($_POST['pass']);
					$usuario->set_gerarquia($_POST['gerarquia']);
#				$usuario->set_user($_POST['user']);
#				$usuario->set_pass($_POST['pass']);
					$usuario->save();

					//ingreso un registro en el log
					$hoy = date("Y-m-d G:i:s"); 
					$texto = "Modificacion usuario ".$_GET["id"];
//					mysql_query("insert into log values(null,".$_usuario->get_id().",'".$texto."', '".$hoy."')");

					//	if($usuario->get_id_tipo() != 1 ){
					header("Location: " .HOME. "usuarios.html");

					//	}else{
					//	header("Location: index.php?accion=detail&id=".$_usuario->idUsuario);
					//	}
					}
				else
					{
					$mensaje_cabezera = "MODIFICACION DEL USUARIO";
					$cambio = "modificar";
					$detalle = false;
					$boton=true;							
					$deshabilitado = "";
					$usuario = new Usuario($_GET["id"]);
					$nombre = $usuario->get_nombre();
					$apellido=$usuario->get_apellido();
					$telefono = $usuario->get_telefono();
					$email=$usuario->get_email();
					$user=$usuario->get_user();
					$pass=$usuario->get_password();					
					$gerarquia=$usuario->get_gerarquia();					

		//			$gerarquia = Usuario::gerarquia_usuario($_usuario->id);
	//				include("../../../../view/usuario/usuarios/menu.php");
					Template::draw_header();

						$mensaje_error = "Las contraseñas ingresadas no coinciden";					
					include("../view/usuarios/usuario_abm.php");
					}
	
				}
		break;				
endswitch;
?>
