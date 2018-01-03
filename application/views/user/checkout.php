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
	
	if(isset($user_details))
	{
		//print_r($user_details);
		$user_details = $user_details[0];
		$user_id = $user_details->id;
		$first_name = $user_details->first_name;
		$last_name = $user_details->last_name;
		$email = $user_details->email;
	}
	else
	{
		$user_id = 0;
		$first_name = '';
		$last_name = '';
		$email = '';
	}
?>
	
    <!-- inner page content -->
    <div class="mid checkout"> 
        <div class="container">
            <div class="heading-sec">
                <div class="headng">
                    <h1>Checkout</h1>
                </div>
                <div class="clr"></div>
            </div>
            
            <div class="inner_page">
            	<div class="tabl-responsive">
                <div class="chkout-page">
              		 <?php
							// create form
							$attributes = array('class' => 'form-horizontal well', 'id' => 'checkout');
							echo form_open('user/checkout', $attributes);
						?>
												
							
							<div class="col-sm-6">
								<label class="control-label">First Name<span class="red">*</span> </label>
								<div class="controls">
								<input type="text" name="first_name" value="<?php echo $first_name; ?>" Placeholder="First Name" required="required" />
								</div>
							</div>
                            
                            <div class="col-sm-6">
								<label class="control-label">Last Name<span class="red">*</span> </label>
								<div class="controls">
								<input type="text" name="last_name" value="<?php echo $last_name; ?>" Placeholder="Last Name" required="required" />
								</div>
							</div>
							
							<div class="col-sm-6">
								<label class="control-label">Email<span class="red">*</span> </label>
								<div class="controls">
								<input type="email" name="email" value="<?php echo $email; ?>"  Placeholder="Email" required="required"  />													
								</div>
							</div>
							
							<div class="col-sm-6">
								<label class="control-label">Address<span class="red">*</span> </label>
								<div class="controls">
								<input type="text" name="address" value="" Placeholder="Address" required="required" />											
								</div>
							</div>
                            
                            
                            <div class="col-sm-6">
								<label class="control-label">City <span class="red">*</span></label>
								<div class="controls">
								<input type="text" name="city" value="" Placeholder="City" required="required" />												
								</div>
							</div>
                            
                            <div class="col-sm-6">
								<label class="control-label">State <span class="red">*</span></label>
								<div class="controls">
								<input type="text" name="state" value="" Placeholder="State" required="required" />												
								</div>
							</div>
                            
                            <div class="col-sm-6">
								<label class="control-label">Zip<span class="red">*</span> </label>
								<div class="controls">
								<input type="text" name="zip" value="" Placeholder="Zip" required="required" />												
								</div>
							</div>
                            
                            <div class="col-sm-6">
								<label class="control-label">Country <span class="red">*</span></label>
								<div class="controls">
								<input type="text" name="country" value="" Placeholder="Country" required="required" />												
								</div>
							</div>
                            <div class="clearfix"></div>
                            <div class="card_details">
                                <div class="col-sm-6">
                                    <label class="control-label">Card Number<span class="red">*</span> </label>
                                    <div class="controls">
                                    <input type="text" name="card_num" id="card_num" value="" Placeholder="Card Number" />												
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <label class="control-label">Card Expiry Date<span class="red">*</span> </label>
                                    <div class="controls">
                                    <input type="text" name="exp_date" value="" Placeholder="MM/YY" />												
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <label class="control-label">Card CVV<span class="red">*</span> </label>
                                    <div class="controls">
                                    <input type="text" name="card_code" value="" Placeholder="CVV" />												
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
								<label class="control-label">Payment Method<span class="red">*</span></label>
								<div class="controls">
								<div class="radio_sec"><input type="radio" name="payment_method" value="cod" title="COD" required="required" onclick="card_details('hide')" /><span>COD</span></div>
                                <div class="radio_sec"><input type="radio" name="payment_method" value="paypal" title="Paypal" required="required" onclick="card_details('hide')" /> <span>Paypal</span></div>
                                <div class="radio_sec"><input type="radio" name="payment_method" id="payment_method" value="authorize_net" title="Authorize .net" required="required" onclick="card_details('show')" /> <span>Authorize .net</span></div>													
								</div>
							</div>	
                             <div class="col-sm-6">
							<div class="controls">
                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">	
							<button class="update-btn frt btn btn-default pull-right margin-top-10" type="submit" name="checkout">Checkout</button>
                            </div></div>
							 <div class="clearfix"></div>
							</form>
                            
                            <div class="control-group">
								<div class="controls">			
							<span class="required-note"><span class="red">*</span> Required fields</span>
                            </div></div>
            </div>
            	</div>
            </div>
        </div>
   
    <!-- end inner page content -->
    
    
           		
							
			
          