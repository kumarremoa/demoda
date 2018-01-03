

<!-- inner page content -->
<div class="mid"> 
    <div class="container">
        <div class="heading-sec">
            <div class="headng">
                <h1>Orders</h1>
            </div>
            <div class="clr"></div>
        </div>
        
        <div class="inner_page">
        <?php
			
			if(!$orders)
			{
				echo '<p class="no_result">No record found.</p>';	
			}
			else
			{
				echo '<table class="table-responsive" cellpadding="0" cellspacing="0">
						<tr>
							<th>Sr. No.</th>
							<th>Order No.</th>
							<th>Transaction Id</th>
							<th>Payment Method</th>
							<th>Payment Status</th>
							<th>Date</th>
							<th>Actions</th>
						</tr>';
					
					$sr_no = 1;
						
					foreach($orders as $order)
					{
						echo '<tr>
								<td>'.$sr_no.'</td>
								<td>'.$order->order_id.'</td>
								<td>'.$order->transaction_id.'</td>
								<td>'.$order->payment_method.'</td>
								<td>'.$order->payment_status.'</td>
								<td>'.date('d M, Y G:i A',strtotime($order->created)).'</td>
								<td><a href="orderDetails/'.$order->order_id.'">Details</a></td>
							</tr>';
						$sr_no++;
					}
						
				echo '</table>';
			}
			
			//echo '<pre>'; print_r($orders); echo '</pre>';
			
		?>
        
           <div><?php echo $links; ?></div>      
        </div>
    </div>

<!-- end inner page content -->
