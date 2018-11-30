<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>

		<?php domestic_post_categories(); ?>

		<?php
		if ( is_singular() ) {
			the_title( '<h1 class="page-title">', '</h1>' );
		} else {
			the_title( '<h2 class="page-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}
		?>

	</header>

	<div class="entry-content">

		<?php get_template_part( 'template-parts/featured-image' ) ?>

		<?php domestic_entry_meta(); ?>

		<?php if ( is_singular() ) : ?>
			<?php the_content(); ?>
		<?php else : ?>
			<?php the_excerpt() ?>
		<?php endif; ?>

	</div>

	<footer>
		<?php
			wp_link_pages(
				[
					'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'domestic' ),
					'after'  => '</p></nav>',
				]
			);
			?>
		<?php if ( get_the_tags() ) : ?>
			<ul class="post-tags"><?php the_tags( '<li>', '</li><li>', '</li>' ); ?></ul>
		<?php endif; ?>

		<?php edit_post_link( __( '(Edit)', 'domestic' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article>
