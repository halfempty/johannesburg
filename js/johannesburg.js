(function($) {

	$(document).ready(function() {

		$('body').addClass('js');

		$('h1.shownav').on( "click", function( event ) {
			event.preventDefault();
    		$('.navigation').toggleClass('hidden');
    		$('body').toggleClass('hasoverlay');
		});

		$('.hidenav').on( "click", function( event ) {
			event.preventDefault();
    		$('.navigation').addClass('hidden');
			$('body').removeClass('hasoverlay');
    
		});

		var headerHeight = $('h1').outerHeight();

		$('.pagetitle').css({
			'margin-top' : headerHeight + 'px'
		});

		$('.navigation').find('.padding').css({
			'padding-top' : headerHeight + 'px'
		});

		$('.navigation').find('.padding').css({
			'padding-top' : headerHeight + 'px'
		});

		$('.homemenu').css({
			'padding-top' : headerHeight + 'px'
		});

	});

})(jQuery);
