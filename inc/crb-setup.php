<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Theme options
add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
	Container::make( 'theme_options', __( 'Theme Options' ) )
		->add_fields( array(
			Field::make( 'header_scripts', 'crb_header_script' ),
			Field::make( 'footer_scripts', 'crb_footer_script' ),
		) );
}

use Carbon_Fields\Block;

// Accordion block
add_action( 'carbon_fields_register_fields', 'register_accordion_block' );
function register_accordion_block() {
	Block::make( __( 'Accordion' ) )
		->add_fields( array(
			Field::make( 'complex', 'accordion_items', __( 'Items' ) )
				->add_fields( array(
					Field::make( 'text', 'accordion_item_headline', __( 'Headline' ) ),
					Field::make( 'rich_text', 'accordion_item_content', __( 'Content' ) ),
				) )
		) )
		->set_render_callback( function( $fields, $attributes, $inner_blocks ) {
		?>

			<ul class="accordion <?php echo $attributes['className']; ?>" data-accordion data-allow-all-closed="true">
				<?php
				$accordion = $fields['accordion_items'];
				foreach ( $accordion as $accordion_item ) :
				?>
					<li class="accordion-item" data-accordion-item>
						<a href="#" class="accordion-title"><?php echo $accordion_item['accordion_item_headline']; ?></a>
						<div class="accordion-content" data-tab-content>
							<?php echo wpautop( $accordion_item['accordion_item_content'] ); ?>
						</div><!-- accordion-content -->
					</li><!-- .accordion-item -->
				<?php endforeach; ?>
			</ul><!-- .accordion -->

		<?php
		} );
}

// Carousel block
add_action( 'carbon_fields_register_fields', 'register_carousel_block' );
function register_carousel_block() {
	Block::make( __( 'Carousel' ) )
		->add_fields( array(
			Field::make( 'media_gallery', 'carousel_items', __( 'Images' ) )
				->set_type( array( 'image' ) )
		) )
		->set_preview_mode( false )
		->set_render_callback( function( $fields, $attributes, $inner_blocks ) {
		?>

			<div class="orbit <?php echo $attributes['className']; ?>" role="region" data-orbit data-auto-play="false">
				<div class="orbit-wrapper">
					<div class="orbit-controls">
						<button class="orbit-previous">
							<span class="show-for-sr"><?php echo __( 'Previous' ); ?></span><i class="fa fa-2x fa-chevron-left"></i>
						</button><!-- .orbit-previous -->
						<button class="orbit-next">
							<span class="show-for-sr"><?php echo __( 'Next' ); ?></span><i class="fa fa-2x fa-chevron-right"></i>
						</button><!-- .orbit-next -->
					</div><!-- .orbit-controls -->
					<ul class="orbit-container">
						<?php
						$carousel = $fields['carousel_items'];
						$carousel_item_count = 0;
						foreach ( $carousel as $carousel_item ) :
						?>
							<li class="orbit-slide<?php if ( $carousel_item_count == 0 ) { echo ' is-active'; } ?>">
								<figure class="orbit-figure">
									<?php echo wp_get_attachment_image( $carousel_item, 'large' ); ?>
									<?php if ( wp_get_attachment_caption( $carousel_item ) ) : ?>
										<figcaption class="orbit-caption"><?php echo wp_get_attachment_caption( $carousel_item ); ?></figcaption>
									<?php endif; ?>
								</figure><!-- .orbit-figure -->
							</li><!-- .orbit-slide -->
						<?php endforeach; ?>
					</ul><!-- .orbit-container -->
				</div><!-- .orbit-wrapper -->
				<nav class="orbit-bullets">
					<?php
					$carousel_item_count = 0;
					foreach ( $carousel as $carousel_item ) :
					?>
						<button <?php if ( $carousel_item_count == 0 ) { ?> class="is-active" <?php } ?> data-slide="<?php echo $carousel_item_count; ?>">
							<span class="show-for-sr"><?php echo __( 'Image' ); ?> <?php echo $carousel_item_count + 1; ?></span>
						</button>
					<?php
					$carousel_item_count++;
					endforeach;
					?>
				</nav><!-- .orbit-bullets -->
			</div><!-- .orbit -->

		<?php
		} );
}
