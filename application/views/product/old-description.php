<!-- social media share -->
<!--<script src="<?php echo $this->config->item('css_images_js_base_url'); ?>social_share/jquery.min.js" type="text/javascript" language="JavaScript"></script>-->
<script src="<?php echo $this->config->item('css_images_js_base_url'); ?>social_share/jquery.share.js" type="text/javascript" language="JavaScript"></script>
<link rel="stylesheet" href="<?php echo $this->config->item('css_images_js_base_url'); ?>social_share/jquery.share.css" type="text/css" />
<script>
//$s = $.noConflict();
$(document).ready(function($){
 $('#mydiv').share({
        networks: ['facebook','twitter'],
        theme: 'square'
    });
  });
</script>
<!-- end social media share -->


<!-- Include Cloud Zoom CSS. -->
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('css_images_js_base_url'); ?>css/cloudzoom.css" />

<!-- Include Cloud Zoom script. -->
<script type="text/javascript" src="<?php echo $this->config->item('css_images_js_base_url'); ?>js/cloudzoom.js"></script>

<!-- Call quick start function. -->
<script type="text/javascript">            
	CloudZoom.quickStart();			
</script>

<?php
	$featured_image = '';
	$flag = 0;
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

<ol class="breadcrumb">
    <li><a href="<?php echo $this->config->item('site_url'); ?>">Home</a></li>
    <li><a href="javascript:void(0)"><?php echo ucwords($product->parent_category_title); ?></a></li>
    <li class="active"><a href="<?php echo base_url().'product/category/'.$product->sub_category_id; ?>"><?php echo ucwords($product->sub_category_title); ?></a></li>
</ol>

