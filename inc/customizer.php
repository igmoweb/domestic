<?php
/**
 * Allow users to select Topbar or Offcanvas menu. Adds body class of offcanvas or topbar based on which they choose.
 *
 * @package Domestic
 * @since Domestic 1.0.0
 */

if ( ! function_exists( 'domestic_register_theme_customizer' ) ) :
	/**
	 * @param WP_Customize_Manager $wp_customize
	 */
	function domestic_register_theme_customizer( $wp_customize ) {

		$wp_customize->add_section(
			'domestic_colors', [
				'panel'          => 'domestic_settings',
				'theme_supports' => '',
				'title'          => __( 'Colors', 'domestic' ),
			]
		);

		$wp_customize->add_setting(
			'domestic_menu_schema',
			[
				'default'           => 'dark',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'sanitize_text_field',
			]
		);

		$wp_customize->add_control(
			'domestic_menu_schema', [
				'label'       => __( 'Menu Color Schema', 'domestic' ),
				'section'     => 'domestic_colors',
				'settings'    => 'domestic_menu_schema',
				'type'        => 'radio',
				'description' => __( 'Changes the color schema for the header menu.', 'domestic' ),
				'choices'     => [
					'dark'  => __( 'Dark', 'domestic' ),
					'light' => __( 'Light', 'domestic' ),
				],
			]
		);

		$wp_customize->add_setting(
			'domestic_color_schema',
			[
				'default'           => domestic_get_default_schema_color(),
				'sanitize_callback' => 'sanitize_hex_color',
			]
		);

		$wp_customize->add_control(
			'domestic_color_schema', [
				'label'       => __( 'Main Color Schema', 'domestic' ),
				'section'     => 'domestic_colors',
				'settings'    => 'domestic_color_schema',
				'type'        => 'color',
				'description' => __( 'Changes the color schema for the theme.', 'domestic' ),
			]
		);

		$wp_customize->add_panel(
			'domestic_settings', [
				'priority' => 1000,
				'title'    => __( 'Domestic Settings', 'domestic' ),
			]
		);

		$wp_customize->add_section(
			'domestic_sticky_slider', [
				'panel'          => 'domestic_settings',
				'theme_supports' => '',
				'title'          => __( 'Home Slider', 'domestic' ),
				'description'    => __( 'Home Slider.', 'domestic' ),
			]
		);

		$wp_customize->add_section(
			'domestic_footer_tagline', [
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
				'sanitize_js_callback' => 'esc_textarea',
				'sanitize_callback'    => 'esc_textarea',
			]
		);

		$wp_customize->add_control(
			'domestic_footer_tagline', [
				'label'    => __( 'Footer tagline', 'domestic' ),
				'section'  => 'domestic_footer_tagline',
				'settings' => 'domestic_footer_tagline',
				'type'     => 'textarea',
			]
		);
	}
endif;
add_action( 'customize_register', 'domestic_register_theme_customizer' );


if ( ! function_exists( 'domestic_get_default_schema_color' ) ) {
	function domestic_get_default_schema_color() {
		return '#f47a29';
	}
}

if ( ! function_exists( 'domestic_darken_color' ) ) :
	/**
	 * Darken a given color
	 *
	 * @props to Aleš Farčnik - https://coderwall.com/p/dvecdg/darken-hex-color-in-php
	 *
	 * @param $rgb
	 * @param int $darker
	 *
	 * @return string
	 */
	function domestic_darken_color( $rgb, $darker = 2 ) {

		$hash = ( strpos( $rgb, '#' ) !== false ) ? '#' : '';
		$rgb  = ( strlen( $rgb ) === 7 ) ? str_replace( '#', '', $rgb ) : ( ( strlen( $rgb ) === 6 ) ? $rgb : false );
		if ( strlen( $rgb ) !== 6 ) {
			return $hash . '000000';
		}
		$darker = ( $darker > 1 ) ? $darker : 1;

		list( $r_16, $g_16, $b_16 ) = str_split( $rgb, 2 );

		$red   = sprintf( '%02X', floor( hexdec( $r_16 ) / $darker ) );
		$green = sprintf( '%02X', floor( hexdec( $g_16 ) / $darker ) );
		$blue  = sprintf( '%02X', floor( hexdec( $b_16 ) / $darker ) );

		return $hash . $red . $green . $blue;
	}
endif;

