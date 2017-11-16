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
					
					$id = $admin_details[0]->id;
					$username = $admin_details[0]->username;
					$password = $admin_details[0]->password;
					$email = $admin_details[0]->email;
					
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
								$attributes = array('class' => 'form-horizontal well', 'id' => 'editAdminUserForm');
								echo form_open('user/updateAdminUser', $attributes);
							?>
							
							<div class="heading clearfix">
								<h3 class="pull-left">Account Details</h3>
							</div>
							
							
							<div class="control-group">
								<label class="control-label">User Name </label>
								<div class="controls">
								<input type="text" name="username" value="<?php echo $username; ?>" Placeholder="User Name" required="required" />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Email </label>
								<div class="controls">
								<input type="email" name="email" value="<?php echo $email; ?>"  Placeholder="Email" required="required"  />													
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Password </label>
								<div class="controls">
								<input type="password" name="password" value="<?php echo $password; ?>"  Placeholder="Password" required="required"  />													
								</div>
							</div>
							
							<input type="hidden" name="id" value="<?php echo $id; ?>" />						
							<button class="btn" type="submit">Update</button>
							
							</form>
						</div>						
					</div>
					
                </div>
            </div>
			
          