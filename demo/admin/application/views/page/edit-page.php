<!-- Redactor is here -->
<script type="text/javascript" src="<?php echo $this->config->item('css_images_js_base_url'); ?>redactor/jquery-1.11.1.js"></script>
<link rel="stylesheet" href="<?php echo $this->config->item('css_images_js_base_url'); ?>redactor/redactor.css" />
<script src="<?php echo $this->config->item('css_images_js_base_url'); ?>redactor/redactor.min.js"></script>

<script type="text/javascript">
$r = $.noConflict();
$r(document).ready(
	function()
	{
		$r('#redactor').redactor();
	}
);
</script>
 <!-- main content -->	
            <div id="contentwrapper">
                <div class="main_content">
                    <?php
					
					$id = $page_details[0]->id;
					$page_name = $page_details[0]->page_name;
					$page_title = $page_details[0]->page_title;
					$content = $page_details[0]->content;					
	
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
													
							<?php
								// create form
								$attributes = array('class' => 'form-horizontal well', 'id' => 'editPageForm');
								echo form_open('page/updatePage', $attributes);
							?>
							
							<div class="heading clearfix">
								<h3 class="pull-left">Edit Page</h3>
							</div>
							
							<div class="control-group">
								<label class="control-label">Name</label>
								<div class="controls">
								<input type="text" name="page_name" value="<?php echo $page_name; ?>" />													
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Title</label>
								<div class="controls">
								<input type="text" name="page_title" value="<?php echo $page_title; ?>" />													
								</div>
							</div>
											
							<div class="control-group">
								<label class="control-label">Content</label>
								<div class="controls">
								<textarea name="content" id="redactor" style="width: 637px; height: 210px;"><?php echo $content; ?></textarea>		
																
								</div>
							</div>							
											
							
							<input type="hidden" name="id" value="<?php echo $id; ?>" />						
							<button class="btn" type="submit">Update</button>
							
							</form>
						</div>						
					</div>
					
                </div>
            </div>
			
          