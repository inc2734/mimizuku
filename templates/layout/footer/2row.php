<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<footer class="_l-footer" role="content-info" data-l="footer">
	<div class="_c-row">
		<div class="_c-row__col _c-row__col--1-1">
			<?php
			add_filter( 'wp_nav_menu_args', function( $args ) {
				if ( 'footer-nav' == $args['theme_location'] ) {
					$args = array_merge( $args, [
						'container'       => 'div',
						'container_class' => '_c-container',
					] );
				}
				return $args;
			} );
			get_template_part( 'template-parts/footer-nav' );
			?>
		</div>
		<div class="_c-row__col _c-row__col--1-1">
			<div class="_c-container">
				<?php get_template_part( 'template-parts/copyright' ); ?>
			</div>
		</div>
	</div>
</footer>
