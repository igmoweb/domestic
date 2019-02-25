<?php
/**
 * Change the class for sticky posts to .wp-sticky to avoid conflicts with Foundation's Sticky plugin
 *
 * @package Domestic
 * @since Domestic 2.2.0
 */

if ( ! function_exists( 'domestic_sticky_posts' ) ) :
	/**
	 * Add a new class to posts that are sticky
	 *
	 * @param array $classes Current array of post classes.
	 *
	 * @return array new list of classes
	 */
	function domestic_sticky_posts( $classes ) {
		if ( in_array( 'sticky', $classes, true ) ) {
			$classes   = array_diff( $classes, [ 'sticky' ] );
			$classes[] = 'wp-sticky';
		}
		return $classes;
	}
endif;
add_filter( 'post_class', 'domestic_sticky_posts' );

if ( ! function_exists( 'domestic_home_query' ) ) :
	/**
	 * Remove sticky posts from home page query
	 *
	 * This function is attached to the 'pre_get_posts' action hook.
	 *
	 * @param WP_Query $query Home query object.
	 *
	 * @since 1.0.0
	 */
	function domestic_home_query( $query ) {
		if ( domestic_display_sticky_slider() && $query->is_main_query() ) {
			$query->set( 'post__not_in', (array) get_option( 'sticky_posts' ) );
		}
	}
endif;
add_action( 'pre_get_posts', 'domestic_home_query' );


if ( ! function_exists( 'domestic_display_sticky_slider' ) ) :
	/**
	 * Check if the sticky slider should be displayed
	 *
	 * @return boolean True if the slider is present in the current page
	 */
	function domestic_display_sticky_slider() {
		$stickies = get_option( 'sticky_posts' );
		return ! empty( $stickies ) && is_home() && ! is_admin() && get_theme_mod( 'domestic_show_sticky_slider', 1 );
	}
endif;

if ( ! function_exists( 'domestic_get_sticky_carousel_query' ) ) :
	/**
	 * Return the query for the sticky carousel
	 *
	 * @return WP_Query
	 */
	function domestic_get_sticky_carousel_query() {
		$args = [
			'post_type'      => 'post',
			'post__in'       => get_option( 'sticky_posts' ),
			'posts_per_page' => count( get_option( 'sticky_posts' ) ),
		];

		return new WP_Query( $args );
	}
endif;
