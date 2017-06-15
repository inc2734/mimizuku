<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$controller = new Mimizuku_Controller();
$controller->layout( 'wrapper' );
if ( have_posts() ) {
	$controller->render( 'archive', get_post_type() );
} else {
	$controller->render( 'none' );
}
