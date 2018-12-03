<?php
/**
 * Jepack Infinite Scroll support
 *
 * @package Domestic
 * @since 1.0.0
 */

if ( ! function_exists( 'domestic_jetpack_init' ) ) :
	function domestic_jetpack_init() {
		add_theme_support(
			'infinite-scroll',
			[
				'type'      => 'click',
				'container' => 'main',
			]
		);
	}
endif;
add_action( 'after_setup_theme', 'domestic_jetpack_init' );

if ( ! function_exists( 'domestic_jetpack_infinite_scroll_render' ) ) :
	function domestic_jetpack_infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		}
	}

endif;
add_action( 'infinite_scroll_render', 'domestic_jetpack_infinite_scroll_render' );

