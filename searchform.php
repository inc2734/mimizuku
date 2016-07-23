<form role="search" method="get" class="_c-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="s"><?php echo esc_html_x( 'Search for:', 'label' ); ?></label>
	<div class="_c-input-group">
		<div class="_c-input-group__field">
			<input type="search" class="_c-input-group__control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ); ?>">
		</div>
		<button class="_c-input-group__btn"><?php echo esc_html_x( 'Search', 'submit button' ); ?></button>
	</div>
</form>
