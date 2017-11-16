<?php
//$orderDetails = $orderDetails[0];
//print_r($transaction_id); exit;
//echo $order_id;
//echo '<pre>'; print_r($orderDetails); exit;
/*$title = $orderDetail->title;
$price = $orderDetail->price;
$product_code = $orderDetail->product_code;
*/
?>
 <div id="contentwrapper">
                <div class="main_content">					
<div class="row-fluid">
						<div class="span12">
<form name="payForm" id="payForm" method="post" action= "https://www.sandbox.paypal.com/cgi-bin/webscr">
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="upload" value="1">
    <!--<input type="hidden" name="business" value="aweyrich@gmail.com">-->
	<input type="hidden" name="business" value="mgijaipurcollege-facilitator@gmail.com">
    <!--<input type="hidden" name="item_name" value="<?php echo $title; ?>">
    <input type="hidden" name="item_number" value="<?php echo $product_code; ?>">
    <input type="hidden" name="amount" value="<?php echo $price; ?>">
    <input type="hidden" name="quantity" value="1">-->
    
    <?php
	
	$i = 1;
	foreach($orderDetails as $orderDetail)
	{
		$title = $orderDetail->title;
		$price = ($orderDetail->is_discount == 1) ? $orderDetail->price-$orderDetail->discount_price : $orderDetail->price;
		//$price = $orderDetail->price;
		$product_code = $orderDetail->product_code;
		$quantity = $orderDetail->ordered_quantity;
		$order_id = $orderDetail->order_id;
		
		echo '<input type="hidden" name="item_name_'.$i.'" value="'.$title.'">
				<input type="hidden" name="item_number_'.$i.'" value="'.$product_code.'">
				<input type="hidden" name="amount_'.$i.'" value="'.$price.'">
				<input type="hidden" name="quantity_'.$i.'" value="'.$quantity.'">';
		$i++;
	}
	
	?>
    
    <input type="hidden" name="no_shipping" value="1"> 
    <input type="hidden" name="custom" value="<?php echo $order_id; ?>">   
	 
	
	<!--<input type="hidden" name="return" value="<?php echo $this->config->item('site_url'); ?>">-->
    <input type="hidden" name="return" value="<?php echo $this->config->item('site_url').'index.php/paypal/paypalResponse'; ?>">
    <input type="hidden" name="notify_url" value="<?php echo $this->config->item('site_url').'index.php/paypal/paypalResponse'; ?>">
    <input type="hidden" name="cancel_return" value="<?php echo $this->config->item('site_url'); ?>">
	
   <!-- <input type="hidden" name="return" value="http://sellpin.com/index.php">
    <input type="hidden" name="notify_url" value="http://sellpin.com/ipnhandler.php">
    <input type="hidden" name="cancel_return" value="http://sellpin.com/index.php">-->
    <input type="hidden" name="currency_code" value="USD">       
    <input type="hidden" name="rm" value="2">
	<!--<input type="hidden" name="custom" value="<?php echo $_GET['tId']; ?>"> -->     
    </form>
    </div>
    </div>
    </div>
    </div>
<script language="javascript" type="text/javascript">
document.payForm.submit ();
</script>