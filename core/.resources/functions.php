<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$includes = array(
	'/app/setup',
);
foreach ( $includes as $include ) {
	foreach ( glob( __DIR__ . $include . '/*.php' ) as $file ) {
		$template_name = str_replace( array( trailingslashit( dirname( __DIR__ ) ), '.php' ), '', $file );
		get_template_part( $template_name );
	}
}
