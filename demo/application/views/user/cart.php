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
                    <h4>Cart</h4>
                </div>
                <div class="clr"></div>
            </div>
            
            <div class="inner_page">
            <div class="tabl-responsive">
            <?php if(sizeof($cart) > 0){ ?>
                <form name="cart" action="<?php echo base_url(); ?>user/updateCart" method="post">
                <table class="table_cart" cellspacing="0" cellpadding="0">
                            <tr>
                                <th>Product Name</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Action</th>
                             </tr>
                            <?php
                          //  echo '<pre>'; print_r($cart); echo '</pre>';
                            
                            $gross_amount = 0;
                            foreach($cart as $product)
                            {
								$price = ($product->is_discount == 1) ? $product->price-$product->discount_price : $product->price;
								$total_amount = $price*$product->ordered_quantity;
								$gross_amount = $gross_amount+$total_amount;
                                echo '<tr>
                                        <td>'.$product->title.'</td>
										<td><span class="color_box" style="background:#'.$product->ordered_color.';">&nbsp;</span></td>
										<td>'.$product->ordered_product_size.'</td>
                                        <td>'.$price.'</td>
                                        <td>';
											echo '<input type="hidden" name="id[]" value="'.$product->cart_id.'">';
											echo '<select name="quantity[]" onchange="change_total_amount('.$product->cart_id.','.$price.',this.value)">';
											for($i=1; $i<= $product->quantity; $i++)
											{
												$selected = ($i == $product->ordered_quantity) ? 'selected="selected"' : '';
												echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';	
											}
											
											echo '</select>';
											
									echo '</td>								
										<td><span id="total_amount_'.$product->cart_id.'" class="span_total_amount">'.$total_amount.'</span></td>
										<td><a href="'.base_url().'user/removeCartItem/'.$product->cart_id.'">Remove</a></td>
                                </tr>';
                            }
                            
                            ?>	
                            
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Gross Amount</strong></td>
                                <td><strong><span id="gross_amount"><?php echo $gross_amount; ?></span></strong></td>
                               	<td><input type="submit" name="update_cart" value="Update Cart" class="update-btn frt" /></td>
                             </tr>
                            </table>
                  </form>
                
                <?php 
                    echo '<a href="checkout" class="cartbtn">Proceed to checkout</a>';
					echo '<a href="emptyCart" class="cartbtn">Empty Cart</a>';
                }
                ?>
                <a href="<?php echo $this->config->item('site_url'); ?>" class="cartbtn">Continue Shopping</a>	
                <div class="clearfix"></div>
            </div>
            </div>
        </div>
   
    <!-- end inner page content -->
