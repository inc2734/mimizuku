<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$Controller = new \Mimizuku\Controller();
$Controller->set_layout( 'right-sidebar' );
if ( have_posts() ) {
	$Controller->set_view( 'archive/archive' );
} else {
	$Controller->set_view( 'content/content', 'none' );
}
$Controller->render();
