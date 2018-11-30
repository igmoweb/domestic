require( 'foundation-sites/dist/js/plugins/foundation.core' );
require( 'foundation-sites/dist/js/plugins/foundation.util.keyboard.min.js' );
require( 'foundation-sites/dist/js/plugins/foundation.util.box.min.js' );
require( 'foundation-sites/dist/js/plugins/foundation.util.nest.js' );
require( 'foundation-sites/dist/js/plugins/foundation.util.mediaQuery.js' );
require( 'foundation-sites/dist/js/plugins/foundation.util.triggers.js' );
require( 'foundation-sites/dist/js/plugins/foundation.dropdownMenu.min.js' );
require( 'foundation-sites/dist/js/plugins/foundation.offcanvas.min.js' );

jQuery( document ).ready( function( jQuery ) {
	jQuery( document ).foundation();

	const carousel = jQuery( '.owl-carousel' );
	if ( ! carousel.length ) {
		return;
	}

	const postsNumber = domesticJS.stickyCarouselCount || 0;
	carousel.owlCarousel({
		responsiveClass: true,
		dots: false,
		center: false,
		loop: false,
		autoHeight: false,
		margin: 0,
		touchDrag: false,
		mouseDrag: true,
		navText: [ '<span class="dashicons dashicons-arrow-left-alt2"></span>', '<span class="dashicons dashicons-arrow-right-alt2"></span>' ],
		nav: true,
		responsive: {
			0: {
				items: Math.min( 1, postsNumber ),
				nav: true,
			},
			600: {
				items: Math.min( 2, postsNumber ),
				nav: false,
			},
			1000: {
				items: Math.min( 3, postsNumber ),
				nav: true,
			},
		},
		onInitialized: () => {
			jQuery( '.owl-carousel.owl-theme' ).show();
		},
	});
});
