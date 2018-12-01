<?php
/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 *
 * @package Domestic
 * @since Domestic 1.0.0
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
			$asset = "assets/css/editor-styles${suffix}.css";
		} else {
			$asset = "assets/css/editor-styles-backcomp${suffix}.css";
		}

		$path = domestic_asset_path( $asset );
		add_editor_style( $path );

		add_theme_support( 'responsive-embeds' );
	}
}
add_action( 'after_setup_theme', 'domestic_gutenber_support' );


if ( ! function_exists( 'domestic_block_editor_assets' ) ) :
	/**
	 * Enqueue editor JS assets
	 */
	function domestic_block_editor_assets() {
		// Gutenberg scripts
		wp_enqueue_script(
			'domestic-gutenberg',
			domestic_asset_url( 'assets/js/gutenberg.js' ),
			[ 'wp-blocks', 'wp-i18n' ],
			'',
			true
		);

		// The color palette can be set from customizer, we need to add extra css to the editor
		domestic_editor_styles();
	}
endif;
add_action( 'enqueue_block_editor_assets', 'domestic_block_editor_assets' );


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
