<!-- home slider -->
<script type="text/javascript" src="<?php //echo $this->config->item('css_images_js_base_url'); ?>js/home_slider/jquery-1.9.1.min.js"></script>
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
				jssor_slider1.$SetScaleWidth(Math.min(parentWidth, 995));
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

</style>
<!-- end home slider -->

<!-- product slider -->
<link rel="stylesheet" href="<?php echo $this->config->item('css_images_js_base_url'); ?>css/jquery.bxslider.css" type="text/css" />
<script src="<?php echo $this->config->item('css_images_js_base_url'); ?>js/jquery.bxslider.js"></script>
<script>
$(document).ready(function(){
  $('.new_products').bxSlider({
	auto: false,
  	autoControls: true,
	pager: false,
    slideWidth: 216,
    minSlides: 4,
    maxSlides: 4,
    moveSlides: 1,
    slideMargin: 15
  });
      
});
$(document).ready(function(){
  $('.featured_products').bxSlider({
	auto: false,
  	autoControls: true,
	pager: false,
    slideWidth: 216,
    minSlides: 4,
    maxSlides: 4,
    moveSlides: 1,
    slideMargin: 15
  });
      
});
$(document).ready(function(){
  $('.special_products').bxSlider({
	auto: false,
  	autoControls: true,
	pager: false,
    slideWidth: 216,
    minSlides: 4,
    maxSlides: 4,
    moveSlides: 1,
    slideMargin: 15
  });
      
});
/*$(document).ready(function(){
 
  $('.slider5').bxSlider({
	auto: true,
  	//autoControls: true,
    slideWidth: 300,
    minSlides: 3,
    maxSlides: 4,
    moveSlides: 1,
    slideMargin: 10
  });
  
});
*/</script>
<!--
<div class="slider5">
  <div class="slide"><img src="http://placehold.it/300x150&text=FooBar1"></div>
  <div class="slide"><img src="http://placehold.it/300x150&text=FooBar2"></div>
  <div class="slide"><img src="http://placehold.it/300x150&text=FooBar3"></div>
  <div class="slide"><img src="http://placehold.it/300x150&text=FooBar4"></div>
  <div class="slide"><img src="http://placehold.it/300x150&text=FooBar5"></div>
  <div class="slide"><img src="http://placehold.it/300x150&text=FooBar6"></div>
  <div class="slide"><img src="http://placehold.it/300x150&text=FooBar7"></div>
  <div class="slide"><img src="http://placehold.it/300x150&text=FooBar8"></div>
  <div class="slide"><img src="http://placehold.it/300x150&text=FooBar9"></div>
  <div class="slide"><img src="http://placehold.it/300x150&text=FooBar10"></div>
</div>
-->

<div class="mid">
    <!-- Jssor Slider Begin -->   
    <!-- You can move inline styles (except 'top', 'left', 'width' and 'height') to css file or css block. -->
    <div id="slider1_container" class="" style="position: relative; top: 0px; left: 0px; width: 1000px; height: 350px; overflow: hidden; ">       
      
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
       <!-- <div u="navigator" class="jssorb05" style="position: absolute; bottom: 16px; right: 6px;">          
            <div u="prototype" style="POSITION: absolute; WIDTH: 16px; HEIGHT: 16px;"></div>
        </div>-->
        <!-- Bullet Navigator Skin End -->
       
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora12l" style="width: 30px; height: 46px; top: 175px; left: 0px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora12r" style="width: 30px; height: 46px; top: 175px; right: 0px">
        </span>
    </div>
    <!-- Jssor Slider End -->

<!--<div class="slider"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/slider.jpg" /></div>-->


