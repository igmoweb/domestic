<?php
/**
 * Register widget areas
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'domestic_sidebar_widgets' ) ) :
	function domestic_sidebar_widgets() {
		register_sidebar(
			array(
				'id'            => 'sidebar-widgets',
				'name'          => __( 'Sidebar widgets', 'domestic' ),
				'description'   => __( 'Drag widgets to this sidebar container.', 'domestic' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h4 class="widget-title h5">',
				'after_title'   => '</h4>',
			)
		);

		register_sidebar(
			array(
				'id'            => 'footer-widgets',
				'name'          => __( 'Footer widgets', 'domestic' ),
				'description'   => __( 'Drag widgets to this footer container', 'domestic' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h4 class="widget-title h5">',
				'after_title'   => '</h4>',
			)
		);
	}

	add_action( 'widgets_init', 'domestic_sidebar_widgets' );
endif;
