<?php
use Mimizuku\Controller as Controller;

Controller::set_layout( 'layout/wrapper/right-sidebar' );
Controller::set_view( 'template-parts/content/content', '404' );
Controller::render();
