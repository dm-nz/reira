<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package reira
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) :
	return;
endif;
?>

<div id="footer-widgets">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- .grid-x -->
	</div><!-- .grid-container -->
</div><!-- #footer-widgets -->
