<?php get_header(); ?>

	<main id="main" class="columns small-12">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php comments_template(); ?>
		<?php endwhile; ?>
	</main>

<?php get_footer();
