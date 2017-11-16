<?php

//$orderDetails = $orderDetails[0];

//print_r($transaction_id); exit;
//echo '<pre>'; print_r($orderDetails); exit;
/*$title = $orderDetail->title;
$price = $orderDetail->price;
$product_code = $orderDetail->product_code;
*/
?>

<form name="payForm" id="payForm" method="post" action= "https://www.sandbox.paypal.com/cgi-bin/webscr">
    <input type="hidden" name="cmd" value="_xclick">
    <!--<input type="hidden" name="business" value="aweyrich@gmail.com">-->
	<input type="hidden" name="business" value="mgijaipurcollege-facilitator@gmail.com">
    <!--<input type="hidden" name="item_name" value="<?php echo $title; ?>">
    <input type="hidden" name="item_number" value="<?php echo $product_code; ?>">
    <input type="hidden" name="amount" value="<?php echo $price; ?>">
    <input type="hidden" name="quantity" value="1">-->
    
    <?php
	
	$i = 0;
	foreach($orderDetails as $orderDetail)
	{
		$title = $orderDetail->title;
		$price = $orderDetail->price;
		$product_code = $orderDetail->product_code;
		$quantity = $orderDetail->ordered_quantity;
		
		echo '<input type="text" name="item_name['.$i.']" value="'.$title.'">
				<input type="text" name="item_number['.$i.']" value="'.$product_code.'">
				<input type="text" name="amount['.$i.']" value="'.$price.'">
				<input type="text" name="quantity['.$i.']" value="'.$quantity.'">';
		$i++;
	}
	
	?>
    
    <input type="hidden" name="no_shipping" value="1">    
	 
	
	<input type="hidden" name="return" value="<?php echo $this->config->item('site_url'); ?>">
    <input type="hidden" name="notify_url" value="<?php echo base_url().'course/paypalResponse'; ?>">
    <input type="hidden" name="cancel_return" value="<?php echo $this->config->item('site_url'); ?>">
	
   <!-- <input type="hidden" name="return" value="http://sellpin.com/index.php">
    <input type="hidden" name="notify_url" value="http://sellpin.com/ipnhandler.php">
    <input type="hidden" name="cancel_return" value="http://sellpin.com/index.php">-->
    <input type="hidden" name="currency_code" value="USD">       
    <input type="hidden" name="rm" value="2">
	<!--<input type="hidden" name="custom" value="<?php echo $_GET['tId']; ?>"> -->     
    </form>
<script language="javascript" type="text/javascript">
document.payForm.submit ();
</script>