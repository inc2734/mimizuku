<?php
if ( ! has_nav_menu( 'global-nav' ) ) {
	return;
}
?>
<nav class="global-nav" role="navigation">
	<div class="_c-container">
		<?php
		wp_nav_menu( [
			'theme_location' => 'global-nav',
			'container'      => false,
			'menu_class'     => '_c-menu _c-menu--bar _c-menu--auto',
			'depth'          => 0,
		] );
		?>
	</div>
</nav>
