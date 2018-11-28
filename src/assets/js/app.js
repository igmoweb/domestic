// import whatInput from 'what-input';
//
// // If you want to pick and choose which modules to include, comment out the above and uncomment
// // the line below
// import { Foundation } from 'foundation-sites/js/foundation.core';
// import { rtl, GetYoDigits, transitionend } from 'foundation-sites/js/foundation.util.core';
// import { DropdownMenu } from 'foundation-sites/js/foundation.dropdownMenu';
// import { OffCanvas } from 'foundation-sites/js/foundation.offcanvas';
//
//
// Foundation.addToJquery(jQuery);
//
// // Add Foundation Utils to Foundation global namespace for backwards
// // compatibility.
//
// Foundation.rtl = rtl;
// Foundation.GetYoDigits = GetYoDigits;
// Foundation.transitionend = transitionend;
//
// // Touch and Triggers previously were almost purely sede effect driven,
// // so no // need to add it to Foundation, just init them.





// module.exports = Foundation;


jQuery( document ).ready( function( jQuery ) {
	// Foundation.plugin(Foundation.DropdownMenu(), 'DropdownMenu');
	// Foundation.plugin(Foundation.OffCanvas(), 'OffCanvas');

	var carousel = jQuery('.owl-carousel');
	var postsNumber = domesticJS.stickyCarouselCount || 0;
	if ( ! carousel.length ) {
		return;
	}
	carousel.owlCarousel({
		responsiveClass:true,
		dots: false,
		center:false,
		loop:false,
		autoHeight: true,
		margin:0,
		touchDrag:false,
		mouseDrag:true,
		navText: ['<span class="dashicons dashicons-arrow-left-alt2"></span>','<span class="dashicons dashicons-arrow-right-alt2"></span>'],
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
