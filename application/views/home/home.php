<!-- home slider -->
<?php /*
<script type="text/javascript" src="<?php echo $this->config->item('css_images_js_base_url'); ?>js/home_slider/jssor.core.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('css_images_js_base_url'); ?>js/home_slider/jssor.utils.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('css_images_js_base_url'); ?>js/home_slider/jssor.slider.js"></script>
<script>

	jQuery(document).ready(function ($) {

		var _SlideshowTransitions = [
		//Fade
		{ $Duration: 1200, $Opacity: 2 }
		];

		var options = {
			$AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
			$AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
			$AutoPlayInterval: 3000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
			$PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 1

			$ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
			$SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
			$MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
			//$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
			//$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
			$SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
			$DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
			$ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
			$UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
			$PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, default value is 1
			$DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

			$SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
				$Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
				$Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
				$TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
				$ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
			},

			$BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
				$Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
				$ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
				$AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
				$Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
				$Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
				$SpacingX: 10,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
				$SpacingY: 10,                                   //[Optional] Vertical space between each item in pixel, default value is 0
				$Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
			},

			$ArrowNavigatorOptions: {
				$Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
				$ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
				$Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
			}
		};
		var jssor_slider1 = new $JssorSlider$("slider1_container", options);

		//responsive code begin
		//you can remove responsive code if you don't want the slider scales while window resizes
		function ScaleSlider() {
			var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
			if (parentWidth)
				jssor_slider1.$SetScaleWidth(Math.min(parentWidth, 1140));
			else
				window.setTimeout(ScaleSlider, 30);
		}

		ScaleSlider();

		if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
			$(window).bind('resize', ScaleSlider);
		}

	});
</script>

<style>

	.jssora12l, .jssora12r, .jssora12ldn, .jssora12rdn {
		position: absolute;
		cursor: pointer;
		display: block;
		background: url('<?php echo $this->config->item('css_images_js_base_url'); ?>images/a12.png') no-repeat;
		overflow: hidden;
	}
	.jssora12l { background-position: -16px -37px; }
	.jssora12r { background-position: -75px -37px;}
	.jssora12l:hover { background-position: -136px -37px; }
	.jssora12r:hover { background-position: -195px -37px; }

	.jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
		background: url(<?php echo $this->config->item('css_images_js_base_url'); ?>images/b05.png) no-repeat;
	}
	.jssorb05 div {
		background-position: -7px -7px;
	}

		.jssorb05 div:hover, .jssorb05 .av:hover {
			background-position: -37px -7px;
		}

	.jssorb05 .av {
		background-position: -67px -7px;
	}

	.jssorb05 .dn, .jssorb05 .dn:hover {
		background-position: -97px -7px;
	}

	#slider1_container.home_slider{ border:1px solid #ddd; margin-top:15px;}
	.home_slider div{margin:0 !important; padding:0 !important;}

</style>
<!-- end home slider -->

<!-- Owl Carousel Assets -->
	
<!-- end Owl Carousel Assets -->
		
        <!-- Jssor Slider Begin -->   
    <!-- You can move inline styles (except 'top', 'left', 'width' and 'height') to css file or css block. -->
    <div id="slider1_container" class="home_slider" style="position: relative; top: 5px; left: 0px; width: 1000px; height: 350px; overflow: hidden; ">       
      
        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1000px; height: 350px; overflow: hidden; margin:6px;">
            <?php 
					foreach($slider_images as $slider)
					{
						 echo '<div>
							<img u="image" src="'.$this->config->item('site_url').'admin/uploads/banner/large/'.$slider->image.'" />
						</div>';
					}
			?>
        </div>
        
       <!-- bullet navigator container -->
        <div u="navigator" class="jssorb05" style="position: absolute; bottom: -6px; right: 6px;">          
            <div u="prototype" style="POSITION: absolute; WIDTH: 23px; HEIGHT: 30px;"></div>
        </div>
        <!-- Bullet Navigator Skin End -->
       
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora12l" style="width: 30px; height: 46px; top: 175px; left: 0px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora12r" style="width: 30px; height: 46px; top: 175px; right: 0px">
        </span>
    </div>
    <!-- Jssor Slider End -->
	
 		<!--<div class="slider_section">
        	<img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/slider-1.png" alt="">
        </div>-->
        <div class="box3">
        	<div class="row">
        	<div class="col-sm-4">
            	<img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/box-img1.jpg" alt="">
            </div>
            <div class="col-sm-4">
            	<img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/box-img1.jpg" alt="">
            </div>
            <div class="col-sm-4">
            	<img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/box-img1.jpg" alt="">
            </div>
        </div>
        </div>
        
        
        <div class="main-contnt">
        	<div class="row">
            
            	<!-- sidebar -->
            	<?php $this->load->view('template/sidebar',$header_categories); ?>
            	<!-- end sidebar -->
            
                <div class="col-sm-9">
                	<div class="prodct_section">
                    	<div class="product-row">
                    	<h2>New Arrivals</h2>
                       <!-- <div class="sarow">
                        	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/larow.png" alt=""></a>
                            <a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/rarow.png" alt=""></a>
                        </div>-->
                        <div class="clearfix"></div>
                    </div>                        
            
                    	<div class="row">
                        <div id="owl-demo" class="owl-carousel">
                        <?php
							$i = 1;
							foreach($productDetails as $productDetail)
							{
								//echo '<pre>'; print_r($productDetail); echo '</pre>';
								$box_number = ($i%4 == 0) ? 4 : 1;
								$i++;
								
								//$price = '$'.$productDetail->price;
								$price = ($productDetail->is_discount == 1) ? '<span>$'.$productDetail->price.'</span> $'.number_format($productDetail->price - $productDetail->discount_price , 2) : '$'.$productDetail->price;
								
								// thumbnail name
								$file_name = explode('.',$productDetail->file_name);												
								$file_ext = array_pop($file_name);												
								$thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;
								
								$product_image = $this->config->item('site_url').'admin/uploads/products/medium/'.$thumb_name;
								//$product_image = $this->config->item('site_url').'admin/uploads/products/large/'.$productDetail->file_name;
								
								echo '<div class="col-sm-12">
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
                                                  
                       	                       
                            
                       <!-- <div class="col-sm-12">
                                <div class="product-box">
                                    <a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                                    <div class="pro_details">
                                        <div class="price"><span>$80.00</span> $70.00 </div>
                                        <p>Primis in faucibus</p>
                                        <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                    </div>
                                </div>
                            </div>
                           	<div class="col-sm-12">
                        	<div class="product-box">
                            	<a href="#" class="new-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/new-pro.png" alt=""></a>
                                <a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>
                        	<div class="col-sm-12">
                        	<div class="product-box">
                            	<a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>
    	                    <div class="col-sm-12">
                                <div class="product-box">
                                    <a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                                    <div class="pro_details">
                                        <div class="price"><span>$80.00</span> $70.00 </div>
                                        <p>Primis in faucibus</p>
                                        <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                    </div>
                                </div>
                            </div>
	                      	<div class="col-sm-12">
                        	<div class="product-box">
                            	<a href="#" class="new-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/new-pro.png" alt=""></a>
                                <a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>
                        	<div class="col-sm-12">
                        	<div class="product-box">
                            	<a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>
	                        <div class="col-sm-12">
                                <div class="product-box">
                                    <a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                                    <div class="pro_details">
                                        <div class="price"><span>$80.00</span> $70.00 </div>
                                        <p>Primis in faucibus</p>
                                        <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                    </div>
                                </div>
                            </div>
                           	<div class="col-sm-12">
                        	<div class="product-box">
                            	<a href="#" class="new-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/new-pro.png" alt=""></a>
                                <a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>
                        	<div class="col-sm-12">
                        	<div class="product-box">
                            	<a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>
    	                    <div class="col-sm-12">
                                <div class="product-box">
                                    <a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                                    <div class="pro_details">
                                        <div class="price"><span>$80.00</span> $70.00 </div>
                                        <p>Primis in faucibus</p>
                                        <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                    </div>
                                </div>
                            </div>
	                      	<div class="col-sm-12">
                        	<div class="product-box">
                            	<a href="#" class="new-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/new-pro.png" alt=""></a>
                                <a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>
                        	<div class="col-sm-12">
                        	<div class="product-box">
                            	<a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>-->
            
                          </div><!-- owl slider -->
   						 
                        
                    <!--<div class="col-sm-4">
                        	<div class="product-box">
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                        	<div class="product-box">
                            	<a href="#" class="new-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/new-pro.png" alt=""></a>
                                <a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                        	<div class="product-box">
                            	<a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>-->
                        
                    </div>
                    </div>
                    <div class="prodct_section">
                    	<div class="product-row">
                    	<h2>Featured Products</h2>
                        <!--<div class="sarow">
                        	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/larow.png" alt=""></a>
                            <a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/rarow.png" alt=""></a>
                        </div>-->
                        <div class="clearfix"></div>
                    </div>
                    
                    	<div class="row">
                    	<div id="featured_products" class="owl-carousel">
                        <?php
							$i = 1;
							foreach($featuredProductDetails as $productDetail)
							{
								$box_number = ($i%4 == 0) ? 4 : 1;
								$i++;
								
								//$price = '$'.$productDetail->price;
								$price = ($productDetail->is_discount == 1) ? '<span>$'.$productDetail->price.'</span> $'.number_format($productDetail->price - $productDetail->discount_price , 2) : '$'.$productDetail->price;
								
								// thumbnail name
								$file_name = explode('.',$productDetail->file_name);												
								$file_ext = array_pop($file_name);												
								$thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;
								
								$product_image = $this->config->item('site_url').'admin/uploads/products/medium/'.$thumb_name;
								//$product_image = $this->config->item('site_url').'admin/uploads/products/large/'.$productDetail->file_name;
								
								echo '<div class="col-sm-12">
										<div class="product-box">
											<a href="'.base_url().'product/description/'.$productDetail->link_rewrite.'"><img src="'.$product_image.'" alt=""></a>
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
                        
                        
                        <!--<div class="col-sm-12">
                                <div class="product-box">
                                    <a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                                    <div class="pro_details">
                                        <div class="price"><span>$80.00</span> $70.00 </div>
                                        <p>Primis in faucibus</p>
                                        <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                    </div>
                                </div>
                            </div>
                           	<div class="col-sm-12">
                        	<div class="product-box">
                            	<a href="#" class="new-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/new-pro.png" alt=""></a>
                                <a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>
                        	<div class="col-sm-12">
                        	<div class="product-box">
                            	<a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>
    	                    <div class="col-sm-12">
                                <div class="product-box">
                                    <a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                                    <div class="pro_details">
                                        <div class="price"><span>$80.00</span> $70.00 </div>
                                        <p>Primis in faucibus</p>
                                        <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                    </div>
                                </div>
                            </div>
	                      	<div class="col-sm-12">
                        	<div class="product-box">
                            	<a href="#" class="new-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/new-pro.png" alt=""></a>
                                <a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>
                        	<div class="col-sm-12">
                        	<div class="product-box">
                            	<a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>
	                        <div class="col-sm-12">
                                <div class="product-box">
                                    <a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                                    <div class="pro_details">
                                        <div class="price"><span>$80.00</span> $70.00 </div>
                                        <p>Primis in faucibus</p>
                                        <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                    </div>
                                </div>
                            </div>
                           	<div class="col-sm-12">
                        	<div class="product-box">
                            	<a href="#" class="new-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/new-pro.png" alt=""></a>
                                <a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>
                        	<div class="col-sm-12">
                        	<div class="product-box">
                            	<a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>
    	                    <div class="col-sm-12">
                                <div class="product-box">
                                    <a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                                    <div class="pro_details">
                                        <div class="price"><span>$80.00</span> $70.00 </div>
                                        <p>Primis in faucibus</p>
                                        <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                    </div>
                                </div>
                            </div>
	                      	<div class="col-sm-12">
                        	<div class="product-box">
                            	<a href="#" class="new-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/new-pro.png" alt=""></a>
                                <a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>
                        	<div class="col-sm-12">
                        	<div class="product-box">
                            	<a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>-->
            
                          </div> <!-- owl slider featured products -->
                        
                    <!--<div class="col-sm-4">
                        	<div class="product-box">
                            	<a href="#" class="new-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/new-pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                        	<div class="product-box">
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                        	<div class="product-box">
                          		<a href="#" class="new-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/new-pro.png" alt=""></a>
                                <a href="#" class="hot-pro"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/hot_pro.png" alt=""></a>
                            	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/product_img1.jpg" alt=""></a>
                            	<div class="pro_details">
                                	<div class="price"><span>$80.00</span> $70.00 </div>
                                	<p>Primis in faucibus</p>
                                    <span><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/star.png" alt=""></span>
                                </div>
                            </div>
                        </div>-->
                    </div>
                    </div>
                </div>
            </div>
        </div>
    
    <!-- product slider script -->  
    <link href="<?php echo $this->config->item('css_images_js_base_url'); ?>owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('css_images_js_base_url'); ?>owl-carousel/owl.theme.css" rel="stylesheet">
    <script src="<?php echo $this->config->item('css_images_js_base_url'); ?>owl-carousel/owl.carousel.js"></script>    

    <style>
    #owl-demo .item, #featured_products .item{
        background: #3fbf79;
        padding: 30px 0px;
        margin: 10px;
        color: #FFF;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-align: center;
    }
	
    .customNavigation{
      text-align: center;
    }
    .customNavigation a{
      -webkit-user-select: none;
      -khtml-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }
    </style>
    <script>
    $(document).ready(function() {

      var owl = $("#owl-demo");

      owl.owlCarousel({

      items : 3, //10 items above 1000px browser width
      itemsDesktop : [1000,2], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,2], // 3 items betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0;
      itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
	  pagination : false,
	  navigation : true,
	  navigationText : ["", ""]
      
      });

      // Custom Navigation Events
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })
      $(".play").click(function(){
        owl.trigger('owl.play',1000);
      })
      $(".stop").click(function(){
        owl.trigger('owl.stop');
      })


    });
	
	 $(document).ready(function() {

      var owl = $("#featured_products");

      owl.owlCarousel({

      items : 3, //10 items above 1000px browser width
      itemsDesktop : [1000,2], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,2], // 3 items betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0;
      itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
	  pagination : false,
	  navigation : true,
	  navigationText : ["", ""]
      
      });

      // Custom Navigation Events
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })
      $(".play").click(function(){
        owl.trigger('owl.play',1000);
      })
      $(".stop").click(function(){
        owl.trigger('owl.stop');
      })


    });
	
	
    </script>
   
   <!-- end product slider script -->  
   */ ?>
<?php


   // echo "<pre>";print_r($data);die;
	$this->load->view('home/banner',$data);
	$this->load->view('home/categoty_list',$data);
  $this->load->view('home/home_new',$data); 
   ?>
