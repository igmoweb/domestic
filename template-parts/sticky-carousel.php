<?php
$query      = domestic_get_sticky_carousel_query();
$thumbnails = [];
$colors     = [ '#EC9787', '#944743', '#6F9FD8', '#E94B3C', '#ECDB54', '#6B5B95' ];
?>

<div class="owl-carousel owl-theme">
	<?php if ( $query->have_posts() ) : ?>
		<?php
		while ( $query->have_posts() ) :
			$query->the_post();
?>
			<?php
				$thumbnail                  = get_the_post_thumbnail_url( get_the_ID(), 'sticky-carousel' );
				$thumbnails[ get_the_ID() ] = $thumbnail ? $thumbnail : '';
			?>
			<div class="owl-carousel-item owl-carousel-item-<?php echo esc_attr( get_the_ID() ); ?>" onclick="location.href='<?php echo esc_url( get_permalink() ); ?>'">
				<div class="owl-carousel-backdrop"></div>
				<div class="owl-carousel-item-content">
					<?php domestic_post_categories( false ); ?>
					<?php the_title( '<h2 class="owl-carousel-item-title h6"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
				</div>
			</div>
		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>

	<?php endif; ?>
</div>

<style>
	<?php foreach ( $thumbnails as $post_id => $url ) : ?>
		.owl-carousel-item-<?php echo esc_attr( $post_id ); ?> {
			<?php if ( $url ) : ?>
				background:transparent url(<?php echo $url; ?>) no-repeat center;
			<?php else : ?>
				background: <?php echo $colors[ array_rand( $colors ) ]; ?>
			<?php endif; ?>
		}
	<?php endforeach; ?>
</style>
