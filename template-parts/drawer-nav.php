<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

if ( ! has_nav_menu( 'drawer-nav' ) ) {
	return;
}
?>
<nav id="drawer-nav" class="_p-drawer__body _p-drawer__body--fixed" data-bs-component="drawer__body" role="navigation" aria-hidden="true">
	<?php
	wp_nav_menu( [
		'theme_location' => 'drawer-nav',
		'container'      => false,
		'menu_class'     => '_p-drawer__menu',
		'depth'          => 0,
	] );
	?>
</nav>
