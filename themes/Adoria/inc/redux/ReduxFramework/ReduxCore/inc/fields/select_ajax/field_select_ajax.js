(function($){

	$(document).ready(function(){

		// if($("body.toplevel_page_theme_options").length == 0) return;

		var _this ={

			selectInit: function(){

				$.each($(".select_ajax"), function(){
					var $type = $(this).data('type');
					var $multiple = $(this).hasClass('multiple');
					 
					$(this).select2({

						ajax: {

							url:ajaxurl,
							dataType: 'json',
							delay: 250,
							data: function (params) {

								return{
									q: $(".select2-search__field").val(),
									action: '_bc_redux_load_data',
									type: $type

								};

							},
							processResults: function (data) {

								return {
									results: data
								}
							},

							cache: true
						},
						escapeMarkup: function (markup) { return markup; }, 
						minimumInputLength: 1,
						maximumSelectionLength: 10,
						multiple: $multiple

					});

				});

			}

		}

		_this.selectInit();

	});

})(jQuery)

