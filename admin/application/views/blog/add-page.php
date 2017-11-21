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
                    $attributes = array('class' => 'form-horizontal well', 'id' => 'addBlogForm', 'enctype'=> "multipart/form-data");
                    echo form_open('blog/saveBlog', $attributes);
                ?>
                
                <div class="heading clearfix">
                    <h3 class="pull-left">Add Blog</h3>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Blog Title</label>
                    <div class="controls">
                    <input type="text" name="article_title" value="" required />                                                    
                    </div>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Author</label>
                    <div class="controls">
                    <input type="text" name="author_name" value="" required />                                                  
                    </div>
                </div>
                                
                <div class="control-group">
                    <label class="control-label">Content</label>
                    <div class="controls">
                    <textarea name="content" id="redactor" cols="500" rows="10"></textarea>                                 
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Cover Image<span class="f_req">*</span></label>
                    <div data-fileupload="file" class="controls fileupload fileupload-new">
                        <input type="file" name="image_path" required="required" />
                    </div>                          
                </div>
                                    
                <button class="btn" type="submit">Add</button>
                
                </form>
            </div>                      
        </div>
        
    </div>
</div>
            
            
                        
          