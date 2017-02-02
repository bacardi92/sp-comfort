jQuery(document).ready(function($){

	var Icomoon = {

		icons: $(".icomoonWrapper"),	

		changeIcon: function(){
			$(document).on('click', ".icomoonWrapper", function(e){
				e.preventDefault;
				var icon_name = $(this).data('icon');
				$(this).parent().find(".icomoonWrapper").removeClass('selected');
				$(this).addClass('selected');
				$(this).parent().find('input').val(icon_name);
			});
		},

		init: function(){
			this.changeIcon();
		}

	}


	Icomoon.init();

});