(function ($) {
	"use strict";

	/*** Sticky header */
	$(window).scroll(function(){
		if($("body").scrollTop() > 0 || $("html").scrollTop() > 0) {
			$(".navbar").addClass("stop");
		} else {
			$(".navbar").removeClass("stop");
		}
	});

	$(".navbar-toggle").click(function() {
		$(this).toggleClass('in');
	});

	$('.scrollDown').click(function() {
		  var target = $('#primary');
		  if (target.length) {
		    $('html,body').animate({
		      scrollTop: target.offset().top - 120
		    }, 1000);
		  }
	});

	/*** Header height = gutter height */
	function setGutterHeight(){
		var header = document.querySelector('.navbar'),
			  gutter = document.querySelector('.header_gutter');
		if (gutter) {
			gutter.style.height = header.offsetHeight + 'px';
		}
	}
	window.onload = setGutterHeight;
	window.onresize = setGutterHeight;

	/*** Smooth scroll */
	$('.smoothScroll').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});

	$('.project-gallery').magnificPopup({
		// delegate: 'a',
		type: 'image',
		midClick: true,
        fixedBgPos: true,
		removalDelay: 500,
		fixedContentPos: false,
		mainClass: 'mfp-img-mobile',
		tLoading: 'Loading image #%curr%...',
		closeMarkup: '<button title="%title%" type="button" class="mfp-close">Close</button>',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				//return item.el.attr('title') + '<small>by Marsel Van Oosten</small>'
			}
		},
		callbacks: {
		    beforeOpen: function() {
		       	this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
       			this.st.mainClass = this.st.el.attr('data-effect');
		    },
		    buildControls: function() {
		      // re-appends controls inside the main container
		      //this.contentContaine.append(this.arrowLeft.add(this.arrowRight));
		    }
		}
	});

}(jQuery));