if ( ! function_exists( 'domestic_set_schema_color' ) ) :
	function domestic_set_schema_color() {
		$main_color = get_theme_mod( 'domestic_color_schema', domestic_get_default_schema_color() );
		if ( domestic_get_default_schema_color() === $main_color ) {
			return;
		}

		if ( ! $main_color ) {
			$main_color = domestic_get_default_schema_color();
		}

		$palette = domestic_color_palette();

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
				border-color: <?php echo esc_attr( $main_color ); ?>;
			}

			.dropdown.menu.vertical > li.opens-right > a::after {
				border-color: transparent <?php echo esc_attr( $main_color ); ?> transparent;
			}

			.owl-carousel.owl-theme .owl-nav button.owl-prev:hover,
			.owl-carousel.owl-theme .owl-nav button.owl-prev:focus,
			.owl-carousel.owl-theme .owl-nav button.owl-next:hover,
			.owl-carousel.owl-theme .owl-nav button.owl-next:focus,
			.button,
			input[type="submit"],
			#comments .comment-body header.comment-author .reply a,
			#buddypress .standard-form button, #buddypress a.button, #buddypress input[type="submit"], #buddypress input[type="button"], #buddypress input[type="reset"], #buddypress ul.button-nav li a, #buddypress .generic-button a, #buddypress .comment-reply-link, a.bp-title-button {
				background-color: <?php echo esc_attr( $main_color ); ?>;
			}

			.has-domestic-color-color {
				color: <?php echo esc_attr( $main_color ); ?>;
			}

			.has-domestic-color-background-color {
				background-color: <?php echo esc_attr( $main_color ); ?>;
			}

			.wp-block-button .wp-block-button__link {
				background-color: <?php echo esc_attr( $main_color ); ?>;
			}

			.wp-block-button .wp-block-button__link:hover {
				background-color: <?php echo esc_attr( domestic_darken_color( $main_color ) ); ?>;
			}

			.wp-block-button.is-style-outline .wp-block-button__link {
				color: <?php echo esc_attr( $main_color ); ?>;
				border-color: <?php echo esc_attr( $main_color ); ?>;
				background-color: transparent;
			}

			.wp-block-button.is-style-outline .wp-block-button__link:hover {
				color: <?php echo domestic_darken_color( $main_color ); ?>;
				border-color: <?php echo esc_attr( domestic_darken_color( $main_color ) ); ?>;
				background: transparent;
			}

			<?php foreach ( $palette as $item ) : ?>
			body #content .entry-content .wp-block-button .wp-block-button__link.has-<?php echo $item['slug']; ?>-color {
				color: <?php echo esc_attr( $item['color'] ); ?>
			}

			body #content .entry-content .wp-block-button .wp-block-button__link.has-<?php echo $item['slug']; ?>-background-color {
				background: <?php echo esc_attr( $item['color'] ); ?>
			}

			body #content .entry-content .wp-block-button .wp-block-button__link.has-<?php echo $item['slug']; ?>-background-color:hover {
				background: <?php echo esc_attr( domestic_darken_color( $item['color'], 2 ) ); ?>
			}

			body #content .entry-content .wp-block-button.is-style-outline .wp-block-button__link.has-<?php echo $item['slug']; ?>-color {
				color: <?php echo esc_attr( $item['color'] ); ?>
			}

			body #content .entry-content .wp-block-button.is-style-outline .wp-block-button__link.has-<?php echo $item['slug']; ?>-background-color {
				border-color: <?php echo esc_attr( $item['color'] ); ?>;
				background: transparent;
			}

			body #content .entry-content .wp-block-button.is-style-outline .wp-block-button__link.has-<?php echo $item['slug']; ?>-background-color:hover {
				border-color: <?php echo esc_attr( domestic_darken_color( $item['color'], 2 ) ); ?>;
			}

			<?php endforeach; ?>


		</style>
		<?php
	}
endif;
add_action( 'wp_head', 'domestic_set_schema_color', 999 );


if ( ! function_exists( 'domestic_editor_styles' ) ) :
	/**
	 * Styles for WP Editor
	 */
	function domestic_editor_styles() {
		$main_color = get_theme_mod( 'domestic_color_schema', domestic_get_default_schema_color() );
		if ( domestic_get_default_schema_color() === $main_color ) {
			return;
		}
		?>
		<style>
			body .editor-styles-wrapper a {
				color: <?php echo esc_attr( $main_color ); ?> !important;
			}

			body .editor-styles-wrapper .wp-block-button .wp-block-button__link {
				background-color: <?php echo esc_attr( $main_color ); ?>;
			}

			body .editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link {
				border: 1px solid<?php echo esc_attr( $main_color ); ?>;
				color: <?php echo esc_attr( $main_color ); ?>;
			}

			body .editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:hover.disabled,
			body .editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:hover[disabled],
			body .editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:focus.disabled,
			body .editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link:focus[disabled] {
				border: 1px solid<?php echo esc_attr( $main_color ); ?>;
				color: <?php echo esc_attr( $main_color ); ?>;
			}

			body .editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link.has-domestic-color-color {
				color: <?php echo esc_attr( $main_color ); ?>;
			}

			body .editor-styles-wrapper .wp-block-button.is-style-outline .wp-block-button__link.has-domestic-color-background-color {
				border-color: <?php echo esc_attr( $main_color ); ?>;
				background-color: transparent;
			}
		</style>
		<?php
	}
endif;

if ( ! function_exists( 'domestic_set_header_image' ) ) :
	function domestic_set_header_image() {
		if ( ! get_header_image() ) {
			return;
		}

		$header = get_custom_header();
		$height = absint( $header->height );
		?>
		<style>
			.site-branding {
				background:url(<?php echo esc_url( $header->url ); ?>) no-repeat center center;
				background-size: cover;
				<?php if ( $height < 250 ) : ?>
					height: auto;
				<?php else : ?>
					height: <?php echo absint( $height ); ?>px;
				<?php endif; ?>

			}
		</style>
		<?php
	}
endif;
add_action( 'wp_head', 'domestic_set_header_image' );
