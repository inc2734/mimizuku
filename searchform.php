<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<form role="search" method="get" class="_p-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="s"><?php echo esc_html_x( 'Search for:', 'label', 'mimizuku' ); ?></label>
	<div class="_c-input-group">
		<div class="_c-input-group__field">
			<input type="search" class="_c-input-group__control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'mimizuku' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'mimizuku' ); ?>">
		</div>
		<button class="_c-input-group__btn"><?php echo esc_html_x( 'Search', 'submit button', 'mimizuku' ); ?></button>
	</div>
</form>
