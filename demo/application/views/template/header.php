<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>::Zippy Loft::</title>
<?php 
	// meta property for fb share
	if($this->router->fetch_class() == 'product' && $this->router->fetch_method() == 'description')
	{
		//echo '<pre>'; print_r($product_details); echo '</pre>'; 
		foreach($product_details as $product_detail)
		{
			// get featured image
			if($product_detail->is_featured == '1')
			{
				//$product_details = $product_details[0];
				$og_title = $product_detail->title;
				$og_image = $this->config->item('site_url').'admin/uploads/products/large/'.$product_detail->file_name;
				
				$description = strip_tags($product_detail->description);
				$og_description = (strlen($description) > 200) ? substr($description,0,190).'...' : $description;
			}
		}
?>
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $og_title; ?>" />
        <meta property="og:url" content="<?php echo $og_title; ?>" />
        <meta property="og:image" content="<?php echo $og_image; ?>" />
        <meta property="og:description" content="<?php echo $og_description; ?>" />
<?php
	} // end if (end of meta property)
?>
<link rel="icon" href="<?php echo $this->config->item('css_images_js_base_url'); ?>images/favicon.ico" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="<?php echo $this->config->item('css_images_js_base_url'); ?>css/bootstrap.css" type="text/css" media="screen">
<!--[if lt IE 9]><script src="<?php echo $this->config->item('css_images_js_base_url'); ?>js/ie8-responsive-file-warning.js"></script><![endif]-->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
	<script src="<?php echo $this->config->item('css_images_js_base_url'); ?>js/html5shiv.js"></script>
	<script src="<?php echo $this->config->item('css_images_js_base_url'); ?>js/respond.min.js"></script>
<![endif]-->

<script src="<?php echo $this->config->item('css_images_js_base_url'); ?>js/jquery-1.11.1.js"></script>
<script src="<?php echo $this->config->item('css_images_js_base_url'); ?>js/functions.js"></script>

<script type="text/javascript">
  var metas = document.getElementsByTagName('meta');
  var i;
  if (navigator.userAgent.match(/iPhone/i)||navigator.userAgent.match(/iPad/i)) {
    for (i=0; i<metas.length; i++) {
      if (metas[i].name == "viewport") {
        metas[i].content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
      }
    }
    document.addEventListener("gesturestart", gestureStart, false);
  }
  function gestureStart() {
    for (i=0; i<metas.length; i++) {
      if (metas[i].name == "viewport") {
        metas[i].content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6";
      }
    }
  }
</script>

<!-- sidebar Accordion Stylesheets -->
<link href="<?php echo $this->config->item('css_images_js_base_url'); ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />		
<link href="<?php echo $this->config->item('css_images_js_base_url'); ?>assets/css/responsive-accordion.css" rel="stylesheet" type="text/css" media="all" />
<!-- end sidebar Accordion Stylesheets -->

</head>

