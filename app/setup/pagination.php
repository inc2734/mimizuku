<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Update pagination for singular post
 *
 * @param string $pagination
 * @return string
 */
add_filter( 'wp_link_pages_link', function( $pagination ) {
	$pagination = preg_replace(
		'/^(\d+)$/',
		'<span class="page-numbers current">$1</span>',
		$pagination
	);
	$pagination = preg_replace(
		'/^<a([^>]+)>(\d+?)<\/a>$/',
		'<a class="page-numbers" $1>$2</a>',
		$pagination
	);
	$pagination = mimizuku_pagination( $pagination );
	$pagination .= "\n";

	return $pagination;
} );

/**
 * Print sanitized pagination
 *
 * @param string $pagination
 * @return void
 */
function mimizuku_sanitize_pagination_e( $pagination ) {
	echo wp_kses(
		$pagination,
		[
			'h2' => [
				'class' => [],
			],
			'div' => [
				'class' => [],
			],
			'span' => [
				'class'        => [],
				'aria-current' => [],
				'aria-hidden'  => [],
			],
			'a' => [
				'class' => [],
				'href'  => [],
			],
			'i' => [
				'class'       => [],
				'aria-hidden' => [],
			],
		]
	);
}

/**
 * Update pagination
 *
 * @param string $pagination
 * @return string
 */
function mimizuku_pagination( $pagination ) {
	$pagination = str_replace(
		"'",
		'"',
		$pagination
	);
	$pagination = str_replace(
		'<span class="page-numbers',
		'<span class="_c-pagination__item',
		$pagination
	);
	$pagination = str_replace(
		'<a class="page-numbers',
		'<a class="_c-pagination__item-link',
		$pagination
	);
	$pagination = str_replace(
		' current"',
		' " aria-current="page"',
		$pagination
	);
	$pagination = str_replace(
		'_c-pagination__item dots"',
		'_c-pagination__item-ellipsis" aria-hidden="true"',
		$pagination
	);
	$pagination = str_replace(
		[ 'next page-numbers', 'prev page-numbers' ],
		'_c-pagination__item-link',
		$pagination
	);

	return $pagination;
}
