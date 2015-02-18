(function($) {

	function setHeights() {

		var contentwidth = $(window).width();
		var contentheight = $(window).height();
		
		var wpadminbar = 0;
		
		if ($('#wpadminbar').length != 0) {
			wpadminbar =+ $('#wpadminbar').outerHeight();
		} 

		contentheight = contentheight - wpadminbar;

		$( ".imageslide" ).each(function( index ) {

			var slideHeight = contentheight;
			slideHeight = slideHeight - parseInt($(this).css('padding-top'), 10);
			slideHeight = slideHeight - parseInt($(this).css('padding-bottom'), 10);

			$(this).find('img').css({
				'max-height': slideHeight +'px',
			});

		});

		$( ".videoslide" ).each(function( index ) {

			var slideHeight = contentheight;
			slideHeight = slideHeight - parseInt($(this).css('padding-top'), 10);
			slideHeight = slideHeight - parseInt($(this).css('padding-bottom'), 10);

			$(this).find('iframe').css({
				'max-height': slideHeight +'px',
			});

		});

	}


	$(document).ready(function() {
		setHeights();
	});

	$(document).load(function() {
		setHeights();
	});

	$(window).resize(function() {
		setHeights();
	});


	$(function() {

	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {

			var wpadminbar = 0;

			if ($('#wpadminbar').length != 0) {
				wpadminbar =+ $('#wpadminbar').outerHeight();
			}

			var targetoffset = target.offset().top - wpadminbar;

	        $('html,body').animate({
	          scrollTop: targetoffset
	        }, 250);
	        return false;
	      }
	    }
	  });
	});

})(jQuery);

