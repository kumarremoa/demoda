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
						
							<form class="form-horizontal well" method="POST" action="saveProductDetails" enctype="multipart/form-data" onsubmit="return check_valid();">
							<div class="heading clearfix">
								<h3 class="pull-left">Add Product</h3>
							</div>
							
                            <div class="control-group">
								<label class="control-label">Category<span class="f_req">*</span></label>
								<div class="controls">
                                	<select name="main_category_id" onchange="list_subcategories(this.value)">
                                    	<option value=""></option>
									<?php
										foreach($category_list as $category)
										{
											echo '<option value="'.$category->id.'">'.$category->title.'</option>';
										}
									?>
                                    </select>
								</div>
							</div>  
                            
                            <div class="control-group">
								<label class="control-label">Sub Category<span class="f_req">*</span></label>
								<div class="controls">
                                	<select name="category_id" id="sub_category_id" required="required">
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
											echo '<option value="'.$vendor->id.'">'.$vendor->name.'</option>';
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
											echo '<option value="'.$brand->id.'">'.$brand->name.'</option>';
										}
									?>
                                    </select>
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Title<span class="f_req">*</span></label>
								<div class="controls">
								<input type="text" name="title" required="required" />													
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Description</label>
								<div class="controls">
								<textarea name="description" id="description"></textarea>													
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Overview</label>
								<div class="controls">
								<textarea name="overview" id="overview"></textarea>													
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Specification</label>
								<div class="controls">
								<textarea name="specification" id="specification"></textarea>													
								</div>
							</div>
                            
                             <div class="control-group">
								<label class="control-label">Color<span class="f_req">*</span></label>
								<div class="controls">
                                	<!--<select name="color[]" required="required" multiple="multiple">                                    	
									<?php
										foreach($colors_list as $color)
										{
											echo '<option value="'.$color->color_code.'" style="background:#'.$color->color_code.'; width:200px; height:20px;"></option>';
										}
									?>
                                    </select>-->
                                    <input type="hidden" name="color" id="color_codes" />
                                    <ul class="colorbox">
                                    
                                    <?php
										foreach($colors_list as $color)
										{
											//echo '<option value="'.$color->color_code.'" style="background:#'.$color->color_code.'; width:200px; height:20px;"></option>';
											echo '<li><a href="javascript:void(0)" onclick="available_color(\''.$color->color_code.'\')" class="" style="background:#'.$color->color_code.';" id="color_'.$color->color_code.'"></a></li>';
										}
									?>
                                        <!--<li><a href="" style="background:green;"></a></li>
                                        <li><a href="" style="background:green;"></a></li>
                                        <li><a href="" style="background:green;"></a></li>
                                        <li><a href="" style="background:green;"></a></li>
                                        <li><a href="" style="background:green;"></a></li>
                                        <li><a href="" style="background:green;"></a></li>
                                        <li><a href="" style="background:green;"></a></li>
                                        <li><a href="" style="background:green;"></a></li>
                                        <li><a href="" style="background:green;"></a></li>
                                        <li><a href="" style="background:green;"></a></li>
                                        <li><a href="" style="background:green;"></a></li>
                                        <li><a href="" style="background:green;"></a></li>
                                        <li><a href="" style="background:green;"></a></li>
                                        <li><a href="" style="background:green;"></a></li>
                                        <li><a href="" style="background:green;"></a></li>
                                        <li><a href="" style="background:green;"></a></li>
                                        <li><a href="" style="background:green;"></a></li>
                                        <li><a href="" style="background:green;"></a></li>  -->                                 
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
											echo '<option value="'.$size->name.'">'.$size->name.'</option>';
										}
									?>
                                    <!--<option value="S">Small (S)</option>
                                    <option value="M">Medium (M)</option>
                                    <option value="L">Large (L)</option>
                                    <option value="XL">Extra Large (XL)</option>
                                    <option value="XXL">Double Extra Large (XXL)</option>-->
                                </select>                                
								</div>
							</div>

                            
                           <div class="control-group">
								<label class="control-label">Time to Deliver<span class="f_req">*</span></label>
								<div class="controls">
								<select name="time_to_deliver" required="required">
                                	<option value="3-5">3-5 Business Days</option>
                                    <option value="6-8">6-8 Business Days</option>
                                    <option value="9-15">9-15 Business Days</option>
                                </select>
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Price<span class="f_req">*</span></label>
								<div class="controls">
								<input type="text" name="price" required="required" />													
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Shipping Price<span class="f_req">*</span></label>
								<div class="controls">
								<input type="text" name="shipping_price" required="required" />													
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">FOB Price<span class="f_req">*</span></label>
								<div class="controls">
								<input type="text" name="fob_price" required="required" />													
								</div>
							</div>
                            
                            
                            <div class="control-group">
								<label class="control-label">Is Discount<span class="f_req">*</span></label>
								<div class="controls">
									<input type="radio" name="is_discount" value="0" title="No" checked="checked" onclick="discount_section(0);" /> No<br />
                                    <input type="radio" name="is_discount" value="1" title="Yes" onclick="discount_section(1);" /> Yes
								</div>							
							</div>
                            
                             <div class="control-group discount_section">
								<label class="control-label">Discount Price<span class="f_req">*</span></label>
								<div class="controls">
								<input type="text" name="discount_price" id="discount_price" />													
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Quantity<span class="f_req">*</span></label>
								<div class="controls">
								<input type="text" name="quantity" required="required" />													
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">SKU<span class="f_req">*</span></label>
								<div class="controls">
								<input type="text" name="product_code" required="required" />													
								</div>
							</div>
                            
							<div class="control-group">
								<label class="control-label">Product Images<span class="f_req">*</span></label>
								<div class="controls">
									<input type="file" name="image[]" required="required" multiple="multiple" />									
								</div>							
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Featured<span class="f_req">*</span></label>
								<div class="controls">
									<input type="radio" name="is_featured" value="1" title="Yes" /> Yes<br />
                                    <input type="radio" name="is_featured" value="0" title="No" checked="checked" /> No
								</div>							
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Special<span class="f_req">*</span></label>
								<div class="controls">
									<input type="radio" name="is_special" value="1" title="Yes" /> Yes<br />
                                    <input type="radio" name="is_special" value="0" title="No" checked="checked" /> No
								</div>							
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Status<span class="f_req">*</span></label>
								<div class="controls">
									<input type="radio" name="is_active" value="1" title="Published" checked="checked" /> Published<br />
                                    <input type="radio" name="is_active" value="0" title="Un-published" /> Un-published
								</div>							
							</div>
                            
                            
                            
                            <div class="control-group">								
								<div data-fileupload="file" class="fileupload fileupload-new">
									<button class="btn" type="submit">Add Product</button>
								</div>							
							</div>
							
							</form>
						</div>						
					</div>
					
                </div>
            </div>
			
          