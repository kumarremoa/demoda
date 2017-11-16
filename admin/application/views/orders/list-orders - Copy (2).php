<!-- main content --> 
<div id="contentwrapper">
	<div class="main_content">
		<?php
		//echo '<pre>';
		//print_r($order_details);
		//echo '</pre>';
		
		
		$order_created = array();
		$order = array();
		$i = -1;
		foreach($order_details as $order_detail)
		{
			
			$orderId = $order_detail->order_id;
	
			if(!in_array($orderId,$order_created))
			{
				$i++;
				$order_created[] = $orderId;
				$order[$i][] = $order_detail;
			}
			else
			{
				$key = array_search($orderId, $order_created);
				$order[$key][] = $order_detail;
			}
			
		}// end foreach
	
		//print_r($order); echo '</pre>'; //exit;
		
		?>
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
		
		<div class="row-fluid">
			<div class="span12">
			
			<?php if($this->session->userdata('msg')!='') {  
				echo '<div class="alert alert-info">';
				echo $this->session->userdata('msg'); $this->session->unset_userdata('msg');
				echo '</div>';
			 } ?>
			
				
			</div>						
		</div>
		
		<div class="row-fluid">
                        <div class="span12">
                            <h3 class="heading">List Orders</h3>
							<?php 
							if(sizeof($order)>0)
							{
							?>
								<table class="table table-striped table-bordered dTableR" id="dt_a">
									<thead>
										<tr>
											<th>#</th>
											<th>Order Id</th>
                                            <th>Name</th>
                                            <!--<th style="width:80px;">Email</th>-->
                                            <th>
                                            	Products
                                            	<table>
                                                	<tr><td>Title</td><td>Price</td><td>Quantity</td></tr>
                                                </table>
                                            </th>
                                            <th style="width:50px;">Total Amount</th>
                                            <th>Shipping Address</th>
                                            <th>Payment Method</th>
                                            <th>Transaction Id</th>
											<th>Payment Status</th>
                                            <th>Order Date</th>
                                            <th>Details</th>											
										</tr>
									</thead>
									<tbody>
									<?php
										$s_no = 1;	
																		
											foreach($order as $order_detail)
											{
												$total_amount = 0;
												
												$detail = $order_detail[0];
												$id = $detail->id;
												$shipping_address = $detail->address.'<br>'.$detail->city.','.$detail->state.' - '.$detail->zip.'<br>'.$detail->country;
													
												
												echo '<tr id="order_'.$id.'">
														<td>'.$s_no.'</td>
														<td>'.$detail->order_id.'</td>
														<td>'.$detail->first_name.' '.$detail->last_name.'<br>'.$detail->email.'</td>';
												//echo '<td style="width:80px;">'.$detail->email.'</td>';
												
												echo '<td>';
												
												echo '<table>';
												foreach($order_detail as $product_details)
												{													
													$total_amount = $total_amount + ($product_details->price * $product_details->ordered_quantity);
													
													
													
													echo '<tr><td style="border-left:none;">'.$product_details->title.'</td><td>'.$product_details->price.'</td><td>'.$product_details->ordered_quantity.'</td></tr>';
																										
			
													//echo '<td>Products</td>
														
														
												} // end foreach
												echo '</table>';
												echo '</td>';
												
												echo '<td>'.$total_amount.'</td>
													<td>'.$shipping_address.'</td>
													<td>'.$detail->payment_method.'</td>
													<td>'.$detail->transaction_id.'</td>
													<td>'.$detail->payment_status.'</td>
													<td>'.date('d M, Y G:i A',strtotime($detail->created)).'</td>
													<td><a href="details/'.$detail->order_id.'">Details</a></td>
													</tr>';
													$s_no++;
											
											} // end foreach
										?>                                   
									   
									</tbody>
								</table>
							<?php
							} // end if
							else
							{
								echo 'No Record Found';
							}		
									
								?> 
                        </div>
                    </div>
		
	</div>
</div>
			
          