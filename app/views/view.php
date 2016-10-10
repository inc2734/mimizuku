<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Views;

class View {

	/**
	 * The layout template path
	 *
	 * @var string
	 */
	protected $layout;

	/**
	 * The view template path
	 *
	 * @var string
	 */
	protected $view;

	/**
	 * The view template name suffix
	 *
	 * @var string
	 */
	protected $view_suffix;

	/**
	 * Sets the lyaout template
	 *
	 * @param string $layout layout template path
	 * @return void
	 */
	public function layout( $layout ) {
		$this->layout = $layout;
	}

	/**
	 * Rendering the page
	 *
	 * @param string $view view template path
	 * @param string $view_suffix view template suffix
	 * @return void
	 */
	public function render( $view, $view_suffix = '' ) {
		$this->view        = $view;
		$this->view_suffix = $view_suffix;

		if ( is_singular() ) {
			$this->_render_loop();
		} else {
			$this->_render_direct();
		}
	}

	/**
	 * Rendering in the WordPress loop
	 *
	 * @return void
	 */
	protected function _render_loop() {
		while ( have_posts() ) {
			the_post();
			$this->_render();
		}
	}

	/**
	 * Rendering not in the WordPress loop
	 *
	 * @return void
	 */
	protected function _render_direct() {
		$this->_render();
	}

	/**
	 * Rentering the layout template
	 *
	 * @return void
	 */
	protected function _render() {
		$layout = apply_filters( 'mimizuku_layout', $this->layout );
		$slug   = \Mimizuku\App\Models\Config::get( 'app/config/directory', 'layout' );
		$layout_template_path = get_template_directory() . '/' . $slug . '/' . $layout . '.php';
		if ( file_exists( $layout_template_path ) ) {
			include( $layout_template_path );
		}
	}

	/**
	 * Loading the view template in layout template
	 *
	 * @return void
	 */
	public function view() {
		$view = $this->_get_view_args();
		$view = apply_filters( 'mimizuku_view', $view );
		$slug = \Mimizuku\App\Models\Config::get( 'app/config/directory', 'views' );
		get_template_part( $slug . '/' . $view['slug'], $view['name'] );
	}

	/**
	 * Gets the view args
	 *
	 * @return array
	 */
	protected function _get_view_args() {
		$view = [
			'slug' => $this->view,
			'name' => $this->view_suffix,
		];

		if ( is_404() || is_front_page() || is_search() ) {
			return $view;
		}

		$request_uri   = $_SERVER['REQUEST_URI'];
		$request_uri   = $this->_get_relative_path( $request_uri );
		$path          = $this->_remove_http_query( $request_uri );
		$path          = $this->_remove_paged_slug( $path );
		$path          = trim( $path, '/' );
		$slug          = \Mimizuku\App\Models\Config::get( 'app/config/directory', 'static' );
		$template_name = $slug . '/' . $path;

		if ( ! locate_template( $template_name . '.php', false ) ) {
			return $view;
		}

		return [
			'slug' => $path,
			'name' => '',
		];
	}

	protected function _get_relative_path( $uri ) {
		return str_replace( home_url(), '', $uri );
	}

	protected function _remove_http_query( $uri ) {
		$uri = str_replace( http_build_query( $_GET, null, '&' ), '', $uri );
		$uri = rtrim( $uri, '?' );
		return $uri;
	}

	protected function _remove_paged_slug( $uri ) {
		if ( ! is_paged() ) {
			return $uri;
		}
		return preg_replace( '/^(.+?)\/page\/\d+/', '$1', $uri );
	}
}
