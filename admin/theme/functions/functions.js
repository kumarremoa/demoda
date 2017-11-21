site_url = "/demoda/demoda.git/admin/index.php/";


function editSubcategory(id)
{
	//alert(id);
	title = '#title_'+id;
	edit_link = '.edit_link_'+id;
	
	$(title).focus();
	$(title).attr('readonly',false);	
	
	$(edit_link).attr('onclick','return updateSubCategory('+id+')');
	$(edit_link).text('Save');	
	
	return false;
}

//function editSubcategory(id)
function updateSubCategory(id)
{
	title = $('#title_'+id).val();
	//alert(site_url+'category/updateSubCategory/'+id+'/'+title);  return false;
	$.ajax({
		   
		   type : 'POST',
		   url : site_url+'category/updateSubCategory/'+id+'/'+title,
		   success : function(response){
					
					//alert(response);
						if(response == 'updated')
						{
							$('#title_'+id).attr('readonly',true);
							$('.edit_link_'+id).attr('onclick','return editSubcategory('+id+')');
							$('.edit_link_'+id).text('Edit');
						}
						else
						{
							alert('Title must be filled out.');	
						}
			   }
		   
		   });
		   
	 return false;
		 
}

function list_subcategories(category_id)
{
	$.ajax({
		   
		   type : 'POST',
		   url : site_url+'category/listSubcategories/'+category_id,
		   success : function(response){
					
					//alert(response);
						$('#sub_category_id').html(response);
						/*if(response == 'updated')
						{
							$('#title_'+id).attr('readonly',true);
							$('.edit_link_'+id).attr('onclick','return editSubcategory('+id+')');
							$('.edit_link_'+id).text('Edit');
						}
						else
						{
							alert('Title must be filled out.');	
						}*/
			   }
		   
		   });
}

function update_delivery_status(status,order_id)
{
	$.ajax({
		   
		   type : 'POST',
		   url : site_url+'orders/updateDeliveryStatus/'+order_id+'/'+status,
		   success : function(response){
					
					//alert(response);
					$('#response').show();
					$('#response').html(response);
						
			   }
		   
		   });
}

function mark_unmark(color_id)
{
	//alert($('#color_'+color_id).attr('class'));
	if($('#color_'+color_id).attr('class') != 'marked')
	{
		$('#color_'+color_id).addClass('marked');
		$('#color_ids').val($('#color_ids').val()+color_id+'~');
	}
	else
	{
		$('#color_'+color_id).removeClass('marked');
		ids = $('#color_ids').val();
		$('#color_ids').val(ids.replace(color_id+'~',''));
		
	}
}

function mark_unmark_size(size_id)
{	
	// array of class applied
	classList = $('#size_'+size_id).attr('class').split(/\s+/);	
	
	if($.inArray('marked',classList) == -1)
	{
		$('#size_'+size_id).addClass('marked');
		$('#size_ids').val($('#size_ids').val()+size_id+'~');
	}
	else
	{
		$('#size_'+size_id).removeClass('marked');
		ids = $('#size_ids').val();
		$('#size_ids').val(ids.replace(size_id+'~',''));
		
	}
}


function editBrand(id)
{
	brand = '#brand_'+id;
	edit_link = '.edit_link_'+id;
	
	$(brand).focus();
	$(brand).attr('readonly',false);	
	
	$(edit_link).attr('onclick','return updateBrand('+id+')');
	$(edit_link).text('Save');	
	
	return false;	
}

function updateBrand(id)
{
	new_brand_name = $('#brand_'+id).val();
	$.ajax({
		   
		   type : 'POST',
		   url : site_url+'product/updateBrand/'+id+'/'+new_brand_name,
		   success : function(response){
					
					//alert(response);
						if(response == 'updated')
						{
							$('#brand_'+id).attr('readonly',true);
							$('.edit_link_'+id).attr('onclick','return editBrand('+id+')');
							$('.edit_link_'+id).text('Edit');
						}
						else
						{
							alert('Name must be filled out.');	
						}
			   }
		   
		   });
		   
	 return false;
}


function available_color(color_code)
{
	// array of class applied
	classList = $('#color_'+color_code).attr('class').split(/\s+/);	
	
	if($.inArray('selected',classList) == -1)
	{
		$('.colorbox a').removeClass('error');
		
		$('#color_'+color_code).addClass('selected');
		$('#color_codes').val($('#color_codes').val()+color_code+'~');
	}
	else
	{
		$('#color_'+color_code).removeClass('selected');
		ids = $('#color_codes').val();
		$('#color_codes').val(ids.replace(color_code+'~',''));
		
	}
}


/**  scroll to element function **/
function scrollToElement(selector, time, verticalOffset) {
	time = typeof(time) != 'undefined' ? time : 500;
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $(selector);
	offset = element.offset();
	offsetTop = offset.top + verticalOffset;
	$('html, body').animate({
		scrollTop: offsetTop
	}, time);			
}

// validate add_product form available colors
function check_valid()
{
	if($('#color_codes').val() == '')
	{
		scrollToElement('.colorbox', 1000, -150);
		$('.colorbox li a').addClass('error');
		return false;	
	}
}


// show hide discount_section
function discount_section(is_discount)
{
	if(is_discount == 1)
	{
		$('.discount_section').show('slow');
		$('#discount_price').attr('required',true);	
	}
	else
	{
		$('.discount_section').hide('slow');
		$('#discount_price').attr('required',false);
	}
		
}
