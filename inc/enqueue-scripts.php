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
	function domestic_asset_path( $filename, $manifest = 'rev-manifest.json' ) {
		$filename_split = explode( '.', $filename );
		$dir            = end( $filename_split );
		$manifest_path  = dirname( dirname( __FILE__ ) ) . '/dist/assets/' . $dir . '/' . $manifest;

		if ( file_exists( $manifest_path ) ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );
		} else {
			$manifest = [];
		}

		if ( array_key_exists( $filename, $manifest ) ) {
			return $manifest[ $filename ];
		}
		return $filename;
	}
endif;


if ( ! function_exists( 'domestic_scripts' ) ) :
	function domestic_scripts() {

		$localize = [];

		// Enqueue the main Stylesheet.
		wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/dist/assets/css/' . domestic_asset_path( 'app.css' ), [], '2.10.4', 'all' );
		wp_style_add_data( 'main-stylesheet', 'rtl', 'replace' );

		// Enqueue Foundation scripts
		wp_enqueue_script( 'foundation', get_template_directory_uri() . '/dist/assets/js/' . domestic_asset_path( 'app.js' ), [ 'jquery' ], '2.10.4', true );

		if ( is_home() ) {
			wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/dist/assets/owl-carousel/owl.carousel.min.js', [ 'jquery' ], false, true );
			wp_enqueue_style( 'owl-carousel-styles', get_template_directory_uri() . '/dist/assets/owl-carousel/assets/owl.carousel.css' );
			wp_enqueue_style( 'owl-carousel-theme', get_template_directory_uri() . '/dist/assets/owl-carousel/assets/owl.theme.default.css' );
			wp_enqueue_style( 'dashicons' );

			$query                           = domestic_get_sticky_carousel_query();
			$localize['stickyCarouselCount'] = count( $query->get_posts() );
		}

		// Add the comment-reply library on pages where it is necessary
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_localize_script( 'foundation', 'domesticJS', $localize );
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
