<?php

if ( ! function_exists( 'domestic_jetpack_init' ) ) :
	function domestic_jetpack_init() {
		add_theme_support(
			'infinite-scroll', [
				'type'      => 'click',
				'container' => 'main',
			]
		);
	}

	add_action( 'after_setup_theme', 'domestic_jetpack_init' );
endif;

if ( ! function_exists( 'domestic_jetpack_infinite_scroll_render' ) ) :
	function domestic_jetpack_infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			if ( 'jetpack-portfolio' === get_post_type() ) {
				get_template_part( 'template-parts/content', 'portfolio' );
			} else {
				get_template_part( 'template-parts/content', get_post_format() );
			}
		}
	}

	add_action( 'infinite_scroll_render', 'domestic_jetpack_infinite_scroll_render' );
endif;

if ( ! function_exists( 'domestic_jetpack_portfolio_class' ) ) :
	/**
	 * Filter Portfolio items class
	 */
	function domestic_jetpack_portfolio_class( $classes ) {
		if ( ! domestic_is_jetpack_portfolio_listing() ) {
			return $classes;
		}

		$classes[] = 'columns small-12 medium-6 large-4';

		return $classes;
	}

	add_filter( 'post_class', 'domestic_jetpack_portfolio_class' );

endif;

if ( ! function_exists( 'domestic_jetpack_portfolio_query' ) ) :
	/**
	 * Increase the number of portfolios to display
	 *
	 * @param WP_Query $query
	 */
	function domestic_jetpack_portfolio_query( $query ) {
		if ( domestic_is_jetpack_portfolio_listing( $query ) ) {
			$query->set( 'posts_per_page', 50 );
		}
	}

	add_action( 'pre_get_posts', 'domestic_jetpack_portfolio_query', 500 );
endif;

if ( ! function_exists( 'domestic_is_jetpack_portfolio_listing' ) ) :
	/**
	 * Check if we're listing portfolio posts/taxonomies
	 */
	function domestic_is_jetpack_portfolio_listing( $query = null ) {
		global $wp_query;
		if ( ! $query ) {
			$query = $wp_query;
		}

		return ( $query->is_post_type_archive( 'jetpack-portfolio' ) || $query->is_tax( 'jetpack-portfolio-type' ) || $query->is_tax( 'jetpack-portfolio-tag' ) ) && $query->is_main_query();
	}
endif;
