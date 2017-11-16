<!-- main content --> 
<div id="contentwrapper">
	<div class="main_content">
		<?php
		/*echo '<pre>';
		print_r($mail_list);
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
                            <h3 class="heading">List Mail Content</h3>
							<?php 
							if(sizeof($mail_list)>0)
							{
							?>
								<table class="table table-striped table-bordered dTableR" id="dt_a">
									<thead>
										<tr>
											<th width="4%">#</th>
											<th width="20%">Comment</th>
                                            <th>Content</th>
											<th width="20%" style="text-align:center;">Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$s_no = 1;									
											foreach($mail_list as $result)
											{
												$id = $result->id;
												
												
												$attr_delete = array(
																'class' => 'link-class"'
															);
												
												echo '<tr id="banner_'.$id.'">
															<td>'.$s_no.'</td>
															<td>'.$result->comment.'</td>
															<td>'.$result->content.'</td>
															<td class="center">'.anchor('mailContent/editContent/'.$result->id.'', 'Edit',  $attr_delete).'
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
			
          