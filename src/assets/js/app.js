import whatInput from 'what-input';


import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';

jQuery(document).foundation();

jQuery( document ).ready( function( $ ) {
	var carousel = $('.owl-carousel');
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
		navText: ['<i class="material-icons">keyboard_arrow_left</i>','<i class="material-icons">keyboard_arrow_right</i>'],
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