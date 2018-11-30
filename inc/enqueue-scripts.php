<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */


// Check to see if rev-manifest exists for CSS and JS static asset revisioning
//https://github.com/sindresorhus/gulp-rev/blob/master/integration.md

if ( ! function_exists( 'domestic_asset_path' ) ) :
	function domestic_asset_path( $filename, $manifest = 'manifest.json' ) {
		$dist_path     = get_stylesheet_directory() . '/dist/';
		$dist_url      = get_stylesheet_directory_uri() . '/dist/';
		$manifest_path = $dist_path . $manifest;

		if ( file_exists( $manifest_path ) ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );
		} else {
			$manifest = [];
		}

		if ( array_key_exists( $filename, $manifest ) ) {
			return $dist_url . $manifest[ $filename ];
		}
		return $filename;
	}
endif;


if ( ! function_exists( 'domestic_scripts' ) ) :
	function domestic_scripts() {
		$suffix = '';
		if ( is_rtl() ) {
			$suffix = '.rtl';
		}

		$localize = [];
		// Enqueue the main Stylesheet.
		wp_enqueue_style( 'main-stylesheet', domestic_asset_path( "assets/css/style${suffix}.css" ) );

		// Enqueue Foundation scripts
		wp_enqueue_script( 'domestic-js', domestic_asset_path( 'assets/js/app.js' ), [ 'jquery' ], null, true );

		if ( is_home() ) {
			wp_enqueue_script( 'owl-carousel', domestic_asset_path( 'assets/js/owl.carousel.js' ), [ 'jquery', 'domestic-js' ], false, true );
			wp_enqueue_style( 'owl-carousel-styles', domestic_asset_path( "assets/css/owl.carousel${suffix}.css" ) );
			wp_enqueue_style( 'dashicons' );

			$query                           = domestic_get_sticky_carousel_query();
			$localize['stickyCarouselCount'] = count( $query->get_posts() );
		}

		// Add the comment-reply library on pages where it is necessary
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_localize_script( 'domestic-js', 'domesticJS', $localize );
	}

	add_action( 'wp_enqueue_scripts', 'domestic_scripts' );
endif;


if ( ! function_exists( 'domestic_customize_scripts' ) ) :
	/**
	 * Load dynamic logic for the customizer controls area.
	 */
	function domestic_customize_scripts() {
		wp_enqueue_script( 'domestic-customize', get_template_directory_uri() . '/dist/assets/js/customize.js', [ 'jquery', 'customize-preview' ], false, true );
		wp_localize_script(
			'domestic-customize', 'domesticCustomize', [
				'sections' => array_values( domestic_get_front_page_children() ),
			]
		);
	}
	add_action( 'customize_preview_init', 'domestic_customize_scripts' );

endif;


if ( ! function_exists( 'domestic_block_editor_assets' ) ) :
	/**
	 * Enqueue editor JS assets
	 */
	function domestic_block_editor_assets() {
		// Gutenberg scripts
		wp_enqueue_script(
			'domestic-gutenberg',
			get_template_directory_uri() . '/dist/assets/js/' . domestic_asset_path( 'gutenberg.js', 'gutenberg-manifest.json' ),
			[ 'wp-blocks', 'wp-i18n' ],
			'',
			true
		);

		// The color palette can be set from customizer, we need to add extra css to the editor
		domestic_editor_styles();
	}

	add_action( 'enqueue_block_editor_assets', 'domestic_block_editor_assets' );
endif;
