<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package reira
 */

get_header(); ?>


<div id="primary" class="content-area">
	<main id="main" class="site-main grid-container" role="main">
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'reira' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header><!-- .page-header -->
		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content/content', 'search' );
			endwhile;
		else :
			get_template_part( 'template-parts/content/content', 'none' );
		endif;
		?>
	</main><!-- #main.site-main.grid-container -->
</div><!-- #primary.content-area -->
<?php
if ( get_the_posts_navigation() ) :
	get_template_part( 'template-parts/footer/post-navigation' );
endif;
?>

<?php get_footer(); ?>
