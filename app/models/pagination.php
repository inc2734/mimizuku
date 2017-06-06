<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Models;

class Pagination {

	/**
	 * Replace html structure for Basis pagination
	 *
	 * @param string $pagination
	 * @return string
	 */
	public static function replace_basis_pager_structure( $pagination ) {
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
}
