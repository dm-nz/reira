<?php
/**
 * Register image sizes
 *
 * @package reira
 */

// Cover thumbnail
add_image_size( 'cover', 1920, 1080, true );

// Logo
add_theme_support( 'custom-logo', array(
	'height' => 80,
	'flex-width'  => true,
	'flex-height' => true,
));
