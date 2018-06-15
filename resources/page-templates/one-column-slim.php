<?php
/**
 * Template Name: One column (slim)
 * Template Post Type: post, page
 *
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$controller = new Mimizuku_Controller();
$controller->layout( 'one-column-slim' );
$controller->render( 'content', get_post_type() );
