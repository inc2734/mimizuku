<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<div class="c-entry">
	<div class="c-entry__content">
		<p>
			<?php esc_html_e( 'Woops! Page not found.', 'mimizuku' ); ?><br>
			<?php esc_html_e( 'The page you are looking for may be moved or deleted.', 'mimizuku' ); ?><br>
			<?php esc_html_e( 'Please search this search box.', 'mimizuku' ); ?>
		</p>

		<?php get_search_form(); ?>
	</div>
</div>
