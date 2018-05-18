<?php
$background = '';
if ( has_post_thumbnail() ) {
	$post_thumbnail_id = get_post_thumbnail_id( $post );
	$image             = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	$background        = 'background-image: url(' . $image[0] . ')';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="<?php echo esc_attr( $background ); ?>">
	<header>
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php the_title( '<h2 class="page-title">', '</h2>' ); ?>
		</a>
	</header>

	<footer>
		<?php edit_post_link( __( '(Edit)', 'domestic' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article>
