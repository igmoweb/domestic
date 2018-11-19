<?php
/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'domestic_gutenber_support' ) ) {
	function domestic_gutenber_support() {
		add_theme_support( 'editor-color-palette', [
			[
				'name'  => __( 'Domestic Main Color', 'domestic' ),
				'slug'  => 'domestic-color',
				'color' => get_theme_mod( 'domestic_color_schema', domestic_get_default_schema_color() ),
			],
			[
				'name'  => __( 'Black', 'domestic' ),
				'slug'  => 'domestic-black',
				'color' => '#333',
			],
			[
				'name'  => __( 'Light Gray', 'domestic' ),
				'slug'  => 'domestic-light-gray',
				'color' => '#e6e6e6',
			],
			[
				'name'  => __( 'White', 'domestic' ),
				'slug'  => 'domestic-white',
				'color' => '#fefefe',
			],
			[
				'name'  => __( 'Dark Gray', 'domestic' ),
				'slug'  => 'domestic-dark-gray',
				'color' => '#8a8a8a',
			],
		] );

		add_theme_support( 'align-wide' );

		add_theme_support( 'disable-custom-colors' );

		add_theme_support( 'editor-styles' );
		add_editor_style( 'dist/assets/css/editor-styles.css' );

		add_theme_support( 'responsive-embeds' );
	}
}

add_action( 'after_setup_theme', 'domestic_gutenber_support' );
