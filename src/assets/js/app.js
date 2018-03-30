import whatInput from 'what-input';

// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
import { Foundation } from 'foundation-sites/js/foundation.core';
import { rtl, GetYoDigits, transitionend } from 'foundation-sites/js/foundation.util.core';
import { DropdownMenu } from 'foundation-sites/js/foundation.dropdownMenu';
import { OffCanvas } from 'foundation-sites/js/foundation.offcanvas';


Foundation.addToJquery(jQuery);

// Add Foundation Utils to Foundation global namespace for backwards
// compatibility.

Foundation.rtl = rtl;
Foundation.GetYoDigits = GetYoDigits;
Foundation.transitionend = transitionend;

// Touch and Triggers previously were almost purely sede effect driven,
// so no // need to add it to Foundation, just init them.




Foundation.plugin(DropdownMenu, 'DropdownMenu');

Foundation.plugin(OffCanvas, 'OffCanvas');


module.exports = Foundation;


jQuery(document).foundation();

jQuery( document ).ready( function( jQuery ) {
	var carousel = jQuery('.owl-carousel');
	var postsNumber = domesticJS.stickyCarouselCount || 0;
	if ( ! carousel.length ) {
		return;
	}
	carousel.owlCarousel({
		responsiveClass:true,
		dots: false,
		center:false,
		// autoplay:true,
		loop:false,
		autoHeight: true,
		// autoplaySpeed:1200,
		// autoplayTimeout:11000,
		margin:0,
		touchDrag:false,
		mouseDrag:true,
		navText: ['<','>'],
		nav:true,
		responsive:{
			0:{
				items:Math.min( 1, postsNumber ),
				nav:true
			},
			600:{
				items:Math.min( 3, postsNumber ),
				nav:false
			},
			1000:{
				items:Math.min( 3, postsNumber ),
				nav:true,
			}
		}
	});
});