<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Sets up OGP
 *
 * @return void
 */
add_action( 'wp_head', function() {
	$ogp = new Inc2734_WP_OGP();
	?>
	<meta property="og:title" content="<?php echo esc_attr( $ogp->get_title() ); ?>">
	<meta property="og:type" content="<?php echo esc_attr( $ogp->get_type() ); ?>">
	<meta property="og:url" content="<?php echo esc_attr( $ogp->get_url() ); ?>">
	<meta property="og:image" content="<?php echo esc_attr( $ogp->get_image() ); ?>">
	<meta property="og:site_name" content="<?php echo esc_attr( $ogp->get_site_name() ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $ogp->get_description() ); ?>">
	<meta property="og:locale" content="<?php echo esc_attr( $ogp->get_locale() ); ?>">
	<?php
} );
