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
		$r('#content').redactor();
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
						
							<form class="form-horizontal well" id="saveContent" method="POST" action="saveContent" enctype="multipart/form-data">
							<div class="heading clearfix">
								<h3 class="pull-left">Add Mail Content</h3>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Comment<span class="f_req">*</span></label>
								<div class="controls">
								<input type="text" name="comment" required="required" />													
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Content</label>
								<div class="controls">
								<textarea name="content" id="content"></textarea>													
								</div>
							</div>
                            
                            <div class="control-group">								
								<div data-fileupload="file" class="fileupload fileupload-new">
									<button class="btn" type="submit">Add</button>
								</div>							
							</div>
							
							</form>
						</div>						
					</div>
					
                </div>
            </div>
			
          