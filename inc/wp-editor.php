<?php
/**
 * WP Editor support
 *
 * @package Domestic
 * @since Domestic 1.0.0
 */

if ( ! function_exists( 'domestic_block_editor_assets' ) ) :
	/**
	 * Enqueue editor JS assets
	 */
	function domestic_block_editor_assets() {
		// The color palette can be set from customizer, we need to add extra css to the editor.
		$main_color = get_theme_mod( 'domestic_color_schema', domestic_get_default_schema_color() );
		if ( domestic_get_default_schema_color() === $main_color ) {
			return;
		}

		$custom_css = '
			body .editor-styles-wrapper a,
			body .editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link.has-domestic-color-color {
				color: ' . esc_attr( $main_color ) . ' !important;
			}

			body .editor-styles-wrapper .wp-block-button .wp-block-button__link {
				background-color: ' . esc_attr( $main_color ) . ';
			}

			body .editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link,
			body .editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:hover.disabled,
			body .editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:hover[disabled],
			body .editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:focus.disabled,
			body .editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:focus[disabled] {
				border: 1px solid' . esc_attr( $main_color ) . ';
				color: ' . esc_attr( $main_color ) . ';
			}

			body .editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link.has-domestic-color-background-color {
				border-color: ' . esc_attr( $main_color ) . ';
				background-color: transparent;
			}
		';

		wp_add_inline_style( 'wp-editor', $custom_css );

	}
endif;
add_action( 'enqueue_block_editor_assets', 'domestic_block_editor_assets' );

if ( ! function_exists( 'domestic_gutenberg_support' ) ) :
	/**
	 * Add support for Gutenberg Editor
	 */
	function domestic_gutenberg_support() {
		/* phpcs:ignore. */
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
endif;
add_action( 'after_setup_theme', 'domestic_gutenberg_support' );


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
