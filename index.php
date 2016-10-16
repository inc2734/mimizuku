<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$controller = new \Mimizuku\App\Controllers\Controller();
$controller->layout( 'right-sidebar' );
if ( have_posts() ) {
	$controller->render( 'archive/archive', get_post_type() );
} else {
	$controller->render( 'content/content', 'none' );
}
