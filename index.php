<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reira
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) :
			if ( is_home() && ! is_front_page() ) : ?>
			<header class="entry-header">
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header><!-- .entry-header -->
			<?php endif; ?>
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content/content', 'single' );
			endwhile;
		else :
			get_template_part( 'template-parts/content/content', 'none' );
		endif;
		?>
	</main><!-- #main.site-main -->
</div><!-- #primary.content-area -->
<?php
if ( get_the_posts_navigation() ) :
	get_template_part( 'template-parts/footer/post-navigation' );
endif;
?>

<?php get_footer(); ?>
