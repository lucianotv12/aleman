		<!-- begin #content 
		<div id="content" class="content content-full-width">-->
			<div class="p-20">
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-2 -->
			    <div class="col-md-2">
			        <form name="busca_email" method="post" action="<?php echo HOME?>tickets_campania-<?php echo $_GET["id"]?>-<?php echo $_GET["tipo"]?>">
			            <div class="input-group m-b-15">
                            <input type="text" name="busqueda" class="form-control input-sm input-white" placeholder="buscar" value="<?php echo $busqueda?>" />
                            <span class="input-group-btn">
                                <button class="btn btn-sm btn-inverse" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
			        </form>
			        <div class="hidden-sm hidden-xs">
                        <h5 class="m-t-20">Tickets</h5>
                        <ul class="nav nav-pills nav-stacked nav-inbox">
                            <li <?php if($_GET["tipo"] == "WEB"):?> class="active" <?php endif;?> >
                                <a href="<?php echo HOME?>tickets_campania-<?php echo $_GET["id"]?>-WEB">
                                    <i class="fa fa-inbox fa-fw m-r-5"></i> Contacto WEB (<?php echo Ticket::get_tickets_total_pendientes("WEB", $_GET["id"]);?>)
                                </a>
                            </li>
                            <li <?php if($_GET["tipo"] == "CC"):?> class="active" <?php endif;?> >
                                <a href="<?php echo HOME?>tickets_campania-<?php echo $_GET["id"]?>-CC">
                                    <i class="fa fa-inbox fa-fw m-r-5"></i> Contacto CC (<?php echo Ticket::get_tickets_total_pendientes("CC", $_GET["id"]);?>)
                                </a>                                
                            </li>
<!--                            <li><a href="#"><i class="fa fa-pencil fa-fw m-r-5"></i> Mensajes Activos</a></li>
                            <li><a href="#"><i class="fa fa-folder fa-fw m-r-5"></i> Historial</a></li>-->
                        </ul>
