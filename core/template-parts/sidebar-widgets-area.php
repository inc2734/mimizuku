<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

if ( is_active_sidebar( 'sidebar-widgets-area' ) ) {
	return;
}
?>

<div class="l-sidebar-widget-area">
	<?php dynamic_sidebar( 'sidebar-widgets-area' ); ?>
</div>
