<?php
namespace Mimizuku\Tags;

/**
 * Load the template for entries item
 *
 * @return void
 */
function get_entries_item_template() {
	$is_block_link = apply_filters( 'mimizuku_entries_item_block_link', false );
	$slug = apply_filters( 'mimizuku_entries_item_template', 'summary' );

	if ( ! $is_block_link ) {
		get_template_part( 'template-parts/content/content', $slug );
	} else {
		ob_start();
		get_template_part( 'template-parts/content/content', $slug );
		$content = ob_get_clean();
		$allowed_html = wp_kses_allowed_html( 'post' );
		unset( $allowed_html['a'] );
		?>
		<a href="<?php the_permalink(); ?>">
			<?php echo wp_kses( $content, $allowed_html ); ?>
		</a>
		<?php
	}
}
