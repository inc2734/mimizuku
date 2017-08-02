<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Sets up content of the head element
 *
 * @return void
 */
add_action( 'wp_head', function() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php
}, 1 );


/**
 * Styles from customizer
 *
 * @return void
 */
add_action( 'wp_head', function() {
	$footer_widgets_area_size = get_theme_mod( 'footer-widget-area-column-size' );
	$footer_widgets_area_size = explode( '-', $footer_widgets_area_size );
	$footer_widgets_area_size = $footer_widgets_area_size[0] / $footer_widgets_area_size[1] * 100;
	?>
<style>
.l-footer-widget-area__item { -ms-flex: 0 1 <?php echo esc_html( $footer_widgets_area_size ); ?>%; flex: 0 1 <?php echo esc_html( $footer_widgets_area_size ); ?>%; max-width: <?php echo esc_html( $footer_widgets_area_size ); ?>%; }
</style>
	<?php
} );
