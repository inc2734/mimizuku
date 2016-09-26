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
<aside class="_p-response">
	<?php
	if ( ! empty( $comments_by_type['comment'] ) || comments_open() ) {
		get_template_part( 'template-parts/comments' );
	}

	if ( ! empty( $comments_by_type['pings'] ) || pings_open() ) {
		get_template_part( 'template-parts/pings' );
	}
	?>
</aside>
