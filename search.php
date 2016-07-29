<?php
use Mimizuku\Controller as Controller;

Controller::set_layout( 'layout/right-sidebar' );
if ( have_posts() ) {
	Controller::set_view( 'template-parts/archive/archive', 'search' );
} else {
	Controller::set_view( 'template-parts/content/content', 'no-match' );
}
Controller::render();
