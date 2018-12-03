<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Domestic
 * @since 1.0.0
 */

?>
</div><!-- #content -->

<?php if ( domestic_has_sidebar( 'footer' ) || domestic_footer_tagline() ) : ?>
	<footer class="footer" id="page-footer" role="contentinfo">
		<?php if ( domestic_has_sidebar( 'footer' ) ) : ?>
			<div class="footer-container row">
				<div class="sidebar columns small-12">
					<?php dynamic_sidebar( 'footer-widgets' ); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( domestic_footer_tagline() ) : ?>
			<div class="site-info row">
				<div class="columns small-12">
					<?php echo domestic_footer_tagline(); ?>
				</div>
			</div><!-- .site-info -->
		<?php endif; ?>
	</footer>
<?php endif; ?>

</div><!-- Close off-canvas content -->
</div><!-- Close off-canvas wrapper -->

<?php wp_footer(); ?>
</body>
</html>
