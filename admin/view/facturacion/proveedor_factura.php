
			<!-- begin invoice -->
			<div class="invoice">
   
<!--                <div class="invoice-company">
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
                </div>-->
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
<!--                        <input type="hidden" name="precio_producto" id="precio_producto">-->
                        <span >ID: <label style="color: white" id="idproducto_muestra"></label></span> &nbsp;&nbsp;-&nbsp;&nbsp;
                        <span >Nombre: <label style="color: white" id="detalle_producto_muestra"></label></span>&nbsp;&nbsp;-&nbsp;&nbsp;
                        <span ></span>
                        <p> Cantidad <input type="number" name="cantidad" value="1" id="cantidad" style="color: black">&nbsp;&nbsp;-&nbsp;&nbsp; Descuento <input type="number" name="descuento_producto" value="0" id="descuento_producto"  style="color: black">&nbsp;&nbsp;-&nbsp;&nbsp; Precio: <input type="text" name="precio_producto" id="precio_producto" style="color: black"></label>-&nbsp;&nbsp;
                            <a href="#" onclick="addTemporal()" style="background: gray; color: white; padding: 5px">
                                Agregar
                                <i class="fa fa-chevron-circle-right"></i>

                            </a>
                        </p>
                    </div>
                <div class="invoice-content">

                    <form name="datos" method="post" enctype="multipart/form-data" action="<?php echo HOME?>generar_factura_proveedor.html" onKeyPress="return disableEnterKey(event)" >

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
                                <tr id="0">
                                    <td><input type="text" size=1 name="cantidad_generico" id="cantidad_generico"></td>
                                    <td>x</td>
                                    <td colspan="4"><input type="text" name="nombre_generico" id="nombre_generico"></td>
                                    <td><input type="text" id="precio_generico" name="precio_generico"></td>
                                    <th><a href="#" onclick="addTemporal_generico()">AGREGAR</a></th>
                                </tr>

                        </table>
                    </div>
                    <div class="invoice-price">
                        <div class="invoice-price-left">
                            <div class="invoice-price-row">
                                <div class="sub-price">
                                    <small>SUBTOTAL</small>
                                    $<span id="subtotal_final">0</span>
                                </div>
                                <div class="sub-price">
                                    <i class="fa fa-plus"></i>
                                </div>
                                <div class="sub-price">
                                    <small>Iva (21%)</small>
                                    $0
                                </div>
                            </div>
                        </div>
                        <div class="invoice-price-right">
                            <small>TOTAL</small> 
                            $<span id="total_final">0</span>
                        </div>
                    </div>
                </div>
