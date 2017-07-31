<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

if ( is_active_sidebar( 'footer-widgets-area' ) ) {
	return;
}
?>

<div class="l-footer-widget-area">
	<div class="c-container">
		<?php dynamic_sidebar( 'footer-widgets-area' ); ?>
	</div>
</div>
