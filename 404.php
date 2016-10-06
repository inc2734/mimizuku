<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$Controller = new \Mimizuku\Controller();
$Controller->set_layout( 'right-sidebar' );
$Controller->set_view( 'content/content', '404' );
$Controller->render();
