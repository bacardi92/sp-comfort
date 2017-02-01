jQuery(document).ready(function($){


	$(window).scroll(function () {
		if( $(window).width() < 768 ){
			$('#bc_header').removeClass('sticky');
      		$('#bc_header').addClass('non-sticky');
		}else{
	    	if( $(window).scrollTop() > $('#bc_header').height() && !($('#bc_header').hasClass('sticky'))){
	      		$('#bc_header').addClass('sticky');
	      		$('#bc_header').removeClass('non-sticky');
			} else if ($(window).scrollTop() == 0){
	      		$('#bc_header').removeClass('sticky');
	      		$('#bc_header').addClass('non-sticky');
	    	}
	    }
	});


		
 	$('.slick').slick({
	  dots: true,
	  infinite: true,
	  speed: 500,
	  fade: true,
	  autoplay: true,
	  autoplaySpeed: 2000,
	  cssEase: 'linear',
	  click: false,
	  lazyLoaded: 'image',
	  pauseOnHover: true,
	  responsive: [

	  	{
		    breakpoint: 992,
		      settings: {		        
		        infinite: true,
		        dots: true,
		        touchMove: false
		      }
		    },
		    {
		      breakpoint: 768,
		      settings: {		     
		        dots: false,
		        arrows: false,	
		        touchMove: true,
		      }
		    },
		    {
		      breakpoint: 544,
		      settings: {
		      	arrows: false,	
		      	touchMove: true,	         
		        dots: false
		      }
		    }

	  ]
	});
  	$('.your-class').show();
   

});