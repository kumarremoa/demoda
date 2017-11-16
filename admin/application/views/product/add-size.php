 <!-- main content -->
	
            <div id="contentwrapper">
                <div class="main_content">
                    
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
						
							<form class="form-horizontal well" method="POST" action="addSize" enctype="multipart/form-data">
							<div class="heading clearfix">
								<h3 class="pull-left">Add Size</h3>
							</div>
							
							<div class="control-group">
								<label class="control-label">Size<span class="f_req">*</span></label>
								<div class="controls">
								<input type="text" name="size" required="required" autocomplete="off" />													
								</div>
							</div>	
										
							<button class="btn" type="submit">Add</button>
							
							</form>
						</div>						
					</div>
                    
                    
                    <div class="row-fluid">
						<div class="span12">
						
                        <div class="heading clearfix">
								<h3 class="pull-left">Available Sizes</h3>
							</div>
                        <?php
							//echo '<pre>'; print_r($color_list);
							
							if(sizeof($size_list) > 0)
							{
								foreach($size_list as $size)
								{
									echo '<button class="btn m5" type="button" onclick="mark_unmark_size('.$size->id.')" id="size_'.$size->id.'">'.$size->name.'</button>';
									//echo '<span style="width:25px; height:25px; margin:5px; display: inline-block; background:#'.$size->name.';" onclick="mark_unmark('.$size->id.')" id="size_'.$size->id.'"></span>';	
								}
								
								echo ' <form method="POST" action="deleteSize">
											<input type="hidden" name="size_ids" id="size_ids" />
											<button class="btn" type="submit">Delete</button>
										</form>';
							}
							else
								echo 'No size attribute addded.';
							
						?>
                        
                        
                       
							
						</div>						
					</div>
					
                </div>
            </div>
			
          