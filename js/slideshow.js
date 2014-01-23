(function($) {
$(document).ready(function() {

	function setHeights() {

		var contentwidth = $(window).width();
		var contentheight = $(window).height();

		var wpadminbar = 0;

		if ($('#wpadminbar').length != 0) {
			wpadminbar =+ $('#wpadminbar').outerHeight();
		} 

		contentheight = contentheight - wpadminbar;		
		$('.slide').css({
	 		'height': contentheight +'px',
		});

		var galleryheight = $('.gallery').outerHeight();

	}

	$(window).resize(function() {
	  setHeights();
	});

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