<!--                <div class="invoice-note">
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
                </div>-->
                <div class="row">
                    <div class="col-xs-4">
                        Proveedor :
                        <select name="proveedorId">    
                            <option value="0">Seleccione Proveedor</option>
                        <?php foreach($proveedores as $proveedor):?>
                            <option value="<?php echo $proveedor->id?>"><?php echo $proveedor->nombre?></option>
                         <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        N° Factura :
                        <input type="text" name="n_factura">
                    </div>
                    <div class="col-xs-4">
                        N° Remito :
                        <input type="text" name="n_remito">
                    </div>                                        
                </div>                 
                <div class="invoice-footer text-muted text-center" style="padding: 15px">
                    <input type="submit" name="GENERAR" class="btn btn-sm btn-success" value="GENERAR PRESUPUESTO">

                </div>


                </form>
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
            source:"<?php echo VIEW?>facturacion/ajax_proveedor.php",
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
                            if($('#'+parcial+'').length > 0) {
                                total_total = parseFloat(total_total) + parseFloat($('#'+parcial+'').val());
                            }    
                        }

                    }else{
                    var total_total=0;    
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


                    $("#cantidad").attr('value', '1');
                    $("#idproducto").attr('value', '');
                    $("#detalle_producto").attr('value', '');
                    $("#precio_producto").attr('value', '');
                    $("#jquery-autocomplete").attr('value', '');
                    $("#descuento_producto").attr('value', 0);
                    $("#jquery-autocomplete").focus();
                     $("#seleccionado").css("display", "none");            

                    total_total = (total_total).toFixed(2); // valor con 2 decimales            


                    $("#subtotal_final").html(total_total);
                    $("#total_final").html(total_total);



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

    function addTemporal_generico()
    {

        if($('#cantidad_generico').val())
            {

                var desc = $('#nombre_generico').val();
         //      alert(desc);    
                var numero = $('#mitabla tr:last').attr("id");
                var numero = Number(numero.replace(/[^0-9\.]+/g,""));
    //          var lucho = $(this).parent("tr").remove();
                var lucho = '"tr"'; 
                //crear tabla manualmente
            //  var table = document.getElementById('mitabla');   
            //  var rows = table.getElementsByTagName("tr");   
                //crear tabla manualmente
                numero = numero + parseInt(1);
                var precio_descuento = $('#precio_generico').val()  ;

                var precio_total = precio_descuento * $('#cantidad_generico').val();
                precio_total = (precio_total).toFixed(2); // valor con 2 decimales          



                $('#mitabla tr:last').after("<tr id="+ numero +"><td align='center'><input type=text size=1 name=cantidad"+ numero + " value=" + $('#cantidad_generico').val() + "></td><td align='center'><input type=text name=idproducto"+ numero + "  value=0></td><td align='left' colspan=4 style='min-width:320px' ><input type=text  name=descripcion_producto"+ numero + "  value='" + $('#nombre_generico').val() + "''></td><td align='center'><input type=text  name=precio_producto"+ numero + "  value=" + $('#precio_generico').val() + "></td><td align='center'><input size=1 name=descuento_producto"+ numero + "  value=0   ></td><td align='center'><input type=text  name=precio_total"+ numero + " id=precio_total"+ numero + "  value=" + precio_total + " ></td><td><a href='#' onClick=remover_fila("+ numero + ");>Quitar</a></td></tr>"); 
                
             //<a href='#' onClick=$(this).parent().parent().remove();>Quitar</a>   
            //  total_total = $('#precio_total1').val() ;
                if(numero > 1){
                var total_total=0;

                    var i=0;                        
    //                      var total_total=parseInt($('#precio_total'+i).val());
                    for(i=1;i<=numero;i++){ 
                        parcial = 'precio_total'+i; 
                    //  total_total = parseInt(precio_total);
                        if($('#'+parcial+'').length > 0) {
                            total_total = parseFloat(total_total) + parseFloat($('#'+parcial+'').val());
                        }    
                    }

                }else{
                var total_total=0;    
                total_total = $('#precio_total1').val() ;
                $("#cantidad_generico").attr('value', '1');
//                $("#idproducto").attr('value', '');
                $("#detalle_producto").attr('value', '');
                $("#precio_producto").attr('value', '');
                $("#jquery-autocomplete").attr('value', '');
                $("#descuento_producto").attr('value', 0);
                $("#subtotal_final").html(total_total);
                $("#total_final").html(total_total);
                $("#jquery-autocomplete").focus();
                    $("#cantidad_generico").attr('value', '1');
                    $("#cantidad_generico").focus();
                    $("#nombre_generico").attr('value', '');
                    $("#precio_generico").attr('value', '');                
                    
                }


                $("#cantidad").attr('value', '1');
                $("#idproducto").attr('value', '');
                $("#detalle_producto").attr('value', '');
                $("#precio_producto").attr('value', '');
                $("#jquery-autocomplete").attr('value', '');
                $("#descuento_producto").attr('value', 0);
                $("#jquery-autocomplete").focus();
                 $("#seleccionado").css("display", "none");            
                    $("#cantidad_generico").attr('value', '1');
                    $("#cantidad_generico").focus();
                    $("#nombre_generico").attr('value', '');
                    $("#precio_generico").attr('value', '');
                total_total = (total_total).toFixed(2); // valor con 2 decimales            


                $("#subtotal_final").html(total_total);
                $("#total_final").html(total_total);




            }
        else
            {
            window.alert('Tiene que cargar la cantidad de productos para poder ingresar el producto');       
            $("#cantidad").focus();
            }
    }



    function remover_fila(fila){
      var total_final = parseFloat( $('#total_final').html());
      var resta = parseFloat( $('#precio_total'+ fila ).val());
 //     alert(resta);
      nouso = total_final - resta;
      $("#subtotal_final").html(nouso.toFixed(2));
      $("#total_final").html(nouso.toFixed(2));

      $('#'+ fila ).remove();

    }

	</script>
</body>
</html>
