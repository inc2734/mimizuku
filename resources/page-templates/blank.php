<?php
/**
 * Template Name: Blank
 * Template Post Type: post, page
 *
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$controller = new Mimizuku_Controller();
$controller->layout( 'blank' );
$controller->render( 'content-full', get_post_type() );
