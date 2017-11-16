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
    <!-- inner page content -->
    <div class="mid"> 
        <div class="content">
            <div class="heading-sec">
                <div class="headng">
                    <h4>Sign In</h4>
                </div>
                <div class="clr"></div>
            </div>
            
            <div class="inner_page">
                
            <div class="clsSign_Top">
                    <div class="sign-fb-my-account">
                      
                       <!-- Facebook sign up -->
                       <a class="Sign_in_Fb_Bg" href="<?php echo base_url(); ?>facebookLogin/login" ></a>
                                    
                       <!-- Twitter sign up -->
                       <p class="Sign_Or_Row"><span>Or</span></p>
                       <a class="sign_in_tw_bg" href="<?php echo base_url(); ?>twitter/auth"></a>
                       <!-- Twitter sign up -->
                      <p class="Sign_Or_Row"><span>Or</span></p> 
                        <p></p>
                         
                    </div>
                    <div class="clsSign_Email">
                        <form id="signin" name="signin" method="post" action="<?php echo base_url(); ?>user/signin">           
                        <span style="color:#FF0000">*</span>
                        <div class="Txt_input" id="Input_Mail">
                            <label class="labelBlur" for="email"> </label>
                            <input type="email" value="" class="Sign_Inp_Bg" id="email" name="email" required placeholder="Email Address">
                        </div>
                       <span style="color:#FF0000">*</span>
                        <div class="Txt_input" id="Input_Password">
                            <label class="labelBlur" for="password1" style="display: block;"></label>
                            <input type="password" value="" size="30" name="password" id="password1" required placeholder="Password">
                        </div>
                        <p><button type="submit" class="btn blue gotomsg" name="Signin"><span><span>Sign in</span></span></button></p>
                        <p><span style="color:#FF0000">*</span>Required fields</p>            
                        </form>        <!--  End of form for sign in -->
                    </div>
                    
                    <div class="sign-fb-my-account">
                    <p class="Sign_Or_Row"><span>Or</span></p>
                        <p class="create_acc">                       
                        <a href="<?php echo base_url(); ?>user/forgotPassword">Forgot Password?</a>
                        </p>
                       </div>
                </div>
                
                
                
            </div>
        </div>
   
    <!-- end inner page content -->
