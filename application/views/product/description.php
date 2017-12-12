<?php
  $featured_image = '';
  $flag = 0;
  // echo "<pre>";
  // print_r($product_details);
  // die;
  foreach($product_details as $product_images)
  {
    if($product_images->is_featured == '1')
      $featured_image = $this->config->item('site_url').'admin/uploads/products/large/'.$product_images->file_name;
    
    $large_image[] = $this->config->item('site_url').'admin/uploads/products/large/'.$product_images->file_name;
    
    // thumbnail name
    $file_name = explode('.',$product_images->file_name);                       
    $file_ext = array_pop($file_name);                        
    $thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;
    
    $thumb_image[] = $this->config->item('site_url').'admin/uploads/products/small/'.$thumb_name;
    $medium_image[] = $this->config->item('site_url').'admin/uploads/products/medium/'.$thumb_name;
    
    // featured image
    /*if($featured_image != '' && $flag == 0)
    {
      echo '<img src="'.$featured_image.'" class="featured_image" alt=""/>';
      $flag = 1;
    }*/
    
     /* echo '<a href="'.$large_image.'" data-lightbox="example-set">
        <img src="'.$thumb_image.'" alt=""/>
      </a>';*/
  }
  
  $product = $product_details[0];
  /*
  for($i=0; $i<sizeof($large_image); $i++)
  {
     echo '<a href="'.$large_image[$i].'" data-lightbox="example-set">
        <img src="'.$thumb_image[$i].'" alt=""/>
      </a>';  
  } 
  */
  ?>
<!-- Preloader -->
<!--
   Data API:
   data-spinner - Options: 'spinner1', 'spinner2', 'spinner3', 'spinner4', 'spinner5', 'spinner6', 'spinner7'
   data-screenbg - Screen background color. Hex, RGB or RGBA colors
   -->
<div id="preloader" data-spinner="spinner2" data-screenbg="#fff"></div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      
    </div>
  </div>
</div>

