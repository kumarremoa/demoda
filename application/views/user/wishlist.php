<!-- inner page content -->

<div class="main-contnt">
        	<div class="row">
            	
                <!-- sidebar -->
            	<?php //$this->load->view('template/sidebar',$header_categories); ?>
            	<!-- end sidebar -->
                
                <div class="col-sm-12">
                	<div class="inner-banner">
                    	<img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/inner-banner.jpg" alt="">
                    </div>
                    <div class="prodct_section">
                    	<div class="product-row">
                    	<h2>Wishlist</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="product_view">
						<div class="row">
                        	<div class="col-sm-9">
                            <form method="post" action="<?php echo base_url() ?>user/wishlist">
                            	<label>Sort By: </label>
                                <select name="short_by" onchange="this.form.submit()">
                                	<option value="latest" <?php if($this->session->userdata('short_by') == 'latest'){ echo 'selected="selected"'; } ?>>Latest</option>
                                    <option value="price" <?php if($this->session->userdata('short_by') == 'price'){ echo 'selected="selected"'; } ?>>Price</option>
                                </select>
                                <label>Show: </label>
                                <select name="per_page"  onchange="this.form.submit()">
                                	<option value="1" <?php if($this->session->userdata('per_page') == 1){ echo 'selected="selected"'; } ?>>1</option>
                                    <option value="2" <?php if($this->session->userdata('per_page') == 2){ echo 'selected="selected"'; } ?>>2</option>
                                    <option value="4" <?php if($this->session->userdata('per_page') == 4){ echo 'selected="selected"'; } ?>>4</option>
                                    <option value="8" <?php if($this->session->userdata('per_page') == 8){ echo 'selected="selected"'; } ?>>8</option>
                                    <option value="12" <?php if($this->session->userdata('per_page') == 12){ echo 'selected="selected"'; } ?>>12</option>
                                    <option value="16" <?php if($this->session->userdata('per_page') == 16){ echo 'selected="selected"'; } ?>>16</option>
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
						
							if(sizeof($user_wishlist) == 0)
							{
								echo '<p class="no_result">No result found.</p>';
							}
							else
							{
								//echo $results;
								//echo '<div class="pagination_links">'.$links.'</div>';
								echo '<div class="search_results">';
								foreach($user_wishlist as $productDetail)
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
													<div class="col-sm-5"><a href="'.base_url().'product/description/'.$productDetail->product_id.'"><img src="'.$product_image.'" /></a></div>
													<div class="col-sm-7">
													 <h2>'.ucwords($productDetail->title).'</h2>
													   <div class="price">'.$price.' </div>
													   <div><img src="'.$this->config->item('css_images_js_base_url').'images/star.png" /></div>
													   <p class="text">'.$description.'</p>
													   <a href="'.base_url().'user/deleteWishlist/'.$productDetail->product_id.'/wishlist" class="pro_delete" title="Delete wishlist">Delete Wishlist</a>
													</div>
												</div>
											</div> ';
									}
									else
									{
										echo '<div class="col-sm-3">
												<div class="product-box">
													<a href="'.base_url().'product/description/'.$productDetail->product_id.'"><img src="'.$product_image.'" alt=""></a>
													<div class="pro_details">
														<div class="price"><!--<span>$80.00</span>--> '.$price.' </div>
														<p>'.ucwords($productDetail->title).'<!--<br />
														<span>Item no.: '.$productDetail->product_code.'</span>--></p>
														<!--<span><img src="'.$this->config->item('css_images_js_base_url').'images/star.png" alt=""></span>-->
														<a href="'.base_url().'user/deleteWishlist/'.$productDetail->product_id.'/wishlist" class="pro_delete" title="Delete wishlist">Delete Wishlist</a>
													</div>
												</div>
											</div>';
									} // end else	
									
								}
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

<!-- end inner page content -->