/**
 * File customize-preview.js.
 *
 * Instantly live-update customizer settings in the preview for improved user experience.
 */

(function( $ ) {
	// Update menu schema colors in real time
						wp.customize( 'domestic_menu_schema', function( value ) {
		value.bind( function( newval ) {
			const $body = $('body');
			switch ( newval ) {
				case 'dark': {
					$body.removeClass( 'domestic-menu-schema-light' );
					$body.addClass( 'domestic-menu-schema-dark' );
					break;
				}
				case 'light': {
					$body.removeClass( 'domestic-menu-schema-dark' );
					$body.addClass( 'domestic-menu-schema-light' );
					break;
				}
			}
		} );
	} );

	// Update Front page sections in real time
	console.log( domesticCustomize.sections );
	Object.keys( domesticCustomize.sections ).forEach( ( sectionKey ) => {
		console.log( sectionKey );
		wp.customize( 'domestic_front_page_section_color_' + sectionKey, ( value ) => {
			value.bind( ( newval ) => {
				$( '.front-page-section-key-' + sectionKey ).css( 'color', newval );
			} );
		} );

		wp.customize( 'domestic_front_page_section_background_' + sectionKey, ( value ) => {
			value.bind( ( newval ) => {
				$( '.front-page-section-key-' + sectionKey ).css( 'background-color', newval );
			} );
		} );
	});

} )( jQuery );
