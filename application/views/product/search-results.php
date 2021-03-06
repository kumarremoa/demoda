<?php

$total_results = $total_results_found;

?>
<!-- inner page content -->
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
                    	<h2>Search Results <?php 
                    					if($total_results > 1 && $this->session->userdata('keyword') !='')
											echo ' : '.$total_results.' results found for "'.$this->session->userdata('keyword').'"';
										else if($total_results == 1)
											 echo ' : 1 result found for "'.$this->session->userdata('keyword').'"';
										?>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="product_view">
						<div class="row">
                        	<div class="col-sm-9">
                            <form method="post" action="<?php echo base_url() ?>product/search">
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
								//echo $results;
								//echo '<div class="pagination_links">'.$links.'</div>';
								echo '<div class="search_results">';
								foreach($search_results as $productDetail)
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
													</div>
												</div>
											</div> ';
									}
									else
									{
										echo '<div class="col-sm-4">
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

<!-- end inner page content -->