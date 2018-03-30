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
		<?php edit_post_link( __( '(Edit)', 'domestic' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article>
