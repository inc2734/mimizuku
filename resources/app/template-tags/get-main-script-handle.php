<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Returns main script handle
 *
 * @return string
 */
function mimizuku_get_main_script_handle() {
	$handle = get_template();

	if ( is_child_theme() && file_exists( get_stylesheet_directory() . '/assets/js/app.min.js' ) ) {
		$handle = get_stylesheet();
	}

	return $handle;
}
