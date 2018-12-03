<?php
/**
 * Customize the output of menus for Foundation top bar
 *
 * @package Domestic
 * @since Domestic 1.0.0
 */

/**
 * Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
 */

if ( ! class_exists( 'Domestic_Walker_Top_Bar' ) ) :
	/**
	 * Class used to implement an HTML list of the top bar menu
	 *
	 * @since 1.0.0
	 *
	 * @see Walker_Nav_Menu
	 */
	class Domestic_Walker_Top_Bar extends Walker_Nav_Menu {
		/**
		 * Starts the list before the elements are added.
		 *
		 * @since 1.0.0
		 *
		 * @see Walker_Nav_Menu::start_lvl()
		 *
		 * @param string $output Used to append additional content (passed by reference).
		 * @param int    $depth  Depth of menu item. Used for padding.
		 * @param array  $args   An object of wp_nav_menu() arguments.
		 */
		public function start_lvl( &$output, $depth = 0, $args = [] ) {
			$indent  = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul class=\"dropdown menu vertical\" data-toggle>\n";
		}
	}
endif;
