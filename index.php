<?php
$Controller = new Mimizuku\Controller();
$Controller->set_layout( 'template-parts/layout/right-sidebar' );
$Controller->set_view( 'template-parts/archive/archive' );
$Controller->render();
