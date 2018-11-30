<?php if ( have_posts() ) : ?>

	<?php /* Start the Loop */ ?>
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
	<?php endwhile; ?>

<?php else : ?>
	<?php get_template_part( 'template-parts/content', 'none' ); ?>
<?php endif; // End have_posts() check. ?>

<?php
domestic_posts_navigation();
