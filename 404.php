<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Domestic
 * @since 1.0.0
 */

get_header();
?>

	<main id="main" class="columns small-12">
		<article class="hentry">
			<header>
				<h1 class="page-title"><?php esc_html_e( 'Whoooops. 404: Page Not Found', 'domestic' ); ?></h1>
			</header>
			<div class="entry-content">
				<div class="error">
					<p class="bottom"><?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'domestic' ); ?></p>
				</div>
				<?php get_search_form(); ?>
			</div>
		</article>
	</main>



<?php get_footer(); ?>
