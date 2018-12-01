<?php
/**
 * Configure responsive images sizes
 *
 * @package WordPress
 * @subpackage Domestic
 * @since Domestic 2.6.0
 */

// Add featured image sizes
//
// Sizes are optimized and cropped for landscape aspect ratio
// and optimized for HiDPI displays on 'small' and 'medium' screen sizes.
add_image_size( 'featured-medium', 870, 500, true );
add_image_size( 'featured-xlarge', 1920, 800, true );
add_image_size( 'sticky-carousel', 700, 300, true );
add_image_size( 'featured-page', 1920, 500, true );
