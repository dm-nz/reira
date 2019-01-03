<?php
/**
 * Template part for displaying top bar
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reira
 */

?>

<div class="top-bar">
	<div class="top-bar-left">
		<div class="top-bar-title">
			<ul class="site-branding align-middle menu">
			<?php if ( has_custom_logo() ) : ?>
				<li class="site-logo"><?php reira_the_custom_logo(); ?></li>
			<?php endif; ?>
				<li class="site-title">
					<?php if ( is_home() ) : ?>
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php endif; ?>
				</li><!-- .site-title -->
				<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<li class="site-description show-for-medium menu-text"><span><?php echo $description; /* WPCS: xss ok. */ ?></span></li>
				<?php
				endif; ?>
			</ul><!-- .site-branding -->
		</div><!-- .top-bar-title -->
	</div><!-- .top-bar-left -->
	<div class="top-bar-right menu-hamburger hide-for-large">
		<ul class="menu">
			<li><a data-toggle="the-off-canvas"><i class="fa fa-bars"></i></a></li>
		</ul><!-- .menu -->
	</div><!-- .menu-hamburger -->
	<div class="top-bar-right show-for-large">
		<?php if ( has_nav_menu( 'menu-1' )) : ?>
			<nav id="site-navigation" role="navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id' => 'primary-menu',
					'walker' => new Foundation_Top_Bar,
					'items_wrap' => '<ul class="menu" data-responsive-menu="drilldown medium-dropdown" data-close-on-click-inside="false" data-back-button="<li class=\'js-drilldown-back\'><a>Back</a></li>">%3$s</ul>',
				) );
				?>
			</nav><!-- #site-navigation -->
		<?php endif; ?>
	</div><!-- .top-bar-right -->
</div><!-- .top-bar -->
