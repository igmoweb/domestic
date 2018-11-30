<?php
/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'domestic_theme_support' ) ) :
	function domestic_theme_support() {
		// Add language support
		load_theme_textdomain( 'domestic', get_template_directory() . '/languages' );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support(
			'html5', [
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			]
		);

		add_theme_support(
			'custom-background', [
				'default-color'    => '#fefefe',
				'wp-head-callback' => '_custom_background_cb',
			]
		);

		// Custom logo
		add_theme_support(
			'custom-logo', [
				'height'      => 100,
				'width'       => 400,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => [ 'site-title', 'site-description' ],
			]
		);

		// Add menu support
		add_theme_support( 'menus' );

		// Let WordPress manage the document title
		add_theme_support( 'title-tag' );

		// Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
		add_theme_support( 'post-thumbnails' );

		// RSS thingy
		add_theme_support( 'automatic-feed-links' );

		$GLOBALS['content_width'] = 1130;
	}

	add_action( 'after_setup_theme', 'domestic_theme_support' );
endif;
