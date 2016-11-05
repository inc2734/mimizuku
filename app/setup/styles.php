<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup;

class Styles {

	/**
	 * Theme name
	 *
	 * @var string
	 */
	protected $theme;

	/**
	 * Template directory uri
	 *
	 * @var string
	 */
	protected $theme_uri;

	/**
	 * Theme version
	 *
	 * @var float
	 */
	protected $version;

	public function __construct() {
		$this->theme     = get_stylesheet();
		$this->theme_uri = get_template_directory_uri();
		$this->version   = $this->_get_theme_version();

		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_main' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_font_awesome' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_for_old_browsers' ] );
	}

	/**
	 * @return void
	 */
	public function enqueue_main() {
		if ( is_child_theme() ) {
			$src = get_stylesheet_uri();
		} else {
			$src = $this->theme_uri . '/style.min.css';
		}

		wp_enqueue_style(
			$this->theme,
			$src,
			[],
			$this->version
		);
	}

	/**
	 * @return void
	 */
	public function enqueue_font_awesome() {
		wp_enqueue_style(
			'font-awesome',
			$this->theme_uri . '/assets/vendor/font-awesome/css/font-awesome.min.css',
			[],
			$this->version
		);
	}

	/**
	 * @return void
	 */
	public function enqueue_for_old_browsers() {
		if ( \Mimizuku\App\Tags\is_supported_ie9() ) {
			wp_enqueue_style(
				'basis-ie9',
				$this->theme_uri . '/assets/vendor/basis-ie9/basis-ie9.min.css',
				[ $this->theme ],
				$this->version
			);
			wp_style_add_data(
				'basis-ie9',
				'conditional', 'lt IE 10'
			);
		}
	}

	/**
	 * Return the theme version
	 *
	 * @return string
	 */
	protected function _get_theme_version() {
		$theme = wp_get_theme();
		return $theme->get( 'Version' );
	}
}
