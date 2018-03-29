<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Required for Foundation to work properly */
require_once( 'inc/foundation.php' );

/** Format comments */
require_once( 'inc/class-domestic-walker-comments.php' );

/** Register all navigation menus */
require_once( 'inc/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'inc/class-foundationpress-top-bar-walker.php' );
require_once( 'inc/class-domestic-walker-mobile-menu.php' );

/** Create widget areas in sidebar and footer */
require_once( 'inc/widget-areas.php' );

/** Enqueue scripts */
require_once( 'inc/enqueue-scripts.php' );

/** Add theme support */
require_once( 'inc/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'inc/customizer.php' );


require_once( 'inc/jetpack.php' );

/** Change WP's sticky post class */
require_once( 'inc/sticky-slider.php' );

/** Configure responsive image sizes */
require_once( 'inc/images.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'inc/class-foundationpress-protocol-relative-theme-assets.php' );

require_once( 'inc/content.php' );
require_once( 'inc/query.php' );