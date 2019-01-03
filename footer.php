<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package reira
 */

?>
		</div><!-- #content -->

		<div id="footer-wrapper" class="inverse">
			<?php get_sidebar(); ?>
			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="grid-container">
					<div class="grid-x grid-padding-x">
						<div class="site-copyright medium-6 cell">
							<i class="far fa-copyright"></i> <?php echo date('Y') . " "; bloginfo('name'); ?>
						</div><!-- .site-copyright.medium-6 -->
						<div class="site-developer medium-6 cell medium-text-right">
							<i class="fab fa-wordpress"></i> <?php printf( esc_html__( 'Theme: %1$s by %2$s', 'Reira' ), 'Reira', '<a href="https://lotus.kg/" rel="designer">Lotus</a>' ); ?>
						</div><!-- .site-developer.medium-6 -->
					</div><!-- .grid-x -->
				</div><!-- .grid-container -->
			</footer><!-- #colophon.site-footer -->
		</div><!-- #footer-wrapper -->
	</div><!-- .off-canvas-content -->
</div><!-- #page.off-canvas-wrapper -->

<?php wp_footer(); ?>

<script>
	$(document).foundation();
</script>

</body>
</html>
