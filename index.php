<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Domestic
 * @since 1.0.0
 */

get_header();
?>

	<main id="main" class="<?php echo esc_attr( domestic_get_content_class( 'main' ) ); ?>">
		<?php get_template_part( 'template-parts/loop' ); ?>
	</main>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
