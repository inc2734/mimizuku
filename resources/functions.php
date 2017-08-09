<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Loads Mimizuku Bootstrap
 */
include_once( __DIR__ . '/../core/app/bootstrap.php' );

/**
 * Loads theme setup files
 */
$includes = array(
	'/app/setup',
);
foreach ( $includes as $include ) {
	foreach ( glob( __DIR__ . $include . '/*.php' ) as $file ) {
		$template_name = str_replace( array( trailingslashit( __DIR__ ), '.php' ), '', $file );
		get_template_part( $template_name );
	}
}
