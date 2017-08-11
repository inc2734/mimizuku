<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

if ( ! is_active_sidebar( 'front-page-widget-area' ) ) {
	return;
}
?>

<div class="l-front-page-widget-area">
	<?php dynamic_sidebar( 'front-page-widget-area' ); ?>
</div>
