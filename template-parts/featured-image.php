<?php
/**
 * The template part for displaying a featured image
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package Domestic
 * @since 1.0.0
 */

?>
<?php if ( has_post_thumbnail() ) : ?>
	<div class="featured-image">
		<?php the_post_thumbnail( domestic_get_thumbnail_size() ); ?>
	</div>
<?php endif; ?>
