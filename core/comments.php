<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

if ( post_password_required() ) {
	return;
}
?>

<aside class="p-response">
	<?php
	get_template_part( '../core/template-parts/comments' );
	get_template_part( '../core/template-parts/pings' );
	?>
</aside>
