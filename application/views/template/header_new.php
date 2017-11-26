<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?=isset($seoData) ? $seoData['title']:'Demoda Secrets | Nightwear, Mothercare & Ethnic Wear'?></title>
  <meta name="description" content="<?= isset($seoData) ? $seoData['description'] : 'Get widest collection of quality nighty, mothercare & ethnic wear at Demoda. Shop online for Sleepshirts, Nighties, Kurtis, Nightgowns & more.' ?>" />
  <meta name="author" content="demodasecrets.com" />
<?php 
$this->load->view('template/appAsset');
  // meta property for fb share
  if($this->router->fetch_class() == 'product' && $this->router->fetch_method() == 'description')
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

</head>

<!-- Body -->
<body>
  <div class="page-wrapper">
    <div class="modal fade" id="quickPreview" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-content">
          <div class="row">
            <div class="col-sm-7">
              <a href="#img01"><img src="img/product-gallery/01.jpg" alt="Thumb"></a>
            </div>
            <div class="col-sm-5">
              <div class="single-item-info">
                <div class="item-logo">
                  <img src="img/single-item-logo.png" alt="">
                </div>
                <div class="item-title">
                  OVERSIZED DRESS
                </div>
                <div class="item-sku">
                  Product Sku: 5110336
                </div>
                <div class="item-rating">
                  <img src="img/rating.png" alt="">
                  <span> (12 reviews)</span>
                </div>
                <div class="bages">
                  <span class="bage">Sale 50%</span>
                  <span class="bage bage-primary">New</span>
                </div>
                <div class="item-info">
                  Eternity bands are a classy and stylish innovation to storm the market. These are often gifted for a marriage anniversary or at the time of giving birth to a child.
                </div>
                <div class="radio-group color">
                  <div class="title">Choose Color</div>
                  <span class="selected" style="background-color: #cabeae;"></span>
                  <span style="background-color: #90b1db;"></span>
                  <span style="background-color: #000;"></span>
                </div>
                <div class="radio-group size">
                  <div class="title">Choose Size</div>
                  <span>XXL</span>
                  <span class="selected">XL</span>
                  <span>L</span>
                </div>
                <div class="cost">
                  $250 <span>$280</span>
                </div>
                <div class="action-tools">
                  <div class="select inline margin-bottom-none">
                    <select name="select">
                      <option>Qty 11</option>
                      <option>Qty 12</option>
                      <option>Qty 13</option>
                    </select>
                  </div>

                  <a href="#" class="btn btn-gray right-icon margin-bottom-none">Add To Cart <i class="material-icons shopping_cart"></i></a>

                  <a href="#" class="btn btn-gray btn-iconed margin-bottom-none"><i class="material-icons favorite_border"></i></a>
                </div>
                <div class="category">Woman / Bodysuit</div>

                <!-- Popular Tags -->
                <div class="widget tags-list-widget">
                  <div class="tags-list">
                    <a href="#">Clothes</a>
                    <a href="#">Boots</a>
                    <a href="#">Skirts</a>
                  </div>
                </div><!-- Popular Tags END -->

                <div class="social">
                  <div class="title">Share product</div>

                  <a href="#" class="btn btn-gray btn-iconed"><i class="socicon-instagram"></i></a>
                  <a href="#" class="btn btn-gray btn-iconed"><i class="socicon-facebook"></i></a>
                  <a href="#" class="btn btn-gray btn-iconed"><i class="socicon-pinterest"></i></a>
                  <a href="#" class="btn btn-gray btn-iconed"><i class="socicon-youtube"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div><!-- .modal-content -->
      </div><!-- .modal-dialog -->
    </div><!-- Modal END -->

    <div off-canvas="id-1 left push" class="off-canvas-cont">
      <div class="side-nav-tools">
        <a href="#">
          <i class="material-icons language"></i>
        </a>
        <a href="account-login.html">
          <i class="material-icons person"></i>
        </a>
        <a href="#">
          <i class="material-icons attach_money"></i>
        </a>

        <a href="#" class="offcanvas-toggle inner-toggle">
          <i class="material-icons close"></i>
        </a>
      </div>

      <div class="widget search margin-bottom-none">
        <i class="icon material-icons search"></i>
        <form name="search" method="post" action="<?php echo base_url(); ?>product/search">
                  <input type="text" name="keyword" value="<?php if($this->session->userdata('keyword')){ echo $this->session->userdata('keyword'); } ?>" placeholder="Search entire store here..." class="form-control input-sm">
                    <!-- <input type="image" class="" src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/search-btn.png"> -->
                </form>
        <input type="text" class="form-control input-sm" placeholder="Search Shop">
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
                          <a href="blog-grid.html"><?= $header_sub_category->subcategory_title ?></a>
                        </li>
                      <?php } ?>
                      </ul>
                    </li>
                  <?php } ?>
                  <!-- Main Navigation Level -->
            <li>
              <a href="<?= $this->config->item('site_url'); ?>" title="SALE">SALE</a>
            </li>
            <li>
              <a href="<?= $this->config->item('site_url'); ?>" title="BLOG">BLOG</a>
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
                <ul class="tools">
                  <li>
                    <a href="#">
                      <i class="material-icons person"></i>
                      <span class="hidden-md">My Account</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div><!-- Top Bar Section END -->
        

        <!-- Navbar Section -->
        <div class="navbar">
          <div class="container">
            <div class="navbar-inner">
              <div class="column">
                <!-- Main Navigation -->
                <ul class="main-nav">
                  <!-- Main Navigation Level -->
                  <li class="nav-item lvl-1 current">
                    <a href="<?= $this->config->item('site_url'); ?>" title="Home">Home</a>
                  </li><!-- Main Navigation Level END -->

                  <?php foreach ($category as $header_category_detail) { ?>
                    <li class="nav-item dropdown lvl-1">
                      <a href="#"><?=$header_category_detail[0]->category_title?></a>
                      <ul class="sub-menu">
                      <?php foreach ($header_category_detail as $header_sub_category) { ?>
                        <li class="nav-item lvl-2">
                          <a href="blog-grid.html"><?=$header_sub_category->subcategory_title ?></a>
                        </li>
                      <?php } ?>
                      </ul>
                    </li>
                  <?php } ?>
                  <!-- Main Navigation Level -->
                  <li class="nav-item lvl-1">
                    <a href="<?= $this->config->item('site_url'); ?>" title="Blog">Blog</a>
                  </li><!-- Main Navigation Level END -->
                  <!-- <li class="nav-item lvl-1 current">
                    <a href="<?= $this->config->item('site_url'); ?>" title="SALE">SALE</a>
                  </li> --><!-- Main Navigation Level END -->
                </ul>
              </div> 
              <div class="column text-center">
                <!-- Main Logo -->
                <a href="index.html" class="logo">
                  <img src="img/logo.png" alt="">
                </a><!-- Main Logo END -->
              </div>

              <!-- Header Tools -->
              <div class="column">
                <div class="header-tools text-right">
                  <div class="widget search">
                    <i class="icon material-icons search"></i>
                    <input type="text" class="form-control input-sm" placeholder="Search Shop">
                  </div>

                  <a href="account-wishlist.html" class="header-tools-link wishlist">
                    <i class="material-icons favorite"></i>
                  </a>

                  <!-- Cart dropdown element -->
                  <div class="cart-container dropdown">
                    <a href="#" class="header-tools-link cart-link">
                      <i class="material-icons shopping_cart"></i>
                      <span class="counter">24</span>
                    </a>

                    <div class="sub-menu">
                      <div class="widget cart-widget">
                        <div class="widget-title">
                          Latest Products
                        </div>

                        <ul class="cart-list">
                          <!-- Cart List Item -->
                          <li>
                            <a href="product-gallery-left.html" class="cart-thumb">
                              <img src="img/shop/cart-widget/01.jpg" alt="">
                            </a>

                            <div class="info-cont">
                              <a href="product-gallery-left.html" class="item-title">SUEDE-EFFECT JACKET</a>

                              <div class="category">
                                Skirts

                                <span class="cost">$ 140</span>
                              </div>
                            </div>
                          </li><!-- Cart List Item END -->

                          <!-- Cart List Item -->
                          <li>
                            <a href="product-gallery-left.html" class="cart-thumb">
                              <img src="img/shop/cart-widget/02.jpg" alt="">
                            </a>

                            <div class="info-cont">
                              <a href="product-gallery-left.html" class="item-title">SUEDE-EFFECT JACKET</a>

                              <div class="category">
                                Skirts

                                <span class="cost">$140</span>
                              </div>
                            </div>
                          </li><!-- Cart List Item END -->

                          <!-- Cart Total -->
                          <li>
                            <div class="total">
                              Total

                              <div class="cost">$80 0000</div>
                            </div>
                          </li><!-- Cart Total END -->
                        </ul>

                        <a href="shopping-cart.html" class="btn btn-default btn-block margin-right-none">Go to cart</a>
                        <a href="checkout-wizard.html" class="btn btn-default btn-block margin-right-none">Poceed to checkout</a>
                      </div>
                    </div>
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
            <a href="index.html" class="logo">
              <img src="img/logo.png" alt="">
            </a>

            <div class="mobile-tools">
              <!-- Wishlist Link -->
              <a href="account-wishlist.html" class="wishlist">
                <i class="material-icons favorite"></i>
              </a>

              <!-- Cart dropdown element -->
              <div class="cart-container">
                <a href="shopping-cart.html" class="cart-link">
                  <i class="material-icons shopping_cart"></i>
                  <span class="counter">24</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </header>
