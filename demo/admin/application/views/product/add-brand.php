<!-- main content --> 
<div id="contentwrapper">
	<div class="main_content">
		<?php
		/*echo '<pre>';
		print_r($subCategories);
		echo '</pre>';*/
		//echo $category_id;
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
			
                <form class="form-horizontal well" method="POST" action="<?php echo $this->config->item('base_url'); ?>product/addBrand" enctype="multipart/form-data">
                <div class="heading clearfix">
                    <h3 class="pull-left">Add Brand</h3>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Name<span class="f_req">*</span></label>
                    <div class="controls">
                    <input type="text" name="name" required="required" />													
                    </div>
                </div>                                
                <button class="btn" type="submit">Add</button>
                
                </form>
           
                            <h3 class="heading">List Brands</h3>
                            <table class="table table-striped table-bordered dTableR" id="dt_a">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>                                                                              
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
									$s_no = 1;
									foreach($brands as $result)
									{		
										$attr = array(
													'target' => '_blank',
													'href' => 'javascript:void(0);',										
													'class' => 'link-class edit_link_'.$result->id.'',
													'onclick' => 'return editBrand('.$result->id.')'
												);
																			
										echo '<tr>
													<td>'.$s_no.'</td>
													<td><input type="text" id="brand_'.$result->id.'" value="'.$result->name.'" placeholder="Name" readonly="readonly" style="border:none;"></td>																								
													<td class="center">'.anchor('', 'Edit', $attr).' | 
																		'.anchor('product/deleteBrand/'.$result->id.'', 'Delete', 'class="link-class"').'																		
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
			
          