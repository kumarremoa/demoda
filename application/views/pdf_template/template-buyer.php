<?php
			
	//echo '<pre>'; print_r($orderDetails); echo '</pre>'; exit;
	$details = $orderDetails[0];
?>

<h2 style="border-bottom:1px solid #FF6E6B; color:#FF6E6B; text-indent: 10px; padding-top:50px; margin:0 auto 15px; width: 85%;">Invoice</h2>
        
<table style=" margin: 0 auto; width: 85%;">
    <tr>
        <td style="text-align: left;">
            <div style=" line-height: 18px;"><strong>Shipping Address</strong></div>
            <div style=" line-height: 18px;"><?php echo $details->first_name.' '.$details->last_name; ?></div>
            <div style=" line-height: 18px;"><?php echo $details->address; ?></div>
            <div style=" line-height: 18px;"><?php echo $details->city.' - '.$details->zip; ?></div>
            <div style=" line-height: 18px;"><?php echo $details->state.', '.$details->country; ?></div>
        </td>
        <td style="text-align: right;">
            <div style=" line-height: 18px;"><span style="display: inline-block;  font-weight: bold; line-height: 18px; text-align: right; width: 130px;">Order ID : </span><span style="display: inline-block; width: 90px;"><?php echo $details->order_id; ?></span></div>
            <div style=" line-height: 18px;"><span style="display: inline-block;  font-weight: bold; line-height: 18px; text-align: right; width: 130px;">Date : </span><span style="display: inline-block; width: 90px;"><?php echo date('d M, Y',strtotime($details->created)); ?></span></div>
            <div style=" line-height: 18px;"><span style="display: inline-block;  font-weight: bold; line-height: 18px; text-align: right; width: 130px;">Payment Status : </span><span style="display: inline-block; width: 90px;"><?php echo $details->payment_status; ?></span></div>
            <div style=" line-height: 18px;"><span style="display: inline-block;  font-weight: bold; line-height: 18px; text-align: right; width: 130px;">Payment Method : </span><span style="display: inline-block; width: 90px;"><?php echo $details->payment_method; ?></span></div>
        </td>
    </tr>
</table>

<table style=" margin: 20px auto; width: 85%;" cellpadding="0" cellspacing="0">
    <tr style="-moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-right-colors: none; -moz-border-top-colors: none;  border-color: #EEEEEE -moz-use-text-color; border-image: none; border-style: solid none; border-width: 1px medium;">
        <th style="text-align: left; background:#F0F0F0; color: #252525; font-weight: normal; padding: 15px 0px 15px 50px;">Product</th>
        <th style="text-align: left; background:#F0F0F0; color: #252525; font-weight: normal; padding: 15px 10px;">SKU</th>
        <th style="text-align: left; background:#F0F0F0; color: #252525; font-weight: normal; padding: 15px 10px;">Color</th>
        <th style="text-align: left; background:#F0F0F0; color: #252525; font-weight: normal; padding: 15px 10px;">Size</th>
        <th style="text-align: left; background:#F0F0F0; color: #252525; font-weight: normal; padding: 15px 10px;">Quantity</th>
        <th style="text-align: left; background:#F0F0F0; color: #252525; font-weight: normal; padding: 15px 10px;">Unit Price</th>
        <th style="text-align: left; background:#F0F0F0; color: #252525; font-weight: normal; padding: 15px 10px;">Total Amount</th>
    </tr>
    
    <?php
    $total = 0;
        foreach($orderDetails as $order)
        {
            $price = ($order->is_discount == 1) ? $order->price-$order->discount_price : $order->price;
            $total += $order->ordered_quantity * $price;
            echo '<tr style=" -moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-right-colors: none; -moz-border-top-colors: none; border-color: #EEEEEE -moz-use-text-color; border-image: none; border-style: solid none; border-width: 1px medium;">
                    <td style="color: #252525; font-weight: normal; padding: 15px 0px 15px 50px;">'.$order->title.'</td>
                    <td style="color: #252525; font-weight: normal; padding: 15px 10px;">'.$order->product_code.'</td>
					<td style="background:#'.$order->ordered_color.'; border: 12px solid #FFFFFF; color: #252525;font-weight: normal;padding: 0;width: 35px;">&nbsp;</td>
					<td style="color: #252525; font-weight: normal; padding: 15px 10px;">'.$order->ordered_size.'</td>
					<td style="color: #252525; font-weight: normal; padding: 15px 10px;">'.$order->ordered_quantity.'</td>
                    <td style="color: #252525; font-weight: normal; padding: 15px 10px;">'.$price.'</td>
                    <td style="color: #252525; font-weight: normal; padding: 15px 10px;">'.$order->ordered_quantity * $price.'</td>
                </tr>';	
        }
    
    ?>            
    <tr style="-moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-right-colors: none; -moz-border-top-colors: none;  border-color: #EEEEEE -moz-use-text-color; border-image: none; border-style: solid none; border-width: 1px medium;">
        <th style="text-align: left; background:#F0F0F0; color: #252525; font-weight: normal; padding: 15px 10px;"></th>
        <th style="text-align: left; background:#F0F0F0; color: #252525; font-weight: normal; padding: 15px 10px;"></th>
        <th style="text-align: left; background:#F0F0F0; color: #252525; font-weight: normal; padding: 15px 10px;"></th>
        <th style="text-align: left; background:#F0F0F0; color: #252525; font-weight: normal; padding: 15px 10px;"></th>
        <th style="text-align: left; background:#F0F0F0; color: #252525; font-weight: normal; padding: 15px 10px;"></th>
        <th style="text-align: left; background:#F0F0F0; color: #252525; font-weight: normal; padding: 15px 10px;">Total</th>
        <th style="text-align: left; background:#F0F0F0; color: #252525; font-weight: normal; padding: 15px 10px;"><?php echo $total; ?></th>
    </tr>

</table>