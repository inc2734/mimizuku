<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku;

class View {

	/**
	 * The directory for layout templates
	 *
	 * @var string
	 */
	const LAYOUT_DIRECTORY = 'layout/wrapper';

	/**
	 * The directory for view templates
	 *
	 * @var string
	 */
	const VIEW_DIRECTORY = 'views';

	/**
	 * The directory for static view templates
	 *
	 * @var string
	 */
	const STATIC_VIEW_DIRECTORY = 'views/static';

	/**
	 * The layout template path
	 *
	 * @var string
	 */
	protected static $layout;

	/**
	 * The view template path
	 *
	 * @var string
	 */
	protected static $view;

	/**
	 * The view template name suffix
	 *
	 * @var string
	 */
	protected static $view_suffix;

	/**
	 * Sets the lyaout template
	 *
	 * @param string $layout layout template path
	 * @return void
	 */
	public static function set_layout( $layout ) {
		static::$layout = $layout;
	}

	/**
	 * Sets the view template
	 *
	 * @param string $view view template path
	 * @param string $view_suffix view template suffix
	 * @return void
	 */
	public static function set_view( $view, $view_suffix = '' ) {
		static::$view        = $view;
		static::$view_suffix = $view_suffix;
	}

	/**
	 * Rendering the page
	 *
	 * @return void
	 */
	public static function render() {
		if ( is_singular() ) {
			static::_render_loop();
		} else {
			static::_render_direct();
		}
	}

	/**
	 * Rendering in the WordPress loop
	 *
	 * @return void
	 */
	protected static function _render_loop() {
		while ( have_posts() ) {
			the_post();
			static::_load_layout();
		}
	}

	/**
	 * Rendering not in the WordPress loop
	 *
	 * @return void
	 */
	protected static function _render_direct() {
		static::_load_layout();
	}

	/**
	 * Loading the layout template
	 *
	 * @return void
	 */
	protected static function _load_layout() {
		$layout = apply_filters( 'mimizuku_layout', static::$layout );
		get_template_part( trailingslashit( static::LAYOUT_DIRECTORY ) . $layout );
	}

	/**
	 * Loading the view template in layout template
	 *
	 * @return void
	 */
	public static function load_view() {
		$view = static::_get_view_args();
		$view = apply_filters( 'mimizuku_view', $view );
		get_template_part( trailingslashit( static::VIEW_DIRECTORY ) . $view['slug'], $view['name'] );
	}

	/**
	 * Gets the view args
	 *
	 * @return array
	 */
	protected static function _get_view_args() {
		$view = [
			'slug' => static::$view,
			'name' => static::$view_suffix,
		];

		if ( is_404() || is_front_page() || is_search() ) {
			return $view;
		}

		$REQUEST_URI   = $_SERVER['REQUEST_URI'];
		$REQUEST_URI   = static::_get_relative_path( $REQUEST_URI );
		$path          = static::_remove_http_query( $REQUEST_URI );
		$path          = static::_remove_paged_slug( $path );
		$path          = trim( $path, '/' );
		$template_name = trailingslashit( static::STATIC_VIEW_DIRECTORY ) . $path;

		if ( ! locate_template( $template_name . '.php', false ) ) {
			return $view;
		}

		return [
			'slug' => $path,
			'name' => '',
		];
	}

	protected static function _get_relative_path( $uri ) {
		return str_replace( home_url(), '', $uri );
	}

	protected static function _remove_http_query( $uri ) {
		$uri = str_replace( http_build_query( $_GET, NULL, '&' ), '', $uri );
		$uri = rtrim( $uri, '?' );
		return $uri;
	}

	protected static function _remove_paged_slug( $uri ) {
		if ( ! is_paged() ) {
			return $uri;
		}
		return preg_replace( '/^(.+?)\/page\/\d+/', '$1', $uri );
	}
}
