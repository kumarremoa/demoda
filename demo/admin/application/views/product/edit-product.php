 <!-- main content -->
 <?php
	/**
	 * get current controller and method name
	 * $this->uri->segment(n); // n=1 for controller, n=2 for method, etc
	 *
	 * OR
	 *
	 * $this->router->fetch_class(); // return current controller name
	 * $this->router->fetch_method(); // return current action/method name
	 */
	 
	//$params = $this->uri->segment(1);
	//print_r($params);
	//echo $this->router->fetch_class(); // controller name
	//echo $this->router->fetch_method(); // action/method name
	
	//echo '<pre>'; print_r($product_details); echo '</pre>'; exit;
	$title = $product_details[0]->title;
	$main_category_id = $product_details[0]->main_category_id;
	$category_id = $product_details[0]->category_id;
	$vendor_id = $product_details[0]->vendor_id;
	$brand_id = $product_details[0]->brand_id;
	$category_title = $product_details[0]->category_title;
	$description = $product_details[0]->description;
	$overview = $product_details[0]->overview;
	$specification = $product_details[0]->specification;
	
	$available_color = explode('~',$product_details[0]->color);
	$available_size = explode(',',$product_details[0]->available_size);
	$time_to_deliver = $product_details[0]->time_to_deliver;
	
	$price = $product_details[0]->price;
	$shipping_price = $product_details[0]->shipping_price;
	$discount_price = $product_details[0]->discount_price;
	$is_discount = $product_details[0]->is_discount;
	$fob_price =  $product_details[0]->fob_price;
	
	$quantity = $product_details[0]->quantity;
	$product_code = $product_details[0]->product_code;
	$is_featured = $product_details[0]->is_featured_product;
	$is_special = $product_details[0]->is_special;
	$is_active = $product_details[0]->is_active;
	$product_id = $product_details[0]->product_id;	
	
	
?>
<!-- Redactor is here -->
<script type="text/javascript" src="<?php echo $this->config->item('css_images_js_base_url'); ?>redactor/jquery-1.11.1.js"></script>
<link rel="stylesheet" href="<?php echo $this->config->item('css_images_js_base_url'); ?>redactor/redactor.css" />
<script src="<?php echo $this->config->item('css_images_js_base_url'); ?>redactor/redactor.min.js"></script>

