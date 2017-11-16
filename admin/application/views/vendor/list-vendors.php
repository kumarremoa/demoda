<!-- main content --> 
<div id="contentwrapper">
	<div class="main_content">
		<?php
		/*echo '<pre>';
		print_r($category_detail);
		echo '</pre>';		*/
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
                            <h3 class="heading">List Vendors</h3>
                            <table class="table table-striped table-bordered dTableR" id="dt_a">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
									$s_no = 1;
									foreach($vendor_details as $result)
									{										
										echo '<tr>
													<td>'.$s_no.'</td>
													<td>'.$result->name.'</td>
													<td>'.$result->email.'</td>													
													<td class="center">'.anchor('vendor/editVendor/'.$result->id.'', 'Edit', 'class="link-class"').' | 
																		'.anchor('vendor/deleteVendor/'.$result->id.'', 'Delete', 'class="link-class"').'
													</td>
											</tr>';
											
										$s_no++;
									
									}
								?>                                    
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
		
	</div>
</div>
			
          