<?php
global $wp_query;

if ( empty( $wp_query->max_num_pages ) || $wp_query->max_num_pages < 2 ) {
	return;
}
?>
<div class="_c-pagination">
	<?php the_posts_pagination(); ?>
</div>
