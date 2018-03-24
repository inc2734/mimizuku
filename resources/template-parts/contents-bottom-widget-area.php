<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$sidebar_id = 'contents-bottom-widget-area';

if ( ! is_active_sidebar( $sidebar_id ) || ! is_registered_sidebar( $sidebar_id ) ) {
	return;
}
?>

<div class="l-contents-bottom-widget-area">
	<?php dynamic_sidebar( $sidebar_id ); ?>
</div>