<body>
<div class="wraper">
	<div class="container">
    	<div class="top-bodr">
        	<div class="row">
                <div class="col-sm-7">
                <?php if($this->session->userdata('user_id')){ ?>
                    <ul class="toplink">
                        <li><a href="<?php echo base_url(); ?>user/account" <?php if($this->router->fetch_method() == 'account'){ echo 'class="active"'; } ?>>My Account</a></li>
                        <li><a href="<?php echo base_url(); ?>user/wishlist" <?php if($this->router->fetch_method() == 'wishlist'){ echo 'class="active"'; } ?>>Wishlist</a></li>
                        <li><a href="<?php echo base_url(); ?>user/orders" <?php if($this->router->fetch_method() == 'orders'){ echo 'class="active"'; } ?>>Orders</a></li>
                        <li><a href="<?php echo base_url(); ?>user/cart" <?php if($this->router->fetch_method() == 'cart'){ echo 'class="active"'; } ?>>Cart</a></li>
                        <li><a href="<?php echo base_url(); ?>user/checkout/" <?php if($this->router->fetch_method() == 'checkout'){ echo 'class="active"'; } ?>>Checkout</a></li>
                        <li><a href="<?php echo base_url(); ?>user/logout">Logout</a></li>
                    </ul>
                <?php } ?>
                    <div class="clearfix"></div>
                </div>
                <div class="col-sm-5">
                <?php if(!$this->session->userdata('user_id')){ ?>
                    <ul class="lognlink">
                        <li><a href="<?php echo base_url(); ?>user/signup" <?php if($this->router->fetch_method() == 'signup'){ echo 'class="active"'; } ?>>Create Account</a></li>
                        <li> -- or -- </li>
                        <li><a href="<?php echo base_url(); ?>user/signin" <?php if($this->router->fetch_method() == 'signin'){ echo 'class="active"'; } ?>>Login</a></li>
                    </ul>
				<?php }?>                    
                    <div class="clearfix"></div>
                </div>
            </div>
        	<div class="clearfix"></div>
        </div>
        <div class="row">
        	<div class="col-sm-3">
            	<a href="<?php echo $this->config->item('site_url'); ?>" class="logo"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/logo.png" alt=""></a>
            </div>
            <div class="col-sm-6">
            	<div class="search_sec">
                <form name="search" method="post" action="<?php echo base_url(); ?>product/search">
                	<input type="text" name="keyword" value="<?php if($this->session->userdata('keyword')){ echo $this->session->userdata('keyword'); } ?>" placeholder="Search entire store here...">
                    <input type="image" class="" src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/search-btn.png">
                </form>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-sm-3">
            	<a href="#" class="shipping-img"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/shipping-img.png" alt=""></a>
            </div>
        </div>
        <div class="nav-bg">
			<div class="row">
            <div class="col-sm-8">
            	<nav role="navigation" class="navbar navbar-default navbar-static" id="navbar-example">
                  <div class="">
                    <div class="navbar-header">
                      <button data-target=".bs-example-js-navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a href="#" class="navbar-brand">Menu</a>
                    </div>
                    
                   <?php
						//echo '<pre>'; print_r($header_categories); //echo '</pre>';
					
							$category_created = array();
							$category = array();
							$i = -1;
							foreach($header_categories as $header_category)
							{
								
								$categoryId = $header_category->category_id;
						
								if(!in_array($categoryId,$category_created))
								{
									$i++;
									$category_created[] = $categoryId;
									$category[$i][] = $header_category;
								}
								else
								{
									$key = array_search($categoryId, $category_created);
									$category[$key][] = $header_category;
								}
								
							}// end while
						
							//print_r($category); echo '</pre>'; //exit;
					
					?>
                    
                    <div class="collapse navbar-collapse bs-example-js-navbar-collapse">
                      <ul class="nav navbar-nav navigation">
                        <li class="dropdown"><a data-toggle="" class="<?php if($this->router->fetch_class() == 'home'){ echo 'active'; } ?>" role="button" href="<?php echo $this->config->item('site_url'); ?>">Home</a></li>
                        
                        <?php
						
							$drop = 1;
							foreach($category as $header_category_detail)
							{
								//echo '<pre>'; print_r($header_category_detail); echo '</pre>';
								
								
								$active = '';
								
								echo "<li class='dropdown'>";
								
								if($this->router->fetch_method() == 'category')
								{									
									$flag = 0;
									foreach($header_category_detail as $sub_category)
									{									
										if($this->uri->segment(3) == $sub_category->sub_category_id && $flag == 0)
										{
											 $active = 'active';
											 $flag = 1;
										}
										
									}// end foreach									
								} // end if
										
								echo "<a data-toggle='dropdown' class='dropdown-toggle ".$active."' role='button' href='#' id='drop".$drop."'>".$header_category_detail[0]->category_title."<b class='caret'></b></a>";
								
								echo "<ul aria-labelledby='drop".$drop."' role='menu' class='dropdown-menu'>";	
										foreach($header_category_detail as $header_sub_category)
										{
											//$active_subCategory = '';
											$active_subCategory = ($header_sub_category->sub_category_id == $this->uri->segment(3) ) ? 'active' : '';
											echo "<li role='presentation'><a href='".base_url()."product/category/".$header_sub_category->sub_category_id."' tabindex='-1' role='menuitem' class='".$active_subCategory."'>".$header_sub_category->subcategory_title."</a></li>";
										}
								
								echo "</ul>
									</li>";
								
								$drop++;
							
							}
							
							?>

                       <!-- <li class="dropdown">
                          <a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#" id="drop1"> Caftan <b class="caret"></b></a>
                          <ul aria-labelledby="drop1" role="menu" class="dropdown-menu">
                            <li role="presentation"><a href="http://twitter.com/fat" tabindex="-1" role="menuitem">Action</a></li>
                            <li role="presentation"><a href="http://twitter.com/fat" tabindex="-1" role="menuitem">Another action</a></li>
                            <li role="presentation"><a href="http://twitter.com/fat" tabindex="-1" role="menuitem">Something else here</a></li>
                            <li class="divider" role="presentation"></li>
                            <li role="presentation"><a href="http://twitter.com/fat" tabindex="-1" role="menuitem">Separated link</a></li>
                          </ul>
                        </li>
                            <li class="dropdown">
                              <a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop2" href="#">Tunics  <b class="caret"></b></a>
                              <ul aria-labelledby="drop2" role="menu" class="dropdown-menu">
                                <li role="presentation"><a href="http://twitter.com/fat" tabindex="-1" role="menuitem">Action</a></li>
                                <li role="presentation"><a href="http://twitter.com/fat" tabindex="-1" role="menuitem">Another action</a></li>
                                <li role="presentation"><a href="http://twitter.com/fat" tabindex="-1" role="menuitem">Something else here</a></li>
                                <li class="divider" role="presentation"></li>
                                <li role="presentation"><a href="http://twitter.com/fat" tabindex="-1" role="menuitem">Separated link</a></li>
                              </ul>
                            </li>
                            <li class="dropdown"><a data-toggle="dropdown" role="button" href="#">Skirts</a></li>
                            <li class="dropdown"><a data-toggle="dropdown" role="button" href="#">Scarfs</a></li>-->
                      </ul>
                    </div><!-- /.nav-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
            </div>
            <div class="col-sm-4">
            	<div class="cartbg">
                	<a href="<?php echo $this->config->item('base_url'); ?>user/cart"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/cart-icon.png" alt=""><span><span>Cart : <?php echo $total_cart_items; ?> item(s) </span>- $<?php echo $total_amount; ?></span></a>
                </div>
            </div>
            </div>
        </div>

<!-- session message -->  
<div class="fixed_div"></div>   
<?php
if($this->session->userdata('msg'))
{
	//echo '<span class="error_msg">'.$this->session->userdata('msg').'</span>';
	echo '<script> show_message_element("'.$this->session->userdata('msg').'"); </script>';
	$this->session->unset_userdata('msg');
}
?>

<!-- end session message -->



