<!-- main content --> 
<div id="contentwrapper">
	<div class="main_content">
		<?php
		//echo '<pre>';
		//print_r($subscribers);
		//echo '</pre>';
		
		
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
                            <h3 class="heading">List Subscribers</h3>
							<?php 
							if(sizeof($subscribers)>0)
							{
							?>
								<table class="table table-striped table-bordered dTableR" id="dt_a">
									<thead>
										<tr>
											<th>#</th>
											<th>Email</th>
                                            <th>Action</th>							
										</tr>
									</thead>
									<tbody>
									<?php
										$s_no = 1;	
																		
											foreach($subscribers as $subscriber_details)
											{
												$id = $subscriber_details->id;
												
												$attr_delete = array(
																'class' => 'link-class"'
															);
												
												echo '<tr id="subscriber_'.$id.'">
														<td>'.$s_no.'</td>
														<td>'.$subscriber_details->email.'</td>
														<td class="center">'.anchor('newsletters/delete/'.$subscriber_details->id.'', 'Delete',  $attr_delete).'</td> 
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
			
          