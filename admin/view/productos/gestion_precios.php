
<script type="text/javascript">
$(document).ready(function() {

	$("#idCategoria").change(function(){dependencia_estado();});
//	$("#idCategoria").change(function(){alert("hola");});
//	$("#estado").change(function(){dependencia_ciudad();});
//	$("#subCategoria").attr("disabled",true);
//	$("#ciudad").attr("disabled",true);
});

function dependencia_estado()
{
	var code = $("#idCategoria").val();
	$.get("<?php echo VIEW?>productos/carga_subcategorias.php", { code: code },
		function(resultado)
		{
	/*		if(resultado == false)
			{
				alert(" Esta Categoria no posee subcategorias, por favor ingreselas");
			}
			else
			{
	*/			$("#idSubCategoria").attr("disabled",false);
				document.getElementById("idSubCategoria").options.length=1;
				$('#idSubCategoria').append(resultado);			
	/*		}*/
		}

	);
}

</script>
<script type="text/javascript">
function mostrar_descuentos() {
  divs = 'descuentos';
//  enla = 'enla'	+ variable ;
  obj = document.getElementById(divs);
  obj.style.display = (obj.style.display=='none') ? 'block' : 'none';
  obj2 = document.getElementById('utilidad');
  obj2.style.display = 'none';
  obj3 = document.getElementById('precio');
  obj3.style.display = 'none';
  obj4 = document.getElementById('iva');
  obj4.style.display = 'none';    

}
function mostrar_utilidad() {
  divs = 'utilidad';
  obj = document.getElementById(divs);
  obj.style.display = (obj.style.display=='none') ? 'block' : 'none';
  obj2 = document.getElementById('descuentos');
  obj2.style.display = 'none';
  obj3 = document.getElementById('precio');
  obj3.style.display = 'none';
  obj4 = document.getElementById('iva');
  obj4.style.display = 'none';    
}

function mostrar_precio() {
  divs = 'precio';
  obj = document.getElementById(divs);
  obj.style.display = (obj.style.display=='none') ? 'block' : 'none';
  obj2 = document.getElementById('descuentos');
  obj2.style.display = 'none';
  obj3 = document.getElementById('utilidad');
  obj3.style.display = 'none';
  obj4 = document.getElementById('iva');
  obj4.style.display = 'none';  
}

function mostrar_iva() {
  divs = 'iva';
  obj = document.getElementById(divs);
  obj.style.display = (obj.style.display=='none') ? 'block' : 'none';
  obj2 = document.getElementById('descuentos');
  obj2.style.display = 'none';
  obj3 = document.getElementById('utilidad');
  obj3.style.display = 'none';
  obj4 = document.getElementById('precio');
  obj4.style.display = 'none';  
}



var nav4 = window.Event ? true : false;
function acceptNum(evt){
// NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57, '.' = 46
var key = nav4 ? evt.which : evt.keyCode;
return (key <= 13 || (key >= 48 && key <= 57) || key == 46);
}

</script>


<?php
if($_GET["accion"] == "cambiar"):
    print_r($_POST); DIE();
		Producto::modificacion_precios($_POST);

endif;
?>

<?php
$categorias= Producto::get_categorias_combo();

