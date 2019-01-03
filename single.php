<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
			get_template_part( 'template-parts/content/content', 'single' );
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile;
		?>
	</main><!-- #main.site-main -->
</div><!-- #primary.content-area -->
<?php
if ( is_single() && get_the_post_navigation() ) :
	get_template_part( 'template-parts/footer/post-navigation' );
endif;
?>

<?php get_footer(); ?>