<!-- inner page content -->
<div class="main-contnt">
        	<div class="row">
            	<div class="col-sm-5">
                	<div class="zoom-effect">
                    <?php
					// featured image
					if($featured_image != '')
					{
						//echo '<img src="'.$featured_image.'" class="featured_image" alt=""/>';	
						echo '<img class = "cloudzoom featured_image" src = "'.$featured_image.'" data-cloudzoom = "zoomImage: \''.$featured_image.'\',zoomPosition:\'inside\', zoomOffsetX:0 " />';					
					}
					
					
					for($i=0; $i<sizeof($large_image); $i++)
					{
						 /*echo '<a href="'.$large_image[$i].'">
								<img src="'.$thumb_image[$i].'" alt=""/>
							</a>';*/
						echo '<img class = \'cloudzoom-gallery\' src = "'.$thumb_image[$i].'" data-cloudzoom = "useZoom: \'.cloudzoom\', image: \''.$medium_image[$i].'\', zoomImage: \''.$large_image[$i].'\' " >';
					}	
					
					?>
                    <!--
                     <img class = "cloudzoom" src = "images/small/image1.jpg" data-cloudzoom = "zoomImage: 'images/large/image1.jpg',zoomPosition:'inside', zoomOffsetX:0 " />
        <br/>
        <img class = 'cloudzoom-gallery' src = "images/thumbs/image1.jpg" data-cloudzoom = "useZoom: '.cloudzoom', image: 'images/small/image1.jpg', zoomImage: 'images/large/image1.jpg' " >
        <img class = 'cloudzoom-gallery' src = "images/thumbs/image2.jpg" data-cloudzoom = "useZoom: '.cloudzoom', image: 'images/small/image2.jpg', zoomImage: 'images/large/image2.jpg' " >
        <img class = 'cloudzoom-gallery' src = "images/thumbs/image3.jpg" data-cloudzoom = "useZoom: '.cloudzoom', image: 'images/small/image3.jpg', zoomImage: 'images/large/image3.jpg' " >
        -->
        
                    	<!--<img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/zoom-effect.jpg" alt="">
                        <a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/zoom-thumb.jpg" alt=""></a>
                        <a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/zoom-thumb.jpg" alt=""></a>
                        <a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/zoom-thumb.jpg" alt=""></a>
                        <a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/zoom-thumb.jpg" alt=""></a>-->
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-sm-7">
                	<div class="product-details">
                    	<div class="row">
                    	<div class="col-md-7">
                        	<h1><?php echo ucwords($product->title); ?></h1>
                            <p> <?php if(strlen(strip_tags($product->description)) != 0) { echo substr($product->description,0,35).'...'; } ?></p>
                            <div class="review"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/review-img.jpg" alt=""><a href="#">See 157 reviews </a></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-5">
                        	<a href="#" class="prz">
							<?php 
								$price = ($product->is_discount == 1) ? '<span style="text-decoration:line-through; padding:13px 40px 0px;">$'.$product->price.'</span> $'.number_format($product->price - $product->discount_price , 2) : '$'.$product->price;
								echo $price;
								//echo $product->price; 
							?></a>
                        </div>
                    </div>
                    	<div class="btm-bdr"></div>
                        <form action="<?php echo base_url().'product/addToCart/'; ?>" method="post">
                        <div class="row">
                        	<div class="col-md-7">
                            	<span>Available Color -</span>
                                <div class="colour">
                                
                               		 <?php
										$available_color = explode('~',$product->color);
										
										for($i=0; $i<sizeof($available_color)-1; $i++)
										{
											echo '<a href="javascript:void(0);" onclick="set_color(\''.$available_color[$i].'\')" id="color_'.$available_color[$i].'"><span style="background:#'.$available_color[$i].'">'.$available_color[$i].'</span></a>';
										}
									?>
                                
                                 </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-5"><p class="free-shipping"><?php if($product->shipping_price == 0){ echo 'Free Shipping'; } else{ echo 'Shipping Price $'.$product->shipping_price; } ?></p></div>
                        </div>
                        <div class="bottom_bdr"></div>
                        <div class="row">
                        	<div class="col-md-6">
                            	<span>Available Size -</span>
                                <div class="size">
                                	<?php
										$available_size = explode(',',$product->available_size);
										
										for($i=0; $i<sizeof($available_size); $i++)
										{
											echo '<a href="javascript:void(0);" onclick="set_size(\''.$available_size[$i].'\')" id="size_'.$available_size[$i].'">'.$available_size[$i].'</a>';
										}
									?>
                                	<!--<a href="#">S</a><a href="#">m</a><a href="#">l</a><a href="#">xl</a>-->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-6">
                            
                            <?php
								if($product->quantity > 0)
								{
							?>
                            	<label> Qty :</label>
                            	<select name="quantity" >
                                <?php
									for($i=1; $i<= $product->quantity; $i++)
									{
										echo '<option value="'.$i.'">'.$i.'</option>';	
									}
								?>			
								</select>
                                <?php 
								}
								else
								{
									echo '<p class="free-shipping">Out Of Stock</p>';	
								}
								 ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="bottom_bdr"></div>
                    	<div class="cartsec">
                        	
                            	<input type="hidden" name="size" id="product_size" />
                                <input type="hidden" name="color" id="product_color" />
                                <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>" />
                        		<!--<a class="cartbtn" href="<?php echo base_url().'product/addToCart/'.$product->product_id; ?>"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/cartbtn.png" alt="">Add to cart</a>-->
                            	<a class="cartbtn" href="javascript:void(0);"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/cartbtn.png" alt=""><input type="submit" value="Add to cart" onclick="return validate_add_to_cart();" /></a>
                           		
                             <!-- wishlist link -->
								<?php 
                                    if($this->session->userdata('user_id'))
                                    {
                                        if(!in_array($product->product_id,$wishlist_product_ids))
                                            echo '<a href="'.base_url().'user/addToWishlist/'.$product->product_id.'" class="wishlist"><img src="'.$this->config->item('css_images_js_base_url').'images/wishlist.png" alt="">Add to wishlist</a>';
                                        else
                                            echo '<a href="'.base_url().'user/deleteWishlist/'.$product->product_id.'" class="wishlist"><img src="'.$this->config->item('css_images_js_base_url').'images/wishlist.png" alt="">Delete wishlist</a>';
                                    }
                                ?>
                                <!-- end wishlist link -->
                            <p class="dispatched">Product will be Dispatched in<br><strong><?php echo $product->time_to_deliver; ?> Working Days</strong></p>
                        </div>
                        <div class="bottom_bdr"></div>
                         </form>
                        <div class="mgtop35">
                        	<div class="bs-example bs-example-tabs">
                          <ul id="myTab" class="nav nav-tabs mgleft0 tabbutn">
                            <li class="active"><a href="#desctription" data-toggle="tab">DESCRIPTION</a></li>
                            <li class=""><a href="#product_overview" data-toggle="tab">PRODUCT OVERVIEW</a></li>
                            <li class=""><a href="#specification" data-toggle="tab">SPECIFICATION</a></li>
                          </ul>
                          <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade in active" id="desctription">
                              <h2 class="tab_title">Description</h2>	
                              <p class="tab_matr">
                              	<?php if(strlen(strip_tags($product->description)) != 0) { echo $product->description; } ?>
                              </p>
                            </div>
                            <div class="tab-pane fade" id="product_overview">
                              <h2 class="tab_title">Product Overview</h2>	
                              <p class="tab_matr">
                              	<?php if(strlen(strip_tags($product->overview)) != 0) { echo $product->overview; } ?>
                              </p>
                            </div>
                            <div class="tab-pane fade" id="specification">
                              <h2 class="tab_title">Specification</h2>	
                              <p class="tab_matr">
                              	<?php if(strlen(strip_tags($product->specification)) != 0) { echo $product->specification; } ?>
                              </p>
                            </div>
                          </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        	<?php
				if(sizeof($related_products) > 0)
				{
			?>

            <div class="row">
            	<div class="col-sm-12">
                	<div class="prodct_section">
                    	<div class="product-row">
                    	<h2>Related Products</h2>
                        <div class="clearfix"></div>
                    </div>
                    	<div class="row">
                        
                        <?php
							foreach($related_products as $productDetail)
							{
								//$price = '$'.$productDetail->price;
								$price = ($productDetail->is_discount == 1) ? '<span>$'.$productDetail->price.'</span> $'.number_format($productDetail->price - $productDetail->discount_price , 2) : '$'.$productDetail->price;
									
								// thumbnail name
								$file_name = explode('.',$productDetail->file_name);												
								$file_ext = array_pop($file_name);												
								$thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;
								
								$product_image = $this->config->item('site_url').'admin/uploads/products/medium/'.$thumb_name;
						
							   echo '<div class="col-sm-3">
										<div class="product-box">
											<a href="'.base_url().'product/description/'.$productDetail->product_id.'"><img src="'.$product_image.'" alt=""></a>
											<div class="pro_details">
												<div class="price"><!--<span>$80.00</span>--> '.$price.' </div>
												<p>'.ucwords($productDetail->title).'<!--<br />
												<span>Item no.: '.$productDetail->product_code.'</span>--></p>
												<span><img src="'.$this->config->item('css_images_js_base_url').'images/star.png" alt=""></span>
											</div>
										</div>
									</div>';
							}
						?>
                                                
                    </div>
                    </div>
                </div>
            </div>
            <?php
				} // end if(sizeof($related_products) > 0)
				?>
        </div>
<!-- end inner page content -->