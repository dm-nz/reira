<?php
/**
 * The template for displaying archive pages in grid style.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reira
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header grid-container">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .entry-header -->
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content/content', 'single' );
			endwhile;
		else :
			get_template_part( 'template-parts/content/content', 'none' );
		endif;
		?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
if ( get_the_posts_navigation() ) :
	get_template_part( 'template-parts/footer/post-navigation' );
endif;
?>

<?php get_footer(); ?>
