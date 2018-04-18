<?php get_header(); ?>

	<main id="main" class="columns <?php echo esc_attr( domestic_get_content_class( 'main' ) ); ?>">
		<?php woocommerce_content(); ?>
	</main>

	<?php get_sidebar(); ?>

<?php
get_footer();
