(function($) {

	var myScrollTop = 0;

	jQuery.fn.preventScrolling = function() {
		if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
			myScrollTop = $('body').scrollTop();

			var wpadminbar = 0; 
			if ($('#wpadminbar').length != 0) {
				wpadminbar = $('#wpadminbar').outerHeight();
			}

			thisOffset = myScrollTop - wpadminbar;
			offsetString = "-" + thisOffset + "px";

			$(this).css({
			    'top': offsetString,
			    'position':'fixed'
			});

		}
	}

	jQuery.fn.allowScrolling = function() {
		if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {

			$(this).css({
			    'top': "auto",
			    'position':'static'
			});

			$( "body" ).scrollTop( myScrollTop );
			myScrollTop = 0;

		}
	}

	$(document).ready(function() {

		$('body').addClass('js');

		$('.shownav').on( "click", function( event ) {
			event.preventDefault();
			$('.navigation').removeClass('hidden');
			$('body').addClass('hasoverlay');
			$('#content').preventScrolling();
		});

		$('.hidenav').on( "click", function( event ) {
			event.preventDefault();
    		$('.navigation').addClass('hidden');
			$('body').removeClass('hasoverlay');
			$('#content').allowScrolling();
		});

		var topheaderHeight = $('.topheader').outerHeight();

		$('.contentpadding').css({
			'padding-top' : topheaderHeight + 'px'
		});

		var hidenavHeight = $('.hidenav').outerHeight();

		$('.navigationpadding').css({
			'margin-top' : hidenavHeight + 'px'
		});


	});

})(jQuery);
