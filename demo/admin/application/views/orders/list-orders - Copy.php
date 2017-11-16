<!-- main content --> 
<div id="contentwrapper">
	<div class="main_content">
		<?php
		echo '<pre>';
		print_r($order_details);
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
			
		}// end while
	
		print_r($order); echo '</pre>'; //exit;
		
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
                                            <th>Email</th>
                                            <th>Products</th>
                                            <th>Total Amount</th>
                                            <th>Shipping Address</th>
                                            <th>Payment Method</th>
                                            <th>Transaction Id</th>
											<th>Payment Status</th>
                                            <th>Order Date</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$s_no = 1;	
																		
											foreach($order as $order_detail)
											{
												$total_amount = 0;
												
												foreach($order_detail as $result)
												{
													$id = $result->id;
													
													$total_amount = $total_amount + ($result->price * $result->quantity);
													
													$shipping_address = $result->address.'<br>'.$result->city.','.$result->state.' - '.$result->zip.'<br>'.$result->country;
													
													
													
													$attr_delete = array(
																	'class' => 'link-class"'
																);
													
													//$change_status_to = ($result->is_active == 1) ? 'Un-publish' : 'Publish';
													$change_status_to = 'publish';
													
													$attr_status = array(
																	'class' => 'link-class"'
																);
			
			
													echo '<tr id="banner_'.$id.'">
																<td>'.$s_no.'</td>
																<td>'.$result->order_id.'</td>
																<td>'.$result->first_name.' '.$result->last_name.'</td>
																<td>'.$result->email.'</td>
																<td>Products</td>
																<td>'.$total_amount.'</td>
																<td>'.$shipping_address.'</td>
																<td>'.$result->payment_method.'</td>
																<td>'.$result->transaction_id.'</td>
																<td>'.$result->payment_status.'</td>
																<td>'.date('d M, Y G:i A',strtotime($result->created)).'</td>																
																
																<td class="center">'.anchor('product/updateProduct/Delete/'.$result->id.'', 'Delete',  $attr_delete).' |
																	<span id="change_status_'.$id.'">'.anchor('product/updateProduct/'.$change_status_to.'/'.$result->id.'', $change_status_to,  $attr_status).'</span> | 
																	'.anchor('product/editProduct/'.$result->id.'', 'Edit',  $attr_delete).'
																</td> 
														</tr>';
														
												} // end foreach
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
			
          