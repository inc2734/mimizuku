<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

if ( ! has_nav_menu( 'footer-nav' ) ) {
	return;
}
?>
<nav class="_p-footer-nav" role="navigation">
	<?php
	wp_nav_menu( [
		'theme_location' => 'footer-nav',
		'container'      => false,
		'depth'          => 1,
	] );
	?>
</nav>
