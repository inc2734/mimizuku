<?php
namespace Mimizuku\Functions\Head;

/**
 * Sets up content of the head element
 *
 * @return void
 */
function setup() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php
}
add_action( 'wp_head', __NAMESPACE__ . '\\setup', 1 );
