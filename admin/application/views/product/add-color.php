<script src="<?php echo $this->config->item('css_images_js_base_url'); ?>js/jquery-1.11.1.js"></script>
<script src="<?php echo $this->config->item('css_images_js_base_url'); ?>js/colorpicker.js"></script>
<script>
$c = $.noConflict();
</script>
<script src="<?php echo $this->config->item('css_images_js_base_url'); ?>js/color_plugin.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('css_images_js_base_url'); ?>css/colorpicker.css" />
<style>
#picker3 {	
	border-right:25px solid green;
	line-height:20px;	
}
</style>
<script>
//$c = $.noConflict();
/*$c('#picker3').colpick({
		layout:'hex',
		colorScheme:'dark',
		submit:0,
		onChange:function(hsb,hex,rgb,el,bySetColor) {
			$c(el).css('border-color','#'+hex);
			// Fill the text box just if the color was set using the picker, and not the colpickSetColor function.
			if(!bySetColor) $c(el).val(hex);
		}
	}).keyup(function(){
		$c(this).colpickSetColor(this.value);
	});
*/</script>
 <!-- main content -->
	
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
						
							<form class="form-horizontal well" method="POST" action="addColor" enctype="multipart/form-data">
							<div class="heading clearfix">
								<h3 class="pull-left">Add Color</h3>
							</div>
							
							<div class="control-group">
								<label class="control-label">Color Code<span class="f_req">*</span></label>
								<div class="controls">
								<input type="text" name="color_code" id="picker3" required="required" autocomplete="off" readonly="readonly"  />													
								</div>
							</div>
											
							<!--<div class="control-group">
								<label class="control-label">Thumbnail Image<span class="f_req">*</span></label>
								<div data-fileupload="file" class="fileupload fileupload-new">
									<input type="file" name="image[]" />
															
								</div>							
							</div>
							
							<div class="control-group">
								<label class="control-label">Banner Image<span class="f_req">*</span></label>
								<div data-fileupload="file" class="fileupload fileupload-new"><input type="file" name="image[]" />
								</div>
							</div>-->
															
							<button class="btn" type="submit">Add</button>
							
							</form>
						</div>						
					</div>
                    
                    
                    <div class="row-fluid">
						<div class="span12">
						
                        <div class="heading clearfix">
								<h3 class="pull-left">Available Colors</h3>
							</div>
                        <?php
							//echo '<pre>'; print_r($color_list);
							
							if(sizeof($color_list) > 0)
							{
								foreach($color_list as $color)
								{
									echo '<span style="width:20px; height:20px; padding:2px; margin:5px; display: inline-block; border: 1px solid #DDD; background:#'.$color->color_code.';" onclick="mark_unmark('.$color->id.')" id="color_'.$color->id.'"></span>';	
								}
								
								echo ' <form method="POST" action="deleteColor">
											<input type="hidden" name="color_ids" id="color_ids" />
											<button class="btn" type="submit">Delete</button>
										</form>';
							}
							else
								echo 'No color attribute addded.';
							
						?>
                        
                        
                       
							
						</div>						
					</div>
					
                </div>
            </div>
			
          