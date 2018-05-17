<?php
/**
 * Template part for off canvas menu
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
$position_class = is_rtl() ? 'position-left' : 'position-right';
?>

<nav class="mobile-off-canvas-menu off-canvas <?php echo esc_attr( $position_class ); ?>" id="off-canvas-menu" data-off-canvas data-auto-focus="false" role="navigation">
	<?php domestic_mobile_nav(); ?>
</nav>

<div class="off-canvas-content" data-off-canvas-content>
