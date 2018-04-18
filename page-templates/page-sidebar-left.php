<?php
/*
Template Name: Left Sidebar
*/

get_header(); ?>

	<?php get_sidebar(); ?>

	<main id="main" class="columns <?php echo esc_attr( domestic_get_content_class( 'main' ) ); ?>">
		<?php
		while ( have_posts() ) :
			the_post();
?>
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php the_post_navigation(); ?>
			<?php comments_template(); ?>
		<?php endwhile; ?>
	</main>

<?php
get_footer();

