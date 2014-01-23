(function($) {

	jQuery.fn.fadeAway = function() {

		$(this).doTimeout( 5000, function(){

			$(this).stop().fadeTo( "slow", 0, function() {
			    // Animation complete.
			  });

			$(this).mouseenter(function() {
				$(this).fadeBack();
			});

		});

	}

	jQuery.fn.fadeBack = function() {
		$(this).fadeTo( 300 , 100, function() {
			$(this).fadeAway();
		  });
	}

	$(document).ready(function() {

		$('body').addClass('js');

		$('.shownav').on( "click", function( event ) {
			event.preventDefault();
    		$('.navigation').removeClass('hidden');
		});

		$('.hidenav').on( "click", function( event ) {
			event.preventDefault();
    		$('.navigation').addClass('hidden');
		});

		var headerHeight = $('.header').outerHeight();

		$('.content').css({
			'margin-top' : headerHeight + 'px'
		});


		/* With Gallery */

		if ($('.gallery').length != 0) {
			$('.header').fadeAway();
		}

	});

})(jQuery);
