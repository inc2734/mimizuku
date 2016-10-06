<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$controller = new \Mimizuku\Controller();
$controller->layout( 'right-sidebar' );
if ( have_posts() ) {
	$controller->render( 'archive/archive', 'search' );
} else {
	$controller->render( 'content/content', 'no-match' );
}
