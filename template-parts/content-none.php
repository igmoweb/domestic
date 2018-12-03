<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package Domestic
 * @since 1.0.0
 */

?>

<header class="page-header">
	<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'domestic' ); ?></h1>
</header>

<div class="page-content">
	<?php if ( is_search() ) : ?>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'domestic' ); ?></p>
		<?php get_search_form(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'domestic' ); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</div>
