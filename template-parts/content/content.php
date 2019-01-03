<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reira
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
	<div class="entry-content grid-container">
		<?php
		the_content( sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'nelumbo' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nelumbo' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content.grid-container -->
	<footer class="entry-footer grid-container">
		<?php
		reira_entry_footer();
		if ( get_edit_post_link() ) :
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'reira' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link item">',
				'</span>'
			);
		endif;
		?>
	</footer><!-- .entry-footer.grid-container -->
</article><!-- #post-##.entry -->
