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
	//echo $this->router->fetch_class();
	
	
?>
	
            <div id="contentwrapper">
                <div class="main_content">
                    <?php
					
					$id = $category_details[0]->id;
					$title = $category_details[0]->title;
					$cat_link_rewrite = $category_details[0]->cat_link_rewrite;
					//$thumb_image = $this->config->item('site_url').'uploads/featured_categories/'.$category_details[0]->thumb_image;
					//$banner_image = $this->config->item('site_url').'uploads/featured_categories/'.$category_details[0]->banner_image;
					$is_active = $category_details[0]->active;
					$seo_title = $category_details[0]->seo_title;
					$seo_description = $category_details[0]->seo_description;
	
					?>
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
						
							<form class="form-horizontal well" method="POST" action="<?php echo base_url().'category/updateCategory'; ?>" enctype="multipart/form-data">
							<div class="heading clearfix">
								<h3 class="pull-left">Edit Category</h3>
							</div>
							
							<div class="control-group">
								<label class="control-label">Title<span class="f_req">*</span></label>
								<div class="controls">
								<input type="text" name="title" value="<?php echo $title; ?>" required="required" />													
								</div>
							</div>
											
							<div class="control-group">
								<label class="control-label">Category Link Rewrite<span class="f_req">*</span></label>
								<div class="controls">
									<input type="text" name="cat_link_rewrite" value="<?php echo $cat_link_rewrite; ?>" required="required"  />
															
								</div>							
							</div>
							
							<div class="control-group">
								<label class="control-label">SEO Title<span class="f_req">*</span></label>
								<div class="controls">
									<input type="text" name="seo_title" value="<?php echo $seo_title; ?>" required="required"  />
															
								</div>							
							</div>

							<div class="control-group">
								<label class="control-label">SEO Description<span class="f_req">*</span></label>
								<div class="controls">
									<input type="text" name="seo_description" value="<?php echo $seo_description; ?>" required="required"  />
															
								</div>							
							</div>
							
								<div class="control-group">
								<label class="control-label">Status<span class="f_req">*</span></label>
								<div data-fileupload="file" class="fileupload fileupload-new">
									Active : <input type="radio" name="active" value="1" <?php if($is_active == 1) { echo 'checked'; } ?> /><br />
									Inactive : <input type="radio" name="active" value="0" <?php if($is_active == 0) { echo 'checked'; } ?> />
								</div>
							</div>
							
							<input type="hidden" name="id" value="<?php echo $id; ?>" />						
							<button class="btn" type="submit">Update</button>
							
							</form>
						</div>						
					</div>
					
                </div>
            </div>
			
          