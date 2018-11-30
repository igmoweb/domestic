<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 */


if ( ! function_exists( 'domestic_asset_url' ) ) :
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
	function domestic_get_manifest() {
		$dist_path     = get_stylesheet_directory() . '/dist/';
		$manifest_path = $dist_path . 'manifest.json';

		if ( file_exists( $manifest_path ) ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );
		} else {
			$manifest = [];
		}

		return $manifest;
	}
endif;


if ( ! function_exists( 'domestic_asset_path' ) ) :
	function domestic_asset_path( $filename, $relative = true ) {
		$dist_path = get_stylesheet_directory() . '/dist/';
		$manifest  = domestic_get_manifest();

		if ( array_key_exists( $filename, $manifest ) ) {
			if ( $relative ) {
				return 'dist/' . $manifest[ $filename ];
			}
			return $dist_path . $manifest[ $filename ];
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
		wp_enqueue_style( 'main-stylesheet', domestic_asset_url( "assets/css/style${suffix}.css" ) );

		// Enqueue Foundation scripts
		wp_enqueue_script( 'domestic-js', domestic_asset_url( 'assets/js/app.js' ), [ 'jquery' ], null, true );

		if ( is_home() ) {
			wp_enqueue_script( 'owl-carousel', domestic_asset_url( 'assets/js/owl.carousel.js' ), [ 'jquery', 'domestic-js' ], false, true );
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
