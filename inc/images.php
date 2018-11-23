<?php
/**
 * Configure responsive images sizes
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 2.6.0
 */

// Add featured image sizes
//
// Sizes are optimized and cropped for landscape aspect ratio
// and optimized for HiDPI displays on 'small' and 'medium' screen sizes.
add_image_size( 'featured-small', 640, 200, true ); // name, width, height, crop
add_image_size( 'featured-medium', 870, 500, true );
add_image_size( 'featured-large', 1440, 650, true );
add_image_size( 'featured-xlarge', 1920, 800, true );
add_image_size( 'sticky-carousel', 700, 300, true );
add_image_size( 'featured-page', 1920, 500, true );

add_image_size( 'front-section-fullwidth', 1920, 0, true );
add_image_size( 'front-section-small', 640, 0, true );

// Add additional image sizes
add_image_size( 'fp-small', 640 );
add_image_size( 'fp-medium', 1024 );
add_image_size( 'fp-large', 1200 );
add_image_size( 'fp-xlarge', 1920 );

// Register the new image sizes for use in the add media modal in wp-admin
function domestic_custom_sizes( $sizes ) {
	return array_merge(
		$sizes, [
			'fp-small'  => __( 'FP Small', 'domestic' ),
			'fp-medium' => __( 'FP Medium', 'domestic' ),
			'fp-large'  => __( 'FP Large', 'domestic' ),
			'fp-xlarge' => __( 'FP XLarge', 'domestic' ),
		]
	);
}
add_filter( 'image_size_names_choose', 'domestic_custom_sizes' );
