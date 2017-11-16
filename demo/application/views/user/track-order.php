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
                   <h4>Track Order</h4>
                </div>
                <div class="clr"></div>
            </div>
            
            <div class="inner_page">
            
            
           
                        <form id="order_status" name="order_status" method="post" action="<?php echo base_url(); ?>user/orderStatus">           
                            <div>
                                <label><strong>Order Id</strong> <span class="red">*</span> </label>
                                <input type="text" value="" name="order_id" required placeholder="Order Id">
                                <input type="submit" value="Check Status" class="update-btn frt" name="SignUp">
                            </div>
                          
                            <p></p>
                            <div class="clr"></div>
                    		<div class="required_fields"><span class="red">*</span>Required fields</div>
                        </form>        
                        <!--  End of form for sign in -->
                        
            </div>
        </div>
   
    <!-- end inner page content -->
