<?php

if ( ! function_exists( 'domestic_excerpt_more' ) ) :
	function domestic_excerpt_more() {
		return '[...] <p class="read-more"><a class="button" href="' . get_permalink() . '">' . __( 'Read more', 'domestic' ) . '</a></p>';
	}

	add_filter( 'excerpt_more', 'domestic_excerpt_more' );
endif;


if ( ! function_exists( 'domestic_get_content_class' ) ) :
	function domestic_get_content_class( $container ) {
		if ( is_front_page() && ! is_home() ) {
			return '';
		}

		$has_sidebar = domestic_has_sidebar();

		$cols['main'] = $has_sidebar ? 'columns large-9 small-12' : 'columns small-12';
		if ( $has_sidebar ) {
			$cols['sidebar'] = 'columns large-3 small-12';
		}

		return isset( $cols[ $container ] ) ? $cols[ $container ] : 12;
	}
endif;

if ( ! function_exists( 'domestic_has_sidebar' ) ) :
	function domestic_has_sidebar( $sidebar = 'sidebar' ) {
		return is_active_sidebar( $sidebar . '-widgets' );
	}
endif;

if ( ! function_exists( 'domestic_get_thumbnail_size' ) ) :
	function domestic_get_thumbnail_size() {
		$has_sidebar = domestic_has_sidebar();

		if ( ( is_single() || is_home() ) && $has_sidebar ) {
			return 'featured-medium';
		}

		return 'featured-xlarge';
	}
endif;

if ( ! function_exists( 'domestic_mobile_nav_class' ) ) :
	// Add class to body to help w/ CSS
	function domestic_mobile_nav_class( $classes ) {
		$classes[] = 'offcanvas';
		$classes[] = 'domestic-menu-schema-' . get_theme_mod( 'domestic_menu_schema', 'dark' );
		if ( domestic_has_sidebar( 'top' ) ) {
			$classes[] = 'has-top-sidebar';
		}
		if ( domestic_has_sidebar( 'footer' ) ) {
			$widgets   = wp_get_sidebars_widgets();
			$cols      = count( $widgets['footer-widgets'] );
			$classes[] = 'domestic-footer-widgets-cols-' . $cols;
		}
		return $classes;
	}

	add_filter( 'body_class', 'domestic_mobile_nav_class' );
endif;

if ( ! function_exists( 'domestic_entry_meta' ) ) :
	function domestic_entry_meta() {
		?>
		<p class="post-meta">
			<time class="updated show-for-sr" datetime="<?php echo esc_attr( get_the_time( 'c' ) ); ?>">

				<?php
				/* translators: %1$s: the post date */
				printf( __( 'Posted on %1$s at.', 'domestic' ), get_the_date() );
				?>
			</time>
			<time class="updated hide-for-sr" datetime="<?php echo esc_attr( get_the_time( 'c' ) ); ?>">
				<?php the_date() ?>
			</time>

			<span class="byauthor">
					<?php
					printf(
						/* translators: %s: Post Author */
						__( 'by %s', 'domestic' ),
						'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author" class="fn">'
						. get_the_author()
						. '</a>'
					);
					?>
				</span>
		</p>
		<?php
	}
endif;

if ( ! function_exists( 'domestic_post_categories' ) ) :
	function domestic_post_categories( $link_categories = true ) {
		if ( $link_categories ) {
			?>
			<p class="post-categories"><?php echo get_the_category_list( ' / ' ); ?></p>
			<?php
		} else {
			$categories = get_the_category();
			?>
			<p class="post-categories">
				<?php echo implode( ' / ', wp_list_pluck( $categories, 'name' ) ); ?>
			</p>
			<?php
		}

	}
endif;

if ( ! function_exists( 'domestic_footer_tagline' ) ) :
	function domestic_footer_tagline() {
		return get_theme_mod( 'domestic_footer_tagline', domestic_default_footer_tagline() );
	}
endif;

if ( ! function_exists( 'domestic_default_footer_tagline' ) ) :
	function domestic_default_footer_tagline() {
		return '<a href="https://wordpress.org/">Proudly powered by WordPress</a>';
	}
endif;
