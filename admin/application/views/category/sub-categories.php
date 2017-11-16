<!-- main content --> 
<script>
/*function editSubcategory(id)
{
	//alert(id);
	elm = '#title_'+id;
	$(elm).focus();
	$('.edit_link_'+id).attr('onclick','return updateSubCategory('+id+')');
	$('.edit_link_'+id).text('save');
	
	
	return false;
}*/
</script>
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
			
                <form class="form-horizontal well" method="POST" action="<?php echo $this->config->item('base_url'); ?>category/saveSubCategory" enctype="multipart/form-data">
                <div class="heading clearfix">
                    <h3 class="pull-left">Add Sub Category</h3>
                </div>
                
                <div class="control-group">
                    <label class="control-label">Title<span class="f_req">*</span></label>
                    <div class="controls">
                    <input type="text" name="title" required="required" />													
                    </div>
                </div>                                
                 <input type="hidden" name="category_id" value="<?php echo $category_id; ?>" />                   
                <button class="btn" type="submit">Add</button>
                
                </form>
           
                            <h3 class="heading">List Sub Categories</h3>
                            <table class="table table-striped table-bordered dTableR" id="dt_a">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>                                                                              
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
									$s_no = 1;
									foreach($subCategories as $result)
									{		
										$attr = array(
													'target' => '_blank',
													'href' => 'javascript:void(0);',										
													'class' => 'link-class edit_link_'.$result->id.'',
													'onclick' => 'return editSubcategory('.$result->id.')'
												);
																			
										echo '<tr>
													<td>'.$s_no.'</td>
													<td><input type="text" id="title_'.$result->id.'" value="'.$result->title.'" placeholder="Title" readonly="readonly" style="border:none;"></td>																								
													<td class="center">'.anchor('', 'Edit', $attr).' | 
																		'.anchor('category/deleteSubCategory/'.$category_id.'/'.$result->id.'', 'Delete', 'class="link-class"').'																		
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
			
          