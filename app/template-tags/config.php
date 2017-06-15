<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Getting config value
 *
 * @param string $slug the slug of the config file. e.g. config/directory
 * @param string $key the key of the config
 * @return mixed
 */
function mimizuku_config( $slug, $key = null ) {
	return Mimizuku_Config::get( $slug, $key );
}
