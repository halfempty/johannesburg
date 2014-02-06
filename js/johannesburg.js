(function($) {

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


	});

})(jQuery);