<!-- Page Wrapper -->
<div class="page-wrapper">
   <div canvas="container">
      <main>
         <!-- Page Title -->
         <div class="page-title">
            <div class="container">
               <div class="breadcrumbs">
                  <a href="index.html">Home</a>
                  <span class="delimiter"><i class="material-icons keyboard_arrow_right"></i></span>
                  <span>Shop</span>
               </div>
               <div class="title pull-right">Oversized Dress</div>
            </div>
         </div>
         <!-- Page Title END -->
         <section class="fw-section margin-bottom-1x">
            <div class="container">
               <div class="row">
                  <div class="col-sm-7">

                     <div class="single-slider">
                        <div class="thumbnail-carousel" data-slick='{"dots": false,"vertical": true, "arrows": false}'>
                          <?php foreach ($product_details as $product_images) {
                            $large_image = $this->config->item('site_url').'admin/uploads/products/large/'.$product_images->file_name; ?>
                            <a href="#img01"><img src="<?= $large_image ?>" alt="Thumb"></a>
                          <?php } ?>
                        </div>
                        <div class="image-preview1" data-slick='{"dots": true, "arrows": false, "swipe": true}'>
                          <?php foreach ($product_details as $product_images) {
                            $large_image = $this->config->item('site_url').'admin/uploads/products/large/'.$product_images->file_name; ?>
                            <img src="<?= $large_image ?>" alt="Thumb">
                          <?php } ?>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-5">
                     <div class="single-item-info">
                        <div class="item-logo">
                           <h1><?php echo ucwords($product->title); ?></h1>
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
                           <?php 
                            $available_color = explode('~',$product->color);
                            foreach ($available_color as $key => $value) {
                              echo "<span style='background-color: #$value;'></span>";
                            }
                            ?>
                        </div>
                        <div class="radio-group size">
                        <div class="title">Choose Size</div>
                        <?php 
                        $available_size = explode(',',$product->available_size);
                        foreach ($available_size as $key => $value) {
                          echo "<span>$value</span>";
                        }
                         ?>
                        </div>
                        <div class="cost">
                           $<?= $product->price ?> <span><?= $product->is_discount == 1 ? '$'.$product->price - $product->discount_price : '' ?></span>
                        </div>
                        <div class="action-tools">
                           <div class="select inline">
                              <select name="select">
                                 <?php
                                    for($i=1; $i<= $product->quantity; $i++)
                                    {
                                      echo '<option value="'.$i.'">'.$i.'</option>';  
                                    }
                                  ?>
                              </select>
                           </div>
                           <a href="#" class="btn btn-gray right-icon margin-bottom-none">Add To Cart <i class="material-icons shopping_cart"></i></a>
                           <a href="#" class="btn btn-gray btn-iconed margin-bottom-none"><i class="material-icons favorite_border"></i></a>
                           <a href="#" class="btn btn-gray btn-iconed margin-bottom-none"><i class="material-icons compare_arrows"></i></a>
                        </div>
                        <div class="category">Woman / Bodysuit</div>
                        <!-- Popular Tags -->
                        <div class="widget tags-list-widget">
                           <div class="tags-list">
                              <a href="#">Clothes</a>
                              <a href="#">Boots</a>
                              <a href="#">Skirts</a>
                           </div>
                        </div>
                        <!-- Popular Tags END -->
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
            </div>
         </section>
         <section class="fw-section">
            <div class="container">
               <hr>
               <div class="text-center margin-bottom-2x">
                  <!-- Nav Tabs -->
                  <ul class="nav-tabs" role="tablist">
                  <?php if(strlen(strip_tags($product->description)) != 0) { ?>
                     <li class="active">
                        <a href="#tab1" role="tab" data-toggle="tab">
                        Description
                        </a>
                     </li>
                  <?php } 
                   if(strlen(strip_tags($product->overview)) != 0) { ?> 
                     <li>
                        <a href="#tab2" role="tab" data-toggle="tab">
                        Product Overview
                        </a>
                     </li>
                  <?php } 
                   if(strlen(strip_tags($product->specification)) != 0) { ?>
                     <li>
                        <a href="#tab3" role="tab" data-toggle="tab">
                        Specification
                        </a>
                     </li>
                  <?php } ?>
                  </ul>
                  <!-- Nav Tabs END -->
               </div>
               <!-- Tab Panes -->
               <div class="tab-content">
               <?php if(strlen(strip_tags($product->description)) != 0) { ?>
                  <div role="tabpanel" class="tab-pane transition fade in active" id="tab1">
                      <p class="tab_matr">
                        <?php if(strlen(strip_tags($product->description)) != 0) { echo $product->description; } ?>
                      </p>
                  </div>
                  <?php } 
                   if(strlen(strip_tags($product->overview)) != 0) { ?> 
                  <div role="tabpanel" class="tab-pane transition fade" id="tab2">
                    <p class="tab_matr">
                      <?php if(strlen(strip_tags($product->overview)) != 0) { echo $product->overview; } ?>
                    </p>
                  </div>
                  <?php } 
                   if(strlen(strip_tags($product->specification)) != 0) { ?>
                  <div role="tabpanel" class="tab-pane transition fade" id="tab3">
                    <p class="tab_matr">
                      <?php if(strlen(strip_tags($product->specification)) != 0) { echo $product->specification; } ?>
                    </p>
                  </div>
                  <?php } ?>
               </div>
               <!-- Tab Panes END -->
            </div>
         </section>
         <section class="fw-section margin-top-3x">
            <div class="container">
               <!-- Block Title -->
               <h2 class="block-title text-left margin-bottom-2x">
                  Related Products
                  <small>b-shop</small>
               </h2>
               <!-- Block Title END -->
               <div class="row">
                <?php
              foreach($related_products as $productDetail)
              {
                $price = ($productDetail->is_discount == 1) ? '<span>$'.$productDetail->price.'</span> $'.number_format($productDetail->price - $productDetail->discount_price , 2) : '$'.$productDetail->price;
                  
                // thumbnail name
                $file_name = explode('.',$productDetail->file_name);                        
                $file_ext = array_pop($file_name);                        
                $thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;
                
                $product_image = $this->config->item('site_url').'admin/uploads/products/medium/'.$thumb_name; 
                ?>
                <div class="col-md-3">
                     <!-- Shop Grid Tile -->
                     <div class="tile">
                        <div class="preview-box">
                           <img src="<?= $product_image ?>" alt="">
                        </div>
                        <div class="tile-title">
                           <a href="<?php echo base_url().'product/description/'.$productDetail->product_id; ?>"><?= ucwords($productDetail->title) ?></a>
                        </div>
                        <div class="tile-meta">
                           <div class="meta-top">
                              <a href="#" class="category"> </a>
                              <span class="cost"><?= $price ?></span>
                           </div>
                        </div>
                     </div>
                     <!-- Shop Grid Tile END -->
                  </div>

                <?php }?>
               </div>
            </div>
         </section>
      </main>
   </div>
</div>
<!-- Page Wrapper END -->
