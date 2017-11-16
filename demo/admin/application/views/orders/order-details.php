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
                    
                    <div class="heading clearfix">
								<h3 class="pull-left">Order Details</h3>
							</div>
                    
					<div class="row-fluid">
						<div class="span12 tac">
							<?php //echo '<pre>'; print_r($order_details); echo '</pre>';
							
							$details = $order_details[0];
							
							 ?>
                            
                            <table class="payment_details">
                                <tr>
                                    <td class="shipping_address">
                                        <div><strong>Shipping Address</strong></div>
                                        <div><?php echo ucwords($details->first_name.' '.$details->last_name); ?></div>
                                        <div><?php echo $details->address; ?></div>
                                        <div><?php echo $details->city.' - '.$details->zip; ?></div>
                                        <div><?php echo $details->state.', '.$details->country; ?></div>                                        
                                        <div style="margin-top:10px;"><strong>Email: </strong><?php echo $details->email; ?></div>
                                    </td>
                                    <td class="invoice_details">
                                        <div><span>Order ID : </span><span><?php echo $details->order_id; ?></span></div>
                                        <div><span>Date : </span><span><?php echo date('d M, Y',strtotime($details->created)); ?></span></div>
                                        <div><span>Payment Status : </span><span><?php echo $details->payment_status; ?></span></div>
                                        <div><span>Payment Method : </span><span><?php echo $details->payment_method; ?></span></div>
                                        <?php if($details->transaction_id != ''){ ?><div><span>Transaction Id : </span><span><?php echo $details->transaction_id; ?></span></div><?php } ?>
                                        <?php if($details->delivery_status != ''){ ?><div><span>Delivery Status : </span><span><?php echo $details->delivery_status; ?></span></div><?php } ?>
                                    </td>
                                </tr>
                            </table>
        
       						<table class="order_table" cellpadding="0" cellspacing="0">
                               <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Size</th>
                                    <th>ZPLOFT Price</th>
                                    <th>Discount Price</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                </tr>
                              </thead>  
                              <tbody>
                                <?php
                                $total = 0;
                                    foreach($order_details as $order)
                                    {
										$price = ($order->is_discount == 1) ? $order->price-$order->discount_price : $order->price;
                                        $total += $order->ordered_quantity * $price;
                                        echo '<tr>
                                                <td>'.$order->title.'</td>
												<td>'.$order->size.'</td>
												<td>'.$order->price.'</td>
                                                <td>'.$order->discount_price.'</td>
                                                <td>'.$order->ordered_quantity.'</td>
												<td>'.$order->ordered_quantity * $price.'</td>
                                            </tr>';	
                                    }
                                
                                ?>            
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Total Amount</th>
                                    <th><?php echo $total; ?></th>
                                </tr>
                            	</tbody>
                            </table> 
                            
						</div>
					</div>
                        
                </div>
            </div>
          