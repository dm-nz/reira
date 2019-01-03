<?php
/**
 * Register image sizes
 *
 * @package nelumbo
 */

// Cover thumbnail
add_image_size( 'cover', 1920, 1080, true );

// Logo
add_theme_support('custom-logo', array(
	'height' => 80,
	'flex-height' => true
));
