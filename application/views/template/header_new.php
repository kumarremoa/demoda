<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?=isset($seoData) ? $seoData['title']:'Demoda Secrets | Nightwear, Mothercare & Ethnic Wear'?></title>
  <meta name="description" content="<?= isset($seoData) ? $seoData['description'] : 'Get widest collection of quality nighty, mothercare & ethnic wear at Demoda. Shop online for Sleepshirts, Nighties, Kurtis, Nightgowns & more.' ?>" />
  <meta name="author" content="demodasecrets.com" />
<?php 
  $this->load->view('template/appAsset');
  $this->load->view('template/_url_rewrite');
  // meta property for fb share
  if($this->router->fetch_class() == 'product' && $this->router->fetch_method() == 'description' && !empty($product_details))
  {
    // echo '<pre>'; print_r($product_details); echo '</pre>'; 
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
<?php $category_created = array();
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
              }
          ?>
  <!--Mobile Specific Meta Tag-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <!-- <link rel="icon" href="<?php echo $this->config->item('css_images_js_base_url'); ?>images/favicon.ico" type="image/x-icon" /> -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <!--Favicon-->
  <!-- <link rel="shortcut icon" href="favicon.png" type="image/x-icon"> -->
  <!-- <link rel="icon" href="favicon.png" type="image/x-icon"> -->
  <link rel="icon" href="<?= $this->config->item('css_images_js_base_url'); ?>images/favicon.ico" type="image/x-icon" />
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
</head>

