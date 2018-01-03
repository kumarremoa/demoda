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
  <?=$this->load->view('//template//social_share')?>
<!-- Page Wrapper -->
<div class="page-wrapper">
   <div canvas="container">
      <main>
         <!-- breadcrumbs -->
         <div class="page-title">
            <div class="container">
               <div class="breadcrumbs">
                  <a href="<?php echo $this->config->item('site_url'); ?>">Home</a>
                  <span class="delimiter"><i class="material-icons keyboard_arrow_right"></i></span>
                  <a href="javascript:void(0)"><?php echo ucwords($product->parent_category_title); ?></a>
                  <span class="delimiter"><i class="material-icons keyboard_arrow_right"></i></span>
                  <a href="<?php echo base_url().'product/category/'.$product->sub_category_id; ?>"><?php echo ucwords($product->sub_category_title); ?></a>
                  <span class="delimiter"><i class="material-icons keyboard_arrow_right"></i></span>
                  <span><?=ucwords($product->title); ?></span>
               </div>
            </div>
         </div>
         <!-- breadcrumbs END -->
         <section class="fw-section margin-bottom-1x">
            <div class="container">
               <div class="row">
                  <div class="col-sm-7">

                     <div class="single-slider">
                        <div class="thumbnail-carousel" data-slick='{"dots": false,"vertical": true, "arrows": false}'>
                          <?php foreach ($product_details as $product_images) {
                            $large_image = $this->config->item('site_url').'admin/uploads/products/large/'.$product_images->file_name; ?>
                            <a href="javascript:void(0)"><img src="<?= $large_image ?>" alt="Thumb"></a>
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
                           <?=ucwords($product->sub_category_title);?>
                        </div>
                        <div class="item-sku">
                           Product Sku: <?=$product->product_code;?>
                        </div>
                        <!-- <div class="item-rating">
                           <img src="img/rating.png" alt="">
                           <span> (12 reviews)</span>
                        </div> -->
                         <form action="<?php echo base_url().'product/addToCart/'; ?>" method="post"> 
                            <input type="hidden" name="size" id="product_size" />
                            <input type="hidden" name="color" id="product_color" />
                            <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>" />
                        <?php if ($product->is_discount > 0) { 
                            $percent_dis = number_format(($product->discount_price/$product->price)*100, 2); 
                          ?>
                        <div class="bages">
                           <span class="bage"><?=$percent_dis.'%' ?></span>
                           <?=date_diff(date_create($product->created), date_create())->d < 10?'<span class="bage bage-primary">New</span>':''?>
                           <?=$product->is_featured ? '<span class="bage bage-success">Featured</span>' : ''?>
                           <?=$product->is_special ? '<span class="bage bage-warning">Special</span>' :''?>
                        </div>
                        <?php } ?>
                        <div class="item-info">
                           <?=$product->description ?>
                        </div>
                        <div class="radio-group color">
                           <div class="title">Choose Color</div>
                           <?php 
                            $available_color = explode('~',$product->color);
                            foreach ($available_color as $key => $value) { ?>
                              <span class="color" onclick="set_color('<?=$value?>');" id="<?='color_'.$value ?>" style="background-color: <?='#'.$value ?>"></span>
                          <?php } ?>
                        </div>
                        <div class="radio-group size">
                        <div class="title">Choose Size</div>
                        <?php 
                        $available_size = explode(',',$product->available_size);
                        foreach ($available_size as $key => $value) { ?>
                          <span class="size" onclick="set_size('<?=$value?>')" id="<?='size_'.$value?>"><?=$value?></span>
                        <?php } ?>
                        </div>
                        <div class="cost">
                           ₹<?= number_format($product->price - $product->discount_price, 2) ?> <span><?= $product->is_discount == 1 ? '₹'.number_format($product->price,2):''?></span>
                        </div>
                        <p class="free-shipping"><?php if($product->shipping_price == 0){ echo 'Free Shipping'; } else{ echo 'Shipping Price ₹'.$product->shipping_price; } ?></p>
                        <div class="action-tools">
                          <?php if ($product->quantity > 0) { ?>
                           <div class="select inline">
                              <select name="quantity">
                                 <?php
                                    for($i=1; $i<= $product->quantity; $i++)
                                    {
                                      echo '<option value="'.$i.'">'.$i.'</option>';  
                                    }
                                  ?>
                              </select>
                           </div>
                           <?php } else {
                                echo "<p>Out Of Stock.</p>";
                              } ?>
                          
                           <button class="btn btn-gray right-icon margin-bottom-none" type="submit" value="Add to cart" onclick="return validate_add_to_cart();">Add to Cart <i class="material-icons shopping_cart"></i></button>
                            <!-- wishlist link -->
                          <?php 
                            if($this->session->userdata('user_id'))
                            {
                                if(!in_array($product->product_id,$wishlist_product_ids))
                                    echo '<a href="'.base_url().'user/addToWishlist/'.$product->product_id.'" class="btn btn-gray btn-iconed margin-bottom-none"><i class="material-icons favorite_border"></i></a>';
                                else
                                    echo '<a href="'.base_url().'user/deleteWishlist/'.$product->product_id.'" class="btn btn-gray btn-iconed margin-bottom-none selected"><i class="material-icons favorite_border"></i></a>';
                            }
                        ?>
                                <!-- end wishlist link -->
                            <p class="dispatched">Product will be Dispatched in<br><strong><?php echo $product->time_to_deliver; ?> Working Days</strong></p>
                           <!-- <a href="#" class="btn btn-gray btn-iconed margin-bottom-none"><i class="material-icons compare_arrows"></i></a> -->
                        </div>
                        <!-- Popular Tags -->
                        <div class="widget tags-list-widget">
                           <div class="tags-list">
                              <a href="javascript:void(0)"><?php echo ucwords($product->parent_category_title); ?></a>
                              <a href="<?php echo base_url().'product/category/'.$product->sub_category_id; ?>"><?php echo ucwords($product->sub_category_title); ?></a>
                           </div>
                        </div>
                        <!-- Popular Tags END -->
                        <div class="social">
                           <div class="title">Share product</div>
                           
                           <?php 
                           $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                           $facebook_url = 'http://www.facebook.com/sharer.php?u='.$actual_link; 
                           $twitter_url = 'https://twitter.com/home?status='.$actual_link;
                           $google_plus_url = 'https://plus.google.com/share?url='.$actual_link;
                           $pinterest_url = 'http://pinterest.com/pin/create/button/?url='.$actual_link.'&description='.$product->title;

                           ?>

                           <a href="<?=$google_plus_url?>" target="_blank" title="share on google Plus" class="btn btn-gray btn-iconed"><i class="socicon-google"></i></a>
                           <a href="<?=$facebook_url?>" title="share on facebook" target="_blank" class="btn btn-gray btn-iconed"><i class="socicon-facebook"></i></a>
                           <a href="<?=$pinterest_url?>" title="share on pinterest" target="_blank" class="btn btn-gray btn-iconed"><i class="socicon-pinterest"></i></a>
                           <a href="<?=$twitter_url?>" title="share on twitter" class="btn btn-gray btn-iconed"><i class="socicon-twitter"></i></a>
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
                   if(strlen(strip_tags($product->specification)) != 0) { ?>
                     <li>
                        <a href="#tab2" role="tab" data-toggle="tab">
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
                   if(strlen(strip_tags($product->specification)) != 0) { ?>
                  <div role="tabpanel" class="tab-pane transition fade" id="tab2">
                    <p class="tab_matr">
                      <?php if(strlen(strip_tags($product->specification)) != 0) { echo $product->specification; } ?>
                    </p>
                  </div>
                  <?php } ?>
               </div>
               <!-- Tab Panes END -->
            </div>
         </section>
         <?php if (!empty($related_products)) { ?>
         <section class="fw-section margin-top-3x">
            <div class="container">
               <!-- Block Title -->
               <h2 class="block-title text-left margin-bottom-2x">
                  Related Products
               </h2>
               <!-- Block Title END -->
               <div class="row">
                <?php
              foreach($related_products as $productDetail)
              {
                $price = ($productDetail->is_discount == 1) ? '<span>₹'.$productDetail->price.'</span> ₹'.number_format($productDetail->price - $productDetail->discount_price , 2) : '₹'.$productDetail->price;
                  
                // thumbnail name
                $file_name = explode('.',$productDetail->file_name);                        
                $file_ext = array_pop($file_name);                        
                $thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;
                
                $product_image = $this->config->item('site_url').'admin/uploads/products/medium/'.$thumb_name; 
                ?>
                <div class="col-md-3">
                     <!-- Shop Grid Tile -->
                     <div class="tile">
                        <div class="preview-box medium-image">
                          <a title="<?=ucwords($productDetail->title)?>" href="<?= product_url($productDetail); ?>">
                            <img src="<?= $product_image ?>" alt="<?= ucwords($productDetail->title)?>">
                          </a>
                        </div>
                        <div class="tile-title">
                           <a title="<?=ucwords($productDetail->title)?>" href="<?= product_url($productDetail); ?>"><?= ucwords($productDetail->title) ?></a>
                        </div>
                        <div class="tile-meta">
                           <div class="meta-top">
                              <a title="<?=ucwords($productDetail->title)?>" href="<?= product_url($productDetail); ?>" class="category"><?=$productDetail->sub_category_title ?> </a>
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
         <?php } ?>
      </main>
   </div>
</div>
<!-- Page Wrapper END -->
