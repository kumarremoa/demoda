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
				jssor_slider1.$SetScaleWidth(Math.min(parentWidth, 1145));
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

/*.jssorb05 div{background:#ccc; border-radius:7px; background: url(<?php echo $this->config->item('css_images_js_base_url'); ?>images/b05.png) no-repeat;}
.jssorb05 .av{background:#555; border-radius:7px;background: url(<?php echo $this->config->item('css_images_js_base_url'); ?>images/b05.png) no-repeat;}
*/

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
    slideWidth: 269,
    minSlides: 3,
    maxSlides: 3,
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
    minSlides: 3,
    maxSlides: 3,
    moveSlides: 1,
    slideMargin: 15
  });
      
});
</script>


		
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
	
 		<div class="slider_section">
        	<img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/slider-1.png" alt="">
        </div>
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
            	<div class="col-sm-3">
                	<div class="categories_sec">
                    	<h1>Categories </h1>
                        
                        <ul class="responsive-accordion responsive-accordion-default bm-larger categr">
                            <li>
                                <div class="responsive-accordion-head"><a href="javascript:void(0)">Caftan</a> <i class="fa fa-chevron-down responsive-accordion-plus fa-fw"></i><i class="fa fa-chevron-up responsive-accordion-minus fa-fw"></i></div>
                                <div class="responsive-accordion-panel">
                                    <ul class="sub_categr">
                                        <li><a href="#">Hand-woven</a></li>
                                        <li><a href="#">Designer</a></li>
                                        <li><a href="#">Every day wear</a></li>
                                        <li><a href="#">Hot trends</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="responsive-accordion-head"><a href="javascript:void(0)">Tunics</a> <i class="fa fa-chevron-down responsive-accordion-plus fa-fw"></i><i class="fa fa-chevron-up responsive-accordion-minus fa-fw"></i></div>
                                <div class="responsive-accordion-panel">
                                    <ul class="sub_categr">
                                        <li><a href="#">Hand-woven</a></li>
                                        <li><a href="#">Designer</a></li>
                                        <li><a href="#">Every day wear</a></li>
                                        <li><a href="#">Hot trends</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="responsive-accordion-head"><a href="javascript:void(0)">Scarfs</a> <i class="fa fa-chevron-down responsive-accordion-plus fa-fw"></i><i class="fa fa-chevron-up responsive-accordion-minus fa-fw"></i></div>
                                <div class="responsive-accordion-panel">
                                    <ul class="sub_categr">
                                        <li><a href="#">Hand-woven</a></li>
                                        <li><a href="#">Designer</a></li>
                                        <li><a href="#">Every day wear</a></li>
                                        <li><a href="#">Hot trends</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        
                        <ul class="categr">
                        	<li><a href="#">Caftan</a>
                            	<ul class="sub_categr">
                                	<li><a href="#">Hand-woven</a></li>
                                    <li><a href="#">Designer</a></li>
                                    <li><a href="#">Every day wear</a></li>
                                    <li><a href="#">Hot trends</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Tunics</a></li>
                            <li><a href="#">Scarfs</a></li>
                        </ul>
                    </div>
                    <div class="off_section">
                    	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/off-img.jpg" alt=""></a>
                        	<div class="offdiv"> 50% off<span>for Skirts</span></div>
                        
                    </div>
                </div>
                <div class="col-sm-9">
                	<div class="prodct_section">
                    	<div class="product-row">
                    	<h2>New Arrivals</h2>
                        <!--<div class="sarow">
                        	<a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/larow.png" alt=""></a>
                            <a href="#"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/rarow.png" alt=""></a>
                        </div>-->
                        <div class="clearfix"></div>
                    </div>
                    	<div class="row new_products">
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
                        </div>
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
                    	<div class="row featured_products">
                    	<div class="col-sm-4">
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
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>