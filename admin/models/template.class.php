<?php

class Template
{
	function draw_header($acceso=0, $Seccion='')
	{   
   header('X-Frame-Options: SAMEORIGIN'); // FF 3.6.9+ Chrome 4.1+ IE 8+ Safari 4+ Opera 10.5+
   $_usuario = unserialize($_SESSION["usuario"]);
   date_default_timezone_set('America/Argentina/Buenos_Aires');
   $_hora= date ("H:i:s");
   $_fecha_hoy= date ("Y-m-d");
       ?>
      <!DOCTYPE html>
      <html>
        <head>
          <meta http-equiv="content-type" content="text/html; charset=UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
          <link rel="shortcut icon" type="image/png" href="<?php echo IMGS?>favicon.png"/>

          <title>Maderas El Aleman</title>

          <!-- ================== BEGIN BASE CSS STYLE ================== -->
          <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
          <link href="<?php echo ADMIN?>assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
          <link href="<?php echo ADMIN?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
          <link href="<?php echo ADMIN?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
          <link href="<?php echo ADMIN?>assets/css/animate.min.css" rel="stylesheet" />
          <link href="<?php echo ADMIN?>assets/css/style.min.css" rel="stylesheet" />
          <link href="<?php echo ADMIN?>assets/css/style-responsive.min.css" rel="stylesheet" />
          <link href="<?php echo ADMIN?>assets/css/theme/default.css" rel="stylesheet" id="theme" />
          <link rel="stylesheet" href="<?php echo CSS?>cropper.css">

          <!-- ================== END BASE CSS STYLE ================== -->
          
          <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
          <link href="<?php echo ADMIN?>assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
          <link href="<?php echo ADMIN?>assets/plugins/DataTables/extensions/Buttons/css/buttons.bootstrap.min.css" rel="stylesheet" />
          <link href="<?php echo ADMIN?>assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
          <link href="<?php echo ADMIN?>assets/plugins/parsley/src/parsley.css" rel="stylesheet" />
          
          <!-- ================== END PAGE LEVEL STYLE ================== -->
          
          <!-- ================== BEGIN BASE JS ================== -->
          <script src="<?php echo ADMIN?>assets/plugins/pace/pace.min.js"></script>
          <!-- ================== END BASE JS ================== -->


        </head>
      <body>


  <!-- begin #page-loader -->
  <div id="page-loader" class="fade"><span class="spinner"></span></div>
  <!-- end #page-loader -->
  
  <!-- begin #page-container -->
  <div id="page-container" class="fade in page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
      <!-- begin container-fluid -->
      <div class="container-fluid">
        <!-- begin mobile sidebar expand / collapse button -->
        <div class="navbar-header">
          <a href="<?php echo HOME?>" class="navbar-brand"><span class="navbar-logo"></span> Administrador</a>
          <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

      </div>
      <!-- end container-fluid -->
    </div>
    <!-- end #header -->
    
    <!-- begin #sidebar -->
    <div id="sidebar" class="sidebar">
      <!-- begin sidebar scrollbar -->
      <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
          <li class="nav-profile">
<!--            <div class="image">
              <a href="javascript:;"><img src="assets/img/user-13.jpg" alt="" /></a>
            </div>-->
            <div class="info">
              Administrador
              <small>Maderera el Alemán</small>
            </div>
          </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">

          <li class="nav-header">Panel General Productos</li>
          <li class="has-sub <?php if($Seccion == 'productos' or $Seccion == 'categorias' or $Seccion == 'subcategorias') echo "active"; ?>">
            <a href="<?php echo HOME?>home.html">
                <b class="caret pull-right"></b>

                <i class="fa fa-pinterest" aria-hidden="true"></i>
                <span>Productos</span>
              </a>
            <ul class="sub-menu">
                <li class="<?php if($Seccion == 'productos') echo "active"; ?>"><a href="<?php echo HOME?>home.html">Productos</a></li>
                <li class="<?php if($Seccion == 'categorias') echo "active"; ?>"><a href="<?php echo HOME?>list_categorias.html">Categorias</a></li>
                <li class="<?php if($Seccion == 'subcategorias') echo "active"; ?>"><a href="<?php echo HOME?>list_subcategorias.html">SubCategorias</a></li>
            </ul>              
          </li>

           <li class="has-sub <?php if($Seccion == 'clientes') echo "active"; ?>">
            <a href="<?php echo HOME?>clientes.html">
                <i class="fa fa-child" aria-hidden="true"></i>
                <span>Clientes</span>
              </a>
          </li>          
           <li class="has-sub <?php if($Seccion == 'proveedores') echo "active"; ?>">
            <a href="<?php echo HOME?>proveedores.html">
                <i class="fa fa-product-hunt" aria-hidden="true"></i>
                <span>Proveedores</span>
              </a>
          </li>    
           <li class="has-sub">
            <a href="<?php echo HOME?>facturas.html">
                <i class="fa fa-archive" aria-hidden="true"></i>
                <span>Presupuestos</span>
              </a>
          </li>  

           <li class="has-sub">
            <a href="<?php echo HOME?>modelo_factura.html">
                <i class="fa fa-barcode" aria-hidden="true"></i>
                <span>Generar Factura</span>
              </a>
          </li>                       

              <!-- begin sidebar minify button -->
          <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
              <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
      </div>
      <!-- end sidebar scrollbar -->
    </div>
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->


    <!-- begin #content -->
    <div id="content" class="content">


          
<?php
   }



	function draw_footer()
	{ 

	?>
    </body>

  </html>

	<?php
	}
}
?>