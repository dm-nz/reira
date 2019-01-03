<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package reira
 */

if ( ! function_exists( 'reira_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function reira_posted_on() {

$byline = sprintf(
	esc_html_x( '%s', 'post author', 'reira' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline item">' . $byline . '</span>'; // WPCS: XSS OK.

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	/* if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	} */

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'reira' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="posted-on item">' . $posted_on . '</span>'; // WPCS: XSS OK.

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link item">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'reira' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	} elseif ( is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link item"><a href="#comments">' . __( 'Leave a Comment', 'reira' ) . '</a></span>';
	}

}
endif;

if ( ! function_exists( 'reira_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function reira_entry_footer() {
	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format item">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'reira' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'reira' ) );
		if ( $categories_list ) {
			printf( '<span class="cat-links item">' . esc_html__( 'Posted in %1$s', 'reira' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'reira' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links item">' . esc_html__( 'Tagged %1$s', 'reira' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
}
endif;

/**
 * Flush out the transients used in reira_categorized_blog.
 */
function reira_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'reira_categories' );
}
add_action( 'edit_category', 'reira_category_transient_flusher' );
add_action( 'save_post',     'reira_category_transient_flusher' );

function reira_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