<div class="boxes">
<div class="box">
<div class="box-img"><a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/quality.png" /></a></div>
<div class="box-txt">
<h5>QUALITY PRODUCT<br />
<span>Available</span></h5>
</div>
</div>
<div class="box">
<div class="box-img"><a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/return.png" /></a></div>
<div class="box-txt">
<h5>30 DAYS RETURN<br />
<span>Easy Return</span></h5>
</div>
</div>
<div class="box">
<div class="box-img"><a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/call.png" /></a></div>
<div class="box-txt">
<h5>CALL US<br />
<span>123 - 456 - 7890</span></h5>
</div>
</div>
<div class="box">
<div class="box-img"><a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/secure.png" /></a></div>
<div class="box-txt">
<h5>SECURED<br />
<span>Checkout</span></h5>
</div>
</div>
<div class="clr"></div></div>
<div class="content">
<div class="heading-sec">
<div class="headng">
<h4>New Products</h4>
</div>
<div class="clr"></div></div>
<div class="new_products products">
<?php
$i = 1;
foreach($productDetails as $productDetail)
{
	//echo '<pre>'; print_r($productDetail); echo '</pre>';
	$box_number = ($i%4 == 0) ? 4 : 1;
	$i++;
	
	$price = '$'.$productDetail->price;
	
	// thumbnail name
	$file_name = explode('.',$productDetail->file_name);												
	$file_ext = array_pop($file_name);												
	$thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;
	
	$product_image = $this->config->item('site_url').'admin/uploads/products/medium/'.$thumb_name;
	$classFree = ($productDetail->price == 0) ? 'Free' : '';
	
	?>
	<?php
	/*echo '<div class="box'.$box_number.'">
			<!--<div href="#" class="add-to-wishlist btn btn-small"><span>Wishlist</span></div>-->
			
			<a href="'.base_url().'product/description/'.$productDetail->product_id.'">
				<div class="'.$classFree.'PriceTag Light18 White">'.$price.'</div>
					<p class="img"><img src="'.$product_image.'" alt="img" style="width:200px;max-height: 130px;" /></p>					
					<p class="Light12"><strong>'.$productDetail->title.' </strong></p>
			</a>
			<a href="'.base_url().'product/addToCart/'.$productDetail->product_id.'">Add to cart</a>
		</div>';*/
		
		echo '<div class="product">
				<div class="product-img"><a href="'.base_url().'product/description/'.$productDetail->product_id.'"><img src="'.$product_image.'" /></a></div>
				<div class="detail">
				<div class="product-txt">
				<p>'.$productDetail->title.'<br />
					<span>Item no.: '.$productDetail->product_code.'</span>
				</p>
				</div>
				<div class="prodct-img">
					<span>'.$price.'</span></div>
				</div>
				<div class="clr"></div>
				
				<div class="product_links">
					<a href="'.base_url().'product/description/'.$productDetail->product_id.'" class="pro-details" title="Details"></a>
					<a href="'.base_url().'product/addToCart/'.$productDetail->product_id.'" class="pro-shap" title="Add to cart"></a>';
					
					// <!-- wishlist link -->
					
							if($this->session->userdata('user_id'))
							{
								if(!in_array($productDetail->product_id,$wishlist_product_ids))
									echo '<a href="'.base_url().'user/addToWishlist/'.$productDetail->product_id.'/home" class="pro" title="Add to wishlist"></a>';
								else
									echo '<a href="'.base_url().'user/deleteWishlist/'.$productDetail->product_id.'/home" class="pro_delete" title="Delete wishlist"></a>';
							}
					
                      //  <!-- end wishlist link -->
					
					//<a href="#wishlist" class="pro" title="Wishlist"></a>
			echo '</div> <!-- end product_links -->
				
			</div>';
	
}
 
