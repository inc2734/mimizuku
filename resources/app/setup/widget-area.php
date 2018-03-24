<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Add sidebar widget area
 *
 * @return void
 */
add_action( 'widgets_init', function() {
	register_sidebar( [
		'name'          => __( 'Sidebar', 'mimizuku' ),
		'description'   => __( 'This widgets are displayed in the sidebar.', 'mimizuku' ),
		'id'            => 'sidebar-widget-area',
		'before_widget' => '<div id="%1$s" class="c-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="c-widget__title"><span>',
		'after_title'   => '</span></h2>',
	] );
} );

/**
 * Add bottom of contents widget area
 *
 * @return void
 */
add_action( 'widgets_init', function() {
	register_sidebar( [
		'name'          => __( 'Bottom of contents', 'mimizuku' ),
		'description'   => __( 'This widgets are displayed in the bottom of contents.', 'mimizuku' ),
		'id'            => 'contents-bottom-widget-area',
		'before_widget' => '<div id="%1$s" class="c-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="c-widget__title"><span>',
		'after_title'   => '</span></h2>',
	] );
} );

/**
 * Add footer widget area
 *
 * @return void
 */
add_action( 'widgets_init', function() {
	register_sidebar( [
		'name'          => __( 'Footer', 'mimizuku' ),
		'id'            => 'footer-widget-area',
		'description'   => __( 'This widgets are displayed in the footer of all pages.', 'mimizuku' ),
		'before_widget' => '<div class="l-footer-widget-area__item c-row__col c-row__col--1-1 c-row__col--lg-1-1"><div id="%1$s" class="c-widget %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="c-widget__title">',
		'after_title'   => '</h2>',
	] );
} );
