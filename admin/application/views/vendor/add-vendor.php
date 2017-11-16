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
						
							<form class="form-horizontal well" method="POST" action="saveVendor" enctype="multipart/form-data">
							<div class="heading clearfix">
								<h3 class="pull-left">Add Vendor</h3>
							</div>
							
							<div class="control-group">
								<label class="control-label">Name<span class="f_req">*</span></label>
								<div class="controls">
								<input type="text" name="name" required="required" />													
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label">Email<span class="f_req">*</span></label>
								<div class="controls">
								<input type="email" name="email" required="required" />													
								</div>
							</div>
											
							<button class="btn" type="submit">Add</button>
							
							</form>
						</div>						
					</div>
					
                </div>
            </div>
			
          