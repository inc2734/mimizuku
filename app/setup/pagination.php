<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup;

class Pagination {

	public function __construct() {
		add_filter( 'wp_link_pages_link', [ $this, 'wp_link_pages_link' ] );
	}

	public static function the_posts_pagination() {
		ob_start();

		the_posts_pagination( [
			'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i><span class="screen-reader-text">' . esc_html__( 'Previous', 'mimizuku' ) . '</span>',
			'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i><span class="screen-reader-text">' . esc_html__( 'Next', 'mimizuku' ) . '</span>',
		] );

		echo static::sanitize( static::pagination( ob_get_clean() ) );
	}

	public static function wp_link_pages() {
		ob_start();

		wp_link_pages( [
			'before'           => '<div class="_c-pagination"><h2 class="screen-reader-text">' . esc_html__( 'Posts navigation', 'mimizuku' ) . '</h2><div class="nav-links">',
			'after'            => '</div></div>',
			'link_before'      => '',
			'link_after'       => '',
			'separator'        => '',
			'nextpagelink'     => '&gt;',
			'previouspagelink' => '%lt;',
			'pagelink'         => '%',
		] );

		echo static::sanitize( ob_get_clean() );
	}

	protected static function sanitize( $pagination ) {
		return wp_kses(
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

	protected static function pagination( $pagination ) {
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

	public function wp_link_pages_link( $pagination ) {
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
		$pagination = \Mimizuku\App\Models\Pagination::replace_basis_pager_structure( $pagination );
		$pagination .= "\n";

		return $pagination;
	}
}
