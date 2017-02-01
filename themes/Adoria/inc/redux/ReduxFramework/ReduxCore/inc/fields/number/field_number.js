jQuery(document).ready(function($){

	$(".regular-number").each(function(){

		$(this).keypress(function(){
			if(parseInt($(this).val())>parseInt($(this).attr('max'))){
				$(this).val(parseInt($(this).attr('max')))
				return false;
			}
			if(parseInt($(this).val())<parseInt($(this).attr('min'))){
				$(this).val(parseInt($(this).attr('min')))
				return false;
			};
		})
		$(this).keyup(function(){
			if(parseInt($(this).val())>parseInt($(this).attr('max'))){
				$(this).val(parseInt($(this).attr('max')))
				return false;
			}
			if(parseInt($(this).val())<parseInt($(this).attr('min'))){
				$(this).val(parseInt($(this).attr('min')))
				return false;
			};
		})
		$(this).keydown(function(){
			if(parseInt($(this).val())>parseInt($(this).attr('max'))){
				$(this).val(parseInt($(this).attr('max')))
				return false;
			}
			if(parseInt($(this).val())<parseInt($(this).attr('min'))){
				$(this).val(parseInt($(this).attr('min')))
				return false;
			};
			
		})

	})

});