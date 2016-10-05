<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Mimizuku\Controller as Controller;

Controller::set_layout( 'layout/wrapper/right-sidebar' );
if ( have_posts() ) {
	Controller::set_view( 'views/archive/archive', 'search' );
} else {
	Controller::set_view( 'views/content/content', 'no-match' );
}
Controller::render();
