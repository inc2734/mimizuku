<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$controller = new \Mimizuku\Controller();
$controller->layout( 'right-sidebar' );
$controller->render( 'content/content', get_post_type() );
