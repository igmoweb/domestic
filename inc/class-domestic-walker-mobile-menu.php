<?php
/**
 * Customize the output of menus for Foundation mobile walker
 *
 * @package Domestic
 * @since 1.0.0
 */

/**
 * Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
 */

if ( ! class_exists( 'Domestic_Walker_Mobile_Menu' ) ) {
	class Domestic_Walker_Mobile_Menu extends Walker_Nav_Menu {
		function start_lvl( &$output, $depth = 0, $args = [] ) {
			$indent  = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul class=\"vertical nested menu\">\n";
		}
	}
}
