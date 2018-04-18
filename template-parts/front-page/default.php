<div class="columns small-12">
	<div class="front-page-section-thumb">
		<?php if ( has_post_thumbnail() ): ?>
			<?php the_post_thumbnail( 'front-section-fullwidth' ); ?>
		<?php endif; ?>
	</div>
	<div class="front-page-section-content">
		<h2 class="text-center front-page-section-title"><?php the_title(); ?></h2>
		<?php the_content(); ?>
	</div>
</div>