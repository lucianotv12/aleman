
			<!-- begin invoice -->
			<div class="invoice">
                <div class="invoice-company">
                    <span class="pull-right hidden-print">
                    <a href="javascript:;" class="btn btn-sm btn-success m-b-10"><i class="fa fa-download m-r-5"></i> Exportar a PDF</a>
                    <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-success m-b-10"><i class="fa fa-print m-r-5"></i> Imprimir</a>
                    </span>
                    Maderas "El Aleman"
                </div>
                <div class="invoice-header">
                    <div class="invoice-from">
                        <small>De</small>
                        <address class="m-t-5 m-b-5">
                            <strong>Maderas "El Aleman"</strong><br />
                            Direccion<br />
                            General Rodriguez, Buenos Aires<br />
                            Telefono: (123) 456-7890<br />
                            Fax: (123) 456-7890
                        </address>
                    </div>
                    <div class="invoice-to">
                        <small>Para</small>
                        <address class="m-t-5 m-b-5">
                            <strong>Cliente datos</strong><br />
                            domicilio<br />
                            Ciudad<br />
                            Telefono: (123) 456-7890<br />
                        </address>
                    </div>
                    <div class="invoice-date">
                        <small>Remito / ....</small>
                        <div class="date m-t-5"><?php echo date("d/m/Y");?></div>
                        <div class="invoice-detail">
                            #0000123DSS<br />
                            Productos varios
                        </div>
                    </div>
                </div>
                <div class="" style="background: #5DBD90;padding: 20px; color: white">
                        <div class="panel-body panel-form">
                            <form class="form-horizontal form-bordered">
                                <div class="form-group" >
                                    <label class="control-label col-md-2" style="color: white">Buscar Productos</label>
                                    <div class="col-md-10">
                                        <input type="text" name="" id="jquery-autocomplete" class="form-control" placeholder="busqueda inteligente" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>   
                    <div class="" id="seleccionado" style="background: #5DBD90;padding: 20px; color: white;display: none;">
                        <input type="hidden" name="idproducto" id="idproducto">
                        <input type="hidden" name="detalle_producto" id="detalle_producto">
                        <input type="hidden" name="precio_producto" id="precio_producto">
                        <span >ID: <label style="color: white" id="idproducto_muestra"></label></span> &nbsp;&nbsp;-&nbsp;&nbsp;
                        <span >Nombre: <label style="color: white" id="detalle_producto_muestra"></label></span>&nbsp;&nbsp;-&nbsp;&nbsp;
                        <span >Precio: <label style="color: white" id="precio_producto_muestra"></label></span>
                        <p> Cantidad <input type="number" name="cantidad" value="1" id="cantidad" style="color: black">&nbsp;&nbsp;-&nbsp;&nbsp; Descuento <input type="number" name="descuento_producto" value="0" id="descuento_producto"  style="color: black">&nbsp;&nbsp;-&nbsp;&nbsp;
                            <a href="#" onclick="addTemporal()" style="background: gray; color: white; padding: 5px">
                                Agregar
                                <i class="fa fa-chevron-circle-right"></i>

                            </a>
                        </p>
                    </div>
                <div class="invoice-content">


                    <div class="table-responsive">
                        <table id="mitabla" class="table table-invoice" >
                                <tr id="0">
                                    <th>Cant.</th>
                                    <th>Art.</th>
                                    <th colspan="4">Detalle</th>
                                    <th>P/unitario</th>
                                    <th>Desc.</th>
                                    <th>Importe</th>
                                    <th></th>
                                </tr>

                        </table>
                    </div>
                    <div class="invoice-price">
                        <div class="invoice-price-left">
                            <div class="invoice-price-row">
                                <div class="sub-price">
                                    <small>SUBTOTAL</small>
                                    <span id="subtotal_final">0</span>
                                </div>
                                <div class="sub-price">
                                    <i class="fa fa-plus"></i>
                                </div>
                                <div class="sub-price">
                                    <small>Iva (21%)</small>
                                    $919080
                                </div>
                            </div>
                        </div>
                        <div class="invoice-price-right">
                            <small>TOTAL</small> 
                            <span id="total_final">0</span>
                        </div>
                    </div>
                </div>
                <div class="invoice-note">
                    * Nota 1<br />
                    * Nota 2<br />
                    * Nota 3
                </div>
                <div class="invoice-footer text-muted">
                    <p class="text-center m-b-5">
                        Muchas gracias
                    </p>
                    <p class="text-center">
                        <span class="m-r-10"><i class="fa fa-globe"></i> elaleman.com</span>
                        <span class="m-r-10"><i class="fa fa-phone"></i> T:0237-4444444</span>
                        <span class="m-r-10"><i class="fa fa-envelope"></i> elaleman@gmail.com</span>
                    </p>
                </div>
            </div>
			<!-- end invoice -->

	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo HOME?>assets/plugins/jquery/jquery-1.9.1.min.js"></script>
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
            handleJqueryAutocomplete();
		});

