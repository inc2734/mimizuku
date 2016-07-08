<?php
use Mimizuku\Controller as Controller;

Controller::set_layout( 'layout/right-sidebar' );
Controller::set_view( 'template-parts/content/content', 'page' );
Controller::render();
