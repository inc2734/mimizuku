<?php
namespace Mimizuku;

class Controller {

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

	public function __construct() {
	}

	/**
	 * Rendering the page
	 *
	 * @return void
	 */
	public static function render() {
		$type = 'direct';
		if ( is_singular() ) {
			$type = 'loop';
		}
		static::{'_render_' . $type}();
	}

	/**
	 * Rendering in the WordPress loop
	 *
	 * @return void
	 */
	protected static function _render_loop() {
		while ( have_posts() ) {
			the_post();
			get_template_part( static::$layout );
		}
	}

	/**
	 * Rendering not in the WordPress loop
	 *
	 * @return void
	 */
	protected static function _render_direct() {
		get_template_part( static::$layout );
	}

	/**
	 * Set the lyaout template
	 *
	 * @param string $layout layout template path
	 * @return void
	 */
	public static function set_layout( $layout ) {
		static::$layout = $layout;
	}

	/**
	 * Set the view template
	 *
	 * @param string $view view template path
	 * @param string $view_suffix view template suffix
	 * @return void
	 */
	public static function set_view( $view, $view_suffix = '' ) {
		static::$view = $view;
		static::$view_suffix = $view_suffix;
	}

	/**
	 * Loading the view template
	 *
	 * @return void
	 */
	public static function load_view() {
		get_template_part(
			static::$view,
			static::$view_suffix
		);
	}
}