<!-- Body -->
<body>
  <div class="page-wrapper">
    
  <?=$this->load->view('//template/modal_fade',[
      'title' => '',
      'price' => '',

  ])?>

    <div off-canvas="id-1 left push" class="off-canvas-cont">
      <div class="side-nav-tools">
        <?php if(!$this->session->userdata('user_id')){ ?>
        <a href="<?=base_url().'user/signin'?>">
          <i class="material-icons person"></i>Login
        </a>
        <?php } else { ?>
        <a href="<?=base_url().'user/account'?>">
          <i class="material-icons person"></i>My Account
        </a>
        <?php } ?>
        <a href="#" class="offcanvas-toggle inner-toggle">
          <i class="material-icons close"></i>
        </a>
      </div>

      <div class="widget search margin-bottom-none">
        <i class="icon material-icons search"></i>
        <form name="search" method="post" action="<?php echo base_url(); ?>product/search">
                  <input type="text" name="keyword" value="<?php if($this->session->userdata('keyword')){ echo $this->session->userdata('keyword'); } ?>" placeholder="Search entire store here..." class="form-control input-sm">
                </form>
      </div>

      <nav class="offcanvas-navigation" role="navigation" data-back-btn-text="Back">
        <div class="menu-site-menu-container">
          <ul class="menu">
            <li>
              <a href="<?= $this->config->item('site_url'); ?>" title="Home">Home</a>
            </li>
            <?php foreach ($category as $header_category_detail) { ?>
                    <li class="menu-item-has-children">
                      <a href="#"><?=$header_category_detail[0]->category_title?></a>
                      <ul class="sub-menu">
                      <?php foreach ($header_category_detail as $header_sub_category) { ?>
                        <li>
                        <a href="<?=base_url()."product/category/".$header_sub_category->sub_cat_link_rewrite?>"><?=$header_sub_category->subcategory_title ?></a>
                        </li>
                      <?php } ?>
                      </ul>
                    </li>
                  <?php } ?>
                  <!-- Main Navigation Level -->
            <!-- <li>
              <a href="<?= $this->config->item('site_url'); ?>" title="SALE">SALE</a>
            </li> -->
            <li>
              <a href="<?= base_url().'blog'; ?>" title="BLOG">BLOG</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>

    <div canvas="container">
      <!-- Backdrop for Canvas -->
      <div class="backdrop offcanvas-toggle"></div>
      <header class="header">

        <!-- Top Bar Section -->
        <div class="top-bar">
          <div class="container">
            <div class="row">
              <div class="col-sm-4">
                <span class="text-primary">Demoda Secrets | Sleep in style <i class="material-icons info_outline"></i></span>
              </div>
              <div class="col-sm-4 text-center">
                <a href="https://www.instagram.com/demodasecrets/" class="social socicon-instagram"></a>
                <a href="https://www.facebook.com/demodasecrets/" class="social socicon-facebook"></a>
                <a href="https://twitter.com/demodasecrets" class="social socicon-twitter"></a>
              </div>
              <div class="col-sm-4 text-right">
                <?php if($this->session->userdata('user_id')){ ?>
                <ul class="tools">
                  <li class="dropdown">
                    <a href="<?php echo base_url(); ?>user/account" <?php if($this->router->fetch_method() == 'account'){ echo 'class="active"'; } ?>>
                      <span class="hidden-md">My Account</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url(); ?>user/account" <?php if($this->router->fetch_method() == 'account'){ echo 'class="active"'; } ?>>My Account</a></li>
                        <li><a href="<?php echo base_url(); ?>user/wishlist" <?php if($this->router->fetch_method() == 'wishlist'){ echo 'class="active"'; } ?>>Wishlist</a></li>
                        <li><a href="<?php echo base_url(); ?>user/orders" <?php if($this->router->fetch_method() == 'orders'){ echo 'class="active"'; } ?>>Orders</a></li>
                        <li><a href="<?php echo base_url(); ?>user/cart" <?php if($this->router->fetch_method() == 'cart'){ echo 'class="active"'; } ?>>Cart</a></li>
                        <li><a href="<?php echo base_url(); ?>user/checkout/" <?php if($this->router->fetch_method() == 'checkout'){ echo 'class="active"'; } ?>>Checkout</a></li>
                        <li><a href="<?php echo base_url(); ?>user/logout">Logout</a></li>
                    </ul>
                  </li>
                </ul>
                <?php } ?>
                <div class="clearfix"></div>
                <?php if(!$this->session->userdata('user_id')){ ?>
                    <ul class="tools">
                        <li><a href="<?php echo base_url(); ?>user/signup" <?php if($this->router->fetch_method() == 'signup'){ echo 'class="active"'; } ?>>Create Account</a></li>
                        <li><a href="<?php echo base_url(); ?>user/signin" <?php if($this->router->fetch_method() == 'signin'){ echo 'class="active"'; } ?>>Login</a></li>
                    </ul>
                    <?php }?>                    
                    <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div><!-- Top Bar Section END -->
        

        <!-- Navbar Section -->
        <div class="navbar mega-menu-container">
          <div class="container">
            <div class="navbar-inner">
              <div class="column">
                <!-- Main Navigation -->
                <ul class="main-nav">
                  <!-- Main Navigation Level -->
                  <li class="nav-item lvl-1 current">
                    <a href="<?= $this->config->item('site_url'); ?>" title="Home">Home</a>
                  </li><!-- Main Navigation Level END -->

                  <?php //echo"<pre>";print_r($category)
                  foreach ($category as $header_category_detail) { ?>
                    <li class="nav-item dropdown lvl-1">
                      <a href="#"><?=$header_category_detail[0]->category_title?></a>
                      <ul class="sub-menu">
                      <?php foreach ($header_category_detail as $header_sub_category) { ?>
                        <li class="nav-item lvl-2">
                          <a href="<?=base_url()."product/category/".$header_sub_category->sub_cat_link_rewrite?>"><?=$header_sub_category->subcategory_title ?></a>
                        </li>
                      <?php } ?>
                      </ul>
                    </li>
                  <?php } ?>
                  <!-- Main Navigation Level -->
                  <li class="nav-item lvl-1">
                    <a href="<?= base_url().'blog' ?>" title="Blog">Blog</a>
                  </li><!-- Main Navigation Level END -->
                  <!-- <li class="nav-item lvl-1 current">
                    <a href="<?= $this->config->item('site_url'); ?>" title="SALE">SALE</a>
                  </li> --><!-- Main Navigation Level END -->
                </ul>
              </div> 
              <div class="column text-center">
                <!-- Main Logo -->
                <a href="<?=base_url()?>" class="logo">
                  <img src="img/logo.png" alt="">
                </a><!-- Main Logo END -->
              </div>

              <!-- Header Tools -->
              <div class="column">
                <div class="header-tools text-right">
                  <div class="widget search">
                    <i class="icon material-icons search"></i>
                     <form name="search" method="post" action="<?php echo base_url(); ?>product/search">
                        <input type="text" name="keyword" value="<?php if($this->session->userdata('keyword')){ echo $this->session->userdata('keyword'); } ?>" placeholder="Search entire store here..." class="form-control input-sm">
                        </form>
                  </div>
                  <?php if($this->session->userdata('user_id')){ ?>
                  <a href="<?=base_url().'user/wishlist'?>" class="header-tools-link wishlist">
                    <i class="material-icons favorite"></i>
                  </a>
                  <?php } ?>

                  <!-- Cart dropdown element -->
                  <div class="cart-container">
                    <a href="<?=base_url().'user/cart'?>" class="header-tools-link cart-link">
                      <i class="material-icons shopping_cart"></i>
                      <span class="counter"><?=$total_cart_items?></span>
                    </a>
                  </div><!-- Cart dropdown element END -->
                </div>
              </div><!-- Header Tools END -->
            </div>
          </div>
        </div><!-- Navbar Section END -->

        <!-- Mobile Tools -->
        <div class="mobile-view">
          <div class="container">
            <!-- OffCanvas Toggle -->
            <a href="#" class="offcanvas-toggle">
              <i class="material-icons menu"></i>
            </a>

            <!-- Mobile View Logo -->
            <a href="<?=base_url()?>" class="logo">
              <img src="img/logo.png" alt="">
            </a>

            <div class="mobile-tools">
              <!-- Wishlist Link -->
              <?php if($this->session->userdata('user_id')){ ?>
              <a href="<?=base_url().'user/wishlist'?>" class="wishlist">
                <i class="material-icons favorite"></i>
              </a>
              <?php } ?>
              <!-- Cart dropdown element -->
              <div class="cart-container">
                <a href="<?=base_url().'user/cart'?>" class="cart-link">
                  <i class="material-icons shopping_cart"></i>
                  <span class="counter"><?=$total_cart_items?></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </header>