<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Mimizuku\Controller as Controller;

Controller::set_layout( 'layout/wrapper/right-sidebar' );
Controller::set_view( 'template-parts/content/content', get_post_type() );
Controller::render();
