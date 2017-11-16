 <!-- inner page content -->

     <div class="mid"> 
        <div class="content">
            <div class="heading-sec">
                <div class="headng">
                    <h4>Order Status</h4>
                </div>
                <div class="clr"></div>
            </div>
            
            <div class="inner_page">

                        <div class="order_status_message">
                            <h4><?php 
									if(sizeof($status) > 0)
									{
										if($status->delivery_status == '')
											echo 'Your order is under process.';
										if($status->delivery_status == 'Packed')
											echo 'Your order is Packed & ready to Dispatch.'; 
										if($status->delivery_status == 'Dispatched')
											echo 'Your order is Dispatched.'; 
										if($status->delivery_status == 'Delivered')
											echo 'Your order has been delivered.';
									}
									else
										echo 'No order found.';
								?>
                            </h4>
                        </div>
                       

       </div>
    </div>
   

    <!-- end inner page content -->

