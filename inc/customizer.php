<?php
/**
 * Allow users to select Topbar or Offcanvas menu. Adds body class of offcanvas or topbar based on which they choose.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'domestic_register_theme_customizer' ) ) :
	/**
	 * @param WP_Customize_Manager $wp_customize
	 */
	function domestic_register_theme_customizer( $wp_customize ) {

		$wp_customize->add_section( 'domestic_colors', array(
				'panel' => 'domestic_settings',
				'theme_supports' => '',
				'title'          => __( 'Colors', 'domestic' ),
			)
		);

		$wp_customize->add_setting(
			'domestic_menu_schema',
			array(
				'default' => 'dark',
				'transport'=>'postMessage'
			)
		);

		$wp_customize->add_control( 'domestic_menu_schema', array(
			'label'      => __( 'Menu Color Schema', 'mytheme' ),
			'section'    => 'domestic_colors',
			'settings'   => 'domestic_menu_schema',
			'type' => 'radio',
			'description' => __( 'Changes the color schema for the header menu.', 'domestic' ),
			'choices' => array(
				'dark' => __( 'Dark', 'domestic' ),
				'light' => __( 'Light', 'domestic' )
			)
		) );


		$wp_customize->add_panel( 'domestic_settings', array(
			'priority' => 1000,
			'title' => __( 'Domestic Settings', 'domestic' )
		) );

		$wp_customize->add_section( 'domestic_sticky_slider', array(
				'panel' => 'domestic_settings',
				'theme_supports' => '',
				'title'          => __( 'Home Slider', 'domestic' ),
				'description'    => __( 'Home Slider.', 'domestic' ),
			)
		);

		$wp_customize->add_setting(
			'domestic_show_sticky_slider',
			array(
				'default' => true,
			)
		);

		$wp_customize->add_control( 'domestic_show_sticky_slider', array(
			'label'      => __( 'Display the home slider', 'mytheme' ),
			'section'    => 'domestic_sticky_slider',
			'settings'   => 'domestic_show_sticky_slider',
			'type' => 'checkbox',
		) );

	}

	add_action( 'customize_register', 'domestic_register_theme_customizer' );

endif;