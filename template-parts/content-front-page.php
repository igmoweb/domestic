<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( get_the_title() ) : ?>
		<header>
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header>
	<?php endif; ?>

	<div class="entry-content">
		<div class="home-main-content row">
			<div class="columns large-12">
				<?php the_content(); ?>
			</div>
		</div>
	</div>

	<footer class="row">
		<div class="columns small-12">
			<?php edit_post_link( __( '(Edit)', 'domestic' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
	</footer>
</article>
