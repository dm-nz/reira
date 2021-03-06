<?php
/**
 * Register scripts and stylesheets
 *
 * @link https://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @link https://codex.wordpress.org/Function_Reference/wp_enqueue_style
 *
 * @package reira
 */

function reira_scripts() {
	wp_register_style( 'foundation-style', get_template_directory_uri() . '/css/app.min.css', array(), false, 'all' );

	wp_register_style( 'font-style', 'https://fonts.googleapis.com/css?family=Lato:400,700|Lora:400,400i,700', array(), false, 'all' );

	wp_enqueue_style( 'foundation-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-style', get_stylesheet_uri() );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'foundation-jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '3.4.0', true );
	wp_enqueue_script( 'foundation-scripts', get_template_directory_uri() . '/js/app.min.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'reira_scripts' );
