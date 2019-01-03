<header class="entry-header grid-container">
	<?php
	if ( has_post_thumbnail() ) : ?>
		<div class="featured-image">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail( 'cover' ); ?>
			</a>
		</div><!-- .featured-image -->
	<?php
	endif;
	if ( is_singular() ) :
		the_title( '<h1 class="entry-title">', '</h1>' );
	else :
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	endif;
	?>
	<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php reira_posted_on(); ?>
		</div><!-- .entry-meta -->
	<?php endif; ?>
</header><!-- .entry-header.grid-container -->
