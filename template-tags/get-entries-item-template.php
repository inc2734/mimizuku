<?php
namespace Mimizuku\Tags;

/**
 * Load the template for entries item
 *
 * @return void
 */
function get_entries_item_template() {
	$slug = 'summary';
	get_template_part(
		'template-parts/content/content',
		apply_filters( 'mimizuku_entries_item_template', $slug )
	);
}