var handleJqueryAutocomplete = function() {

 //   $('#jquery-autocomplete').autocomplete({
            $('#jquery-autocomplete').autocomplete({
            source:"<?php echo VIEW?>facturacion/ajax.php",
            select: function(event, ui){
                 $("#idproducto_muestra").html(ui.item.id);
                 $("#detalle_producto_muestra").html(ui.item.descripcion);
                 $("#precio_producto_muestra").html(ui.item.precio); 
                 $("#idproducto").val(ui.item.id);
                 $("#detalle_producto").val(ui.item.descripcion);
                 $("#precio_producto").val(ui.item.precio);                  
                 $("#seleccionado").css("display", "block");            
                 $("#cantidad").val("1");            
                 $("#descuento").val("0");            
                 $("#mitabla").css("display", "block");
            //AGREGAR EL PRECIO DEL PRODUCTO 
            }
                    
            });
};

    function addTemporal()
    {

        if($('#cantidad').val())
            {
                if($('#idproducto').val())
                    {   
                    var desc = $('#detalle_producto').val();
                    var numero = $('#mitabla tr:last').attr("id");
                    var numero = Number(numero.replace(/[^0-9\.]+/g,""));
        //          var lucho = $(this).parent("tr").remove();
                    var lucho = '"tr"'; 
                    //crear tabla manualmente
                //  var table = document.getElementById('mitabla');   
                //  var rows = table.getElementsByTagName("tr");   
                    //crear tabla manualmente
                    numero = numero + parseInt(1);
                    var precio_descuento = $('#precio_producto').val() - ($('#precio_producto').val() * $('#descuento_producto').val() / 100) ;

                    var precio_total = precio_descuento * $('#cantidad').val();
                    precio_total = (precio_total).toFixed(2); // valor con 2 decimales          



                    $('#mitabla tr:last').after("<tr id="+ numero +"><td align='center'><input type=text size=1 name=cantidad"+ numero + " value=" + $('#cantidad').val() + "></td><td align='center'><input type=text name=idproducto"+ numero + "  value=" + $('#idproducto').val() + "></td><td align='left' colspan=4 style='min-width:320px' >"+desc+"</td><td align='center'><input type=text  name=precio_producto"+ numero + "  value=" + $('#precio_producto').val() + "></td><td align='center'><input size=1 name=descuento_producto"+ numero + "  value=" + $('#descuento_producto').val() + "></td><td align='center'><input type=text  name=precio_total"+ numero + " id=precio_total"+ numero + "  value=" + precio_total + " ></td><td><a href='#' onClick=remover_fila("+ numero + ");>Quitar</a></td></tr>"); 
                    
                 //<a href='#' onClick=$(this).parent().parent().remove();>Quitar</a>   
                //  total_total = $('#precio_total1').val() ;
                    if(numero > 1){
                    var total_total=0;
    
                        var i=0;                        
//                      var total_total=parseInt($('#precio_total'+i).val());
                        for(i=1;i<=numero;i++){ 
                            parcial = 'precio_total'+i; 
                        //  total_total = parseInt(precio_total);
                            total_total = parseFloat(total_total) + parseFloat($('#'+parcial+'').val());
                        }

                    }else{
                    total_total = $('#precio_total1').val() ;
                    $("#cantidad").attr('value', '1');
                    $("#idproducto").attr('value', '');
                    $("#detalle_producto").attr('value', '');
                    $("#precio_producto").attr('value', '');
                    $("#jquery-autocomplete").attr('value', '');
                    $("#descuento_producto").attr('value', 0);
                    $("#subtotal_final").html(total_total);
                    $("#total_final").html(total_total);
                    $("#jquery-autocomplete").focus();
                    
                        
                    }


                    total_total = (total_total).toFixed(2); // valor con 2 decimales            

                    $("#cantidad").attr('value', '1');
                    $("#idproducto").attr('value', '');
                    $("#detalle_producto").attr('value', '');
                    $("#precio_producto").attr('value', '');
                    $("#jquery-autocomplete").attr('value', '');
                    $("#descuento_producto").attr('value', 0);
                    $("#subtotal_final").html(total_total);
                    $("#total_final").html(total_total);

                    $("#jquery-autocomplete").focus();
                     $("#seleccionado").css("display", "none");            

                    }//<td><img SRC='http://www.controldestockmovil.com.ar/lady-jane/templates/img/del.gif' onclick=$(this).parent('tr').remove();></td>
                    //<td><a href='#' onClick='removeFormField(); return false;'>Remove</a></td>
                else
                    {
                    window.alert('Tiene que ingresar un Producto');                         
                    }
            }
        else
            {
            window.alert('Tiene que cargar la cantidad de productos para poder ingresar el producto');       
            $("#cantidad").focus();
            }
    }

    function remover_fila(fila){
        $('#'+ fila ).remove();
    }

	</script>
</body>
</html>
