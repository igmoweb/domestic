<?php
$sections = domestic_get_front_page_sections();
global $post;
?>

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


		<div class="front-page-sections">
			<?php foreach ( $sections as $key => $section ) : ?>
				<?php
					$post = get_post( $section['page'] );
					setup_postdata( $GLOBALS['post'] );
				?>
				<div
						class="front-page-section front-page-section-<?php echo esc_attr( $section['style'] ); ?> front-page-section-key-<?php echo esc_attr( $key ); ?>"
						style="<?php echo esc_attr( apply_filters( 'domestic_front_page_section_styles', '', $key ) ); ?>"
				>
					<div id="post-<?php the_ID(); ?>" <?php echo apply_filters( 'domestic_front_page_section_attributes', '', $section['style'], $key ); ?>>
						<?php get_template_part( 'template-parts/front-page/' . $section['style'] ); ?>
					</div>
				</div>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>

	<footer class="row">
		<div class="columns small-12">
			<?php edit_post_link( __( '(Edit)', 'domestic' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
	</footer>
</article>
