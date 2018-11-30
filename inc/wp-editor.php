<?php
/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'domestic_gutenber_support' ) ) {
	function domestic_gutenber_support() {
		global $wp_version;

		add_theme_support( 'editor-color-palette', domestic_color_palette() );

		add_theme_support( 'align-wide' );

		add_theme_support( 'disable-custom-colors' );

		add_theme_support( 'editor-styles' );

		$suffix = '';
		if ( is_rtl() ) {
			$suffix = '.rtl';
		}

		if ( version_compare( $wp_version, '5.0', '>=' ) || function_exists( 'the_gutenberg_project' ) ) {
			$asset = "editor-styles${suffix}.css";
		} else {
			$asset = "editor-styles-backcomp${suffix}.css";
		}

		add_editor_style( 'dist/assets/css/' . domestic_asset_path( $asset ) );

		add_theme_support( 'responsive-embeds' );
	}
}

add_action( 'after_setup_theme', 'domestic_gutenber_support' );


/**
 * Theme color palette
 *
 * @return array
 */
function domestic_color_palette() {
	$main_color = get_theme_mod( 'domestic_color_schema', domestic_get_default_schema_color() );
	if ( ! $main_color ) {
		$main_color = domestic_get_default_schema_color();
	}
	return [
		[
			'name'  => __( 'Domestic Main Color', 'domestic' ),
			'slug'  => 'domestic-color',
			'color' => $main_color,
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
	];
}
