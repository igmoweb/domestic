<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Domestic
 * @since 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>

<header class="site-header" role="banner">
	<div class="site-title-bar title-bar">
		<div class="title-bar-left">
			<span class="site-mobile-title title-bar-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</span>
		</div>
		<div class="title-bar-right">
			<button aria-label="<?php _e( 'Main Menu', 'domestic' ); ?>" class="menu-icon" type="button" data-toggle="off-canvas-menu"></button>
		</div>
	</div>

	<div class="site-branding">
		<?php if ( has_custom_logo() ) : ?>
			<?php the_custom_logo(); ?>
		<?php endif; ?>

		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

		<?php
		$domestic_description = get_bloginfo( 'description', 'display' );
		if ( $domestic_description || is_customize_preview() ) :
			?>
			<p class="site-description"><?php echo $domestic_description; /* WPCS: xss ok. */ ?></p>
			<?php
		endif;
		?>
	</div>

	<?php if ( has_nav_menu( 'top-bar-r' ) ) : ?>
		<nav class="site-navigation top-bar" role="navigation">
			<?php domestic_top_bar_r(); ?>
		</nav>
		<nav class="mobile-menu vertical menu" id="off-canvas-menu" role="navigation">
			<?php domestic_mobile_nav(); ?>
		</nav>
	<?php endif; ?>

</header>

<?php if ( domestic_display_sticky_slider() ) : ?>
	<?php get_template_part( 'template-parts/sticky-carousel' ); ?>
<?php endif; ?>

<?php if ( is_page() ) : ?>
	<?php get_template_part( 'template-parts/featured-image', 'page' ); ?>
<?php endif; ?>

<?php if ( function_exists( 'yoast_breadcrumb' ) ) : ?>
	<div class="row align-right breadcrumbs"><div class="columns-small-12"><?php yoast_breadcrumb(); ?></div></div>
<?php endif; ?>

<div id="content" class="<?php echo ( ! is_front_page() || is_home() ) ? esc_attr( 'row' ) : ''; ?>">
