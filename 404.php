<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package reira
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main grid-container" role="main">
		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'reira' ); ?></h1>
			</header><!-- .page-header -->
			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'reira' ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->
	</main><!-- #main -->
</div><!-- #primary.large-7.medium-10 -->

<?php get_footer(); ?>
