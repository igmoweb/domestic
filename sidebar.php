<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Domestic
 * @since FoundationPress 1.0.0
 */

?>
<?php if ( domestic_has_sidebar() ) : ?>
	<div class="sidebar columns <?php echo esc_attr( domestic_get_content_class( 'sidebar' ) ); ?>">
		<aside class="sidebar">
			<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
		</aside>
	</div>
<?php endif ?>