<script type="text/javascript">
$r = $.noConflict();
$r(document).ready(
	function()
	{
		$r('#description').redactor();
		$r('#overview').redactor();
		$r('#specification').redactor();
	}
);
</script>
	
            <div id="contentwrapper">
                <div class="main_content">
                    
					<nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="#"><?php echo ucwords($this->uri->segment(1)); ?></a>
                                </li>
                                <li>
                                    <a href="#"><?php echo ucwords($this->uri->segment(2)); ?></a>
                                </li>                                
                            </ul>
                        </div>
                    </nav>
					
					<div class="row-fluid">
						<div class="span12">
						
						<?php if($this->session->userdata('msg')!='') {  
							echo '<div class="alert alert-info">';
							echo $this->session->userdata('msg'); $this->session->unset_userdata('msg');
							echo '</div>';
						 } ?>
						
							<form class="form-horizontal well" method="POST" action="<?php echo base_url().'product/saveProductDetails'; ?>" enctype="multipart/form-data"  onsubmit="return check_valid();">
							<div class="heading clearfix">
								<h3 class="pull-left">Edit Product</h3>
							</div>
							
                            <div class="control-group">
								<label class="control-label">Category<span class="f_req">*</span></label>
								<div class="controls">
                                	<select name="main_category_id" onchange="list_subcategories(this.value)">
                                    	<option value=""></option>
									<?php
										foreach($category_list as $category)
										{
											$selected = ($main_category_id == $category->id) ? 'selected="selected"' : '';
											echo '<option value="'.$category->id.'" '.$selected.'>'.$category->title.'</option>';
										}
									?>
                                    </select>
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Sub Category<span class="f_req">*</span></label>
								<div class="controls">
                                	<select name="category_id" id="sub_category_id" required="required">
                                    <option value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    </select>
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Vendor<span class="f_req">*</span></label>
								<div class="controls">
                                	<select name="vendor_id" required="required">
                                    	<option value=""></option>
									<?php
										foreach($vendors_list as $vendor)
										{
											$selected_vendor = ($vendor_id == $vendor->id) ? 'selected="selected"' : '';
											echo '<option value="'.$vendor->id.'" '.$selected_vendor.'>'.$vendor->name.'</option>';
										}
									?>
                                    </select>
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Brand<span class="f_req">*</span></label>
								<div class="controls">
                                	<select name="brand_id" required="required">
                                    	<option value=""></option>
									<?php
										foreach($brands_list as $brand)
										{
											$selected_brand = ($brand_id == $brand->id) ? 'selected="selected"' : '';
											echo '<option value="'.$brand->id.'" '.$selected_brand.'>'.$brand->name.'</option>';
										}
									?>
                                    </select>
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Title<span class="f_req">*</span></label>
								<div class="controls">
								<input type="text" name="title" value="<?php echo $title; ?>" required="required" />													
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Description</label>
								<div class="controls">
								<textarea name="description" id="description"><?php echo $description; ?></textarea>													
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Overview</label>
								<div class="controls">
								<textarea name="overview" id="overview"><?php echo $overview; ?></textarea>													
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Specification</label>
								<div class="controls">
								<textarea name="specification" id="specification"><?php echo $specification; ?></textarea>													
								</div>
							</div>
                            
                           <div class="control-group">
								<label class="control-label">Color<span class="f_req">*</span></label>
								<div class="controls">
                                	<!--<select name="color[]" required="required" multiple="multiple">                                    	
									<?php
										foreach($colors_list as $color)
										{
											$selected_color = ($brand_id == $brand->id) ? 'selected="selected"' : '';
											echo '<option value="'.$color->color_code.'" style="background:#'.$color->color_code.'; width:200px; height:20px;"></option>';
										}
									?>
                                    </select>-->
                                    
                                    <input type="hidden" name="color" id="color_codes" value="<?php echo $product_details[0]->color; ?>" />
                                    <ul class="colorbox">
                                    
                                    <?php
										foreach($colors_list as $color)
										{
											$selected = (in_array($color->color_code, $available_color)) ? 'selected' : '';
											//echo '<option value="'.$color->color_code.'" style="background:#'.$color->color_code.'; width:200px; height:20px;"></option>';
											echo '<li><a href="javascript:void(0)" onclick="available_color(\''.$color->color_code.'\')" class="'.$selected.'" style="background:#'.$color->color_code.';" id="color_'.$color->color_code.'"></a></li>';
										}
									?>
                                    </ul>
                                    
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">Available Size<span class="f_req">*</span></label>
								<div class="controls">
								<select name="available_size[]" required="required" multiple="multiple">
                                	<?php
										foreach($size_list as $size)
										{
											$selected_size = (in_array($size->name, $available_size)) ? 'selected="selected"' : '';
											echo '<option value="'.$size->name.'" '.$selected_size.'>'.$size->name.'</option>';
										}
									?>
                                    
                                    <!--<option value="S" <?php if(in_array('S',$available_size)){ echo 'selected = "selected"'; } ?>>Small (S)</option>
                                    <option value="M" <?php if(in_array('M',$available_size)){ echo 'selected = "selected"'; } ?>>Medium (M)</option>
                                    <option value="L" <?php if(in_array('L',$available_size)){ echo 'selected = "selected"'; } ?>>Large (L)</option>
                                    <option value="XL" <?php if(in_array('XL',$available_size)){ echo 'selected = "selected"'; } ?>>Extra Large (XL)</option>
                                    <option value="XXL" <?php if(in_array('XXL',$available_size)){ echo 'selected = "selected"'; } ?>>Double Extra Large (XXL)</option>-->
                                </select>
								</div>
							</div>

                            
                           <div class="control-group">
								<label class="control-label">Time to Deliver<span class="f_req">*</span></label>
								<div class="controls">
								<select name="time_to_deliver" required="required">
                                	<option value="3-5" <?php if($time_to_deliver == '3-5'){ echo 'selected = "selected"'; } ?>>3-5 Business Days</option>
                                    <option value="6-8" <?php if($time_to_deliver == '6-8'){ echo 'selected = "selected"'; } ?>>6-8 Business Days</option>
                                    <option value="9-15" <?php if($time_to_deliver == '9-15'){ echo 'selected = "selected"'; } ?>>9-15 Business Days</option>
                                </select>
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Price<span class="f_req">*</span></label>
								<div class="controls">
								<input type="text" name="price" value="<?php echo $price; ?>" required="required" />													
								</div>
							</div>
                            
                             <div class="control-group">
								<label class="control-label">Shipping Price<span class="f_req">*</span></label>
								<div class="controls">
								<input type="text" name="shipping_price" value="<?php echo $shipping_price; ?>" required="required" />													
								</div>
							</div>
                            
                             <div class="control-group">
								<label class="control-label">FOB Price<span class="f_req">*</span></label>
								<div class="controls">
								<input type="text" name="fob_price" value="<?php echo $fob_price; ?>"  required="required" />													
								</div>
							</div>
                            
                            
                            <div class="control-group">
								<label class="control-label">Is Discount<span class="f_req">*</span></label>
								<div class="controls">
									<input type="radio" name="is_discount" value="0" title="No" <?php if($is_discount == 0){ echo 'checked="checked"'; } ?>  onclick="discount_section(0);" /> No<br />
                                    <input type="radio" name="is_discount" value="1" title="Yes" <?php if($is_discount == 1){ echo 'checked="checked"'; } ?>  onclick="discount_section(1);" /> Yes
								</div>							
							</div>
                            
                             <div class="control-group discount_section" <?php if($is_discount == 1){ echo 'style="display:block"'; } ?>>
								<label class="control-label">Discount Price<span class="f_req">*</span></label>
								<div class="controls">
                                <?php 
									if($is_discount == 1)
										echo '<input type="text" name="discount_price" id="discount_price" value="'.$discount_price.'" required="required"  />';
									else
										echo '<input type="text" name="discount_price" id="discount_price" value="'.$discount_price.'"  />';
								?>																				
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Quantity<span class="f_req">*</span></label>
								<div class="controls">
								<input type="text" name="quantity" value="<?php echo $quantity; ?>" required="required" />													
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">SKU<span class="f_req">*</span></label>
								<div class="controls">
								<input type="text" name="product_code" value="<?php echo $product_code; ?>" required="required" />													
								</div>
							</div>
                            
							<div class="control-group">
								<label class="control-label">Product Images</label>
								<div data-fileupload="file" class="fileupload fileupload-new controls">
									<input type="file" name="image[]" multiple="multiple" />									
								</div>							
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Featured<span class="f_req">*</span></label>
								<div data-fileupload="file" class="controls">
									<input type="radio" name="is_featured" value="1" title="Yes" <?php if($is_featured == 1){ echo 'checked="checked"'; } ?> /> Yes<br />
                                    <input type="radio" name="is_featured" value="0" title="No" <?php if($is_featured == 0){ echo 'checked="checked"'; } ?> /> No
								</div>							
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Special<span class="f_req">*</span></label>
								<div data-fileupload="file" class="controls">
									<input type="radio" name="is_special" value="1" title="Yes" <?php if($is_special == 1){ echo 'checked="checked"'; } ?> /> Yes<br />
                                    <input type="radio" name="is_special" value="0" title="No" <?php if($is_special == 0){ echo 'checked="checked"'; } ?> /> No
								</div>							
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Status<span class="f_req">*</span></label>
								<div data-fileupload="file" class="controls">
									<input type="radio" name="is_active" value="1" title="Published" <?php if($is_active == 1){ echo 'checked="checked"'; } ?> /> Published<br />
                                    <input type="radio" name="is_active" value="0" title="Un-published" <?php if($is_active == 0){ echo 'checked="checked"'; } ?> /> Un-published
								</div>							
							</div>
                            
                            <div class="control-group">								
								<div data-fileupload="file" class="fileupload fileupload-new">
									<input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
                                    <button class="btn" type="submit">Update</button>
								</div>							
							</div>
							
							</form>
                            
                            <div class="heading clearfix">
								<h3 class="pull-left">Product Images</h3>
							</div>
                            <?php 
								foreach($product_details as $product_image)
								{
									//print_r($product_image);
									
									// thumbnail name
									$file_name = explode('.',$product_image->file_name);												
									$file_ext = array_pop($file_name);												
									$thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;
									
									$image = $this->config->item('site_url').'uploads/products/medium/'.$thumb_name;
									
									
									echo '<div class="product_image">';
											
											if($product_image->is_featured_image == 1)
												echo '<span class="featured"></span>';
																	
											echo '<img src="'.$image.'"><br>
													<a href="'.base_url().'Product/deleteProductImage/'.$product_image->product_id.'/'.$product_image->image_id.'">Delete</a> |
													<a href="'.base_url().'Product/setFeaturedImage/'.$product_image->product_id.'/'.$product_image->image_id.'">Set Featured</a>
										</div>';
								}
							
							?>
                            
                            
						</div>						
					</div>
					
                </div>
            </div>
			
          