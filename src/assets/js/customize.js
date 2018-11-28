/**
 * File customize-preview.js.
 *
 * Instantly live-update customizer settings in the preview for improved user experience.
 */

(function( $ ) {
	// Update menu schema colors in real time
	wp.customize( 'domestic_menu_schema', function( value ) {
		value.bind( function( newval ) {
			const $body = $( 'body' );
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
})( jQuery );
