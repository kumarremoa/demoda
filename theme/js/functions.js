function set_size(product_size)
{
	$('span.size').removeClass('selected');
	$('#size_'+product_size).addClass('selected');
	$('#product_size').val(product_size);	
}

function set_color(color_code)
{
	$('span.color').removeClass('selected');
	$('#color_'+color_code).addClass('selected');
	$('#product_color').val(color_code);	
}

function validate_add_to_cart()
{
	if($('#product_color').val() == '')
	{
		alert('Please select color.');
		return false;
	}
	else if($('#product_size').val() == '')
	{
		alert('Please select size.');
		return false;
	}
	else
		return true;
}


function change_total_amount(cart_id,unit_price,quantity)
{
	total_amount = unit_price*quantity;
	$('#total_amount_'+cart_id).html(total_amount);
	tot_ship_amnt = Number(total_amount) + Number($('shipping_fee').val());
	$('#total_amount_cart').html(tot_ship_amnt)
	gross_amount = 0;
	$('.span_total_amount').each(function(){
		gross_amount += Number($(this).html());		
	});
	$('#gross_amount').html(gross_amount);
}

/** 
 * check whether payment_method authorize .net is checked or not
 * if checked then show card details 
 */
$(document).ready(function(){
	if($('#payment_method').is(':checked'))
		card_details('show');
});

function card_details(action)
{
	if(action == 'show')
	{
		$('.card_details').show("slow");		
		$('.card_details input').attr('required','required');
	}
	else
	{
		$('.card_details').hide("slow");
		$('.card_details input').attr('required',false);
	}
}


// search box width
/*$(document).ready(function(){
	$('.sb-icon-search').click(function(){		
		$('.search').animate({
				width: "230px"
			}, 300 );
	});
	
	$('.sb-search-submit').click(function(){		
		$('.search').animate({
				width: "65px"
			}, 300 );
	});
	
	$(document).click(function(){		
		$('.search').animate({
				width: "65px"
			}, 300 );
	});	
});*/


// session message slide down
function show_message_element(message_text)
{
	$('.fixed_div').html(message_text);
	$('.fixed_div').slideDown('slow');
	$('.fixed_div').delay(2000).slideUp('slow');
}
function findTarget(target) {
    window.open(target);// = target;
}
function priceFilter(category) {
  min = $('#slider-margin-value-min').text().replace('₹', '');
  max = $('#slider-margin-value-max').text().replace('₹', '');
  url = 'find-'+category+'-'+min+'-to-'+max;
  window.location.href = url;
}
