<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
	Container::make( 'theme_options', __( 'Theme Options' ) )
		->add_fields( array(
			Field::make( 'header_scripts', 'crb_header_script' ),
			Field::make( 'footer_scripts', 'crb_footer_script' ),
		) );
}

use Carbon_Fields\Block;

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
		->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
		?>

			<ul class="accordion <?php echo $attributes['className']; ?>" data-accordion data-allow-all-closed="true">
				<?php
				$accordion_items = $fields['accordion_items'];
				foreach ( $accordion_items as $accordion ) :
				?>
					<li class="accordion-item" data-accordion-item>
						<a href="#" class="accordion-title"><?php echo $accordion['accordion_item_headline']; ?></a>
						<div class="accordion-content" data-tab-content>
							<?php echo wpautop( $accordion['accordion_item_content'] ); ?>
						</div><!-- accordion-content -->
					</li><!-- .accordion-item -->
				<?php endforeach; ?>
			</ul><!-- .accordion -->

		<?php
		} );
}
