<?php
/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'domestic_gutenber_support' ) ) {
	function domestic_gutenber_support() {
		add_theme_support(
			'editor-color-palette',
			get_theme_mod( 'domestic_color_schema', domestic_get_default_schema_color() ),
			'#fff',
			'#555',
			'#333'
		);

		add_theme_support( 'align-wide' );

		add_theme_support( 'disable-custom-colors' );
	}
}

add_action( 'after_setup_theme', 'domestic_gutenber_support' );
