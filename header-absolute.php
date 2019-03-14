<?php
/**
 * The header for templates with cover.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package reira
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php get_template_part( 'template-parts/header/head' ); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site off-canvas-wrapper">
	<div class="off-canvas position-right inverse" id="the-off-canvas" data-off-canvas>
		<?php
		if ( has_nav_menu( 'menu-1' )) :
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id' => 'off-canvas-menu',
				'menu_class' => 'vertical menu',
				'walker' => new Foundation_Off_Canvas,
				'container' => ''
			) );
		endif;
		?>
		<button class="close-button" aria-label="Close menu" type="button" data-close>
			<span aria-hidden="true">&times;</span>
		</button><!-- .close-button -->
	</div><!-- #the-off-canvas.off-canvas -->
	<div class="off-canvas-content" data-off-canvas-content>
		<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'reira' ); ?></a>
		<div class="header-absolute">
			<div class="sticky-header" data-sticky-container>
				<div data-sticky data-options="marginTop:0;">
					<header id="masthead" class="site-header" role="banner">
						<div class="grid-container">
							<?php get_template_part( 'template-parts/header/top-bar' ); ?>
						</div><!-- .grid-container -->
					</header><!-- #masthead.site-header -->
				</div><!-- data-sticky -->
			</div><!-- .sticky-header data-sticky-container -->
		</div><!-- header-absolute -->

		<div id="content" class="site-content">
