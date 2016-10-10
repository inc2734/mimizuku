<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Models;

class Config {

	/**
	 * Getting config value
	 *
	 * @param string $slug the slug of the config file. e.g. config/directory
	 * @param string $key the key of the config
	 * @return mixed
	 */
	public static function get( $slug, $key = null ) {
		$path = get_template_directory() . '/' . $slug . '.php';

		if ( ! file_exists( $path ) ) {
			return;
		}

		$config = include( $path );

		if ( is_null( $key ) ) {
			return $config;
		}

		if ( ! isset( $config[ $key ] ) ) {
			return;
		}

		return $config[ $key ];
	}
}
