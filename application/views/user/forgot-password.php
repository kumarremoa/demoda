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
                    <h4>Forgot Password</h4>
                </div>
                <div class="clr"></div>
            </div>
            
            <div class="inner_page">
                
            <div class="clsSign_Top">
                    <div class="clsSign_Email">
                        <form id="forgotPassword" name="forgotPassword" method="post" action="<?php echo base_url(); ?>user/forgotPassword">           
                        <span style="color:#FF0000">*</span>
                        <div class="Txt_input" id="Input_Mail">
                            <label class="labelBlur" for="email"> </label>
                            <input type="email" value="" class="Sign_Inp_Bg" id="email" name="email" required placeholder="Email Address">
                        </div>
                        <p><button type="submit" class="btn blue gotomsg" name="SignUp"><span><span>Send Password</span></span></button></p>
                        <p><span style="color:#FF0000">*</span>Required fields</p>            
                        </form>        <!--  End of form for sign in -->
                    </div>
                    
                </div>
                
                
                
            </div>
        </div>
   
    <!-- end inner page content -->
