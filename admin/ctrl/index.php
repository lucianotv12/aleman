<?php
//ECHO "ACA E";DIE;
$sess_name = session_name();
if (session_start()) setcookie($sess_name, session_id(), null, '/', null, true, true);

include_once("../../funciones.php");
//validar_permanencia();	

if(!isset($_GET["accion"]))$accion= "home";
else $accion = $_GET["accion"];
$detalle = false;

$_usuario = unserialize($_SESSION["usuario"]);
$site="";	
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

	case "producto_insert_img":
		{

			$name_img = $insertId  . date('YmdHi') .$_archivo["imagen"]["name"];


			Producto::insert_img($_GET["id"],$_FILES);
	    
	     	echo '<script type="text/javascript">window.location.assign("producto_edit/'.$_GET["id"].'/");</script>'; 
			header('Location:' . HOME . 'producto_edit/'.$_GET["id"].'/');

		}	
	break;

	case "borrar_img" :
		{			

		Producto::borrar_img($_GET["id"]);	

/*		$cambio="edit";

		Template::draw_header(0, 'home');
		$producto = New Producto($_GET["id"]);
		$categorias = Producto::get_categorias();
		$pesos = Producto::get_pesos();
		$imagenes = Producto::get_productos_imagenes($_GET["id"]);*/

		echo '<script type="text/javascript">window.location.assign("producto_edit/'.$_GET["id"].'/");</script>'; 
		header('Location:' . HOME . 'producto_edit/'.$_GET["id"].'/');
		}
		break;			
//CATEGORIAS
	case "categorias" :
		{			

		Template::draw_header(0, 'home');
		$categorias = Producto::get_categorias();
		include("../view/categorias.php");
		}
		break;	

	case "categoria_edit" :
		{			
			//EDITAR
		$cambio="edit";	
		Template::draw_header(0, 'home');
		$categoria = Producto::get_categorias($_GET["id"]);

		include("../view/categoria_abm.php");
		}
		break;	

	case "categoria_update" :
		{			
			//EDITAR
		Producto::edit_categoria($_GET["id"],$_POST);

     	echo '<script type="text/javascript">window.location.assign("categorias.html");</script>'; 
		header('Location:' . HOME . 'categorias.html');
		}
		break;
	case "categoria_new":
		{
		$cambio="new";	
		Template::draw_header(0, 'home');



		include("../view/categoria_abm.php");

		}	
		break;
	case "categoria_insert" :
		{			
			//EDITAR
		Producto::new_categoria($_POST);

     	echo '<script type="text/javascript">window.location.assign("categorias.html");</script>'; 
		header('Location:' . HOME . 'categorias.html');
		}
		break;

//PESOS
	case "pesos" :
		{			

		Template::draw_header(0, 'home');
		$pesos = Producto::get_pesos();
		include("../view/pesos.php");
		}
		break;	

	case "peso_edit" :
		{			
			//EDITAR
		$cambio="edit";	
		Template::draw_header(0, 'home');
		$peso = Producto::get_pesos($_GET["id"]);

		include("../view/peso_abm.php");
		}
		break;	

	case "peso_update" :
		{			
			//EDITAR
		Producto::edit_peso($_GET["id"],$_POST);

     	echo '<script type="text/javascript">window.location.assign("pesos.html");</script>'; 
		header('Location:' . HOME . 'pesos.html');
		}
		break;
	case "peso_new":
		{
		$cambio="new";	
		Template::draw_header(0, 'home');
		include("../view/peso_abm.php");

		}	
		break;
	case "peso_insert" :
		{			
			//EDITAR
		Producto::new_peso($_POST);

     	echo '<script type="text/javascript">window.location.assign("pesos.html");</script>'; 
		header('Location:' . HOME . 'pesos.html');
		}
		break;		

//CODIGOS POSTALES
	case "codigos_postales" :
		{			

		Template::draw_header(0, 'home');
		$codigos_postales = Producto::get_codigos_postales();
		include("../view/codigos_postales.php");
		}
		break;	

	case "codigo_postal_edit" :
		{			
			//EDITAR
		$cambio="edit";	
		Template::draw_header(0, 'home');
		$codigo_postal = Producto::get_codigos_postales($_GET["id"]);

		include("../view/codigo_postal_abm.php");
		}
		break;	

	case "codigo_postal_update" :
		{			
			//EDITAR
		Producto::edit_codigo_postal($_GET["id"],$_POST);

     	echo '<script type="text/javascript">window.location.assign("codigos_postales.html");</script>'; 
		header('Location:' . HOME . 'codigos_postales.html');
		}
		break;
	case "codigo_postal_new":
		{
		$cambio="new";	
		Template::draw_header(0, 'home');
		include("../view/codigo_postal_abm.php");

		}	
		break;
	case "codigo_postal_insert" :
		{			
			//EDITAR
		Producto::new_codigo_postal($_POST);

     	echo '<script type="text/javascript">window.location.assign("codigos_postales.html");</script>'; 
		header('Location:' . HOME . 'codigos_postales.html');
		}
		break;		

