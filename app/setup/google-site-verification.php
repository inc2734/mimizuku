<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Print google-siete-verification meta
 *
 * @return void
 */
add_action( 'wp_head', function() {
	$google_site_verification = get_theme_mod( 'google-site-verification' );
	if ( ! $google_site_verification ) {
		return;
	}
	?>
	<meta name="google-site-verification" content="<?php echo esc_attr( $google_site_verification ); ?>">
	<?php
} );
