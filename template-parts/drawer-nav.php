<?php
if ( ! has_nav_menu( 'drawer-nav' ) ) {
	return;
}
?>
<nav class="_c-drawer-nav__body _c-drawer__body _c-drawer__body--fixed" role="navigation" aria-expanded="false">
	<?php
	wp_nav_menu( [
		'theme_location' => 'drawer-nav',
		'container'      => false,
		'menu_class'     => '_c-drawer-nav__menu _c-drawer__menu',
		'depth'          => 0,
	] );
	?>
</nav>
