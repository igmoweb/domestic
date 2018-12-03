<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package Domestic
 * @since 1.0.0
 */

if ( ! function_exists( 'domestic_asset_url' ) ) :
	/**
	 * Get the URL to a given asset in dist folder
	 *
	 * @since 1.0.0
	 *
	 * @param string $filename Filename and route in dist folder.
	 *
	 * @return string URL to the asset
	 */
	function domestic_asset_url( $filename ) {
		$dist_url = get_stylesheet_directory_uri() . '/dist/';
		$manifest = domestic_get_manifest();

		if ( array_key_exists( $filename, $manifest ) ) {
			return $dist_url . $manifest[ $filename ];
		}
		return $filename;
	}
endif;

if ( ! function_exists( 'domestic_get_manifest' ) ) :
	/**
	 * Return the manifest array with the list of assets
	 *
	 * @return array The manifest array.
	 */
	function domestic_get_manifest() {
		global $wp_filesystem;

		require_once ABSPATH . '/wp-admin/includes/file.php';
		WP_Filesystem();

		$dist_path     = get_stylesheet_directory() . '/dist/';
		$manifest_path = $dist_path . 'manifest.json';

		if ( $wp_filesystem->exists( $manifest_path ) ) {
			$manifest = json_decode( $wp_filesystem->get_contents( $manifest_path ), true );
		} else {
			$manifest = [];
		}

		return $manifest;
	}
endif;


if ( ! function_exists( 'domestic_asset_path' ) ) :
	/**
	 * Get the absolute path to a given asset in dist folder
	 *
	 * @since 1.0.0
	 *
	 * @param string $filename Filename and route in dist folder.
	 *
	 * @return string Path to the asset
	 */
	function domestic_asset_path( $filename ) {
		$manifest = domestic_get_manifest();

		if ( array_key_exists( $filename, $manifest ) ) {
			return 'dist/' . $manifest[ $filename ];
		}
		return $filename;
	}
endif;


if ( ! function_exists( 'domestic_scripts' ) ) :
	/**
	 * Enqueue all scripts/styles needed in the theme
	 *
	 * @since 1.0.0
	 */
	function domestic_scripts() {
		$suffix = '';
		if ( is_rtl() ) {
			$suffix = '.rtl';
		}

		$localize = [];
		// Enqueue the main Stylesheet.
		wp_enqueue_style( 'domestic-stylesheet', domestic_asset_url( "assets/css/style${suffix}.css" ), [], '1.0.0' );

		// Enqueue Domestic scripts.
		wp_enqueue_script( 'domestic-js', domestic_asset_url( 'assets/js/app.js' ), [ 'jquery' ], '1.0.0', true );

		if ( is_home() ) {
			wp_enqueue_script( 'owl-carousel', domestic_asset_url( 'assets/js/owl.carousel.js' ), [ 'jquery', 'domestic-js' ], '1.0.0', true );
			wp_enqueue_style( 'dashicons' );

			$query                           = domestic_get_sticky_carousel_query();
			$localize['stickyCarouselCount'] = count( $query->get_posts() );
		}

		// Add the comment-reply library on pages where it is necessary.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_localize_script( 'domestic-js', 'domesticJS', $localize );
	}

endif;
add_action( 'wp_enqueue_scripts', 'domestic_scripts' );

if ( ! function_exists( 'domestic_customize_scripts' ) ) :
	/**
	 * Load dynamic logic for the customizer controls area.
	 */
	function domestic_customize_scripts() {
		wp_enqueue_script( 'domestic-customize', get_template_directory_uri() . '/dist/assets/js/customize.js', [ 'jquery', 'customize-preview' ], '1.0.0', true );
	}
	add_action( 'customize_preview_init', 'domestic_customize_scripts' );
endif;
