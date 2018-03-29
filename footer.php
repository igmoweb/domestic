</div><!-- #content -->

<footer class="footer" id="page-footer" role="contentinfo">
	<div class="footer-container row">
		<?php get_sidebar( 'footer' ); ?>
	</div>
	<div class="site-info row">
		<div class="columns small-12">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentyseventeen' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentyseventeen' ), 'WordPress' ); ?></a>
		</div>
	</div><!-- .site-info -->
</footer>

</div><!-- Close off-canvas content -->

<?php wp_footer(); ?>
</body>
</html>
