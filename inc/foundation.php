<?php
/**
 * Foundation fixes
 *
 * @package Domestic
 * @since Domestic 1.0.0
 */

if ( ! function_exists( 'domestic_active_nav_class' ) ) :
	/**
	 * Add Foundation 'is-active' class for the current menu item.
	 *
	 * @since 1.0.0
	 *
	 * @param array   $classes Current active nav element list of classes.
	 * @param WP_Post $item Item object.
	 *
	 * @return array New classes list
	 */
	function domestic_active_nav_class( $classes, $item ) {
		if ( 1 === $item->current || true === $item->current_item_ancestor ) {
			$classes[] = 'is-active';
		}

		return $classes;
	}
endif;
add_filter( 'nav_menu_css_class', 'domestic_active_nav_class', 10, 2 );

if ( ! function_exists( 'domestic_active_list_pages_class' ) ) :
	/**
	 * Use the is-active class of ZURB Foundation on wp_list_pages output.
	 *
	 * @since 1.0.0
	 *
	 * @param string $input HTML output of the pages list.
	 *
	 * @return null|string|string[]
	 */
	function domestic_active_list_pages_class( $input ) {

		$pattern = '/current_page_item/';
		$replace = 'current_page_item is-active';

		return preg_replace( $pattern, $replace, $input );
	}
endif;
add_filter( 'wp_list_pages', 'domestic_active_list_pages_class', 10 );
