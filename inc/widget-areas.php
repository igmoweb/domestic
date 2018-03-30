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
				'before_widget' => '<section id="%1$s" class="widget %2$s widgets-number-[[number]]">',
				'after_widget'  => '</section>',
				'before_title'  => '<h4 class="widget-title h5">',
				'after_title'   => '</h4>',
			)
		);
	}

	add_action( 'widgets_init', 'domestic_sidebar_widgets' );
endif;

if ( ! function_exists( 'domestic_set_footer_widgets_columns' ) ):
	function domestic_set_footer_widgets_columns( $params ) {
		$sidebar_id = $params[0]['id'];
		if ( 'footer-widgets' === $sidebar_id ) {
			$widgets = wp_get_sidebars_widgets();
			$cols = count( $widgets[ $sidebar_id ] );
			$params[0]['before_widget'] = str_replace( '[[number]]', $cols, $params[0]['before_widget'] );
		}
		return $params;
	}

	add_filter( 'dynamic_sidebar_params', 'domestic_set_footer_widgets_columns' );
endif;