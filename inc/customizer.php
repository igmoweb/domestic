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

		$wp_customize->add_section( 'domestic_colors', [
				'panel'          => 'domestic_settings',
				'theme_supports' => '',
				'title'          => __( 'Colors', 'domestic' ),
			]
		);

		$wp_customize->add_setting(
			'domestic_menu_schema',
			[
				'default'   => 'dark',
				'transport' => 'postMessage'
			]
		);

		$wp_customize->add_control( 'domestic_menu_schema', [
			'label'       => __( 'Menu Color Schema', 'mytheme' ),
			'section'     => 'domestic_colors',
			'settings'    => 'domestic_menu_schema',
			'type'        => 'radio',
			'description' => __( 'Changes the color schema for the header menu.', 'domestic' ),
			'choices'     => [
				'dark'  => __( 'Dark', 'domestic' ),
				'light' => __( 'Light', 'domestic' )
			]
		] );


		$wp_customize->add_setting(
			'domestic_color_schema',
			[
				'default' => domestic_get_default_schema_color()
			]
		);

		$wp_customize->add_control( 'domestic_color_schema', [
			'label'       => __( 'Main Color Schema', 'mytheme' ),
			'section'     => 'domestic_colors',
			'settings'    => 'domestic_color_schema',
			'type'        => 'color',
			'description' => __( 'Changes the color schema for the theme.', 'domestic' ),
		] );


		$wp_customize->add_panel( 'domestic_settings', [
			'priority' => 1000,
			'title'    => __( 'Domestic Settings', 'domestic' )
		] );

		$wp_customize->add_section( 'domestic_sticky_slider', [
				'panel'          => 'domestic_settings',
				'theme_supports' => '',
				'title'          => __( 'Home Slider', 'domestic' ),
				'description'    => __( 'Home Slider.', 'domestic' ),
			]
		);

		$wp_customize->add_setting(
			'domestic_show_sticky_slider',
			[
				'default' => true,
			]
		);

		$wp_customize->add_control( 'domestic_show_sticky_slider', [
			'label'    => __( 'Display the home slider', 'mytheme' ),
			'section'  => 'domestic_sticky_slider',
			'settings' => 'domestic_show_sticky_slider',
			'type'     => 'checkbox',
		] );

		$wp_customize->add_section( 'domestic_footer_tagline', [
				'panel'          => 'domestic_settings',
				'theme_supports' => '',
				'title'          => __( 'Footer Tagline', 'domestic' ),
				'description'    => __( 'Footer Tagline.', 'domestic' ),
			]
		);

		$wp_customize->add_setting(
			'domestic_footer_tagline',
			[
				'default'              => domestic_default_footer_tagline(),
				'sanitize_js_callback' => 'esc_textarea'
			]
		);

		$wp_customize->add_control( 'domestic_footer_tagline', [
			'label'    => __( 'Footer tagline', 'mytheme' ),
			'section'  => 'domestic_footer_tagline',
			'settings' => 'domestic_footer_tagline',
			'type'     => 'textarea',
		] );
	}

	add_action( 'customize_register', 'domestic_register_theme_customizer' );

endif;

if ( ! function_exists( 'domestic_get_default_schema_color' ) ) {
	function domestic_get_default_schema_color() {
		return '#f47a29';
	}
}

if ( ! function_exists( 'domestic_set_schema_color' ) ):
	function domestic_set_schema_color() {
		$main_color = get_theme_mod( 'domestic_color_schema', domestic_get_default_schema_color() );
		if ( domestic_get_default_schema_color() === $main_color ) {
			return;
		}
		?>
		<style>
			a,
			.top-bar ul.menu li > a:hover,
			.top-bar ul.menu li > a:active,
			.footer table a,
			.footer a:hover, .footer a:focus,
			.top-bar ul.menu li.current-menu-item > a,
			.menu .is-active > a,
			.mobile-menu .menu .is-active > a, .mobile-off-canvas-menu .menu .is-active > a,
			h1 a:hover, h1 a:focus, h2 a:hover, h2 a:focus, h3 a:hover, h3 a:focus, h4 a:hover, h4 a:focus, h5 a:hover, h5 a:focus, h6 a:hover, h6 a:focus,
			#content article.hentry .entry-content .post-meta a:hover, #content article.hentry .entry-content .post-meta a:focus,
			.post-tags li a:hover, .post-tags li a:focus {
				color: <?php echo esc_attr( $main_color ); ?>;
			}

			.top-bar > ul.menu > li.menu-item-has-children:after {
				border-color: <?php echo esc_attr( $main_color ); ?> transparent transparent;
			}

			.dropdown.menu.vertical > li.opens-right > a::after {
				border-color: transparent <?php echo esc_attr( $main_color ); ?> transparent;
			}

			.owl-carousel.owl-theme .owl-nav button.owl-prev:hover,
			.owl-carousel.owl-theme .owl-nav button.owl-prev:focus,
			.owl-carousel.owl-theme .owl-nav button.owl-next:hover,
			.owl-carousel.owl-theme .owl-nav button.owl-next:focus,
			.button,
			.woocommerce ul.products li.product .button,
			.woocommerce #respond input#submit,
			.woocommerce a.button,
			.woocommerce button.button,
			.woocommerce input.button,
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			#comments .comment-body header.comment-author .reply a,
			#buddypress .standard-form button, #buddypress a.button, #buddypress input[type="submit"], #buddypress input[type="button"], #buddypress input[type="reset"], #buddypress ul.button-nav li a, #buddypress .generic-button a, #buddypress .comment-reply-link, a.bp-title-button{
				background-color: <?php echo esc_attr( $main_color ); ?>;
			}
		</style>
		<?php
	}
	add_action( 'wp_head', 'domestic_set_schema_color', 999 );
endif;
