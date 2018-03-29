<?php if ( has_post_thumbnail() ): ?>
	<div class="page-title-header">
		<?php the_post_thumbnail( 'featured-page' ); ?>
		<div class="page-title-wrap">
			<div class="row">
				<h1 class="page-title small-12 columns"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
<?php endif; ?>