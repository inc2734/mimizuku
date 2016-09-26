<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<aside role="complementary">
	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<div class="_p-sidebar-widgets">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div>
	<?php endif; ?>
</aside>
