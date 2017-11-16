<!-- inner page content -->
<div class="mid"> 
    <div class="content">
        <div class="heading-sec">
            <div class="headng">
                <h4>Order Details</h4>
            </div>
            <div class="clr"></div>
        </div>
        
        <div class="inner_page">
        <?php
			
			//echo '<pre>'; print_r($orderDetails); echo '</pre>';
			$details = $orderDetails[0];
		?>
        
        <table class="payment_details">
        	<tr>
                <td class="shipping_address">
                    <div><strong>Shipping Address</strong></div>
                    <div><?php echo $details->first_name.' '.$details->last_name; ?></div>
                    <div><?php echo $details->address; ?></div>
                    <div><?php echo $details->city.' - '.$details->zip; ?></div>
                    <div><?php echo $details->state.', '.$details->country; ?></div>
                </td>
            	<td class="invoice_details">
                	<div><span>Order ID : </span><span><?php echo $details->order_id; ?></span></div>
                    <div><span>Date : </span><span><?php echo date('d M, Y',strtotime($details->created)); ?></span></div>
                    <div><span>Payment Status : </span><span><?php echo $details->payment_status; ?></span></div>
                    <div><span>Payment Method : </span><span><?php echo $details->payment_method; ?></span></div>
				</td>
            </tr>
        </table>
        
        <table class="list_orders" cellpadding="0" cellspacing="0">
        	<tr>
            	<th>Product</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Amount</th>
            </tr>
            
            <?php
			$total = 0;
				foreach($orderDetails as $order)
				{
					$price = ($order->is_discount == 1) ? $order->price-$order->discount_price : $order->price;
					$total += $order->ordered_quantity * $price;
					echo '<tr>
							<td>'.$order->title.'</td>
							<td>'.$order->ordered_quantity.'</td>
							<td>'.$price.'</td>
							<td>'.$order->ordered_quantity * $price.'</td>
						</tr>';	
				}
			
			?>            
            <tr>
                <th></th>
                <th></th>
                <th>Total</th>
                <th><?php echo $total; ?></th>
            </tr>
        
        </table>        
        
        <div style="text-align:right; width:85%; margin:0 auto;"><a href="<?php echo base_url().'user/pdf/'.$order->order_id.'/download'; ?>">Download PDF</a></div>
        
        </div>
    </div>

<!-- end inner page content -->
