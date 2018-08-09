<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

add_action( 'wp_loaded', function() {
	$includes = [
		'/../../assets/css',
		'/../../assets/css/foundation',
		'/../../assets/css/layout',
		'/../../assets/css/object/component',
		'/../../assets/css/object/project',
	];
	foreach ( $includes as $include ) {
		\Inc2734\Mimizuku_Core\Core::include_files( __DIR__ . $include );
	}
} );
