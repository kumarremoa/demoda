<?php
/*
$total_results = $total_results_found;
//echo '<pre>'; print_r($category_bread_crumb); echo '</pre>'; 
?>
<!-- inner page content -->
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#"><?php echo ucwords($category_bread_crumb->parent_category_title); ?></a></li>
  <li class="active"><?php echo ucwords($category_bread_crumb->sub_category_title); ?></li>
</ol>

<div class="main-contnt">
        	<div class="row">
            	
                <!-- sidebar -->
            	<?php $this->load->view('template/sidebar',$header_categories); ?>
            	<!-- end sidebar -->
                
                <div class="col-sm-9">
                	<div class="inner-banner">
                    	<img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/inner-banner.jpg" alt="">
                    </div>
                    <div class="prodct_section">
                    	<div class="product-row">
                    	<h2>New Arrivals</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="product_view">
						<div class="row">
                        	<div class="col-sm-9">
                            <form method="post" action="<?php echo base_url() ?>product/category/<?php echo $this->uri->segment(3); ?>">
                            	<label>Sort By: </label>
                                <select name="short_by" onchange="this.form.submit()">
                                	<option value="latest" <?php if($this->session->userdata('short_by') == 'latest'){ echo 'selected="selected"'; } ?>>Latest</option>
                                    <option value="price" <?php if($this->session->userdata('short_by') == 'price'){ echo 'selected="selected"'; } ?>>Price</option>
                                </select>
                                <label>Show: </label>
                                <select name="per_page"  onchange="this.form.submit()">
                                	<option value="1" <?php if($this->session->userdata('per_page') == 1){ echo 'selected="selected"'; } ?>>1</option>
                                    <option value="2" <?php if($this->session->userdata('per_page') == 2){ echo 'selected="selected"'; } ?>>2</option>
                                    <option value="3" <?php if($this->session->userdata('per_page') == 3){ echo 'selected="selected"'; } ?>>3</option>
                                    <option value="6" <?php if($this->session->userdata('per_page') == 6){ echo 'selected="selected"'; } ?>>6</option>
                                    <option value="9" <?php if($this->session->userdata('per_page') == 9){ echo 'selected="selected"'; } ?>>9</option>
                                </select>
                             </form>
                            </div>
                            <div class="col-sm-3">
                            	<div class="view-product">
                                	<form name="list_view" action="<?php echo base_url() ?>product/listType" method="post">
                                    	<input type="hidden" name="list_type" value="list" />
                                        <input type="hidden" name="redirect_uri" value="<?php echo $this->router->fetch_class().'/'.$this->router->fetch_method().'/'.$this->uri->segment(3); ?>" />
                                        <a href="javascript:void(0)" onclick="document.list_view.submit()" class="listview">listview</a>
                                    </form>
                                    <form name="grid_view" action="<?php echo base_url() ?>product/listType" method="post">
                                    	<input type="hidden" name="list_type" value="grid" />
                                        <input type="hidden" name="redirect_uri" value="<?php echo $this->router->fetch_class().'/'.$this->router->fetch_method().'/'.$this->uri->segment(3); ?>" />
                                        <a href="javascript:void(0)" onclick="document.grid_view.submit()" class="gridview">listview</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
						<div class="row">
                        
                        <?php          
						   // echo '<pre>'; print_r($results); echo '</pre>';
							
							if($total_results == 0)
							{
								echo '<p class="no_result">No result found.</p>';	
							}
							else
							{
									echo '<div class="search_results">';								
								
									//echo '<pre>'; print_r($results); echo '</pre>';
									//echo $results;
									//echo '<div class="pagination_links">'.$links.'</div>';
									
									foreach($results as $productDetail)
									{
										//$price = '$'.$productDetail->price;
										$price = ($productDetail->is_discount == 1) ? '<span>$'.$productDetail->price.'</span> $'.number_format($productDetail->price - $productDetail->discount_price , 2) : '$'.$productDetail->price;
											
										// thumbnail name
										$file_name = explode('.',$productDetail->file_name);												
										$file_ext = array_pop($file_name);												
										$thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;
										
										$product_image = $this->config->item('site_url').'admin/uploads/products/medium/'.$thumb_name;
										
										$description = (strlen(strip_tags($productDetail->description)) > 200) ? substr($productDetail->description,0,200).'...' : $productDetail->description;
										
										if($this->session->userdata('list_type') == 'list')
										{
											echo '<div class="products_list">
													<div class="row">
														<div class="col-sm-5"><a href="'.product_url($productDetail).'"><img src="'.$product_image.'" /></a></div>
														<div class="col-sm-7">
														 <h2>'.ucwords($productDetail->title).'</h2>
														   <div class="price">'.$price.' </div>
														   <div><img src="'.$this->config->item('css_images_js_base_url').'images/star.png" /></div>
														   <p class="text">'.$description.'</p>
														</div>
													</div>
												</div> ';
										}
										else
										{
											echo '<div class="col-sm-4">
													<div class="product-box">
														<a href="'.product_url($productDetail).'"><img src="'.$product_image.'" alt=""></a>
														<div class="pro_details">
															<div class="price"><!--<span>$80.00</span>--> '.$price.' </div>
															<p>'.ucwords($productDetail->title).'<!--<br />
															<span>Item no.: '.$productDetail->product_code.'</span>--></p>
															<span><img src="'.$this->config->item('css_images_js_base_url').'images/star.png" alt=""></span>
														</div>
													</div>
												</div>';
										} // end else								
										
									} // end foreach
								
								echo '<div class="clr"></div>';	
	
								if($links !='')							
									echo '<div class="pagination_links">'.$links.'</div>';
	
								echo '</div>';
								
								
							}
						 
						 ?>
                    	                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
<!-- end inner page content
*/?>

      <main>
        <!-- Page Title -->
        <div class="page-title">
          <div class="container">
            <div class="breadcrumbs">
              <a href="<?=base_url()?>">Home</a>
              <span class="delimiter"><i class="material-icons keyboard_arrow_right"></i></span>
              <a href="<?= '' ?>"><?= ucwords($category_bread_crumb->parent_category_title) ?></a>
              <span class="delimiter"><i class="material-icons keyboard_arrow_right"></i></span>
              <span><?= ucwords($category_bread_crumb->sub_category_title) ?></span>
            </div>
            <h1 class="title pull-right"><?=ucwords($category_bread_crumb->sub_category_title)?></h1>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-md-9 col-md-push-3">

              
              <div class="shop-grid-tools">
                <span class="count-info"><?=count($results) ?> items found</span>
                <div class="select order-sorting">
                <form method="post" action="<?php echo base_url() ?>product/category/<?php echo $this->uri->segment(3); ?>">
                  <select name="short_by" onchange="this.form.submit()">
                    <option value="latest" <?php if($this->session->userdata('short_by') == 'latest'){ echo 'selected="selected"'; } ?>>Sort By Arrival</option>
                    <option value="price" <?php if($this->session->userdata('short_by') == 'price'){ echo 'selected="selected"'; } ?>>Sort By Price</option>
                  </select>
                  </form>    
                </div>
              </div>

              <div class="row">
              <?php foreach($results as $productDetail) { 
              	$price = ($productDetail->is_discount == 1) ? '<span>₹'.$productDetail->price.'</span> ₹'.number_format($productDetail->price - $productDetail->discount_price , 2) : '₹'.$productDetail->price;
				        $file_name = explode('.',$productDetail->file_name);
				        $file_ext = array_pop($file_name);                        
				        $thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;
				        
				        $product_image = $this->config->item('site_url').'admin/uploads/products/medium/'.$thumb_name;

				    ?>
                <div class="col-md-4">
                  <div class="tile">
                    <div class="preview-box">
                      <div class="preview-carousel" data-slick='{"arrows": false, "dots": true}'>
                        <img src="<?=$product_image?>" alt="<?=$productDetail->title?>">
                      </div>
                    </div>

                    <div class="tile-title">
                      <a href="<?= product_url($productDetail)?>"><?=$productDetail->title ?></a>
                    </div>

                    <div class="tile-meta">
                      <div class="meta-top">
                        <a href="<?=sub_category_url($productDetail) ?>" class="category"><?=$productDetail->sub_category_title ?></a>
                        <span class="cost"><?= $price ?></span>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
              </div>
            </div>

            <div class="col-md-3 col-md-pull-9">
              <aside class="sidebar">
                <div class="widget search">
	                <form name="search" method="post" action="<?php echo base_url(); ?>product/search">
	        				<i class="icon material-icons search"></i>
	                <input type="text" name="keyword" placeholder="Search entire store here..." class="form-control input-sm">
	                </form>
                </div>

                <?php $this->load->view('template/sidebar',$header_categories); ?>

                <div class="widget widget-range-slider range-slider-container">
                  <div class="widget-title">
                    Filters
                  </div>
                  <div id="slider-margin" class="slider-margin" name="price_margin"></div>
                  <span>Price Range</span>
                  <span class="example-val" id="slider-margin-value-min" name="min_price"></span> -
                  <span class="example-val" id="slider-margin-value-max" name="max_price"></span>

                  <button onclick="priceFilter('<?=$currentProduct->sub_cat_link_rewrite ?>')" class="btn btn-default btn-xs pull-right">Fliter </button>
                </div>
                <div class="widget tags-list-widget">
                  <div class="widget-title">
                   Popular Tags
                  </div>

                  <div class="tags-list">
                    <a href="#">Clothes</a>
                    <a href="#">Boots</a>
                    <a href="#">Skirts</a>
                  </div>
                </div>

                <?php 
                /*$this->load->view('template/sidebar',[
                    'header_categories' => $header_categories, 
                    'checkbox' => true,
                ]);*/ ?>
                <div class="widget categories-widget">
                  <div class="widget-title">
                    Choose Size
                  </div>

                  <ul class="cat-list">
                  <form action="" method="post">
                    <li>
                      <label class="checkbox">
                        <input onchange="this.form.submit()" type="checkbox" name="s" <?=($this->session->userdata('s') == 'on') ? 'checked' : '' ?>> S
                      </label>
                    </li>
                    <li>
                      <label class="checkbox">
                        <input onchange="this.form.submit()" type="checkbox" name="m" <?=($this->session->userdata('m') == 'on') ? 'checked' : '' ?>> M
                      </label>
                    </li>
                    <li>
                      <label class="checkbox">
                        <input onchange="this.form.submit()" type="checkbox" name="l" <?=($this->session->userdata('l') == 'on') ? 'checked' : '' ?>> L
                      </label>
                    </li>
                    <li>
                      <label class="checkbox">
                        <input onchange="this.form.submit()" type="checkbox" name="xl" <?=($this->session->userdata('xl') == 'on') ? 'checked' : '' ?>> XL
                      </label>
                    </li>
                    <li>
                      <label class="checkbox">
                        <input onchange="this.form.submit()" type="checkbox" name="xxl" <?=($this->session->userdata('xxl') == 'on') ? 'checked' : '' ?>> XXL
                      </label>
                    </li>
                    <li>
                      <label class="checkbox">
                        <input onchange="this.form.submit()" type="checkbox" name="xxxl" <?=($this->session->userdata('xxxl') == 'on') ? 'checked' : '' ?>> XXXL
                      </label>
                    </li>
                    </form>
                  </ul>
                </div>
                <?php if(!empty($featuredProductDetails)){
                    $this->load->view('//product/_side_product_lising',[
                        'featuredProductDetails' => $featuredProductDetails,
                        'h2title' => 'Featured Products',
                      ]);
                  }?>
              </aside><!-- Sidebar END -->
            </div>
          </div>

      <?php if($links !='') {  ?>
        <nav aria-label="Page navigation" class="pull-right">
          <ul class="pagination">
            <?php if (strpos($links, '<i class="material-icons arrow_back"></i>') === false) { ?>
                 <li class="arrow disable">
                  <a onclick="javascript:void()" aria-label="Previous">
                    <i class="material-icons arrow_back"></i>
                  </a>
                </li>
              <?php }
              echo $links;
              if (strpos($links, '<i class="material-icons arrow_forward"></i>') === false) { ?>
               <li class="arrow disable">
                <a onclick="javascript:void()" aria-label="Next">
                  <i class="material-icons arrow_forward"></i>
                </a>
              </li>
            <?php } ?>
          </ul>
	      </nav>'
	  	<?php } ?>     
        </div><!-- Content END -->
      </main>

<!-- end inner page content -->