<?php
/**
 * The template for displaying a single page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Domestic
 * @since 1.0.0
 */

get_header();
?>

	<main id="main" class="<?php echo esc_attr( domestic_get_content_class( 'main' ) ); ?>">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<?php if ( is_front_page() ) : ?>
				<?php get_template_part( 'template-parts/content', 'front-page' ); ?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php endif; ?>

			<?php comments_template(); ?>
		<?php endwhile; ?>
	</main>
<?php
get_footer();
