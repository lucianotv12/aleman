<?php

//$producto_datos = New Producto($producto["idProducto"]);
$asunto ="SHOPPER : confirmacion de compra";
			$html="";

			$html .= "<body><center>";

			$html .= "<table border='0' cellpadding=0 cellspacing=0 >";
			$html .= "<tr>";
				$html .= "<td>Confirmación de compra</td>";
			$html .= "</tr>";

			$html .= "</table>";
			$html .= "</center></body>";

			require_once  'mandrill/Mandrill.php'; 
			$mandrill = new Mandrill('1Tg-biFyBAAq8yh7GYaYWg');
			try{ 
				$message = array(
					'subject' => $asunto,
					'html' => $html ,
					'from_email' => 'admin@shopper.com.ar',
					'to' => array(
						array(
							'email' => "lucianotv12@gmail.com",
							'name' => "Maria Cristina Sanchez"
						)                       
					)
				);
				$result = $mandrill->messages->send($message);   
				if($result){ $envio_email	= true; echo "se mando joya"; }
			} catch(Mandrill_Error $e) { 
				$envio_email	= false; echo "nada de nada";
			}	

?>
