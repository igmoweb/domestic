<?php
/**
 * Functions related to content rendering
 *
 * @package Domestic
 * @since 1.0.0
 */

if ( ! function_exists( 'domestic_excerpt_more' ) ) :
	/**
	 * Customize the excerpt more link
	 */
	function domestic_excerpt_more() {
		return '[...] <p class="read-more"><a class="button" href="' . esc_url( get_permalink() ) . '">' . __( 'Read more', 'domestic' ) . '</a></p>';
	}
endif;
add_filter( 'excerpt_more', 'domestic_excerpt_more' );


if ( ! function_exists( 'domestic_get_content_class' ) ) :
	/**
	 * Return the main #content div class depending on the type of page seen
	 *
	 * @param array $container List of current CSS classes.
	 *
	 * @return array List of CSS classes
	 */
	function domestic_get_content_class( $container ) {
		if ( is_front_page() ) {
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
	/**
	 * Check if the current page should display a sidebar or not
	 *
	 * @param string $sidebar sidebar|footer The type of sidebar.
	 *
	 * @return bool True if the current page will display a sidebar
	 */
	function domestic_has_sidebar( $sidebar = 'sidebar' ) {
		if ( is_page() ) {
			return is_page_template( 'page-templates/page-sidebar.php' );
		}
		return is_active_sidebar( $sidebar . '-widgets' );
	}
endif;

if ( ! function_exists( 'domestic_get_thumbnail_size' ) ) :
	/**
	 * Return the featured image  size for a given page
	 *
	 * @return string
	 */
	function domestic_get_thumbnail_size() {
		$has_sidebar = domestic_has_sidebar();

		if ( ( is_single() || is_home() ) && $has_sidebar ) {
			return 'domestic-featured-medium';
		}

		return 'domestic-featured-xlarge';
	}
endif;

if ( ! function_exists( 'domestic_body_classes' ) ) :
	/**
	 * Add additional body classes
	 *
	 * @param array $classes Current list of CSS classes.
	 *
	 * @return array New list of CSS classes
	 */
	function domestic_body_classes( $classes ) {
		$classes[] = 'offcanvas';
		$classes[] = 'domestic-menu-schema-' . get_theme_mod( 'domestic_menu_schema', 'dark' );
		if ( domestic_has_sidebar( 'footer' ) ) {
			$widgets   = wp_get_sidebars_widgets();
			$cols      = count( $widgets['footer-widgets'] );
			$classes[] = 'domestic-footer-widgets-cols-' . $cols;
		}
		if ( domestic_has_sidebar() && ! is_front_page() ) {
			$classes[] = 'has-sidebar';
		}

		return $classes;
	}

endif;
add_filter( 'body_class', 'domestic_body_classes' );

if ( ! function_exists( 'domestic_entry_meta' ) ) :
	/**
	 * Display the metadata like date and author name for a post
	 */
	function domestic_entry_meta() {
		?>
		<p class="post-meta">
			<time class="updated show-for-sr" datetime="<?php echo esc_attr( get_the_time( 'c' ) ); ?>">

				<?php
				/* translators: %1$s: the post date */
				printf( esc_html__( 'Posted on %1$s at.', 'domestic' ), get_the_date() );
				?>
			</time>
			<time class="updated hide-for-sr" datetime="<?php echo esc_attr( get_the_time( 'c' ) ); ?>">
				<?php the_date(); ?>
			</time>

			<span class="byauthor">
				<?php
				printf(
					/* translators: %s: Post Author */
					esc_html_x( 'by %s', 'posted by author', 'domestic' ),
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
	/**
	 * Display the list of categories for a given post
	 *
	 * @param bool $link_categories If the categories should be displayed inside links.
	 */
	function domestic_post_categories( $link_categories = true ) {
		if ( $link_categories ) {
			?>
				<p class="post-categories"><?php echo get_the_category_list( ' / ' ); // WPCS: XSS OK. ?></p>
			<?php
		} else {
			$categories = get_the_category();
			?>
				<p class="post-categories">
					<?php echo implode( ' / ', wp_list_pluck( $categories, 'name' ) ); // WPCS: XSS OK. ?>
				</p>
			<?php
		}

	}
endif;
