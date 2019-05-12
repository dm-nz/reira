<?php
/**
 * Register widget area
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @package reira
 */

function reira_widgets_init() {
	register_sidebar( array(
		'name'					=> esc_html__( 'Sidebar', 'reira' ),
		'id'						=> 'sidebar-1',
		'description'		=> esc_html__( 'Add widgets here.', 'reira' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s large-4 medium-6 cell">',
		'after_widget'	=> '</section>',
		'before_title'	=> '<h2 class="widget-title h4">',
		'after_title'	 	=> '</h2>',
	) );
}
add_action( 'widgets_init', 'reira_widgets_init' );
