<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Zippy</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?php echo $this->config->item('css_images_js_base_url'); ?>bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="<?php echo $this->config->item('css_images_js_base_url'); ?>bootstrap/css/bootstrap-responsive.min.css" />
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="<?php echo $this->config->item('css_images_js_base_url'); ?>css/blue.css" id="link_theme" />
        <!-- breadcrumbs-->
            <link rel="stylesheet" href="<?php echo $this->config->item('css_images_js_base_url'); ?>lib/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="<?php echo $this->config->item('css_images_js_base_url'); ?>lib/qtip2/jquery.qtip.min.css" />
        <!-- colorbox -->
            <link rel="stylesheet" href="<?php echo $this->config->item('css_images_js_base_url'); ?>lib/colorbox/colorbox.css" />    
        <!-- code prettify -->
            <link rel="stylesheet" href="<?php echo $this->config->item('css_images_js_base_url'); ?>lib/google-code-prettify/prettify.css" />    
        <!-- notifications -->
            <link rel="stylesheet" href="<?php echo $this->config->item('css_images_js_base_url'); ?>lib/sticky/sticky.css" />    
        <!-- splashy icons -->
            <link rel="stylesheet" href="<?php echo $this->config->item('css_images_js_base_url'); ?>img/splashy/splashy.css" />
		<!-- flags -->
            <link rel="stylesheet" href="<?php echo $this->config->item('css_images_js_base_url'); ?>img/flags/flags.css" />	
		<!-- calendar -->
            <link rel="stylesheet" href="<?php echo $this->config->item('css_images_js_base_url'); ?>lib/fullcalendar/fullcalendar_gebo.css" />
            
        <!-- main styles -->
            <link rel="stylesheet" href="<?php echo $this->config->item('css_images_js_base_url'); ?>css/style.css" />
			
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
	
        <!-- Favicon -->
            <link rel="shortcut icon" href="favicon.ico" />
		
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/ie.css" />
            <script src="<?php echo $this->config->item('css_images_js_base_url'); ?>js/ie/html5.js"></script>
			<script src="<?php echo $this->config->item('css_images_js_base_url'); ?>js/ie/respond.min.js"></script>
			<script src="<?php echo $this->config->item('css_images_js_base_url'); ?>lib/flot/excanvas.min.js"></script>
        <![endif]-->
		
		<script>
			//* hide all elements & show preloader
			document.documentElement.className += 'js';
		</script>
    </head>
    <body>
		<div id="loading_layer" style="display:none"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>img/ajax_loader.gif" alt="" /></div>
		
		
		<div id="maincontainer" class="clearfix">
			<!-- header -->
            <header>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a class="brand" href="javascript:void(0);"><i class="icon-home icon-white"></i> Zippy Admin</a>
                            <ul class="nav user_menu pull-right">                                
                                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo ucwords($user_name); ?> <b class="caret"></b></a>
                                   <ul class="dropdown-menu">
										<li><a href="<?php echo base_url(); ?>user/account">My Profile</a></li>										
										<li class="divider"></li>
										<li><a href="<?php echo base_url(); ?>user/logout">Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
							<a data-target=".nav-collapse" data-toggle="collapse" class="btn_menu">
								<span class="icon-align-justify icon-white"></span>
							</a>                            
                        </div>
                    </div>
                </div>
            </header>