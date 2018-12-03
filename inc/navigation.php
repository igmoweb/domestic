<?php
/**
 * Register Navigation Menus
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 *
 * @package Domestic
 * @since 1.0.0
 */

register_nav_menus(
	[
		'top-bar-r'  => esc_html__( 'Right Top Bar', 'domestic' ),
		'mobile-nav' => esc_html__( 'Mobile', 'domestic' ),
	]
);


if ( ! function_exists( 'domestic_top_bar_r' ) ) {
	/**
	 * Register Desktop navigation - right top bar
	 *
	 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
	 */
	function domestic_top_bar_r() {
		wp_nav_menu(
			[
				'container'      => false,
				'menu_class'     => 'dropdown menu',
				'items_wrap'     => '<ul id="%1$s" class="%2$s desktop-menu" data-dropdown-menu>%3$s</ul>',
				'theme_location' => 'top-bar-r',
				'depth'          => 3,
				'fallback_cb'    => false,
				'walker'         => new Domestic_Walker_Top_Bar(),
			]
		);
	}
}


if ( ! function_exists( 'domestic_mobile_nav' ) ) {
	/**
	 * Register Mobile navigation - topbar (default) or offcanvas
	 *
	 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
	 */
	function domestic_mobile_nav() {
		wp_nav_menu(
			[
				'container'      => false,
				'menu'           => __( 'mobile-nav', 'domestic' ),
				'menu_class'     => 'vertical menu',
				'theme_location' => 'mobile-nav',
				'items_wrap'     => '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
				'fallback_cb'    => false,
				'walker'         => new Domestic_Walker_Mobile_Menu(),
			]
		);
	}
}


if ( ! function_exists( 'domestic_posts_navigation' ) ) :
	/**
	 * Display posts navigation links
	 */
	function domestic_posts_navigation() {
		?>
		<nav id="post-nav" class="row">
			<div class="columns small-6 post-previous"><?php next_posts_link( __( '&larr; Older posts', 'domestic' ) ); ?></div>
			<div class="columns small-6 post-next text-right"><?php previous_posts_link( __( 'Newer posts &rarr;', 'domestic' ) ); ?></div>
		</nav>
		<?php
	}
endif;
