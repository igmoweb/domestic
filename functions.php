<?php
/**
 * Domestic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Domestic
 * @since 1.0.0
 */

/** Required for Foundation to work properly */
require_once get_template_directory() . '/inc/foundation.php';

/** Register all navigation menus */
require_once get_template_directory() . '/inc/navigation.php';

/** Add menu walkers for top-bar and off-canvas */
require_once get_template_directory() . '/inc/class-domestic-walker-top-bar.php';
require_once get_template_directory() . '/inc/class-domestic-walker-mobile-menu.php';

/** Create widget areas in sidebar and footer */
require_once get_template_directory() . '/inc/widget-areas.php';

/** Enqueue scripts */
require_once get_template_directory() . '/inc/enqueue-scripts.php';

/** Add theme support */
require_once get_template_directory() . '/inc/theme-support.php';

/** Add Nav Options to Customer */
require_once get_template_directory() . '/inc/customizer.php';


require_once get_template_directory() . '/inc/jetpack.php';

/** Change WP's sticky post class */
require_once get_template_directory() . '/inc/sticky-slider.php';

/** Configure responsive image sizes */
require_once get_template_directory() . '/inc/images.php';

require_once get_template_directory() . '/inc/content.php';

/** WP Editor setup */
require_once get_template_directory() . '/inc/wp-editor.php';