?>
</div>
</div>
<div class="content">
<div class="heading-sec">
<div class="headng">
<h4>Featured Products</h4>
</div>
<div class="clr"></div></div>
<div class="featured_products products">
<?php
$i = 1;
foreach($featuredProductDetails as $productDetail)
{
	$box_number = ($i%4 == 0) ? 4 : 1;
	$i++;
	
	$price = '$'.$productDetail->price;
	
	// thumbnail name
	$file_name = explode('.',$productDetail->file_name);												
	$file_ext = array_pop($file_name);												
	$thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;
	
	$product_image = $this->config->item('site_url').'admin/uploads/products/medium/'.$thumb_name;
	$classFree = ($productDetail->price == 0) ? 'Free' : '';
	
	?>
	<?php	
		/*echo '<div class="product">
				<div class="product-img"><a href="'.base_url().'product/description/'.$productDetail->product_id.'"><img src="'.$product_image.'" /></a></div>
				<div class="detail">
				<div class="product-txt">
				<p>'.$productDetail->title.'<br />
					<span>Item no.: '.$productDetail->product_code.'</span>
					<a href="'.base_url().'product/addToCart/'.$productDetail->product_id.'" class="add_to_cart" title="Add to cart"></a>';
					
					// <!-- wishlist link -->
					
							if($this->session->userdata('user_id'))
							{
								if(!in_array($productDetail->product_id,$wishlist_product_ids))
									echo '<a href="'.base_url().'user/addToWishlist/'.$productDetail->product_id.'/home" class="add_wishlist" title="Add to wishlist"></a>';
								else
									echo '<a href="'.base_url().'user/deleteWishlist/'.$productDetail->product_id.'/home" class="delete_wishlist" title="Delete wishlist"></a>';
							}
					
                      //  <!-- end wishlist link -->
					
			echo '</p>
				</div>
				<div class="prodct-img">
					<span>'.$price.'</span></div>
				</div>
				<div class="clr"></div>
			</div>';*/
			
		echo '<div class="product">
				<div class="product-img"><a href="'.base_url().'product/description/'.$productDetail->product_id.'"><img src="'.$product_image.'" /></a></div>
				<div class="detail">
				<div class="product-txt">
				<p>'.$productDetail->title.'<br />
					<span>Item no.: '.$productDetail->product_code.'</span>
				</p>
				</div>
				<div class="prodct-img">
					<span>'.$price.'</span></div>
				</div>
				<div class="clr"></div>
				
				<div class="product_links">
					<a href="'.base_url().'product/description/'.$productDetail->product_id.'" class="pro-details" title="Details"></a>
					<a href="'.base_url().'product/addToCart/'.$productDetail->product_id.'" class="pro-shap" title="Add to cart"></a>';
					
					// <!-- wishlist link -->
					
							if($this->session->userdata('user_id'))
							{
								if(!in_array($productDetail->product_id,$wishlist_product_ids))
									echo '<a href="'.base_url().'user/addToWishlist/'.$productDetail->product_id.'/home" class="pro" title="Add to wishlist"></a>';
								else
									echo '<a href="'.base_url().'user/deleteWishlist/'.$productDetail->product_id.'/home" class="pro_delete" title="Delete wishlist"></a>';
							}
					
                      //  <!-- end wishlist link -->
					
					//<a href="#wishlist" class="pro" title="Wishlist"></a>
			echo '</div> <!-- end product_links -->
				
			</div>';
	
}
 
?>
</div>
</div>
<div class="content">
<div class="heading-sec">
<div class="headng">
<h4>Special Products</h4>
</div>
<div class="clr"></div></div>
<div class="special_products products">
<?php
$i = 1;
foreach($specialProductDetails as $productDetail)
{
	$box_number = ($i%4 == 0) ? 4 : 1;
	$i++;
	
	$price = '$'.$productDetail->price;
	
	// thumbnail name
	$file_name = explode('.',$productDetail->file_name);												
	$file_ext = array_pop($file_name);												
	$thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;
	
	$product_image = $this->config->item('site_url').'admin/uploads/products/medium/'.$thumb_name;
	$classFree = ($productDetail->price == 0) ? 'Free' : '';
	
	?>    
	<?php	
		echo '<div class="product">
				<div class="product-img"><a href="'.base_url().'product/description/'.$productDetail->product_id.'"><img src="'.$product_image.'" /></a></div>
				<div class="detail">
				<div class="product-txt">
				<p>'.$productDetail->title.'<br />
					<span>Item no.: '.$productDetail->product_code.'</span>
				</p>
				</div>
				<div class="prodct-img">
					<span>'.$price.'</span></div>
				</div>
				<div class="clr"></div>
				
				<div class="product_links">
					<a href="'.base_url().'product/description/'.$productDetail->product_id.'" class="pro-details" title="Details"></a>
					<a href="'.base_url().'product/addToCart/'.$productDetail->product_id.'" class="pro-shap" title="Add to cart"></a>';
					
					// <!-- wishlist link -->
					
							if($this->session->userdata('user_id'))
							{
								if(!in_array($productDetail->product_id,$wishlist_product_ids))
									echo '<a href="'.base_url().'user/addToWishlist/'.$productDetail->product_id.'/home" class="pro" title="Add to wishlist"></a>';
								else
									echo '<a href="'.base_url().'user/deleteWishlist/'.$productDetail->product_id.'/home" class="pro_delete" title="Delete wishlist"></a>';
							}
					
                      //  <!-- end wishlist link -->
					
					//<a href="#wishlist" class="pro" title="Wishlist"></a>
			echo '</div> <!-- end product_links -->
				
			</div>';
	
}
 
?>
</div>
</div>