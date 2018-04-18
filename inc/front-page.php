<?php


if ( ! function_exists( 'domestic_register_front_page_meta_box' ) ) :
	function domestic_register_front_page_meta_box() {
		global $action, $post;
		$screen = get_current_screen();
		if (
			'page' === $screen->id
			&& 'edit' === $action
			&& domestic_has_front_page() === absint( $post->ID )
		) {
			add_meta_box( 'domestic-front-page', __( 'Customize Front Page', 'domestic' ), 'domestic_front_page_meta_box', 'page', 'side', 'high' );
		}
	}
	add_action( 'add_meta_boxes', 'domestic_register_front_page_meta_box' );
endif;

if ( ! function_exists( 'domestic_front_page_meta_box' ) ) :
	function domestic_front_page_meta_box() {
		$children = domestic_get_front_page_children();

		if ( ! $children ) {
			?>
			<p><?php esc_html_e( 'Start creating child pages of this one to customize Front Page sections', 'domestic' ); ?></p>
			<?php
		}
		else {
			?>
			<p><a href="<?php echo esc_url( wp_customize_url() ) ?>" target="_blank"><?php esc_html_e( 'Customize Front Page', 'domestic' ); ?></a></p>
			<?php
		}

	}
endif;

if ( ! function_exists( 'domestic_has_front_page' ) ) {
	function domestic_has_front_page() {
		if ( 'page' === get_option( 'show_on_front' ) && 'page' === get_post_type( get_option( 'page_on_front' ) ) ) {
			return absint( get_option( 'page_on_front' ) );
		}
		return false;
	}
}

if ( ! function_exists( 'domestic_get_front_page_children' ) ):
	function domestic_get_front_page_children() {
		$children = array();
		if ( $page_id = domestic_has_front_page() ) {
			$children = get_children( array( 'post_parent' => $page_id, 'post_type' => 'page', 'post_status' => 'publish' ) );
		}
		return $children;
	}
endif;

if ( ! function_exists( 'domestic_get_front_page_sections' ) ):
	function domestic_get_front_page_sections() {
		$children = domestic_get_front_page_children();
		$sections = array();
		for ( $i = 0; $i < count( $children ); $i++ ) {
			$page = get_theme_mod( 'domestic_front_page_section_page_' . $i, 0 );
			if ( $page && get_post_type( $page ) === 'page' && get_post_status( $page ) === 'publish' ) {
				$sections[] = array(
					'page' => absint( $page ),
					'style' => get_theme_mod( 'domestic_front_page_section_style_' . $i, 'default' )
				);
			}
		}
		return $sections;
	}
endif;

if ( ! function_exists( 'domestic_page_attributes_misc_attributes' ) ):
	function domestic_page_attributes_misc_attributes() {
		global $action, $post;
		$screen = get_current_screen();
		if (
			'page' === $screen->id
			&& 'edit' === $action
			&& domestic_has_front_page() === absint( $post->ID )
		) {
			?>
			<style>#page_template, label[for="page_template"] { display:none }</style>
			<?php
		}
	}

	add_action( 'page_attributes_misc_attributes', 'domestic_page_attributes_misc_attributes' );
endif;

if ( ! function_exists( 'domestic_maybe_load_front_page' ) ):
	function domestic_maybe_load_front_page( $template ) {
		global $post;
		if ( domestic_has_front_page() === absint( $post->ID ) ) {
			$template = locate_template( 'page.php' );
		}
		return $template;
	}

	add_filter( 'template_include', 'domestic_maybe_load_front_page' );
endif;

