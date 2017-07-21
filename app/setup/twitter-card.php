<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Print Twitter Cards tags
 *
 * @return void
 */
add_action( 'wp_head', function() {
	$twitter_card = get_theme_mod( 'twitter-card' );
	$twitter_site = get_theme_mod( 'twitter-site' );
	?>
	<?php if ( $twitter_card ) : ?>
		<meta name="twitter:card" content="<?php echo esc_attr( $twitter_card ); ?>">
	<?php endif; ?>

	<?php if ( preg_match( '/^@[^@]+$/', $twitter_site ) ) : ?>
		<meta name="twitter:site" content="<?php echo esc_attr( $twitter_site ); ?>">
	<?php endif; ?>
	<?php
} );
