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
		
		$id = $blog_details[0]->id;
		$author_name = $blog_details[0]->author_name;
		$article_title = $blog_details[0]->article_title;
		$content = $blog_details[0]->content;
		$link_rewrite  = $blog_details[0]->link_rewrite;
		$image_path = $blog_details[0]->image_path;
		$status = $blog_details[0]->status;


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
					$attributes = array('class' => 'form-horizontal well', 'id' => 'editPageForm', 'enctype'=> "multipart/form-data");
					echo form_open('blog/updateBlog', $attributes);
				?>
				
				<div class="heading clearfix">
					<h3 class="pull-left">Edit Page</h3>
				</div>
				
				<div class="control-group">
					<label class="control-label">Name</label>
					<div class="controls">
					<input type="text" name="author_name" value="<?php echo $author_name; ?>" />													
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">Title</label>
					<div class="controls">
					<input type="text" name="article_title" value="<?php echo $article_title; ?>" />													
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Link Rewrite</label>
					<div class="controls">
					<input type="text" name="link_rewrite" value="<?php echo $link_rewrite; ?>" disabled="disabled" />					
					</div>
				</div>


								
				<div class="control-group">
					<label class="control-label">Content</label>
					<div class="controls">
					<textarea name="content" id="redactor" style="width: 637px; height: 510px;"><?php echo $content; ?></textarea>		
													
					</div>
				</div>

				<div class="control-group">
                    <label class="control-label">Status</label>
                    <div class="controls">
                    <select name="status" required="required">
                        <option disabled="disabled" >-Select-</option>
                        <option value="0" <?=$status== '0' ? 'selected':''?> >Inactive</option>
                        <option value="1" <?=$status== '1' ? 'selected':''?>>Active</option>
                        <option value="2" <?=$status== '2' ? 'selected':''?>>Deleted</option>
                    </select>                                                  
                    </div>
                </div>

				<div class="control-group">
                    <label class="control-label">Cover Image<span class="f_req">*</span></label>
                    <div data-fileupload="file" class="controls fileupload fileupload-new">
                        <input type="file" name="image_path[]" multiple="multiple" />
                        
                    </div>                          
                </div>							
								
				<input type="hidden" name="id" value="<?php echo $id; ?>" />						
				<button class="btn" type="submit">Update</button>
				
				</form>
			</div>						
		</div>
		
    </div>
</div>