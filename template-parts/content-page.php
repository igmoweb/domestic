<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! has_post_thumbnail() ): ?>
		<header>
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header>
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<footer>
		<?php
		wp_link_pages(
			array(
				'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'domestic' ),
				'after'  => '</p></nav>',
			)
		);
		?>

		<?php edit_post_link( __( '(Edit)', 'domestic' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article>
