<?php if ( has_post_thumbnail() ) : ?>
	<div class="featured-image">
		<?php the_post_thumbnail( domestic_get_thumbnail_size() ); ?>
	</div>
<?php endif; ?>
