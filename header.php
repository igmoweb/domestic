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
	<div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle(); ?>>
		<div class="title-bar-left">
			<button aria-label="<?php _e( 'Main Menu', 'domestic' ); ?>" class="menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"></button>
			<span class="site-mobile-title title-bar-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</span>
		</div>
	</div>

	<div class="site-branding">
		<?php if ( has_custom_logo() ): ?>
			<?php the_custom_logo(); ?>
		<?php endif; ?>

		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

		<?php
		$domestic_description = get_bloginfo( 'description', 'display' );
		if ( $domestic_description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo $domestic_description; /* WPCS: xss ok. */ ?></p>
		<?php endif;
		?>
	</div>

	<nav class="site-navigation top-bar" role="navigation">
		<?php domestic_top_bar_r(); ?>

		<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
			<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
		<?php endif; ?>
	</nav>

</header>

<?php if ( domestic_display_sticky_slider() ): ?>
	<?php get_template_part( 'template-parts/sticky-carousel' ); ?>
<?php endif; ?>

<?php if ( is_page() ): ?>
	<?php get_template_part( 'template-parts/featured-image', 'page' ); ?>
<?php endif; ?>

<div id="content" class="row">
