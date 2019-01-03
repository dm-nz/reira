<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reira
 */

if ( reira_can_show_post_thumbnail() ) :
	get_header( 'absolute' );
else :
	get_header();
endif;
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content/content', 'page' );
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile;
		?>
	</main><!-- #main.site-main -->
</div><!-- #primary.content-area -->

<?php get_footer(); ?>
