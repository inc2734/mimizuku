<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

add_filter( 'mimizuku_layout', function( $layout ) {
	if ( is_attachment() ) {
		return 'blank';
	}
	return $layout;
}, 99999 );

$controller = new Mimizuku_Controller();
$controller->layout( 'blank' );
$controller->render( 'attachment' );
