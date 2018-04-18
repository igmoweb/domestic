<?php
/**
 * Change the class for sticky posts to .wp-sticky to avoid conflicts with Foundation's Sticky plugin
 *
 * @package FoundationPress
 * @since FoundationPress 2.2.0
 */

if ( ! function_exists( 'domestic_sticky_posts' ) ) :
	function domestic_sticky_posts( $classes ) {
		if ( in_array( 'sticky', $classes, true ) ) {
			$classes   = array_diff( $classes, [ 'sticky' ] );
			$classes[] = 'wp-sticky';
		}
		return $classes;
	}
	add_filter( 'post_class', 'domestic_sticky_posts' );

endif;

if ( ! function_exists( 'domestic_home_query' ) ) :
	/**
	 * Remove sticky posts from home page query
	 *
	 * This function is attached to the 'pre_get_posts' action hook.
	 *
	 * @param WP_Query $query
	 *
	 * @since 1.0.0
	 */
	function domestic_home_query( $query ) {
		if ( domestic_display_sticky_slider() && $query->is_main_query() ) {
			$query->set( 'post__not_in', (array) get_option( 'sticky_posts' ) );
		}
	}

	add_action( 'pre_get_posts', 'domestic_home_query' );
endif;


if ( ! function_exists( 'domestic_display_sticky_slider' ) ) :
	function domestic_display_sticky_slider() {
		return ( get_theme_mod( 'domestic_show_sticky_slider', true ) && is_home() && ! is_admin() );
	}
endif;

if ( ! function_exists( 'domestic_get_sticky_carousel_query' ) ) :
	function domestic_get_sticky_carousel_query() {
		$args = [
			'post_type'      => 'post',
			'post__in'       => get_option( 'sticky_posts' ),
			'posts_per_page' => count( get_option( 'sticky_posts' ) ),
		];

		return new WP_Query( $args );
	}
endif;

if ( ! function_exists( 'domestic_get_sticky_slider_slides' ) ) :
	function domestic_get_sticky_slider_slides() {
		return absint( get_theme_mod( 'domestic_sticky_slider_slides', 5 ) );
	}
endif;
