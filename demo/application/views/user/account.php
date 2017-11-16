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
	
	$user_details = $user_details[0];
	
?>
    <!-- inner page content -->
    <div class="mid"> 
        <div class="content">
            <div class="heading-sec">
                <div class="headng">
                    <h4>Account</h4>
                </div>
                <div class="clr"></div>
            </div>
            
            <div class="inner_page">
                
            <div class="clsSign_Top">
                    
                    <div class="clsSign_Email">

                        <form id="account" name="account" method="post" action="<?php echo base_url(); ?>user/account">           
                        <span style="color:#FF0000">*</span>
                        <div class="Txt_input" id="Input_First">
                            <label class="labelBlur" for="first_name" style="display: block;"></label>
                            <input type="text" value="<?php echo $user_details->first_name; ?>" id="first_name" name="first_name" required placeholder="First Name">
                        </div>
                        <span style="color:#FF0000">*</span>
                        <div class="Txt_input" id="Input_Last">
                            <label class="labelBlur" for="last_name" style="display: block;"></label>
                            <input type="text" value="<?php echo $user_details->last_name; ?>" id="last_name" name="last_name" required placeholder="Last Name">
                        </div>
                                  <!-- <span style="color:#FF0000">*</span>
                        <div class="Txt_input" id="Input_User">
                            <label class="labelBlur" for="username1" style="display: block;">User name</label>
                            <input type="text" value="" id="username1" name="username">
                        </div>-->
					<?php //if($user_details->email == ''){ ?>
                        <span style="color:#FF0000">*</span>
                        <div class="Txt_input" id="Input_Mail">
                            <label class="labelBlur" for="email"> </label>
                            <input type="email" value="<?php echo $user_details->email; ?>" class="Sign_Inp_Bg" id="email" name="email" required placeholder="Email Address">
                        </div>
                      <?php //} ?>
					  
					  
                       <span style="color:#FF0000">*</span>
                        <div class="Txt_input" id="Input_Password">
                            <label class="labelBlur" for="password1" style="display: block;"></label>
                            <input type="text" value="<?php echo $user_details->password; ?>" size="30" name="password" id="password1" required placeholder="Password">
                        </div>
                                    <!--<span style="color:#FF0000">*</span>
                        <div class="Txt_input hidden" id="Input_Password">
                            <label class="labelBlur" for="re_password" style="display: block;">Confirm Password</label>
                            <input type="password" value="" size="30" name="confirmpassword" id="re_password">
                        </div>-->
                        <p><button type="submit" class="btn blue gotomsg" name="SignUp"><span><span>Update</span></span></button></p>
                        <p><span style="color:#FF0000">*</span>Required fields</p>            
                        </form>        <!--  End of form for sign up -->
                    </div>
                </div>
                
                
                
            </div>
        </div>
   
    <!-- end inner page content -->
