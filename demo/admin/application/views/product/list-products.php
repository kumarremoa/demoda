<!-- main content --> 
<div id="contentwrapper">
	<div class="main_content">
		<?php
		/*echo '<pre>';
		print_r($product_details);
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
                            <h3 class="heading">List Products</h3>
							<?php 
							if(sizeof($product_details)>0)
							{
							?>
								<table class="table table-striped table-bordered dTableR" id="dt_a">
									<thead>
										<tr>
											<th>#</th>
											<th>Title</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$s_no = 1;									
											foreach($product_details as $result)
											{
												$id = $result->id;
												$is_active = ($result->is_active == 1) ? 'Published' : 'Un-Published';
												
												// thumbnail name
												/*$file_name = explode('.',$result->file_name);												
												$file_ext = array_pop($file_name);												
												$thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;
												
												$image = $this->config->item('site_url').'uploads/banner/small/'.$thumb_name;
												*/
												/*$attr = array(
																'target' => '_blank',
																'class' => 'link-class"',
																'onclick' => 'return deleteBanner('.$result->id.')'
															);
												*/
												
												$attr_delete = array(
																'class' => 'link-class"'
															);
												
												$change_status_to = ($result->is_active == 1) ? 'Un-publish' : 'Publish';
												
												$attr_status = array(
																'class' => 'link-class"'
															);
		
		
												echo '<tr id="banner_'.$id.'">
															<td>'.$s_no.'</td>
															<td>'.$result->title.'</td>
															<td>'.$result->price.'</td>
															<td>'.$result->quantity.'</td>
															<td><span id="status_'.$id.'">'.$is_active.'</td>
															<td class="center">'.anchor('product/updateProduct/Delete/'.$result->id.'', 'Delete',  $attr_delete).' |
																<span id="change_status_'.$id.'">'.anchor('product/updateProduct/'.$change_status_to.'/'.$result->id.'', $change_status_to,  $attr_status).'</span> | 
																'.anchor('product/editProduct/'.$result->id.'', 'Edit',  $attr_delete).'
															</td> 
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
			
          