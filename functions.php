<?php
/**
 * Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package reira
 */

// Setup theme
require get_template_directory() . '/inc/theme-setup.php';

// Register widgets
require get_template_directory() . '/inc/widgets.php';

// Register scripts and stylesheets
require get_template_directory() . '/inc/enqueue-scripts.php';

// Implement the Custom Header feature
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions
require get_template_directory() . '/inc/customizer.php';

// Load Jetpack compatibility file
require get_template_directory() . '/inc/jetpack.php';

// Register image sizes
require get_template_directory() . '/inc/images-setup.php';

// Register walkers
require get_template_directory() . '/inc/walkers.php';

// Enhance the theme by hooking into WordPress
require get_template_directory() . '/inc/template-functions.php';
