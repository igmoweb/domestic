<?php get_header(); ?>
	<main id="main" class="columns <?php echo esc_attr( domestic_get_content_class( 'main' ) ); ?>">
		<h1 class="page-title"><?php esc_html_e( 'Projects', 'domestic' ); ?></h1>

		<?php $types = get_terms( [ 'taxonomy' => 'jetpack-portfolio-type' ] ); ?>
		<?php if ( ! empty( $types ) ) : ?>
			<ul class="porfolio-filter menu align-center">
				<li>
					<?php if ( is_tax() ) : ?>
						<a href="<?php echo esc_url( get_post_type_archive_link( 'jetpack-portfolio' ) ); ?>">
							<?php esc_html_e( 'All', 'domestic' ); ?>
						</a>
					<?php else : ?>
						<span><?php esc_html_e( 'All', 'domestic' ); ?></span>
					<?php endif; ?>
				</li>

				<?php foreach ( $types as $type ) : ?>
					<li>
						<?php if ( ! is_tax( 'jetpack-portfolio-type', $type->term_id ) ) : ?>
							<a href="<?php echo esc_url( get_term_link( $type ) ); ?>"><?php echo $type->name; ?></a>
						<?php else : ?>
							<span><?php echo $type->name; ?></span>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>
			<div id="portfolio-content" class="row">
				<?php while ( have_posts() ) :the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'portfolio' ); ?>
				<?php endwhile; ?>
			</div>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; // End have_posts() check. ?>
	</main>

<?php get_sidebar(); ?>

<?php
get_footer();

