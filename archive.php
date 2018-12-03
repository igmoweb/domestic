<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Domestic
 * @since 1.0.0
 */

get_header();
?>

	<main id="main" class="columns <?php echo esc_attr( domestic_get_content_class( 'main' ) ); ?>">
		<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>

		<?php get_template_part( 'template-parts/loop' ); ?>
	</main>

	<?php get_sidebar(); ?>

<?php
get_footer();

