<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @package reira
 */

if ( ! function_exists( 'reira_setup' ) ) :
// Note that this function is hooked into the after_setup_theme hook, which runs before the init hook.
// The init hook is too late for some features, such as indicating support for post thumbnails.
function reira_setup() {

	// Make theme available for translation. Translations can be filed in the /languages/ directory.
	// If you're building a theme based on reira, use a find and replace to change 'reira' to the name of your theme in all the template files.
	load_theme_textdomain( 'reira', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title. By adding theme support, we declare that this theme
	// does not use a hard-coded <title> tag in the document head, and expect WordPress to provide it for us.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	// @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => __( 'Primary', 'reira' ),
	) );

	// Add active class to menu
	function active_menu_item ($classes, $item) {
		if (in_array('current-menu-item', $classes) ){
			$classes[] = 'active ';
		}
		return $classes;
	}
	// add_filter('nav_menu_css_class' , 'active_menu_item' , 10 , 2);

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( 'css/editor.min.css' );
}
endif;
add_action( 'after_setup_theme', 'reira_setup' );
