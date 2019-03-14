<?php
/**
 * Template part for displaying entry cover
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reira
 */

?>

<header class="entry-header entry-cover inverse" style="background-image: url(<?php echo the_post_thumbnail_url('cover'); ?>)">
	<div class="image-filter"></div>
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-bottom">
			<div class="cell">
				<?php
				the_title( '<h1 class="entry-title">', '</h1>' );
				if ( is_single() ) :
				?>
					<div class="entry-meta">
						<?php reira_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</div><!-- .cell -->
		</div><!-- .grid-x -->
	</div><!-- .grid-container -->
</header><!-- .entry-header.entry-cover -->