//CAMPAÑAS
	case "nueva_campania":
		{
		$productos= Producto::get_productos(1);

		$bancos=Producto::get_bancos(1);
		$tarjetas=Producto::get_tarjetas(1);

		Template::draw_header(0, 'home');

		include("../view/campania_new.php");

		}		
	break;	

	case "campania_insert":
		{
			Campania::campania_insert($_POST);	

		$productos= Producto::get_productos(1);
		$bancos=Producto::get_bancos(1);
		$tarjetas=Producto::get_tarjetas(1);


		Template::draw_header(0, 'home');

		include("../view/campania_new.php");

		}		
	break;		
	case "productos_campania" :
		{			
	   $_usuario = unserialize($_SESSION["usuario"]);

		$titulo = $_GET["id"];	
		$total_productos = Producto::cantidad_productos($_GET["id"]);

		Template::draw_header(0, 'home');
		$productos = Producto::get_productos(0,$_GET["id"], "orden");
		include("../view/productos.php");
		}
		break;		

	case "producto_campania_edit" :
		{			
		$cambio="edit";

		Template::draw_header(0, 'home');
		$producto = New Producto($_GET["id"], $_GET["tipo"]);

		$nombre = $producto->nombre;
		$codigo = $producto->codigo;
		$marca = $producto->marca;
		$modelo = $producto->modelo;
		$color = $producto->color;
		$garantia = $producto->garantia;
		$origen = $producto->origen;
		$descripcion = $producto->descripcion;
		$stock = $producto->stock;
		$precio = $producto->precio;
		$iva = $producto->iva;
		$active = $producto->active;
		$descuento = $producto->descuento;
		$categoriaId = $producto->categoriaId;
		$pesoId = $producto->pesoId;

		$categorias = Producto::get_categorias();
		$pesos = Producto::get_pesos();
		$imagenes = Producto::get_productos_imagenes($_GET["id"]);
		$infotecnicas = Producto::get_infotecnicas($_GET["id"],$_GET["tipo"]);

		include("../view/producto_abm.php");
		}
		break;

	case "producto_campania_update" :
		{			
		$cambio="edit";

		$producto = new Producto($_GET["id"], $_GET["tipo"]);
		$producto->set_nombre($_POST["nombre"]);
		$producto->set_categoriaId($_POST["categoriaId"]);
		$producto->set_codigo($_POST["codigo"]);
		$producto->set_marca($_POST["marca"]);
		$producto->set_modelo($_POST["modelo"]);	
		$producto->set_color($_POST["color"]);
		$producto->set_garantia($_POST["garantia"]);
		$producto->set_origen($_POST["origen"]);
		$producto->set_descripcion($_POST["descripcion"]);
		$producto->set_pesoId($_POST["pesoId"]);
		$producto->set_stock($_POST["stock"]);
		$producto->set_precio($_POST["precio"]);
		$producto->set_iva($_POST["iva"]);
		$producto->set_active($_POST["active"]);
		$producto->set_descuento($_POST["descuento"]);

 		$insertId = $producto->save($_GET["tipo"]);

		for($i=1;$i<30;$i++): //verifico las fechas que cargo

			$titulo_nombre = "titulo_" . $i;
			$descripcion_nombre = "descripcion_" . $i;

			$titulo_select =  @$_POST[$titulo_nombre];
			$descripcion_select =  @$_POST[$descripcion_nombre];

			if($titulo_select):
				$campania = $_GET["tipo"];
				$conn = new Conexion;
				$sql = $conn->prepare("INSERT INTO $campania.productos_infotecnica values (NULL, :PRODUCTO, :TITULO, :DESCRIPCION) ");
	 			$sql->execute(array('PRODUCTO' => $_GET["id"], 'TITULO' => $titulo_select, 'DESCRIPCION' => $descripcion_select));			

	 			$sql=null;
	 			$conn=null;

			endif;

		endfor;	


/*		Template::draw_header(0, 'home');
		$producto = New Producto($_GET["id"],$_GET["tipo"]);
		$categorias = Producto::get_categorias();
		$pesos = Producto::get_pesos();
		$imagenes = Producto::get_productos_imagenes($_GET["id"]);

		include("../view/producto_abm.php");*/
		echo '<script type="text/javascript">window.location.assign("productos_campania/'.$_GET["tipo"].'/");</script>'; 
		header('Location:' . HOME . 'productos_campania/'.$_GET["tipo"].'/');		
		}
		break;			

	case "compras_campania" :
		{			

		$campania = Campania::get_campania($_GET["id"]);
		$titulo = $_GET["id"] . " - COMPRAS APROBADAS";	
		Template::draw_header(0, 'home');
		$compras = Compra::get_compras(1,$_GET["id"]);
		$proceso = true;

		include("../view/compras.php");
		}
		break;	

	case "procesar_compras":
		{	//echo "aca entraste";die;


		include("../view/procesar_compras.php");

		echo '<script type="text/javascript">window.location.assign("compras_campania_procesadas/'.$_GET["id"].'/");</script>'; 
		header('Location:' . HOME . 'compras_campania_procesadas/'.$_GET["id"].'/');


		}
		break;	
	case "compras_campania_procesadas" :
		{			
		$titulo = $_GET["id"] . " - COMPRAS PROCESADAS";
		$proceso = false;
		$campania = Campania::get_campania($_GET["id"]);

		Template::draw_header(0, 'home');
		$compras = Compra::get_compras(3,$_GET["id"]);
		include("../view/compras.php");
		}
		break;			

	case "compras_campania_rechazadas" :
		{	
		$proceso = false;
		$campania = Campania::get_campania($_GET["id"]);

		$titulo = $_GET["id"]. " - COMPRAS RECHAZADAS";	
		Template::draw_header(0, 'home');
		$compras = Compra::get_compras(2,$_GET["id"]);
		include("../view/compras.php");
		}
		break;	

	case "envios_campania" :
		{	

		$titulo = $_GET["id"]. " - ENVIOS URBANO";	
		Template::draw_header(0, 'home');
		$envios = Compra::envios_urbano($_GET["id"]);
		include("../view/envios_urbano.php");
		}
		break;	


	case "compra_campania_detail" :
		{			
		$cambio="edit";

		Template::draw_header(0, 'home');
//		$producto = New Producto($_GET["id"], $_GET["tipo"]);
//		$categorias = Producto::get_categorias();
//		$pesos = Producto::get_pesos();
//		$imagenes = Producto::get_productos_imagenes($_GET["id"]);
		$productos = Compra::get_compra_productos($_GET["id"], $_GET["tipo"]);
		$user = Compra::get_compra_user($_GET["id"], $_GET["tipo"]);
		$tarjeta = Compra::get_compra_tarjeta($_GET["id"], $_GET["tipo"]);

		include("../view/compra_detail.php");
		}
		break;

	case "tickets_campania" :
		{			
		$cambio="edit";	
		if(@$_POST["busqueda"]):	
			$busqueda = $_POST["busqueda"];
		else:
			$busqueda="";	

		endif;	

		Template::draw_header(0, 'home');
		if(!@$_GET["tipo"]):
			$_GET["tipo"] = "WEB";
		endif;	
//		$producto = New Producto($_GET["id"], $_GET["tipo"]);
//		$categorias = Producto::get_categorias();
//		$pesos = Producto::get_pesos();
//		$imagenes = Producto::get_productos_imagenes($_GET["id"]);
		$tickets = ticket::get_tickets($_GET["id"], $_GET["tipo"], $_POST);
		//print_r($tickets);die;
//		$user = Compra::get_compra_user($_GET["id"], $_GET["tipo"]);
//		$tarjeta = Compra::get_compra_tarjeta($_GET["id"], $_GET["tipo"]);
		include("../view/tickets.php");
		}
		break;
	case "ticket_detalle" :
		{			
		$cambio="edit";

		Template::draw_header(0, 'home');
		$ticket = Ticket::get_ticket_by_id($_GET["id"]);
		$messages = Ticket::get_messages_by_ticket($_GET["id"]);

		include("../view/ticket.php");
		}
		break;

	case "nuevo_ticket" :
		{			
		$cambio="edit";

		Template::draw_header(0, 'home');
	//	$ticket = Ticket::get_ticket_by_id($_GET["id"]);
	//	$messages = Ticket::get_messages_by_ticket($_GET["id"]);
		$campanias = Campania::get_campanias();
		include("../view/nuevo_ticket.php");
		}
		break;
	case "carga_ticket":
		{

		$conn = new Conexion();

		$nombre = htmlspecialchars($_POST["template-contactform-name"]);
		$apellido = htmlspecialchars($_POST["template-contactform-lastname"]);
		$email = htmlspecialchars($_POST["template-contactform-email"]);
		$asunto = htmlspecialchars($_POST["template-contactform-subject"]);
		$mensaje = htmlspecialchars($_POST["template-contactform-message"]);
		$telefono = htmlspecialchars($_POST["template-contactform-phone"]);
		$campania_nombre = htmlspecialchars($_POST["campania_nombre"]);


		$sql = $conn->prepare("INSERT INTO directgroup.tickets values (null, :NOMBRE, :APELLIDO, :EMAIL, :TELEFONO, :ASUNTO, 1, now(), :CAMPANIA, 'CC')");
		$sql->execute(array('NOMBRE' => $nombre, "APELLIDO" => $apellido, "TELEFONO"=> $telefono, "EMAIL" => $email, "ASUNTO" => $asunto,  "CAMPANIA" => $campania_nombre));

	//	print_r($sql); "MSJ" => $_POST["template-contactform-message"],

		$ticket = $conn->lastInsertId();

		$sql = $conn->prepare("INSERT INTO directgroup.tickets_mensajes values (null, $ticket, :MSJ, 1, now(), 1)");
		$sql->execute(array("MSJ" => $mensaje));

//		print_r($_POST);die();		

		echo '<script type="text/javascript">window.location.assign("tickets_campania-'. $campania_nombre .'-CC");</script>'; 
		header('Location:' . HOME . 'tickets_campania-' . $campania_nombre . '-CC');	
		}
	break;	
	case "legales" :
		{			
		$cambio="edit";
		$campania = Campania::get_campania($_GET["id"]);
	//	print_r($campania);
		Template::draw_header(0, 'home');
	//	$ticket = Ticket::get_ticket_by_id($_GET["id"]);
	//	$messages = Ticket::get_messages_by_ticket($_GET["id"]);

		include("../view/legales.php");
		}
		break;

	case "legales_update" :
		{			


		$campania = Campania::legales_update($_POST);

     	echo '<script type="text/javascript">window.location.assign("home.html");</script>'; 
		header('Location:' . HOME . 'home.html');
		}
		break;

	case "cambio_orden" :
		{			

		$integrante = $_POST["integrante"];
		$orden = $_POST["orden_" . $integrante];


		$productos = Producto::get_productos(0, $_GET["id"]);
		$cantidad_productos = Producto::cantidad_productos($_GET["id"]);
		$orden_actual = Producto::orden_productos($integrante, $_GET["id"]);
		$tipo_redirect = "productos_campania/" . $_GET["id"] . "/";
		$from = $_GET["id"] . ".productos";

			$conn = new Conexion;

			$sql = $conn->prepare("UPDATE $from set  orden = :ORDEN_ACTUAL where orden = :ORDEN $tipo_clause");

 			$sql->execute(array("ORDEN" => $orden, "ORDEN_ACTUAL" => $orden_actual));



			$sql = $conn->prepare("UPDATE $from set  orden = :ORDEN where id= :INTEGRANTE $tipo_clause");

 			$sql->execute(array("INTEGRANTE" => $integrante, "ORDEN" => $orden));

     	echo '<script type="text/javascript">window.location.assign("'.$tipo_redirect.'");</script>'; 
		header('Location:' . HOME . $tipo_redirect);




		}

		break;
	case "configuracion" :
		{			
		$cambio="edit";
		$campania = Campania::get_campania($_GET["id"]);
	//	print_r($campania);
		Template::draw_header(0, 'home');
	//	$ticket = Ticket::get_ticket_by_id($_GET["id"]);
	//	$messages = Ticket::get_messages_by_ticket($_GET["id"]);

		include("../view/configuracion.php");
		}
		break;

	case "config_update" :
		{			
		$campania = Campania::fechas_update($_POST);
     	echo '<script type="text/javascript">window.location.assign("home.html");</script>'; 
		header('Location:' . HOME . 'home.html');
		}
		break;		

endswitch;
?>
