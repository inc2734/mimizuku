<?php
use Mimizuku\Controller as Controller;

Controller::set_layout( 'layout/wrapper/right-sidebar' );
if ( have_posts() ) {
	Controller::set_view( 'template-parts/archive/archive' );
} else {
	Controller::set_view( 'template-parts/content/content', 'none' );
}
Controller::render();
