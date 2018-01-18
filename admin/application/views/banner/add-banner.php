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

	<form class="form-horizontal well" method="POST" action="saveBanner" enctype="multipart/form-data">
	<div class="heading clearfix">
		<h3 class="pull-left">Add Banner</h3>
	</div>
	
	<div class="control-group">
      <label class="control-label">Banner Title</label>
      <div class="controls">
      <input type="text" name="slider_text" value="" required  placeholder="e.g- winter collection, 2018 " />                                                    
      </div>
  </div>
  
  <div class="control-group">
      <label class="control-label">Slider Url </label>
      <div class="controls">
      <input type="text" name="slider_url" value="" required placeholder="e.g- http://www.demodasecrets.com/sale"/>
      <div class="clearfix"></div>
      <label class="text-danger ">insert complete url with https:// or http://  e.g- https://www.demodasecrets.com/blog</label>
      </div>
  </div>

	<div class="control-group">
		<label class="control-label">Banner Image<span class="f_req">*</span></label>
		<div data-fileupload="file" class="fileupload fileupload-new">
			<input type="file" name="image" required="required" />
		</div>							
	</div>	
	<button class="btn" type="submit">Add Banner</button>						
	</form>
</div>						
</div>

    </div>
</div>

