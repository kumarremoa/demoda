$c(function(){
	$c('#picker01').colpick({flat:true});
	$c('#picker02').colpick({flat:true,colorScheme:'dark'});
	
	$c('#picker1').colpick().keyup(function(){
		$c(this).colpickSetColor(this.value);
	});
	
	$c('#picker2').colpick({
		flat:true,
		layout:'hex',
		submit:0
	});
	
	$c('#picker3').colpick({
		layout:'hex',
		colorScheme:'dark',
		submit:0,
		onChange:function(hsb,hex,rgb,el,bySetColor) {
			$c(el).css('border-color','#'+hex);
			// Fill the text box just if the color was set using the picker, and not the colpickSetColor function.
			if(!bySetColor) $c(el).val(hex);
		}
	}).keyup(function(){
		$c(this).colpickSetColor(this.value);
	});
	
	
	$c('.ex-color-box').colpick({
		colorScheme:'dark',
		layout:'rgbhex',
		color:'ff8800',
		livePreview:0,
		onSubmit:function(hsb,hex,rgb,el) {
			$c(el).css('background-color', '#'+hex);
			$c(el).colpickHide();
		}
	})
	.css('background-color', '#ff8800');
});