<!--                        <h5 class="m-t-20">Folders</h5>
                        <ul class="nav nav-pills nav-stacked nav-inbox">
                            <li><a href="#"><i class="fa fa-folder fa-fw m-r-5"></i> Newsletter</a></li>
                            <li><a href="#"><i class="fa fa-folder fa-fw m-r-5"></i> Friend</a></li>
                            <li><a href="#"><i class="fa fa-folder fa-fw m-r-5"></i> Company</a></li>
                            <li><a href="#"><i class="fa fa-folder fa-fw m-r-5"></i> Downloaded</a></li>
                        </ul>-->
                    </div>
                </div>
			    <!-- end col-2 -->
			    <!-- begin col-10 -->
			    <div class="col-md-10">
                    <div class="email-btn-row hidden-xs">
                        <a href="#" class="btn btn-sm btn-inverse disabled"><i class="fa fa-plus m-r-5"></i> New</a>
                        <a href="#" class="btn btn-sm btn-default disabled">Reply</a>
                        <a href="#" class="btn btn-sm btn-default disabled">Delete</a>
                        <a href="#" class="btn btn-sm btn-default disabled">Archive</a>
                        <a href="#" class="btn btn-sm btn-default disabled">Junk</a>
                        <a href="#" class="btn btn-sm btn-default disabled">Sw
                        wep</a>
                        <a href="#" class="btn btn-sm btn-default disabled">Move to</a>
                        <a href="#" class="btn btn-sm btn-default disabled">Categories</a>
                    </div>
			        <div class="email-content">
                        <table class="table table-email">
                            <thead>
                                <tr>
                                    <th class="email-select"><a href="#" data-click="email-select-all"><i class="fa fa-square-o fa-fw"></i></a></th>
                                    <th colspan="2">
                                        <div class="dropdown">
                                            <a href="#" class="email-header-link" data-toggle="dropdown">View All <i class="fa fa-angle-down m-l-5"></i></a>
                                            <ul class="dropdown-menu">
                                                <li class="active"><a href="#">All</a></li>
                                                <li><a href="#">Unread</a></li>
                                                <li><a href="#">Contacts</a></li>
                                                <li><a href="#">Groups</a></li>
                                                <li><a href="#">Newsletters</a></li>
                                                <li><a href="#">Social updates</a></li>
                                                <li><a href="#">Everything else</a></li>
                                            </ul>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="dropdown">
                                            <a href="#" class="email-header-link" data-toggle="dropdown">Arrange by <i class="fa fa-angle-down m-l-5"></i></a>
                                            <ul class="dropdown-menu">
                                                <li class="active"><a href="#">Date</a></li>
                                                <li><a href="#">From</a></li>
                                                <li><a href="#">Subject</a></li>
                                                <li><a href="#">Size</a></li>
                                                <li><a href="#">Conversation</a></li>
                                            </ul>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>

                                    <td>ID</td>
                                    <td>EMAIL</td>
                                    <td>ASUNTO</td>
                                    <td>NOMBRE</td>
                                    <td>FECHA</td>
                                    <td>STATUS</td>
                                    <TD></TD>
                                </tr>    
								<?php foreach($tickets as $ticket):?>
                                <tr <?php if($ticket["status"] == 1):?> style="font-weight: bold"  <?php endif;?> >
                                    <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                    <td class="email-sender">
                                        <?php echo $ticket["id"];?>
                                    </td>
                                    <td class="email-subject"><?php echo $ticket["email"];?></td>
									
                                    <td class="email-subject"><?php echo $ticket["asunto"];?></td>
									<td class="email-subject"><?php echo $ticket["nombre"] . " " . $ticket["apellido"];?></td>

                                    <td class="email-date"><?php echo $ticket["date"];?></td>
                                    <td class="email-date"><?php if($ticket["status"] == 1): echo "Nuevo"; else: "Con respuesta"; endif; ?></td>

                                    <td><a href="<?php echo HOME?>ticket_detalle/<?php echo $ticket["id"];?>/">Ver mas</a></td>
                                </tr>
								<?php endforeach;?>							

                            </tbody>
                        </table>
                        <div class="email-footer clearfix">
                            
                            <ul class="pagination pagination-sm m-t-0 m-b-0 pull-right">
                                <li class="disabled"><a href="javascript:;"><i class="fa fa-angle-double-left"></i></a></li>
                                <li class="disabled"><a href="javascript:;"><i class="fa fa-angle-left"></i></a></li>
                                <li><a href="javascript:;"><i class="fa fa-angle-right"></i></a></li>
                                <li><a href="javascript:;"><i class="fa fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
			        </div>
			    </div>
			    <!-- end col-10 -->
			</div>
			<!-- end row -->
			</div>
<!--		</div>-->
		<!-- end #content -->
		
        <!-- begin theme-panel -->
        <div class="theme-panel">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
            <div class="theme-panel-content">
                <h5 class="m-t-0">Color Theme</h5>
                <ul class="theme-list clearfix">
                    <li class="active"><a href="javascript:;" class="bg-green" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
                </ul>
                <div class="divider"></div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Header Styling</div>
                    <div class="col-md-7">
                        <select name="header-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">inverse</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Header</div>
                    <div class="col-md-7">
                        <select name="header-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Styling</div>
                    <div class="col-md-7">
                        <select name="sidebar-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">grid</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Sidebar</div>
                    <div class="col-md-7">
                        <select name="sidebar-fixed" class="form-control input-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
                    <div class="col-md-7">
                        <select name="content-gradient" class="form-control input-sm">
                            <option value="1">disabled</option>
                            <option value="2">enabled</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Content Styling</div>
                    <div class="col-md-7">
                        <select name="content-styling" class="form-control input-sm">
                            <option value="1">default</option>
                            <option value="2">black</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <a href="#" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage"><i class="fa fa-refresh m-r-3"></i> Reset Local Storage</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
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
	<script src="<?php echo HOME?>assets/js/inbox.demo.min.js"></script>
	<script src="<?php echo HOME?>assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			Inbox.init();
		});
	</script>
</body>
</html>