?>
<div class="row">
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">MODIFICACION MASIVA DE PRECIOS</h4>
            </div>
            <div class="panel-body" style="background: #5DBD90; color: white;">

				<form name="datos" method="post" action="<?php echo HOME?>modificar_precios.html" >
				<input type="hidden" name="idUsuario" value="<?php echo $_usuario->idUsuario?>">
			    <div class="col-xs-12">    
					<div class="row">
						<FONT SIZE="" COLOR="white">Seleccione sobre que productos se aplicara el cambio</FONT>
					</div>	
					<div class="col-xs-12">
						<select name="idCategoria" id="idCategoria"  size="10" style="background: #5DBD90; color: white;">
							<option value="-1" >Seleccione una Categoria... </option>
							<option value="-2" >Todos los Productos </option>
							<?php  foreach($categorias as $categoria):?>
							<option value="<?php echo $categoria["id"];?>" <?php if($idCategoria == $categoria["id"]) echo"selected";?>><?php echo $categoria["nombre"];?></option>
							<?php endforeach;?>
						</select>		
					
					   <select multiple id="idSubCategoria" name="idSubCategoria[]" size="10" style="background: #5DBD90; color: white;">
							<option value="-1">Selecciona Uno...</option>

						</select>
					</div>
				</div>				
				<div class="col-xs-6">
					<div class="row">
						<FONT SIZE="" COLOR="white">Selecciones Opcion a modificar</FONT></td>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<input type="radio" name="radio" value="1" onclick="javaScript:mostrar_utilidad();"><FONT SIZE="" COLOR="white">Modificar utilidad</FONT>
						</div>	
						<div class="col-xs-12">
							<input type="radio" name="radio" value="2" onclick="javaScript:mostrar_descuentos();"><FONT SIZE="" COLOR="white">Modificar "Descuento 1"</FONT>
						</div>
		
						<div class="col-xs-12">
						<input type="radio" name="radio" value="5" onclick="javaScript:mostrar_precio();"><FONT SIZE="" COLOR="white">Modificar Precio</FONT>
						</div>
						<div class="col-xs-12">
							<input type="radio" name="radio" value="6" onclick="javaScript:mostrar_iva();"><FONT SIZE="" COLOR="white">Modificar IVA</FONT>
						</div>	
			   		 </div>
			   	</div>	 

			   	<div class="col-xs-6">
					<div class="row" id="utilidad" style="display:none;">
						Utilidad:%<input onKeyPress="return acceptNum(event)" type="text" name="cantidad_utilidad" size="4" maxlength=5 style="color: black">
						<input type="radio" name="tipo_valor" checked value="1">Aumentar
						<input type="radio" name="tipo_valor" value="2">Disminuir
						<input type="radio" name="tipo_valor" value="3">Definir porcentaje exacto
						<input type="submit" name="submit" onclick="cambiar_precios();" value="Generar" style="background: white; color: #5DBD90; border: none;">		
					</div>

					<div class="row" id="descuentos" style="display:none;">
						Descuento:%<input onKeyPress="return acceptNum(event)" type="text" name="cantidad_descuento" size="4" maxlength=5 style="color: black">
						<input type="radio" name="tipo_valor" value="1">Aumentar
						<input type="radio" name="tipo_valor" value="2">Disminuir
						<input type="radio" name="tipo_valor" value="3">Definir porcentaje exacto
						<input type="submit" name="submit" onclick="cambiar_precios();" value="Generar" style="background: white; color: #5DBD90; border: none;">
					</div>	

					<div class="row" id="precio" style="display:none;">
						Precio:% <input onKeyPress="return acceptNum(event)" type="text" name="cantidad_precio" size="4" maxlength=5 style="color: black">
						<input type="radio" name="tipo_valor" value="1">Aumentar
						<input type="radio" name="tipo_valor" value="2">Disminuir
						<input type="submit" name="submit" onclick="cambiar_precios();"	 value="Generar" style="background: white; color: #5DBD90; border: none;">
					</div>	
					<div class="row" id="iva" style="display:none;">
						IVA: 
	                        <select name="cantidad_iva" style="color: black">
	                            <option value="0">0</option>
	                            <option value="10.5">10.5</option>
	                            <option value="21">21</option>                                                    
	                            <option value="24">24</option>                                                    
	                        </select>
							<input type="submit" name="submit" onclick="cambiar_precios();"	 value="Generar" style="background: white; color: #5DBD90; border: none;">
					</div>
				</div>

				</form>
</div>
</div>
</div></div>
	<!-- end page container -->
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo HOME?>assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php echo HOME?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo HOME?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->


	<script src="<?php echo HOME?>assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
	//		TableManageButtons.init();
		});</script>