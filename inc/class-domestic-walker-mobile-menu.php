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

	/**
	 * Class used to implement an HTML list of the mobile bar menu
	 *
	 * @since 3.0.0
	 *
	 * @see Walker_Nav_Menu
	 */
	class Domestic_Walker_Mobile_Menu extends Walker_Nav_Menu {
		/**
		 * Starts the list before the elements are added.
		 *
		 * @since 3.0.0
		 *
		 * @see Walker::start_lvl()
		 *
		 * @param string $output Used to append additional content (passed by reference).
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   An object of wp_nav_menu() arguments.
		 */
		public function start_lvl( &$output, $depth = 0, $args = [] ) {
			$indent  = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul class=\"vertical nested menu\">\n";
		}
	}
}
